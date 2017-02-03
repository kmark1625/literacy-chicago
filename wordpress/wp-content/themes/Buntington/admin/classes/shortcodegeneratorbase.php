<?php

class VP_ShortcodeGeneratorBase extends VP_ShortcodeGenerator
{

	public static $pool = array(); // OK

	public $name; // OK

	public $template; // OK

	public $modal_title = ''; // OK

	public $button_title = '';

	public $types;

	public $include_pages; // OK

	public function __construct($arr)
	{
		$this->types          = array( 'post', 'page' );
		$this->included_pages = array();

		if (is_array($arr))
		{
			foreach ($arr as $n => $v)
			{
				$this->$n = $v;
			}
			if (empty($this->name))     die('Unique name required');
			if (empty($this->template)) die('Template array / path required');
		}

		if( is_string($this->template) and is_file($this->template) )
			$this->template = include $this->template;
			
		if(!empty($this->template))
		{
			$this->normalize();
			add_action( 'current_screen', array($this, 'init_modal') );
		}

		self::$pool[$this->name] = $this;
	}
	
	function init_modal()
	{
		if( $this->can_output() )
		{
			// print modal dialog dom
			add_action( 'admin_footer', array($this, 'print_modal') );
			// populate scripts and styles dependencies
			$loader = VP_WP_Loader::instance();
			$loader->add_types( $this->get_field_types(), 'shortcodegenerator' );
		}
	}
	
	function normalize()
	{
		if(is_array($this->template)) foreach ($this->template as &$shortcode)
		{
			foreach ($shortcode['elements'] as &$elements)
			{
				if(isset($elements['attributes'])) foreach ($elements['attributes'] as &$f)
				{
					if( $f['type'] === 'codeeditor' )
					{
						$f['type'] = 'textarea';
					}
				}
			}	
		}
	}
	
	public function can_output()
	{
		$screen = '';
		$can    = true;
		if( function_exists('get_current_screen') )
		{
			$screen = get_current_screen();
			$screen = $screen->id;
		}

		// if in post / page
		if( VP_Metabox::_is_post_or_page() )
		{
			// then consider the types
			if( !in_array("*", $this->types) ) // if wildcard exists, then always shows
				$can &= in_array(VP_Metabox::_get_current_post_type(), $this->types);
			else
				$can &= true;
		}
		else
		{
			// if not, only consider the screen id
			if( !empty($screen) )
			{
				$can &= in_array($screen, $this->included_pages);
			}
			else
			{
				if( !is_admin() )
				{
					$can &= false;
				}
			}
		}

		return $can;
	}

	public function print_modal()
	{
		$modal_id = $this->name . '_modal';
		?>
		<div id="<?php echo $modal_id; ?>" class="vp-sc-dialog reveal-modal xlarge">
			<h1><?php echo $this->modal_title; ?></h1>
			<div class="vp-sc-scroll-container">
				<div class="vp-sc-wrapper">
					<ul class="vp-sc-menu">
					<?php foreach ($this->template as $title => $menu): ?>
						<?php if(reset($this->template) == $menu): ?>
						<li class="current"><a href="#<?php echo str_replace(' ', '_', $title); ?>"><?php echo $title ?></a></li>
						<?php else: ?>
						<li><a href="#<?php echo str_replace(' ', '_', $title); ?>"><?php echo $title ?></a></li>
						<?php endif; ?>
					<?php endforeach; ?>
					</ul>
					<div class="vp-sc-main">
						<?php foreach ($this->template as $title => $menu): ?>
							<?php if (reset($this->template) == $menu) : ?>
							<ul class="current vp-sc-sub-menu-list vp-sc-sub-menu-<?php echo str_replace(' ', '_', $title); ?>">
							<?php else : ?>
							<ul class="vp-hide vp-sc-sub-menu-list vp-sc-sub-menu-<?php echo str_replace(' ', '_', $title); ?>">
							<?php endif; ?>
							<?php foreach ($menu['elements'] as $name => $element): ?>
								<li class="vp-sc-element postbox<?php if(isset($element['attributes'])) echo ' has-options'; ?>">
									<h3 class="hndle vp-sc-element-heading">
										<a href="#">
											<?php echo $element['title']; ?>
											<?php if(isset($element['attributes'])) echo '<i class="fa fa-plus"></i>'; ?>
										</a>
									</h3>
									<div class="hidden vp-sc-code"><?php echo htmlentities($element['code']); ?></div>
                                    <div class="hidden sc-slug">
									<?php 
									$plain_code = htmlentities($element['code']);
									$slugged = substr( $plain_code, 1, strpos( $plain_code, ' ' ) - 1 );
									echo get_template_directory_uri() . '/admin/metabox/img/' . $slugged . '.png'; 
									?>
                                    </div>
									<?php if(isset($element['attributes']) and !empty($element['attributes'])): ?>
									<form class="vp-sc-element-form vp-hide inside">
										<?php echo $this->print_form($element['attributes']); ?>
									</form>
									<?php endif; ?>
								</li>
							<?php endforeach; ?>
							</ul>
						<?php endforeach; ?>
					</div>
				</div>
				<a class="close-reveal-modal">&#215;</a>
			</div>
		</div>
		<?php
	}

	function print_form($attributes)
	{
		?>
		<div class="vp-sc-fields">
		<?php
		foreach ($attributes as $attr)
		{
			// create the object
			$make           = VP_Util_Reflection::field_class_from_type($attr['type']);
			// prefix name
			$attr['name']   = '_' . $attr['name'];
			$field          = call_user_func("$make::withArray", $attr);
			$default        = $field->get_default();
			if(!is_null($default))
				$field->set_value($default);
			?>

			<?php if($attr['type'] !== 'notebox'): ?>
				<div class="vp-sc-field vp-<?php echo $attr['type']; ?>" data-vp-type="vp-<?php echo $attr['type']; ?>">
					<div class="label"><label><?php echo $attr['label']; ?></label></div>
					<div class="field"><div class="input"><?php echo $field->render(true); ?></div></div>
				</div>
			<?php else: ?>
				<?php $status = isset($attr['status']) ? $attr['status'] : 'normal'; ?>
				<div class="vp-sc-field vp-<?php echo $attr['type']; ?> note-<?php echo $status; ?>" data-vp-type="vp-<?php echo $attr['type']; ?>">
					<?php echo $field->render(true); ?>
				</div>
			<?php endif; ?>

			<?php
		}
		?>
		</div>
		<div class="vp-sc-action">
			<button class="vp-sc-insert button"><?php _e('insert', 'kazaz'); ?></button>
			<button class="vp-sc-cancel button"><?php _e('cancel', 'kazaz') ?></button>
		</div>
		<?php
	}

}

/**
 * EOF
 */
(function($){
	
	var insert_sc_at = '';
	
	$(document).ready(function(){
		
		var decodeEntitiesCustom = (function() {
			// this prevents any overhead from creating the object each time
			var element = document.createElement('div');

			function decodeHTMLEntitiesCustom (str) {
				if(str && typeof str === 'string') {
					// strip script/html tags
					str = str.replace(/<script[^>]*>([\S\s]*?)<\/script>/gmi, '');
					str = str.replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/gmi, '');
					element.innerHTML = str;
					str = element.textContent;
					element.textContent = '';
				}

				return str;
			}

			return decodeHTMLEntitiesCustom;
		})();
		
		// show modal
		var show_my_modal = ( function() {
			$('a[data-modal-id]').live('click', function(e) {
				e.preventDefault();
				$('#hom_shortcodes_modal').reveal({ animation: 'none' });
				$('#hom_shortcodes_modal').css('top', 60 );
				$('#hom_shortcodes_modal').unbind('reveal:close.vp_sc');
				$('#hom_shortcodes_modal').bind('reveal:close.vp_sc', function () {
					$('.vp-sc-menu-item.active').find('.vp-sc-form').scReset().vp_slideUp();
					$('.vp-sc-menu-item.active').removeClass('active');
				});
			});
		} )();
		
		// insert shortcode from lightbox
		var each_sc_trigger = ( function() {
			$( 'body' ).on( 'click', '.add-sc', function( e ) {
				e.preventDefault();
				insert_sc_at = $(this).attr( 'id' );
			} );
		} )();

		jQuery.fn.scReset = function(){
			if( $(this).is('form') )
				$(this)[0].reset();
			
			$(this).find('.vp-sc-field').each(function(i){
				var type = $(this).attr('data-vp-type');
				switch (type)
				{
					case 'vp-upload':
						$(this).find('.image > img').attr('src', '');
						break;
					case 'vp-color':
						$(this).find('.vp-js-colorpicker').colorpicker('update', '');
						break;
					case 'vp-slider':
						var val     = $(this).find('input').val();
						var $slider = $(this).find('.vp-js-slider');
						if(!val)
						{
							val = $(this).find('.vp-js-slider').slider('option', 'min');
						}
						$slider.slider('value', val);
						break;
					case 'vp-textarea':
						$(this).find('textarea').val($(this).find('textarea').text());
						break;
					case 'vp-checkimage':
						// trigger change since form reset doesn't trigger it
						$(this).find('input').change();
						break;
					case 'vp-radioimage':
						// trigger change since form reset doesn't trigger it
						$(this).find('input').change();
						break;
					case 'vp-codeeditor':
						$(this).find('textarea').first().val($(this).find('textarea').text()).change();
						break;
				}
			});

			if ($.fn.select2)
			{
				// re-init select2
				$(this).find('.vp-js-select2').select2("destroy");
				// re-init select2 sortable
				if ($.fn.select2Sortable) $(this).find('.vp-js-sorter').select2("destroy");
				// re-init select2 fontawesome
				$(this).find('.vp-js-fontawesome').select2("destroy");

				vp.init_fontawesome_chooser($(this).find('.vp-js-fontawesome'));
				vp.init_select2($(this).find('.vp-js-select2'));
				vp.init_sorter($(this).find('.vp-js-sorter'));
			}
			return $(this);
		};

		// init controls
		vp.init_controls($('.vp-sc-main'));

		// shortcode image controls event bind
		vp.custom_check_radio_event(".vp-sc-dialog", ".vp-checkimage .field .input label");
		vp.custom_check_radio_event(".vp-sc-dialog", ".vp-radioimage .field .input label");

		$('.vp-sc-menu li a').on('click', function(ev){
			ev.preventDefault();

			var $modal   = $(this).parents('.vp-sc-dialog'),
			    $parent  = $(this).parent('li'),
			    targetId = $(this).attr('href').substring(1),
			    $target  = $modal.find('.vp-sc-sub-menu-' + targetId);

			// set clicked menu item as current
			$parent.siblings().removeClass('current');
			$parent.addClass('current');

			// show menu content
			$target.siblings().addClass('vp-hide');
			$target.removeClass('vp-hide');

			// stop event propagation
			return false;
		});

		$('.vp-sc-element .vp-sc-element-heading').unbind();
		$('.vp-sc-element .vp-sc-element-heading a').bind('click.vp_sc', function(e){
			e.preventDefault();

			var $parent = $(this).parents('li'),
			    id      = $parent.attr('id'),
			    $form   = $parent.find('.vp-sc-element-form').first(),
				slug    = $parent.find('.sc-slug').first().html();

			if($parent.hasClass('active'))
			{
				$form.vp_slideUp();
				$form.scReset();
				$parent.removeClass('active');
			}
			else
			{
				var code   = $parent.find('.vp-sc-code').first().html(),
				    $modal = $(this).parents('.vp-sc-dialog').first();

				$modal.find('.vp-sc-element').removeClass('active');
				$modal.find('.vp-sc-element-form').vp_slideUp();

				if($form.exists())
				{
					$parent.addClass('active');
					$form.vp_slideDown();
				}
				else
				{
					code = decodeEntitiesCustom(code);
					$( "a[id='" + insert_sc_at + "']" ).parent().find( '.sc-visual' ).html( '<img src="' + slug + '" alt="ShortCode Visual" />' );
					if( $( "textarea[name='" + insert_sc_at + "']" ).length ) $( "textarea[name='" + insert_sc_at + "']" ).text( code );
					$modal.trigger('reveal:close');
				}
			}
		});

		$('.vp-sc-insert').bind('click.vp_sc_insert', function(e){
			e.preventDefault();
			var $modal  = $(this).parents('.vp-sc-dialog'),
			    $parent = $(this).parents('.vp-sc-element'),
			    $form   = $(this).parents('.vp-sc-element-form'),
			    $fields = $form.find('.vp-sc-field'),
			    values  = {},
			    code    = $parent.find('.vp-sc-code').first().html(),
				slug    = $parent.find('.sc-slug').first().html(),
			    atts    = '';

			// gather unique names of the options
			$fields.each(function(i){
				var $input = $(this).find(':not(div).vp-input'),
				    name   = $input.attr('name'),
				    val    = $input.validationVal(),
				    type   = $(this).attr('data-vp-type');

				if(type === 'vp-toggle')
				{
					if(val) val = 'true';
					else val = 'false';
				}

				if(val && val !== '')
				{
					values[name.substring(1)] = val;
				}
			});

			for (var name in values)
			{
				if(values.hasOwnProperty(name))
				{
					atts += (" " + name + '="' + values[name] + '"');
				}
			}

			// print shortcode to editor					
			code = code.replace(']', atts + ']');
			code = decodeEntitiesCustom(code);			
			// reset form and close dialog
			$('.vp-sc-element').removeClass('active');
			$form.vp_slideUp();
			$form.scReset();
			
			// edit by DAMEER ------------------------------------->
			$( "a[id='" + insert_sc_at + "']" ).parent().find( '.sc-visual' ).html( '<img src="' + slug + '" alt="ShortCode Visual" />' );
			if( $( "textarea[name='" + insert_sc_at + "']" ).length ) $( "textarea[name='" + insert_sc_at + "']" ).text( code ); // insert to textarea
			
			$modal.trigger('reveal:close');
		});

		$('.vp-sc-cancel').bind('click.vp_sc_cancel', function(e){
			e.preventDefault();
			$('.vp-sc-element').removeClass('active');
			var $form   = $(this).parents('.vp-sc-element-form')
			$form.vp_slideUp();
			$form.scReset();
		});

	});
	
	
})(jQuery);
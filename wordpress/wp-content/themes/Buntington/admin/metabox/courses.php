<?php
return array(
	'id'          => 'course',
	'types'       => array( 'course' ),
	'title'       => __('School Course details', 'kazaz'),
	'priority'    => 'high',
	'context'     => 'normal',
	'template'    => array(
		array(
			'type' => 'textbox',
			'name' => 'course_id',
			'label' => __('Course ID', 'kazaz'),
			'validation' => 'required',
		),
		array(
			'type'        => 'group',
			'repeating'   => true,
			'sortable'    => true,
			'name'        => 'course_features',
			'title'       => __('Course Features', 'kazaz'),
			'description' => __('Enter as many course features as needed in form of name-value pair.', 'kazaz'),
			'fields'    => array(
				array(
					'type' => 'textbox',
					'name' => 'course_f_name',
					'label' => __('Feature Name', 'kazaz'),
				),
				array(
					'type'  => 'textbox',
					'name'  => 'course_f_value',
					'label' => __('Feature Value', 'kazaz'),
				),
			),
		),
		array(
			'type'        => 'group',
			'repeating'   => true,
			'sortable'    => true,
			'name'        => 'course_documents',
			'title'       => __('Course Documents', 'kazaz'),
			'description' => __('Upload documents for download. ZIP up documents before upload!', 'kazaz'),
			'fields'    => array(
				array(
					'type' => 'upload',
					'name' => 'course_doc',
					'label' => __('Course document', 'kazaz'),
				),
				array(
					'type'  => 'textbox',
					'name'  => 'course_doc_title',
					'label' => __('Course document title', 'kazaz'),
				),
				array(
					'type'  => 'textbox',
					'name'  => 'course_doc_description',
					'label' => __('Course document description', 'kazaz'),
				),
			),
		),
	),
);

/**
 * EOF
 */
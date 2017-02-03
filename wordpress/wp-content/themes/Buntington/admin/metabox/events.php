<?php
return array(
	'id'          => 'event',
	'types'       => array( 'event' ),
	'title'       => __('Event timing', 'kazaz'),
	'priority'    => 'high',
	'context'     => 'normal',
	'template'    => array(
		array(
			'name'    => 'event_from',
			'type'    => 'date',
			'label'   => __('Select/enter event start date', 'kazaz'),
			'format'  => 'dd-mm-yy',
			'description' => __('It MUST use "dd-mm-yyyy" format!', 'kazaz'),
		),
		array(
			'name'    => 'event_to',
			'type'    => 'date',
			'label'   => __('Select/enter event end date', 'kazaz'),
			'format'  => 'dd-mm-yy',
			'description' => __('It MUST use "dd-mm-yyyy" format!', 'kazaz'),
		),
		array(
			'name'  => 'event_time_start',
			'type'  => 'textbox',
			'label' => __('Event time start', 'kazaz'),
			'description' => __('For example: 9:00 AM', 'kazaz'),
		),
		array(
			'name'  => 'event_time_end',
			'type'  => 'textbox',
			'label' => __('Event time end', 'kazaz'),
			'description' => __('For example: 4:30 PM', 'kazaz'),
		),
	),
);

/**
 * EOF
 */
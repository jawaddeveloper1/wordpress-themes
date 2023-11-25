<?php 

new \Kirki\Field\Background(
	[
		'settings'    => 'apkhub_header_background',
		'label'       => esc_html__( 'Background', 'apkhub' ),
		'section'     => 'apkhub_header',
		'default'     => [
			'background-color'      => '#fff',
		],
		'output'      => [
			[
				'element' => '.header-container',
			],
		],
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'apkhub_menu_color',
		'label'       => __( 'Color', 'apkhub' ),
		'section'     => 'apkhub_menu',
		'default'     => 'black',
        'output'      => [
			[
				'element' => '.apkhub-navigation a',
			],
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'apkhub_home_slider_visibility',
		'label'       => esc_html__( 'Visibility', 'apkhub' ),
		'section'     => 'apkhub_home_slider',
		'default'     => 'on',
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'apkhub' ),
			'off' => esc_html__( 'Disable', 'apkhub' ),
		],
	]
);

new \Kirki\Field\Repeater(
	[
		'settings'     => 'apkhub_home_slider_slides',
		'label'        => esc_html__( 'Slides', 'apkhub' ),
		'section'      => 'apkhub_home_slider',
		'priority'     => 10,
		'row_label'    => [
			'type'  => 'field',
			'value' => esc_html__( 'Heading', 'apkhub' ),
			'field' => 'slide_heading',
		],
		'button_label' => esc_html__( '"Add New" ', 'apkhub' ),
		'default'      => [
			'slide_bg_image'   => [
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'apkhub' ),
				'default'     => '',
			],
			'slide_heading'   => [
				'type'        => 'text',
				'label'       => esc_html__( 'Heading', 'apkhub' ),
				'default'     => '',
			],
			'slide_description'   => [
				'type'        => 'textarea',
				'label'       => esc_html__( 'Description', 'apkhub' ),
				'default'     => '',
			],
		],
		'fields'       => [
			'slide_bg_image'   => [
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'apkhub' ),
				'default'     => '',
			],
			'slide_heading'   => [
				'type'        => 'text',
				'label'       => esc_html__( 'Heading', 'apkhub' ),
				'default'     => '',
			],
			'slide_description'   => [
				'type'        => 'textarea',
				'label'       => esc_html__( 'Description', 'apkhub' ),
				'default'     => '',
			],
		],
	]
);

new \Kirki\Field\Sortable(
	[
		'settings' => 'apkhub_home_blocks',
		'label'    => __( 'Home Blocks', 'apkhub' ),
		'section'  => 'apkhub_home_blocks',
		'default'  => [ 'featured-block', 'latest-apps-block', 'latest-games-block' ],
		'priority' => 10,
		'choices'  => [
			'featured-block' => esc_html__( 'Featured', 'apkhub' ),
			'latest-apps-block' => esc_html__( 'Latest Apps', 'apkhub' ),
			'latest-games-block' => esc_html__( 'Latest Games', 'apkhub' ),
		],
	]
);

new \Kirki\Field\Text(
	[
		'settings' => 'apkhub_home_viewmore_btn_text',
		'label'    => esc_html__( 'Text', 'apkhub' ),
		'section'  => 'apkhub_home_viewall_btn',
		'default'  => esc_html__( 'View all', 'apkhub' ),
		'priority' => 10,
	]
);
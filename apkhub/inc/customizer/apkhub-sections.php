<?php 

new \Kirki\Section(
    'apkhub_header',
	[
		'title'       => esc_html__( 'Header', 'apkhub' ),
		'panel'       => 'apkhub_settings',
		'priority'    => 10,
	]
);

new \Kirki\Section(
	'apkhub_menu',
	[
		'title'       => esc_html__( 'Menu', 'apkhub' ),
		'panel'       => 'apkhub_settings',
		'priority'    => 20,
    ]
);

new \Kirki\Section(
	'apkhub_home_slider',
	[
		'title'       => esc_html__( 'Home Slider', 'apkhub' ),
		'panel'       => 'apkhub_settings',
		'priority'    => 30,
    ]
);

new \Kirki\Section(
	'apkhub_home_blocks',
	[
		'title'       => esc_html__( 'Home Blocks', 'apkhub' ),
		'panel'       => 'apkhub_settings',
		'priority'    => 40,
    ]
);

new \Kirki\Section(
	'apkhub_home_viewall_btn',
	[
		'title'       => esc_html__( 'Home View All Button', 'apkhub' ),
		'panel'       => 'apkhub_settings',
		'priority'    => 40,
    ]
);
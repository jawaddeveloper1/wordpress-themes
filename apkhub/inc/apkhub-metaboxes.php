<?php 

add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {
    $prefix = 'apkhub_';
    $meta_boxes[] = [
        'title'      => 'App Info',
        'post_types' => 'apk',
        'fields'     => [
            [
                'id'          => $prefix.'version',
                'name'        => 'Version',
                'type'        => 'text',
                'std'         => 'v1.0',
                'placeholder' => 'v1.0',
            ],
            [
                'id'          => $prefix.'g_playstore_link',
                'name'        => 'Google Play Store',
                'type'        => 'text',
                'placeholder' => 'https://play.google.com/',
            ],
            [
                'id'          => $prefix.'appstore_link',
                'name'        => 'App Store',
                'type'        => 'text',
                'placeholder' => 'https://apps.apple.com/',
            ],
            [
                'id'               => $prefix.'app_screenshots',
                'name'             => 'Screenshots',
                'type'             => 'image_upload',
                'max_file_uploads' => 12,
                'max_status'       => true,
            ],
        ],
    ];

    return $meta_boxes;
} );
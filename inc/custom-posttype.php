<?php

function law_counter_posttype()
{
    register_post_type( 'counter', [
            'labels'        => [
                'name'          => __( 'Counter', 'law' ),
                'singular_name' => __( 'Counter', 'law' ),
            ],
            'public'        => true,
            'has_archive'   => true,
            'rewrite'       => true,
            'supports'      => [
                'title',
                'revisions',
                'custom-fields',
            ],
        ]
    );
}
add_action( 'init', 'law_counter_posttype', 0 );

function law_progress_posttype()
{
    register_post_type( 'Progress', [
            'labels'        => [
                'name'          => __( 'Progress', 'law' ),
                'singular_name' => __( 'Progress', 'law' ),
            ],
            'public'        => true,
            'has_archive'   => true,
            'rewrite'       => true,
            'supports'      => [
                'title',
                'custom-fields',
            ],
        ]
    );
}
add_action( 'init', 'law_progress_posttype', 0 );

function law_practice_posttype()
{
    register_post_type( 'practice', [
            'labels'        => [
                'name'          => __( 'Practice', 'law' ),
                'singular_name' => __( 'Practice', 'law' ),
            ],
            'public'        => true,
            'show_ui'       => true,
            'show_in_menu'  => true,
            'has_archive'   => true,
            'rewrite'       => true,
            'supports'      => [
                'title',
                'editor',
                'custom-fields',
            ],
        ]
    );
}
add_action( 'init', 'law_practice_posttype', 0 );

function law_counseling_posttype()
{
    register_post_type( 'counseling', [
            'labels'        => [
                'name'          => __( 'Counseling', 'law' ),
                'singular_name' => __( 'Counseling', 'law' ),
            ],
            'public'        => true,
            'show_ui'       => true,
            'show_in_menu'  => true,
            'has_archive'   => true,
            'rewrite'       => true,
            'supports'      => [
                'title',
                'editor',
                'thumbnail',
            ],
        ]
    );
}
add_action( 'init', 'law_counseling_posttype', 0 );

function law_testimonial_posttype()
{
    register_post_type( 'testimonial', [
            'labels'        => [
                'name'          => __( 'Testimonial', 'law' ),
                'singular_name' => __( 'Testimonial', 'law' ),
            ],
            'public'        => true,
            'show_ui'       => true,
            'show_in_menu'  => true,
            'has_archive'   => true,
            'rewrite'       => true,
            'supports'      => [
                'title',
                'editor',
                'thumbnail',
                'custom-fields'
            ],
        ]
    );
}
add_action( 'init', 'law_testimonial_posttype', 0 );

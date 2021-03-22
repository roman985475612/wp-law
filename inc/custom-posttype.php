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

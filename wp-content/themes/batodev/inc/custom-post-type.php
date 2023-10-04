<?php
register_post_type( 'blogs',
    array(
        'labels' => array(
            'name' => ( 'Blogs' ),
            'singular_name' => ( 'Blog' ),
            'all_items' => __( 'All Blogs' ),
        ),

        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'revisions',
            'custom-fields',
        ),

        'rewrite' => array('slug' => 'blogs'),
        'public' => true,
        'has_archive' => true,
        'hierarchical'        => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-format-status',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => false,
        'capability_type'     => 'post',
        'show_in_rest' => true,

    )
);

// Our custom post type function
add_theme_support('post-thumbnails');
?>
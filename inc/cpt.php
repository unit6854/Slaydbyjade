<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function slaydbyjade_register_cpts() {

    // --- Services CPT ---
    register_post_type( 'services', [
        'labels' => [
            'name'               => __( 'Services',          'slaydbyjade' ),
            'singular_name'      => __( 'Service',           'slaydbyjade' ),
            'add_new'            => __( 'Add New',           'slaydbyjade' ),
            'add_new_item'       => __( 'Add New Service',   'slaydbyjade' ),
            'edit_item'          => __( 'Edit Service',      'slaydbyjade' ),
            'new_item'           => __( 'New Service',       'slaydbyjade' ),
            'view_item'          => __( 'View Service',      'slaydbyjade' ),
            'search_items'       => __( 'Search Services',   'slaydbyjade' ),
            'not_found'          => __( 'No services found', 'slaydbyjade' ),
            'not_found_in_trash' => __( 'No services in trash', 'slaydbyjade' ),
        ],
        'public'              => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-star-filled',
        'supports'            => [ 'title', 'thumbnail', 'page-attributes' ],
        'rewrite'             => [ 'slug' => 'services', 'with_front' => false ],
        'show_in_rest'        => false,
    ] );

    // --- Gallery Item CPT ---
    register_post_type( 'gallery_item', [
        'labels' => [
            'name'               => __( 'Gallery',           'slaydbyjade' ),
            'singular_name'      => __( 'Gallery Item',      'slaydbyjade' ),
            'add_new'            => __( 'Add New',           'slaydbyjade' ),
            'add_new_item'       => __( 'Add Gallery Item',  'slaydbyjade' ),
            'edit_item'          => __( 'Edit Gallery Item', 'slaydbyjade' ),
        ],
        'public'            => true,
        'show_in_menu'      => true,
        'has_archive'       => true,
        'hierarchical'      => false,
        'menu_position'     => 6,
        'menu_icon'         => 'dashicons-format-gallery',
        'supports'          => [ 'title', 'thumbnail', 'page-attributes' ],
        'rewrite'           => [ 'slug' => 'gallery', 'with_front' => false ],
        'show_in_rest'      => false,
    ] );
}
add_action( 'init', 'slaydbyjade_register_cpts' );

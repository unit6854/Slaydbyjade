<?php
function slaydbyjade_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ] );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );
    add_theme_support( 'custom-logo', [
        'height'      => 120,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ] );

    register_nav_menus( [
        'primary' => __( 'Primary Navigation', 'slaydbyjade' ),
    ] );
}
add_action( 'after_setup_theme', 'slaydbyjade_setup' );

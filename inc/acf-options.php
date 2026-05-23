<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Justification: ACF Options Page provides global site data (phone, email, social, logo).
// Required by architecture: no hardcoded contact data in templates.
if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( [
        'page_title' => 'Site Settings',
        'menu_title' => 'Site Settings',
        'menu_slug'  => 'site-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
        'position'   => 2,
        'icon_url'   => 'dashicons-admin-settings',
    ] );
}

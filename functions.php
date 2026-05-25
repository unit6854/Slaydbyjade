<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Slayd by Jade — functions.php loads all /inc/ modules. No logic here.

require_once get_template_directory() . '/inc/security.php';
require_once get_template_directory() . '/inc/theme-support.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/image-sizes.php';
require_once get_template_directory() . '/inc/cpt.php';
require_once get_template_directory() . '/inc/acf-options.php';
require_once get_template_directory() . '/inc/acf-fields.php';
require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/og-meta.php';
require_once get_template_directory() . '/inc/purge.php';

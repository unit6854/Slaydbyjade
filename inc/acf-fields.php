<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// ACF local JSON sync — enables field group versioning via Git.
add_filter( 'acf/settings/save_json', function() {
    return get_stylesheet_directory() . '/acf-json';
} );
add_filter( 'acf/settings/load_json', function( $paths ) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
} );

function slaydbyjade_register_acf_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    // -------------------------------------------------------
    // FIELD GROUP: Global Site Settings (Options Page)
    // -------------------------------------------------------
    acf_add_local_field_group( [
        'key'    => 'group_site_settings',
        'title'  => 'Global Site Settings',
        'fields' => [
            [
                'key'          => 'field_site_logo',
                'label'        => 'Site Logo',
                'name'         => 'site_logo',
                'type'         => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
            ],
            [
                'key'   => 'field_site_phone',
                'label' => 'Phone Number',
                'name'  => 'site_phone',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_site_email',
                'label' => 'Email Address',
                'name'  => 'site_email',
                'type'  => 'email',
            ],
            [
                'key'   => 'field_site_address',
                'label' => 'Address',
                'name'  => 'site_address',
                'type'  => 'textarea',
                'rows'  => 3,
            ],
            [
                'key'   => 'field_social_instagram',
                'label' => 'Instagram URL',
                'name'  => 'social_instagram',
                'type'  => 'url',
            ],
            [
                'key'   => 'field_social_facebook',
                'label' => 'Facebook URL',
                'name'  => 'social_facebook',
                'type'  => 'url',
            ],
            [
                'key'   => 'field_social_tiktok',
                'label' => 'TikTok URL',
                'name'  => 'social_tiktok',
                'type'  => 'url',
            ],
            [
                'key'   => 'field_instagram_follower_count',
                'label' => 'Instagram Follower Count',
                'name'  => 'instagram_follower_count',
                'type'  => 'text',
                'instructions' => 'e.g. 7.3K+',
            ],
            [
                'key'   => 'field_booking_url',
                'label' => 'Global Booking URL',
                'name'  => 'booking_url',
                'type'  => 'url',
                'instructions' => 'The main booking link (e.g. StyleSeat, Booksy, Square).',
            ],
            [
                'key'   => 'field_footer_tagline',
                'label' => 'Footer Tagline',
                'name'  => 'footer_tagline',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_footer_copyright_text',
                'label' => 'Footer Copyright Text',
                'name'  => 'footer_copyright_text',
                'type'  => 'text',
            ],
        ],
        'location' => [
            [ [ 'param' => 'options_page', 'operator' => '==', 'value' => 'site-settings' ] ],
        ],
        'menu_order' => 0,
    ] );

    // -------------------------------------------------------
    // FIELD GROUP: Home Page Fields
    // -------------------------------------------------------
    acf_add_local_field_group( [
        'key'    => 'group_home_page',
        'title'  => 'Home Page',
        'fields' => [
            // Hero
            [
                'key'   => 'field_hero_eyebrow',
                'label' => 'Hero Eyebrow Text',
                'name'  => 'hero_eyebrow',
                'type'  => 'text',
                'instructions' => 'e.g. PROTECTIVE STYLES. TIMELESS BEAUTY.',
            ],
            [
                'key'   => 'field_hero_headline',
                'label' => 'Hero Headline',
                'name'  => 'hero_headline',
                'type'  => 'text',
                'instructions' => 'e.g. YOU BRING THE VISION,',
            ],
            [
                'key'   => 'field_hero_script_line',
                'label' => 'Hero Script Line',
                'name'  => 'hero_script_line',
                'type'  => 'text',
                'instructions' => "e.g. I'll Slayd It.",
            ],
            [
                'key'   => 'field_hero_cta_label',
                'label' => 'Hero CTA Button Label',
                'name'  => 'hero_cta_label',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_hero_cta_url',
                'label' => 'Hero CTA Button URL',
                'name'  => 'hero_cta_url',
                'type'  => 'url',
            ],
            [
                'key'           => 'field_hero_image',
                'label'         => 'Hero Model Image',
                'name'          => 'hero_image',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
            ],
            // About Section
            [
                'key'   => 'field_about_script_heading',
                'label' => 'About Script Heading',
                'name'  => 'about_script_heading',
                'type'  => 'text',
                'instructions' => 'e.g. About',
            ],
            [
                'key'   => 'field_about_main_heading',
                'label' => 'About Main Heading',
                'name'  => 'about_main_heading',
                'type'  => 'text',
                'instructions' => 'e.g. LICENSED. PASSIONATE. DEDICATED TO YOU.',
            ],
            [
                'key'   => 'field_about_body',
                'label' => 'About Body Text',
                'name'  => 'about_body',
                'type'  => 'wysiwyg',
                'media_upload' => 0,
                'toolbar' => 'basic',
            ],
            [
                'key'   => 'field_about_signature',
                'label' => 'About Signature',
                'name'  => 'about_signature',
                'type'  => 'text',
                'instructions' => 'e.g. Slayd by Jade',
            ],
            [
                'key'           => 'field_about_image',
                'label'         => 'About Image',
                'name'          => 'about_image',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
            ],
            // Services Section
            [
                'key'   => 'field_services_script_heading',
                'label' => 'Services Script Heading',
                'name'  => 'services_script_heading',
                'type'  => 'text',
                'instructions' => 'e.g. My Services',
            ],
            [
                'key'   => 'field_services_main_heading',
                'label' => 'Services Main Heading',
                'name'  => 'services_main_heading',
                'type'  => 'text',
                'instructions' => 'e.g. BEAUTY. CARE. SLAYED.',
            ],
            // CTA Section
            [
                'key'   => 'field_cta_heading',
                'label' => 'CTA Section Heading',
                'name'  => 'cta_heading',
                'type'  => 'text',
                'instructions' => 'e.g. Ready For Your Next Signature Look?',
            ],
            [
                'key'   => 'field_cta_subtext',
                'label' => 'CTA Section Subtext',
                'name'  => 'cta_subtext',
                'type'  => 'text',
                'instructions' => 'e.g. Your luxury protective style experience awaits.',
            ],
            // SEO
            [
                'key'          => 'field_home_seo_title',
                'label'        => 'SEO Title',
                'name'         => 'seo_title',
                'type'         => 'text',
                'instructions' => 'Overrides the browser tab title. Leave blank to use the page title.',
            ],
            [
                'key'          => 'field_home_seo_description',
                'label'        => 'SEO Description',
                'name'         => 'seo_description',
                'type'         => 'textarea',
                'rows'         => 2,
                'maxlength'    => 160,
                'instructions' => 'Meta description shown in search results. Max 160 characters.',
            ],
            // FAQ
            [
                'key'          => 'field_home_faq_items',
                'label'        => 'FAQ Items',
                'name'         => 'faq_items',
                'type'         => 'repeater',
                'instructions' => 'Questions and answers displayed on the page and in Google\'s FAQ rich result.',
                'min'          => 0,
                'layout'       => 'block',
                'sub_fields'   => [
                    [
                        'key'   => 'field_home_faq_question',
                        'label' => 'Question',
                        'name'  => 'faq_question',
                        'type'  => 'text',
                    ],
                    [
                        'key'   => 'field_home_faq_answer',
                        'label' => 'Answer',
                        'name'  => 'faq_answer',
                        'type'  => 'textarea',
                        'rows'  => 3,
                    ],
                ],
            ],
        ],
        'location' => [
            [ [ 'param' => 'page_template', 'operator' => '==', 'value' => 'templates/page-home.php' ] ],
        ],
        'menu_order' => 0,
    ] );

    // -------------------------------------------------------
    // FIELD GROUP: Services CPT Fields
    // -------------------------------------------------------
    acf_add_local_field_group( [
        'key'    => 'group_service_fields',
        'title'  => 'Service Details',
        'fields' => [
            [
                'key'   => 'field_service_category_label',
                'label' => 'Category Label',
                'name'  => 'service_category_label',
                'type'  => 'text',
                'instructions' => 'e.g. Knotless Braids',
            ],
            [
                'key'   => 'field_service_duration',
                'label' => 'Duration',
                'name'  => 'service_duration',
                'type'  => 'text',
                'instructions' => 'e.g. 4 hours 30 minutes',
            ],
            [
                'key'   => 'field_service_price',
                'label' => 'Price',
                'name'  => 'service_price',
                'type'  => 'text',
                'instructions' => 'e.g. $175.00',
            ],
            [
                'key'   => 'field_service_deposit',
                'label' => 'Deposit',
                'name'  => 'service_deposit',
                'type'  => 'text',
                'instructions' => 'e.g. $25',
            ],
            [
                'key'   => 'field_service_description',
                'label' => 'Description',
                'name'  => 'service_description',
                'type'  => 'wysiwyg',
                'media_upload' => 0,
                'toolbar' => 'basic',
            ],
            [
                'key'   => 'field_service_booking_url',
                'label' => 'Booking URL',
                'name'  => 'service_booking_url',
                'type'  => 'url',
                'instructions' => 'Leave blank to use the global booking URL.',
            ],
            [
                'key'           => 'field_service_image',
                'label'         => 'Service Image',
                'name'          => 'service_image',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
            ],
            [
                'key'          => 'field_service_seo_title',
                'label'        => 'SEO Title',
                'name'         => 'seo_title',
                'type'         => 'text',
                'instructions' => 'Overrides the browser tab title. Leave blank to use the service title.',
            ],
            [
                'key'          => 'field_service_seo_description',
                'label'        => 'SEO Description',
                'name'         => 'seo_description',
                'type'         => 'textarea',
                'rows'         => 2,
                'maxlength'    => 160,
                'instructions' => 'Meta description shown in search results. Max 160 characters.',
            ],
        ],
        'location' => [
            [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'services' ] ],
        ],
        'menu_order' => 0,
    ] );

    // -------------------------------------------------------
    // FIELD GROUP: Gallery Item Fields
    // -------------------------------------------------------
    acf_add_local_field_group( [
        'key'    => 'group_gallery_item_fields',
        'title'  => 'Gallery Item',
        'fields' => [
            [
                'key'           => 'field_gallery_item_image',
                'label'         => 'Photo',
                'name'          => 'gallery_item_image',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'required'      => 1,
            ],
            [
                'key'   => 'field_gallery_item_caption',
                'label' => 'Caption (optional)',
                'name'  => 'gallery_item_caption',
                'type'  => 'text',
            ],
            [
                'key'          => 'field_gallery_seo_title',
                'label'        => 'SEO Title',
                'name'         => 'seo_title',
                'type'         => 'text',
                'instructions' => 'Overrides the browser tab title.',
            ],
            [
                'key'          => 'field_gallery_seo_description',
                'label'        => 'SEO Description',
                'name'         => 'seo_description',
                'type'         => 'textarea',
                'rows'         => 2,
                'maxlength'    => 160,
                'instructions' => 'Meta description shown in search results. Max 160 characters.',
            ],
        ],
        'location' => [
            [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'gallery_item' ] ],
        ],
        'menu_order' => 0,
    ] );

    // -------------------------------------------------------
    // FIELD GROUP: Contact Page Fields
    // -------------------------------------------------------
    acf_add_local_field_group( [
        'key'    => 'group_contact_page',
        'title'  => 'Contact Page',
        'fields' => [
            [
                'key'   => 'field_contact_heading',
                'label' => 'Heading',
                'name'  => 'contact_heading',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_contact_subheading',
                'label' => 'Subheading',
                'name'  => 'contact_subheading',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_contact_intro',
                'label' => 'Intro Text',
                'name'  => 'contact_intro',
                'type'  => 'textarea',
                'rows'  => 3,
            ],
            [
                'key'          => 'field_contact_seo_title',
                'label'        => 'SEO Title',
                'name'         => 'seo_title',
                'type'         => 'text',
                'instructions' => 'Overrides the browser tab title.',
            ],
            [
                'key'          => 'field_contact_seo_description',
                'label'        => 'SEO Description',
                'name'         => 'seo_description',
                'type'         => 'textarea',
                'rows'         => 2,
                'maxlength'    => 160,
                'instructions' => 'Meta description shown in search results. Max 160 characters.',
            ],
        ],
        'location' => [
            [ [ 'param' => 'page_template', 'operator' => '==', 'value' => 'templates/page-contact.php' ] ],
        ],
        'menu_order' => 0,
    ] );

    // -------------------------------------------------------
    // FIELD GROUP: Services Archive Page Fields
    // -------------------------------------------------------
    acf_add_local_field_group( [
        'key'    => 'group_services_archive',
        'title'  => 'Services Archive',
        'fields' => [
            [
                'key'          => 'field_svcarch_seo_title',
                'label'        => 'SEO Title',
                'name'         => 'seo_title',
                'type'         => 'text',
                'instructions' => 'Overrides the browser tab title.',
            ],
            [
                'key'          => 'field_svcarch_seo_description',
                'label'        => 'SEO Description',
                'name'         => 'seo_description',
                'type'         => 'textarea',
                'rows'         => 2,
                'maxlength'    => 160,
                'instructions' => 'Meta description shown in search results. Max 160 characters.',
            ],
            [
                'key'          => 'field_svcarch_faq_items',
                'label'        => 'FAQ Items',
                'name'         => 'faq_items',
                'type'         => 'repeater',
                'instructions' => 'Questions shown below the services list. Outputs FAQPage schema for Google.',
                'min'          => 0,
                'layout'       => 'block',
                'sub_fields'   => [
                    [
                        'key'   => 'field_svcarch_faq_question',
                        'label' => 'Question',
                        'name'  => 'faq_question',
                        'type'  => 'text',
                    ],
                    [
                        'key'   => 'field_svcarch_faq_answer',
                        'label' => 'Answer',
                        'name'  => 'faq_answer',
                        'type'  => 'textarea',
                        'rows'  => 3,
                    ],
                ],
            ],
        ],
        'location' => [
            [ [ 'param' => 'page_template', 'operator' => '==', 'value' => 'templates/archive-services.php' ] ],
        ],
        'menu_order' => 0,
    ] );

    // -------------------------------------------------------
    // FIELD GROUP: Gallery Page Fields
    // -------------------------------------------------------
    acf_add_local_field_group( [
        'key'    => 'group_gallery_page',
        'title'  => 'Gallery Page',
        'fields' => [
            [
                'key'          => 'field_foogallery_id',
                'label'        => 'FooGallery ID',
                'name'         => 'foogallery_id',
                'type'         => 'text',
                'instructions' => 'Paste the FooGallery gallery ID here (e.g. 128). Find it under FooGallery → Edit Gallery in the URL.',
            ],
            [
                'key'   => 'field_gallerypage_subtext',
                'label' => 'Subheading Text',
                'name'  => 'gallery_subtext',
                'type'  => 'text',
                'instructions' => 'e.g. Protective styles crafted with care — every braid, every loc, every look.',
                'default_value' => 'Protective styles crafted with care — every braid, every loc, every look.',
            ],
            [
                'key'          => 'field_gallerypage_seo_title',
                'label'        => 'SEO Title',
                'name'         => 'seo_title',
                'type'         => 'text',
                'instructions' => 'Overrides the browser tab title.',
            ],
            [
                'key'          => 'field_gallerypage_seo_description',
                'label'        => 'SEO Description',
                'name'         => 'seo_description',
                'type'         => 'textarea',
                'rows'         => 2,
                'maxlength'    => 160,
                'instructions' => 'Meta description shown in search results. Max 160 characters.',
            ],
        ],
        'location' => [
            [ [ 'param' => 'page_template', 'operator' => '==', 'value' => 'templates/page-gallery.php' ] ],
        ],
        'menu_order' => 0,
    ] );
}
add_action( 'acf/init', 'slaydbyjade_register_acf_fields' );

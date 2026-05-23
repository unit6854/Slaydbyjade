<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Return the global booking URL — falls back to '#' if unset.
 */
function slaydbyjade_booking_url() {
    $url = get_field( 'booking_url', 'option' );
    return $url ? esc_url( $url ) : 'https://slaydbyjade.as.me/schedule/d993e0c2';
}

/**
 * Output a social icon link. $network accepts 'instagram', 'facebook', 'tiktok', 'threads'.
 * $fallback_url is used when the ACF option field is not set.
 */
function slaydbyjade_social_link( $network, $label = '', $fallback_url = '' ) {
    $url = get_field( 'social_' . $network, 'option' ) ?: $fallback_url;
    if ( ! $url ) {
        return;
    }
    $icon_map = [
        'instagram' => '<svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>',
        'facebook'  => '<svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.413c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/></svg>',
        'tiktok'    => '<svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.3 6.3 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.18 8.18 0 004.78 1.52V6.78a4.86 4.86 0 01-1.01-.09z"/></svg>',
        'threads'   => '<svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12.186 24h-.007c-3.581-.024-6.334-1.205-8.184-3.509C2.35 18.44 1.5 15.586 1.472 12.01v-.017c.029-3.579.878-6.43 2.525-8.482C5.844 1.205 8.597.024 12.178 0h.014c2.746.02 5.043.725 6.826 2.098 1.677 1.29 2.858 3.13 3.509 5.467l-2.04.568c-1.104-3.96-3.898-5.983-8.304-6.014-2.91.022-5.11.936-6.54 2.717C4.307 6.504 3.616 8.914 3.589 12c.027 3.086.718 5.496 2.057 7.164 1.43 1.783 3.631 2.697 6.54 2.717 2.623-.02 4.358-.631 5.8-2.045 1.647-1.613 1.618-3.593 1.09-4.798-.31-.71-.873-1.3-1.634-1.75-.192 1.352-.622 2.446-1.284 3.272-.886 1.102-2.14 1.704-3.73 1.79-1.202.065-2.361-.218-3.259-.801-1.063-.689-1.685-1.74-1.752-2.964-.065-1.19.408-2.285 1.33-3.082.88-.76 2.119-1.207 3.583-1.291a13.853 13.853 0 013.02.142c-.126-.742-.375-1.332-.74-1.755-.453-.518-1.125-.786-2.002-.798h-.034c-.71 0-1.34.21-1.857.614-.43.335-.744.793-.911 1.314l-1.97-.557c.255-.84.716-1.578 1.357-2.14.823-.734 1.945-1.13 3.252-1.167h.056c1.54.022 2.818.542 3.695 1.502.849.928 1.322 2.24 1.411 3.902.165.087.327.178.486.272 1.257.75 2.166 1.748 2.637 2.832.826 1.894.866 4.748-1.482 7.065C19.3 23.243 16.916 23.98 12.186 24zm.137-12.952c-.146 0-.293.004-.44.012-1.028.058-1.889.384-2.367.88-.408.423-.594.96-.554 1.577.039.658.393 1.192.998 1.6.53.345 1.24.502 2.06.46 1.098-.06 1.921-.476 2.445-1.235.44-.625.673-1.48.68-2.532a11.762 11.762 0 00-2.822-.762z"/></svg>',
    ];
    $icon  = $icon_map[ $network ] ?? '';
    $label = $label ?: ucfirst( $network );
    echo '<a href="' . esc_url( $url ) . '" class="sbj-social-link sbj-social-link--' . esc_attr( $network ) . '" target="_blank" rel="noopener noreferrer" aria-label="' . esc_attr( $label ) . '">' . $icon . '</a>';
}

/**
 * Output the site logo — ACF field first, falls back to theme file.
 */
function slaydbyjade_logo( $class = 'sbj-logo__img' ) {
    $logo = get_field( 'site_logo', 'option' );
    if ( $logo && ! empty( $logo['url'] ) ) {
        $alt = ! empty( $logo['alt'] ) ? $logo['alt'] : get_bloginfo( 'name' );
        echo wp_get_attachment_image( $logo['ID'], 'full', false, [ 'class' => esc_attr( $class ), 'alt' => esc_attr( $alt ) ] );
    } else {
        $fallback = get_template_directory_uri() . '/assets/images/slayd-by-jade-logo.svg';
        /* Inline SVG fallback — documented exception: theme SVG logo, no attachment ID available. */
        echo '<img src="' . esc_url( $fallback ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" class="' . esc_attr( $class ) . '" width="200" height="80">';
    }
}

/**
 * Output the hero model image — ACF field first, falls back to theme file.
 */
function slaydbyjade_hero_image() {
    $img = get_field( 'hero_image' );
    if ( $img && ! empty( $img['ID'] ) ) {
        echo wp_get_attachment_image( $img['ID'], 'sbj-hero', false, [
            'class'         => 'sbj-hero__model-img',
            'alt'           => esc_attr( $img['alt'] ?: 'Slayd by Jade' ),
            'loading'       => 'eager',
            'fetchpriority' => 'high',
        ] );
    } else {
        $fallback = get_template_directory_uri() . '/assets/images/model-home.webp';
        /* Inline img fallback — documented exception: default hero model, no attachment ID until client uploads. */
        echo '<img src="' . esc_url( $fallback ) . '" alt="Slayd by Jade hero model" class="sbj-hero__model-img" width="600" height="900" loading="eager" fetchpriority="high">';
    }
}

/**
 * Sanitize and return a WP_Query for a CPT ordered by menu_order.
 */
function slaydbyjade_get_cpt_query( $post_type, $posts_per_page = -1 ) {
    return new WP_Query( [
        'post_type'      => sanitize_key( $post_type ),
        'posts_per_page' => absint( $posts_per_page ) ?: -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
        'post_status'    => 'publish',
    ] );
}

<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        get_template_part( 'partials/header' );
        the_content();
        get_template_part( 'partials/footer' );
    }
} else {
    get_template_part( 'partials/header' );
    echo '<main class="sbj-main"><p class="sbj-no-results">' . esc_html__( 'Nothing found.', 'slaydbyjade' ) . '</p></main>';
    get_template_part( 'partials/footer' );
}

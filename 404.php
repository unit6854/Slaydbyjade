<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php get_template_part( 'partials/header' ); ?>
<main class="sbj-main sbj-404">
    <div class="sbj-container">
        <h1 class="sbj-404__heading"><?php esc_html_e( '404', 'slaydbyjade' ); ?></h1>
        <p class="sbj-404__message"><?php esc_html_e( 'This page could not be found.', 'slaydbyjade' ); ?></p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="sbj-btn sbj-btn--primary"><?php esc_html_e( 'Return Home', 'slaydbyjade' ); ?></a>
    </div>
</main>
<?php get_template_part( 'partials/footer' ); ?>

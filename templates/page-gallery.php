<?php
/**
 * Template Name: Gallery Page
 */
get_template_part( 'partials/header' );

$uploads    = wp_upload_dir();
$base_dir   = $uploads['basedir'] . '/2026/05/';
$base_url   = $uploads['baseurl'] . '/2026/05/';
$raw_files  = glob( $base_dir . 'gallery-*.webp' );
$gallery    = [];
if ( ! empty( $raw_files ) ) {
    sort( $raw_files );
    foreach ( $raw_files as $i => $path ) {
        $gallery[] = [
            'url' => $base_url . '/' . basename( $path ),
            'alt' => 'Slayd by Jade — style ' . ( $i + 1 ),
        ];
    }
}
?>

<main class="sbj-main sbj-gallery-page" id="main-content">

    <section class="sbj-page-hero sbj-page-hero--gallery" aria-label="Gallery header">
        <div class="sbj-container">
            <p class="sbj-section-script">The Work</p>
            <h1 class="sbj-page-hero__title">GALLERY</h1>
            <div class="sbj-section-divider" aria-hidden="true"></div>
            <p class="sbj-page-hero__sub">Protective styles crafted with care — every braid, every loc, every look.</p>
        </div>
    </section>

    <section class="sbj-gallery-full sbj-container" aria-label="Photo gallery">
        <?php if ( ! empty( $gallery ) ) : ?>
            <div class="sbj-gallery-grid sbj-gallery-grid--full">
                <?php foreach ( $gallery as $i => $img ) : ?>
                    <a href="<?php echo esc_url( $img['url'] ); ?>"
                       class="sbj-gallery-item sbj-reveal"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="<?php echo esc_attr( $img['alt'] ); ?>">
                        <img src="<?php echo esc_url( $img['url'] ); ?>"
                             alt="<?php echo esc_attr( $img['alt'] ); ?>"
                             class="sbj-gallery-item__img"
                             loading="lazy"
                             decoding="async">
                        <div class="sbj-gallery-item__overlay" aria-hidden="true">
                            <svg class="sbj-gallery-item__zoom" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14zm2.5-4h-2v2H9v-2H7V9h2V7h1v2h2v1z"/></svg>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p class="sbj-no-results">Gallery photos coming soon.</p>
        <?php endif; ?>
    </section>

</main>
<?php get_template_part( 'partials/footer' ); ?>

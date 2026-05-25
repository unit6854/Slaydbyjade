<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Template Name: Gallery Page
 */
get_template_part( 'partials/header' );

$subtext = get_field( 'gallery_subtext' ) ?: 'Protective styles crafted with care — every braid, every loc, every look.';
$base    = content_url( 'uploads/2026/05/' );

$images = [
    'gallery-1.webp',
    'gallery-2.webp',
    'gallery-3.webp',
    'gallery-4.webp',
    'gallery-5.webp',
    'gallery-6.webp',
    'gallery-7.webp',
    'gallery-8.webp',
    'gallery-9.webp',
    'gallery-10.webp',
];

$videos = [
    'gallery-video-1.mp4',
    'gallery-video-2.mp4',
];
?>

<main class="sbj-main sbj-gallery-page" id="main-content">

    <section class="sbj-page-hero sbj-page-hero--gallery" aria-label="Gallery header">
        <div class="sbj-container">
            <p class="sbj-section-script">The Work</p>
            <h1 class="sbj-page-hero__title">GALLERY</h1>
            <div class="sbj-section-divider" aria-hidden="true"></div>
            <p class="sbj-page-hero__sub"><?php echo esc_html( $subtext ); ?></p>
        </div>
    </section>

    <section class="sbj-gallery-full sbj-container" aria-label="Photo gallery">

        <div class="sbj-gallery-grid sbj-gallery-grid--full">
            <?php foreach ( $images as $i => $img ) :
                $url = $base . $img;
                $alt = 'Slayd by Jade — style ' . ( $i + 1 );
            ?>
                <a href="<?php echo esc_url( $url ); ?>"
                   class="sbj-gallery-item sbj-reveal"
                   data-lightbox="gallery"
                   aria-label="<?php echo esc_attr( $alt ); ?>">
                    <img src="<?php echo esc_url( $url ); ?>"
                         alt="<?php echo esc_attr( $alt ); ?>"
                         class="sbj-gallery-item__img"
                         loading="lazy"
                         decoding="async">
                    <div class="sbj-gallery-item__overlay" aria-hidden="true">
                        <span class="sbj-gallery-item__view-label">View</span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <?php if ( ! empty( $videos ) ) : ?>
        <div class="sbj-gallery-videos" aria-label="Video gallery">
            <?php foreach ( $videos as $i => $vid ) :
                $url = $base . $vid;
            ?>
                <div class="sbj-gallery-video sbj-reveal">
                    <video controls preload="none" class="sbj-gallery-video__player"
                           aria-label="Slayd by Jade — video <?php echo $i + 1; ?>">
                        <source src="<?php echo esc_url( $url ); ?>" type="video/mp4">
                    </video>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </section>

</main>
<?php get_template_part( 'partials/footer' ); ?>

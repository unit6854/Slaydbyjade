<?php
/**
 * Template Name: Single Service
 */
get_template_part( 'partials/header' );

if ( ! have_posts() ) {
    get_template_part( 'partials/footer' );
    exit;
}

the_post();

$category    = get_field( 'service_category_label' );
$duration    = get_field( 'service_duration' );
$price       = get_field( 'service_price' );
$deposit     = get_field( 'service_deposit' );
$description = get_field( 'service_description' );
$booking_url = get_field( 'service_booking_url' ) ?: slaydbyjade_booking_url();
$image       = get_field( 'service_image' );
?>

<main class="sbj-main sbj-single-service" id="main-content">

    <section class="sbj-page-hero sbj-page-hero--service-single" aria-label="Service header">
        <div class="sbj-container">
            <?php if ( $category ) : ?>
                <p class="sbj-section-script"><?php echo esc_html( $category ); ?></p>
            <?php endif; ?>
            <h1 class="sbj-page-hero__title"><?php the_title(); ?></h1>
            <?php if ( $price ) : ?>
                <p class="sbj-single-service__price"><?php echo esc_html( $price ); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <div class="sbj-container sbj-single-service__body">

        <div class="sbj-single-service__image-col">
            <?php if ( $image && ! empty( $image['ID'] ) ) : ?>
                <?php echo wp_get_attachment_image( $image['ID'], 'sbj-about', false, [ 'class' => 'sbj-single-service__img', 'alt' => esc_attr( $image['alt'] ?: get_the_title() ) ] ); ?>
            <?php elseif ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'sbj-about', [ 'class' => 'sbj-single-service__img', 'alt' => esc_attr( get_the_title() ) ] ); ?>
            <?php endif; ?>
        </div>

        <div class="sbj-single-service__details">
            <dl class="sbj-single-service__meta">
                <?php if ( $duration ) : ?>
                    <dt>Duration</dt>
                    <dd><?php echo esc_html( $duration ); ?></dd>
                <?php endif; ?>
                <?php if ( $price ) : ?>
                    <dt>Price</dt>
                    <dd><?php echo esc_html( $price ); ?></dd>
                <?php endif; ?>
                <?php if ( $deposit ) : ?>
                    <dt>Deposit</dt>
                    <dd><?php echo esc_html( $deposit ); ?></dd>
                <?php endif; ?>
            </dl>

            <?php if ( $description ) : ?>
                <div class="sbj-single-service__description"><?php echo wp_kses_post( $description ); ?></div>
            <?php endif; ?>

            <a href="<?php echo esc_url( $booking_url ); ?>" class="sbj-btn sbj-btn--primary sbj-btn--lg" target="_blank" rel="noopener noreferrer">Book This Service</a>
            <a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="sbj-btn sbj-btn--text">&larr; All Services</a>
        </div>

    </div>

</main>
<?php get_template_part( 'partials/footer' ); ?>

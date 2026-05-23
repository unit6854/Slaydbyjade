<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$category    = get_field( 'service_category_label' );
$duration    = get_field( 'service_duration' );
$price       = get_field( 'service_price' );
$deposit     = get_field( 'service_deposit' );
$description = get_field( 'service_description' );
$booking_url = get_field( 'service_booking_url' ) ?: slaydbyjade_booking_url();
?>
<article class="sbj-service-card sbj-reveal" itemscope itemtype="https://schema.org/Service">

    <div class="sbj-service-card__top-line" aria-hidden="true"></div>

    <div class="sbj-service-card__body">

        <?php if ( $category ) : ?>
            <p class="sbj-service-card__category"><?php echo esc_html( $category ); ?></p>
        <?php endif; ?>

        <h3 class="sbj-service-card__title" itemprop="name"><?php the_title(); ?></h3>

        <div class="sbj-service-card__pricing">
            <?php if ( $price ) : ?>
                <span class="sbj-service-card__price" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                    <span itemprop="price"><?php echo esc_html( $price ); ?></span>
                </span>
            <?php endif; ?>
            <?php if ( $duration ) : ?>
                <span class="sbj-service-card__sep" aria-hidden="true">·</span>
                <span class="sbj-service-card__duration"><?php echo esc_html( $duration ); ?></span>
            <?php endif; ?>
        </div>

        <?php if ( $deposit ) : ?>
            <p class="sbj-service-card__deposit"><?php echo esc_html( $deposit ); ?> deposit</p>
        <?php endif; ?>

        <?php if ( $description ) : ?>
            <div class="sbj-service-card__desc"><?php echo wp_kses_post( $description ); ?></div>
        <?php endif; ?>

    </div>

    <a href="<?php echo esc_url( $booking_url ); ?>" class="sbj-btn sbj-btn--gold sbj-service-card__book" target="_blank" rel="noopener noreferrer">Book</a>

</article>

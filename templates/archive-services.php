<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Template Name: Services Archive
 */
get_template_part( 'partials/header' );
$booking = slaydbyjade_booking_url();
?>
<main class="sbj-main sbj-archive-services" id="main-content">

    <section class="sbj-page-hero sbj-page-hero--services" aria-label="Services header">
        <div class="sbj-container">
            <p class="sbj-section-script">What I Offer</p>
            <h1 class="sbj-page-hero__title">MY SERVICES</h1>
            <div class="sbj-section-divider" aria-hidden="true"></div>
            <p class="sbj-page-hero__sub">Protective styles. Timeless beauty. Book your transformation.</p>
        </div>
    </section>

    <!-- DEPOSIT INSTRUCTIONS -->
    <div class="sbj-deposit-notice sbj-container">
        <div class="sbj-deposit-notice__inner">
            <svg class="sbj-deposit-notice__icon" width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
            <div class="sbj-deposit-notice__text">
                <strong>Deposit Required to Secure Your Appointment</strong>
                <p>After booking, secure your deposit via <strong>Apple Pay</strong> or <strong>Cash App $SlaydbyJade25</strong> to <strong>615-525-0132</strong>. The deposit amount is listed under each service. Questions? Call or text <strong>615-525-0132</strong>.</p>
            </div>
        </div>
    </div>

    <!-- HAIR NOT INCLUDED NOTE -->
    <div class="sbj-hair-notice sbj-container">
        <div class="sbj-hair-notice__inner">
            <p class="sbj-hair-notice__label">Please note before booking</p>
            <p class="sbj-hair-notice__text">Hair is <strong>not included</strong> unless listed in the service. Please arrive with hair <strong>washed, blown out, and free of product and oil</strong>.</p>
            <a href="<?php echo esc_url( 'https://slaydbyjade.as.me/schedule/d993e0c2' ); ?>" class="sbj-btn sbj-btn--gold" target="_blank" rel="noopener noreferrer">Book Now — Hair Not Included</a>
        </div>
    </div>

    <!-- SERVICES LIST -->
    <section class="sbj-services-list sbj-container" aria-label="All services">
        <?php
        $query = slaydbyjade_get_cpt_query( 'services' );
        if ( $query->have_posts() ) :
        ?>
            <div class="sbj-services-grid sbj-services-grid--full">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php get_template_part( 'partials/card-services' ); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <!-- Fallback: hardcoded service menu -->
            <?php
            $service_groups = [
                'KNOTLESS BRAIDS' => [
                    [ 'title' => 'Medium Knotless Braids',        'price' => '$200', 'duration' => '4–5 hrs', 'deposit' => '$25', 'note' => 'Hair included' ],
                    [ 'title' => 'Large Knotless Braids',         'price' => '$160', 'duration' => '3–4 hrs', 'deposit' => '$25', 'note' => 'Hair included' ],
                    [ 'title' => 'Small Knotless Braids',         'price' => '$250', 'duration' => '6–7 hrs', 'deposit' => '$50', 'note' => 'Hair included' ],
                    [ 'title' => 'XS Knotless Braids',            'price' => '$300', 'duration' => '8+ hrs',  'deposit' => '$50', 'note' => 'Hair included' ],
                    [ 'title' => 'Medium Boho Knotless Braids',   'price' => '$250', 'duration' => '5–6 hrs', 'deposit' => '$50', 'note' => 'Human boho hair included' ],
                    [ 'title' => 'Large Boho Knotless Braids',    'price' => '$200', 'duration' => '4–5 hrs', 'deposit' => '$50', 'note' => 'Human boho hair included' ],
                ],
                'SOFT LOCS' => [
                    [ 'title' => 'Mid Back Soft Locs',            'price' => '$200', 'duration' => '5 hrs',   'deposit' => '$50', 'note' => 'Hair included' ],
                    [ 'title' => 'Waist Length Soft Locs',        'price' => '$230', 'duration' => '6 hrs',   'deposit' => '$50', 'note' => 'Hair included' ],
                    [ 'title' => 'Hip Length Soft Locs',          'price' => '$260', 'duration' => '7 hrs',   'deposit' => '$50', 'note' => 'Hair included' ],
                    [ 'title' => 'Butterfly Locs',                'price' => '$230', 'duration' => '6 hrs',   'deposit' => '$50', 'note' => 'Hair included' ],
                ],
                'ISLAND TWIST' => [
                    [ 'title' => 'Medium Island Twist',           'price' => '$250', 'duration' => '5 hrs',   'deposit' => '$50', 'note' => 'Human boho hair included' ],
                    [ 'title' => 'Small Island Twist',            'price' => '$300', 'duration' => '6–7 hrs', 'deposit' => '$50', 'note' => 'Human boho hair included' ],
                    [ 'title' => 'Large Island Twist',            'price' => '$200', 'duration' => '4 hrs',   'deposit' => '$50', 'note' => 'Human boho hair included' ],
                ],
                'FULANI BRAIDS' => [
                    [ 'title' => 'Fulani Braids',                 'price' => '$200', 'duration' => '5 hrs',   'deposit' => '$25', 'note' => 'Hair included' ],
                    [ 'title' => 'Boho Fulani Braids',            'price' => '$250', 'duration' => '5–6 hrs', 'deposit' => '$50', 'note' => 'Human boho hair included' ],
                ],
                'LOC STYLES' => [
                    [ 'title' => 'Invisible Locs',                'price' => '$185', 'duration' => '6 hrs',   'deposit' => '$25', 'note' => 'Hair included' ],
                    [ 'title' => 'Faux Locs',                     'price' => '$200', 'duration' => '6 hrs',   'deposit' => '$25', 'note' => 'Hair included' ],
                    [ 'title' => 'Goddess Locs',                  'price' => '$230', 'duration' => '6–7 hrs', 'deposit' => '$50', 'note' => 'Human boho hair included' ],
                ],
                'STITCH & FEED-IN BRAIDS' => [
                    [ 'title' => '6 Feed In Braids',              'price' => '$110', 'duration' => '4 hrs',   'deposit' => '$25', 'note' => 'Hair included' ],
                    [ 'title' => '8 Feed In Braids',              'price' => '$130', 'duration' => '4–5 hrs', 'deposit' => '$25', 'note' => 'Hair included' ],
                    [ 'title' => 'Stitch Braids',                 'price' => '$130', 'duration' => '4 hrs',   'deposit' => '$25', 'note' => 'Hair included' ],
                ],
                'CROCHET STYLES' => [
                    [ 'title' => 'Crochet Braids',                'price' => '$130', 'duration' => '2–3 hrs', 'deposit' => '$25', 'note' => 'Hair not included' ],
                    [ 'title' => 'Crochet Locs',                  'price' => '$130', 'duration' => '2–3 hrs', 'deposit' => '$25', 'note' => 'Hair not included' ],
                ],
            ];
            ?>
            <div class="sbj-services-menu">
                <?php foreach ( $service_groups as $group_name => $services ) : ?>
                    <div class="sbj-services-menu__group sbj-reveal">
                        <h2 class="sbj-services-menu__group-title"><?php echo esc_html( $group_name ); ?></h2>
                        <div class="sbj-services-menu__cards">
                            <?php foreach ( $services as $svc ) : ?>
                                <div class="sbj-service-card">
                                    <div class="sbj-service-card__top-line" aria-hidden="true"></div>
                                    <div class="sbj-service-card__body">
                                        <h3 class="sbj-service-card__title"><?php echo esc_html( $svc['title'] ); ?></h3>
                                        <div class="sbj-service-card__pricing">
                                            <span class="sbj-service-card__price"><?php echo esc_html( $svc['price'] ); ?></span>
                                            <span class="sbj-service-card__sep" aria-hidden="true">·</span>
                                            <span class="sbj-service-card__duration"><?php echo esc_html( $svc['duration'] ); ?></span>
                                        </div>
                                        <p class="sbj-service-card__deposit"><?php echo esc_html( $svc['deposit'] ); ?> deposit · <?php echo esc_html( $svc['note'] ); ?></p>
                                    </div>
                                    <a href="<?php echo esc_url( $booking ); ?>" class="sbj-btn sbj-btn--gold sbj-service-card__book" target="_blank" rel="noopener noreferrer">Book</a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="sbj-services-list__cta">
                <p class="sbj-services-list__cta-note">30+ styles available · pricing subject to change · consult required for specialty styles</p>
                <a href="<?php echo esc_url( $booking ); ?>" class="sbj-btn sbj-btn--outline" target="_blank" rel="noopener noreferrer">View All &amp; Book on Acuity</a>
            </div>
        <?php endif; ?>
    </section>

    <?php
    $faq_items = get_field( 'faq_items' );
    if ( $faq_items ) :
    ?>
    <section class="sbj-faq" aria-labelledby="sbj-faq-heading">
        <div class="sbj-container">
            <header class="sbj-section-header sbj-reveal">
                <h2 class="sbj-section-title" id="sbj-faq-heading">FREQUENTLY ASKED QUESTIONS</h2>
                <div class="sbj-section-divider" aria-hidden="true"></div>
            </header>
            <div class="sbj-faq__list">
                <?php foreach ( $faq_items as $item ) :
                    if ( empty( $item['faq_question'] ) ) continue;
                ?>
                <details class="sbj-faq__item">
                    <summary class="sbj-faq__question"><?php echo esc_html( $item['faq_question'] ); ?></summary>
                    <div class="sbj-faq__answer"><?php echo wp_kses_post( $item['faq_answer'] ); ?></div>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- SCHEDULING SECTION -->
    <section class="sbj-scheduling" id="book" aria-labelledby="sbj-scheduling-heading">
        <div class="sbj-container">
            <header class="sbj-section-header sbj-reveal">
                <p class="sbj-section-script" aria-hidden="true">Let's Get You Booked</p>
                <h2 class="sbj-section-title" id="sbj-scheduling-heading">SCHEDULE YOUR APPOINTMENT</h2>
                <div class="sbj-section-divider" aria-hidden="true"></div>
            </header>
            <div class="sbj-acuity-embed sbj-reveal">
                <iframe
                    src="https://slaydbyjade.as.me/schedule/d993e0c2"
                    title="Schedule an Appointment — Slayd by Jade"
                    width="100%"
                    height="900"
                    frameborder="0"
                    scrolling="yes"
                    class="sbj-acuity-iframe"
                    loading="lazy"
                    allow="payment"
                ></iframe>
            </div>
        </div>
    </section>

</main>
<?php get_template_part( 'partials/footer' ); ?>

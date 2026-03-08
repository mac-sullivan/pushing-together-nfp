<?php
$hero_image   = pt_field( 'hero_image' );
$hero_heading = pt_field( 'hero_heading', 'We are<br>Pushing Together' );
$hero_sub     = pt_field( 'hero_subtext', 'A skateboard 501(c)(3) not for profit supporting children and young adults in DeKalb, IL and surrounding communities.' );
$cta_label    = pt_field( 'hero_cta_label', 'Learn More' );
$cta_url      = pt_field( 'hero_cta_url', home_url('/about') );
$donate_url   = pt_field( 'donate_url', home_url('/donate'), 'option' );
?>
<section class="hero">

  <?php if ( $hero_image ) : ?>
    <img class="hero-bg"
         src="<?php echo esc_url( $hero_image['url'] ); ?>"
         alt="<?php echo esc_attr( $hero_image['alt'] ); ?>"
         loading="eager">
  <?php else : ?>
    <!-- Placeholder — replace via ACF in WP Admin -->
    <div class="hero-bg" style="background: #1a1a2e;"></div>
  <?php endif; ?>

  <div class="hero-overlay"></div>

  <div class="container">
    <div class="hero-content">
      <h1><?php echo wp_kses( $hero_heading, [ 'br' => [], 'em' => [], 'strong' => [] ] ); ?></h1>
      <p><?php echo esc_html( $hero_sub ); ?></p>
      <div class="hero-actions">
        <a href="<?php echo esc_url( $cta_url ); ?>" class="btn btn-primary">
          <?php echo esc_html( $cta_label ); ?>
        </a>
        <a href="<?php echo esc_url( $donate_url ); ?>" class="btn btn-outline">
          Donate
        </a>
      </div>
    </div>
  </div>

</section>

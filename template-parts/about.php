<?php
$heading = pt_field( 'about_heading', 'About Us' );
$content = pt_field( 'about_content', '<p>Pushing Together is a 501(c)(3) non-profit organization based in DeKalb, Illinois. We believe skateboarding is more than a sport — it\'s a vehicle for building confidence, resilience, and community in young people who need it most.</p><p>Through free skateboarding programs, equipment drives, and community events, we\'ve helped hundreds of kids find their footing — on and off the board.</p>' );
?>
<section class="about">
  <div class="container">
    <h2><?php echo esc_html( $heading ); ?></h2>
    <div class="about-content">
      <?php echo wp_kses_post( $content ); ?>
    </div>
  </div>
</section>

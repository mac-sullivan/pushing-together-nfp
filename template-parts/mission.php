<?php
$heading = pt_field( 'mission_heading', 'Confidence on four wheels delivered straight to kids who need it most' );
$sub     = pt_field( 'mission_subtext', 'Pushing Together believes every child deserves access to the joy, discipline, and community that skateboarding builds.' );
?>
<section class="mission">
  <div class="container">
    <h2><?php echo wp_kses( $heading, [ 'em' => [], 'strong' => [], 'br' => [] ] ); ?></h2>
    <p><?php echo esc_html( $sub ); ?></p>
  </div>
</section>

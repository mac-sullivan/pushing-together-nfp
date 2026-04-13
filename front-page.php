<?php get_header(); ?>

<main id="main-content">
  <?php
  $first     = true;
  $after_vid = false;  // alternate bg after the video
  if ( have_rows( 'page_sections' ) ) :
    while ( have_rows( 'page_sections' ) ) : the_row();
      $layout = get_row_layout();

      // Force alternating backgrounds after the video section
      if ( $after_vid ) {
        global $pt_force_bg;
        $pt_force_bg = $after_vid % 2 === 1 ? 'light' : 'white';
        $after_vid++;
      }

      get_template_part( 'template-parts/layouts/' . $layout );

      // Drop marquee strip after the first section (hero)
      if ( $first ) {
        get_template_part( 'template-parts/marquee' );
        $first = false;
      }
      // Drop video after the mission section
      if ( $layout === 'mission' ) {
        get_template_part( 'template-parts/video-local', null, [
          'eyebrow' => 'Check us out!',
          'heading'  => 'This is what Pushing Together looks like.',
        ] );
        $after_vid = 1;
      }
    endwhile;
    // Clean up
    unset( $GLOBALS['pt_force_bg'] );
  else :
    // Fallback if no sections set yet
    get_template_part( 'template-parts/layouts/hero' );
    get_template_part( 'template-parts/marquee' );
  endif;
  ?>
</main>

<?php get_footer(); ?>

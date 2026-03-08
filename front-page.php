<?php get_header(); ?>

<main id="main-content">
  <?php
  $first = true;
  if ( have_rows( 'page_sections' ) ) :
    while ( have_rows( 'page_sections' ) ) : the_row();
      $layout = get_row_layout();
      get_template_part( 'template-parts/layouts/' . $layout );
      // Drop marquee strip after the first section (hero)
      if ( $first ) {
        get_template_part( 'template-parts/marquee' );
        $first = false;
      }
    endwhile;
  else :
    // Fallback if no sections set yet
    get_template_part( 'template-parts/layouts/hero' );
    get_template_part( 'template-parts/marquee' );
  endif;
  ?>
</main>

<?php get_footer(); ?>

<?php get_header(); ?>

<main id="main-content">

  <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'template-parts/page-hero' ); ?>
  <?php endwhile; ?>

  <?php if ( have_rows( 'page_sections' ) ) : ?>
    <?php while ( have_rows( 'page_sections' ) ) : the_row(); ?>
      <?php
      $layout = get_row_layout();
      get_template_part( 'template-parts/layouts/' . $layout );
      ?>
    <?php endwhile; ?>
  <?php else : ?>
    <!-- Fallback: render page content -->
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="page-content container" style="padding: 4rem 2rem;">
        <div><?php the_content(); ?></div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>

</main>

<?php get_footer(); ?>

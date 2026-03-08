<?php get_header(); ?>

<div class="blog-archive-page">

  <!-- Page header -->
  <div class="blog-archive-header">
    <div class="container">
      <span class="blog-eyebrow">Blog</span>
      <h1 class="blog-archive-title">Stories, updates,<br>and community.</h1>
      <p class="blog-archive-sub">News from the skate park — youth spotlights, program updates, and ways to get involved.</p>
    </div>
  </div>

  <!-- Post grid -->
  <div class="blog-archive-body">
    <div class="container">
      <?php if ( have_posts() ) : ?>
        <div class="blog-grid">
          <?php while ( have_posts() ) : the_post();
            $thumb    = get_the_post_thumbnail_url( get_the_ID(), 'large' );
            $cats     = get_the_category();
            $cat_name = $cats ? esc_html( $cats[0]->name ) : '';
            $excerpt  = get_the_excerpt();
          ?>
          <article class="blog-card">
            <a href="<?php the_permalink(); ?>" class="blog-card-img-link" tabindex="-1" aria-hidden="true">
              <div class="blog-card-img">
                <?php if ( $thumb ) : ?>
                  <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                <?php else : ?>
                  <div class="blog-card-img-placeholder"></div>
                <?php endif; ?>
              </div>
            </a>
            <div class="blog-card-body">
              <?php if ( $cat_name ) : ?>
                <span class="blog-card-cat"><?php echo $cat_name; ?></span>
              <?php endif; ?>
              <h2 class="blog-card-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
              <p class="blog-card-excerpt"><?php echo wp_trim_words($excerpt, 22, '…'); ?></p>
              <div class="blog-card-meta">
                <span class="blog-card-date"><?php echo get_the_date('M j, Y'); ?></span>
                <a href="<?php the_permalink(); ?>" class="blog-card-read-more">
                  Read story
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
              </div>
            </div>
          </article>
          <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="blog-pagination">
          <?php the_posts_pagination(['mid_size' => 2, 'prev_text' => '← Newer', 'next_text' => 'Older →']); ?>
        </div>

        <?php else : ?>
          <div class="blog-empty">
            <p>No posts yet — check back soon.</p>
          </div>
        <?php endif; ?>
  </div>
        <!-- CTA Banner -->
        <?php get_template_part('template-parts/layouts/cta_banner'); ?>
  </div>

</div>

<?php get_footer(); ?>

<?php get_header(); the_post();
$thumb    = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$cats     = get_the_category();
$cat_name = $cats ? esc_html($cats[0]->name) : '';
$cat_url  = $cats ? get_category_link($cats[0]->term_id) : '';
?>

<article class="single-post">

  <!-- Hero -->
  <div class="single-post-hero<?php echo $thumb ? ' has-image' : ''; ?>">
    <?php if ($thumb) : ?>
      <div class="single-hero-img-wrap">
        <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" loading="eager">
        <div class="single-hero-overlay"></div>
      </div>
    <?php endif; ?>
    <div class="container single-hero-content">
      <?php if ($cat_name) : ?>
        <a href="<?php echo esc_url($cat_url); ?>" class="single-post-cat"><?php echo $cat_name; ?></a>
      <?php endif; ?>
      <h1 class="single-post-title"><?php the_title(); ?></h1>
      <div class="single-post-meta">
        <span><?php echo get_the_date('F j, Y'); ?></span>
        <span class="meta-sep">·</span>
        <span><?php echo ceil(str_word_count(strip_tags(get_the_content())) / 200); ?> min read</span>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="single-post-body">
    <div class="container">
      <div class="single-post-content">
        <?php the_content(); ?>
      </div>

      <!-- Back link -->
      <div class="single-post-footer">
        <a href="<?php echo get_post_type_archive_link('post') ?: home_url('/blog'); ?>" class="single-back-link">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
          Back to Blog
        </a>

        <?php
        $prev = get_previous_post();
        $next = get_next_post();
        if ($prev || $next) : ?>
          <div class="single-post-nav">
            <?php if ($next) : ?>
              <a href="<?php echo get_permalink($next); ?>" class="post-nav-link post-nav-prev">
                <span class="nav-direction">← Previous</span>
                <span class="nav-title"><?php echo get_the_title($next); ?></span>
              </a>
            <?php endif; ?>
            <?php if ($prev) : ?>
              <a href="<?php echo get_permalink($prev); ?>" class="post-nav-link post-nav-next">
                <span class="nav-direction">Next →</span>
                <span class="nav-title"><?php echo get_the_title($prev); ?></span>
              </a>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

</article>

<?php get_template_part('template-parts/layouts/cta_banner'); ?>

<?php get_footer(); ?>

<?php
$bg       = get_sub_field('hero_bg');
$heading  = get_sub_field('hero_heading') ?: 'We are<br>Pushing Together';
$subtext  = get_sub_field('hero_subtext') ?: 'A skateboard 501(c)(3) not for profit supporting children and young adults in DeKalb, IL and surrounding communities.';
$cta1_l   = get_sub_field('hero_cta_label') ?: 'Learn More';
$cta1_url = get_sub_field('hero_cta_url') ?: home_url('/about');
$cta2_l   = get_sub_field('hero_secondary_label') ?: 'Donate';
$cta2_url = get_sub_field('hero_secondary_url') ?: home_url('/donate');
?>
<section class="section-hero">
  <!-- Right: image as design element -->
  <div class="hero-image-wrap">
    <?php if ($bg) : ?>
      <img src="<?php echo esc_url($bg['url']); ?>" alt="<?php echo esc_attr($bg['alt']); ?>" class="hero-img" loading="eager">
    <?php else : ?>
      <div class="hero-img hero-img--placeholder"></div>
    <?php endif; ?>
  </div>
  <div class="container">
  <div class="section-hero-inner">

    <!-- Two-column hero body -->
    <div class="hero-body">

      <!-- Left: text -->
      <div class="hero-text">
        <span class="hero-eyebrow">501(c)(3) Non-Profit · DeKalb, IL</span>
        <h1><?php echo wp_kses($heading, ['br' => [], 'em' => [], 'strong' => []]); ?></h1>
        <p><?php echo esc_html($subtext); ?></p>
        <div class="hero-actions">
          <a href="<?php echo esc_url($cta1_url); ?>" class="btn btn-primary"><?php echo esc_html($cta1_l); ?></a>
          <a href="<?php echo esc_url($cta2_url); ?>" class="btn btn-ghost"><?php echo esc_html($cta2_l); ?></a>
        </div>
      </div>

    </div>

    <!-- Scroll indicator -->
    <a href="#main-after-hero" class="hero-scroll-indicator" aria-label="Scroll down">
      <span>Scroll</span>
      <div class="scroll-line"></div>
    </a>

  </div>
  </div>
</section>
<div id="main-after-hero"></div>

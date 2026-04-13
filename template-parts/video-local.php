<?php
/**
 * Self-hosted video block with poster thumbnail + play button.
 *
 * Expects $args['heading'] (optional) passed via get_template_part().
 */
$eyebrow = $args['eyebrow'] ?? '';
$heading = $args['heading'] ?? '';
$bg      = $args['bg'] ?? 'white';
$video   = get_theme_file_uri('assets/videos/pushing-together-video.mp4');
$poster  = get_theme_file_uri('assets/images/pushing-together-screenshot-thumb.webp');
?>
<section class="section-video-local section-video-local--<?php echo esc_attr($bg); ?>">
  <div class="container">
    <?php if ($eyebrow) : ?>
      <p class="section-eyebrow video-local-eyebrow"><?php echo esc_html($eyebrow); ?></p>
    <?php endif; ?>
    <?php if ($heading) : ?>
      <h2><?php echo esc_html($heading); ?></h2>
    <?php endif; ?>
    <div class="video-wrap" data-src="<?php echo esc_url($video); ?>">
      <img class="video-poster" src="<?php echo esc_url($poster); ?>" alt="Play video" loading="lazy">
      <button class="video-play-btn" aria-label="Play video">
        <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="40" cy="40" r="39" stroke="white" stroke-width="2" fill="rgba(0,0,0,0.45)"/>
          <polygon points="32,24 58,40 32,56" fill="white"/>
        </svg>
      </button>
    </div>
  </div>
</section>

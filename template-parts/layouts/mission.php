<?php
$eyebrow      = get_sub_field('mission_eyebrow');
$heading      = get_sub_field('mission_heading') ?: 'Confidence on four wheels delivered straight to kids who need it most';
$accent_word  = get_sub_field('mission_accent_word') ?: 'Confidence';
$subtext      = get_sub_field('mission_subtext');
$cta_label    = get_sub_field('mission_cta_label');
$cta_url      = get_sub_field('mission_cta_url');

// Wrap the accent word in a span
$heading_html = str_ireplace(
  $accent_word,
  '<em>' . esc_html($accent_word) . '</em>',
  esc_html($heading)
);
?>
<section class="section-mission">
  <div class="container">
    <?php if ($eyebrow) : ?>
      <p class="section-eyebrow"><?php echo esc_html($eyebrow); ?></p>
    <?php endif; ?>
    <h2 class="mission-heading"><?php echo $heading_html; ?></h2>
    <?php if ($subtext) : ?>
      <p class="mission-subtext"><?php echo esc_html($subtext); ?></p>
    <?php endif; ?>
    <?php if ($cta_label && $cta_url) : ?>
      <a href="<?php echo esc_url($cta_url); ?>" class="btn btn-primary"><?php echo esc_html($cta_label); ?></a>
    <?php endif; ?>
  </div>
</section>

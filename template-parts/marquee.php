<?php
/**
 * Marquee Strip — repeating text band between hero and content
 */
$items = [
  'Pushing Together',
  'Skate. Grow. Thrive.',
  'DeKalb, IL',
  'Supporting Youth',
  'Community First',
  'Pushing Together',
  'Skate. Grow. Thrive.',
  'DeKalb, IL',
  'Supporting Youth',
  'Community First',
];
?>
<div class="marquee-strip" aria-hidden="true">
  <div class="marquee-inner">
    <?php foreach ( $items as $item ) : ?>
      <div class="marquee-item">
        <?php echo esc_html( $item ); ?>
        <span class="marquee-dot"></span>
      </div>
    <?php endforeach; ?>
    <?php // Duplicate for seamless loop
    foreach ( $items as $item ) : ?>
      <div class="marquee-item">
        <?php echo esc_html( $item ); ?>
        <span class="marquee-dot"></span>
      </div>
    <?php endforeach; ?>
  </div>
</div>

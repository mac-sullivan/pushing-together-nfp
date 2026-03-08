<?php
/**
 * Template for /contact/ — WordPress auto-loads page-contact.php
 */
add_filter('body_class', function($classes) { $classes[] = 'page-contact'; return $classes; });
get_header();
?>

<div class="contact-page">
  <?php get_template_part('template-parts/layouts/contact_form'); ?>
  <?php get_template_part('template-parts/layouts/cta_banner'); ?>
</div>

<?php get_footer(); ?>

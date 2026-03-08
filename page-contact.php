<?php
/**
 * Template for /contact/ — WordPress auto-loads page-contact.php
 */
add_filter('body_class', function($classes) { $classes[] = 'page-contact'; return $classes; });
get_header();
?>

<div class="contact-page">

  <div class="page-archive-header">
    <div class="container">
      <span class="page-archive-eyebrow">Get in touch</span>
      <h1 class="page-archive-title">Let's connect.</h1>
      <p class="page-archive-sub">We respond to every message — usually within 24 hours.</p>
    </div>
  </div>

  <?php get_template_part('template-parts/layouts/contact_form'); ?>
  <?php get_template_part('template-parts/layouts/cta_banner'); ?>
</div>

<?php get_footer(); ?>

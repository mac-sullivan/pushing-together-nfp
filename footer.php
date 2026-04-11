<?php
$donate_url    = pt_field('donate_url', home_url('/donate'), 'option');
$instagram_url = pt_field('instagram_url', 'https://instagram.com/pushingtogethernfp', 'option');
$facebook_url  = pt_field('facebook_url', '#', 'option');
$tagline       = pt_field('footer_tagline', 'Building confidence and community through skateboarding.', 'option');
?>

<footer id="site-footer">

  <!-- ── Main footer body ───────────────────────────────────── -->
  <div class="footer-body">

    <!-- Oversized brand watermark -->
    <div class="footer-wordmark" aria-hidden="true">Pushing Together</div>

    <div class="container footer-inner">

      <!-- Col 1: Brand -->
      <div class="footer-brand">
        <div class="footer-logo">
          <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php bloginfo('name'); ?>">
            <?php echo pt_logo_svg(30, 'pt-logo'); ?>
          </a>
        </div>
        <p class="footer-tagline"><?php echo esc_html($tagline); ?></p>

        <!-- Location -->
        <div class="footer-location">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
          <span>DeKalb, Illinois</span>
        </div>

        <!-- Social -->
        <div class="footer-social">
          <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener" aria-label="Instagram">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
          </a>
          <?php if ($facebook_url && $facebook_url !== '#') : ?>
          <a href="<?php echo esc_url($facebook_url); ?>" target="_blank" rel="noopener" aria-label="Facebook">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          </a>
          <?php endif; ?>
          <!-- <a href="#" aria-label="TikTok">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.27 6.27 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.83a8.18 8.18 0 004.78 1.52V6.9a4.85 4.85 0 01-1.01-.21z"/></svg>
          </a> -->
        </div>
      </div>

      <!-- Col 2: Pages -->
      <div class="footer-links-col">
        <h3>Navigate</h3>
        <ul>
          <?php foreach (['Home' => '/', 'About' => '/about', 'Contact' => '/contact', 'Donate' => '/donate'] as $label => $path) : ?>
            <li><a href="<?php echo home_url($path); ?>"><?php echo $label; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Col 3: Get Involved -->
      <div class="footer-links-col">
        <h3>Get Involved</h3>
        <ul>
          <li><a href="<?php echo esc_url($donate_url); ?>">Donate</a></li>
          <li><a href="<?php echo home_url('/contact'); ?>">Volunteer</a></li>
          <li><a href="<?php echo home_url('/contact'); ?>">Sponsor Us</a></li>
          <li><a href="<?php echo home_url('/contact'); ?>">Host an Event</a></li>
        </ul>
      </div>

      <!-- Col 4: Legal Docs -->
      <div class="footer-links-col">
        <h3>Legal</h3>
        <ul>
          <li><a href="<?php echo esc_url(home_url('/wp-content/uploads/2026/04/501c3p2-one.png')); ?>" target="_blank" rel="noopener">501c3p2 (1)</a></li>
          <li><a href="<?php echo esc_url(home_url('/wp-content/uploads/2026/04/501c3p2-two.png')); ?>" target="_blank" rel="noopener">501c3p2 (2)</a></li>
          <li><a href="<?php echo esc_url(home_url('/wp-content/uploads/2026/04/ein.png')); ?>" target="_blank" rel="noopener">EIN</a></li>
        </ul>
      </div>

      <!-- Col 5: Contact -->
      <div class="footer-links-col footer-contact-col">
        <h3>Contact</h3>
        <ul class="footer-contact-list">
          <li>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            <a href="mailto:info@pushingtogether.org">info@pushingtogether.org</a>
          </li>
          <li>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <span>DeKalb, IL &amp; Sycamore, IL</span>
          </li>
          <li>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
            <span>501(c)(3) Non-Profit</span>
          </li>
        </ul>
      </div>

    </div><!-- .footer-inner -->

    <!-- Divider -->
    <div class="footer-divider container"></div>

  </div><!-- .footer-body -->

  <!-- ── Bottom bar ─────────────────────────────────────────── -->
  <div class="footer-bottom">
    <div class="container footer-bottom-inner">
      <span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</span>
      <span class="footer-501">EIN: 85-1460885 · 501(c)(3) Non-Profit Organization</span>
    </div>
  </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>

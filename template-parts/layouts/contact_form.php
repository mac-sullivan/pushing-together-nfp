<?php
// No ACF fields needed — content is hardcoded for polish
?>
<section class="section-contact-form">

  <!-- Left: form panel -->
  <div class="contact-form-panel">
    <div class="contact-form-inner">
      <h2 class="contact-form-heading">Send a message</h2>

      <form class="contact-form" id="pt-contact-form" method="post" novalidate>
        <?php wp_nonce_field('pt_contact', 'pt_contact_nonce'); ?>

        <div class="form-row">
          <div class="form-group">
            <label for="cf-name">First name</label>
            <input type="text" id="cf-name" name="name" placeholder="Alex" autocomplete="given-name" required>
          </div>
          <div class="form-group">
            <label for="cf-email">Email <span class="required">*</span></label>
            <input type="email" id="cf-email" name="email" placeholder="alex@email.com" autocomplete="email" required>
          </div>
        </div>

        <div class="form-group">
          <label for="cf-subject">How can we help?</label>
          <div class="select-wrap">
            <select id="cf-subject" name="subject">
              <option value="">Select a topic</option>
              <option value="volunteer">I want to volunteer</option>
              <option value="donate">Donate equipment or gear</option>
              <option value="sponsor">Corporate sponsorship</option>
              <option value="event">Host or attend an event</option>
              <option value="general">General inquiry</option>
            </select>
            <svg class="select-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
          </div>
        </div>

        <div class="form-group">
          <label for="cf-message">Message <span class="required">*</span></label>
          <textarea id="cf-message" name="message" rows="5" placeholder="Tell us more…" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary contact-submit">
          <span class="btn-label">Send Message</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
        </button>

        <div class="contact-form-message" id="cf-message-box" aria-live="polite" hidden></div>
      </form>
    </div>
  </div>

  <!-- Right: dark info panel -->
  <div class="contact-info-panel">
    <div class="contact-info-glow" aria-hidden="true"></div>
    <div class="contact-info-inner">

      <span class="section-eyebrow contact-eyebrow">Get in Touch</span>
      <h1 class="contact-heading">Let's talk.<br><em>We'd love to<br>hear from you.</em></h1>
      <p class="contact-intro">Whether you want to volunteer, sponsor a session, donate gear, or just want to learn more — we respond to every message.</p>

      <ul class="contact-details">
        <li>
          <div class="detail-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </div>
          <div>
            <span class="detail-label">Email</span>
            <a href="mailto:hello@pushingtogethernfp.org">hello@pushingtogethernfp.org</a>
          </div>
        </li>
        <li>
          <div class="detail-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.09 9.81a19.79 19.79 0 01-3.07-8.67A2 2 0 012 .84h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.69a16 16 0 006.22 6.22l1.21-1.21a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
          </div>
          <div>
            <span class="detail-label">Phone</span>
            <a href="tel:+18155550147">(815) 555-0147</a>
          </div>
        </li>
        </ul>
        <ul class="contact-details">
        <li>
          <div class="detail-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <div>
            <span class="detail-label">Location</span>
            <span>DeKalb & Sycamore, IL</span>
          </div>
        </li>
        <li>
          <div class="detail-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div>
            <span class="detail-label">Sessions</span>
            <span>Sat 9am–1pm · Sun 10am–2pm</span>
          </div>
        </li>
      </ul>

      <div class="contact-social">
        <a href="https://instagram.com/pushingtogethernfp" target="_blank" rel="noopener" aria-label="Instagram">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
        </a>
      </div>

    </div>
  </div>

</section>

<script>
(function() {
  const form = document.getElementById('pt-contact-form');
  if (!form) return;
  form.addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = form.querySelector('.contact-submit');
    const label = btn.querySelector('.btn-label');
    const msg = document.getElementById('cf-message-box');
    btn.disabled = true;
    label.textContent = 'Sending…';
    const data = new FormData(form);
    data.append('action', 'pt_contact_submit');
    try {
      const res = await fetch('<?php echo esc_url(admin_url("admin-ajax.php")); ?>', { method: 'POST', body: data });
      const json = await res.json();
      msg.hidden = false;
      msg.className = 'contact-form-message ' + (json.success ? 'is-success' : 'is-error');
      msg.textContent = json.data?.message || (json.success ? 'Message sent! We\'ll be in touch.' : 'Something went wrong. Try emailing us directly.');
      if (json.success) { form.reset(); btn.style.display = 'none'; }
      else { btn.disabled = false; label.textContent = 'Send Message'; }
    } catch { msg.hidden = false; msg.className = 'contact-form-message is-error'; msg.textContent = 'Network error. Please email us directly.'; btn.disabled = false; label.textContent = 'Send Message'; }
  });
})();
</script>

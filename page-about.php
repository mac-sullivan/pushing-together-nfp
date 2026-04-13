<?php
/**
 * Template Name: About Page
 * Slug: about — WordPress auto-loads page-about.php for /about/
 */
get_header();

$img_community = wp_get_attachment_url(79);   // out-story-1-1.webp
$img_hero      = wp_get_attachment_url(11);   // pt-hero.jpeg
$img_class     = wp_get_attachment_url(173);  // slideshow-class-2.webp
?>

<div class="about-page">

  <!-- ── 1. HERO ─────────────────────────────────────────────── -->
  <section class="about-hero">
    <?php if ($img_community) : ?>
      <div class="about-hero-bg">
        <img src="<?php echo esc_url($img_community); ?>" alt="Pushing Together community" loading="eager">
        <div class="about-hero-overlay"></div>
      </div>
    <?php else : ?>
      <div class="about-hero-glow"></div>
    <?php endif; ?>
    <div class="container about-hero-content">
      <span class="about-hero-eyebrow">Who we are</span>
      <h1 class="about-hero-heading">We are<br>Pushing Together.</h1>
      <p class="about-hero-sub">A 501(c)(3) nonprofit building confidence, resilience, and community through skateboarding in DeKalb, Illinois.</p>
      <div class="about-hero-badges">
        <span class="about-hero-badge">Est. 2018</span>
        <span class="about-hero-badge">DeKalb, IL</span>
        <span class="about-hero-badge">501(c)(3)</span>
      </div>
    </div>
    <div class="about-hero-scroll">
      <span>Scroll</span>
      <div class="scroll-line"></div>
    </div>
  </section>

  <!-- ── 2. ORIGIN STORY ──────────────────────────────────────── -->
  <section class="about-origin">
    <div class="about-origin-inner container">
      <div class="about-origin-image-col reveal-left">
        <?php if ($img_class) : ?>
          <div class="about-origin-img-wrap">
            <img src="<?php echo esc_url($img_class); ?>" alt="Skate session" loading="lazy">
          </div>
        <?php endif; ?>
        <div class="about-origin-year-badge">
          <span class="badge-year">2018</span>
          <span class="badge-label">Founded</span>
        </div>
      </div>
      <div class="about-origin-text-col reveal-right">
        <span class="section-eyebrow">How it started</span>
        <h2 class="about-origin-heading">A board.<br>A dream.<br>A community.</h2>
        <p>Pushing Together started with a simple idea: every kid in DeKalb should get to experience skateboarding, no matter what their family can afford. A group of local skaters came together because they believed the confidence, creativity, and friendships that come from skating shouldn't have a price tag. So we made it free. We gathered boards, helmets, and pads, found a space, and opened the door to anyone who wanted to roll. What started as a few weekend sessions quickly grew into something bigger than any of us expected.</p>
        <blockquote class="about-pull-quote">
          "We just wanted to give kids the same thing skateboarding gave us. A place to belong."
          <cite>The Pushing Together Community</cite>
        </blockquote>
      </div>
    </div>
  </section>

  <!-- ── VIDEO ─────────────────────────────────────────────────── -->
  <?php get_template_part('template-parts/video-local', null, [
    'eyebrow' => 'Check us out!',
    'heading'  => 'This is what Pushing Together looks like.',
    'bg'       => 'light',
  ]); ?>

  <!-- ── 3. MISSION STATEMENT ─────────────────────────────────── -->
  <section class="about-mission">
    <div class="container reveal">
      <span class="section-eyebrow about-mission-eyebrow">What drives us</span>
      <p class="about-mission-statement">
        Every kid deserves a place to
        <span class="mission-accent">belong.</span>
      </p>
      <p class="about-mission-body">Skateboarding is one of the few sports where you set your own goals, compete only with yourself, and the community lifts you up when you fall. We harness that culture to build self&#8209;confidence, resilience, and real friendships.</p>
    </div>
  </section>

  <!-- ── 4. STATS ──────────────────────────────────────────────── -->
  <section class="about-stats">
    <div class="container">
      <div class="about-stats-grid">
        <div class="about-stat">
          <span class="about-stat-num">500+</span>
          <span class="about-stat-label">Kids Served</span>
        </div>
        <div class="about-stat-divider"></div>
        <div class="about-stat">
          <span class="about-stat-num">6</span>
          <span class="about-stat-label">Years Running</span>
        </div>
        <div class="about-stat-divider"></div>
        <div class="about-stat">
          <span class="about-stat-num">100%</span>
          <span class="about-stat-label">Free Programs</span>
        </div>
        <div class="about-stat-divider"></div>
        <div class="about-stat">
          <span class="about-stat-num">$0</span>
          <span class="about-stat-label">Cost to Kids</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ── 5. WHAT WE DO ──────────────────────────────────────────── -->
  <section class="about-programs">
    <div class="container">
      <div class="about-programs-header reveal">
        <span class="section-eyebrow">What we do</span>
        <h2 class="about-programs-heading">Three ways we<br>show up for kids.</h2>
      </div>
      <div class="about-programs-grid stagger-group">
        <div class="about-program-card">
          <div class="program-card-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
          </div>
          <h3>Free Skate Lessons</h3>
          <p>Weekly sessions taught by trained volunteer coaches covering beginner through advanced skills. No experience required — just show up.</p>
        </div>
        <div class="about-program-card">
          <div class="program-card-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-4 0v2"/><path d="M8 7V5a2 2 0 0 1 4 0"/><line x1="12" y1="12" x2="12" y2="16"/><line x1="10" y1="14" x2="14" y2="14"/></svg>
          </div>
          <h3>Equipment Program</h3>
          <p>We source, refurbish, and donate boards, helmets, and pads so cost is never a barrier. Every kid gets the gear they need to ride safely.</p>
        </div>
        <div class="about-program-card">
          <div class="program-card-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <h3>Community Events</h3>
          <p>Skate jams, competitions, and fundraisers that bring families and neighborhoods together throughout the year. Skating is just the beginning.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── 6. PHOTO CAROUSEL (same as homepage) ────────────────────── -->
  <?php
  // Pull photo grid data from the front page's flexible content
  $front_id = (int) get_option('page_on_front');
  $photos   = [];
  $grid_url = '';
  $handle   = '';
  if ($front_id && have_rows('page_sections', $front_id)) :
    while (have_rows('page_sections', $front_id)) : the_row();
      if (get_row_layout() === 'photo_grid') {
        $photos   = get_sub_field('grid_photos') ?: [];
        $handle   = get_sub_field('grid_handle') ?: '';
        $grid_url = get_sub_field('grid_url') ?: '';
        break;
      }
    endwhile;
  endif;

  if ($photos) : ?>
    <section class="section-photo-grid">
      <div class="container">
        <div class="photo-grid-header">
          <h2>Follow the <em>Journey</em></h2>
          <?php if ($handle) : ?>
            <a class="grid-handle" href="<?php echo esc_url($grid_url ?: '#'); ?>" target="_blank" rel="noopener">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
              <?php echo esc_html($handle); ?>
            </a>
          <?php endif; ?>
        </div>
        <div class="swiper photo-swiper">
          <div class="swiper-wrapper">
            <?php foreach ($photos as $photo) :
              $img_url = is_array($photo) ? $photo['url'] : wp_get_attachment_url($photo);
              $img_alt = is_array($photo) ? ($photo['alt'] ?: 'Pushing Together') : get_post_meta($photo, '_wp_attachment_image_alt', true);
            ?>
              <div class="swiper-slide">
                <div class="photo-grid-item">
                  <?php if ($grid_url) : ?><a href="<?php echo esc_url($grid_url); ?>" target="_blank" rel="noopener"><?php endif; ?>
                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt ?: 'Pushing Together'); ?>" loading="lazy" decoding="async">
                  <?php if ($grid_url) : ?></a><?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="swiper-button-prev photo-swiper-prev"></div>
          <div class="swiper-button-next photo-swiper-next"></div>
        </div>
        <?php if ($grid_url) : ?>
          <div class="photo-grid-cta">
            <a href="<?php echo esc_url($grid_url); ?>" target="_blank" rel="noopener" class="btn btn-primary">Follow on Instagram</a>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>

  <!-- ── 7. GET INVOLVED CTA ────────────────────────────────────── -->
  <?php
  global $pt_cta_override;
  $pt_cta_override = [
    'eyebrow'    => 'Get involved',
    'heading'    => 'Want to be part of this?',
    'accent'     => '',
    'subtext'    => 'Volunteer, donate gear, sponsor a session — there are real ways to make a difference for kids in DeKalb.',
    'btn1_label' => 'Volunteer With Us',
    'btn1_url'   => home_url('/contact'),
    'btn2_label' => 'Make a Donation',
    'btn2_url'   => home_url('/donate'),
  ];
  get_template_part('template-parts/layouts/cta_banner'); ?>


</div>

<?php get_footer(); ?>

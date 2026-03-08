<?php
/**
 * Template Name: About Page
 * Slug: about — WordPress auto-loads page-about.php for /about/
 */
get_header();

$img_community = wp_get_attachment_url(79);   // out-story-1-1.webp
$img_hero      = wp_get_attachment_url(11);   // pt-hero.jpeg
$img_class     = wp_get_attachment_url(173);  // slideshow-class-2.webp
$img_a         = wp_get_attachment_url(80);
$img_b         = wp_get_attachment_url(81);
$img_c         = wp_get_attachment_url(82);
$img_d         = wp_get_attachment_url(83);
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
        <h2 class="about-origin-heading">A borrowed ramp.<br>A parking lot.<br>A few kids.</h2>
        <p>Founder Marcus Webb saw kids with energy, talent, and no outlet — and decided to do something about it. What began as informal Saturday sessions grew into structured programs, donated gear, and eventually a registered nonprofit serving kids ages 6–18 across three counties in northern Illinois.</p>
        <blockquote class="about-pull-quote">
          "Skateboarding gave me something to look forward to every week. We wanted every kid in DeKalb to have that feeling."
          <cite>— Marcus Webb, Founder</cite>
        </blockquote>
      </div>
    </div>
  </section>

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

  <!-- ── 6. PHOTO WALL ──────────────────────────────────────────── -->
  <section class="about-photos">
    <div class="about-photos-grid">
      <?php if ($img_a) : ?><div class="photo-cell"><img src="<?php echo esc_url($img_a); ?>" alt="" loading="lazy"></div><?php endif; ?>
      <?php if ($img_b) : ?><div class="photo-cell photo-cell-tall"><img src="<?php echo esc_url($img_b); ?>" alt="" loading="lazy"></div><?php endif; ?>
      <?php if ($img_c) : ?><div class="photo-cell"><img src="<?php echo esc_url($img_c); ?>" alt="" loading="lazy"></div><?php endif; ?>
      <?php if ($img_d) : ?><div class="photo-cell"><img src="<?php echo esc_url($img_d); ?>" alt="" loading="lazy"></div><?php endif; ?>
    </div>
    <div class="about-photos-caption container">
      <p>Sessions run every Saturday · DeKalb &amp; Sycamore, Illinois</p>
    </div>
  </section>

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

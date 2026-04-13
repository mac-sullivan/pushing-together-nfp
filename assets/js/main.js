/* ─── Pushing Together — main.js ──────────────────────────────── */


document.addEventListener('DOMContentLoaded', function () {

  // ─── Custom Cursor ─────────────────────────────────────────
  const cursorDot  = document.querySelector('.c-cursor-dot');
  const cursorRing = document.querySelector('.c-cursor-ring');

  if (cursorDot && cursorRing && window.matchMedia('(hover: hover)').matches) {
    let ringX = 0, ringY = 0;
    let dotX  = 0, dotY  = 0;
    let raf;

    const moveCursor = (e) => {
      dotX = e.clientX;
      dotY = e.clientY;
      cursorDot.style.left = dotX + 'px';
      cursorDot.style.top  = dotY + 'px';
    };

    const animateRing = () => {
      ringX += (dotX - ringX) * 0.14;
      ringY += (dotY - ringY) * 0.14;
      cursorRing.style.left = ringX + 'px';
      cursorRing.style.top  = ringY + 'px';
      raf = requestAnimationFrame(animateRing);
    };

    window.addEventListener('mousemove', moveCursor, { passive: true });
    animateRing();

    // Hover state on interactive elements
    const hoverTargets = document.querySelectorAll('a, button, [role="button"], .btn, label, input, textarea, select');
    hoverTargets.forEach(el => {
      el.addEventListener('mouseenter', () => {
        cursorDot.classList.add('is-hovering');
        cursorRing.classList.add('is-hovering');
      });
      el.addEventListener('mouseleave', () => {
        cursorDot.classList.remove('is-hovering');
        cursorRing.classList.remove('is-hovering');
      });
    });

    // Hide when leaving window
    document.addEventListener('mouseleave', () => {
      cursorDot.classList.add('is-hidden');
      cursorRing.classList.add('is-hidden');
    });
    document.addEventListener('mouseenter', () => {
      cursorDot.classList.remove('is-hidden');
      cursorRing.classList.remove('is-hidden');
    });
  }



  // ─── Mobile nav toggle ─────────────────────────────────────
  const toggle = document.querySelector('.nav-toggle');
  const mobileLinks = document.querySelector('.nav-links--mobile');
  const siteHeader = document.getElementById('site-header');
  if (toggle && mobileLinks) {
    toggle.addEventListener('click', () => {
      const open = mobileLinks.classList.toggle('open');
      toggle.classList.toggle('is-open', open);
      toggle.setAttribute('aria-expanded', open);
      document.body.classList.toggle('menu-open', open);
      if (siteHeader) siteHeader.classList.toggle('menu-open', open);
    });
  }

  // ─── Header scroll state ───────────────────────────────────
  const header = document.getElementById('site-header');
  if (header) {
    const isContact = document.body.classList.contains('page-contact');
    const hero = isContact ? null : document.querySelector('.section-hero, .page-hero, .pt-hero');
    const threshold = hero ? hero.offsetHeight - 100 : 80;

    // Mark header as dark-hero so CSS can style logo/links white
    if (hero) header.classList.add('over-dark-hero');

    const onScroll = () => {
      const scrolled = window.scrollY > threshold;
      header.classList.toggle('scrolled', scrolled);
      if (hero) header.classList.toggle('over-dark-hero', !scrolled);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  // ─── Scroll reveal ─────────────────────────────────────────
  const revealEls = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');

  const revealObs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('revealed');
        revealObs.unobserve(e.target);
      }
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

  revealEls.forEach(el => revealObs.observe(el));

  // Stagger groups — children reveal with cascading delay
  document.querySelectorAll('.stagger-group').forEach(group => {
    const children = Array.from(group.children);
    // Pre-set hidden state
    children.forEach((child, i) => {
      child.style.opacity = '0';
      child.style.transform = 'translateY(28px)';
      child.style.transition = `opacity 0.65s cubic-bezier(0.16,1,0.3,1) ${i * 0.12}s, transform 0.65s cubic-bezier(0.16,1,0.3,1) ${i * 0.12}s`;
    });
    const obs = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          children.forEach(child => {
            child.style.opacity = '1';
            child.style.transform = 'none';
          });
          obs.unobserve(e.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
    obs.observe(group);
  });

  // ─── Donate page: animated spend bars ─────────────────────
  document.querySelectorAll('.donate-bar-item').forEach(item => {
    const pct = item.dataset.pct;
    const fill = item.querySelector('.donate-bar-fill');
    if (!fill || !pct) return;
    fill.style.setProperty('--pct', pct + '%');
    const obs = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          // Trigger via JS transition instead of CSS animation so stagger works
          requestAnimationFrame(() => { fill.style.width = pct + '%'; });
          obs.unobserve(e.target);
        }
      });
    }, { threshold: 0.3 });
    obs.observe(item);
  });

  // ─── Animated stat counters ────────────────────────────────
  const statNumbers = document.querySelectorAll('.stat-number[data-count]');
  const countObs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (!e.isIntersecting) return;
      const el = e.target;
      const target = parseFloat(el.dataset.count);
      const suffix = el.dataset.suffix || '';
      const prefix = el.dataset.prefix || '';
      const duration = 1600;
      const start = performance.now();

      const update = (now) => {
        const p = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - p, 3); // ease-out cubic
        const val = Math.round(eased * target);
        el.textContent = prefix + val.toLocaleString() + suffix;
        if (p < 1) requestAnimationFrame(update);
      };
      requestAnimationFrame(update);
      countObs.unobserve(el);
    });
  }, { threshold: 0.5 });

  statNumbers.forEach(el => countObs.observe(el));

  // ─── Photo Carousel (Swiper) ───────────────────────────────
  if (typeof Swiper !== 'undefined' && document.querySelector('.photo-swiper')) {
    new Swiper('.photo-swiper', {
      slidesPerView: 1,
      spaceBetween: 16,
      loop: true,
      grabCursor: true,
      centeredSlides: false,
      navigation: {
        nextEl: '.photo-swiper-next',
        prevEl: '.photo-swiper-prev',
      },
      pagination: {
        el: '.photo-swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        600:  { slidesPerView: 2, spaceBetween: 16 },
        1024: { slidesPerView: 3, spaceBetween: 20 },
      },
    });
  }

  // ─── Video poster click-to-play ─────────────────────────────
  document.querySelectorAll('.video-wrap[data-src]').forEach(wrap => {
    wrap.addEventListener('click', () => {
      if (wrap.classList.contains('is-playing')) return;
      const video = document.createElement('video');
      video.controls = true;
      video.playsInline = true;
      video.autoplay = true;
      video.src = wrap.dataset.src;
      wrap.appendChild(video);
      wrap.classList.add('is-playing');
    });
  });

  // ─── Subtle hero parallax ──────────────────────────────────
  const heroBg = document.querySelector('.section-hero .hero-bg');
  if (heroBg) {
    window.addEventListener('scroll', () => {
      const y = window.scrollY;
      heroBg.style.transform = `scale(1.06) translateY(${y * 0.18}px)`;
    }, { passive: true });
  }

});



// ─── Sliding nav underline (persists across page loads) ───────
(function() {
  const navList = document.querySelector('#site-nav .nav-links');
  if (!navList) return;

  const bar = document.createElement('span');
  bar.className = 'nav-underline';
  // Append to the nav container (not inside the ul) for valid HTML
  navList.parentElement.appendChild(bar);

  const links = Array.from(navList.querySelectorAll('li > a'));

  const barParent = navList.parentElement;
  function barRect(el) {
    const parentRect = barParent.getBoundingClientRect();
    const rect       = el.getBoundingClientRect();
    const pad        = 12;
    return { left: rect.left - parentRect.left + pad, width: rect.width - pad * 2 };
  }

  function setBar(el, instant) {
    const { left, width } = barRect(el);
    if (instant) {
      bar.style.transition = 'none';
      bar.style.left    = left + 'px';
      bar.style.width   = width + 'px';
      bar.style.opacity = '1';
      // Force reflow then re-enable transition
      bar.getBoundingClientRect();
      bar.style.transition = '';
    } else {
      bar.style.left    = left + 'px';
      bar.style.width   = width + 'px';
      bar.style.opacity = '1';
    }
  }

  const activeLink = navList.querySelector('li.current-menu-item > a, li[aria-current="page"] > a');
  const activeIdx  = activeLink ? links.indexOf(activeLink) : -1;

  // On page load: check if we navigated from another nav link
  const prevIdx = sessionStorage.getItem('pt_nav_from');
  sessionStorage.removeItem('pt_nav_from');

  if (activeLink) {
    if (prevIdx !== null && links[parseInt(prevIdx)]) {
      // Start at previous position, slide to active
      setBar(links[parseInt(prevIdx)], true);
      requestAnimationFrame(() => requestAnimationFrame(() => setBar(activeLink)));
    } else {
      // No history — snap to active
      setBar(activeLink, true);
    }
  }

  // Store current active index before navigating away
  links.forEach((a, i) => {
    a.addEventListener('click', () => {
      sessionStorage.setItem('pt_nav_from', activeIdx >= 0 ? activeIdx : i);
    });
  });

  // No hover — underline only tracks active page
})();

// ─────────────────────────────────────────────────────────────
// Awwwards-style scroll animations
// ─────────────────────────────────────────────────────────────
(function () {
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  // ── Zones that already have CSS animations — skip them ─────
  const SKIP = [
    '.about-hero', '.donate-hero', '.blog-archive-header',
    '.page-hero', '.section-hero', '.single-post-hero',
    '#site-nav', 'footer', '.nav-links',
  ];
  const isSkipped = el => SKIP.some(s => el.closest(s));

  // ── Shared observer factory ────────────────────────────────
  const makeObs = (cb, opts) =>
    new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (!e.isIntersecting) return;
        cb(e.target);
        e.target._awObs && e.target._awObs.unobserve(e.target);
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -48px 0px', ...opts });

  // ── 1. HEADING WORD-SPLIT REVEAL ───────────────────────────
  const headingObs = makeObs(el => {
    el.querySelectorAll('.aw-word').forEach(w => w.classList.add('in'));
  }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

  function splitHeading(el) {
    if (el._awSplit || isSkipped(el)) return;
    el._awSplit = true;

    const nodes = Array.from(el.childNodes);
    el.innerHTML = '';
    let idx = 0;

    const makeWord = (content, isNode) => {
      const clip  = document.createElement('span');
      clip.className = 'aw-clip';
      const word  = document.createElement('span');
      word.className = 'aw-word';
      word.style.transitionDelay = `${idx * 0.05}s`;
      isNode ? word.appendChild(content) : (word.textContent = content);
      clip.appendChild(word);
      idx++;
      return clip;
    };

    nodes.forEach(node => {
      if (node.nodeType === Node.TEXT_NODE) {
        node.textContent.split(/(\s+)/).forEach(part => {
          if (!part) return;
          if (/^\s+$/.test(part)) {
            el.appendChild(document.createTextNode(' '));
          } else {
            el.appendChild(makeWord(part, false));
          }
        });
      } else {
        el.appendChild(makeWord(node.cloneNode(true), true));
      }
    });

    el._awObs = headingObs;
    headingObs.observe(el);
  }

  // ── 2. IMAGE CURTAIN REVEAL ────────────────────────────────
  const imgObs = makeObs(el => el.classList.add('in'),
    { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

  function setupImg(el, dark) {
    if (el._awImg || isSkipped(el)) return;
    el._awImg = true;
    el.classList.add('aw-img');
    if (dark) el.classList.add('aw-img-dark');
    el._awObs = imgObs;
    imgObs.observe(el);
  }

  // ── 3. PARAGRAPH FADE-UP ──────────────────────────────────
  const paraObs = makeObs(el => el.classList.add('in'),
    { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });

  function setupPara(el, delay) {
    if (el._awPara || isSkipped(el)) return;
    el._awPara = true;
    el.classList.add('aw-para');
    if (delay) el.style.transitionDelay = delay;
    el._awObs = paraObs;
    paraObs.observe(el);
  }

  // ── AUTO-APPLY ────────────────────────────────────────────
  // Headings (everywhere except skip zones)
  document.querySelectorAll('h2, h3').forEach(splitHeading);

  // Eyebrow labels — elegant slide-up
  document.querySelectorAll(
    '.section-eyebrow, .about-eyebrow, .donate-eyebrow, .cta-banner-eyebrow, ' +
    '.blog-eyebrow, .blog-card-cat, .donate-section-eyebrow, .donate-section-eyebrow-light'
  ).forEach(el => {
    if (el._awLine || isSkipped(el)) return;
    el._awLine = true;
    el.classList.add('aw-line');
    const wrap = document.createElement('span');
    wrap.append(...Array.from(el.childNodes).map(n => n.cloneNode(true)));
    el.innerHTML = '';
    el.appendChild(wrap);
    const obs = makeObs(e => e.classList.add('in'));
    obs.observe(el);
  });

  // Images — about origin
  document.querySelectorAll('.about-origin-img-wrap').forEach(el => setupImg(el, false));

  // Images — about photo grid (dark curtain)
  document.querySelectorAll('.about-photos-grid .photo-cell').forEach(el => setupImg(el, true));

  // Images — blog cards
  document.querySelectorAll('.blog-card-img').forEach(el => setupImg(el, false));

  // Images — single post hero
  document.querySelectorAll('.single-hero-img-wrap').forEach(el => setupImg(el, true));

  // Paragraphs — about sections
  document.querySelectorAll('.about-origin-text-col > p, .about-mission-body').forEach((el, i) =>
    setupPara(el, `${i * 0.08}s`));

  // Paragraphs — donate
  document.querySelectorAll('.donate-tier-info span, .donate-breakdown-header > p, .donate-other-card > p').forEach((el, i) =>
    setupPara(el, `${(i % 4) * 0.07}s`));

  // Paragraphs — CTA banner + hero subs
  document.querySelectorAll('.cta-banner-sub, .about-hero-sub, .donate-hero-sub, .blog-archive-sub').forEach(el =>
    setupPara(el));

  // Paragraphs — blog card excerpts
  document.querySelectorAll('.blog-card-excerpt').forEach(el => setupPara(el));

  // Paragraphs — single post body
  document.querySelectorAll('.single-post-content p').forEach((el, i) =>
    setupPara(el, `${Math.min(i * 0.06, 0.24)}s`));

  // Stat numbers on about/donate pages
  document.querySelectorAll('.about-stat, .donate-bar-item').forEach((el, i) => {
    if (el._awPara || isSkipped(el)) return;
    el._awPara = true;
    el.classList.add('aw-para');
    el.style.transitionDelay = `${i * 0.1}s`;
    paraObs.observe(el);
  });

  // Program + other cards — stagger as a group
  document.querySelectorAll('.about-program-card, .donate-other-card, .blog-card, .donate-tier').forEach((el, i) => {
    if (el._awPara || isSkipped(el)) return;
    el._awPara = true;
    el.classList.add('aw-para');
    // Stagger within groups of 3
    el.style.transitionDelay = `${(i % 3) * 0.1}s`;
    paraObs.observe(el);
  });

})();

<?php
/**
 * Template Name: Hobby - Home Workout - jay
 * Template Post Type: page
 * Ultra 3D Aesthetic Edition v3 — Deep Enhanced (Kim's Style)
 */
get_header(); 

// Dynamic Quote mula sa WordPress Editor
$content = get_the_content();
$first_para = '';
if ( !empty($content) ) {
    $first_para = explode('</p>', $content)[0];
    $first_para = strip_tags($first_para, '<em><strong><i><b>') . '</p>';
}
?>

<style>
/* ===== HOBBY: HOME WORKOUT (JAY) — Ultra 3D Edition v3 ===== */
.hobby-page {
  --ivory:#F7F4EC; --paper:#FBFAF5;
  --ink:#14120E; --ink-3:#4A443A;
  --gold:#A8874E; --gold-2:#C4A566; --gold-3:#D4BC8B;
  --line:rgba(168,135,78,.16);
  --muted:#7A7266;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  --ease:cubic-bezier(.22,.8,.2,1); --ease-out:cubic-bezier(.16,1,.3,1);
  
  --shadow-1: 0 1px 0 rgba(255,255,255,.9) inset, 0 -1px 0 rgba(168,135,78,.06) inset, 0 2px 4px rgba(20,18,14,.04), 0 8px 24px -8px rgba(20,18,14,.12), 0 20px 40px -20px rgba(20,18,14,.18);
  --shadow-2: 0 1px 0 rgba(255,255,255,.95) inset, 0 -1px 0 rgba(168,135,78,.1) inset, 0 4px 8px rgba(20,18,14,.06), 0 16px 40px -10px rgba(20,18,14,.18), 0 40px 80px -40px rgba(20,18,14,.24);

  background: var(--ivory); color: var(--ink); font-family: var(--sans);
  -webkit-font-smoothing: antialiased; overflow-x: hidden; position: relative;
  min-height: 100vh;
}

/* Custom Scrollbar */
.hobby-page ::-webkit-scrollbar { width: 8px; }
.hobby-page ::-webkit-scrollbar-track { background: var(--ivory); }
.hobby-page ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 10px; }

/* Ambient stage */
.hobby-page::before {
  content: ""; position: fixed; inset: 0; pointer-events: none; z-index: 0;
  background:
    radial-gradient(600px 400px at 15% 5%, rgba(196,165,102,.10), transparent 70%),
    radial-gradient(500px 400px at 85% 10%, rgba(212,188,139,.10), transparent 70%),
    radial-gradient(700px 500px at 50% 100%, rgba(196,165,102,.06), transparent 70%);
}

.hobby-page .container {
  max-width: 1100px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px);
  position: relative; z-index: 2;
}

/* ===== CURSOR GLOW ===== */
.cursor-glow {
  position: fixed; width: 400px; height: 400px; border-radius: 50%;
  background: radial-gradient(circle, rgba(168,135,78,0.12), transparent 70%);
  pointer-events: none; z-index: 1; transform: translate(-50%, -50%);
  will-change: transform;
}
@media (max-width: 768px) { .cursor-glow { display: none; } }

/* Floating orbs */
.hobby-orb {
  position: absolute; border-radius: 50%; pointer-events: none; z-index: 1;
  background: radial-gradient(circle at 35% 30%,rgba(255,255,255,.45),rgba(196,165,102,.35) 40%,transparent 72%);
  filter: blur(2px);
  animation: floatOrb 22s infinite ease-in-out;
  translate:
    calc(var(--px,0) * var(--depth,30) * 1px)
    calc(var(--py,0) * var(--depth,30) * 1px + var(--sy,0) * var(--sdepth,-.08) * 1px);
  will-change: transform, translate;
}
.hobby-orb.o1{width:300px;height:300px;top:10%;right:10%;--depth:-40;--sdepth:-.14}
.hobby-orb.o2{width:160px;height:160px;bottom:20%;right:25%;--depth:60;--sdepth:-.06;animation-delay:6s}
.hobby-orb.o3{width:200px;height:200px;top:40%;left:5%;--depth:-20;--sdepth:-.1;animation-delay:12s}
@keyframes floatOrb {
  0%,100%{transform:translate(0,0) scale(1);opacity:.35}
  50%{transform:translate(30px,-40px) scale(1.15);opacity:.65}
}

/* ===== SHARED TILT + GLARE ===== */
.hobby-page [data-tilt]{position:relative;transform-style:preserve-3d}
.hobby-page [data-tilt]::after{
  content:"";position:absolute;inset:0;border-radius:inherit;pointer-events:none;z-index:2;
  background:radial-gradient(420px circle at var(--mx,50%) var(--my,50%),rgba(255,255,255,.6),transparent 60%);
  opacity:0;transition:opacity .5s var(--ease);
}
.hobby-page [data-tilt]:hover::after{opacity:.65}
.hobby-tilt [data-tilt]{
  transition-property:box-shadow,background,border-color,color,opacity !important;
  will-change:transform;
}

/* ===== HERO ===== */
.hobby-hero {
  padding: clamp(160px, 18vw, 240px) 0 clamp(80px, 10vw, 140px);
  text-align: center; position: relative;
}
.hobby-hero .container {
  translate: 0 calc(var(--sy,0) * .1px);
  opacity: calc(1 - var(--sy,0) * .0006);
}

/* Back Button */
.back-link {
  position: absolute; top: clamp(100px, 12vw, 140px); left: clamp(24px, 6vw, 96px);
  z-index: 10; display: inline-flex; align-items: center; gap: 8px;
  font-family: var(--sans); font-size: .75rem; font-weight: 600;
  letter-spacing: .14em; text-transform: uppercase; color: var(--muted);
  text-decoration: none; transition: color .3s, transform .3s;
}
.back-link:hover { color: var(--gold); transform: translateX(-4px); }

/* 3D Floating Icon Box */
.hobby-icon-large {
  width: 150px; height: 150px; margin: 0 auto 48px;
  display: grid; place-items: center;
  background: linear-gradient(160deg, rgba(255,255,255,.95), rgba(247,244,236,.7));
  border: 1px solid rgba(255,255,255,.9);
  border-radius: 36px;
  box-shadow: 
    var(--shadow-2), 
    inset 0 0 40px rgba(196,165,102,.15);
  color: var(--gold);
  position: relative;
  transform-style: preserve-3d;
  animation: floatIcon 6s ease-in-out infinite;
}
.hobby-icon-large::after {
  content: ""; position: absolute; inset: 12px; border-radius: 24px;
  border: 1px solid rgba(168,135,78,.15); pointer-events: none;
}
.hobby-icon-large svg { 
  width: 72px; height: 72px; fill: currentColor; 
  filter: drop-shadow(0 6px 16px rgba(168,135,78,.4)); 
}
@keyframes floatIcon {
  0%,100% { transform: translateY(0) rotateX(0deg) rotateY(0deg); }
  50% { transform: translateY(-15px) rotateX(8deg) rotateY(-8deg); }
}

.hobby-hero h1 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(3rem, 7vw, 6rem);
  line-height: 1.05; letter-spacing: -0.03em; margin: 0 0 24px; color: var(--ink);
}
.hobby-hero h1 em {
  font-style: italic;
  background: linear-gradient(135deg, #8f6f3a, var(--gold), var(--gold-2), var(--gold-3));
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent;
  filter: drop-shadow(0 2px 6px rgba(168,135,78,.2));
}

.hobby-hero .desc {
  font-size: 1.15rem; font-weight: 300; line-height: 1.85; color: var(--ink-3);
  max-width: 650px; margin: 0 auto;
}

/* ===== STATS / FUN FACTS ===== */
.hobby-stats {
  padding: 0 0 clamp(80px, 10vw, 120px);
}
.stats-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;
  max-width: 800px; margin: 0 auto;
}
.stat-box {
  position: relative; text-align: center; padding: 32px 20px;
  border-radius: 20px;
  background: linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.65));
  border: 1px solid rgba(255,255,255,.7);
  box-shadow: var(--shadow-1);
  transition: transform .4s var(--ease-out), box-shadow .4s var(--ease);
  transform-style: preserve-3d;
}
.stat-box::before {
  content: ""; position: absolute; left: 50%; top: 20px; bottom: 20px; width: 2px;
  transform: translateX(-50%); border-radius: 2px;
  background: linear-gradient(180deg, var(--gold), var(--gold-2));
  opacity: .3; box-shadow: 0 0 8px rgba(196,165,102,.5);
}
.stat-box:hover { box-shadow: var(--shadow-2); }
.stat-box .num {
  font-family: var(--serif); font-size: clamp(2.4rem, 4vw, 3.2rem);
  color: var(--ink); display: block; line-height: 1; position: relative; z-index: 1;
  font-variant-numeric: tabular-nums;
}
.stat-box .label {
  font-size: .72rem; font-weight: 600; letter-spacing: .16em; text-transform: uppercase;
  color: var(--muted); margin-top: 12px; display: block; position: relative; z-index: 1;
}

/* ===== QUOTE (Dark Slab) ===== */
.hobby-quote-section {
  padding: 0 0 clamp(80px, 10vw, 140px);
}
.hobby-quote-box {
  padding: clamp(48px, 6vw, 80px) clamp(24px, 4vw, 60px);
  border-radius: 32px;
  background: linear-gradient(135deg, #14120E 0%, #1a1712 100%);
  box-shadow: 0 1px 0 rgba(255,255,255,.05) inset, 0 -1px 0 rgba(0,0,0,.4) inset, 0 30px 80px -20px rgba(20,18,14,.4);
  text-align: center; position: relative; overflow: hidden;
  transform-style: preserve-3d; will-change: transform;
  transform: perspective(1400px) rotateX(calc(var(--p,0) * 3deg)) scale(calc(1 - var(--p,0) * var(--p,0) * .02));
}
.hobby-quote-box::before {
  content: ""; position: absolute; top: 50%; left: 50%; width: 80%; height: 80%;
  background: radial-gradient(circle, rgba(196,165,102,.15), transparent 70%);
  transform: translate(-50%, -50%); pointer-events: none;
}
.hobby-quote-box blockquote {
  position: relative; z-index: 2;
  font-family: var(--serif); font-weight: 300; font-size: clamp(1.8rem, 4vw, 3rem);
  line-height: 1.3; letter-spacing: -0.02em; margin: 0; color: var(--ivory);
  text-shadow: 0 1px 0 rgba(0,0,0,.3);
}

/* ===== GALLERY (3D Tilt Cards) ===== */
.hobby-gallery {
  padding: 0 0 clamp(100px, 12vw, 160px);
}
.gallery-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;
}
.gallery-item {
  position: relative; aspect-ratio: 4/5; border-radius: 20px; overflow: hidden;
  background: var(--paper); border: 1px solid rgba(255,255,255,.8);
  box-shadow: var(--shadow-1);
  transform-style: preserve-3d;
  transition: transform .5s var(--ease-out), box-shadow .5s var(--ease);
}
.gallery-item::after {
  content: ""; position: absolute; inset: 10px; border: 1px solid rgba(168,135,78,.15);
  border-radius: 12px; pointer-events: none; z-index: 2; transition: border-color .4s;
}
.gallery-item:hover {
  border-color: rgba(168,135,78,.4);
  box-shadow: var(--shadow-2);
}
.gallery-item:hover::after { border-color: rgba(168,135,78,.35); }
.gallery-item img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  filter: grayscale(30%); transition: transform 1s var(--ease-out), filter .8s;
  translate: calc(var(--nx,0) * 8px) calc(var(--ny,0) * 8px);
}
.gallery-item:hover img { transform: scale(1.05); filter: grayscale(0%); }

/* ===== CONTENT (Glass Panel) ===== */
.hobby-content-section {
  padding: 0 0 clamp(100px, 12vw, 180px);
}
.hobby-content-section .glass-panel {
  padding: clamp(40px, 6vw, 64px);
  border-radius: 24px;
  background: linear-gradient(180deg, rgba(255,255,255,.75), rgba(247,244,236,.55));
  border: 1px solid rgba(255,255,255,.7);
  backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);
  box-shadow: var(--shadow-1);
  position: relative;
  transform:
    perspective(1400px)
    rotateX(calc(var(--p,0) * 3deg))
    scale(calc(1 - var(--p,0) * var(--p,0) * .02));
  transform-origin: 50% 50%; will-change: transform;
}
.hobby-content-section .glass-panel::before {
  content: ""; position: absolute; left: 0; top: 40px; bottom: 40px; width: 3px;
  border-radius: 3px; background: linear-gradient(180deg, var(--gold), var(--gold-2));
  box-shadow: 0 0 12px rgba(196,165,102,.6);
}
.hobby-content-section h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2.2rem, 4vw, 3.2rem);
  line-height: 1.1; letter-spacing: -0.02em; margin: 0 0 32px; color: var(--ink);
  padding-left: clamp(16px, 3vw, 32px);
}
.hobby-content-section h2 em {
  font-style: italic;
  background: linear-gradient(135deg, #8f6f3a, var(--gold), var(--gold-2));
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent;
}
.hobby-content-section p {
  font-size: 1.1rem; font-weight: 300; line-height: 1.9; color: var(--ink-3);
  margin: 0 0 24px; padding-left: clamp(16px, 3vw, 32px);
}
.hobby-content-section p:last-child { margin-bottom: 0; }

/* ===== REVEAL ===== */
.hobby-js .reveal { opacity: 0; transform-origin: 50% 100%; }
.hobby-js .reveal.in {
  opacity: 1;
  animation: revealIn 1.15s var(--ease-out) var(--d,0ms) backwards;
}
@keyframes revealIn {
  from { opacity: 0; translate: 0 46px; rotate: 1 0 0 14deg; scale: .96; }
  to { opacity: 1; translate: 0 0; rotate: 1 0 0 0deg; scale: 1; }
}

/* ===== RESPONSIVE ===== */
@media (max-width: 900px) {
  .gallery-grid { grid-template-columns: repeat(2, 1fr); }
  .stats-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
  .back-link { top: 90px; }
  .gallery-grid { grid-template-columns: 1fr; }
  .stats-grid { grid-template-columns: 1fr; }
  .hobby-content-section .glass-panel::before { display: none; }
  .hobby-content-section h2, .hobby-content-section p { padding-left: 0; }
  .hobby-orb { display: none; }
}
@media (prefers-reduced-motion: reduce) {
  .hobby-page *, .hobby-page *::before, .hobby-page *::after {
    animation: none !important; transition: none !important;
  }
  .hobby-js .reveal { opacity: 1; }
  .hobby-quote-box, .hobby-content-section .glass-panel { transform: none; }
  .hobby-orb, .cursor-glow { display: none; }
}
</style>

<!-- Cursor Glow -->
<div class="cursor-glow" id="hobbyCursorGlow"></div>

<main class="hobby-page">
  <!-- Back Button -->
  <a href="<?php echo esc_url(home_url('/friends/jay/')); ?>" class="back-link">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
    Back to Jay
  </a>

  <!-- HERO -->
  <section class="hobby-hero">
    <div class="hobby-orb o1"></div>
    <div class="hobby-orb o2"></div>
    <div class="hobby-orb o3"></div>

    <div class="container">
      <!-- Dynamic Icon -->
      <div class="hobby-icon-large reveal" data-tilt="8">
        <svg viewBox="0 0 24 24" fill="currentColor">
          <path d="M20.57,14.86L22,13.43L20.57,12L17,15.57L8.43,7L12,3.43L10.57,2L9.14,3.43L7.71,2L5.57,4.14L4.14,2.71L2.71,4.14L4.14,5.57L2,7.71L3.43,9.14L2,10.57L3.43,12L7,8.43L15.57,17L12,20.57L13.43,22L14.86,20.57L16.29,22L18.43,19.86L19.86,21.29L21.29,19.86L19.86,18.43L22,16.29L20.57,14.86Z"/>
        </svg>
      </div>
      
      <!-- Dynamic Title -->
      <h1 class="reveal">
        Home Workout <em>& Discipline.</em>
      </h1>
      
      <!-- Dynamic Description -->
      <p class="desc reveal">
        Progress takes patience and dedication. Every workout is a step toward becoming a stronger, healthier version of myself.
      </p>
    </div>
  </section>

  <!-- STATS / FUN FACTS -->
  <section class="hobby-stats">
    <div class="container">
      <div class="stats-grid">
        <div class="stat-box reveal" data-tilt="5" style="transition-delay: 0ms;">
          <span class="num">4x</span>
          <span class="label">Weekly Routine</span>
        </div>
        <div class="stat-box reveal" data-tilt="5" style="transition-delay: 100ms;">
          <span class="num">Calis</span>
          <span class="label">Main Style</span>
        </div>
        <div class="stat-box reveal" data-tilt="5" style="transition-delay: 200ms;">
          <span class="num">Abs</span>
          <span class="label">Main Goal</span>
        </div>
      </div>
    </div>
  </section>

  <!-- QUOTE (Dark Slab) -->
  <section class="hobby-quote-section">
    <div class="container">
      <div class="hobby-quote-box reveal" data-scroll3d>
        <blockquote>
          <?php if ( !empty($first_para) ) : ?>
            <?php echo $first_para; ?>
          <?php else : ?>
            “ Progress takes patience and dedication. Every workout is a step toward becoming a <em>stronger, healthier version of myself.</em> ”
          <?php endif; ?>
        </blockquote>
      </div>
    </div>
  </section>

  <!-- GALLERY (Interactive 3D Cards) -->
  <section class="hobby-gallery">
    <div class="container">
      <div class="gallery-grid">
        <div class="gallery-item reveal" data-tilt="6" style="transition-delay: 0ms;">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/jay.jpg'); ?>" alt="Home Workout Setup">
        </div>
        <div class="gallery-item reveal" data-tilt="6" style="transition-delay: 100ms;">
          <!-- Palitan mo ng totoong image path kung meron ka pang iba -->
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/jay.jpg'); ?>" alt="Workout Session">
        </div>
        <div class="gallery-item reveal" data-tilt="6" style="transition-delay: 200ms;">
          <!-- Palitan mo ng totoong image path kung meron ka pang iba -->
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/jay.jpg'); ?>" alt="Fitness Progress">
        </div>
      </div>
    </div>
  </section>

  <!-- CONTENT (Glass Panel) -->
  <section class="hobby-content-section">
    <div class="container">
      <div class="glass-panel reveal" data-scroll3d>
        <h2>Why I <em>love</em> it.</h2>
        <p>
          Working out at home taught me that discipline is built in the small, quiet moments. No audience, just progress.
          It's not about having the perfect equipment or the biggest space. It's about showing up for yourself every day.
        </p>
        <p>
          I focus on pure <strong>calisthenics</strong> — push-ups, pull-ups, squats, and core exercises to build my dream abs. No fancy equipment needed.
          The trick is progressive overload. Adding reps, slowing down the tempo, and staying consistent 4x a week.
        </p>
        <p>
          My goal isn't just to look good, but to feel strong and healthy. Cardiovascular health is just as important as building muscle.
          I mix in jump rope, shadow boxing, and high-intensity interval training (HIIT) to keep my heart rate up and my body guessing.
        </p>
      </div>
    </div>
  </section>
</main>

<script>
(function () {
  'use strict';
  var root = document.documentElement;
  root.classList.add('hobby-js');

  var reduce  = matchMedia('(prefers-reduced-motion: reduce)').matches;
  var fine    = matchMedia('(hover: hover) and (pointer: fine)').matches;
  var desktop = matchMedia('(min-width: 769px)').matches;
  var rich    = fine && desktop && !reduce;
  if (rich) root.classList.add('hobby-tilt');

  var $  = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var lerp  = function (a, b, t) { return a + (b - a) * t; };
  var clamp = function (v, a, b) { return Math.min(b, Math.max(a, v)); };

  /* 1. Reveal — 3D rise */
  var io = new IntersectionObserver(function (entries) {
    var shown = entries.filter(function (e) { return e.isIntersecting; });
    shown.forEach(function (entry, i) {
      entry.target.style.setProperty('--d', (reduce ? 0 : i * 90) + 'ms');
      entry.target.classList.add('in');
      io.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
  $$('.reveal').forEach(function (el) { io.observe(el); });

  /* 2. Scroll: hero parallax, scroll-linked 3D */
  var hero  = $('.hobby-hero');
  var s3d   = $$('[data-scroll3d]');
  var ticking = false;

  function onScroll() {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(function () {
      var y = window.scrollY || root.scrollTop;

      if (!reduce) {
        if (hero && y < innerHeight * 1.3) hero.style.setProperty('--sy', y.toFixed(1));
        var vh = innerHeight;
        s3d.forEach(function (el) {
          var r = el.getBoundingClientRect();
          if (r.bottom < -200 || r.top > vh + 200) return;
          var p = clamp((r.top + r.height / 2 - vh / 2) / vh, -1, 1);
          el.style.setProperty('--p', p.toFixed(3));
        });
      }
      ticking = false;
    });
  }
  addEventListener('scroll', onScroll, { passive: true });
  addEventListener('resize', onScroll);
  onScroll();

  /* 3. Cursor glow + hero parallax */
  if (rich) {
    var glow = $('#hobbyCursorGlow');
    var gx = innerWidth / 2, gy = innerHeight / 2, mx = gx, my = gy;
    var tx = 0, ty = 0, cx = 0, cy = 0;

    document.addEventListener('pointermove', function (e) { mx = e.clientX; my = e.clientY; });
    if (hero) {
      hero.addEventListener('pointermove', function (e) {
        var r = hero.getBoundingClientRect();
        tx = (e.clientX - r.left) / r.width - 0.5;
        ty = (e.clientY - r.top) / r.height - 0.5;
      });
      hero.addEventListener('pointerleave', function () { tx = 0; ty = 0; });
    }

    (function loop() {
      if (glow) {
        gx = lerp(gx, mx, 0.08); gy = lerp(gy, my, 0.08);
        glow.style.transform = 'translate3d(' + (gx - 200).toFixed(1) + 'px,' + (gy - 200).toFixed(1) + 'px,0)';
      }
      if (hero) {
        cx = lerp(cx, tx, 0.06); cy = lerp(cy, ty, 0.06);
        if (Math.abs(cx - tx) > 0.0005 || Math.abs(cy - ty) > 0.0005) {
          hero.style.setProperty('--px', cx.toFixed(4));
          hero.style.setProperty('--py', cy.toFixed(4));
        }
      }
      requestAnimationFrame(loop);
    })();
  }

  /* 4. 3D tilt + glare */
  if (rich) {
    $$('[data-tilt]').forEach(function (el) {
      var max = parseFloat(el.getAttribute('data-tilt')) || 5;
      var lift = 4;
      var rx = 0, ry = 0, l = 0, trx = 0, tryy = 0, tl = 0, raf = 0;

      function frame() {
        rx = lerp(rx, trx, 0.14); ry = lerp(ry, tryy, 0.14); l = lerp(l, tl, 0.14);
        el.style.transform =
          'perspective(1000px) rotateX(' + rx.toFixed(2) + 'deg) rotateY(' + ry.toFixed(2) +
          'deg) translateY(' + (-l).toFixed(2) + 'px)';
        var moving = Math.abs(rx - trx) + Math.abs(ry - tryy) + Math.abs(l - tl) > 0.01;
        if (moving) { raf = requestAnimationFrame(frame); }
        else { raf = 0; if (tl === 0) el.style.transform = ''; }
      }
      function kick() { if (!raf) raf = requestAnimationFrame(frame); }

      el.addEventListener('pointermove', function (e) {
        var r = el.getBoundingClientRect();
        var px = (e.clientX - r.left) / r.width;
        var py = (e.clientY - r.top) / r.height;
        tryy = (px - 0.5) * max * 2;
        trx  = -(py - 0.5) * max * 2;
        tl = lift;
        el.style.setProperty('--mx', (px * 100).toFixed(1) + '%');
        el.style.setProperty('--my', (py * 100).toFixed(1) + '%');
        el.style.setProperty('--nx', (px - 0.5).toFixed(3));
        el.style.setProperty('--ny', (py - 0.5).toFixed(3));
        kick();
      });
      el.addEventListener('pointerleave', function () {
        trx = 0; tryy = 0; tl = 0;
        el.style.setProperty('--nx', 0);
        el.style.setProperty('--ny', 0);
        kick();
      });
    });
  }
})();
</script>

<?php get_footer(); ?>
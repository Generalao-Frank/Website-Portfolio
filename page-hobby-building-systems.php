<?php
/**
 * Template Name: Hobby - Building Systems - frank
 * Template Post Type: page
 * Ultra 3D Aesthetic Edition (Wide Desktop + Features)
 */
get_header(); 

$content = get_the_content();
$first_para = '';
if ( !empty($content) ) {
    $first_para = explode('</p>', $content)[0];
    $first_para = strip_tags($first_para, '<em><strong><i><b>') . '</p>';
}
?>

<style>
/* ✅ FIXED: Single Scrollbar */
html, body {
  overflow-x: hidden;
  max-width: 100vw;
  scroll-behavior: smooth;
}

/* ===== HOBBY: BUILDING SYSTEMS — Ultra 3D Edition ===== */
.hobby-systems {
  --ivory:#F7F4EC; --paper:#FBFAF5;
  --ink:#14120E; --ink-3:#4A443A;
  --gold:#A8874E; --gold-2:#C4A566; --gold-3:#D4BC8B;
  --line:rgba(168,135,78,.16); --line-2:rgba(168,135,78,.08);
  --muted:#7A7266; --muted-2:#9A9284;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  --ease:cubic-bezier(.22,.8,.2,1); --ease-out:cubic-bezier(.16,1,.3,1);
  --gutter:clamp(24px,6vw,96px);
  --section-y:clamp(80px,10vw,140px);

  --shadow-1:
    0 1px 0 rgba(255,255,255,.9) inset,
    0 -1px 0 rgba(168,135,78,.06) inset,
    0 2px 4px rgba(20,18,14,.04),
    0 8px 24px -8px rgba(20,18,14,.12),
    0 20px 40px -20px rgba(20,18,14,.18);
  --shadow-2:
    0 1px 0 rgba(255,255,255,.95) inset,
    0 -1px 0 rgba(168,135,78,.1) inset,
    0 4px 8px rgba(20,18,14,.06),
    0 16px 40px -10px rgba(20,18,14,.18),
    0 40px 80px -40px rgba(20,18,14,.24);

  background: var(--ivory); color: var(--ink); font-family: var(--sans);
  min-height: 100vh; position: relative; 
  -webkit-font-smoothing: antialiased;
}

/* Ambient Light Stage */
.hobby-systems::before {
  content: ""; position: fixed; inset: 0; pointer-events: none; z-index: 0;
  background:
    radial-gradient(800px 600px at 15% 5%, rgba(196,165,102,.10), transparent 70%),
    radial-gradient(600px 500px at 85% 10%, rgba(212,188,139,.10), transparent 70%),
    radial-gradient(900px 700px at 50% 100%, rgba(196,165,102,.06), transparent 70%);
}

/* Parallax Blueprint Grid Background */
.blueprint-bg {
  position: fixed; inset: -20%; pointer-events: none; z-index: 0;
  background-image: 
    linear-gradient(rgba(168,135,78,0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(168,135,78,0.04) 1px, transparent 1px);
  background-size: 40px 40px;
  will-change: transform;
}

/* Floating Code Snippets */
.floating-code {
  position: absolute; font-family: monospace; color: var(--gold); 
  opacity: 0.06; font-size: 4rem; pointer-events: none; z-index: 0;
  animation: floatSlow 15s infinite ease-in-out;
  user-select: none;
}
.fc-1 { top: 15%; left: 5%; animation-delay: 0s; }
.fc-2 { top: 40%; right: 8%; animation-delay: 3s; font-size: 6rem; }
.fc-3 { bottom: 20%; left: 10%; animation-delay: 6s; }
.fc-4 { top: 70%; right: 15%; animation-delay: 9s; font-size: 3rem; }
@keyframes floatSlow {
  0%, 100% { transform: translateY(0) rotate(0deg); }
  50% { transform: translateY(-30px) rotate(10deg); }
}

/* Reading Progress */
.read-progress {
  position: fixed; top: 0; left: 0; height: 3px; width: 0%;
  background: linear-gradient(90deg, #8f6f3a, var(--gold), var(--gold-2), var(--gold-3));
  z-index: 9999; transition: width 0.1s ease-out;
  box-shadow: 0 0 12px rgba(196,165,102,0.6);
}

/* Cursor Glow */
.cursor-glow {
  position: fixed; width: 400px; height: 400px; border-radius: 50%;
  background: radial-gradient(circle, rgba(168,135,78,0.10), transparent 70%);
  pointer-events: none; z-index: 1; transform: translate(-50%, -50%);
}
@media (max-width: 768px) { .cursor-glow { display: none; } }

/* Wide Container */
.hobby-systems .container { max-width: 1200px; margin: 0 auto; padding: 0 var(--gutter); position: relative; z-index: 2; }

/* Back Button */
.back-link { 
  display: inline-flex; align-items: center; gap: 12px; margin-top: 140px; 
  font-size: 0.76rem; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; 
  color: var(--ink); text-decoration: none; transition: all 0.4s var(--ease-out); 
  padding: 14px 22px; 
  background: linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.7));
  border: 1px solid rgba(168,135,78,.2);
  border-radius: 12px;
  box-shadow: 0 1px 0 rgba(255,255,255,.95) inset, 0 4px 12px -4px rgba(20,18,14,.1);
}
.back-link::before { content: "←"; font-size: 1.1rem; transition: transform 0.4s var(--ease); }
.back-link:hover { 
  color: var(--gold); transform: translateY(-2px) translateX(-4px);
  border-color: rgba(168,135,78,.45);
  box-shadow: 0 1px 0 rgba(255,255,255,.95) inset, 0 8px 20px -6px rgba(168,135,78,.3);
}
.back-link:hover::before { transform: translateX(-4px); }

/* ===== HERO SECTION (Centered, Big Image) ===== */
.hobby-hero { 
  padding: clamp(40px, 6vw, 72px) 0 clamp(60px, 8vw, 100px); 
  position: relative; text-align: center;
}
.hobby-hero .icon-wrapper {
  display: inline-flex; align-items: center; justify-content: center;
  width: 120px; height: 120px; border-radius: 50%; margin: 0 auto 32px;
  background: rgba(255,255,255,0.6);
  border: 1px solid rgba(168,135,78,.3);
  box-shadow: 
    0 10px 30px -10px rgba(168,135,78,0.3),
    inset 0 0 20px rgba(168,135,78,0.1);
  backdrop-filter: blur(10px);
  animation: floatIcon 4s ease-in-out infinite;
}
@keyframes floatIcon {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}
.hobby-hero .icon { width: 56px; height: 56px; color: var(--gold); }

.hero-text .kicker {
  display: inline-flex; align-items: center; gap: 12px;
  padding: 10px 18px; margin: 0 0 24px; border-radius: 999px;
  font-size: .7rem; font-weight: 600; letter-spacing: .22em; text-transform: uppercase;
  color: var(--gold);
  background: linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.6));
  border: 1px solid rgba(168,135,78,.22);
  box-shadow: 0 1px 0 rgba(255,255,255,.9) inset, 0 4px 12px -4px rgba(168,135,78,.15);
}
.hero-text .kicker::before {
  content: ""; width: 6px; height: 6px; border-radius: 50%; background: var(--gold);
  box-shadow: 0 0 0 4px rgba(168,135,78,.15);
}
.hobby-hero h1 { 
  font-family: var(--serif); font-weight: 300; font-size: clamp(3.5rem, 8vw, 6.5rem); 
  line-height: 1.05; letter-spacing: -0.03em; margin: 0 auto; color: var(--ink); 
  text-shadow: 0 1px 0 rgba(255,255,255,.7);
}
.hobby-hero h1 em { 
  font-style: italic;
  background: linear-gradient(135deg, #8f6f3a, var(--gold), var(--gold-2));
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent;
}

/* ✅ RESTORED BIG CENTERED IMAGE (Wide 3D Frame) */
.hero-image-frame {
  position: relative; width: 100%; max-width: 800px; margin: 56px auto 0;
  border-radius: 24px; overflow: hidden;
  background: linear-gradient(180deg, rgba(255,255,255,.7), rgba(247,244,236,.5));
  border: 1px solid rgba(255,255,255,.8);
  box-shadow: var(--shadow-2);
  transform-style: preserve-3d;
  transition: transform 0.6s var(--ease-out), box-shadow 0.6s var(--ease);
}
.hero-image-frame::after {
  content: ""; position: absolute; inset: 12px; border: 1px solid rgba(168,135,78,.2);
  border-radius: 16px; pointer-events: none; z-index: 2;
}
.hero-image-frame:hover {
  transform: translateY(-6px) scale(1.02);
  box-shadow: 0 1px 0 rgba(255,255,255,.95) inset, 0 30px 60px -15px rgba(20,18,14,.25);
}
.hero-image-frame img {
  width: 100%; height: auto; display: block;
  filter: grayscale(15%) contrast(1.05); transition: filter 0.6s, transform 0.8s var(--ease-out);
}
.hero-image-frame:hover img { filter: grayscale(0%) contrast(1); transform: scale(1.04); }

/* Tech Setup Strip */
.setup-strip {
  display: flex; justify-content: center; gap: 32px;
  margin-top: 40px; padding: 20px 24px;
  background: linear-gradient(180deg, rgba(255,255,255,.8), rgba(247,244,236,.5)); 
  border: 1px solid rgba(168,135,78,.15); border-radius: 16px;
  flex-wrap: wrap; box-shadow: var(--shadow-1);
}
.setup-item {
  display: flex; align-items: center; gap: 8px;
  font-size: 0.75rem; font-weight: 600; letter-spacing: 0.08em;
  text-transform: uppercase; color: var(--muted);
}
.setup-item strong { color: var(--ink); font-weight: 600; }
.setup-item .dot-icon {
  width: 6px; height: 6px; background: var(--gold); border-radius: 50%;
  box-shadow: 0 0 8px rgba(168,135,78,.5);
}

/* Quote */
.hobby-quote { 
  font-family: var(--serif); font-weight: 300; font-size: clamp(1.4rem, 3vw, 2.2rem); 
  line-height: 1.5; letter-spacing: -0.01em; text-align: center; 
  margin: 0 auto 100px; max-width: 900px; padding: 40px 20px; 
  position: relative; color: var(--ink);
  border-top: 1px solid var(--line); 
  border-bottom: 1px solid var(--line);
}
.hobby-quote em { color: var(--gold); font-style: italic; }

/* ===== NEW FEATURE: MARQUEE TICKER ===== */
.marquee-section {
  padding: 24px 0;
  background: rgba(255,255,255,.4);
  border-top: 1px solid var(--line);
  border-bottom: 1px solid var(--line);
  overflow: hidden; margin-bottom: 100px;
  position: relative; z-index: 2;
  backdrop-filter: blur(10px);
}
.marquee-track {
  display: flex; gap: 48px; white-space: nowrap;
  animation: marquee 30s linear infinite;
  width: max-content;
}
.marquee-track:hover { animation-play-state: paused; }
.marquee-track span {
  font-family: var(--serif); font-style: italic; font-size: 1.2rem;
  color: var(--gold); display: inline-flex; align-items: center; gap: 48px;
}
.marquee-track span::after { content: "</>"; font-family: monospace; font-size: 1.2rem; color: var(--ink-3); font-style: normal; }
@keyframes marquee { to { transform: translateX(-50%); } }

/* ===== EXPANDED CONTENT (Grid Layout) ===== */
.content-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;
  margin-bottom: 100px;
}
.content-card {
  padding: clamp(32px, 4vw, 48px) clamp(24px, 3vw, 32px);
  border-radius: 24px;
  background: linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.65));
  border: 1px solid rgba(255,255,255,.7);
  box-shadow: var(--shadow-1);
  transition: transform 0.5s var(--ease-out), box-shadow 0.5s var(--ease);
  position: relative; overflow: hidden;
  transform-style: preserve-3d; will-change: transform;
}
.content-card::before {
  content: ""; position: absolute; left: 0; top: 32px; bottom: 32px; width: 3px;
  border-radius: 3px; background: linear-gradient(to bottom, var(--gold), var(--gold-2));
  box-shadow: 0 0 10px rgba(196,165,102,.5);
}
.content-card:hover { box-shadow: var(--shadow-2); }
.content-card h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(1.6rem, 3vw, 2rem);
  color: var(--ink); margin: 0 0 20px; letter-spacing: -.02em;
  padding-left: 16px;
}
.content-card h2 em {
  font-style: italic;
  background: linear-gradient(135deg, #8f6f3a, var(--gold), var(--gold-2));
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent;
}
.hobby-content { 
  font-size: 0.95rem; font-weight: 300; line-height: 1.85; 
  color: var(--ink-3); padding-left: 16px;
}
.hobby-content p { margin: 0 0 16px; }
.hobby-content p:last-child { margin: 0; }

/* ===== NEW FEATURE: HORIZONTAL SCROLL TIMELINE ===== */
.timeline-section {
  margin-bottom: 100px;
}
.section-title {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2rem, 4vw, 3rem);
  color: var(--ink); margin: 0 0 40px; text-align: center;
}
.section-title em {
  font-style: italic;
  background: linear-gradient(135deg, #8f6f3a, var(--gold), var(--gold-2));
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent;
}
.horizontal-scroll {
  display: flex; gap: 24px; overflow-x: auto; padding-bottom: 24px;
  scroll-snap-type: x mandatory;
  scrollbar-width: thin; scrollbar-color: var(--gold) transparent;
}
.horizontal-scroll::-webkit-scrollbar { height: 6px; }
.horizontal-scroll::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 10px; }
.timeline-card {
  flex: 0 0 320px; scroll-snap-align: start;
  padding: 32px; border-radius: 20px;
  background: linear-gradient(180deg, rgba(255,255,255,.95), rgba(247,244,236,.7));
  border: 1px solid rgba(255,255,255,.8); box-shadow: var(--shadow-1);
  transition: transform 0.4s var(--ease-out);
}
.timeline-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-2); }
.timeline-year {
  font-family: var(--serif); font-size: 2rem; font-style: italic; color: var(--gold);
  margin-bottom: 12px; display: block;
}
.timeline-card h4 { font-family: var(--serif); font-size: 1.2rem; margin: 0 0 12px; color: var(--ink); }
.timeline-card p { font-size: 0.9rem; font-weight: 300; color: var(--ink-3); line-height: 1.6; margin: 0; }

/* ===== NEW FEATURE: ACCORDION FAQ ===== */
.faq-section {
  margin-bottom: 120px; max-width: 800px; margin-left: auto; margin-right: auto;
}
details.glass-accordion {
  border-radius: 20px; background: linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.65));
  border: 1px solid rgba(255,255,255,.7); box-shadow: var(--shadow-1);
  margin-bottom: 16px; overflow: hidden; transition: box-shadow 0.3s;
}
details.glass-accordion[open] { box-shadow: var(--shadow-2); }
details.glass-accordion summary {
  padding: 24px 32px; cursor: pointer;
  font-family: var(--serif); font-size: 1.2rem; font-weight: 400; color: var(--ink);
  display: flex; justify-content: space-between; align-items: center;
  list-style: none;
}
details.glass-accordion summary::-webkit-details-marker { display: none; }
details.glass-accordion summary::after {
  content: "+"; font-family: var(--sans); font-size: 1.5rem; font-weight: 300; color: var(--gold);
  transition: transform 0.4s var(--ease);
}
details.glass-accordion[open] summary::after { transform: rotate(45deg); }
.accordion-body { padding: 0 32px 32px; font-size: 0.95rem; font-weight: 300; line-height: 1.8; color: var(--ink-3); }

/* ===== STATS SECTION (Wide 3D Cards) ===== */
.hobby-stats {
  display: grid; grid-template-columns: repeat(3, 1fr);
  gap: 24px; padding-bottom: 120px;
}
.stat-box {
  position: relative; padding: 48px 32px; text-align: center; border-radius: 24px;
  background: linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.65));
  border: 1px solid rgba(255,255,255,.7);
  box-shadow: var(--shadow-1); overflow: hidden;
  transition: transform 0.5s var(--ease-out), box-shadow 0.5s var(--ease), border-color 0.4s;
  transform-style: preserve-3d; will-change: transform;
}
.stat-box::before {
  content: ""; position: absolute; inset: 0;
  background: linear-gradient(135deg, rgba(196,165,102,.10), transparent 55%);
  opacity: 0; transition: opacity 0.4s var(--ease); pointer-events: none; border-radius: inherit;
}
.stat-box:hover { border-color: rgba(168,135,78,.4); box-shadow: var(--shadow-2); }
.stat-box:hover::before { opacity: 1; }
.stat-box .stat-icon {
  width: 48px; height: 48px; color: var(--gold); margin: 0 auto 20px; display: block;
  transition: transform 0.5s var(--ease);
}
.stat-box:hover .stat-icon { transform: scale(1.15) rotate(-5deg); }
.stat-box .label {
  font-size: 0.74rem; font-weight: 600; letter-spacing: 0.18em; 
  text-transform: uppercase; color: var(--muted); margin-bottom: 12px; display: block;
}
.stat-box .value {
  font-family: var(--serif); font-size: 1.6rem; font-weight: 400; color: var(--ink);
  transition: color 0.3s;
}
.stat-box:hover .value { color: var(--gold); }

/* Reveal */
.reveal { opacity: 0; transform: translateY(30px); transition: opacity 1s var(--ease-out), transform 1s var(--ease-out); }
.reveal.in { opacity: 1; transform: translateY(0); }

/* ✅ RESPONSIVE */
@media (max-width: 1024px) {
  .content-grid { grid-template-columns: 1fr 1fr; }
  .hobby-stats { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 768px) {
  .content-grid { grid-template-columns: 1fr; }
  .hobby-stats { grid-template-columns: 1fr; gap: 16px; }
  .content-card::before { display: none; }
  .content-card h2, .hobby-content { padding-left: 0; }
  .floating-code { display: none; }
  .setup-strip { flex-direction: column; gap: 16px; align-items: center; }
}
@media (prefers-reduced-motion: reduce) {
  .hobby-systems *, .hobby-systems *::before, .hobby-systems *::after {
    animation: none !important; transition: none !important;
  }
  .reveal { opacity: 1; transform: none; }
  .marquee-track { animation: none; }
}
</style>

<!-- Reading Progress Bar -->
<div class="read-progress" id="readProgress"></div>

<!-- Cursor Glow -->
<div class="cursor-glow" id="cursorGlow"></div>

<!-- Parallax Blueprint Background -->
<div class="blueprint-bg" id="blueprintBg" aria-hidden="true"></div>

<main class="hobby-systems">
  <!-- Floating Background Elements -->
  <span class="floating-code fc-1">&lt;/&gt;</span>
  <span class="floating-code fc-2">{ }</span>
  <span class="floating-code fc-3">=&gt;</span>
  <span class="floating-code fc-4">[ ]</span>

  <div class="container">
    <a href="<?php echo esc_url(home_url('/friends/frank/')); ?>" class="back-link">Back to Frank</a>
    
    <!-- HERO SECTION -->
    <section class="hobby-hero">
      <div class="icon-wrapper">
        <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z"/>
        </svg>
      </div>
      <div class="hero-text">
        <p class="kicker">Architecture & Logic</p>
        <h1 class="reveal">Building Systems <em>& Logic.</em></h1>
      </div>
      
      <!-- Big Original Image -->
      <div class="hero-image-frame reveal" data-tilt>
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/frankcode.jpg'); ?>" alt="Frank building systems">
      </div>
      
      <!-- Tech Setup Strip -->
      <div class="setup-strip reveal">
        <div class="setup-item">
          <span class="dot-icon"></span> Editor: <strong>VS Code</strong>
        </div>
        <div class="setup-item">
          <span class="dot-icon"></span> OS: <strong>Windows 11</strong>
        </div>
        <div class="setup-item">
          <span class="dot-icon"></span> Stack: <strong>PHP + MySQL</strong>
        </div>
      </div>
    </section>
    
    <!-- DYNAMIC QUOTE -->
    <blockquote class="hobby-quote reveal">
      <?php if ( !empty($first_para) ) : ?>
        <?php echo $first_para; ?>
      <?php else : ?>
        “ A system is never finished. It evolves, adapts, and <em>teaches you something new every time you touch it.</em> ”
      <?php endif; ?>
    </blockquote>
  </div>

  <!-- NEW FEATURE: MARQUEE TICKER -->
  <div class="marquee-section reveal">
    <div class="marquee-track">
      <span>Clean Code</span><span>Architecture</span><span>Logic</span>
      <span>Scalability</span><span>Database</span><span>Optimization</span>
      <span>Clean Code</span><span>Architecture</span><span>Logic</span>
      <span>Scalability</span><span>Database</span><span>Optimization</span>
    </div>
  </div>

  <div class="container">
    <!-- EXPANDED CONTENT (Wide Grid Layout) -->
    <section class="content-grid">
      <div class="content-card reveal" data-tilt>
        <h2>The <em>Mindset.</em></h2>
        <div class="hobby-content">
          <?php 
            $has_content = false;
            if ( have_posts() ) :
              while ( have_posts() ) : the_post();
                $paragraphs = explode('</p>', get_the_content());
                $count = 0;
                foreach($paragraphs as $p) {
                  if(trim(strip_tags($p)) !== '' && $count < 2) {
                    echo '<p>' . strip_tags($p, '<em><strong><i><b><a><br>') . '</p>';
                    $count++;
                    $has_content = true;
                  }
                }
              endwhile;
            endif;
            
            // Fallback text kung walang nilagay sa WordPress editor
            if ( !$has_content ) {
              echo '<p>I enjoy building systems from the ground up — designing the architecture, connecting the dots, and watching it come alive.</p>';
              echo '<p>It requires patience, foresight, and an obsession with details. But when it finally works, the feeling is unmatched.</p>';
            }
          ?>
        </div>
      </div>

      <div class="content-card reveal" data-tilt>
        <h2>The <em>Architecture.</em></h2>
        <div class="hobby-content">
          <p>Every system starts with a plan. I map out the database schema, plan the user flow, and sketch the UI before writing a single line of code.</p>
          <p>I believe in clean, scalable code. Using MVC patterns, proper folder structures, and documented functions ensures anyone can pick it up later.</p>
        </div>
      </div>

      <div class="content-card reveal" data-tilt>
        <h2>The <em>Execution.</em></h2>
        <div class="hobby-content">
          <p>This is where the logic gets tested. Writing queries, handling forms, securing APIs, and debugging errors line by line.</p>
          <p>I love the puzzle. There's a unique satisfaction in turning a blank terminal into a fully functioning, live application.</p>
        </div>
      </div>
    </section>

    <!-- NEW FEATURE: HORIZONTAL SCROLL TIMELINE -->
    <section class="timeline-section reveal">
      <h2 class="section-title">My Dev <em>Journey.</em></h2>
      <div class="horizontal-scroll">
        <div class="timeline-card">
          <span class="timeline-year">2019</span>
          <h4>The Spark</h4>
          <p>Sinubukan ko lang mag HTML/CSS out of curiosity. Napadaan sa YouTube tutorials at doon nagsimula ang lahat.</p>
        </div>
        <div class="timeline-card">
          <span class="timeline-year">2020</span>
          <h4>First System</h4>
          <p>Gumawa ako ng simpleng library management system para sa school project. Sobrang basic pero proud na proud ako.</p>
        </div>
        <div class="timeline-card">
          <span class="timeline-year">2022</span>
          <h4>Full Stack Era</h4>
          <p>Nag-deep dive sa backend. Natutunan ko ang PHP, MySQL, at kung paano pag-connectin ang lahat ng API.</p>
        </div>
        <div class="timeline-card">
          <span class="timeline-year">2024</span>
          <h4>Capstone Ready</h4>
          <p>Ngayon, kaya ko nang mag-build from scratch. Ang Capstone namin ang pinakamalaking system na nagawa ko so far.</p>
        </div>
      </div>
    </section>

    <!-- NEW FEATURE: ACCORDION FAQ -->
    <section class="faq-section reveal">
      <h2 class="section-title" style="text-align: center; margin-bottom: 40px;">Developer <em>Thoughts.</em></h2>
      
      <details class="glass-accordion">
        <summary>What's your favorite part of building a system?</summary>
        <div class="accordion-body">
          <p>The "Aha!" moment. When you've been staring at a bug for hours, and suddenly the logic clicks and everything works. It's addictive. The debugging process is painful, but the payoff is worth it.</p>
        </div>
      </details>

      <details class="glass-accordion">
        <summary>What tech stack do you prefer?</summary>
        <div class="accordion-body">
          <p>For the backend, I stick to PHP and MySQL — it's reliable, well-documented, and gets the job done. For the frontend, I like working with vanilla JavaScript and CSS to keep things lightweight, but I also use React when a project demands it.</p>
        </div>
      </details>

      <details class="glass-accordion">
        <summary>Any advice for aspiring developers?</summary>
        <div class="accordion-body">
          <p>Build things. Don't just watch tutorials. You can watch 100 hours of videos, but you won't learn until you break your own code and figure out how to fix it. Also, learn Git early. It will save your life.</p>
        </div>
      </details>
    </section>

    <!-- STATS SECTION (Wide 3D Tiles) -->
    <section class="hobby-stats reveal">
      <div class="stat-box" data-tilt>
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z"/></svg>
        <span class="label">Focus</span>
        <div class="value">Full Stack</div>
      </div>
      <div class="stat-box" data-tilt>
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.79 4.21,10.21L9,15V16A2,2 0 0,0 11,18M17.9,17.39C17.64,16.58 16.9,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39Z"/></svg>
        <span class="label">Main Stack</span>
        <div class="value">PHP / JS</div>
      </div>
      <div class="stat-box" data-tilt>
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12,2A7,7 0 0,0 5,9C5,11.38 6.19,13.47 8,14.74V17A1,1 0 0,0 9,18H15A1,1 0 0,0 16,17V14.74C17.81,13.47 19,11.38 19,9A7,7 0 0,0 12,2M9,21A1,1 0 0,0 10,22H14A1,1 0 0,0 15,21V20H9V21Z"/></svg>
        <span class="label">Mindset</span>
        <div class="value">Always Learning</div>
      </div>
    </section>
  </div>
</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const isDesktop = window.matchMedia('(min-width: 769px)').matches;

  // 1. Reveal Animation
  const reveals = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && !reduceMotion) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry, i) => {
        if (entry.isIntersecting) {
          setTimeout(() => {
            entry.target.classList.add('in');
          }, i * 100);
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -60px 0px' });
    reveals.forEach(reveal => observer.observe(reveal));
  } else {
    reveals.forEach(reveal => reveal.classList.add('in'));
  }

  // 2. Reading Progress Bar
  const progressBar = document.getElementById('readProgress');
  if (progressBar) {
    let ticking = false;
    window.addEventListener('scroll', () => {
      if (!ticking) {
        requestAnimationFrame(() => {
          const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
          const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
          progressBar.style.width = (scrollTop / scrollHeight * 100) + '%';
          ticking = false;
        });
        ticking = true;
      }
    }, { passive: true });
  }

  // 3. Cursor Glow & Mouse Parallax Background
  const cursorGlow = document.getElementById('cursorGlow');
  const blueprintBg = document.getElementById('blueprintBg');
  
  if (isDesktop && !reduceMotion) {
    document.addEventListener('mousemove', (e) => {
      if (cursorGlow) {
        cursorGlow.style.left = e.clientX + 'px';
        cursorGlow.style.top = e.clientY + 'px';
      }
      if (blueprintBg) {
        const cx = (e.clientX / window.innerWidth - 0.5) * 2;
        const cy = (e.clientY / window.innerHeight - 0.5) * 2;
        blueprintBg.style.transform = `translate(${cx * 20}px, ${cy * 20}px)`;
      }
    }, { passive: true });
  }

  // 4. 3D Tilt on Cards
  if (isDesktop && !reduceMotion) {
    document.querySelectorAll('[data-tilt]').forEach(card => {
      card.addEventListener('mousemove', e => {
        const r = card.getBoundingClientRect();
        const px = (e.clientX - r.left) / r.width - 0.5;
        const py = (e.clientY - r.top) / r.height - 0.5;
        card.style.transform = `perspective(1000px) rotateY(${px * 5}deg) rotateX(${-py * 5}deg) translateY(-4px)`;
      });
      card.addEventListener('mouseleave', () => { card.style.transform = ''; });
    });
  }
});
</script>

<?php get_footer(); ?>
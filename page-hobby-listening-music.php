<?php
/**
 * Template Name: Hobby - Listening to Music - jay
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

/* ===== HOBBY: LISTENING TO MUSIC (JAY) — Ultra 3D Edition ===== */
.hobby-music {
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
.hobby-music::before {
  content: ""; position: fixed; inset: 0; pointer-events: none; z-index: 0;
  background:
    radial-gradient(800px 600px at 15% 5%, rgba(196,165,102,.10), transparent 70%),
    radial-gradient(600px 500px at 85% 10%, rgba(212,188,139,.10), transparent 70%),
    radial-gradient(900px 700px at 50% 100%, rgba(196,165,102,.06), transparent 70%);
}

/* Parallax Grid Background */
.music-bg {
  position: fixed; inset: -20%; pointer-events: none; z-index: 0;
  background-image: radial-gradient(rgba(168,135,78,.08) 1px, transparent 1px);
  background-size: 35px 35px;
  will-change: transform;
}

/* Floating Elements */
.floating-music {
  position: absolute; font-family: var(--serif); color: var(--gold); 
  opacity: 0.06; font-size: 6rem; pointer-events: none; z-index: 0;
  animation: floatSlow 15s infinite ease-in-out;
  user-select: none; font-style: italic;
}
.fm-1 { top: 15%; left: 5%; animation-delay: 0s; }
.fm-2 { top: 40%; right: 8%; animation-delay: 3s; font-size: 8rem; }
.fm-3 { bottom: 20%; left: 10%; animation-delay: 6s; }
.fm-4 { top: 70%; right: 15%; animation-delay: 9s; font-size: 4rem; }
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
.hobby-music .container { max-width: 1200px; margin: 0 auto; padding: 0 var(--gutter); position: relative; z-index: 2; }

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

/* ===== HERO SECTION ===== */
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

/* Quote */
.hobby-quote { 
  font-family: var(--serif); font-weight: 300; font-size: clamp(1.4rem, 3vw, 2.2rem); 
  line-height: 1.5; letter-spacing: -0.01em; text-align: center; 
  margin: 0 auto 100px; max-width: 900px; padding: 40px 20px; 
  position: relative; color: var(--ink);
  border-top: 1px solid var(--line); 
  border-bottom: 1px solid var(--line);
  font-style: italic;
}
.hobby-quote em { color: var(--gold); }

/* ===== MARQUEE TICKER ===== */
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
.marquee-track span::after { content: "🎵"; font-size: 1.2rem; color: var(--ink-3); font-style: normal; }
@keyframes marquee { to { transform: translateX(-50%); } }

/* ===== ABOUT CONTENT ===== */
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

/* ===== FAVORITE MUSIC GRID ===== */
.music-section {
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

.music-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;
}
.music-card {
  border-radius: 20px; overflow: hidden;
  background: linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.65));
  border: 1px solid rgba(255,255,255,.7);
  box-shadow: var(--shadow-1);
  transition: transform 0.5s var(--ease-out), box-shadow 0.5s var(--ease);
  transform-style: preserve-3d; will-change: transform;
}
.music-card:hover {
  transform: translateY(-6px); box-shadow: var(--shadow-2);
}
.music-image {
  width: 100%; aspect-ratio: 3/4; overflow: hidden;
  background: var(--paper);
}
.music-image img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  transition: transform 0.6s var(--ease);
}
.music-card:hover .music-image img { transform: scale(1.05); }
.music-info {
  padding: 24px;
}
.music-info span {
  font-size: 0.68rem; font-weight: 600; letter-spacing: 0.14em;
  text-transform: uppercase; color: var(--gold); display: block; margin-bottom: 8px;
}
.music-info h3 {
  font-family: var(--serif); font-size: 1.4rem; font-weight: 400;
  color: var(--ink); margin: 0 0 12px;
}
.music-info p {
  font-size: 0.92rem; font-weight: 300; line-height: 1.6;
  color: var(--ink-3); margin: 0;
}

/* ===== HORIZONTAL SCROLL TIMELINE ===== */
.timeline-section {
  margin-bottom: 100px;
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

/* ===== ACCORDION FAQ ===== */
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

/* ===== STATS SECTION ===== */
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
  .content-grid, .music-grid { grid-template-columns: 1fr 1fr; }
  .hobby-stats { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 768px) {
  .content-grid, .music-grid { grid-template-columns: 1fr; }
  .hobby-stats { grid-template-columns: 1fr; gap: 16px; }
  .content-card::before { display: none; }
  .content-card h2, .hobby-content { padding-left: 0; }
  .floating-music { display: none; }
}
@media (prefers-reduced-motion: reduce) {
  .hobby-music *, .hobby-music *::before, .hobby-music *::after {
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

<!-- Parallax Grid Background -->
<div class="music-bg" id="musicBg" aria-hidden="true"></div>

<main class="hobby-music">
  <!-- Floating Background Elements -->
  <span class="floating-music fm-1">♪</span>
  <span class="floating-music fm-2">♫</span>
  <span class="floating-music fm-3">🎧</span>
  <span class="floating-music fm-4">♬</span>

  <div class="container">
    <a href="<?php echo esc_url(home_url('/friends/jay/')); ?>" class="back-link">Back to Jay</a>
    
    <!-- HERO SECTION -->
    <section class="hobby-hero">
      <div class="icon-wrapper">
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M9 18V5l12-2v13"/>
          <circle cx="6" cy="18" r="3"/>
          <circle cx="18" cy="16" r="3"/>
        </svg>
      </div>
      <div class="hero-text">
        <p class="kicker">My Personal Interest</p>
        <h1 class="reveal">Listening to Music <em>& Melodies.</em></h1>
      </div>
    </section>
    
    <!-- DYNAMIC QUOTE -->
    <blockquote class="hobby-quote reveal">
      <?php if ( !empty($first_para) ) : ?>
        <?php echo $first_para; ?>
      <?php else : ?>
        “ Music speaks what words cannot express. Every melody brings emotions, memories, and moments that make life meaningful. ”
      <?php endif; ?>
    </blockquote>
  </div>

  <!-- MARQUEE TICKER -->
  <div class="marquee-section reveal">
    <div class="marquee-track">
      <span>Pop</span><span>OPM</span><span>R&B</span>
      <span>Acoustic</span><span>Emotions</span><span>Vibes</span>
      <span>Pop</span><span>OPM</span><span>R&B</span>
      <span>Acoustic</span><span>Emotions</span><span>Vibes</span>
    </div>
  </div>

  <div class="container">
    <!-- EXPANDED CONTENT (Wide Grid Layout) -->
    <section class="content-grid">
      <div class="content-card reveal" data-tilt>
        <h2>The <em>Escape.</em></h2>
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
            
            // Fallback text para kay Jay
            if ( !$has_content ) {
              echo '<p>Listening to music is one of my favorite things to do during my free time. It helps me relax, clear my mind, and enjoy the moment.</p>';
              echo '<p>For me, music is more than just entertainment. It helps me express my emotions, improve my mood, and find inspiration in everyday life.</p>';
            }
          ?>
        </div>
      </div>

      <div class="content-card reveal" data-tilt>
        <h2>The <em>Genres.</em></h2>
        <div class="hobby-content">
          <p>I enjoy listening to different genres, especially <strong>pop, OPM, R&B, and acoustic songs</strong>.</p>
          <p>Each song has its own rhythm and message that makes listening more enjoyable.</p>
        </div>
      </div>

      <div class="content-card reveal" data-tilt>
        <h2>The <em>Comfort.</em></h2>
        <div class="hobby-content">
          <p>Music speaks what words cannot express. Every melody brings emotions, memories, and moments that make life meaningful.</p>
          <p>It's my comfort zone after a long and busy day.</p>
        </div>
      </div>
    </section>

    <!-- FAVORITE MUSIC GRID -->
    <section class="music-section reveal">
      <h2 class="section-title">My Favorite <em>Songs.</em></h2>
      <div class="music-grid">
        
        <div class="music-card" data-tilt>
          <div class="music-image">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/anak.jpg'); ?>" alt="Anak" loading="lazy">
          </div>
          <div class="music-info">
            <span>01 / Favorite Song</span>
            <h3>Anak</h3>
            <p>A meaningful song that reminds me of family, love, and the importance of appreciating the people who are always there for us.</p>
          </div>
        </div>

        <div class="music-card" data-tilt>
          <div class="music-image">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mahalmagmahal.jpg'); ?>" alt="Mahal Magmahal" loading="lazy">
          </div>
          <div class="music-info">
            <span>02 / Favorite Song</span>
            <h3>Mahal Magmahal</h3>
            <p>A song about love and emotions that reminds me how beautiful it is to love and give your heart to someone special.</p>
          </div>
        </div>

        <div class="music-card" data-tilt>
          <div class="music-image">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/maghintaykalamang.jpg'); ?>" alt="Maghintay Ka Lamang" loading="lazy">
          </div>
          <div class="music-info">
            <span>03 / Favorite Song</span>
            <h3>Maghintay Ka Lamang</h3>
            <p>A meaningful song that reminds me to stay patient, keep hoping, and believe that better days will eventually come.</p>
          </div>
        </div>

      </div>
    </section>

    <!-- HORIZONTAL SCROLL TIMELINE -->
    <section class="timeline-section reveal">
      <h2 class="section-title">Music <em>Eras.</em></h2>
      <div class="horizontal-scroll">
        <div class="timeline-card">
          <span class="timeline-year">Childhood</span>
          <h4>OPM & Classic</h4>
          <p>Nagsimula sa mga classic OPM na pinapatugtog sa bahay. Doon ko naramdaman ang saya at lungkot ng bawat kanta.</p>
        </div>
        <div class="timeline-card">
          <span class="timeline-year">Teenage Years</span>
          <h4>Pop & Acoustic</h4>
          <p>Nagsimula akong mag-explore ng pop at acoustic. Dito ako natutong mag-gitara at mag-kanta mag-isa.</p>
        </div>
        <div class="timeline-card">
          <span class="timeline-year">College</span>
          <h4>R&B & Soul</h4>
          <p>Mas nag-deep dive ako sa R&B. Yung mga kantang may mabigat na emosyon at magagandang lyrics ang naging paborito ko.</p>
        </div>
        <div class="timeline-card">
          <span class="timeline-year">Now</span>
          <h4>All Genres</h4>
          <p>Ngayon, kahit anong genre pa yan, basta maganda ang melody at lyrics, pinapakinggan ko. Music is my escape.</p>
        </div>
      </div>
    </section>

    <!-- ACCORDION FAQ -->
    <section class="faq-section reveal">
      <h2 class="section-title" style="text-align: center; margin-bottom: 40px;">Music <em>Thoughts.</em></h2>
      
      <details class="glass-accordion">
        <summary>Why do you love listening to music?</summary>
        <div class="accordion-body">
          <p>It's an escape. It helps me relax, clear my mind, and enjoy the moment, especially after a long and busy day. Music also helps me express my emotions when I can't find the right words.</p>
        </div>
      </details>

      <details class="glass-accordion">
        <summary>What's your favorite OPM song and why?</summary>
        <div class="accordion-body">
          <p>"Anak" by Freddie Aguilar. It's a classic that reminds me of family, love, and the importance of appreciating the people who are always there for us. The lyrics are simple but deeply meaningful.</p>
        </div>
      </details>

      <details class="glass-accordion">
        <summary>How does music affect your mood?</summary>
        <div class="accordion-body">
          <p>Music has a huge impact on my mood. Kapag stress ako, nagpapatugtog ako ng acoustic songs. Kapag masaya, upbeat pop. It's like a soundtrack to whatever I'm feeling at the moment.</p>
        </div>
      </details>
    </section>

    <!-- STATS SECTION (Wide 3D Tiles) -->
    <section class="hobby-stats reveal">
      <div class="stat-box" data-tilt>
        <svg class="stat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M9 18V5l12-2v13"/>
          <circle cx="6" cy="18" r="3"/>
          <circle cx="18" cy="16" r="3"/>
        </svg>
        <span class="label">Favorite Genres</span>
        <div class="value">Pop & OPM</div>
      </div>
      <div class="stat-box" data-tilt>
        <svg class="stat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M3 10v4h4l5 4V6l-5 4H3z"/>
          <path d="M16 9a5 5 0 0 1 0 6"/>
          <path d="M19 5a10 10 0 0 1 0 14"/>
        </svg>
        <span class="label">My Interest</span>
        <div class="value">Music Lover</div>
      </div>
      <div class="stat-box" data-tilt>
        <svg class="stat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 3v18"/>
          <path d="M8 7h8"/>
          <path d="M8 17h8"/>
          <path d="M5 12h14"/>
        </svg>
        <span class="label">What I Love</span>
        <div class="value">Relax & Enjoy</div>
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
  const musicBg = document.getElementById('musicBg');
  
  if (isDesktop && !reduceMotion) {
    document.addEventListener('mousemove', (e) => {
      if (cursorGlow) {
        cursorGlow.style.left = e.clientX + 'px';
        cursorGlow.style.top = e.clientY + 'px';
      }
      if (musicBg) {
        const cx = (e.clientX / window.innerWidth - 0.5) * 2;
        const cy = (e.clientY / window.innerHeight - 0.5) * 2;
        musicBg.style.transform = `translate(${cx * 20}px, ${cy * 20}px)`;
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
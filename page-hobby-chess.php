<?php
/**
 * Template Name: Hobby - Chess - frank
 * Template Post Type: page
 * Ultra 3D Aesthetic Edition (Wide Desktop + Features)
 */
get_header(); 

// Dynamic Quote
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

/* ===== HOBBY: CHESS — Ultra 3D Edition ===== */
.hobby-chess {
  --ivory:#F7F4EC; --paper:#FBFAF5;
  --ink:#14120E; --ink-3:#4A443A;
  --gold:#A8874E; --gold-2:#C4A566; --gold-3:#D4BC8B;
  --line:rgba(168,135,78,.16); --line-2:rgba(168,135,78,.08);
  --muted:#7A7266; --muted-2:#9A9284;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  --ease:cubic-bezier(.22,.8,.2,1); --ease-out:cubic-bezier(.16,1,.3,1);
  --gutter:clamp(24px,6vw,96px);

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
.hobby-chess::before {
  content: ""; position: fixed; inset: 0; pointer-events: none; z-index: 0;
  background:
    radial-gradient(800px 600px at 15% 5%, rgba(196,165,102,.10), transparent 70%),
    radial-gradient(600px 500px at 85% 10%, rgba(212,188,139,.10), transparent 70%),
    radial-gradient(900px 700px at 50% 100%, rgba(196,165,102,.06), transparent 70%);
}

/* Chess Board Background (Mouse Parallax) */
.chess-bg {
  position: fixed; inset: -20%; pointer-events: none; z-index: 0;
  background-image: 
    linear-gradient(45deg, rgba(168,135,78,.04) 25%, transparent 25%), 
    linear-gradient(-45deg, rgba(168,135,78,.04) 25%, transparent 25%), 
    linear-gradient(45deg, transparent 75%, rgba(168,135,78,.04) 75%), 
    linear-gradient(-45deg, transparent 75%, rgba(168,135,78,.04) 75%);
  background-size: 120px 120px;
  background-position: 0 0, 0 60px, 60px -60px, -60px 0px;
  will-change: transform;
}

/* Floating Chess Symbols */
.floating-chess {
  position: absolute; font-family: var(--serif); color: var(--gold); 
  opacity: 0.05; font-size: 8rem; pointer-events: none; z-index: 0;
  animation: floatChess 15s infinite ease-in-out;
  user-select: none; font-style: italic;
}
.fc-1 { top: 10%; left: 5%; animation-delay: 0s; }
.fc-2 { top: 35%; right: 8%; animation-delay: 3s; font-size: 10rem; }
.fc-3 { bottom: 20%; left: 10%; animation-delay: 6s; }
.fc-4 { top: 70%; right: 15%; animation-delay: 9s; font-size: 6rem; }
@keyframes floatChess {
  0%, 100% { transform: translateY(0) rotate(0deg); }
  50% { transform: translateY(-30px) rotate(15deg); }
}

/* Reading Progress */
.read-progress {
  position: fixed; top: 0; left: 0; height: 3px; width: 0%;
  background: linear-gradient(90deg, #8f6f3a, var(--gold), var(--gold-2), var(--gold-3));
  z-index: 9999; transition: width 0.1s ease-out;
  box-shadow: 0 0 12px rgba(196,165,102,0.6);
}

/* Wide Container */
.hobby-chess .container { max-width: 1200px; margin: 0 auto; padding: 0 var(--gutter); position: relative; z-index: 2; }

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
.hero-text h1 { 
  font-family: var(--serif); font-weight: 300; font-size: clamp(3.5rem, 8vw, 6.5rem); 
  line-height: 1.05; letter-spacing: -0.03em; margin: 0 auto; color: var(--ink); 
  text-shadow: 0 1px 0 rgba(255,255,255,.7);
}
.hero-text h1 em { 
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
  filter: grayscale(20%) contrast(1.05); transition: filter 0.6s, transform 0.8s var(--ease-out);
}
.hero-image-frame:hover img { filter: grayscale(0%) contrast(1); transform: scale(1.04); }

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
.marquee-track span::after { content: "♟"; font-size: 1.2rem; color: var(--ink-3); font-style: normal; }
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
.content-card:hover {
  box-shadow: var(--shadow-2);
}
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
  /* Custom Scrollbar */
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
  .hero-image-frame { margin-top: 40px; }
}
@media (prefers-reduced-motion: reduce) {
  .hobby-chess *, .hobby-chess *::before, .hobby-chess *::after {
    animation: none !important; transition: none !important;
  }
  .reveal { opacity: 1; transform: none; }
  .marquee-track { animation: none; }
}
</style>

<!-- Reading Progress Bar -->
<div class="read-progress" id="readProgress"></div>

<!-- 3D Chess Board Background -->
<div class="chess-bg" id="chessBg" aria-hidden="true"></div>

<main class="hobby-chess">
  <!-- Floating Chess Symbols -->
  <span class="floating-chess fc-1">♔</span>
  <span class="floating-chess fc-2">♕</span>
  <span class="floating-chess fc-3">♖</span>
  <span class="floating-chess fc-4">♘</span>

  <div class="container">
    <a href="<?php echo esc_url(home_url('/friends/frank/')); ?>" class="back-link">Back to Frank</a>
    
    <!-- HERO SECTION -->
    <section class="hobby-hero">
      <div class="hero-text">
        <p class="kicker">The Game of Kings</p>
        <h1 class="reveal">Chess <em>& Strategy.</em></h1>
      </div>
      
      <!-- Big Original Image -->
      <div class="hero-image-frame reveal" data-tilt>
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/frankchess.jpg'); ?>" alt="Frank playing chess">
      </div>
    </section>
    
    <!-- DYNAMIC QUOTE -->
    <blockquote class="hobby-quote reveal">
      <?php if ( !empty($first_para) ) : ?>
        <?php echo $first_para; ?>
      <?php else : ?>
        “ In chess, every move is a commitment. You learn patience, foresight, and the art of <em>looking before you leap.</em> ”
      <?php endif; ?>
    </blockquote>
  </div>

  <!-- NEW FEATURE: MARQUEE TICKER -->
  <div class="marquee-section reveal">
    <div class="marquee-track">
      <span>Sicilian Defense</span><span>Endgame Mastery</span><span>Queen's Gambit</span>
      <span>Tactics</span><span>Positional Play</span><span>Checkmate</span>
      <span>Sicilian Defense</span><span>Endgame Mastery</span><span>Queen's Gambit</span>
      <span>Tactics</span><span>Positional Play</span><span>Checkmate</span>
    </div>
  </div>

  <div class="container">
    <!-- EXPANDED CONTENT (Wide Grid Layout) -->
    <section class="content-grid">
      <div class="content-card reveal" data-tilt>
        <h2>The <em>Mindset.</em></h2>
        <div class="hobby-content">
          <?php 
            if ( have_posts() ) :
              while ( have_posts() ) : the_post();
                $paragraphs = explode('</p>', get_the_content());
                $count = 0;
                foreach($paragraphs as $p) {
                  if(trim(strip_tags($p)) !== '' && $count < 2) {
                    echo '<p>' . strip_tags($p, '<em><strong><i><b><a><br>') . '</p>';
                    $count++;
                  }
                }
              endwhile;
            else :
              echo '<p>Chess taught me that the best moves aren\'t always the most obvious ones. It is a game of silence, calculation, and nerve.</p>';
            endif;
          ?>
        </div>
      </div>

      <div class="content-card reveal" data-tilt>
        <h2>The <em>Opening.</em></h2>
        <div class="hobby-content">
          <p>My journey always starts with the <strong>Sicilian Defense</strong>. It's aggressive, unbalanced, and forces the opponent to fight on my terms.</p>
        </div>
      </div>

      <div class="content-card reveal" data-tilt>
        <h2>The <em>Endgame.</em></h2>
        <div class="hobby-content">
          <p>This is where the real game begins. The board is empty, the pieces are few, but the tension is at its peak. Endgames require absolute precision.</p>
        </div>
      </div>
    </section>

    <!-- NEW FEATURE: HORIZONTAL SCROLL TIMELINE -->
    <section class="timeline-section reveal">
      <h2 class="section-title">My Chess <em>Journey.</em></h2>
      <div class="horizontal-scroll">
        <div class="timeline-card">
          <span class="timeline-year">2018</span>
          <h4>The Beginning</h4>
          <p>Natuto ako mag-chess dahil sa tatay ko. Simpleng laro lang sa bahay hanggang sa nahasa ako sa mga paligsahan sa school.</p>
        </div>
        <div class="timeline-card">
          <span class="timeline-year">2020</span>
          <h4>Online Era</h4>
          <p>Pandemic hits. Nagsimula akong maglaro sa Chess.com at Lichess. Dito ko na-develop yung opening repertoire ko.</p>
        </div>
        <div class="timeline-card">
          <span class="timeline-year">2022</span>
          <h4>First Tournament</h4>
          <p>Sumali ako sa unang official tournament ko. Natalo sa semi-finals pero sobrang laking learning experience.</p>
        </div>
        <div class="timeline-card">
          <span class="timeline-year">2024</span>
          <h4>Peak Rating</h4>
          <p>Naabot ko yung 1500 ELO rating. Hindi pa GM level pero patuloy pa rin ang grind at pag-aaral araw-araw.</p>
        </div>
      </div>
    </section>

    <!-- NEW FEATURE: ACCORDION FAQ -->
    <section class="faq-section reveal">
      <h2 class="section-title" style="text-align: center; margin-bottom: 40px;">Chess <em>Thoughts.</em></h2>
      
      <details class="glass-accordion">
        <summary>Why do you love chess?</summary>
        <div class="accordion-body">
          <p>Because it's a game of pure logic and psychology. You can't blame luck or dice. Every win is earned, and every loss is a lesson. It teaches patience, resilience, and how to plan ahead.</p>
        </div>
      </details>

      <details class="glass-accordion">
        <summary>Who is your favorite chess player?</summary>
        <div class="accordion-body">
          <p>Magnus Carlsen. Not just because he's the best, but because of his endgame mastery and his ability to squeeze wins out of seemingly drawn positions. Also, Mikhail Tal for his aggressive and chaotic style.</p>
        </div>
      </details>

      <details class="glass-accordion">
        <summary>What advice would you give to beginners?</summary>
        <div class="accordion-body">
          <p>Focus on the fundamentals first. Don't memorize 20 moves of opening theory if you don't understand the principles behind them. Learn how to control the center, develop your pieces, and protect your king. And always—always—look at the whole board before making a move.</p>
        </div>
      </details>
    </section>

    <!-- STATS SECTION (Wide 3D Tiles) -->
    <section class="hobby-stats reveal">
      <div class="stat-box" data-tilt>
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.79 4.21,10.21L9,15V16A2,2 0 0,0 11,18M17.9,17.39C17.64,16.58 16.9,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39Z"/></svg>
        <span class="label">Experience</span>
        <div class="value">5+ Years</div>
      </div>
      <div class="stat-box" data-tilt>
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12,3L2,12H5V20H19V12H22L12,3M12,8.75A2.25,2.25 0 0,1 14.25,11A2.25,2.25 0 0,1 12,13.25A2.25,2.25 0 0,1 9.75,11A2.25,2.25 0 0,1 12,8.75M12,15C13.5,15 16.5,15.75 16.5,17.25V18H7.5V17.25C7.5,15.75 10.5,15 12,15Z"/></svg>
        <span class="label">Favorite Opening</span>
        <div class="value">Sicilian Defense</div>
      </div>
      <div class="stat-box" data-tilt>
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z"/></svg>
        <span class="label">Current Rating</span>
        <div class="value">1500 ELO</div>
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

  // 2. Reading Progress Bar & Mouse Parallax Background
  const progressBar = document.getElementById('readProgress');
  const chessBg = document.getElementById('chessBg');

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

  // 3. Mouse Parallax on Background (Ultra 3D Feel)
  if (chessBg && isDesktop && !reduceMotion) {
    document.addEventListener('mousemove', (e) => {
      const cx = (e.clientX / window.innerWidth - 0.5) * 2;
      const cy = (e.clientY / window.innerHeight - 0.5) * 2;
      chessBg.style.transform = `translate(${cx * 20}px, ${cy * 20}px)`;
    });
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
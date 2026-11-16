<?php
/**
 * Template Name: Friend Profile - Jay Mark
 * Template Post Type: page
 * Ultra 3D Aesthetic Edition
 */

get_header();

$member_name = get_the_title();
$first_letter = substr($member_name, 0, 1);
?>

<style>
/* ===== INDIVIDUAL PORTFOLIO — Ultra 3D Edition ===== */
.portfolio-page {
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
  -webkit-font-smoothing: antialiased; overflow-x: hidden;
  position: relative;
}

/* Ambient stage */
.portfolio-page::before {
  content: ""; position: fixed; inset: 0; pointer-events: none; z-index: 0;
  background:
    radial-gradient(600px 400px at 15% 5%, rgba(196,165,102,.10), transparent 70%),
    radial-gradient(500px 400px at 85% 10%, rgba(212,188,139,.10), transparent 70%),
    radial-gradient(700px 500px at 50% 100%, rgba(196,165,102,.06), transparent 70%);
}

.portfolio-page .container { max-width: 1280px; margin: 0 auto; padding: 0 var(--gutter); position: relative; z-index: 1; }

/* ===== HERO ===== */
.pf-hero {
  padding: clamp(180px, 20vw, 260px) 0 clamp(80px, 10vw, 140px);
  position: relative; overflow: hidden;
}

/* Floating cube accent */
.pf-cube {
  position: absolute; right: 10%; top: 30%; width: 80px; height: 80px;
  transform-style: preserve-3d; animation: cubeSpin 20s infinite linear;
  pointer-events: none; z-index: 1; opacity: .55;
}
.pf-cube span {
  position: absolute; inset: 0; border: 1px solid rgba(168,135,78,.35);
  background: linear-gradient(135deg, rgba(196,165,102,.18), transparent);
  border-radius: 8px;
}
.pf-cube span:nth-child(1){transform:translateZ(40px)}
.pf-cube span:nth-child(2){transform:rotateY(90deg) translateZ(40px)}
.pf-cube span:nth-child(3){transform:rotateX(90deg) translateZ(40px)}
.pf-cube span:nth-child(4){transform:rotateY(180deg) translateZ(40px)}
.pf-cube span:nth-child(5){transform:rotateY(-90deg) translateZ(40px)}
.pf-cube span:nth-child(6){transform:rotateX(-90deg) translateZ(40px)}
@keyframes cubeSpin { 0%{transform:rotateX(20deg) rotateY(0)} 100%{transform:rotateX(20deg) rotateY(360deg)} }
@media (max-width: 900px) { .pf-cube { display: none; } }

.pf-hero .grid {
  display: grid; grid-template-columns: 1.2fr 1fr; gap: clamp(40px, 8vw, 120px);
  align-items: center; position: relative;
}

/* Kicker Badge */
.pf-hero .kicker {
  display: inline-flex; align-items: center; gap: 12px;
  padding: 10px 18px; margin: 0 0 32px; border-radius: 999px;
  font-size: .7rem; font-weight: 600; letter-spacing: .22em; text-transform: uppercase;
  color: var(--gold);
  background: linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.6));
  border: 1px solid rgba(168,135,78,.22);
  box-shadow: 0 1px 0 rgba(255,255,255,.9) inset, 0 -1px 0 rgba(168,135,78,.06) inset, 0 6px 16px -8px rgba(168,135,78,.25);
}
.pf-hero .kicker::before {
  content: ""; width: 6px; height: 6px; border-radius: 50%; background: var(--gold);
  box-shadow: 0 0 0 4px rgba(168,135,78,.15);
}

/* Headline */
.pf-hero h1 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(3.5rem, 7vw, 7rem);
  line-height: 0.95; letter-spacing: -0.03em; margin: 0 0 24px; color: var(--ink);
  text-shadow: 0 1px 0 rgba(255,255,255,.7), 0 2px 8px rgba(20,18,14,.05);
}
.pf-hero h1 em {
  font-style: italic;
  background: linear-gradient(135deg, #8f6f3a, var(--gold), var(--gold-2), var(--gold-3));
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent;
  filter: drop-shadow(0 2px 6px rgba(168,135,78,.2));
}
.pf-hero .tagline {
  font-size: 1.05rem; font-weight: 300; line-height: 1.85; color: var(--ink-3);
  margin: 0 0 40px; max-width: 46ch;
}

/* Buttons */
.pf-buttons { display: flex; gap: 24px; align-items: center; flex-wrap: wrap; }
.pf-btn {
  position:relative; display: inline-flex; align-items: center; justify-content: center; gap: 12px;
  background: linear-gradient(135deg, #14120E 0%, #2E2A22 100%); 
  color: #FFFFFF !important; text-decoration: none;
  padding: 16px 32px; border-radius: 12px; overflow: hidden;
  font-family: var(--sans); font-weight: 600; font-size: 0.76rem; 
  letter-spacing: 0.14em; text-transform: uppercase;
  box-shadow: 0 1px 0 rgba(255,255,255,.15) inset, 0 -1px 0 rgba(0,0,0,.3) inset, 0 10px 24px -8px rgba(20,18,14,.4);
  transition: transform 0.4s var(--ease-out), box-shadow 0.4s var(--ease);
}
.pf-btn span { position: relative; z-index: 2; }
.pf-btn::before {
  content: ""; position: absolute; inset: 0; z-index: 0;
  background: linear-gradient(135deg, var(--gold), var(--gold-2)); opacity: 0;
  transition: opacity 0.4s var(--ease);
}
.pf-btn:hover { 
  transform: translateY(-2px); 
  box-shadow: 0 1px 0 rgba(255,255,255,.3) inset, 0 -1px 0 rgba(0,0,0,.2) inset, 0 16px 36px -10px rgba(168,135,78,.4); 
}
.pf-btn:hover::before { opacity: 1; }

.pf-btn-ghost {
  display: inline-flex; align-items: center; gap: 12px;
  font-family: var(--sans); font-weight: 600; font-size: 0.76rem;
  letter-spacing: 0.14em; text-transform: uppercase;
  color: var(--ink); text-decoration: none; padding: 14px 22px; border-radius: 12px;
  background: linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.7));
  border: 1px solid rgba(168,135,78,.2);
  box-shadow: 0 1px 0 rgba(255,255,255,.95) inset, 0 4px 12px -4px rgba(20,18,14,.1);
  transition: all 0.4s var(--ease-out);
}
.pf-btn-ghost::before { content: "←"; font-size: 1.1rem; transition: transform 0.4s var(--ease); }
.pf-btn-ghost:hover {
  color: var(--gold); transform: translateY(-2px);
  border-color: rgba(168,135,78,.45);
  box-shadow: 0 1px 0 rgba(255,255,255,.95) inset, 0 8px 20px -6px rgba(168,135,78,.3);
}
.pf-btn-ghost:hover::before { transform: translateX(-4px); }

/* 3D Framed Portrait */
.pf-hero .visual {
  position: relative; aspect-ratio: 4/5; border-radius: 24px;
  overflow: hidden; background: linear-gradient(180deg, rgba(255,255,255,.7), rgba(247,244,236,.5));
  border: 1px solid rgba(255,255,255,.8);
  box-shadow: var(--shadow-2);
  display: flex; align-items: center; justify-content: center;
  transition: transform 0.6s var(--ease-out), box-shadow 0.6s var(--ease);
}
.pf-hero .visual::after {
  content: ""; position: absolute; inset: 12px; border: 1px solid rgba(168,135,78,.15);
  border-radius: 16px; pointer-events: none; z-index: 2; transition: border-color .4s;
}
.pf-hero .visual:hover {
  transform: translateY(-4px) rotate(-0.5deg);
  box-shadow: 0 1px 0 rgba(255,255,255,.95) inset, 0 20px 60px -12px rgba(20,18,14,.24), 0 60px 120px -60px rgba(20,18,14,.3);
}
.pf-hero .visual:hover::after { border-color: rgba(168,135,78,.35); }
.pf-hero .visual img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.8s var(--ease); }
.pf-hero .visual:hover img { transform: scale(1.03); }
.pf-hero .visual .initial {
  font-family: var(--serif); font-size: 10rem; color: var(--gold); opacity: 0.3; font-style: italic;
}

/* ===== MINDSET (Dark Slab) ===== */
.pf-mindset {
  padding: var(--section-y) 0; position: relative;
}
.pf-mindset::before {
  content: ""; position: absolute; inset: 0;
  background: linear-gradient(135deg, #14120E 0%, #1a1712 100%);
  z-index: 0; border-radius: 32px; margin: 0 clamp(12px,3vw,48px);
  box-shadow: 0 1px 0 rgba(255,255,255,.05) inset, 0 -1px 0 rgba(0,0,0,.4) inset, 0 30px 80px -20px rgba(20,18,14,.4);
}
.pf-mindset .container { position: relative; z-index: 2; text-align: center; }
.pf-mindset .quote-mark {
  font-family: var(--serif); font-size: 6rem; line-height: 0; color: var(--gold-3);
  display: block; margin-bottom: 24px; opacity: 0.5; font-style: italic;
}
.pf-mindset blockquote {
  font-family: var(--serif); font-weight: 300; font-size: clamp(1.6rem, 4vw, 3rem);
  line-height: 1.3; letter-spacing: -0.02em; margin: 0 auto; max-width: 900px;
  color: var(--ivory); text-shadow: 0 1px 0 rgba(0,0,0,.3);
}
.pf-mindset blockquote em { 
  display: inline-block; margin-top: 24px;
  font-size: .55em; letter-spacing: .02em;
  color: var(--gold-3); font-style: italic; 
}

/* ===== ABOUT ===== */
.pf-about {
  padding: var(--section-y) 0;
}
.pf-about .grid {
  display: grid; grid-template-columns: 1fr 1.5fr; gap: clamp(40px, 8vw, 120px);
  align-items: start;
}
.pf-about h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2rem, 4vw, 3.5rem);
  line-height: 1.1; letter-spacing: -0.02em; margin: 0; color: var(--ink);
  text-shadow: 0 1px 0 rgba(255,255,255,.7);
}
.pf-about h2 em {
  font-style: italic;
  background: linear-gradient(135deg, #8f6f3a, var(--gold), var(--gold-2));
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent;
}

/* Glass Bio Panel */
.pf-about .bio-content {
  font-size: 1.05rem; font-weight: 300; line-height: 1.85; color: var(--ink-3);
  padding: clamp(32px, 4vw, 48px); border-radius: 24px;
  background: linear-gradient(180deg, rgba(255,255,255,.75), rgba(247,244,236,.55));
  border: 1px solid rgba(255,255,255,.7); backdrop-filter: blur(12px);
  box-shadow: var(--shadow-1); position: relative;
}
.pf-about .bio-content::before {
  content: ""; position: absolute; left: 0; top: 32px; bottom: 32px; width: 2px;
  border-radius: 2px; background: linear-gradient(180deg, var(--gold), var(--gold-2));
  box-shadow: 0 0 10px rgba(196,165,102,.5);
}
.pf-about .bio-content p { margin: 0 0 24px; padding-left: 16px; }
.pf-about .bio-content p:last-child { margin-bottom: 0; }

/* ===== SKILLS ===== */
.pf-skills { padding: var(--section-y) 0; }
.pf-skills .section-head {
  display: flex; justify-content: space-between; align-items: baseline;
  margin-bottom: 64px; padding-bottom: 24px; border-bottom: 1px solid var(--line);
}
.pf-skills h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2rem, 4vw, 3.5rem);
  letter-spacing: -0.02em; margin: 0; color: var(--ink);
}
.pf-skills h2 em {
  font-style: italic;
  background: linear-gradient(135deg, #8f6f3a, var(--gold), var(--gold-2));
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent;
}
.pf-skills .subtitle {
  font-size: 0.76rem; font-weight: 600; letter-spacing: 0.18em; text-transform: uppercase;
  color: var(--muted);
}

/* 3D Skill Cards */
.skill-cards {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;
}
.skill-card {
  position: relative; padding: 32px; border-radius: 20px; overflow: hidden;
  background: linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.65));
  border: 1px solid rgba(255,255,255,.7);
  box-shadow: var(--shadow-1);
  transition: transform 0.5s var(--ease-out), box-shadow 0.5s var(--ease), border-color 0.4s;
}
.skill-card::before {
  content: ""; position: absolute; left: 0; top: 0; bottom: 0; width: 3px;
  background: linear-gradient(to bottom, var(--gold), var(--gold-2));
  transform: scaleY(0); transform-origin: top; transition: transform 0.5s var(--ease);
}
.skill-card:hover {
  border-color: rgba(168,135,78,.4); transform: translateY(-6px);
  box-shadow: var(--shadow-2);
}
.skill-card:hover::before { transform: scaleY(1); }

.skill-card .num {
  font-family: var(--serif); font-style: italic; font-size: 1.15rem;
  color: var(--gold); display: block; margin-bottom: 16px;
}
.skill-card h3 {
  font-family: var(--serif); font-size: 1.4rem; font-weight: 400; 
  margin: 0 0 12px; color: var(--ink); transition: color 0.3s;
}
.skill-card:hover h3 { color: var(--gold); }
.skill-card p {
  font-size: 0.95rem; font-weight: 300; line-height: 1.7; color: var(--ink-3);
  margin: 0;
}

/* ===== HOBBIES ===== */
.pf-hobbies {
  padding: var(--section-y) 0;
}
.pf-hobbies h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2rem, 4vw, 3.5rem);
  letter-spacing: -.02em; margin: 0 0 56px; color: var(--ink); text-align: center;
}
.pf-hobbies h2 em {
  font-style: italic;
  background: linear-gradient(135deg, #8f6f3a, var(--gold), var(--gold-2));
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent;
}

.hobbies-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;
  max-width: 960px; margin: 0 auto;
}
.hobby-item {
  position: relative; display: flex; flex-direction: column;
  align-items: center; justify-content: center; gap: 16px;
  padding: 32px 20px; min-height: 150px; text-align: center;
  background: linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.65));
  border: 1px solid rgba(255,255,255,.7); border-radius: 20px;
  text-decoration: none; box-shadow: var(--shadow-1); overflow: hidden;
  transition: transform 0.4s var(--ease-out), box-shadow 0.4s var(--ease), border-color 0.4s;
}
.hobby-item::before {
  content: ""; position: absolute; inset: 0;
  background: linear-gradient(135deg, rgba(196,165,102,.10), transparent 55%);
  opacity: 0; transition: opacity 0.4s var(--ease); pointer-events: none;
}
.hobby-item > * { position: relative; z-index: 1; }

.hobby-icon {
  display: grid; place-items: center; width: 64px; height: 64px; border-radius: 16px;
  background: linear-gradient(160deg, rgba(255,255,255,.9), rgba(247,244,236,.6));
  border: 1px solid rgba(168,135,78,.15); color: var(--gold);
  box-shadow: 0 1px 0 rgba(255,255,255,.9) inset, 0 4px 10px -2px rgba(20,18,14,.05);
  transition: transform 0.5s var(--ease), background 0.4s, border-color 0.4s, box-shadow 0.4s;
}
.hobby-icon svg { width: 32px; height: 32px; fill: none; stroke: currentColor; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }

.hobby-item span {
  font-family: var(--sans); font-size: .9rem; font-weight: 600; color: var(--ink-3);
  letter-spacing: .04em; transition: color 0.3s; position: relative;
}
.hobby-item span::after {
  content: ""; position: absolute; left: 50%; bottom: -8px; width: 0; height: 2px;
  border-radius: 2px; background: var(--gold); transform: translateX(-50%);
  transition: width 0.5s var(--ease);
}

.hobby-item:hover {
  border-color: rgba(168,135,78,.4); transform: translateY(-4px);
  box-shadow: var(--shadow-2);
}
.hobby-item:hover::before { opacity: 1; }
.hobby-item:hover .hobby-icon {
  color: var(--ivory); background: linear-gradient(135deg, var(--gold), var(--gold-2));
  border-color: transparent; transform: scale(1.05);
  box-shadow: 0 6px 16px -4px rgba(168,135,78,.4);
}
.hobby-item:hover span { color: var(--gold); }
.hobby-item:hover span::after { width: 60%; }

/* ===== CTA (Dark Slab) ===== */
.pf-cta {
  padding: var(--section-y) 0; position: relative;
}
.pf-cta::before {
  content: ""; position: absolute; inset: 0;
  background: linear-gradient(135deg, #14120E 0%, #1a1712 100%);
  z-index: 0; border-radius: 32px; margin: 0 clamp(12px,3vw,48px);
  box-shadow: 0 1px 0 rgba(255,255,255,.05) inset, 0 -1px 0 rgba(0,0,0,.4) inset, 0 30px 80px -20px rgba(20,18,14,.4);
}
.pf-cta .container { position: relative; z-index: 1; text-align: center; }
.pf-cta h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2.5rem, 5vw, 4.5rem);
  line-height: 1; letter-spacing: -0.03em; margin: 0 0 24px; color: var(--ivory);
  text-shadow: 0 1px 0 rgba(0,0,0,.3);
}
.pf-cta h2 em {
  font-style: italic;
  background: linear-gradient(135deg, var(--gold) 0%, var(--gold-2) 50%, var(--gold-3) 100%);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent;
}
.pf-cta p {
  color: rgba(247, 244, 236, 0.7); font-weight: 300; line-height: 1.8;
  margin: 0 auto 48px; max-width: 46ch; font-size: 1.05rem;
}

/* Socials */
.pf-cta .socials { display: flex; justify-content: center; gap: 16px; flex-wrap: wrap; }
.pf-cta .socials a {
  display: inline-flex; align-items: center; gap: 10px;
  font-size: 0.74rem; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase;
  color: var(--ivory); text-decoration: none; padding: 12px 24px;
  background: rgba(255,255,255,.06); border: 1px solid rgba(255,255,255,.1);
  border-radius: 50px; transition: all 0.35s var(--ease);
}
.pf-cta .socials a svg { width: 16px; height: 16px; fill: currentColor; transition: transform 0.35s var(--ease); }
.pf-cta .socials a:hover { 
  background: var(--gold); color: var(--ink); border-color: var(--gold); 
  transform: translateY(-2px); box-shadow: 0 10px 24px -8px rgba(168,135,78,.5);
}
.pf-cta .socials a:hover svg { transform: scale(1.1); }

/* ===== RESPONSIVE ===== */
@media (max-width: 900px) {
  .pf-hero .grid { grid-template-columns: 1fr; gap: 48px; text-align: center; }
  .pf-hero .kicker { margin: 0 auto 32px; }
  .pf-buttons { justify-content: center; }
  .pf-hero .visual { aspect-ratio: 1/1; max-width: 350px; margin: 0 auto; }
  .pf-about .grid { grid-template-columns: 1fr; gap: 32px; text-align: center; }
  .pf-about .bio-content::before { display: none; }
  .pf-about .bio-content p { padding-left: 0; }
  .skill-cards { grid-template-columns: 1fr; }
  .hobbies-grid { grid-template-columns: repeat(2, 1fr); }
  .pf-skills .section-head { flex-direction: column; align-items: center; gap: 12px; text-align: center; }
}
@media (max-width: 520px) {
  .hobbies-grid { grid-template-columns: 1fr; }
  .pf-buttons { flex-direction: column; align-items: stretch; }
}
@media (prefers-reduced-motion: reduce) {
  .portfolio-page *, .portfolio-page *::before, .portfolio-page *::after {
    animation: none !important; transition: none !important;
  }
  .pf-cube { display: none; }
}
</style>

<main class="portfolio-page">
  
  <section class="pf-hero">
    <div class="pf-cube" aria-hidden="true">
      <span></span><span></span><span></span><span></span><span></span><span></span>
    </div>
    <div class="container">
      <div class="grid">
        <div class="text">
          <p class="kicker">System Analysis</p>
          <h1>Hi, I'm <em><?php echo esc_html(explode(' ', $member_name)[0]); ?>.</em></h1>
          <p class="tagline">
            I analyze systems with a focus on efficiency, functionality, and user needs. 
            I believe great systems go beyond solving problems they transform complex processes into seamless, 
            well structured solutions that make technology more intuitive, reliable, and meaningful.
          </p>
          <div class="pf-buttons">
            <a href="#contact" class="pf-btn"><span>Get in Touch</span></a>
            <a href="<?php echo esc_url(home_url('/our-members/')); ?>" class="pf-btn-ghost">Back to Members</a>
          </div>
        </div>
        <div class="visual">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/markdp.jpg'); ?>" alt="<?php echo esc_attr($member_name); ?>">
        </div>
      </div>
    </div>
  </section>

  <section class="pf-mindset">
    <div class="container">
      <blockquote>
        “ Mag decisyon nang pinag-iisipan, para sa huli walang pag-sisihan. ”
        <br> <em>— Jay Mark</em></br>
      </blockquote>
    </div>
  </section>

  <section class="pf-about">
    <div class="container">
      <div class="grid">
        <div>
          <p class="kicker">About Me</p>
          <h2>A mind for <em>design.</em></h2>
        </div>
        <div class="bio-content">
          <p>
            As a System Analyst, I don't just focus on how a system works. 
            I focus on understanding user needs, analyzing processes, 
            and finding effective solutions to real world problems. 
            I believe that every detail matters, from gathering requirements and analyzing data to designing efficient system workflows. 
            I'm driven by curiosity, critical thinking, and the desire to turn complex ideas into practical and meaningful digital solutions. 
          </p>
          <p>
            I believe that being a great System Analyst isn't about knowing everything about systems from the beginning. 
            It's about being curious enough to understand user needs, resourceful enough to find solutions, 
            analytical enough to solve complex problems, 
            and disciplined enough to deliver efficient and well-designed system solutions within the given deadline.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="pf-skills">
    <div class="container">
      <div class="section-head">
        <h2>What I <em>do.</em></h2>
        <p class="subtitle">Core Competencies</p>
      </div>

      <div class="skill-cards">
        <div class="skill-card">
          <span class="num">01</span>
          <h3>System Analysis</h3>
          <p>
            Analyzing system requirements, understanding user needs, and
            identifying effective solutions to improve system functionality
            and efficiency.
          </p>
        </div>

        <div class="skill-card">
          <span class="num">02</span>
          <h3>Requirements Gathering</h3>
          <p>
            Gathering and documenting user requirements through interviews,
            research, and analysis to ensure that system features meet
            user expectations.
          </p>
        </div>

        <div class="skill-card">
          <span class="num">03</span>
          <h3>System Modeling & Design</h3>
          <p>
            Creating system diagrams, workflows, and data models to
            visualize system processes and provide a clear guide
            for system development.
          </p>
        </div>
      </div>
    </div>
  </section>
 
  <section class="pf-hobbies">
    <div class="container">
      <h2>Beyond the <em>screen.</em></h2>
      <div class="hobbies-grid">

        <a href="<?php echo esc_url(home_url('/hobbies/badminton/')); ?>" class="hobby-item">
          <div class="hobby-icon">
            <svg viewBox="0 0 24 24">
              <path d="M14 14L21 21"/>
              <path d="M3 3L9 2L15 8L9 14L3 8Z"/>
              <path d="M9 14L15 8"/>
              <path d="M15 15L19 11"/>
              <path d="M17 17L21 13"/>
            </svg>
          </div>
          <span>Badminton</span>
        </a>

        <a href="<?php echo esc_url(home_url('/hobbies/games/')); ?>" class="hobby-item">
          <div class="hobby-icon">
            <svg viewBox="0 0 24 24">
              <path d="M6.5 7H17.5C19.4 7 20.8 8.4 21.2 10.3L22 15.5C22.3 17.4 20.2 18.8 18.6 17.6L15.5 15H8.5L5.4 17.6C3.8 18.8 1.7 17.4 2 15.5L2.8 10.3C3.2 8.4 4.6 7 6.5 7Z"/>
              <path d="M7 10V14M5 12H9"/>
              <circle cx="16.5" cy="11" r="1"/>
              <circle cx="18.5" cy="13" r="1"/>
            </svg>
          </div>
          <span>Online Games</span>
        </a>

        <a href="<?php echo esc_url(home_url('/hobbies/workout/')); ?>" class="hobby-item">
          <div class="hobby-icon">
            <svg viewBox="0 0 24 24">
              <path d="M6 7V17"/>
              <path d="M3 9V15"/>
              <path d="M18 7V17"/>
              <path d="M21 9V15"/>
              <path d="M6 12H18"/>
              <path d="M3 12H6"/>
              <path d="M18 12H21"/>
            </svg>
          </div>
          <span>Home Workout</span>
        </a>

        <a href="<?php echo esc_url(home_url('/hobbies/watching-movies/')); ?>" class="hobby-item">
          <div class="hobby-icon">
            <svg viewBox="0 0 24 24">
              <rect x="3" y="4" width="18" height="16" rx="2"/>
              <path d="M3 9H21"/>
              <path d="M7 4L10 9"/>
              <path d="M14 4L17 9"/>
              <path d="M10 13L15 15.5L10 18V13Z"/>
            </svg>
          </div>
          <span>Watching Movies</span>
        </a>

        <a href="<?php echo esc_url(home_url('/hobbies/listening-music/')); ?>" class="hobby-item">
          <div class="hobby-icon">
            <svg viewBox="0 0 24 24">
              <path d="M9 18V5L21 3V16"/>
              <path d="M9 8L21 6"/>
              <ellipse cx="6" cy="18" rx="3" ry="2"/>
              <ellipse cx="18" cy="16" rx="3" ry="2"/>
            </svg>
          </div>
          <span>Listening to Music</span>
        </a>

      </div>
    </div>
  </section>

  <section class="pf-cta" id="contact">
    <div class="container">
      <h2>Let's build <em>together.</em></h2>
      <p>For more info kindly message me on any of the platforms below.</p>
      
      <div class="socials">
        <a href="https://www.facebook.com/share/18mtNPWVmV/" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          Facebook
        </a>
        <a href="https://www.instagram.com/jaymark_generalao?srtk=M3NpdzRnZXIyYW0z" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
          Instagram
        </a>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
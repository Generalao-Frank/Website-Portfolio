<?php
/**
 * Template Name: Friend Profile - Kim
 * Template Post Type: page
 * Ultra 3D Aesthetic Edition
 */
get_header(); 

$member_name = get_the_title();
$first_name = explode(' ', $member_name)[0];
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
  min-height: 100vh; position: relative; overflow-x: hidden;
  -webkit-font-smoothing: antialiased;
}

/* Custom Scrollbar */
.portfolio-page ::-webkit-scrollbar { width: 8px; }
.portfolio-page ::-webkit-scrollbar-track { background: var(--ivory); }
.portfolio-page ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 10px; }

/* Ambient stage */
.portfolio-page::before {
  content: ""; position: fixed; inset: 0; pointer-events: none; z-index: 0;
  background:
    radial-gradient(600px 400px at 15% 5%, rgba(196,165,102,.10), transparent 70%),
    radial-gradient(500px 400px at 85% 10%, rgba(212,188,139,.10), transparent 70%),
    radial-gradient(700px 500px at 50% 100%, rgba(196,165,102,.06), transparent 70%);
}

.portfolio-page .container { max-width: 1280px; margin: 0 auto; padding: 0 var(--gutter); position: relative; z-index: 2; }

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

/* Floating Background Elements */
.floating-bg {
  position: absolute; font-family: var(--serif); color: var(--gold); 
  opacity: 0.04; pointer-events: none; z-index: 0;
  animation: floatSlow 15s infinite ease-in-out;
  user-select: none; font-style: italic; font-size: 10rem;
}
.fb-1 { top: 10%; left: 5%; animation-delay: 0s; }
.fb-2 { top: 40%; right: 8%; animation-delay: 3s; font-size: 15rem; }
.fb-3 { bottom: 20%; left: 10%; animation-delay: 6s; }
@keyframes floatSlow {
  0%, 100% { transform: translateY(0) rotate(0deg); }
  50% { transform: translateY(-30px) rotate(10deg); }
}

/* ===== HERO ===== */
.pf-hero {
  padding: clamp(180px, 20vw, 260px) 0 clamp(80px, 10vw, 140px);
  position: relative;
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
  display: grid; grid-template-columns: 1.1fr 1fr; gap: clamp(40px, 8vw, 120px);
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
  font-family: var(--serif); font-weight: 300; font-size: clamp(3rem, 6vw, 5.5rem);
  line-height: 1.05; letter-spacing: -0.03em; margin: 0 0 24px; color: var(--ink);
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
  font-size: 1.1rem; font-weight: 300; line-height: 1.85; color: var(--ink-3);
  margin: 0 0 40px; max-width: 46ch;
}

/* Buttons */
.pf-buttons { display: flex; gap: 24px; align-items: center; flex-wrap: wrap; }
.pf-btn {
  position:relative; display: inline-flex; align-items: center; gap: 12px;
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

/* Back to Members Button */
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
.pf-hero .visual img { 
  width: 100%; height: 100%; object-fit: cover; display: block;
  filter: grayscale(20%); transition: transform 0.8s var(--ease-out), filter 0.8s; 
}
.pf-hero .visual:hover img { transform: scale(1.03); filter: grayscale(0%); }

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
.pf-mindset blockquote {
  font-family: var(--serif); font-weight: 300; font-size: clamp(1.6rem, 4vw, 3rem);
  line-height: 1.3; letter-spacing: -0.02em; margin: 0 auto; max-width: 900px;
  color: var(--ivory); text-shadow: 0 1px 0 rgba(0,0,0,.3);
}
.pf-mindset blockquote em { color: var(--gold-3); font-style: italic; }

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

.skill-cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
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

/* ===== HOBBIES (Frank's Style) ===== */
.pf-stats {
  padding: 0 0 var(--section-y);
}
.pf-stats h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2rem, 4vw, 3.5rem);
  letter-spacing: -.02em; margin: 0; color: var(--ink); text-align: center;
}
.pf-stats h2 em {
  font-style: italic;
  background: linear-gradient(135deg, #8f6f3a, var(--gold), var(--gold-2));
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent;
}

.hobbies-grid {
  display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; max-width: 1100px; margin: 0 auto;
}

/* Glass Hobby Item */
.hobby-item {
  position: relative; display: flex; flex-direction: column;
  align-items: center; justify-content: center; gap: 16px;
  padding: 32px 20px; text-align: center;
  background: linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.65));
  border: 1px solid rgba(255,255,255,.7);
  border-radius: 20px; overflow: hidden;
  box-shadow: var(--shadow-1);
  transition: transform .4s var(--ease-out), box-shadow .4s var(--ease), border-color .4s;
}
.hobby-item::before {
  content: ""; position: absolute; inset: 0;
  background: linear-gradient(135deg, rgba(196,165,102,.10), transparent 55%);
  opacity: 0; transition: opacity .4s var(--ease); pointer-events: none;
}
.hobby-item > * { position: relative; z-index: 1; }

/* Small Icon Box */
.hobby-icon {
  display: grid; place-items: center;
  width: 60px; height: 60px; border-radius: 16px;
  background: linear-gradient(160deg, rgba(255,255,255,.9), rgba(247,244,236,.6));
  border: 1px solid rgba(168,135,78,.15);
  color: var(--gold);
  box-shadow: 0 1px 0 rgba(255,255,255,.9) inset, 0 4px 10px -2px rgba(20,18,14,.05);
  transition: transform .5s var(--ease), background .4s, border-color .4s, box-shadow .4s;
}
.hobby-icon svg { width: 28px; height: 28px; fill: currentColor; }

.hobby-item span {
  font-family: var(--sans); font-size: .9rem; font-weight: 600;
  color: var(--ink-3); letter-spacing: .04em; position: relative;
  transition: color .3s;
}
.hobby-item span::after {
  content: ""; position: absolute; left: 50%; bottom: -8px; width: 0; height: 2px;
  border-radius: 2px; background: var(--gold); transform: translateX(-50%);
  transition: width .5s var(--ease);
}

/* Hover Effects */
.hobby-item:hover {
  border-color: rgba(168,135,78,.4); transform: translateY(-4px);
  box-shadow: var(--shadow-2);
}
.hobby-item:hover::before { opacity: 1; }
.hobby-item:hover .hobby-icon {
  color: var(--ivory); background: linear-gradient(135deg, var(--gold), var(--gold-2));
  border-color: transparent; transform: rotate(-6deg) scale(1.05);
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

/* Reveal Animation */
.reveal { opacity: 0; transform: translateY(30px); transition: opacity 1s var(--ease-out), transform 1s var(--ease-out); }
.reveal.in { opacity: 1; transform: translateY(0); }

/* Responsive */
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
  .floating-bg, .pf-cube { display: none; }
}
@media (max-width: 520px) {
  .hobbies-grid { grid-template-columns: 1fr; }
}
@media (prefers-reduced-motion: reduce) {
  .portfolio-page *, .portfolio-page *::before, .portfolio-page *::after {
    animation: none !important; transition: none !important;
  }
  .reveal { opacity: 1; transform: none; }
}
</style>

<!-- Reading Progress Bar -->
<div class="read-progress" id="readProgress"></div>

<!-- Cursor Glow -->
<div class="cursor-glow" id="cursorGlow"></div>

<main class="portfolio-page">
  <!-- Floating Background Elements -->
  <span class="floating-bg fb-1">✎</span>
  <span class="floating-bg fb-2">📖</span>
  <span class="floating-bg fb-3">✍</span>

  <!-- HERO SECTION -->
  <section class="pf-hero">
    <div class="pf-cube" aria-hidden="true">
      <span></span><span></span><span></span><span></span><span></span><span></span>
    </div>
    <div class="container">
      <div class="grid">
        <div class="text">
          <p class="kicker">Technical Writer</p>
          <h1>Hi, I'm <em><?php echo esc_html($first_name); ?>.</em></h1>
          <p class="tagline">
            I craft clear and meaningful technical documentation that bridges complex ideas and practical understanding. 
            I focus on organizing information, explaining technical concepts, and ensuring every detail is accurate, accessible, and easy to follow.
          </p>
          <div class="pf-buttons">
            <a href="#contact" class="pf-btn"><span>Get in Touch</span></a>
            <a href="<?php echo esc_url(home_url('/our-members/')); ?>" class="pf-btn-ghost">Back to Members</a>
          </div>
        </div>
        <div class="visual">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/kimmy.jpg'); ?>" alt="<?php echo esc_attr($member_name); ?>">
        </div>
      </div>
    </div>
  </section>

  <!-- MINDSET SECTION -->
  <section class="pf-mindset">
    <div class="container">
      <blockquote>
        “ Great technical writing turns complexity into clarity, and knowledge into something <em>everyone can understand.</em> ” <br><em>— Kim</em>
      </blockquote>
    </div>
  </section>

  <!-- ABOUT SECTION -->
  <section class="pf-about">
    <div class="container">
      <div class="grid">
        <div>
          <p class="kicker">About Me</p>
          <h2>A mind for <em>writing.</em></h2>
        </div>
        <div class="bio-content">
          <p>
            As a Technical Writer, I don't just focus on writing words. I focus on transforming complex information into clear, organized, and meaningful documentation. 
            I believe that effective communication, accuracy, and attention to detail are essential in making technical information easier to understand and use.
          </p>
          <p>
            I believe that being a great Technical Writer isn't simply about knowing how to write. 
            It's about understanding complex concepts, organizing information logically, explaining technical processes clearly, and ensuring that every document serves its purpose. 
            It's about turning complicated ideas into accessible knowledge that helps people understand, learn, and work more effectively.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- SKILLS SECTION -->
  <section class="pf-skills">
    <div class="container">
      <div class="section-head">
        <h2>What I <em>do.</em></h2>
        <p class="subtitle">Core Competencies</p>
      </div>
      <div class="skill-cards">
        <div class="skill-card reveal">
          <span class="num">01</span>
          <h3>Technical Documentation</h3>
          <p>Writing clear, structured user manuals, API references, and system guides. Making complex information easy to digest.</p>
        </div>
        <div class="skill-card reveal">
          <span class="num">02</span>
          <h3>Content Organization</h3>
          <p>Structuring information logically. Creating outlines, hierarchies, and navigation flows that help readers find what they need.</p>
        </div>
        <div class="skill-card reveal">
          <span class="num">03</span>
          <h3>Attention to Detail</h3>
          <p>Ensuring every word, diagram, and instruction is accurate. Proofreading and editing for clarity, consistency, and tone.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- HOBBIES SECTION (Frank's Style) -->
  <section class="pf-stats">
    <div class="container">
      <div class="section-head" style="margin-bottom: 48px; justify-content: center; text-align: center; border: none;">
        <h2>Beyond the <em>screen.</em></h2>
      </div>
      
      <div class="hobbies-grid">
        
        <!-- WATCHING DRAMA -->
        <div class="hobby-item reveal">
          <div class="hobby-icon">
            <svg viewBox="0 0 24 24"><path d="M21,3H3C1.89,3 1,3.89 1,5V17A2,2 0 0,0 3,19H8V21H16V19H21A2,2 0 0,0 23,17V5C23,3.89 22.1,3 21,3M21,17H3V5H21M16,11L9,15V7"/></svg>
          </div>
          <span>Watching Drama</span>
        </div>

        <!-- SINGING -->
        <div class="hobby-item reveal">
          <div class="hobby-icon">
            <svg viewBox="0 0 24 24"><path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12C20,12.5 19.92,12.96 19.76,13.39C19.21,12.11 17.89,11.25 16.5,11.25C15.93,11.25 15.41,11.42 15,11.71C14.59,11.42 14.07,11.25 13.5,11.25C12.11,11.25 10.79,12.11 10.24,13.39C10.08,12.96 10,12.5 10,12A2,2 0 0,1 12,10C13.11,10 14,10.89 14,12C14,13.11 13.11,14 12,14A2,2 0 0,1 10,12C10,13.66 11.34,15 13,15C14.12,15 15.16,14.32 15.75,13.38C16.34,14.32 17.38,15 18.5,15C19.66,15 20.73,14.28 21.31,13.3C19.75,18.18 15.16,22 9,22A8,8 0 0,1 4,12A8,8 0 0,1 12,4Z"/></svg>
          </div>
          <span>Singing</span>
        </div>

        <!-- DANCING -->
        <div class="hobby-item reveal">
          <div class="hobby-icon">
            <svg viewBox="0 0 24 24"><path d="M12,2A3,3 0 0,1 15,5A3,3 0 0,1 12,8A3,3 0 0,1 9,5A3,3 0 0,1 12,2M9,9H15A2,2 0 0,1 17,11V14L15,14V22H13V18H11V22H9V14L7,14V11A2,2 0 0,1 9,9M5,14A2,2 0 0,1 7,16V17H5V14M19,14A2,2 0 0,0 17,16V17H19V14Z"/></svg>
          </div>
          <span>Dancing</span>
        </div>

        <!-- ONLINE GAMES -->
        <div class="hobby-item reveal">
          <div class="hobby-icon">
            <svg viewBox="0 0 24 24"><path d="M7.97,16L5,19C4.67,19.3 4.23,19.5 3.75,19.5A1.75,1.75 0 0,1 2,17.75V17.5L3,10.12C3.21,7.81 5.14,6 7.5,6H16.5C18.86,6 20.79,7.81 21,10.12L22,17.5V17.75A1.75,1.75 0 0,1 20.25,19.5C19.77,19.5 19.33,19.3 19,19L16.03,16H7.97M7,9V11H5V12H7V14H8V12H10V11H8V9H7M16.5,9A1,1 0 0,0 15.5,10A1,1 0 0,0 16.5,11A1,1 0 0,0 17.5,10A1,1 0 0,0 16.5,9M14.5,12A1,1 0 0,0 13.5,13A1,1 0 0,0 14.5,14A1,1 0 0,0 15.5,13A1,1 0 0,0 14.5,12Z"/></svg>
          </div>
          <span>Online Games</span>
        </div>

        <!-- READING BOOKS -->
        <div class="hobby-item reveal">
          <div class="hobby-icon">
            <svg viewBox="0 0 24 24"><path d="M21,5C19.89,4.65 18.67,4.5 17.5,4.5C15.55,4.5 13.45,4.9 12,6C10.55,4.9 8.45,4.5 6.5,4.5C4.55,4.5 2.45,4.9 1,6V20.65C1,20.9 1.25,21.15 1.5,21.15C1.6,21.15 1.65,21.1 1.75,21.1C3.1,20.45 5.05,20 6.5,20C8.45,20 10.55,20.4 12,21.5C13.45,20.4 15.55,20 17.5,20C19.15,20 20.8,20.3 22.25,21.05C22.35,21.1 22.4,21.1 22.5,21.1C22.75,21.1 23,20.85 23,20.6V6C22.4,5.55 21.75,5.25 21,5M21,18.5C19.9,18.15 18.7,18 17.5,18C15.8,18 14.1,18.35 12.5,19V8C14.1,7.35 15.8,7 17.5,7C18.7,7 19.9,7.15 21,7.5V18.5Z"/></svg>
          </div>
          <span>Reading Books</span>
        </div>

      </div>
    </div>
  </section>

  <!-- CONTACT CTA -->
  <section class="pf-cta" id="contact">
    <div class="container">
      <h2>Let's build <em>together.</em></h2>
      <p>For more info kindly message me on any of the platforms below.</p>
      
      <div class="socials">
        <!-- Facebook -->
        <a href="#" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          Facebook
        </a>
        <!-- Gmail -->
        <a href="mailto:kim@ourspace.dev" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z"/></svg>
          Gmail
        </a>
        <!-- Instagram -->
        <a href="#" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
          Instagram
        </a>
        <!-- Telegram -->
        <a href="#" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>
          Telegram
        </a>
      </div>
    </div>
  </section>

</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

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

  // 3. Cursor Glow
  const cursorGlow = document.getElementById('cursorGlow');
  if (cursorGlow && window.innerWidth > 768 && !reduceMotion) {
    document.addEventListener('mousemove', (e) => {
      cursorGlow.style.left = e.clientX + 'px';
      cursorGlow.style.top = e.clientY + 'px';
    }, { passive: true });
  }
});
</script>

<?php get_footer(); ?>
<?php
/**
 * Template: Home (front-page.php)
 * Capstone Portfolio — Luxury Editorial Style
 */

add_action('wp_head', function () {
  echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
  echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
  echo '<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">' . "\n";
});

get_header(); ?>

<style>
/* ===== CAPSTONE PORTFOLIO — Professional Edition ===== */
.cap-home{
  --ivory:#F7F4EC; --ivory-2:#EFEADD; --paper:#FBFAF5;
  --ink:#1A1814; --ink-2:#2E2A22; --ink-3:#4A443A;
  --gold:#A8874E; --gold-2:#C4A566; --gold-soft:#D4BC8B;
  --line:#DED7C7; --line-2:#E8E2D3;
  --muted:#7A7266; --muted-2:#9A9284;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  --ease:cubic-bezier(.22,.8,.2,1); --ease-out:cubic-bezier(.16,1,.3,1);
  background:var(--ivory); color:var(--ink); font-family:var(--sans);
  font-weight:400; overflow-x:hidden; -webkit-font-smoothing:antialiased;
  scroll-behavior:smooth;
}
.cap-home *,.cap-home *::before,.cap-home *::after{box-sizing:border-box}
.cap-home a{color:inherit;text-decoration:none}
.cap-home :focus-visible{outline:2px solid var(--gold);outline-offset:4px}
.cap-home .container{max-width:1280px;margin:0 auto;padding:0 clamp(28px,7vw,112px)}

/* Reading Progress Bar */
.read-progress {
  position: fixed; top: 0; left: 0; height: 3px; width: 0%;
  background: linear-gradient(90deg, var(--gold), var(--gold-2));
  z-index: 9999; transition: width 0.1s ease-out;
  box-shadow: 0 0 10px rgba(168,135,78,0.6);
}

/* Cursor Glow */
.cursor-glow {
  position: fixed; width: 400px; height: 400px; border-radius: 50%;
  background: radial-gradient(circle, rgba(168,135,78,0.08), transparent 70%);
  pointer-events: none; z-index: 1; transform: translate(-50%, -50%);
  transition: opacity 0.3s ease;
}
@media (max-width: 768px) { .cursor-glow { display: none; } }

/* Eyebrow / kicker */
.cap-home .kicker{
  font-family:var(--sans);font-size:.7rem;font-weight:500;letter-spacing:.24em;
  text-transform:uppercase;color:var(--gold);margin:0 0 24px;
  display:flex;align-items:center;gap:16px;
}
.cap-home .kicker::before{content:"";width:40px;height:1px;background:var(--gold)}

/* ===== NAV ===== */
.cap-nav{
  position:absolute;top:0;left:0;right:0;z-index:50;
  padding:28px clamp(28px,7vw,112px);
  display:flex;justify-content:space-between;align-items:center;
}
.cap-nav .brand{
  font-family:var(--serif);font-weight:400;font-size:1.25rem;
  letter-spacing:-.01em;color:var(--ink);
}
.cap-nav .brand em{color:var(--gold);font-style:italic}
.cap-nav ul{
  display:flex;gap:36px;list-style:none;margin:0;padding:0;
  font-size:.8rem;font-weight:500;letter-spacing:.06em;text-transform:uppercase;
}
.cap-nav ul a{color:var(--ink-3);transition:color .3s var(--ease);position:relative;padding:6px 0}
.cap-nav ul a::after{
  content:"";position:absolute;left:0;bottom:0;width:0;height:1px;
  background:var(--gold);transition:width .4s var(--ease);
}
.cap-nav ul a:hover{color:var(--ink)}
.cap-nav ul a:hover::after{width:100%}

/* ===== HERO ===== */
.cap-hero{
  position:relative;padding:clamp(160px,18vw,220px) 0 clamp(80px,10vw,140px);
  background:var(--ivory);overflow:hidden;
}
.cap-hero::before{
  content:"";position:absolute;top:-20%;right:-10%;width:70vw;height:70vw;
  max-width:900px;max-height:900px;border-radius:50%;
  background:radial-gradient(circle,rgba(196,165,102,.14),transparent 65%);
  pointer-events:none;
}
/* Floating Orbs */
.hero-orb {
  position: absolute; border-radius: 50%;
  background: radial-gradient(circle, rgba(196,165,102,.4), transparent 70%);
  pointer-events: none; z-index: 0;
  animation: floatOrb 20s infinite ease-in-out;
}
.orb-1 { width: 200px; height: 200px; top: 20%; right: 15%; animation-delay: 0s; }
.orb-2 { width: 100px; height: 100px; bottom: 30%; right: 30%; animation-delay: 5s; }
.orb-3 { width: 150px; height: 150px; top: 50%; left: 5%; animation-delay: 10s; }
@keyframes floatOrb {
  0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.3; }
  50% { transform: translate(30px, -40px) scale(1.1); opacity: 0.6; }
}

.cap-hero .container{position:relative;z-index:1}
.cap-hero .eyebrow{
  font-family:var(--sans);font-size:.72rem;font-weight:500;letter-spacing:.28em;
  text-transform:uppercase;color:var(--gold);margin:0 0 40px;
  display:flex;align-items:center;gap:20px;
  opacity:0;animation:capFade .9s var(--ease) .15s forwards;
}
.cap-hero .eyebrow::before{content:"";width:48px;height:1px;background:var(--gold)}
.cap-hero .eyebrow .dot{
  width:6px;height:6px;border-radius:50%;background:var(--gold);
  margin-left:8px;box-shadow:0 0 0 4px rgba(168,135,78,.15);
}

.cap-hero h1{
  font-family:var(--serif);font-weight:300;letter-spacing:-.03em;
  font-size:clamp(3.2rem,8.5vw,7.4rem);line-height:.96;margin:0 0 40px;
  max-width:14ch;color:var(--ink);
}
.cap-hero h1 .line{
  display:block;overflow:hidden;padding:.06em 0 .12em;margin-bottom:-.12em;
}
.cap-hero h1 .line > span{
  display:inline-block;transform:translateY(110%);
  animation:capRise 1.2s var(--ease-out) forwards;
}
.cap-hero h1 .line:nth-child(1) > span{animation-delay:.25s}
.cap-hero h1 .line:nth-child(2) > span{animation-delay:.4s}
.cap-hero h1 .line:nth-child(3) > span{animation-delay:.55s}
.cap-hero h1 em{color:var(--gold);font-style:italic;font-weight:400}

.cap-hero .lede{
  max-width:540px;font-size:1.06rem;font-weight:300;line-height:1.8;
  color:var(--ink-3);margin:0 0 48px;letter-spacing:.005em;
  opacity:0;animation:capFade 1s var(--ease) .9s forwards;
}
.cap-hero .cta-row{
  display:flex;flex-wrap:wrap;gap:36px;align-items:center;
  opacity:0;animation:capFade 1s var(--ease) 1.05s forwards;
}

@keyframes capRise{to{transform:none}}
@keyframes capFade{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:none}}

/* Buttons */
.cap-home .btn{
  position:relative;display:inline-flex;align-items:center;gap:14px;
  padding:18px 34px;border-radius:2px;background:var(--ink);color:var(--ivory);
  font-family:var(--sans);font-weight:500;font-size:.78rem;letter-spacing:.14em;text-transform:uppercase;
  transition:background .4s var(--ease),transform .4s var(--ease),box-shadow .4s var(--ease);
  overflow:hidden;
}
.cap-home .btn::after{content:"→";font-size:1rem;transition:transform .4s var(--ease)}
.cap-home .btn:hover{background:var(--gold);transform:translateY(-2px);box-shadow:0 16px 40px -12px rgba(168,135,78,.5)}
.cap-home .btn:hover::after{transform:translateX(4px)}

.cap-home .btn-ghost{
  display:inline-flex;align-items:center;gap:12px;
  font-family:var(--sans);font-weight:500;font-size:.78rem;letter-spacing:.14em;text-transform:uppercase;
  color:var(--ink);padding-bottom:8px;position:relative;
}
.cap-home .btn-ghost::after{
  content:"";position:absolute;left:0;bottom:0;width:100%;height:1px;
  background:var(--line);transition:background .4s;
}
.cap-home .btn-ghost::before{
  content:"";position:absolute;left:0;bottom:0;width:0;height:1px;
  background:var(--gold);transition:width .5s var(--ease);z-index:1;
}
.cap-home .btn-ghost:hover::before{width:100%}
.cap-home .btn-ghost:hover{color:var(--gold)}

/* Hero meta strip */
.cap-hero .meta{
  margin-top:clamp(72px,9vw,120px);padding-top:32px;
  border-top:1px solid var(--line);
  display:grid;grid-template-columns:repeat(4,1fr);gap:32px;
  opacity:0;animation:capFade 1s var(--ease) 1.2s forwards;
}
.cap-hero .meta div{display:flex;flex-direction:column;gap:6px;position:relative;padding-left:16px}
.cap-hero .meta div::before {
  content:""; position:absolute; left:0; top:4px; width:2px; height:calc(100% - 8px);
  background:var(--gold); border-radius:2px; opacity:0.6;
}
.cap-hero .meta dt{
  font-size:.68rem;font-weight:500;letter-spacing:.2em;text-transform:uppercase;
  color:var(--muted-2);display:flex;align-items:center;gap:6px;
}
.cap-hero .meta dt svg { width: 14px; height: 14px; fill: var(--gold); }
.cap-hero .meta dd{
  font-family:var(--serif);font-size:1.3rem;font-weight:400;
  letter-spacing:-.01em;color:var(--ink);margin:0;
}

/* Trusted Strip (Bagong Feature) */
.trusted-strip {
  display: flex; justify-content: center; align-items: center; gap: 40px;
  padding: 32px 0; border-bottom: 1px solid var(--line);
  flex-wrap: wrap;
}
.trusted-strip .label {
  font-size: 0.7rem; font-weight: 500; letter-spacing: 0.16em;
  text-transform: uppercase; color: var(--muted-2);
}
.trusted-strip .tech-badges {
  display: flex; gap: 24px; align-items: center;
}
.tech-badge {
  font-family: var(--serif); font-style: italic; font-size: 1.1rem;
  color: var(--ink-3); transition: color 0.3s;
}
.tech-badge:hover { color: var(--gold); }

/* ===== STATEMENT ===== */
.cap-statement{
  padding:clamp(96px,13vw,180px) 0;background:var(--paper);
  border-top:1px solid var(--line-2);border-bottom:1px solid var(--line-2);
}
.cap-statement .grid{
  display:grid;grid-template-columns:1fr 1.4fr;gap:clamp(40px,6vw,96px);
  align-items:start;
}
.cap-statement .kicker{margin-bottom:0;padding-top:8px}
.cap-statement p.big{
  font-family:var(--serif);font-weight:300;
  font-size:clamp(1.9rem,3.6vw,3.2rem);line-height:1.22;letter-spacing:-.02em;
  color:var(--ink);margin:0;max-width:24ch;
}
.cap-statement p.big em{color:var(--gold);font-style:italic}

/* ===== PORTALS / PROJECTS ===== */
.cap-portals{padding:clamp(96px,13vw,180px) 0;background:var(--ivory)}
.cap-portals .section-head{
  display:grid;grid-template-columns:1fr auto;align-items:end;
  gap:40px;margin-bottom:clamp(48px,7vw,96px);
  padding-bottom:32px;border-bottom:1px solid var(--line);
}
.cap-portals h2{
  font-family:var(--serif);font-weight:300;
  font-size:clamp(2.4rem,5vw,4.2rem);line-height:1;letter-spacing:-.025em;
  margin:0;
}
.cap-portals h2 em{color:var(--gold);font-style:italic}
.cap-portals .section-head p{
  color:var(--muted);font-weight:300;line-height:1.7;max-width:32ch;
  margin:0;font-size:.92rem;text-align:right;
}

.cap-portal{
  position:relative;display:grid;grid-template-columns:auto 1.4fr 1fr auto;
  align-items:center;gap:clamp(24px,4vw,64px);
  padding:clamp(32px,4.5vw,56px) 0;
  border-bottom:1px solid var(--line);
  transition:padding .6s var(--ease);
}
.cap-portal:first-of-type{border-top:1px solid var(--line)}
.cap-portal::before{
  content:"";position:absolute;left:0;top:0;bottom:0;width:0;
  background:linear-gradient(to right,rgba(196,165,102,.1),transparent);
  transition:width .6s var(--ease);z-index:0;
}
.cap-portal:hover{padding-left:clamp(16px,2.5vw,40px)}
.cap-portal:hover::before{width:100%}
.cap-portal > *{position:relative;z-index:1}
.cap-portal .num{
  font-family:var(--serif);font-style:italic;font-weight:400;
  font-size:1rem;color:var(--gold);letter-spacing:.02em;
}
.cap-portal h3{
  font-family:var(--serif);font-weight:300;
  font-size:clamp(1.9rem,3.6vw,3rem);line-height:1.05;letter-spacing:-.02em;
  margin:0;transition:color .4s var(--ease);
}
.cap-portal:hover h3{color:var(--gold)}
.cap-portal p{
  font-size:.94rem;font-weight:300;line-height:1.7;
  color:var(--muted);max-width:34ch;margin:0;
}
.cap-portal .go{
  display:grid;place-items:center;width:56px;height:56px;
  border:1px solid var(--line);border-radius:50%;
  transition:all .5s var(--ease);flex-shrink:0;
}
.cap-portal .go svg{
  width:18px;height:18px;stroke:var(--ink);fill:none;stroke-width:1.4;
  transition:transform .5s var(--ease),stroke .3s;
}
.cap-portal:hover .go{background:var(--ink);border-color:var(--ink)}
.cap-portal:hover .go svg{stroke:var(--ivory);transform:rotate(-45deg)}

/* ===== SKILLS ===== */
.cap-skills{
  padding:clamp(96px,13vw,180px) 0;
  background:var(--ink);color:var(--ivory);
  position:relative;overflow:hidden;
}
.cap-skills::before{
  content:"";position:absolute;top:-20%;left:-10%;width:60vw;height:60vw;
  max-width:800px;max-height:800px;border-radius:50%;
  background:radial-gradient(circle,rgba(196,165,102,.18),transparent 65%);
  pointer-events:none;
}
.cap-skills .container{position:relative}
.cap-skills .head{
  display:grid;grid-template-columns:1.4fr 1fr;gap:64px;
  margin-bottom:clamp(48px,7vw,96px);align-items:end;
}
.cap-skills .kicker{color:var(--gold-soft)}
.cap-skills .kicker::before{background:var(--gold-soft)}
.cap-skills h2{
  font-family:var(--serif);font-weight:300;
  font-size:clamp(2.4rem,5vw,4.4rem);line-height:1.02;letter-spacing:-.025em;
  margin:0;color:var(--ivory);
}
.cap-skills h2 em{color:var(--gold-soft);font-style:italic}
.cap-skills .head p{
  color:rgba(247,244,236,.7);font-weight:300;line-height:1.8;
  max-width:40ch;margin:0;justify-self:end;font-size:.98rem;
}
.cap-skill-grid{
  list-style:none;margin:0;padding:0;
  display:grid;grid-template-columns:repeat(2,1fr);
  column-gap:clamp(40px,7vw,112px);
}
.cap-skill-grid li{
  display:flex;justify-content:space-between;align-items:baseline;gap:24px;
  padding:28px 0;border-top:1px solid rgba(247,244,236,.1);
  transition:border-color .4s var(--ease);
}
.cap-skill-grid li:hover{border-color:rgba(196,165,102,.4)}
.cap-skill-grid b{
  font-family:var(--serif);font-weight:400;font-size:1.6rem;
  letter-spacing:-.01em;transition:color .4s;
}
.cap-skill-grid li:hover b{color:var(--gold-soft)}
.cap-skill-grid span{
  font-size:.76rem;font-weight:400;letter-spacing:.14em;text-transform:uppercase;
  color:rgba(247,244,236,.45);text-align:right;
}

/* ===== CLOSING CTA ===== */
.cap-closing{
  padding:clamp(112px,14vw,200px) 0;
  text-align:center;background:var(--paper);
}
.cap-closing .kicker{justify-content:center;margin-bottom:32px}
.cap-closing .kicker::after{content:"";width:40px;height:1px;background:var(--gold)}
.cap-closing h2{
  font-family:var(--serif);font-weight:300;
  font-size:clamp(2.6rem,6.5vw,5.8rem);line-height:1;letter-spacing:-.03em;
  margin:0 0 24px;color:var(--ink);
}
.cap-closing h2 em{color:var(--gold);font-style:italic}
.cap-closing p{
  max-width:46ch;margin:0 auto 52px;color:var(--muted);
  font-weight:300;line-height:1.8;font-size:1rem;
}
.cap-closing .cta-row{
  display:flex;flex-wrap:wrap;gap:36px;align-items:center;justify-content:center;
}

/* Contact Cards (Bagong Feature) */
.contact-cards {
  display: grid; grid-template-columns: repeat(3, 1fr);
  gap: 16px; max-width: 700px; margin: 64px auto 0;
}
.contact-card {
  padding: 24px 20px; border: 1px solid var(--line);
  background: var(--ivory); border-radius: 2px;
  display: flex; flex-direction: column; align-items: center; gap: 8px;
  text-decoration: none; color: inherit;
  transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
}
.contact-card:hover {
  border-color: var(--gold); transform: translateY(-4px);
  box-shadow: 0 15px 30px -10px rgba(168,135,78,0.15);
  background: #fff;
}
.contact-card .c-icon {
  width: 32px; height: 32px; color: var(--gold); margin-bottom: 8px;
}
.contact-card .c-icon svg { width: 100%; height: 100%; }
.contact-card .c-label {
  font-family: var(--serif); font-size: 1rem; font-weight: 400; color: var(--ink);
}
.contact-card .c-value {
  font-size: 0.7rem; font-weight: 500; letter-spacing: 0.12em;
  text-transform: uppercase; color: var(--muted);
}

/* ===== FOOTER STRIP ===== */
.cap-footer{
  padding:40px 0;border-top:1px solid var(--line-2);background:var(--ivory);
}
.cap-footer .container{
  display:flex;justify-content:space-between;align-items:center;
  gap:24px;flex-wrap:wrap;
}
.cap-footer p{
  margin:0;font-size:.78rem;letter-spacing:.06em;
  color:var(--muted-2);font-weight:400;
}
.cap-footer .socials{
  display:flex;gap:28px;list-style:none;margin:0;padding:0;
}
.cap-footer .socials a{
  font-size:.78rem;letter-spacing:.06em;color:var(--muted);
  transition:color .3s;font-weight:400;
}
.cap-footer .socials a:hover{color:var(--gold)}

/* Reveal */
.cap-js .reveal{opacity:0;transform:translateY(28px);transition:opacity 1s var(--ease),transform 1s var(--ease)}
.cap-js .reveal.in{opacity:1;transform:none}

/* ===== RESPONSIVE ===== */
@media (max-width:900px){
  .cap-nav ul{display:none}
  .cap-hero .meta{grid-template-columns:repeat(2,1fr);gap:24px}
  .cap-statement .grid{grid-template-columns:1fr}
  .cap-portals .section-head{grid-template-columns:1fr;align-items:start}
  .cap-portals .section-head p{text-align:left}
  .cap-portal{grid-template-columns:auto 1fr auto}
  .cap-portal p{grid-column:2;grid-row:2}
  .cap-portal .go{grid-column:3;grid-row:1/3;width:48px;height:48px}
  .cap-portal .go svg{width:16px;height:16px}
  .cap-skills .head,.cap-skill-grid{grid-template-columns:1fr}
  .cap-skills .head p{justify-self:start}
  .cap-skill-grid li{padding:22px 0}
  .cap-skill-grid b{font-size:1.35rem}
  .contact-cards { grid-template-columns: 1fr; }
  .trusted-strip { flex-direction: column; gap: 20px; }
  .trusted-strip .tech-badges { flex-wrap: wrap; justify-content: center; }
}
@media (max-width:520px){
  .cap-hero .meta{grid-template-columns:1fr 1fr}
  .cap-portal{grid-template-columns:1fr auto;gap:16px}
  .cap-portal .num{grid-column:1;grid-row:1;font-size:.85rem}
  .cap-portal h3{grid-column:1;grid-row:2}
  .cap-portal p{grid-column:1;grid-row:3}
  .cap-portal .go{grid-column:2;grid-row:1/4;align-self:center}
  .cap-footer .container{justify-content:center;text-align:center}
}
@media (prefers-reduced-motion:reduce){
  .cap-home *,.cap-home *::before,.cap-home *::after{
    animation:none !important;transition:none !important;
  }
  .cap-hero h1 .line > span,.cap-hero .eyebrow,.cap-hero .lede,
  .cap-hero .cta-row,.cap-hero .meta{transform:none;opacity:1}
  .cap-js .reveal{opacity:1;transform:none}
}
</style>

<!-- Reading Progress Bar -->
<div class="read-progress" id="readProgress"></div>

<!-- Cursor Glow -->
<div class="cursor-glow" id="cursorGlow"></div>

<main class="cap-home">

  <!-- HERO -->
  <section class="cap-hero">
    <!-- Floating Orbs -->
    <div class="hero-orb orb-1"></div>
    <div class="hero-orb orb-2"></div>
    <div class="hero-orb orb-3"></div>

    <div class="container">
      <p class="eyebrow">
        Capstone Project <span class="dot"></span> 2026
      </p>
      <h1>
        <span class="line"><span>Built from scratch,</span></span>
        <span class="line"><span>driven by passion,</span></span>
        <span class="line"><span><em>created by our team.</em></span></span>
      </h1>
      <p class="lede">
        This is the final requirement of our Web Development capstone. A unified platform showcasing the individual portfolios, coding skills, and collaborative projects we've developed throughout the year.
      </p>
  
      <dl class="meta">
        <div>
          <dt><svg viewBox="0 0 24 24"><path d="M12,3L1,9L12,15L21,10.09V17H23V9M5,13.18V17.18L12,21L19,17.18V13.18L12,17L5,13.18Z"/></svg> Institution</dt>
          <dd>Opol Community College</dd>
        </div>
        <div>
          <dt><svg viewBox="0 0 24 24"><path d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15.08 17,16.5V19H23V16.5C23,14.63 19.87,13 16,13M8,13C4.13,13 1,14.63 1,16.5V19H15V16.5C15,14.63 11.87,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z"/></svg> Team Size</dt>
          <dd>4 Developers</dd>
        </div>
        <div>
          <dt><svg viewBox="0 0 24 24"><path d="M16.36,14C16.44,13.34 16.5,12.68 16.5,12C16.5,11.32 16.44,10.66 16.36,10H19.74C19.9,10.64 20,11.31 20,12C20,12.69 19.9,13.36 19.74,14M14.59,19.56C15.19,18.45 15.65,17.25 15.97,16H18.92C17.96,17.65 16.43,18.93 14.59,19.56M14.34,14H9.66C9.56,13.34 9.5,12.68 9.5,12C9.5,11.32 9.56,10.65 9.66,10H14.34C14.43,10.65 14.5,11.32 14.5,12C14.5,12.68 14.43,13.34 14.34,14M12,19.96C11.17,18.76 10.5,17.43 10.09,16H13.91C13.5,17.43 12.83,18.76 12,19.96M8,8H5.08C6.03,6.34 7.57,5.06 9.4,4.44C8.8,5.55 8.35,6.75 8,8M5.08,16H8C8.35,17.25 8.8,18.45 9.4,19.56C7.57,18.93 6.03,17.65 5.08,16M4.26,14C4.1,13.36 4,12.69 4,12C4,11.31 4.1,10.64 4.26,10H7.64C7.56,10.66 7.5,11.32 7.5,12C7.5,12.68 7.56,13.34 7.64,14M12,4.03C12.83,5.23 13.5,6.57 13.91,8H10.09C10.5,6.57 11.17,5.23 12,4.03M18.92,8H15.97C15.65,6.75 15.19,5.55 14.59,4.44C16.43,5.07 17.96,6.34 18.92,8M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"/></svg> Tech Stack</dt>
          <dd>HTML · CSS · JS · PHP</dd>
        </div>
        <div>
          <dt><svg viewBox="0 0 24 24"><path d="M19,19H5V8H19M16,1V3H8V1H6V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3H18V1M17,12H12V17H17V12Z"/></svg> Year</dt>
          <dd>2025 — 2026</dd>
        </div>
      </dl>
    </div>
  </section>

  <!-- TRUSTED STRIP (Bagong Feature) -->
  <div class="container">
    <div class="trusted-strip reveal">
      <span class="label">Built with</span>
      <div class="tech-badges">
        <span class="tech-badge">HTML</span>
        <span class="tech-badge">·</span>
        <span class="tech-badge">CSS</span>
        <span class="tech-badge">·</span>
        <span class="tech-badge">JavaScript</span>
        <span class="tech-badge">·</span>
        <span class="tech-badge">PHP</span>
        <span class="tech-badge">·</span>
        <span class="tech-badge">WordPress</span>
      </div>
    </div>
  </div>

  <!-- STATEMENT -->
  <section class="cap-statement">
    <div class="container">
      <div class="grid">
        <p class="kicker reveal">About the project</p>
        <p class="big reveal">
          This isn't just a website — it's the culmination of our learning journey.
          <em>Every line of code and every pixel represents our growth as aspiring developers.</em>
        </p>
      </div>
    </div>
  </section>

  <!-- PROJECTS / PORTALS -->
  <section class="cap-portals" id="work" aria-label="Portfolios">
    <div class="container">
      <div class="section-head reveal">
        <h2>Explore the <em>Website</em></h2>
        <p>Two ways to navigate our project — start with my personal portfolio, or meet the whole team behind it.</p>
      </div>

      <a class="cap-portal reveal" href="<?php echo esc_url(home_url('/friends/frank/')); ?>">
        <span class="num">01</span>
        <h3>Meet the Developer</h3>
        <p>My personal journey, the skills I've mastered, and the systems I've built.</p>
        <span class="go"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 12h16M14 6l6 6-6 6"/></svg></span>
      </a>

      <a class="cap-portal reveal" href="<?php echo esc_url(home_url('/our-members/')); ?>">
        <span class="num">02</span>
        <h3>Meet the Team</h3>
        <p>Discover the collective minds behind our capstone and explore their individual works.</p>
        <span class="go"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 12h16M14 6l6 6-6 6"/></svg></span>
      </a>
    </div>
  </section>

  <!-- SKILLS -->
  <section class="cap-skills" id="skills" aria-label="Skills we are learning">
    <div class="container">
      <div class="head">
        <div>
          <p class="kicker reveal">Our toolkit</p>
          <h2 class="reveal">What we <em>build</em> with</h2>
        </div>
        <p class="reveal">The technologies we utilized to create this website — from the first line of markup to a finished, responsive site.</p>
      </div>
      <ul class="cap-skill-grid">
        <li class="reveal"><b>HTML</b><span>Structure &amp; meaning</span></li>
        <li class="reveal"><b>CSS</b><span>Layout, type &amp; color</span></li>
        <li class="reveal"><b>JavaScript</b><span>Interaction &amp; behavior</span></li>
        <li class="reveal"><b>PHP</b><span>Server-side logic</span></li>
        <li class="reveal"><b>WordPress</b><span>Themes &amp; content</span></li>
        <li class="reveal"><b>Git &amp; GitHub</b><span>Version control</span></li>
        <li class="reveal"><b>Responsive</b><span>Every screen size</span></li>
        <li class="reveal"><b>UI design</b><span>Considered interfaces</span></li>
      </ul>
    </div>
  </section>

  <!-- CLOSING -->
  <section class="cap-closing" id="contact">
    <div class="container">
      <p class="kicker reveal">Let's begin</p>
      <h2 class="reveal">Discover our <em>work.</em></h2>
      <p class="reveal">Two doors — start with my personal portfolio or dive straight into the team's collective work.</p>
      <div class="cta-row reveal">
        <a class="btn" href="<?php echo esc_url(home_url('/our-members')); ?>">Meet the Team</a>
      </div>

      <!-- Contact Cards (Bagong Feature) -->
      <div class="contact-cards reveal">
        <a class="contact-card" href="mailto:hello@ourspace.dev">
          <div class="c-icon">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z"/></svg>
          </div>
          <span class="c-label">Email Us</span>
          <span class="c-value">hello@ourspace.dev</span>
        </a>
        <a class="contact-card" href="https://www.facebook.com/frankjames.generalao" target="_blank">
          <div class="c-icon">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          </div>
          <span class="c-label">Facebook</span>
          <span class="c-value">Frank Generalao</span>
        </a>
        <a class="contact-card" href="#" target="_blank">
          <div class="c-icon">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
          </div>
          <span class="c-label">GitHub</span>
          <span class="c-value">View Projects</span>
        </a>
      </div>
    </div>
  </section>

  <!-- FOOTER STRIP -->
  <footer class="cap-footer">
    <div class="container">
      <p>© <?php echo date('Y'); ?> Capstone Studio · Final Project</p>
      <ul class="socials">
        <li><a href="#">GitHub</a></li>
        <li><a href="#">LinkedIn</a></li>
        <li><a href="#">Email</a></li>
      </ul>
    </div>
  </footer>

</main>

<script>
(function () {
  document.documentElement.classList.add('cap-js');

  // 1. Reveal Animation
  const io = new IntersectionObserver(
    entries => entries.forEach((entry, i) => {
      if (entry.isIntersecting) {
        setTimeout(() => entry.target.classList.add('in'), i * 100);
        io.unobserve(entry.target);
      }
    }),
    { threshold: 0.12, rootMargin: '0px 0px -60px 0px' }
  );
  document.querySelectorAll('.reveal').forEach(el => io.observe(el));

  // 2. Reading Progress Bar
  const progressBar = document.getElementById('readProgress');
  window.addEventListener('scroll', () => {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (scrollTop / scrollHeight) * 100;
    progressBar.style.width = scrolled + '%';
  });

  // 3. Cursor Glow
  const cursorGlow = document.getElementById('cursorGlow');
  if (window.innerWidth > 768) {
    document.addEventListener('mousemove', (e) => {
      cursorGlow.style.left = e.clientX + 'px';
      cursorGlow.style.top = e.clientY + 'px';
    });
  }
})();
</script>

<?php get_footer(); ?>
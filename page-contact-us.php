<?php
/**
 * Template Name: Contact Us
 * Template Post Type: page
 * Ultra 3D Aesthetic Edition v2 — matched to front-page.php
 */
get_header(); ?>

<style>
/* ===== CONTACT PAGE — Ultra 3D Edition v2 ===== */
.contact-page {
  --ivory:#F7F4EC; --ivory-2:#EFEADD; --paper:#FBFAF5;
  --ink:#14120E; --ink-2:#2E2A22; --ink-3:#4A443A;
  --gold:#A8874E; --gold-2:#C4A566; --gold-3:#D4BC8B;
  --line:rgba(168,135,78,.16); --line-2:rgba(168,135,78,.08);
  --muted:#7A7266; --muted-2:#9A9284;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  --ease:cubic-bezier(.22,.8,.2,1); --ease-out:cubic-bezier(.16,1,.3,1);
  --ease-spring:cubic-bezier(.34,1.56,.64,1);

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
  --shadow-gold:
    0 1px 0 rgba(255,255,255,.35) inset,
    0 -1px 0 rgba(0,0,0,.2) inset,
    0 8px 20px -4px rgba(168,135,78,.4),
    0 16px 40px -10px rgba(168,135,78,.35);

  background: var(--ivory); color: var(--ink); font-family: var(--sans);
  font-weight:400; -webkit-font-smoothing: antialiased; overflow-x: hidden;
  position: relative;
}

/* Ambient stage */
.contact-page::before {
  content: ""; position: fixed; inset: 0; pointer-events: none; z-index: 0;
  background:
    radial-gradient(600px 400px at 15% 5%, rgba(196,165,102,.10), transparent 70%),
    radial-gradient(500px 400px at 85% 10%, rgba(212,188,139,.10), transparent 70%),
    radial-gradient(700px 500px at 50% 100%, rgba(196,165,102,.06), transparent 70%);
}

.contact-page *,.contact-page *::before,.contact-page *::after{box-sizing:border-box}
.contact-page a{color:inherit;text-decoration:none}
.contact-page :focus-visible{outline:2px solid var(--gold);outline-offset:4px}
.contact-page .container{max-width:1280px;margin:0 auto;padding:0 clamp(28px,7vw,112px);position:relative;z-index:1}

/* Perspective for 3D children */
.contact-page .container,
.contact-grid{perspective:1400px}

/* ===== SCROLL PROGRESS ===== */
.read-progress{
  position:fixed;top:0;left:0;height:3px;width:0%;
  background:linear-gradient(90deg,#8f6f3a,var(--gold),var(--gold-2),var(--gold-3));
  z-index:9999;transition:width .15s linear;
  box-shadow:0 0 12px rgba(196,165,102,.6);
}

/* ===== CURSOR GLOW ===== */
.cursor-glow{
  position:fixed;width:420px;height:420px;border-radius:50%;
  background:radial-gradient(circle,rgba(168,135,78,.12),transparent 70%);
  pointer-events:none;z-index:1;transform:translate(-50%,-50%);
  will-change:transform;
}
@media (max-width:768px),(hover:none){.cursor-glow{display:none}}

/* ===== KICKER ===== */
.contact-page .kicker{
  font-family:var(--sans);font-size:.7rem;font-weight:500;letter-spacing:.24em;
  text-transform:uppercase;color:var(--gold);margin:0 0 24px;
  display:inline-flex;align-items:center;gap:16px;
  padding:8px 16px 8px 0;border-radius:2px;
}
.contact-page .kicker::before{content:"";width:40px;height:1px;background:var(--gold)}
.contact-js .kicker.reveal::before,
.contact-js .kicker.reveal::after{width:0;transition:width 1.1s var(--ease-out) .35s}
.contact-js .kicker.reveal.in::before,
.contact-js .kicker.reveal.in::after{width:40px}

/* ===== HERO ===== */
.contact-hero {
  padding: clamp(180px, 20vw, 260px) 0 clamp(40px, 6vw, 80px);
  position: relative; overflow: hidden;
}
.contact-hero .container {
  position:relative;z-index:2;
  translate:0 calc(var(--sy,0) * .1px);
  opacity:calc(1 - var(--sy,0) * .0006);
}

/* Floating orbs */
.contact-orb{
  position:absolute;border-radius:50%;pointer-events:none;z-index:1;
  background:radial-gradient(circle at 35% 30%,rgba(255,255,255,.45),rgba(196,165,102,.35) 40%,transparent 72%);
  filter:blur(2px);
  animation:floatOrb 22s infinite ease-in-out;
  translate:
    calc(var(--px,0) * var(--depth,30) * 1px)
    calc(var(--py,0) * var(--depth,30) * 1px + var(--sy,0) * var(--sdepth,-.08) * 1px);
  will-change:transform,translate;
}
.contact-orb.o1{width:260px;height:260px;top:15%;right:12%;--depth:-46;--sdepth:-.14}
.contact-orb.o2{width:140px;height:140px;bottom:28%;right:32%;--depth:64;--sdepth:-.06;animation-delay:6s}
.contact-orb.o3{width:180px;height:180px;top:48%;left:4%;--depth:-28;--sdepth:-.1;animation-delay:12s}
@keyframes floatOrb{
  0%,100%{transform:translate(0,0) scale(1);opacity:.35}
  50%{transform:translate(30px,-40px) scale(1.15);opacity:.65}
}

/* ----- 3D hero scene (glass cube, matches front-page) ----- */
.contact-stage{
  position:absolute;right:clamp(2%,6vw,9%);top:24%;
  width:420px;height:420px;z-index:1;
  perspective:1100px;pointer-events:none;
  translate:0 calc(var(--sy,0) * -.12px);
  opacity:0;animation:stageIn 1.6s var(--ease-out) .6s forwards;
}
@keyframes stageIn{from{opacity:0;scale:.82}to{opacity:1;scale:1}}
.contact-scene{
  position:absolute;inset:0;transform-style:preserve-3d;
  transform:
    rotateX(calc(var(--py,0) * -20deg + 16deg))
    rotateY(calc(var(--px,0) * 28deg - 8deg));
}
.contact-scene > *{position:absolute;left:50%;top:50%;transform-style:preserve-3d}

.hs-core{
  width:104px;height:104px;margin:-52px 0 0 -52px;border-radius:50%;
  background:radial-gradient(circle at 30% 28%,#fff 0,var(--gold-3) 20%,var(--gold) 58%,#6b5028 100%);
  box-shadow:
    inset -12px -16px 28px rgba(60,40,10,.5),
    inset 8px 10px 16px rgba(255,255,255,.55),
    0 30px 60px -12px rgba(168,135,78,.6);
  animation:coreBob 7s ease-in-out infinite;
}
@keyframes coreBob{0%,100%{transform:translateZ(0) translateY(0)}50%{transform:translateZ(30px) translateY(-14px)}}

.cube3d{--s:150px;width:var(--s);height:var(--s);margin:calc(var(--s) / -2) 0 0 calc(var(--s) / -2)}
.cube3d span{
  position:absolute;inset:0;border-radius:10px;
  border:1px solid rgba(168,135,78,.45);
  background:linear-gradient(135deg,rgba(255,255,255,.55),rgba(196,165,102,.12));
  box-shadow:inset 0 0 30px rgba(196,165,102,.18);
}
.cube3d span:nth-child(1){transform:translateZ(calc(var(--s) / 2))}
.cube3d span:nth-child(2){transform:rotateY(90deg) translateZ(calc(var(--s) / 2))}
.cube3d span:nth-child(3){transform:rotateX(90deg) translateZ(calc(var(--s) / 2))}
.cube3d span:nth-child(4){transform:rotateY(180deg) translateZ(calc(var(--s) / 2))}
.cube3d span:nth-child(5){transform:rotateY(-90deg) translateZ(calc(var(--s) / 2))}
.cube3d span:nth-child(6){transform:rotateX(-90deg) translateZ(calc(var(--s) / 2))}
.hs-cube{animation:cubeSpin 24s infinite linear}
@keyframes cubeSpin{
  from{transform:rotateX(24deg) rotateY(0) rotateZ(8deg)}
  to{transform:rotateX(24deg) rotateY(360deg) rotateZ(8deg)}
}

.hs-ring{
  --rx:72deg;--ry:0deg;--t:18s;
  border-radius:50%;border:1px solid rgba(168,135,78,.38);
  translate:-50% -50%;
  transform:rotateX(var(--rx)) rotateY(var(--ry)) rotateZ(0);
  animation:ringSpin var(--t) linear infinite;
}
.hs-ring::after{
  content:"";position:absolute;top:-5px;left:50%;width:10px;height:10px;margin-left:-5px;
  border-radius:50%;background:radial-gradient(circle at 30% 30%,#fff,var(--gold));
  box-shadow:0 0 16px rgba(196,165,102,.95);
}
.hs-ring.r1{width:270px;height:270px;--rx:72deg;--ry:0deg;--t:16s}
.hs-ring.r2{width:350px;height:350px;--rx:64deg;--ry:38deg;--t:24s;animation-direction:reverse}
.hs-ring.r3{width:430px;height:430px;--rx:78deg;--ry:-30deg;--t:32s;border-style:dashed;opacity:.7}
@keyframes ringSpin{to{transform:rotateX(var(--rx)) rotateY(var(--ry)) rotateZ(360deg)}}

.hs-shard{
  --x:0px;--y:0px;--z:0px;--d:9s;
  width:30px;height:30px;margin:-15px 0 0 -15px;border-radius:6px;
  border:1px solid rgba(168,135,78,.5);
  background:linear-gradient(135deg,rgba(255,255,255,.8),rgba(196,165,102,.35));
  box-shadow:0 10px 20px -6px rgba(168,135,78,.45);
  transform:translate3d(var(--x),var(--y),var(--z));
  animation:shard var(--d) ease-in-out infinite;
}
.hs-shard.s1{--x:-170px;--y:-90px;--z:70px;--d:8s}
.hs-shard.s2{--x:160px;--y:110px;--z:-30px;--d:11s;width:22px;height:22px;margin:-11px 0 0 -11px}
.hs-shard.s3{--x:40px;--y:-170px;--z:-80px;--d:13s;width:18px;height:18px;margin:-9px 0 0 -9px}
@keyframes shard{
  0%,100%{transform:translate3d(var(--x),var(--y),var(--z)) rotateX(0) rotateY(0)}
  50%{transform:translate3d(var(--x),calc(var(--y) - 26px),calc(var(--z) + 40px)) rotateX(180deg) rotateY(180deg)}
}

.hs-shadow{
  width:220px;height:40px;margin:170px 0 0 -110px;border-radius:50%;
  background:radial-gradient(ellipse,rgba(20,18,14,.22),transparent 70%);
  filter:blur(8px);transform:rotateX(90deg);animation:shadowPulse 7s ease-in-out infinite;
}
@keyframes shadowPulse{0%,100%{scale:1;opacity:.9}50%{scale:.78;opacity:.55}}
@media (max-width:1100px){.contact-stage{display:none}}

/* Eyebrow pill */
.contact-hero .eyebrow{
  display:inline-flex;align-items:center;gap:12px;
  padding:10px 18px;margin:0 0 40px;border-radius:999px;
  font-size:.7rem;font-weight:600;letter-spacing:.22em;text-transform:uppercase;
  color:var(--gold);
  background:linear-gradient(180deg,rgba(255,255,255,.9),rgba(247,244,236,.6));
  border:1px solid rgba(168,135,78,.22);
  box-shadow:
    0 1px 0 rgba(255,255,255,.9) inset,
    0 -1px 0 rgba(168,135,78,.06) inset,
    0 6px 16px -8px rgba(168,135,78,.25);
  opacity:0;animation:capFade .9s var(--ease) .15s forwards;
}
.contact-hero .eyebrow .dot{
  width:6px;height:6px;border-radius:50%;background:var(--gold);
  box-shadow:0 0 0 4px rgba(168,135,78,.15);
  animation:dotPulse 2.4s ease-in-out infinite;
}
@keyframes dotPulse{
  0%,100%{box-shadow:0 0 0 4px rgba(168,135,78,.15)}
  50%{box-shadow:0 0 0 9px rgba(168,135,78,0)}
}

/* H1 per-line flip */
.contact-hero h1{
  font-family:var(--serif);font-weight:300;letter-spacing:-.035em;
  font-size:clamp(3.2rem,8.5vw,7.4rem);line-height:.94;margin:0 0 40px;
  max-width:16ch;color:var(--ink);
  text-shadow:0 1px 0 rgba(255,255,255,.7),0 2px 8px rgba(20,18,14,.05);
}
.contact-hero h1 .line{
  display:block;overflow:hidden;padding:.06em 0 .12em;margin-bottom:-.12em;
  perspective:800px;
}
.contact-hero h1 .line > span{
  display:inline-block;transform:translateY(110%) rotateX(-60deg);
  transform-origin:0 100%;
  animation:capRise 1.3s var(--ease-out) forwards;
}
.contact-hero h1 .line:nth-child(1) > span{animation-delay:.25s}
.contact-hero h1 .line:nth-child(2) > span{animation-delay:.42s}
.contact-hero h1 em{
  font-style:italic;font-weight:400;
  background:linear-gradient(110deg,#8f6f3a 0%,var(--gold) 25%,var(--gold-3) 50%,var(--gold) 75%,#8f6f3a 100%);
  background-size:220% 100%;
  -webkit-background-clip:text;background-clip:text;
  -webkit-text-fill-color:transparent;color:transparent;
  filter:drop-shadow(0 2px 6px rgba(168,135,78,.2));
  animation:shimmer 7s ease-in-out 1.6s infinite alternate;
}
@keyframes shimmer{from{background-position:0% 50%}to{background-position:100% 50%}}

.contact-hero .lede{
  max-width:600px;font-size:1.06rem;font-weight:300;line-height:1.8;
  color:var(--ink-3);margin:0;letter-spacing:.005em;
  opacity:0;animation:capFade 1s var(--ease) .9s forwards;
}
@keyframes capRise{to{transform:none}}
@keyframes capFade{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:none}}

/* ===== SHARED TILT + GLARE ===== */
.contact-page [data-tilt]{position:relative;transform-style:preserve-3d}
.contact-page [data-tilt]::after{
  content:"";position:absolute;inset:0;border-radius:inherit;pointer-events:none;z-index:2;
  background:radial-gradient(420px circle at var(--mx,50%) var(--my,50%),rgba(255,255,255,.6),transparent 60%);
  opacity:0;transition:opacity .5s var(--ease);
}
.contact-page [data-tilt]:hover::after{opacity:.65}
.contact-tilt [data-tilt]{
  transition-property:box-shadow,background,border-color,color,opacity !important;
  will-change:transform;
}

/* ===== SECTION & GRID ===== */
.contact-section { padding: 0 0 clamp(100px, 12vw, 160px); }
.contact-grid {
  display: grid; grid-template-columns: 1fr 1.1fr; gap: clamp(48px, 8vw, 120px);
  align-items: start;
}

/* Info Panel */
.contact-info {
  padding: clamp(32px, 5vw, 56px);
  border-radius: 24px;
  background: linear-gradient(180deg, rgba(255,255,255,.75), rgba(247,244,236,.55));
  border: 1px solid rgba(255,255,255,.7);
  backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);
  box-shadow: var(--shadow-1);
  position: relative;
}
.contact-info::before {
  content: ""; position: absolute; left: 0; top: 32px; bottom: 32px; width: 2px;
  border-radius: 2px;
  background: linear-gradient(180deg, var(--gold), var(--gold-2));
  box-shadow: 0 0 10px rgba(196,165,102,.5);
}

.contact-info .intro {
  font-size: 1.05rem; font-weight: 300; line-height: 1.85; color: var(--ink-3);
  margin: 0 0 48px; max-width: 40ch;
  padding-left: 12px;
}

.contact-block { margin-bottom: 40px; padding-left: 12px; }
.contact-block h3 {
  font-size: 0.72rem; font-weight: 600; letter-spacing: 0.18em; text-transform: uppercase;
  color: var(--gold); margin: 0 0 12px;
}
.contact-block p, .contact-block a {
  font-family: var(--serif); font-size: 1.5rem; font-weight: 400; color: var(--ink);
  margin: 0; text-decoration: none; line-height: 1.4; transition: color 0.3s;
}
.contact-block a:hover { color: var(--gold); font-style: italic; }

/* Socials */
.social-links { display: flex; gap: 16px; margin-top: 48px; flex-wrap: wrap; padding-left: 12px; }
.social-links a {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 10px 16px; border-radius: 10px;
  font-size: 0.76rem; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase;
  color: var(--ink); text-decoration: none;
  background: linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.6));
  border: 1px solid rgba(168,135,78,.15);
  box-shadow: 0 1px 0 rgba(255,255,255,.9) inset, 0 2px 4px rgba(20,18,14,.04);
  transition: all 0.3s var(--ease);
}
.social-links a:hover {
  border-color: rgba(168,135,78,.4); color: var(--gold);
  transform: translateY(-2px);
  box-shadow: 0 1px 0 rgba(255,255,255,.9) inset, 0 6px 14px -4px rgba(168,135,78,.2);
}
.social-links svg { width: 16px; height: 16px; fill: currentColor; }

/* ===== FORM ===== */
.contact-form {
  padding: clamp(32px, 5vw, 56px);
  border-radius: 24px;
  background: linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.65));
  border: 1px solid rgba(255,255,255,.8);
  box-shadow: var(--shadow-2);
  position: relative;
}

/* Success & Error */
.success-msg, .error-msg {
  padding: 16px 20px; border-radius: 12px; margin-bottom: 32px;
  font-size: 0.88rem; display: flex; align-items: center; gap: 12px;
  animation: slideIn 0.5s var(--ease-out);
  box-shadow: 0 4px 12px rgba(0,0,0,.05);
}
.success-msg { background: #E6F4EA; border: 1px solid #B7E1CD; color: #1E8E3E; }
.error-msg { background: #FCE8E6; border: 1px solid #F5B7B1; color: #C5221F; }
.success-msg svg, .error-msg svg { width: 20px; height: 20px; fill: currentColor; flex-shrink: 0; }
@keyframes slideIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }

/* Inputs (3D Inset Style) */
.form-group { position: relative; margin-bottom: 28px; }
.form-group label {
  display: block; font-size: 0.72rem; font-weight: 600; letter-spacing: 0.14em;
  text-transform: uppercase; color: var(--muted); margin-bottom: 10px;
  padding-left: 4px;
}
.form-group input, .form-group textarea, .form-group select {
  width: 100%; padding: 16px 20px; 
  border: 1px solid rgba(168,135,78,.2); border-radius: 12px;
  background: var(--paper); 
  font-family: var(--sans); font-size: 1rem; color: var(--ink);
  box-shadow: inset 0 2px 4px rgba(20,18,14,.02);
  transition: all 0.4s var(--ease); resize: vertical;
  -webkit-appearance: none; appearance: none;
}
.form-group select {
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 24 24' fill='none' stroke='%23A8874E' stroke-width='2' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 16px center;
  background-size: 18px;
  padding-right: 48px;
}
.form-group input:focus, .form-group textarea:focus, .form-group select:focus {
  outline: none; border-color: var(--gold);
  box-shadow: inset 0 2px 4px rgba(20,18,14,.02), 0 0 0 4px rgba(168,135,78,.15);
  background: #FFF;
}
.form-group input::placeholder, .form-group textarea::placeholder { color: #B5AE9E; }
.form-group textarea { min-height: 120px; }

/* Submit Button — 3D + magnetic */
.btn-submit {
  display: inline-flex; align-items: center; justify-content: center; gap: 14px;
  background: linear-gradient(135deg, #14120E 0%, #2E2A22 100%); 
  color: var(--ivory); border: none;
  padding: 18px 36px; font-family: var(--sans); font-weight: 600;
  font-size: 0.8rem; letter-spacing: 0.14em; text-transform: uppercase;
  cursor: pointer; border-radius: 14px;
  width: 100%; position: relative; overflow: hidden;
  box-shadow: var(--shadow-1);
  transition: transform 0.45s var(--ease-out), box-shadow 0.45s var(--ease), translate 0.35s var(--ease-out);
  will-change: transform, translate;
}
.btn-submit span, .btn-submit svg { position: relative; z-index: 2; transition: transform 0.3s; }
.btn-submit::before {
  content: ""; position: absolute; inset: 0;
  background: linear-gradient(135deg, var(--gold), var(--gold-2));
  opacity: 0; transition: opacity 0.45s var(--ease); z-index: 0;
}
.btn-submit:hover {
  transform: translateY(-3px);
  box-shadow: var(--shadow-gold);
}
.btn-submit:hover::before { opacity: 1; }
.btn-submit:hover svg { transform: translateX(4px); }
.btn-submit:active { transform: translateY(-1px) scale(.98); }

/* Reveal */
.contact-js .reveal { opacity: 0; transform-origin: 50% 100%; }
.contact-js .reveal.in {
  opacity: 1;
  animation: revealIn 1.15s var(--ease-out) var(--d,0ms) backwards;
}
@keyframes revealIn {
  from { opacity: 0; translate: 0 46px; rotate: 1 0 0 14deg; scale: .96; }
  to { opacity: 1; translate: 0 0; rotate: 1 0 0 0deg; scale: 1; }
}

/* Responsive */
@media (max-width: 900px) {
  .contact-grid { grid-template-columns: 1fr; gap: 48px; }
  .contact-info { padding: 32px 24px; }
  .contact-info::before { display: none; }
  .contact-info .intro, .contact-block, .social-links { padding-left: 0; }
}

@media (prefers-reduced-motion: reduce) {
  .contact-page *,.contact-page *::before,.contact-page *::after{
    animation:none !important;transition:none !important;
  }
  .contact-hero h1 .line > span,.contact-hero .eyebrow{transform:none;opacity:1}
  .contact-js .reveal{opacity:1}
  .contact-js .kicker.reveal::before,.contact-js .kicker.reveal::after{width:40px}
  .contact-stage,.contact-orb,.read-progress,.cursor-glow{display:none}
}
</style>

<!-- Reading Progress Bar -->
<div class="read-progress" id="readProgress"></div>

<!-- Cursor Glow -->
<div class="cursor-glow" id="cursorGlow"></div>

<main class="contact-page">
  <section class="contact-hero">
    <div class="contact-orb o1"></div>
    <div class="contact-orb o2"></div>
    <div class="contact-orb o3"></div>

    <!-- 3D scene (glass cube) -->
    <div class="contact-stage" aria-hidden="true">
      <div class="contact-scene">
        <div class="hs-shadow"></div>
        <div class="hs-ring r3"></div>
        <div class="hs-ring r2"></div>
        <div class="hs-ring r1"></div>
        <div class="cube3d hs-cube"><span></span><span></span><span></span><span></span><span></span><span></span></div>
        <div class="hs-core"></div>
        <div class="hs-shard s1"></div>
        <div class="hs-shard s2"></div>
        <div class="hs-shard s3"></div>
      </div>
    </div>

    <div class="container">
      <p class="eyebrow">Get in Touch <span class="dot"></span> We're Online</p>
      <h1>
        <span class="line"><span>Let's build</span></span>
        <span class="line"><span>something <em>great</em>.</span></span>
      </h1>
      <p class="lede">
        Whether you have a question about our capstone project, want to collaborate, 
        or just want to say hello — our inbox is always open.
      </p>
    </div>
  </section>

  <section class="contact-section">
    <div class="container">
      <div class="contact-grid">
        
        <!-- Left Side: Info -->
        <div class="contact-info reveal" data-tilt="5">
          <p class="intro">
            Whether you have a question about our capstone project, want to collaborate, 
            or just want to say hello — our inbox is always open.
          </p>

          <div class="contact-block">
            <h3>Email Us</h3>
            <a href="mailto:yourgmail@gmail.com">quadro_01@gmail.com</a>
          </div>

          <div class="contact-block">
            <h3>Location</h3>
            <p>El Salvador City, Misamis Oriental<br>Philippines</p>
          </div>

          <div class="social-links">
            <a href="https://www.facebook.com/frankjames.generalao" target="_blank">
              <svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
              Facebook
            </a>
            <a href="https://t.me/yourusername" target="_blank">
              <svg viewBox="0 0 24 24"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>
              Telegram
            </a>
            <a href="https://instagram.com/yourusername" target="_blank">
              <svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
              Instagram
            </a>
          </div>
        </div>

        <!-- Right Side: Form -->
        <div class="contact-form reveal" data-tilt="4">
          
          <?php if ( isset($_GET['success']) && $_GET['success'] == 1 ) : ?>
            <div class="success-msg">
              <svg viewBox="0 0 24 24"><path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z"/></svg>
              Message sent! We'll get back to you soon.
            </div>
          <?php endif; ?>

          <?php if ( isset($_GET['error']) && $_GET['error'] == 1 ) : ?>
            <div class="error-msg">
              <svg viewBox="0 0 24 24"><path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M11,16.5L6.5,12L7.91,10.59L11,13.67L16.59,8.09L18,9.5L11,16.5Z"/></svg>
              Oops! Something went wrong. Please try again or email us directly.
            </div>
          <?php endif; ?>

          <form action="" method="POST">
            
            <div class="form-group">
              <label for="name">Your Name</label>
              <input type="text" id="name" name="name" placeholder="Jane Doe" required>
            </div>

            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" id="email" name="email" placeholder="jane@example.com" required>
            </div>

            <div class="form-group">
              <label for="subject">Subject</label>
              <select id="subject" name="subject">
                <option value="general">General Inquiry</option>
                <option value="collaboration">Collaboration</option>
                <option value="feedback">Project Feedback</option>
              </select>
            </div>

            <div class="form-group">
              <label for="message">Message</label>
              <textarea id="message" name="message" placeholder="Tell us about your project..." required></textarea>
            </div>

            <input type="hidden" name="custom_contact_submit" value="1">

            <button type="submit" class="btn-submit" data-magnetic>
              <span>Send Message</span>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </button>

          </form>
        </div>

      </div>
    </div>
  </section>
</main>

<script>
(function () {
  'use strict';
  var root = document.documentElement;
  root.classList.add('contact-js');

  var reduce  = matchMedia('(prefers-reduced-motion: reduce)').matches;
  var fine    = matchMedia('(hover: hover) and (pointer: fine)').matches;
  var desktop = matchMedia('(min-width: 769px)').matches;
  var rich    = fine && desktop && !reduce;
  if (rich) root.classList.add('contact-tilt');

  var $  = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var lerp  = function (a, b, t) { return a + (b - a) * t; };
  var clamp = function (v, a, b) { return Math.min(b, Math.max(a, v)); };

  /* 1. Reveal */
  var io = new IntersectionObserver(function (entries) {
    var shown = entries.filter(function (e) { return e.isIntersecting; });
    shown.forEach(function (entry, i) {
      entry.target.style.setProperty('--d', (reduce ? 0 : i * 90) + 'ms');
      entry.target.classList.add('in');
      io.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
  $$('.reveal').forEach(function (el) { io.observe(el); });

  /* 2. Scroll: progress, hero parallax */
  var bar   = $('#readProgress');
  var hero  = $('.contact-hero');
  var ticking = false;

  function onScroll() {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(function () {
      var y = window.scrollY || root.scrollTop;
      var max = root.scrollHeight - innerHeight;
      if (bar) bar.style.width = (max > 0 ? (y / max) * 100 : 0) + '%';

      if (!reduce) {
        if (hero && y < innerHeight * 1.3) hero.style.setProperty('--sy', y.toFixed(1));
      }
      ticking = false;
    });
  }
  addEventListener('scroll', onScroll, { passive: true });
  addEventListener('resize', onScroll);
  onScroll();

  /* 3. Cursor glow + hero parallax */
  if (rich) {
    var glow = $('#cursorGlow');
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
        glow.style.transform = 'translate3d(' + (gx - 210).toFixed(1) + 'px,' + (gy - 210).toFixed(1) + 'px,0)';
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

  /* 4. Magnetic button */
  if (rich) {
    $$('[data-magnetic]').forEach(function (el) {
      el.addEventListener('pointermove', function (e) {
        var r = el.getBoundingClientRect();
        var x = e.clientX - r.left - r.width / 2;
        var y = e.clientY - r.top - r.height / 2;
        el.style.translate = (x * 0.22).toFixed(1) + 'px ' + (y * 0.32).toFixed(1) + 'px';
      });
      el.addEventListener('pointerleave', function () { el.style.translate = ''; });
    });
  }

  /* 5. 3D tilt + glare on cards */
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
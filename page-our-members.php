<?php
/**
 * Template Name: Our Members
 * Template Post Type: page
 * Ultra 3D Aesthetic Edition v2 — unified with front-page.php
 */
get_header(); ?>

<style>
/* =========================================================
   MEMBERS PAGE — Ultra 3D Edition v2 (matches front-page.php)
   ========================================================= */
.members-page {
  --ivory:#F7F4EC; --ivory-2:#EFEADD; --paper:#FBFAF5;
  --ink:#14120E; --ink-2:#2E2A22; --ink-3:#4A443A;
  --gold:#A8874E; --gold-2:#C4A566; --gold-3:#D4BC8B;
  --line:rgba(168,135,78,.16); --line-2:rgba(168,135,78,.08);
  --muted:#7A7266; --muted-2:#9A9284;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  --ease:cubic-bezier(.22,.8,.2,1); --ease-out:cubic-bezier(.16,1,.3,1);
  --ease-spring:cubic-bezier(.34,1.56,.64,1);
  --gutter:clamp(28px,7vw,112px);

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

  background:var(--ivory); color:var(--ink); font-family:var(--sans);
  font-weight:400; overflow-x:hidden; -webkit-font-smoothing:antialiased;
  position:relative;
}

/* ambient stage */
.members-page::before{
  content:"";position:fixed;inset:0;pointer-events:none;z-index:0;
  background:
    radial-gradient(600px 400px at 15% 5%, rgba(196,165,102,.10), transparent 70%),
    radial-gradient(500px 400px at 85% 10%, rgba(212,188,139,.10), transparent 70%),
    radial-gradient(700px 500px at 50% 100%, rgba(196,165,102,.06), transparent 70%);
}

.members-page *,.members-page *::before,.members-page *::after{box-sizing:border-box}
.members-page .container{max-width:1320px;margin:0 auto;padding:0 var(--gutter);position:relative;z-index:1}
.members-page a{color:inherit;text-decoration:none}
.members-page :focus-visible{outline:2px solid var(--gold);outline-offset:4px;border-radius:4px}

/* Perspective for 3D children */
.members-page .container,
.members-stats,
.members-grid{perspective:1400px}

/* Paper grain */
.members-page::after{
  content:""; position:fixed; inset:0; z-index:2; pointer-events:none;
  opacity:.03; mix-blend-mode:multiply;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

/* ===== SCROLL PROGRESS ===== */
.mp-progress{
  position:fixed;top:0;left:0;height:3px;width:0%;
  background:linear-gradient(90deg,#8f6f3a,var(--gold),var(--gold-2),var(--gold-3));
  z-index:9999;transition:width .15s linear;
  box-shadow:0 0 12px rgba(196,165,102,.6);
}

/* ===== CURSOR GLOW ===== */
.mp-glow{
  position:fixed;width:420px;height:420px;border-radius:50%;
  background:radial-gradient(circle,rgba(168,135,78,.12),transparent 70%);
  pointer-events:none;z-index:1;transform:translate(-50%,-50%);
  will-change:transform;
}
@media (max-width:768px),(hover:none){ .mp-glow{display:none} }

/* ===== KICKER ===== */
.members-page .kicker{
  font-family:var(--sans);font-size:.7rem;font-weight:500;letter-spacing:.24em;
  text-transform:uppercase;color:var(--gold);margin:0 0 24px;
  display:inline-flex;align-items:center;gap:16px;
  padding:8px 16px 8px 0;border-radius:2px;
}
.members-page .kicker::before{content:"";width:40px;height:1px;background:var(--gold)}
.members-js .kicker.reveal::before,
.members-js .kicker.reveal::after{width:0;transition:width 1.1s var(--ease-out) .35s}
.members-js .kicker.reveal.in::before,
.members-js .kicker.reveal.in::after{width:40px}

/* =========================================================
   HERO
   ========================================================= */
.members-hero{
  position:relative;
  padding:clamp(180px,20vw,260px) 0 clamp(60px,8vw,100px);
  overflow:hidden; text-align:center;
}
.members-hero .container{
  position:relative;z-index:2;
  translate:0 calc(var(--sy,0) * .1px);
  opacity:calc(1 - var(--sy,0) * .0006);
}

/* Floating orbs — same as home */
.member-orb{
  position:absolute;border-radius:50%;pointer-events:none;z-index:1;
  background:radial-gradient(circle at 35% 30%,rgba(255,255,255,.45),rgba(196,165,102,.35) 40%,transparent 72%);
  filter:blur(2px);
  animation:floatOrb 22s infinite ease-in-out;
  translate:
    calc(var(--px,0) * var(--depth,30) * 1px)
    calc(var(--py,0) * var(--depth,30) * 1px + var(--sy,0) * var(--sdepth,-.08) * 1px);
  will-change:transform,translate;
}
.member-orb.o1{width:260px;height:260px;top:15%;right:12%;--depth:-46;--sdepth:-.14}
.member-orb.o2{width:140px;height:140px;bottom:28%;right:32%;--depth:64;--sdepth:-.06;animation-delay:6s}
.member-orb.o3{width:180px;height:180px;top:48%;left:4%;--depth:-28;--sdepth:-.1;animation-delay:12s}
@keyframes floatOrb{
  0%,100%{transform:translate(0,0) scale(1);opacity:.35}
  50%{transform:translate(30px,-40px) scale(1.15);opacity:.65}
}

/* ----- 3D hero scene (EXACT MATCH with front-page.php) ----- */
.members-stage{
  position:absolute;right:clamp(2%,6vw,9%);top:24%;
  width:420px;height:420px;z-index:1;
  perspective:1100px;pointer-events:none;
  translate:0 calc(var(--sy,0) * -.12px);
  opacity:0;animation:stageIn 1.6s var(--ease-out) .6s forwards;
}
@keyframes stageIn{from{opacity:0;scale:.82}to{opacity:1;scale:1}}
.members-scene{
  position:absolute;inset:0;transform-style:preserve-3d;
  transform:
    rotateX(calc(var(--py,0) * -20deg + 16deg))
    rotateY(calc(var(--px,0) * 28deg - 8deg));
}
.members-scene > *{position:absolute;left:50%;top:50%;transform-style:preserve-3d}

.hs-core{
  width:110px;height:110px;margin:-55px 0 0 -55px;border-radius:50%;
  background:radial-gradient(circle at 32% 28%,
    #fff8e8 0%, #e8d4a8 22%, #c4a566 55%, #8f6f3a 85%, #6b5028 100%);
  box-shadow:
    inset -10px -14px 24px rgba(90,65,25,.55),
    inset 10px 12px 20px rgba(255,255,255,.7),
    0 20px 40px -8px rgba(168,135,78,.45);
  animation:coreBob 7s ease-in-out infinite;
  transform:translateZ(20px);
}
@keyframes coreBob{
  0%,100%{transform:translateZ(20px) translateY(0)}
  50%{transform:translateZ(50px) translateY(-8px)}
}

.cube3d{--s:170px;width:var(--s);height:var(--s);margin:calc(var(--s) / -2) 0 0 calc(var(--s) / -2)}
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
@media (max-width:1100px){ .members-stage{display:none} }

/* Hero typography */
.members-hero .eyebrow,
.members-hero .kicker{
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
.members-hero .kicker::before{content:"";width:6px;height:6px;border-radius:50%;background:var(--gold);box-shadow:0 0 0 4px rgba(168,135,78,.15);animation:dotPulse 2.4s ease-in-out infinite;}
.members-hero .kicker::after{display:none;}
@keyframes dotPulse{
  0%,100%{box-shadow:0 0 0 4px rgba(168,135,78,.15)}
  50%{box-shadow:0 0 0 9px rgba(168,135,78,0)}
}

.members-hero h1{
  font-family:var(--serif); font-weight:300;
  font-size:clamp(3rem,8vw,6.5rem);
  line-height:.95; letter-spacing:-.035em; margin:0 auto 32px; max-width:16ch; color:var(--ink);
  text-shadow: 0 1px 0 rgba(255,255,255,.7), 0 2px 8px rgba(20,18,14,.05);
  perspective:800px;
}
.members-hero h1 em{
  font-style:italic;
  background:linear-gradient(110deg,#8f6f3a,var(--gold),var(--gold-3),var(--gold),#8f6f3a);
  background-size:220% 100%;
  -webkit-background-clip:text; background-clip:text;
  -webkit-text-fill-color:transparent; color:transparent;
  filter:drop-shadow(0 2px 6px rgba(168,135,78,.2));
  animation:shimmer 7s ease-in-out 1.6s infinite alternate;
}
@keyframes shimmer{from{background-position:0% 50%}to{background-position:100% 50%}}

/* char 3D flip rise */
.members-hero h1 .char{
  display:inline-block;
  opacity:0;
  transform:translateY(110%) rotateX(-60deg);
  transform-origin:0 100%;
  animation:charRise 1.1s var(--ease-out) forwards;
}
@keyframes charRise{ to{opacity:1; transform:none} }

.members-hero .lede{
  max-width:580px; margin:0 auto; font-size:clamp(1rem,1.4vw,1.1rem);
  font-weight:300; line-height:1.85; color:var(--ink-3);
  opacity:0; animation:fadeUp .9s var(--ease-out) .9s forwards;
}
@keyframes fadeUp{ from{opacity:0; transform:translateY(16px)} to{opacity:1; transform:none} }
@keyframes capFade{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:none}}

/* =========================================================
   STATS (3D Tiles, scroll-linked)
   ========================================================= */
.members-stats{
  display:grid; grid-template-columns:repeat(4, 1fr); gap:16px;
  padding:0; margin-bottom:clamp(60px,8vw,100px);
}
.stat-item{
  position:relative; text-align:center; padding:26px 20px;
  border-radius:16px;
  background:linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.65));
  border:1px solid rgba(255,255,255,.7);
  box-shadow:var(--shadow-1);
  transition:transform .5s var(--ease-out), box-shadow .5s var(--ease);
  transform:
    perspective(1200px)
    rotateX(calc(var(--p,0) * 3deg))
    scale(calc(1 - var(--p,0) * var(--p,0) * .02));
  transform-origin:50% 50%;
  will-change:transform;
}
.stat-item::before{
  content:""; position:absolute; left:50%; top:20px; bottom:20px; width:2px;
  transform:translateX(-50%); border-radius:2px;
  background:linear-gradient(180deg,var(--gold),var(--gold-2));
  opacity:.3; box-shadow:0 0 8px rgba(196,165,102,.5);
}
.stat-item:hover{ box-shadow:var(--shadow-2); }
.stat-item .number{
  font-family:var(--serif); font-weight:300; font-size:clamp(2.4rem,4vw,3.2rem);
  color:var(--ink); display:block; line-height:1; font-variant-numeric:tabular-nums;
  position:relative; z-index:1;
}
.stat-item .number em{ color:var(--gold); font-style:italic; }
.stat-item .label{
  font-size:.7rem; font-weight:600; letter-spacing:.16em; text-transform:uppercase;
  color:var(--muted); margin-top:12px; display:block; position:relative; z-index:1;
}

/* =========================================================
   GRID
   ========================================================= */
.members-grid-section{ padding:0 0 clamp(100px,12vw,180px); }
.members-grid{
  display:grid; grid-template-columns:repeat(4,1fr);
  gap:clamp(20px,3vw,32px); align-items:start;
}

/* =========================================================
   MEMBER CARD (Ultra 3D v2 — same tilt+glare as front-page)
   ========================================================= */
.member-card{
  position:relative; display:block;
  transform-style:preserve-3d;
  will-change:transform;
}
.members-tilt .member-card{
  transition-property:box-shadow,background,border-color,color,opacity !important;
}

/* glare via CSS — pointer drives --mx/--my */
.member-card::after{
  content:""; position:absolute; inset:0; border-radius:20px; pointer-events:none; z-index:2;
  background:radial-gradient(420px circle at var(--mx,50%) var(--my,50%),rgba(255,255,255,.55),transparent 60%);
  opacity:0; transition:opacity .5s var(--ease);
}
.member-card:hover::after{ opacity:.5; }

/* Image frame */
.member-image{
  position:relative; aspect-ratio:3/4; overflow:hidden;
  background:linear-gradient(180deg, rgba(255,255,255,.7), rgba(247,244,236,.5));
  border:1px solid rgba(255,255,255,.8);
  border-radius:20px; margin-bottom:24px;
  box-shadow:var(--shadow-1);
  transition:border-color .4s var(--ease), box-shadow .4s var(--ease);
  transform-style:preserve-3d;
}
.member-image::after {
  content:""; position:absolute; inset:10px; border:1px solid rgba(168,135,78,.15);
  border-radius:12px; pointer-events:none; z-index:2; transition:border-color .4s;
}
.member-card:hover .member-image{
  border-color:rgba(168,135,78,.4);
  box-shadow:var(--shadow-2);
}
.member-card:hover .member-image::after{ border-color:rgba(168,135,78,.35); }

/* Photo/Video base styles + inner parallax */
.member-image img,
.member-image video{
  width:100%; height:100%; object-fit:cover; display:block;
  transition:transform 1s var(--ease-out), filter .8s var(--ease), translate .6s var(--ease-out);
  filter:grayscale(30%) contrast(.98);
  transform:scale(1.02);
  translate:calc(var(--nx,0) * 6px) calc(var(--ny,0) * 4px);
}
.member-card:hover .member-image img,
.member-card:hover .member-image video{
  transform:scale(1.06); filter:grayscale(0%) contrast(1);
}

/* Cinematic gradient */
.member-image::before{
  content:""; position:absolute; inset:0; z-index:1;
  background:linear-gradient(to top, rgba(20,18,16,.72), transparent 55%);
  opacity:0; transition:opacity .5s var(--ease); pointer-events:none;
  border-radius:inherit;
}
.member-card:hover .member-image::before{ opacity:1; }

/* View profile chip — magnetic + 3D lift */
.view-profile-btn{
  position:absolute; bottom:20px; left:50%; z-index:4;
  transform:translate(-50%,16px) translateZ(40px);
  background:rgba(255,255,255,.9); backdrop-filter:blur(8px);
  color:var(--ink); padding:11px 22px; border-radius:50px;
  font-size:.7rem; font-weight:600; letter-spacing:.16em; text-transform:uppercase;
  opacity:0; white-space:nowrap;
  transition:opacity .5s var(--ease-out), transform .5s var(--ease-out), translate .35s var(--ease-out), box-shadow .4s var(--ease);
  pointer-events:none;
  box-shadow:0 10px 24px -8px rgba(20,18,14,.3), 0 1px 0 rgba(255,255,255,1) inset;
  border:1px solid rgba(255,255,255,.5);
  will-change:transform,translate;
}
.member-card:hover .view-profile-btn,
.member-card:focus-visible .view-profile-btn{
  opacity:1; transform:translate(-50%,0) translateZ(40px);
}

/* Info */
.member-info{ display:flex; flex-direction:column; gap:8px; text-align:center; }
.member-name{
  font-family:var(--serif); font-weight:400;
  font-size:clamp(1.25rem,2vw,1.5rem); letter-spacing:-.015em;
  color:var(--ink); margin:0;
  transition:color .3s var(--ease), translate .6s var(--ease-out);
  translate:calc(var(--nx,0) * 10px) 0;
}
.member-card:hover .member-name{ color:var(--gold); }

.member-role{
  position:relative; display:inline-block; align-self:center;
  font-size:.68rem; font-weight:500; letter-spacing:.16em;
  text-transform:uppercase; color:var(--muted); padding-bottom:6px;
  transition:translate .6s var(--ease-out);
  translate:calc(var(--nx,0) * 6px) 0;
}
.member-role::after{
  content:""; position:absolute; left:50%; bottom:0;
  width:0; height:1px; background:var(--gold);
  transition:width .5s var(--ease), left .5s var(--ease);
}
.member-card:hover .member-role::after{ width:100%; left:0; }

/* =========================================================
   REVEAL — 3D rise (same as front-page)
   ========================================================= */
.members-js .reveal{opacity:0;transform-origin:50% 100%}
.members-js .reveal.in{
  opacity:1;
  animation:revealIn 1.15s var(--ease-out) var(--d,0ms) backwards;
}
@keyframes revealIn{
  from{opacity:0;translate:0 46px;rotate:1 0 0 14deg;scale:.96}
  to{opacity:1;translate:0 0;rotate:1 0 0 0deg;scale:1}
}

/* =========================================================
   RESPONSIVE
   ========================================================= */
@media (max-width:1024px){
  .members-grid{ grid-template-columns:repeat(2,1fr); }
  .members-stats{ grid-template-columns:repeat(2,1fr); }
}
@media (max-width:600px){
  .members-grid{ grid-template-columns:1fr; gap:48px; }
  .member-image{ aspect-ratio:4/5; }
  .members-stats{ grid-template-columns:1fr 1fr; gap:12px; }
}

/* =========================================================
   REDUCED MOTION
   ========================================================= */
@media (prefers-reduced-motion:reduce){
  .members-page *, .members-page *::before, .members-page *::after{
    animation:none !important; transition:none !important;
  }
  .members-hero h1 .char{ opacity:1; transform:none; }
  .members-hero .lede,.members-hero .kicker{ opacity:1; }
  .members-js .reveal{ opacity:1; }
  .members-js .kicker.reveal::before,.members-js .kicker.reveal::after{width:40px}
  .stat-item{ transform:none; }
  .mp-progress,.mp-glow,.members-stage,.member-orb{ display:none; }
  .member-image img, .member-image video{ transform:none; translate:0; }
}
</style>

<!-- Reading progress -->
<div class="mp-progress" id="mpProgress" aria-hidden="true"></div>

<!-- Cursor glow -->
<div class="mp-glow" id="mpGlow" aria-hidden="true"></div>

<main class="members-page">

  <!-- HERO -->
  <section class="members-hero">
    <div class="member-orb o1"></div>
    <div class="member-orb o2"></div>
    <div class="member-orb o3"></div>

    <!-- 3D scene (glass cube, matches front-page) -->
    <div class="members-stage" aria-hidden="true">
      <div class="members-scene">
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
      <p class="kicker reveal">The Collective</p>
      <h1 data-split>Meet the <em>minds</em><br>behind the code.</h1>
      <p class="lede reveal">A team of passionate, detail-oriented developers building the web one project at a time.</p>
    </div>
  </section>

  <!-- STATS -->
  <div class="container">
    <div class="members-stats reveal" data-scroll3d>
      <div class="stat-item">
        <span class="number" data-count="4" data-pad="2">04</span>
        <span class="label">Team Members</span>
      </div>
      <div class="stat-item">
        <span class="number"><span data-count="12">12</span><em>+</em></span>
        <span class="label">Projects Built</span>
      </div>
      <div class="stat-item">
        <span class="number" data-count="4" data-pad="2">04</span>
        <span class="label">Years Learning</span>
      </div>
      <div class="stat-item">
        <span class="number" data-count="1" data-pad="2">01</span>
        <span class="label">Shared Vision</span>
      </div>
    </div>
  </div>

  <!-- MEMBERS GRID -->
  <section class="members-grid-section">
    <div class="container">
      <div class="members-grid">

        <!-- FRANK -->
        <a href="<?php echo esc_url(home_url('/friends/frank')); ?>" class="member-card reveal" data-reveal-delay="60" data-tilt="4" aria-label="View portfolio — Frank James Generalao, Programmer">
          <div class="member-image">
            <video 
              src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/frank.mp4'); ?>" 
              autoplay loop muted playsinline 
              poster="<?php echo esc_url(get_template_directory_uri() . '/assets/images/frankdp.jpg'); ?>">
            </video>
            <span class="view-profile-btn">View Portfolio</span>
          </div>
          <div class="member-info">
            <h3 class="member-name">Frank James Generalao</h3>
            <span class="member-role">Programmer</span>
          </div>
        </a>

        <!-- JAY -->
        <a href="<?php echo esc_url(home_url('/friends/jay')); ?>" class="member-card reveal" data-reveal-delay="140" data-tilt="4" aria-label="View portfolio — Jay Mark Generalao, System Analyst">
          <div class="member-image">
            <video 
              src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/jay.mp4'); ?>" 
              autoplay loop muted playsinline 
              poster="<?php echo esc_url(get_template_directory_uri() . '/assets/images/markdp.jpg'); ?>">
            </video>
            <span class="view-profile-btn">View Portfolio</span>
          </div>
          <div class="member-info">
            <h3 class="member-name">Jay Mark Generalao</h3>
            <span class="member-role">System Analyst</span>
          </div>
        </a>

        <!-- IVAN -->
        <a href="<?php echo esc_url(home_url('/friends/john')); ?>" class="member-card reveal" data-reveal-delay="220" data-tilt="4" aria-label="View portfolio — John Ivan Roland Sabella, Project Manager">
          <div class="member-image">
            <video 
              src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/ivan.mp4'); ?>" 
              autoplay loop muted playsinline 
              poster="<?php echo esc_url(get_template_directory_uri() . '/assets/images/ivan.jpg'); ?>">
            </video>
            <span class="view-profile-btn">View Portfolio</span>
          </div>
          <div class="member-info">
            <h3 class="member-name">John Ivan Roland Sabella</h3>
            <span class="member-role">Project Manager</span>
          </div>
        </a>

        <!-- KIM -->
        <a href="<?php echo esc_url(home_url('/friends/kim')); ?>" class="member-card reveal" data-reveal-delay="300" data-tilt="4" aria-label="View portfolio — Kim Martinez, Technical Writer">
          <div class="member-image">
            <video 
              src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/kim.mp4'); ?>" 
              autoplay loop muted playsinline 
              poster="<?php echo esc_url(get_template_directory_uri() . '/assets/images/kimmy.jpg'); ?>">
            </video>
            <span class="view-profile-btn">View Portfolio</span>
          </div>
          <div class="member-info">
            <h3 class="member-name">Kim Martinez</h3>
            <span class="member-role">Technical Writer</span>
          </div>
        </a>

      </div>
    </div>
  </section>
</main>

<script>
(function(){
  'use strict';

  var root = document.documentElement;
  root.classList.add('members-js');

  var reduce  = matchMedia('(prefers-reduced-motion: reduce)').matches;
  var fine    = matchMedia('(hover: hover) and (pointer: fine)').matches;
  var desktop = matchMedia('(min-width: 769px)').matches;
  var rich    = fine && desktop && !reduce;
  if (rich) root.classList.add('members-tilt');

  var $  = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var lerp  = function (a, b, t) { return a + (b - a) * t; };
  var clamp = function (v, a, b) { return Math.min(b, Math.max(a, v)); };

  /* ---------- 1. Split-letter hero headline (3D flip) ---------- */
  var splitEl = $('[data-split]');
  if (splitEl && !reduce) {
    var walk = function (node) {
      if (node.nodeType === 3) {
        var txt = node.textContent;
        var frag = document.createDocumentFragment();
        var i = 0;
        for (var c of txt) {
          if (c === ' ') { frag.appendChild(document.createTextNode(' ')); continue; }
          var span = document.createElement('span');
          span.className = 'char';
          span.textContent = c;
          span.style.animationDelay = (0.15 + (i++ * 0.025)) + 's';
          frag.appendChild(span);
        }
        node.parentNode.replaceChild(frag, node);
      } else if (node.nodeType === 1 && node.tagName !== 'EM' && !node.classList.contains('char')) {
        Array.prototype.slice.call(node.childNodes).forEach(walk);
      }
    };
    Array.prototype.slice.call(splitEl.childNodes).forEach(walk);
    $$('em', splitEl).forEach(function (em) {
      if (em.querySelector('.char')) return;
      var txt = em.textContent;
      em.textContent = '';
      Array.prototype.forEach.call(txt, function (ch, i) {
        var s = document.createElement('span');
        s.className = 'char';
        s.textContent = ch;
        s.style.animationDelay = (1.1 + i * 0.03) + 's';
        em.appendChild(s);
      });
    });
  }

  /* ---------- 2. Reveal — staggered 3D rise ---------- */
  var io = new IntersectionObserver(function (entries) {
    var shown = entries.filter(function (e) { return e.isIntersecting; });
    shown.forEach(function (entry, i) {
      var delay = parseInt(entry.target.dataset.revealDelay || '0', 10);
      var base = (reduce ? 0 : i * 90);
      entry.target.style.setProperty('--d', (delay + base) + 'ms');
      entry.target.classList.add('in');
      io.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
  $$('.reveal').forEach(function (el) { io.observe(el); });

  /* ---------- 3. Stat counter ---------- */
  var counters = $$('[data-count]');
  if (counters.length && !reduce) {
    var run = function (el) {
      var target = parseInt(el.dataset.count, 10);
      var pad = parseInt(el.dataset.pad || '0', 10);
      var dur = 1400;
      var start = performance.now();
      var step = function (now) {
        var t = Math.min(1, (now - start) / dur);
        var eased = 1 - Math.pow(1 - t, 3);
        var val = Math.round(eased * target);
        el.textContent = pad ? String(val).padStart(pad, '0') : val;
        if (t < 1) requestAnimationFrame(step);
      };
      requestAnimationFrame(step);
    };
    var cio = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) { run(entry.target); cio.unobserve(entry.target); }
      });
    }, { threshold: 0.6 });
    counters.forEach(function (c) { cio.observe(c); });
  }

  /* ---------- 4. Scroll: progress bar, hero parallax, scroll-linked 3D ---------- */
  var bar   = $('#mpProgress');
  var hero  = $('.members-hero');
  var s3d   = $$('[data-scroll3d]');
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

  /* ---------- 5. Smooth pointer loop: glow + hero scene parallax ---------- */
  if (rich) {
    var glow = $('#mpGlow');
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

  /* ---------- 6. 3D tilt + glare + inner parallax, lerped per card ---------- */
  if (rich) {
    $$('[data-tilt]').forEach(function (el) {
      var max = parseFloat(el.getAttribute('data-tilt')) || 4;
      var lift = 6;
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

  /* ---------- 7. Magnetic view-profile chips ---------- */
  if (rich) {
    $$('.view-profile-btn').forEach(function (btn) {
      var card = btn.closest('.member-card');
      if (!card) return;
      card.addEventListener('pointermove', function (e) {
        var r = btn.getBoundingClientRect();
        var x = e.clientX - r.left - r.width / 2;
        var y = e.clientY - r.top - r.height / 2;
        var d = Math.hypot(x, y);
        if (d < 120) {
          btn.style.translate = (x * 0.18).toFixed(1) + 'px ' + (y * 0.25).toFixed(1) + 'px';
        } else {
          btn.style.translate = '';
        }
      });
      card.addEventListener('pointerleave', function () { btn.style.translate = ''; });
    });
  }
})();
</script>

<?php get_footer(); ?>
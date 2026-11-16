<?php
/**
 * Template Name: Our Projects
 * Template Post Type: page
 * Ultra 3D Aesthetic Edition v2 — unified with front-page.php
 */
get_header(); ?>

<style>
/* ===== PROJECTS PAGE — Ultra 3D Edition v2 ===== */
.projects-page {
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

  background:var(--ivory); color:var(--ink); font-family:var(--sans);
  font-weight:400; overflow-x:hidden; -webkit-font-smoothing:antialiased;
  position:relative;
}
.projects-page *,.projects-page *::before,.projects-page *::after{box-sizing:border-box}
.projects-page a{color:inherit;text-decoration:none}
.projects-page :focus-visible{outline:2px solid var(--gold);outline-offset:4px}
.projects-page .container{max-width:1280px;margin:0 auto;padding:0 clamp(28px,7vw,112px);position:relative;z-index:1}

/* Perspective for 3D children */
.projects-page .container,
.projects-stats,
.projects-list{perspective:1400px}

/* Ambient stage */
.projects-page::before{
  content:"";position:fixed;inset:0;pointer-events:none;z-index:0;
  background:
    radial-gradient(600px 400px at 15% 5%, rgba(196,165,102,.10), transparent 70%),
    radial-gradient(500px 400px at 85% 10%, rgba(212,188,139,.10), transparent 70%),
    radial-gradient(700px 500px at 50% 100%, rgba(196,165,102,.06), transparent 70%);
}

/* ===== SCROLL PROGRESS ===== */
.pp-progress{
  position:fixed;top:0;left:0;height:3px;width:0%;
  background:linear-gradient(90deg,#8f6f3a,var(--gold),var(--gold-2),var(--gold-3));
  z-index:9999;transition:width .15s linear;
  box-shadow:0 0 12px rgba(196,165,102,.6);
}

/* ===== CURSOR GLOW ===== */
.pp-glow{
  position:fixed;width:420px;height:420px;border-radius:50%;
  background:radial-gradient(circle,rgba(168,135,78,.12),transparent 70%);
  pointer-events:none;z-index:1;transform:translate(-50%,-50%);
  will-change:transform;
}
@media (max-width:768px),(hover:none){.pp-glow{display:none}}

/* ===== KICKER ===== */
.projects-page .kicker{
  font-family:var(--sans);font-size:.7rem;font-weight:500;letter-spacing:.24em;
  text-transform:uppercase;color:var(--gold);margin:0 0 24px;
  display:inline-flex;align-items:center;gap:16px;
  padding:8px 16px 8px 0;border-radius:2px;
}
.projects-page .kicker::before{content:"";width:40px;height:1px;background:var(--gold)}
.projects-js .kicker.reveal::before,
.projects-js .kicker.reveal::after{width:0;transition:width 1.1s var(--ease-out) .35s}
.projects-js .kicker.reveal.in::before,
.projects-js .kicker.reveal.in::after{width:40px}

/* ===== HERO ===== */
.projects-hero{
  position:relative;
  padding:clamp(180px,20vw,260px) 0 clamp(60px,8vw,100px);
  overflow:hidden;
}
.projects-hero .container{
  position:relative;z-index:2;
  translate:0 calc(var(--sy,0) * .1px);
  opacity:calc(1 - var(--sy,0) * .0006);
}

/* Floating orbs — same as front-page */
.project-orb{
  position:absolute;border-radius:50%;pointer-events:none;z-index:1;
  background:radial-gradient(circle at 35% 30%,rgba(255,255,255,.45),rgba(196,165,102,.35) 40%,transparent 72%);
  filter:blur(2px);
  animation:floatOrb 22s infinite ease-in-out;
  translate:
    calc(var(--px,0) * var(--depth,30) * 1px)
    calc(var(--py,0) * var(--depth,30) * 1px + var(--sy,0) * var(--sdepth,-.08) * 1px);
  will-change:transform,translate;
}
.project-orb.o1{width:260px;height:260px;top:15%;right:12%;--depth:-46;--sdepth:-.14}
.project-orb.o2{width:140px;height:140px;bottom:28%;right:32%;--depth:64;--sdepth:-.06;animation-delay:6s}
.project-orb.o3{width:180px;height:180px;top:48%;left:4%;--depth:-28;--sdepth:-.1;animation-delay:12s}
@keyframes floatOrb{
  0%,100%{transform:translate(0,0) scale(1);opacity:.35}
  50%{transform:translate(30px,-40px) scale(1.15);opacity:.65}
}

/* ----- 3D hero scene (matches front-page) ----- */
.projects-stage{
  position:absolute;right:clamp(2%,6vw,9%);top:24%;
  width:420px;height:420px;z-index:1;
  perspective:1100px;pointer-events:none;
  translate:0 calc(var(--sy,0) * -.12px);
  opacity:0;animation:stageIn 1.6s var(--ease-out) .6s forwards;
}
@keyframes stageIn{from{opacity:0;scale:.82}to{opacity:1;scale:1}}
.projects-scene{
  position:absolute;inset:0;transform-style:preserve-3d;
  transform:
    rotateX(calc(var(--py,0) * -20deg + 16deg))
    rotateY(calc(var(--px,0) * 28deg - 8deg));
}
.projects-scene > *{position:absolute;left:50%;top:50%;transform-style:preserve-3d}

/* Glossy core sphere */
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

/* Ghostly glass cube */
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

/* Orbit rings with a satellite dot */
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

/* Small orbiting shards */
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

/* Soft ground shadow */
.hs-shadow{
  width:220px;height:40px;margin:170px 0 0 -110px;border-radius:50%;
  background:radial-gradient(ellipse,rgba(20,18,14,.22),transparent 70%);
  filter:blur(8px);transform:rotateX(90deg);animation:shadowPulse 7s ease-in-out infinite;
}
@keyframes shadowPulse{0%,100%{scale:1;opacity:.9}50%{scale:.78;opacity:.55}}
@media (max-width:1100px){.projects-stage{display:none}}

/* Eyebrow — pill (matches home) */
.projects-hero .eyebrow{
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
.projects-hero .eyebrow .dot{
  width:6px;height:6px;border-radius:50%;background:var(--gold);
  box-shadow:0 0 0 4px rgba(168,135,78,.15);
  animation:dotPulse 2.4s ease-in-out infinite;
}
@keyframes dotPulse{
  0%,100%{box-shadow:0 0 0 4px rgba(168,135,78,.15)}
  50%{box-shadow:0 0 0 9px rgba(168,135,78,0)}
}

/* H1 — per-line 3D flip (matches home) */
.projects-hero h1{
  font-family:var(--serif);font-weight:300;letter-spacing:-.035em;
  font-size:clamp(3.2rem,8.5vw,7.4rem);line-height:.94;margin:0 0 40px;
  max-width:16ch;color:var(--ink);
  text-shadow:0 1px 0 rgba(255,255,255,.7),0 2px 8px rgba(20,18,14,.05);
}
.projects-hero h1 .line{
  display:block;overflow:hidden;padding:.06em 0 .12em;margin-bottom:-.12em;
  perspective:800px;
}
.projects-hero h1 .line > span{
  display:inline-block;transform:translateY(110%) rotateX(-60deg);
  transform-origin:0 100%;
  animation:capRise 1.3s var(--ease-out) forwards;
}
.projects-hero h1 .line:nth-child(1) > span{animation-delay:.25s}
.projects-hero h1 .line:nth-child(2) > span{animation-delay:.42s}
.projects-hero h1 em{
  font-style:italic;font-weight:400;
  background:linear-gradient(110deg,#8f6f3a 0%,var(--gold) 25%,var(--gold-3) 50%,var(--gold) 75%,#8f6f3a 100%);
  background-size:220% 100%;
  -webkit-background-clip:text;background-clip:text;
  -webkit-text-fill-color:transparent;color:transparent;
  filter:drop-shadow(0 2px 6px rgba(168,135,78,.2));
  animation:shimmer 7s ease-in-out 1.6s infinite alternate;
}
@keyframes shimmer{from{background-position:0% 50%}to{background-position:100% 50%}}

.projects-hero .lede{
  max-width:600px;font-size:1.06rem;font-weight:300;line-height:1.8;
  color:var(--ink-3);margin:0;letter-spacing:.005em;
  opacity:0;animation:capFade 1s var(--ease) .9s forwards;
}
@keyframes capRise{to{transform:none}}
@keyframes capFade{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:none}}

/* ===== SHARED TILT + GLARE ===== */
.projects-page [data-tilt]{position:relative;transform-style:preserve-3d}
.projects-page [data-tilt]::after{
  content:"";position:absolute;inset:0;border-radius:inherit;pointer-events:none;z-index:2;
  background:radial-gradient(420px circle at var(--mx,50%) var(--my,50%),rgba(255,255,255,.6),transparent 60%);
  opacity:0;transition:opacity .5s var(--ease);
}
.projects-page [data-tilt]:hover::after{opacity:.65}
.projects-tilt [data-tilt]{
  transition-property:box-shadow,background,border-color,color,opacity !important;
  will-change:transform;
}

/* ===== STATS STRIP ===== */
.projects-stats{
  display:grid; grid-template-columns:repeat(3,1fr); gap:16px;
  margin-bottom:clamp(60px,8vw,100px);
}
.stat-item{
  position:relative; text-align:center; padding:30px 20px;
  border-radius:16px;
  background:linear-gradient(180deg,rgba(255,255,255,.9),rgba(247,244,236,.65));
  border:1px solid rgba(255,255,255,.7);
  box-shadow:var(--shadow-1);
  transform:
    perspective(1200px)
    rotateX(calc(var(--p,0) * 3deg))
    scale(calc(1 - var(--p,0) * var(--p,0) * .02));
  transform-origin:50% 50%;will-change:transform;
}
.stat-item::before{
  content:"";position:absolute;left:50%;top:20px;bottom:20px;width:2px;
  transform:translateX(-50%);border-radius:2px;
  background:linear-gradient(180deg,var(--gold),var(--gold-2));
  opacity:.3;box-shadow:0 0 8px rgba(196,165,102,.5);
}
.stat-item .number{
  font-family:var(--serif);font-size:clamp(2.4rem,4vw,3.2rem);font-weight:300;
  color:var(--ink);display:block;line-height:1;position:relative;z-index:1;
  font-variant-numeric:tabular-nums;
}
.stat-item .number em{color:var(--gold);font-style:italic}
.stat-item .label{
  font-size:.72rem;font-weight:600;letter-spacing:.16em;text-transform:uppercase;
  color:var(--muted);margin-top:12px;display:block;position:relative;z-index:1;
}

/* ===== PROJECTS LIST ===== */
.projects-list{padding:0 0 clamp(100px,12vw,180px)}
.project-item{
  display:grid;grid-template-columns:1fr 1fr;
  gap:clamp(40px,6vw,96px);align-items:center;
  padding:clamp(60px,8vw,100px) 0;
  border-bottom:1px solid var(--line);
}
.project-item:first-child{border-top:1px solid var(--line)}
.project-item:nth-child(even) .project-content{order:2}
.project-item:nth-child(even) .project-visual{order:1}

/* Content glass card */
.project-content{
  padding:clamp(32px,4vw,48px);
  border-radius:24px;
  background:linear-gradient(180deg,rgba(255,255,255,.75),rgba(247,244,236,.55));
  border:1px solid rgba(255,255,255,.7);
  backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);
  box-shadow:var(--shadow-1);
  position:relative;
  transform:
    perspective(1400px)
    rotateX(calc(var(--p,0) * 3deg))
    scale(calc(1 - var(--p,0) * var(--p,0) * .02));
  transform-origin:50% 50%;will-change:transform;
}
.project-content::before{
  content:"";position:absolute;left:0;top:32px;bottom:32px;width:2px;
  border-radius:2px;
  background:linear-gradient(180deg,var(--gold),var(--gold-2));
  box-shadow:0 0 10px rgba(196,165,102,.5);
}
.project-content .num{
  font-family:var(--serif);font-style:italic;font-size:1.2rem;
  color:var(--gold);display:block;margin-bottom:16px;padding-left:12px;
}
.project-content h2{
  font-family:var(--serif);font-weight:300;
  font-size:clamp(2rem,4vw,3.4rem);line-height:1.1;letter-spacing:-.02em;
  margin:0 0 24px;color:var(--ink);padding-left:12px;
}
.project-content h2 em{
  font-style:italic;
  background:linear-gradient(135deg,var(--gold),var(--gold-2));
  -webkit-background-clip:text;background-clip:text;
  -webkit-text-fill-color:transparent;color:transparent;
}
.project-content p{
  font-size:1.02rem;font-weight:300;line-height:1.85;color:var(--ink-3);
  margin:0 0 32px;max-width:44ch;padding-left:12px;
}

/* Tag pills */
.project-tags{
  display:flex;flex-wrap:wrap;gap:10px;margin-bottom:32px;padding-left:12px;
}
.project-tags span{
  font-size:.7rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;
  color:var(--ink-3);padding:8px 16px;
  background:linear-gradient(180deg,rgba(255,255,255,.9),rgba(247,244,236,.6));
  border:1px solid rgba(168,135,78,.15);border-radius:50px;
  box-shadow:0 1px 0 rgba(255,255,255,.9) inset,0 2px 4px rgba(20,18,14,.04);
  transition:all .3s var(--ease);
}
.project-item:hover .project-tags span{
  border-color:rgba(168,135,78,.4);color:var(--gold);
  box-shadow:0 1px 0 rgba(255,255,255,.9) inset,0 4px 10px -2px rgba(168,135,78,.2);
}

/* Button — matches home's ghost style + magnetic */
.project-link{
  display:inline-flex;align-items:center;gap:12px;margin-left:12px;
  font-family:var(--sans);font-weight:500;font-size:.76rem;
  letter-spacing:.16em;text-transform:uppercase;
  color:var(--ink);padding:14px 22px;border-radius:12px;
  background:linear-gradient(180deg,rgba(255,255,255,.9),rgba(247,244,236,.7));
  border:1px solid rgba(168,135,78,.2);
  box-shadow:0 1px 0 rgba(255,255,255,.95) inset,0 4px 12px -4px rgba(20,18,14,.1);
  transition:all .45s var(--ease-out);
  will-change:transform,translate;
}
.project-link:hover{
  color:var(--gold);transform:translateY(-2px);
  border-color:rgba(168,135,78,.45);
  box-shadow:0 1px 0 rgba(255,255,255,.95) inset,0 8px 20px -6px rgba(168,135,78,.3);
}

/* Visual — 3D framed surface with glare */
.project-visual{
  position:relative;aspect-ratio:4/3;border-radius:24px;overflow:hidden;
  background:linear-gradient(180deg,rgba(255,255,255,.7),rgba(247,244,236,.5));
  border:1px solid rgba(255,255,255,.8);
  box-shadow:var(--shadow-2);
  transform-style:preserve-3d;
  will-change:transform;
}
.project-visual::before{
  content:"";position:absolute;inset:0;z-index:2;pointer-events:none;
  background:linear-gradient(150deg,rgba(255,255,255,.25) 0%,transparent 40%);
  border-radius:inherit;
}
.project-visual::after{
  content:"";position:absolute;inset:10px;
  border:1px solid rgba(168,135,78,.15);
  border-radius:16px;pointer-events:none;z-index:2;
  transition:border-color .4s;
}
.project-item:hover .project-visual::after{border-color:rgba(168,135,78,.35)}

.project-visual img{
  width:100%;height:100%;object-fit:cover;display:block;
  transition:transform .8s var(--ease-out), filter .8s var(--ease), translate .6s var(--ease-out);
  filter:grayscale(20%);
  translate:calc(var(--nx,0) * 6px) calc(var(--ny,0) * 4px);
}
.project-item:hover .project-visual img{filter:grayscale(0%)}

/* ===== CLOSING CTA ===== */
.projects-closing{padding:clamp(112px,14vw,200px) 0;text-align:center}
.projects-closing .kicker{justify-content:center;margin-bottom:32px}
.projects-closing .kicker::after{content:"";width:40px;height:1px;background:var(--gold)}
.projects-closing h2{
  font-family:var(--serif);font-weight:300;
  font-size:clamp(2.6rem,6.5vw,5.8rem);line-height:1;letter-spacing:-.03em;
  margin:0 0 24px;color:var(--ink);
}
.projects-closing h2 em{
  font-style:italic;
  background:linear-gradient(110deg,#8f6f3a,var(--gold),var(--gold-3),var(--gold),#8f6f3a);
  background-size:220% 100%;
  -webkit-background-clip:text;background-clip:text;
  -webkit-text-fill-color:transparent;color:transparent;
  animation:shimmer 7s ease-in-out infinite alternate;
}
.projects-closing p{
  max-width:46ch;margin:0 auto 52px;color:var(--muted);
  font-weight:300;line-height:1.8;font-size:1rem;
}

.projects-page .btn{
  position:relative;display:inline-flex;align-items:center;gap:14px;
  padding:18px 34px;border-radius:14px;
  color:var(--ivory);cursor:pointer;
  font-family:var(--sans);font-weight:600;font-size:.76rem;
  letter-spacing:.16em;text-transform:uppercase;
  background:linear-gradient(135deg,#14120E 0%,#2E2A22 100%);
  box-shadow:var(--shadow-1);
  transition:transform .45s var(--ease-out),box-shadow .45s var(--ease),translate .35s var(--ease-out);
  transform-style:preserve-3d;overflow:hidden;border:none;
  will-change:transform,translate;
}
.projects-page .btn span{position:relative;z-index:2}
.projects-page .btn::before{
  content:"";position:absolute;inset:0;
  background:linear-gradient(135deg,var(--gold),var(--gold-2));
  opacity:0;transition:opacity .45s var(--ease);z-index:0;
}
.projects-page .btn::after{
  content:"→";position:relative;z-index:2;font-size:1rem;
  transition:transform .45s var(--ease);
}
.projects-page .btn:hover{transform:translateY(-3px);box-shadow:var(--shadow-gold)}
.projects-page .btn:hover::before{opacity:1}
.projects-page .btn:hover::after{transform:translateX(5px)}
.projects-page .btn:active{transform:translateY(-1px) scale(.98)}

/* ===== REVEAL — 3D rise ===== */
.projects-js .reveal{opacity:0;transform-origin:50% 100%}
.projects-js .reveal.in{
  opacity:1;
  animation:revealIn 1.15s var(--ease-out) var(--d,0ms) backwards;
}
@keyframes revealIn{
  from{opacity:0;translate:0 46px;rotate:1 0 0 14deg;scale:.96}
  to{opacity:1;translate:0 0;rotate:1 0 0 0deg;scale:1}
}

/* ===== RESPONSIVE ===== */
@media (max-width:900px){
  .project-item{grid-template-columns:1fr;gap:32px}
  .project-item:nth-child(even) .project-content{order:1}
  .project-item:nth-child(even) .project-visual{order:2}
  .project-visual{aspect-ratio:16/9}
  .projects-stats{grid-template-columns:1fr;gap:12px}
  .project-content{padding:28px 24px}
  .project-content::before{display:none}
  .project-content .num,.project-content h2,.project-content p,
  .project-tags,.project-link{padding-left:0;margin-left:0}
}

/* ===== REDUCED MOTION ===== */
@media (prefers-reduced-motion:reduce){
  .projects-page *,.projects-page *::before,.projects-page *::after{
    animation:none !important;transition:none !important;
  }
  .projects-hero h1 .line > span,.projects-hero .eyebrow,.projects-hero .lede{transform:none;opacity:1}
  .projects-js .reveal{opacity:1}
  .projects-js .kicker.reveal::before,.projects-js .kicker.reveal::after{width:40px}
  .project-content,.stat-item{transform:none}
  .projects-stage,.project-orb,.pp-progress,.pp-glow{display:none}
}
</style>

<!-- Reading Progress Bar -->
<div class="pp-progress" id="projectsProgress"></div>

<!-- Cursor Glow -->
<div class="pp-glow" id="projectsCursorGlow"></div>

<main class="projects-page">

  <!-- HERO -->
  <section class="projects-hero">
    <div class="project-orb o1"></div>
    <div class="project-orb o2"></div>
    <div class="project-orb o3"></div>

    <!-- 3D scene (glass cube) -->
    <div class="projects-stage" aria-hidden="true">
      <div class="projects-scene">
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
      <p class="eyebrow">Selected Work <span class="dot"></span> 2025 — 2026</p>
      <h1>
        <span class="line"><span>Digital products</span></span>
        <span class="line"><span>built with <em>intention.</em></span></span>
      </h1>
      <p class="lede">
        A curated selection of our capstone projects — from conceptual
        designs to fully functional web applications.
      </p>
    </div>
  </section>

  <!-- STATS STRIP -->
  <div class="container">
    <div class="projects-stats reveal" data-scroll3d>
      <div class="stat-item">
        <span class="number" data-target="3">0</span>
        <span class="label">Capstone Projects</span>
      </div>
      <div class="stat-item">
        <span class="number" data-target="100"><em>+</em></span>
        <span class="label">Hours of Coding</span>
      </div>
      <div class="stat-item">
        <span class="number">4</span>
        <span class="label">Team Members</span>
      </div>
    </div>
  </div>

  <!-- PROJECTS LIST -->
  <section class="projects-list">
    <div class="container">

      <!-- PROJECT 01 -->
      <article class="project-item">
        <div class="project-content reveal" data-scroll3d>
          <span class="num">01</span>
          <h2>School Management<br><em>System</em></h2>
          <p>
            A comprehensive administrative system designed to streamline school operations.
            Features student enrollment, grade tracking, teacher management, and real-time
            announcements — all in one unified, elegant dashboard.
          </p>
          <div class="project-tags">
            <span>PHP</span>
            <span>MySQL</span>
            <span>JavaScript</span>
            <span>CSS</span>
          </div>
          <a href="#" class="project-link" data-magnetic>View Project →</a>
        </div>
        <div class="project-visual reveal" data-tilt="5">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/sms_cpst.jpg'); ?>" alt="School Management System">
        </div>
      </article>

      <!-- PROJECT 02 -->
      <article class="project-item">
        <div class="project-content reveal" data-scroll3d>
          <span class="num">02</span>
          <h2>Bus Ticketing<br><em>System</em></h2>
          <p>
            A clean, conversion-focused booking interface designed to feel intuitive and efficient.
            Features seat selection, real-time scheduling, and a streamlined checkout flow —
            built to make travel planning effortless.
          </p>
          <div class="project-tags">
            <span>JavaScript</span>
            <span>CSS Grid</span>
            <span>PHP</span>
            <span>Expo Go</span>
          </div>
          <a href="#" class="project-link" data-magnetic>View Case Study →</a>
        </div>
        <div class="project-visual reveal" data-tilt="5">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/busticket_cpst.jpg'); ?>" alt="Bus Ticketing System">
        </div>
      </article>

      <!-- PROJECT 03 -->
      <article class="project-item">
        <div class="project-content reveal" data-scroll3d>
          <span class="num">03</span>
          <h2>Mobile Learning<br><em>Platform</em></h2>
          <p>
            A mobile-first learning app designed for students to explore courses in Figma, HTML,
            JavaScript, and more. Features interactive lessons, progress tracking, and a
            distraction-free reading experience — optimized for on-the-go learning.
          </p>
          <div class="project-tags">
            <span>Mobile UI</span>
            <span>Expo Go</span>
            <span>HTML/CSS/JS</span>
          </div>
          <a href="#" class="project-link" data-magnetic>Explore Project →</a>
        </div>
        <div class="project-visual reveal" data-tilt="5">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mobile_cpst.jpg'); ?>" alt="Mobile Learning Platform">
        </div>
      </article>

    </div>
  </section>

  <!-- CLOSING CTA -->
  <section class="projects-closing">
    <div class="container">
      <p class="kicker reveal">Want to see more?</p>
      <h2 class="reveal">Meet the team behind <em>the work.</em></h2>
      <p class="reveal">Four developers, one vision — explore the minds that built these projects.</p>
      <div class="reveal" style="margin-top:12px">
        <a class="btn" href="<?php echo esc_url(home_url('/our-members')); ?>" data-magnetic><span>Meet the Team</span></a>
      </div>
    </div>
  </section>

</main>

<script>
(function () {
  'use strict';
  var root = document.documentElement;
  root.classList.add('projects-js');

  var reduce  = matchMedia('(prefers-reduced-motion: reduce)').matches;
  var fine    = matchMedia('(hover: hover) and (pointer: fine)').matches;
  var desktop = matchMedia('(min-width: 769px)').matches;
  var rich    = fine && desktop && !reduce;
  if (rich) root.classList.add('projects-tilt');

  var $  = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var lerp  = function (a, b, t) { return a + (b - a) * t; };
  var clamp = function (v, a, b) { return Math.min(b, Math.max(a, v)); };

  /* 1. Reveal — staggered 3D rise via --d */
  var io = new IntersectionObserver(function (entries) {
    var shown = entries.filter(function (e) { return e.isIntersecting; });
    shown.forEach(function (entry, i) {
      entry.target.style.setProperty('--d', (reduce ? 0 : i * 90) + 'ms');
      entry.target.classList.add('in');
      io.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
  $$('.reveal').forEach(function (el) { io.observe(el); });

  /* 2. Stat counter */
  var counters = $$('[data-target]');
  if (counters.length && !reduce) {
    var run = function (el) {
      var target = parseInt(el.dataset.target, 10);
      var hasEm = el.querySelector('em') !== null;
      var emHTML = hasEm ? '<em>+</em>' : '';
      var dur = 1400;
      var start = performance.now();
      var step = function (now) {
        var t = Math.min(1, (now - start) / dur);
        var eased = 1 - Math.pow(1 - t, 3);
        el.innerHTML = Math.round(eased * target) + emHTML;
        if (t < 1) requestAnimationFrame(step);
      };
      requestAnimationFrame(step);
    };
    var cio = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) { run(entry.target); cio.unobserve(entry.target); }
      });
    }, { threshold: 0.5 });
    counters.forEach(function (c) { cio.observe(c); });
  }

  /* 3. Scroll: progress bar, hero parallax, scroll-linked 3D */
  var bar   = $('#projectsProgress');
  var hero  = $('.projects-hero');
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

  /* 4. Smooth pointer loop: glow + hero scene parallax */
  if (rich) {
    var glow = $('#projectsCursorGlow');
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

  /* 5. Magnetic buttons */
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

  /* 6. 3D tilt + glare + inner parallax, lerped per element */
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
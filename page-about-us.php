<?php
/**
 * Template Name: About Us Luxury
 * Template Post Type: page
 * Ultra 3D Aesthetic Edition v2 — unified with front-page.php
 */
get_header(); ?>

<style>
/* ===== ABOUT PAGE — Ultra 3D Edition v2 ===== */
.about-page{
  --ivory:#F7F4EC; --ivory-2:#EFEADD; --paper:#FBFAF5;
  --ink:#14120E; --ink-2:#2E2A22; --ink-3:#4A443A;
  --gold:#A8874E; --gold-2:#C4A566; --gold-3:#D4BC8B;
  --line:rgba(168,135,78,.16);
  --line-2:rgba(168,135,78,.08);
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
.about-page *,.about-page *::before,.about-page *::after{box-sizing:border-box}
.about-page a{color:inherit;text-decoration:none}
.about-page :focus-visible{outline:2px solid var(--gold);outline-offset:4px}
.about-page .container{max-width:1280px;margin:0 auto;padding:0 clamp(28px,7vw,112px)}

/* Perspective for 3D children */
.about-page .container,
.about-editorial .about-grid,
.values-grid{perspective:1400px}

/* Ambient stage */
.about-page::before{
  content:"";position:fixed;inset:0;pointer-events:none;z-index:0;
  background:
    radial-gradient(600px 400px at 15% 5%, rgba(196,165,102,.10), transparent 70%),
    radial-gradient(500px 400px at 85% 10%, rgba(212,188,139,.10), transparent 70%),
    radial-gradient(700px 500px at 50% 100%, rgba(196,165,102,.06), transparent 70%);
}
.about-page > section{position:relative;z-index:1}

/* ===== SCROLL PROGRESS ===== */
.ap-progress{
  position:fixed;top:0;left:0;height:3px;width:0%;
  background:linear-gradient(90deg,#8f6f3a,var(--gold),var(--gold-2),var(--gold-3));
  z-index:9999;transition:width .15s linear;
  box-shadow:0 0 12px rgba(196,165,102,.6);
}

/* ===== CURSOR GLOW ===== */
.ap-glow{
  position:fixed;width:420px;height:420px;border-radius:50%;
  background:radial-gradient(circle,rgba(168,135,78,.12),transparent 70%);
  pointer-events:none;z-index:1;transform:translate(-50%,-50%);
  will-change:transform;
}
@media (max-width:768px),(hover:none){.ap-glow{display:none}}

/* ===== KICKER ===== */
.about-page .kicker{
  font-family:var(--sans);font-size:.7rem;font-weight:500;letter-spacing:.24em;
  text-transform:uppercase;color:var(--gold);margin:0 0 24px;
  display:inline-flex;align-items:center;gap:16px;
  padding:8px 16px 8px 0;border-radius:2px;
}
.about-page .kicker::before{content:"";width:40px;height:1px;background:var(--gold)}
.about-js .kicker.reveal::before,
.about-js .kicker.reveal::after{width:0;transition:width 1.1s var(--ease-out) .35s}
.about-js .kicker.reveal.in::before,
.about-js .kicker.reveal.in::after{width:40px}

/* ============ HERO ============ */
.about-hero{
  position:relative;
  padding:clamp(180px,20vw,260px) 0 clamp(96px,12vw,160px);
  overflow:hidden;
}
.about-hero .container{
  position:relative;z-index:2;
  translate:0 calc(var(--sy,0) * .1px);
  opacity:calc(1 - var(--sy,0) * .0006);
}

/* Floating orbs */
.about-orb{
  position:absolute;border-radius:50%;pointer-events:none;z-index:1;
  background:radial-gradient(circle at 35% 30%,rgba(255,255,255,.45),rgba(196,165,102,.35) 40%,transparent 72%);
  filter:blur(2px);
  animation:floatOrb 22s infinite ease-in-out;
  translate:
    calc(var(--px,0) * var(--depth,30) * 1px)
    calc(var(--py,0) * var(--depth,30) * 1px + var(--sy,0) * var(--sdepth,-.08) * 1px);
  will-change:transform,translate;
}
.about-orb.a1{width:260px;height:260px;top:15%;right:12%;--depth:-46;--sdepth:-.14}
.about-orb.a2{width:140px;height:140px;bottom:28%;right:32%;--depth:64;--sdepth:-.06;animation-delay:6s}
.about-orb.a3{width:180px;height:180px;top:48%;left:4%;--depth:-28;--sdepth:-.1;animation-delay:12s}
@keyframes floatOrb{
  0%,100%{transform:translate(0,0) scale(1);opacity:.35}
  50%{transform:translate(30px,-40px) scale(1.15);opacity:.65}
}

/* ----- 3D hero scene (EXACT MATCH with front-page.php) ----- */
.about-stage{
  position:absolute;right:clamp(2%,6vw,9%);top:24%;
  width:420px;height:420px;z-index:1;
  perspective:1100px;pointer-events:none;
  translate:0 calc(var(--sy,0) * -.12px);
  opacity:0;animation:stageIn 1.6s var(--ease-out) .6s forwards;
}
@keyframes stageIn{from{opacity:0;scale:.82}to{opacity:1;scale:1}}
.about-scene{
  position:absolute;inset:0;transform-style:preserve-3d;
  transform:
    rotateX(calc(var(--py,0) * -20deg + 16deg))
    rotateY(calc(var(--px,0) * 28deg - 8deg));
}
.about-scene > *{position:absolute;left:50%;top:50%;transform-style:preserve-3d}

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
@media (max-width:1100px){.about-stage{display:none}}

/* Eyebrow pill */
.about-hero .eyebrow{
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
.about-hero .eyebrow .dot{
  width:6px;height:6px;border-radius:50%;background:var(--gold);
  box-shadow:0 0 0 4px rgba(168,135,78,.15);
  animation:dotPulse 2.4s ease-in-out infinite;
}
@keyframes dotPulse{
  0%,100%{box-shadow:0 0 0 4px rgba(168,135,78,.15)}
  50%{box-shadow:0 0 0 9px rgba(168,135,78,0)}
}

/* H1 per-line flip */
.about-hero h1{
  font-family:var(--serif);font-weight:300;letter-spacing:-.035em;
  font-size:clamp(3.2rem,8.5vw,7.4rem);line-height:.94;margin:0 0 40px;
  max-width:16ch;color:var(--ink);
  text-shadow:0 1px 0 rgba(255,255,255,.7),0 2px 8px rgba(20,18,14,.05);
}
.about-hero h1 .line{
  display:block;overflow:hidden;padding:.06em 0 .12em;margin-bottom:-.12em;
  perspective:800px;
}
.about-hero h1 .line > span{
  display:inline-block;transform:translateY(110%) rotateX(-60deg);
  transform-origin:0 100%;
  animation:capRise 1.3s var(--ease-out) forwards;
}
.about-hero h1 .line:nth-child(1) > span{animation-delay:.25s}
.about-hero h1 .line:nth-child(2) > span{animation-delay:.42s}
.about-hero h1 em{
  font-style:italic;font-weight:400;
  background:linear-gradient(110deg,#8f6f3a 0%,var(--gold) 25%,var(--gold-3) 50%,var(--gold) 75%,#8f6f3a 100%);
  background-size:220% 100%;
  -webkit-background-clip:text;background-clip:text;
  -webkit-text-fill-color:transparent;color:transparent;
  filter:drop-shadow(0 2px 6px rgba(168,135,78,.2));
  animation:shimmer 7s ease-in-out 1.6s infinite alternate;
}
@keyframes shimmer{from{background-position:0% 50%}to{background-position:100% 50%}}

.about-hero .lede{
  max-width:600px;font-size:1.06rem;font-weight:300;line-height:1.8;
  color:var(--ink-3);margin:0;letter-spacing:.005em;
  opacity:0;animation:capFade 1s var(--ease) .9s forwards;
}
@keyframes capRise{to{transform:none}}
@keyframes capFade{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:none}}

/* ===== SHARED TILT + GLARE ===== */
.about-page [data-tilt]{position:relative;transform-style:preserve-3d}
.about-page [data-tilt]::after{
  content:"";position:absolute;inset:0;border-radius:inherit;pointer-events:none;z-index:2;
  background:radial-gradient(420px circle at var(--mx,50%) var(--my,50%),rgba(255,255,255,.6),transparent 60%);
  opacity:0;transition:opacity .5s var(--ease);
}
.about-page [data-tilt]:hover::after{opacity:.65}
.values-grid .value-item[data-tilt]::after{
  background:radial-gradient(320px circle at var(--mx,50%) var(--my,50%),rgba(212,188,139,.26),transparent 62%);
}
.about-tilt [data-tilt]{
  transition-property:box-shadow,background,border-color,color,opacity !important;
  will-change:transform;
}

/* ============ EDITORIAL ============ */
.about-editorial{padding:clamp(80px,10vw,140px) 0}
.about-grid{
  display:grid;grid-template-columns:1fr 1.2fr;
  gap:clamp(40px,8vw,120px);align-items:start;
}

/* text panel — glass card with scroll-linked page-turn */
.about-grid-text{
  padding:clamp(32px,5vw,56px);
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
.about-grid-text::before{
  content:"";position:absolute;left:0;top:32px;bottom:32px;width:2px;
  border-radius:2px;
  background:linear-gradient(180deg,var(--gold),var(--gold-2));
  box-shadow:0 0 10px rgba(196,165,102,.5);
}
.about-grid h2{
  font-family:var(--serif);font-weight:300;
  font-size:clamp(2rem,4vw,3.2rem);
  line-height:1.08;letter-spacing:-.02em;margin:0 0 24px;
  padding-left:clamp(12px,2vw,24px);
}
.about-grid h2 em{
  font-style:italic;
  background:linear-gradient(135deg,var(--gold),var(--gold-2));
  -webkit-background-clip:text;background-clip:text;
  -webkit-text-fill-color:transparent;color:transparent;
}
.about-grid p{
  font-size:1.02rem;font-weight:300;line-height:1.85;color:var(--ink-3);
  margin:0 0 20px;padding-left:clamp(12px,2vw,24px);
}
.about-grid p:last-child{margin-bottom:0}

/* Image — 3D framed surface with glare */
.about-image-box{
  position:relative;aspect-ratio:4/5;border-radius:24px;overflow:hidden;
  background:linear-gradient(180deg,rgba(255,255,255,.7),rgba(247,244,236,.5));
  border:1px solid rgba(255,255,255,.8);
  box-shadow:var(--shadow-2);
  transform-style:preserve-3d;
  will-change:transform;
}
.about-image-box::before{
  content:"";position:absolute;inset:0;z-index:2;pointer-events:none;
  background:linear-gradient(150deg,rgba(255,255,255,.25) 0%,transparent 40%);
  border-radius:inherit;
}
.about-image-box::after{
  content:"";position:absolute;top:14px;right:14px;width:44px;height:44px;
  border-top:1px solid var(--gold);border-right:1px solid var(--gold);
  border-top-right-radius:8px;opacity:.7;z-index:2;pointer-events:none;
}
.about-image-box img{
  width:100%;height:100%;object-fit:cover;display:block;
  transition:transform .8s var(--ease), translate .6s var(--ease-out);
  translate:calc(var(--nx,0) * 6px) calc(var(--ny,0) * 4px);
}

.about-image-box .placeholder-text{
  font-family:var(--serif);font-size:1.2rem;color:var(--muted);
  font-style:italic;text-align:center;padding:20px;
}

/* ============ VALUES — dark slab ============ */
.about-values{
  padding:clamp(80px,10vw,140px) 0;
  position:relative;overflow:hidden;
}
.about-values::before{
  content:"";position:absolute;inset:0;
  background:
    radial-gradient(600px 300px at 80% 0%,rgba(196,165,102,.12),transparent 70%),
    linear-gradient(135deg,#14120E 0%,#1a1712 100%);
  z-index:-1;border-radius:32px;
  margin:0 clamp(12px,3vw,48px);
  box-shadow:
    0 1px 0 rgba(255,255,255,.05) inset,
    0 -1px 0 rgba(0,0,0,.4) inset,
    0 30px 80px -20px rgba(20,18,14,.4);
  transform:
    perspective(1600px)
    rotateX(calc(var(--p,0) * 3deg))
    scale(calc(1 - var(--p,0) * var(--p,0) * .03));
  will-change:transform;
}
.about-values .container{position:relative}
.about-values .kicker{color:var(--gold-3)}
.about-values .kicker::before,.about-values .kicker::after{background:var(--gold-3)}
.about-values h2{
  font-family:var(--serif);font-weight:300;
  font-size:clamp(2.4rem,5vw,4.4rem);line-height:1.05;
  margin:0 0 64px;color:var(--ivory);
  text-shadow:0 1px 0 rgba(0,0,0,.3);
}
.about-values h2 em{
  font-style:italic;
  background:linear-gradient(135deg,var(--gold) 0%,var(--gold-2) 50%,var(--gold-3) 100%);
  -webkit-background-clip:text;background-clip:text;
  -webkit-text-fill-color:transparent;color:transparent;
}

.values-grid{
  display:grid;grid-template-columns:repeat(3,1fr);gap:16px;
}
.value-item{
  padding:28px 26px 26px;
  border-radius:16px;
  background:linear-gradient(180deg,rgba(255,255,255,.06),rgba(255,255,255,.02));
  border:1px solid rgba(255,255,255,.08);
  box-shadow:
    0 1px 0 rgba(255,255,255,.08) inset,
    0 8px 20px -8px rgba(0,0,0,.4);
  position:relative;overflow:hidden;
}
.value-item::before{
  content:"";position:absolute;top:0;left:0;right:0;height:1px;
  background:linear-gradient(90deg,transparent,var(--gold),transparent);
  opacity:0;transition:opacity .4s;
}
.value-item:hover::before{opacity:1}

.value-item .num{
  font-family:var(--serif);font-style:italic;font-size:1.5rem;
  color:var(--gold-3);margin-bottom:16px;display:block;
  transition:translate .6s var(--ease-out);
  translate:calc(var(--nx,0) * 6px) 0;
}
.value-item h3{
  font-family:var(--serif);font-size:1.55rem;font-weight:400;
  margin:0 0 14px;color:var(--ivory);
  transition:color .4s,translate .6s var(--ease-out);
  translate:calc(var(--nx,0) * 10px) 0;
}
.value-item:hover h3{color:var(--gold-3)}
.value-item p{
  font-size:.94rem;font-weight:300;line-height:1.7;
  color:rgba(247,244,236,.68);margin:0;
  transition:translate .6s var(--ease-out);
  translate:calc(var(--nx,0) * 6px) 0;
}

/* ============ CLOSING CTA ============ */
.about-closing{padding:clamp(112px,14vw,200px) 0;text-align:center}
.about-closing .kicker{justify-content:center;margin-bottom:32px}
.about-closing .kicker::after{content:"";width:40px;height:1px;background:var(--gold)}
.about-closing h2{
  font-family:var(--serif);font-weight:300;
  font-size:clamp(2.6rem,6.5vw,5.8rem);line-height:1;letter-spacing:-.03em;
  margin:0 0 24px;color:var(--ink);
}
.about-closing h2 em{
  font-style:italic;
  background:linear-gradient(110deg,#8f6f3a,var(--gold),var(--gold-3),var(--gold),#8f6f3a);
  background-size:220% 100%;
  -webkit-background-clip:text;background-clip:text;
  -webkit-text-fill-color:transparent;color:transparent;
  animation:shimmer 7s ease-in-out infinite alternate;
}
.about-closing p{
  max-width:46ch;margin:0 auto 52px;color:var(--muted);
  font-weight:300;line-height:1.8;font-size:1rem;
}

/* 3D button */
.about-page .btn{
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
.about-page .btn span{position:relative;z-index:2}
.about-page .btn::before{
  content:"";position:absolute;inset:0;
  background:linear-gradient(135deg,var(--gold),var(--gold-2));
  opacity:0;transition:opacity .45s var(--ease);z-index:0;
}
.about-page .btn::after{
  content:"→";position:relative;z-index:2;font-size:1rem;
  transition:transform .45s var(--ease);
}
.about-page .btn:hover{transform:translateY(-3px);box-shadow:var(--shadow-gold)}
.about-page .btn:hover::before{opacity:1}
.about-page .btn:hover::after{transform:translateX(5px)}
.about-page .btn:active{transform:translateY(-1px) scale(.98)}

/* ===== REVEAL — 3D rise ===== */
.about-js .reveal{opacity:0;transform-origin:50% 100%}
.about-js .reveal.in{
  opacity:1;
  animation:revealIn 1.15s var(--ease-out) var(--d,0ms) backwards;
}
@keyframes revealIn{
  from{opacity:0;translate:0 46px;rotate:1 0 0 14deg;scale:.96}
  to{opacity:1;translate:0 0;rotate:1 0 0 0deg;scale:1}
}

/* ===== RESPONSIVE ===== */
@media (max-width:900px){
  .about-grid{grid-template-columns:1fr}
  .values-grid{grid-template-columns:1fr;gap:14px}
  .about-image-box{aspect-ratio:16/9;max-height:400px}
  .about-grid-text{padding:32px 24px}
  .about-grid-text::before{display:none}
  .about-grid h2,.about-grid p{padding-left:0}
}

/* ===== REDUCED MOTION ===== */
@media (prefers-reduced-motion:reduce){
  .about-page *,.about-page *::before,.about-page *::after{
    animation:none !important;transition:none !important;
  }
  .about-hero h1 .line > span,.about-hero .eyebrow,.about-hero .lede{transform:none;opacity:1}
  .about-js .reveal{opacity:1}
  .about-js .kicker.reveal::before,.about-js .kicker.reveal::after{width:40px}
  .about-grid-text,.about-values::before{transform:none}
  .about-stage,.about-orb,.ap-progress,.ap-glow{display:none}
}
</style>

<!-- Reading Progress Bar -->
<div class="ap-progress" id="aboutProgress"></div>

<!-- Cursor Glow -->
<div class="ap-glow" id="aboutCursorGlow"></div>

<main class="about-page">

  <!-- HERO -->
  <section class="about-hero">
    <div class="about-orb a1"></div>
    <div class="about-orb a2"></div>
    <div class="about-orb a3"></div>

    <!-- 3D scene (glass cube, matches front-page) -->
    <div class="about-stage" aria-hidden="true">
      <div class="about-scene">
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
      <p class="eyebrow">Our Story <span class="dot"></span> Since 2025</p>
      <h1>
        <span class="line"><span>Driven by <em>craft,</em></span></span>
        <span class="line"><span>guided by purpose.</span></span>
      </h1>
      <p class="lede">
        We are a collective of aspiring developers building digital experiences
        from the ground up. This is our final project journey — where code meets design.
      </p>
    </div>
  </section>

  <!-- EDITORIAL -->
  <section class="about-editorial">
    <div class="container">
      <div class="about-grid">

        <div class="about-grid-text reveal" data-scroll3d>
          <h2>The people behind the <em>pixels.</em></h2>
          <p>
            Quadro started as a simple idea: build a space where students can showcase
            their growth without the noise. Instead of chasing trends, we focused on the
            fundamentals — clean code, thoughtful design, and systems that actually work.
          </p>
          <p>
            Every project in this portfolio represents a step forward. From the first
            HTML tag to complex PHP integrations, we've learned that real progress
            happens in the details. We embrace the process, not just the outcome.
          </p>
        </div>

        <div class="about-image-box reveal" data-tilt="6">
          <?php
            echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/groupdp.jpg') . '" alt="OurSpace Team">';
          ?>
        </div>

      </div>
    </div>
  </section>

  <!-- VALUES -->
  <section class="about-values" data-scroll3d>
    <div class="container">
      <p class="kicker reveal">Our Foundation</p>
      <h2 class="reveal">What <em>drives</em> us forward.</h2>

      <div class="values-grid">
        <div class="value-item reveal" data-tilt="7">
          <span class="num">01</span>
          <h3>Intention</h3>
          <p>We don't build just to build. Every line of code and every pixel is placed with purpose.</p>
        </div>
        <div class="value-item reveal" data-tilt="7">
          <span class="num">02</span>
          <h3>Collaboration</h3>
          <p>Great things aren't built alone. We learn from each other, review each other's work, and grow together.</p>
        </div>
        <div class="value-item reveal" data-tilt="7">
          <span class="num">03</span>
          <h3>Iteration</h3>
          <p>Version 1 is never the final version. We ship, we test, we refine, and we ship again.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CLOSING CTA -->
  <section class="about-closing">
    <div class="container">
      <p class="kicker reveal">Let's connect</p>
      <h2 class="reveal">See what we've <em>built.</em></h2>
      <p class="reveal">A team of creative minds turning bold ideas into meaningful digital experiences.</p>
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
  root.classList.add('about-js');

  var reduce  = matchMedia('(prefers-reduced-motion: reduce)').matches;
  var fine    = matchMedia('(hover: hover) and (pointer: fine)').matches;
  var desktop = matchMedia('(min-width: 769px)').matches;
  var rich    = fine && desktop && !reduce;
  if (rich) root.classList.add('about-tilt');

  var $  = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var lerp  = function (a, b, t) { return a + (b - a) * t; };
  var clamp = function (v, a, b) { return Math.min(b, Math.max(a, v)); };

  /* 1. Reveal — staggered per batch via --d */
  var io = new IntersectionObserver(function (entries) {
    var shown = entries.filter(function (e) { return e.isIntersecting; });
    shown.forEach(function (entry, i) {
      entry.target.style.setProperty('--d', (reduce ? 0 : i * 90) + 'ms');
      entry.target.classList.add('in');
      io.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
  $$('.reveal').forEach(function (el) { io.observe(el); });

  /* 2. Scroll: progress bar, hero parallax (--sy), scroll-linked 3D (--p) */
  var bar   = $('#aboutProgress');
  var hero  = $('.about-hero');
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

  /* 3. Smooth pointer loop: cursor glow + hero scene parallax */
  if (rich) {
    var glow = $('#aboutCursorGlow');
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

  /* 4. Magnetic buttons */
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

  /* 5. 3D tilt + glare + inner parallax, lerped per element */
  if (rich) {
    $$('[data-tilt]').forEach(function (el) {
      var max = parseFloat(el.getAttribute('data-tilt')) || 6;
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
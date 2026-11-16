<?php
/**
 * Template: Home (front-page.php)
 * Capstone Portfolio — Ultra 3D Aesthetic Edition v2
 * (3D hero scene, scroll-linked depth, tilt + glare cards, smooth reveals, 3D flipbook)
 */

add_action('wp_head', function () {
  echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
  echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
  echo '<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">' . "\n";
});

get_header(); ?>

<style>
/* ===== CAPSTONE PORTFOLIO — Ultra 3D Edition v2 ===== */
.cap-home{
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
.cap-home *,.cap-home *::before,.cap-home *::after{box-sizing:border-box}
.cap-home a{color:inherit;text-decoration:none}
.cap-home :focus-visible{outline:2px solid var(--gold);outline-offset:4px}
.cap-home .container{max-width:1280px;margin:0 auto;padding:0 clamp(28px,7vw,112px)}

/* Gives children real depth when they rotate in 3D */
.cap-home .container,
.cap-hero .meta,
.cap-skill-grid,
.contact-cards{perspective:1400px}

/* Ambient background stage */
.cap-home::before{
  content:"";position:fixed;inset:0;pointer-events:none;z-index:0;
  background:
    radial-gradient(600px 400px at 15% 5%, rgba(196,165,102,.10), transparent 70%),
    radial-gradient(500px 400px at 85% 10%, rgba(212,188,139,.10), transparent 70%),
    radial-gradient(700px 500px at 50% 100%, rgba(196,165,102,.06), transparent 70%);
}
.cap-home > section, .cap-home > footer, .cap-home > .cap-marquee{position:relative;z-index:1}
.cap-home section[id]{scroll-margin-top:90px}

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
}
@media (max-width:768px),(hover:none){.cursor-glow{display:none}}

/* ===== KICKER ===== */
.cap-home .kicker{
  font-family:var(--sans);font-size:.7rem;font-weight:500;letter-spacing:.24em;
  text-transform:uppercase;color:var(--gold);margin:0 0 24px;
  display:inline-flex;align-items:center;gap:16px;
  padding:8px 16px 8px 0;border-radius:2px;
}
.cap-home .kicker::before{content:"";width:40px;height:1px;background:var(--gold)}
/* kicker rule draws itself in */
.cap-js .kicker.reveal::before,
.cap-js .kicker.reveal::after{width:0;transition:width 1.1s var(--ease-out) .35s}
.cap-js .kicker.reveal.in::before,
.cap-js .kicker.reveal.in::after{width:40px}

/* ===== HERO ===== */
.cap-hero{
  position:relative;
  padding:clamp(180px,20vw,260px) 0 clamp(96px,12vw,160px);
  overflow:hidden;
}
.cap-hero .container{
  position:relative;z-index:2;
  translate:0 calc(var(--sy,0) * .1px);
  opacity:calc(1 - var(--sy,0) * .0006);
}

/* Floating orbs — drift + pointer/scroll parallax (separate `translate` prop) */
.hero-orb{
  position:absolute;border-radius:50%;pointer-events:none;z-index:1;
  background:radial-gradient(circle at 35% 30%,rgba(255,255,255,.45),rgba(196,165,102,.35) 40%,transparent 72%);
  filter:blur(2px);
  animation:floatOrb 22s infinite ease-in-out;
  translate:
    calc(var(--px,0) * var(--depth,30) * 1px)
    calc(var(--py,0) * var(--depth,30) * 1px + var(--sy,0) * var(--sdepth,-.08) * 1px);
  will-change:transform,translate;
}
.orb-1{width:260px;height:260px;top:15%;right:12%;--depth:-46;--sdepth:-.14}
.orb-2{width:140px;height:140px;bottom:28%;right:32%;--depth:64;--sdepth:-.06;animation-delay:6s}
.orb-3{width:180px;height:180px;top:48%;left:4%;--depth:-28;--sdepth:-.1;animation-delay:12s}
@keyframes floatOrb{
  0%,100%{transform:translate(0,0) scale(1);opacity:.35}
  50%{transform:translate(30px,-40px) scale(1.15);opacity:.65}
}

/* ----- 3D hero scene ----- */
.hero-stage{
  position:absolute;right:clamp(2%,6vw,9%);top:24%;
  width:420px;height:420px;z-index:1;
  perspective:1100px;pointer-events:none;
  translate:0 calc(var(--sy,0) * -.12px);
  opacity:0;animation:stageIn 1.6s var(--ease-out) .6s forwards;
}
@keyframes stageIn{from{opacity:0;scale:.82}to{opacity:1;scale:1}}
.hero-scene{
  position:absolute;inset:0;transform-style:preserve-3d;
  transform:
    rotateX(calc(var(--py,0) * -20deg + 16deg))
    rotateY(calc(var(--px,0) * 28deg - 8deg));
}
.hero-scene > *{position:absolute;left:50%;top:50%;transform-style:preserve-3d}

/* glossy core sphere */
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

/* generic cube (6 faces) */
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

/* orbit rings with a satellite dot */
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

/* small orbiting shards */
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

/* soft ground shadow */
.hs-shadow{
  width:220px;height:40px;margin:170px 0 0 -110px;border-radius:50%;
  background:radial-gradient(ellipse,rgba(20,18,14,.22),transparent 70%);
  filter:blur(8px);transform:rotateX(90deg);animation:shadowPulse 7s ease-in-out infinite;
}
@keyframes shadowPulse{0%,100%{scale:1;opacity:.9}50%{scale:.78;opacity:.55}}
@media (max-width:1100px){.hero-stage{display:none}}

/* Eyebrow — pill badge */
.cap-hero .eyebrow{
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
.cap-hero .eyebrow .dot{
  width:6px;height:6px;border-radius:50%;background:var(--gold);
  box-shadow:0 0 0 4px rgba(168,135,78,.15);
  animation:dotPulse 2.4s ease-in-out infinite;
}
@keyframes dotPulse{
  0%,100%{box-shadow:0 0 0 4px rgba(168,135,78,.15)}
  50%{box-shadow:0 0 0 9px rgba(168,135,78,0)}
}

/* H1 — 3D flip-up per line */
.cap-hero h1{
  font-family:var(--serif);font-weight:300;letter-spacing:-.035em;
  font-size:clamp(3.2rem,8.5vw,7.4rem);line-height:.94;margin:0 0 40px;
  max-width:14ch;color:var(--ink);
  text-shadow:0 1px 0 rgba(255,255,255,.7),0 2px 8px rgba(20,18,14,.05);
}
.cap-hero h1 .line{
  display:block;overflow:hidden;padding:.06em 0 .12em;margin-bottom:-.12em;
  perspective:800px;
}
.cap-hero h1 .line > span{
  display:inline-block;transform:translateY(110%) rotateX(-60deg);
  transform-origin:0 100%;
  animation:capRise 1.3s var(--ease-out) forwards;
}
.cap-hero h1 .line:nth-child(1) > span{animation-delay:.25s}
.cap-hero h1 .line:nth-child(2) > span{animation-delay:.42s}
.cap-hero h1 .line:nth-child(3) > span{animation-delay:.59s}
.cap-hero h1 em{
  font-style:italic;font-weight:400;
  background:linear-gradient(110deg,#8f6f3a 0%,var(--gold) 25%,var(--gold-3) 50%,var(--gold) 75%,#8f6f3a 100%);
  background-size:220% 100%;
  -webkit-background-clip:text;background-clip:text;
  -webkit-text-fill-color:transparent;color:transparent;
  filter:drop-shadow(0 2px 6px rgba(168,135,78,.2));
  animation:shimmer 7s ease-in-out 1.6s infinite alternate;
}
@keyframes shimmer{from{background-position:0% 50%}to{background-position:100% 50%}}

.cap-hero .lede{
  max-width:540px;font-size:1.06rem;font-weight:300;line-height:1.8;
  color:var(--ink-3);margin:0 0 48px;letter-spacing:.005em;
  opacity:0;animation:capFade 1s var(--ease) .9s forwards;
}
.cap-hero .cta-row{
  display:flex;flex-wrap:wrap;gap:28px;align-items:center;
  opacity:0;animation:capFade 1s var(--ease) 1.05s forwards;
}

@keyframes capRise{to{transform:none}}
@keyframes capFade{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:none}}

/* ===== BUTTONS — 3D + magnetic ===== */
.cap-home .btn{
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
.cap-home .btn span{position:relative;z-index:2}
.cap-home .btn::before{
  content:"";position:absolute;inset:0;
  background:linear-gradient(135deg,var(--gold),var(--gold-2));
  opacity:0;transition:opacity .45s var(--ease);z-index:0;
}
.cap-home .btn::after{
  content:"→";position:relative;z-index:2;font-size:1rem;
  transition:transform .45s var(--ease);
}
.cap-home .btn:hover{transform:translateY(-3px);box-shadow:var(--shadow-gold)}
.cap-home .btn:hover::before{opacity:1}
.cap-home .btn:hover::after{transform:translateX(5px)}
.cap-home .btn:active{transform:translateY(-1px) scale(.98)}

.cap-home .btn-ghost{
  position:relative;display:inline-flex;align-items:center;gap:12px;
  font-family:var(--sans);font-weight:500;font-size:.76rem;
  letter-spacing:.16em;text-transform:uppercase;
  color:var(--ink);padding:14px 22px;border-radius:12px;
  background:linear-gradient(180deg,rgba(255,255,255,.9),rgba(247,244,236,.7));
  border:1px solid rgba(168,135,78,.2);
  box-shadow:0 1px 0 rgba(255,255,255,.95) inset,0 4px 12px -4px rgba(20,18,14,.1);
  transition:all .45s var(--ease-out);cursor:pointer;
}
.cap-home .btn-ghost:hover{
  color:var(--gold);transform:translateY(-2px);
  border-color:rgba(168,135,78,.45);
  box-shadow:0 1px 0 rgba(255,255,255,.95) inset,0 8px 20px -6px rgba(168,135,78,.3);
}

/* ===== SHARED TILT + GLARE (driven by JS vars) ===== */
.cap-home [data-tilt]{position:relative;transform-style:preserve-3d}
.cap-home [data-tilt]::after{
  content:"";position:absolute;inset:0;border-radius:inherit;pointer-events:none;z-index:2;
  background:radial-gradient(420px circle at var(--mx,50%) var(--my,50%),rgba(255,255,255,.6),transparent 60%);
  opacity:0;transition:opacity .5s var(--ease);
}
.cap-home [data-tilt]:hover::after{opacity:.65}
.cap-skill-grid li[data-tilt]::after{
  background:radial-gradient(320px circle at var(--mx,50%) var(--my,50%),rgba(212,188,139,.26),transparent 62%);
}
/* when JS tilt is active it owns `transform`; keep other transitions smooth */
.cap-tilt [data-tilt]{
  transition-property:box-shadow,background,border-color,color,opacity !important;
  will-change:transform;
}

/* ===== HERO META — 3D tiles ===== */
.cap-hero .meta{
  margin-top:clamp(72px,9vw,120px);
  display:grid;grid-template-columns:repeat(4,1fr);gap:16px;
  opacity:0;animation:capFade 1s var(--ease) 1.2s forwards;
}
.cap-hero .meta > div{
  position:relative;padding:20px 22px;border-radius:14px;
  background:linear-gradient(180deg,rgba(255,255,255,.9),rgba(247,244,236,.65));
  border:1px solid rgba(255,255,255,.7);
  box-shadow:var(--shadow-1);
  display:flex;flex-direction:column;gap:8px;
  transition:transform .5s var(--ease-out),box-shadow .5s var(--ease);
}
.cap-hero .meta > div::before{
  content:"";position:absolute;left:0;top:18px;bottom:18px;width:2px;border-radius:2px;
  background:linear-gradient(180deg,var(--gold),var(--gold-2));
  opacity:.85;box-shadow:0 0 8px rgba(196,165,102,.5);
}
.cap-hero .meta > div:hover{transform:translateY(-4px);box-shadow:var(--shadow-2)}
.cap-hero .meta dt{
  font-size:.66rem;font-weight:600;letter-spacing:.2em;text-transform:uppercase;
  color:var(--muted-2);display:flex;align-items:center;gap:8px;padding-left:12px;
}
.cap-hero .meta dt svg{width:14px;height:14px;fill:var(--gold)}
.cap-hero .meta dd{
  font-family:var(--serif);font-size:1.15rem;font-weight:400;
  letter-spacing:-.01em;color:var(--ink);margin:0;padding-left:12px;
}

/* ===== MARQUEE ===== */
.cap-marquee{
  overflow:hidden;padding:26px 0;
  border-block:1px solid var(--line);
  background:linear-gradient(180deg,rgba(255,255,255,.5),rgba(247,244,236,.2));
  -webkit-mask-image:linear-gradient(90deg,transparent,#000 10%,#000 90%,transparent);
          mask-image:linear-gradient(90deg,transparent,#000 10%,#000 90%,transparent);
}
.cap-marquee .track{display:flex;width:max-content;animation:marquee 38s linear infinite}
.cap-marquee:hover .track{animation-play-state:paused}
.cap-marquee .group{display:flex;align-items:center;gap:44px;padding-right:44px}
.cap-marquee .group span{
  font-family:var(--serif);font-style:italic;font-weight:300;
  font-size:clamp(1.4rem,2.6vw,2.1rem);color:var(--ink-3);white-space:nowrap;
  transition:color .4s var(--ease);
}
.cap-marquee .group span:hover{color:var(--gold)}
.cap-marquee .group i{
  width:8px;height:8px;rotate:45deg;flex-shrink:0;
  background:linear-gradient(135deg,var(--gold),var(--gold-3));
  box-shadow:0 0 10px rgba(196,165,102,.6);
}
@keyframes marquee{to{transform:translateX(-50%)}}

/* ===== ABOUT — 3D FLIPBOOK ===== */
.cap-book{padding:clamp(80px,11vw,150px) 0;position:relative}
.cap-book .cb-head{text-align:center;margin:0 auto clamp(40px,6vw,72px);max-width:640px}
.cap-book .cb-head .kicker{justify-content:center;margin-bottom:20px}
.cap-book .cb-head .kicker::after{content:"";width:40px;height:1px;background:var(--gold)}
.cap-book .cb-head h2{
  font-family:var(--serif);font-weight:300;font-size:clamp(2.2rem,4.6vw,3.8rem);
  line-height:1.04;letter-spacing:-.025em;margin:0 0 16px;
}
.cap-book .cb-head h2 em{
  font-style:italic;
  background:linear-gradient(135deg,#8f6f3a,var(--gold),var(--gold-2));
  -webkit-background-clip:text;background-clip:text;
  -webkit-text-fill-color:transparent;color:transparent;
}
.cap-book .cb-head p{color:var(--muted);font-weight:300;line-height:1.75;margin:0;font-size:.98rem}

.book-stage{display:flex;flex-direction:column;align-items:center;gap:44px;padding:30px 0 10px;overflow:hidden}

.book-wrap{
  --pw:clamp(150px,34vw,340px);           /* width of ONE page */
  position:relative;flex-shrink:0;
  width:calc(var(--pw) * 2);height:calc(var(--pw) * 1.4);
  font-size:calc(var(--pw) / 22);          /* everything inside scales in em */
  perspective:2400px;outline:none;
}
.book-wrap:focus-visible{outline:2px solid var(--gold);outline-offset:14px;border-radius:12px}

.book{
  position:absolute;inset:0;transform-style:preserve-3d;cursor:pointer;
  transform:
    translateX(calc(var(--pw) * -.5))
    rotateX(calc(16deg + var(--by,0) * -8deg))
    rotateY(calc(-14deg + var(--bx,0) * 10deg));
  transition:transform 1.4s var(--ease-out);
}
.book-wrap.open .book{
  cursor:default;
  transform:
    translateX(0)
    rotateX(calc(12deg + var(--by,0) * -8deg))
    rotateY(calc(var(--bx,0) * 10deg));
}
.book-shadow{
  position:absolute;left:50%;bottom:-7%;width:calc(var(--pw) * 1.9);height:11%;
  margin-left:calc(var(--pw) * -.95);
  background:radial-gradient(ellipse,rgba(20,18,14,.4),transparent 70%);
  filter:blur(14px);
  transform:translateX(calc(var(--pw) * -.5)) scale(.55);
  transition:transform 1.4s var(--ease-out);
}
.book-wrap.open .book-shadow{transform:none}

/* a leaf = one sheet of paper with a front and a back */
.leaf{
  position:absolute;left:50%;top:0;width:var(--pw);height:100%;
  transform-origin:0 50%;transform-style:preserve-3d;
  transition:transform 1.5s cubic-bezier(.65,.05,.3,1);
}
.leaf.flip{transform:rotateY(-180deg)}

.face{
  position:absolute;inset:0;overflow:hidden;
  backface-visibility:hidden;-webkit-backface-visibility:hidden;
  padding:2.4em 2em 1.8em;display:flex;flex-direction:column;
  background:linear-gradient(135deg,#fffdf7,#f3eddd);color:var(--ink);
}
.face.f{border-radius:0 .7em .7em 0;box-shadow:inset -1px 0 0 rgba(168,135,78,.22),0 .1em .4em rgba(20,18,14,.12)}
.face.b{transform:rotateY(180deg);border-radius:.7em 0 0 .7em;box-shadow:inset 1px 0 0 rgba(168,135,78,.22),0 .1em .4em rgba(20,18,14,.12)}
/* spine shading */
.face.f::before,.face.b::before{content:"";position:absolute;inset:0;pointer-events:none;z-index:3}
.face.f::before{background:linear-gradient(90deg,rgba(60,40,10,.24),rgba(60,40,10,.06) 7%,transparent 18%)}
.face.b::before{background:linear-gradient(270deg,rgba(60,40,10,.24),rgba(60,40,10,.06) 7%,transparent 18%)}

/* cover + back cover */
.face.cover{
  background:
    radial-gradient(120% 70% at 20% 0%,rgba(196,165,102,.22),transparent 60%),
    linear-gradient(135deg,#1c1913,#2e2a22 60%,#14120e);
  color:var(--gold-3);align-items:center;justify-content:center;text-align:center;
  border:1px solid rgba(196,165,102,.35);
}
.face.cover .frame{position:absolute;inset:1.1em;border:1px solid rgba(196,165,102,.45);border-radius:.4em;pointer-events:none}
.face.cover .frame::after{content:"";position:absolute;inset:.35em;border:1px solid rgba(196,165,102,.2);border-radius:.25em}
.cover .c-k{font-size:.62em;letter-spacing:.34em;text-transform:uppercase;font-weight:600;color:var(--gold-2)}
.cover h3{font-family:var(--serif);font-weight:300;font-size:2.9em;line-height:1;letter-spacing:-.02em;margin:.5em 0 .35em;color:var(--ivory)}
.cover h3 em{font-style:italic;color:var(--gold-2);background:none;-webkit-text-fill-color:currentColor}
.cover .gem{width:.7em;height:.7em;rotate:45deg;margin:1.1em auto;background:linear-gradient(135deg,var(--gold),var(--gold-3));box-shadow:0 0 1.2em rgba(196,165,102,.7)}
.cover .c-y{font-family:var(--serif);font-style:italic;font-size:1.05em;color:rgba(247,244,236,.7)}
.cover .hint{
  position:absolute;left:0;right:0;bottom:2.6em;font-size:.6em;letter-spacing:.28em;
  text-transform:uppercase;color:var(--gold-2);animation:hintPulse 2.4s ease-in-out infinite;
}
@keyframes hintPulse{0%,100%{opacity:.35}50%{opacity:1}}

/* page typography */
.pg-k{font-size:.62em;letter-spacing:.26em;text-transform:uppercase;font-weight:600;color:var(--gold);display:flex;align-items:center;gap:1em}
.pg-k::before{content:"";width:2.6em;height:1px;background:var(--gold)}
.face h3{font-family:var(--serif);font-weight:300;font-size:2.15em;line-height:1.06;letter-spacing:-.02em;margin:.6em 0 .55em}
.face h3 em{font-style:italic;background:linear-gradient(135deg,var(--gold),var(--gold-2));-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;color:transparent}
.face p{font-size:.92em;line-height:1.75;font-weight:300;color:var(--ink-3);margin:0 0 .8em}
.face p.quote{font-family:var(--serif);font-size:1.3em;line-height:1.3;color:var(--ink);letter-spacing:-.01em}
.pg-no{margin-top:auto;text-align:center;font-family:var(--serif);font-style:italic;font-size:.85em;color:var(--gold)}
.pg-stats{display:grid;grid-template-columns:1fr 1fr;gap:.7em;margin:.4em 0 1em}
.pg-stats div{padding:.8em .9em;border-radius:.6em;background:rgba(168,135,78,.08);border:1px solid rgba(168,135,78,.18)}
.pg-stats b{display:block;font-family:var(--serif);font-weight:400;font-size:1.9em;line-height:1;color:var(--ink)}
.pg-stats span{font-size:.62em;letter-spacing:.14em;text-transform:uppercase;color:var(--muted)}
.pg-tags{list-style:none;margin:.3em 0 1em;padding:0;display:flex;flex-wrap:wrap;gap:.5em}
.pg-tags li{font-size:.72em;letter-spacing:.08em;padding:.45em .9em;border-radius:99em;border:1px solid rgba(168,135,78,.35);color:var(--ink-2);background:rgba(255,255,255,.6)}
.pg-links{display:flex;flex-direction:column;gap:.6em;margin-top:.3em}
.pg-links a{
  display:flex;justify-content:space-between;align-items:center;padding:.85em 1em;border-radius:.6em;
  font-family:var(--serif);font-size:1.05em;background:rgba(168,135,78,.08);border:1px solid rgba(168,135,78,.2);
  transition:background .3s,color .3s,transform .3s;
}
.pg-links a:hover{background:var(--ink);color:var(--ivory);transform:translateX(.25em)}
.pg-time{list-style:none;margin:.2em 0 1em;padding:0 0 0 1.1em;border-left:1px solid rgba(168,135,78,.4)}
.pg-time li{position:relative;padding:0 0 .9em .4em;font-size:.88em;line-height:1.5;color:var(--ink-3);font-weight:300}
.pg-time li::before{content:"";position:absolute;left:-1.5em;top:.35em;width:.6em;height:.6em;border-radius:50%;background:var(--gold);box-shadow:0 0 0 .25em rgba(168,135,78,.18)}
.pg-time b{font-family:var(--serif);font-weight:400;color:var(--ink);display:block}
.face.end{align-items:center;justify-content:center;text-align:center}
.face.end .pg-k{justify-content:center}
.face.end .pg-k::before{display:none}
.face.end .btn{margin-top:.8em;font-size:.72em;padding:1.3em 2.2em}

/* controls */
.bk-ctrl{display:flex;align-items:center;justify-content:center;gap:18px;flex-wrap:wrap;min-height:58px}
.book-stage[data-open="0"] .bk-nav{display:none}
.book-stage[data-open="1"] .bk-start{display:none}
.bk-nav{display:flex;align-items:center;gap:18px;flex-wrap:wrap;justify-content:center}
.bk-btn{
  display:grid;place-items:center;width:46px;height:46px;border-radius:50%;cursor:pointer;
  font-size:1.05rem;color:var(--ink);font-family:var(--sans);
  background:linear-gradient(180deg,rgba(255,255,255,.9),rgba(247,244,236,.7));
  border:1px solid rgba(168,135,78,.25);
  box-shadow:0 1px 0 rgba(255,255,255,.95) inset,0 4px 10px -4px rgba(20,18,14,.15);
  transition:all .35s var(--ease-out);
}
.bk-btn:hover:not(:disabled){background:var(--ink);color:var(--ivory);transform:translateY(-2px)}
.bk-btn:disabled{opacity:.35;cursor:default}
.bk-info{display:flex;flex-direction:column;align-items:center;gap:8px;min-width:120px}
.bk-label{font-size:.7rem;letter-spacing:.2em;text-transform:uppercase;color:var(--muted);font-weight:500}
.bk-dots{display:flex;gap:8px}
.bk-dots i{width:8px;height:8px;border-radius:50%;background:rgba(168,135,78,.25);transition:all .4s var(--ease)}
.bk-dots i.on{background:var(--gold);width:24px;border-radius:99px}

@media (max-width:700px){
  .book-wrap{--pw:44vw}
  .face{padding:1.5em 1.2em 1.2em}
  .face h3{font-size:1.65em}
  .face .mob-hide{display:none}
  .face p.quote{font-size:1.05em}
  .pg-stats b{font-size:1.5em}
}

/* ===== PORTALS — 3D cards ===== */
.cap-portals{padding:clamp(96px,13vw,180px) 0}
.cap-portals .section-head{
  display:grid;grid-template-columns:1fr auto;align-items:end;
  gap:40px;margin-bottom:clamp(48px,7vw,96px);
}
.cap-portals h2{
  font-family:var(--serif);font-weight:300;
  font-size:clamp(2.4rem,5vw,4.2rem);line-height:1;letter-spacing:-.025em;margin:0;
}
.cap-portals h2 em{
  font-style:italic;
  background:linear-gradient(135deg,#8f6f3a,var(--gold),var(--gold-2));
  -webkit-background-clip:text;background-clip:text;
  -webkit-text-fill-color:transparent;color:transparent;
}
.cap-portals .section-head p{
  color:var(--muted);font-weight:300;line-height:1.7;max-width:32ch;
  margin:0;font-size:.92rem;text-align:right;
}

.cap-portal{
  position:relative;
  display:grid;grid-template-columns:auto 1.4fr 1fr auto;
  align-items:center;gap:clamp(24px,4vw,64px);
  padding:clamp(32px,4.5vw,56px) clamp(24px,3vw,40px);
  margin-bottom:16px;border-radius:20px;
  background:linear-gradient(180deg,rgba(255,255,255,.85),rgba(247,244,236,.6));
  border:1px solid rgba(255,255,255,.7);
  box-shadow:var(--shadow-1);
  transition:transform .5s var(--ease-out),box-shadow .5s var(--ease),background .5s var(--ease);
  overflow:hidden;
}
.cap-portal::before{
  content:"";position:absolute;inset:0;
  background:linear-gradient(135deg,rgba(196,165,102,.12),transparent 60%);
  opacity:0;transition:opacity .5s var(--ease);pointer-events:none;border-radius:inherit;
}
.cap-portal:hover,.cap-portal:focus-visible{transform:translateY(-4px);box-shadow:var(--shadow-2)}
.cap-portal:hover::before,.cap-portal:focus-visible::before{opacity:1}
.cap-portal > *{position:relative;z-index:1}
/* inner layers drift against the tilt for parallax depth */
.cap-portal .num,.cap-portal h3,.cap-portal p,.cap-portal .go{
  transition:translate .6s var(--ease-out),color .4s var(--ease),background .5s var(--ease),transform .5s var(--ease),box-shadow .5s var(--ease),border-color .5s var(--ease);
}
.cap-portal .num{translate:calc(var(--nx,0) * 6px) calc(var(--ny,0) * 4px)}
.cap-portal h3{translate:calc(var(--nx,0) * 14px) calc(var(--ny,0) * 8px)}
.cap-portal p{translate:calc(var(--nx,0) * 8px) calc(var(--ny,0) * 5px)}
.cap-portal .go{translate:calc(var(--nx,0) * -20px) calc(var(--ny,0) * -12px)}

.cap-portal .num{
  font-family:var(--serif);font-style:italic;font-weight:400;
  font-size:1rem;color:var(--gold);letter-spacing:.02em;
}
.cap-portal h3{
  font-family:var(--serif);font-weight:300;
  font-size:clamp(1.9rem,3.6vw,3rem);line-height:1.05;letter-spacing:-.02em;margin:0;
}
.cap-portal:hover h3{color:var(--gold)}
.cap-portal p{
  font-size:.94rem;font-weight:300;line-height:1.7;color:var(--muted);max-width:34ch;margin:0;
}
.cap-portal .go{
  display:grid;place-items:center;width:56px;height:56px;border-radius:50%;
  background:linear-gradient(180deg,rgba(255,255,255,.9),rgba(247,244,236,.7));
  border:1px solid rgba(168,135,78,.2);
  box-shadow:0 1px 0 rgba(255,255,255,.95) inset,0 4px 10px -4px rgba(20,18,14,.12);
  flex-shrink:0;
}
.cap-portal .go svg{
  width:18px;height:18px;stroke:var(--ink);fill:none;stroke-width:1.5;
  transition:transform .5s var(--ease),stroke .3s;
}
.cap-portal:hover .go{
  background:linear-gradient(135deg,var(--ink),var(--ink-2));
  border-color:var(--ink);
  transform:rotate(-8deg) scale(1.08);
  box-shadow:0 1px 0 rgba(255,255,255,.1) inset,0 10px 24px -6px rgba(20,18,14,.35);
}
.cap-portal:hover .go svg{stroke:var(--ivory);transform:rotate(-45deg)}

/* ===== SKILLS ===== */
.cap-skills{padding:clamp(96px,13vw,180px) 0;position:relative;overflow:hidden}
.cap-skills::before{
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
  /* scroll-linked: panel leans in and settles as it reaches centre */
  transform:
    perspective(1600px)
    rotateX(calc(var(--p,0) * 3deg))
    scale(calc(1 - var(--p,0) * var(--p,0) * .035));
  will-change:transform;
}
.cap-skills .container{position:relative}
.cap-skills .head{
  display:grid;grid-template-columns:1.4fr 1fr;gap:64px;
  margin-bottom:clamp(48px,7vw,96px);align-items:end;
}
.cap-skills .kicker{color:var(--gold-3)}
.cap-skills .kicker::before,.cap-skills .kicker::after{background:var(--gold-3)}
.cap-skills h2{
  font-family:var(--serif);font-weight:300;
  font-size:clamp(2.4rem,5vw,4.4rem);line-height:1.02;letter-spacing:-.025em;
  margin:0;color:var(--ivory);text-shadow:0 1px 0 rgba(0,0,0,.3);
}
.cap-skills h2 em{
  font-style:italic;
  background:linear-gradient(135deg,var(--gold) 0%,var(--gold-2) 50%,var(--gold-3) 100%);
  -webkit-background-clip:text;background-clip:text;
  -webkit-text-fill-color:transparent;color:transparent;
}
.cap-skills .head p{
  color:rgba(247,244,236,.7);font-weight:300;line-height:1.8;
  max-width:40ch;margin:0;justify-self:end;font-size:.98rem;
}
.cap-skill-grid{
  list-style:none;margin:0;padding:0;
  display:grid;grid-template-columns:repeat(2,1fr);gap:14px;
}
.cap-skill-grid li{
  position:relative;
  display:flex;justify-content:space-between;align-items:baseline;gap:24px;
  padding:22px 26px;border-radius:14px;
  background:linear-gradient(180deg,rgba(255,255,255,.06),rgba(255,255,255,.02));
  border:1px solid rgba(255,255,255,.08);
  box-shadow:0 1px 0 rgba(255,255,255,.08) inset,0 8px 20px -8px rgba(0,0,0,.4);
  transition:transform .5s var(--ease-out),border-color .4s,background .4s,box-shadow .5s var(--ease);
}
.cap-skill-grid li:hover{
  transform:translateY(-3px);
  border-color:rgba(196,165,102,.4);
  background:linear-gradient(180deg,rgba(196,165,102,.12),rgba(196,165,102,.04));
  box-shadow:0 1px 0 rgba(255,255,255,.1) inset,0 16px 40px -10px rgba(168,135,78,.35);
}
.cap-skill-grid b{
  font-family:var(--serif);font-weight:400;font-size:1.45rem;
  letter-spacing:-.01em;transition:color .4s,translate .6s var(--ease-out);color:var(--ivory);
  translate:calc(var(--nx,0) * 8px) 0;
}
.cap-skill-grid li:hover b{color:var(--gold-3)}
.cap-skill-grid span{
  font-size:.72rem;font-weight:400;letter-spacing:.14em;text-transform:uppercase;
  color:rgba(247,244,236,.5);text-align:right;
  transition:translate .6s var(--ease-out);
  translate:calc(var(--nx,0) * -8px) 0;
}

/* ===== CLOSING CTA ===== */
.cap-closing{padding:clamp(112px,14vw,200px) 0;text-align:center}
.cap-closing .kicker{justify-content:center;margin-bottom:32px}
.cap-closing .kicker::after{content:"";width:40px;height:1px;background:var(--gold)}
.cap-closing h2{
  font-family:var(--serif);font-weight:300;
  font-size:clamp(2.6rem,6.5vw,5.8rem);line-height:1;letter-spacing:-.03em;
  margin:0 0 24px;color:var(--ink);
}
.cap-closing h2 em{
  font-style:italic;
  background:linear-gradient(110deg,#8f6f3a,var(--gold),var(--gold-3),var(--gold),#8f6f3a);
  background-size:220% 100%;
  -webkit-background-clip:text;background-clip:text;
  -webkit-text-fill-color:transparent;color:transparent;
  animation:shimmer 7s ease-in-out infinite alternate;
}
.cap-closing p{
  max-width:46ch;margin:0 auto 52px;color:var(--muted);
  font-weight:300;line-height:1.8;font-size:1rem;
}
.cap-closing .cta-row{
  display:flex;flex-wrap:wrap;gap:36px;align-items:center;justify-content:center;
}

/* ===== CONTACT CARDS ===== */
.contact-cards{
  display:grid;grid-template-columns:repeat(3,1fr);
  gap:16px;max-width:700px;margin:64px auto 0;
}
.contact-card{
  position:relative;
  padding:26px 22px;border-radius:16px;
  background:linear-gradient(180deg,rgba(255,255,255,.9),rgba(247,244,236,.65));
  border:1px solid rgba(255,255,255,.7);
  box-shadow:var(--shadow-1);
  display:flex;flex-direction:column;align-items:center;gap:8px;
  color:inherit;text-decoration:none;
  transition:transform .5s var(--ease-out),box-shadow .5s var(--ease),border-color .4s;
}
.contact-card:hover{
  transform:translateY(-4px);
  border-color:rgba(168,135,78,.5);
  box-shadow:var(--shadow-2);
}
.contact-card .c-icon{
  width:32px;height:32px;color:var(--gold);margin-bottom:8px;
  transition:transform .5s var(--ease-spring);
}
.contact-card:hover .c-icon{transform:scale(1.18) rotate(-8deg)}
.contact-card .c-icon svg{width:100%;height:100%}
.contact-card .c-label{font-family:var(--serif);font-size:1rem;font-weight:400;color:var(--ink)}
.contact-card .c-value{
  font-size:.7rem;font-weight:500;letter-spacing:.12em;text-transform:uppercase;color:var(--muted);
}

/* ===== FOOTER ===== */
.cap-footer{padding:40px 0;margin-top:40px}
.cap-footer .container{
  display:flex;justify-content:space-between;align-items:center;
  gap:24px;flex-wrap:wrap;padding-top:32px;border-top:1px solid var(--line);
}
.cap-footer p{margin:0;font-size:.78rem;letter-spacing:.06em;color:var(--muted-2);font-weight:400}
.cap-footer .socials{display:flex;gap:28px;list-style:none;margin:0;padding:0}
.cap-footer .socials a{
  font-size:.78rem;letter-spacing:.06em;color:var(--muted);
  transition:color .3s;font-weight:400;position:relative;
}
.cap-footer .socials a::after{
  content:"";position:absolute;left:0;bottom:-4px;width:0;height:1px;
  background:var(--gold);transition:width .45s var(--ease);
}
.cap-footer .socials a:hover{color:var(--gold)}
.cap-footer .socials a:hover::after{width:100%}

/* ===== REVEAL — 3D rise (uses individual transform props so it never fights hover/tilt) ===== */
.cap-js .reveal{opacity:0;transform-origin:50% 100%}
.cap-js .reveal.in{
  opacity:1;
  animation:revealIn 1.15s var(--ease-out) var(--d,0ms) backwards;
}
@keyframes revealIn{
  from{opacity:0;translate:0 46px;rotate:1 0 0 14deg;scale:.96}
  to{opacity:1;translate:0 0;rotate:1 0 0 0deg;scale:1}
}

/* ===== RESPONSIVE ===== */
@media (max-width:900px){
  .cap-hero .meta{grid-template-columns:repeat(2,1fr);gap:12px}
  .cap-portals .section-head{grid-template-columns:1fr;align-items:start}
  .cap-portals .section-head p{text-align:left}
  .cap-portal{grid-template-columns:auto 1fr auto}
  .cap-portal p{grid-column:2;grid-row:2}
  .cap-portal .go{grid-column:3;grid-row:1/3;width:48px;height:48px}
  .cap-portal .go svg{width:16px;height:16px}
  .cap-skills .head,.cap-skill-grid{grid-template-columns:1fr}
  .cap-skills .head p{justify-self:start}
  .contact-cards{grid-template-columns:1fr}
}
@media (max-width:520px){
  .cap-hero .meta{grid-template-columns:1fr 1fr}
  .cap-portal{grid-template-columns:1fr auto;gap:16px;padding:24px 20px}
  .cap-portal .num{grid-column:1;grid-row:1;font-size:.85rem}
  .cap-portal h3{grid-column:1;grid-row:2}
  .cap-portal p{grid-column:1;grid-row:3}
  .cap-portal .go{grid-column:2;grid-row:1/4;align-self:center}
  .cap-footer .container{justify-content:center;text-align:center}
}

/* ===== REDUCED MOTION ===== */
@media (prefers-reduced-motion:reduce){
  .cap-home *,.cap-home *::before,.cap-home *::after{
    animation:none !important;transition:none !important;
  }
  .cap-hero h1 .line > span,.cap-hero .eyebrow,.cap-hero .lede,
  .cap-hero .cta-row,.cap-hero .meta,.hero-stage{transform:none;opacity:1}
  .cap-js .reveal{opacity:1}
  .cap-js .kicker.reveal::before,.cap-js .kicker.reveal::after{width:40px}
  .cap-skills::before{transform:none}
  .hero-stage{display:none}
}
</style>

<!-- Reading Progress Bar -->
<div class="read-progress" id="readProgress"></div>

<!-- Cursor Glow -->
<div class="cursor-glow" id="cursorGlow"></div>

<main class="cap-home" id="main">

  <!-- HERO -->
  <section class="cap-hero" id="top">
    <div class="hero-orb orb-1"></div>
    <div class="hero-orb orb-2"></div>
    <div class="hero-orb orb-3"></div>

    <!-- 3D scene -->
    <div class="hero-stage" aria-hidden="true">
      <div class="hero-scene">
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
      <p class="eyebrow">
        Portfolio Project <span class="dot"></span> 2026
      </p>
      <h1>
        <span class="line"><span>Built from scratch,</span></span>
        <span class="line"><span>driven by passion,</span></span>
        <span class="line"><span><em>created by our team.</em></span></span>
      </h1>
      <p class="lede">
        This is the final requirement of our Portfolio Project. A unified platform showcasing the individual portfolios, coding skills, and collaborative projects we've developed throughout the year.
      </p>
      <div class="cta-row">
        <a class="btn" href="#work" data-magnetic><span>Explore the work</span></a>
        <a class="btn-ghost" href="#contact" data-magnetic>Get in touch</a>
      </div>

      <dl class="meta">
        <div data-tilt="9">
          <dt><svg viewBox="0 0 24 24"><path d="M12,3L1,9L12,15L21,10.09V17H23V9M5,13.18V17.18L12,21L19,17.18V13.18L12,17L5,13.18Z"/></svg> Institution</dt>
          <dd>Opol Community College</dd>
        </div>
        <div data-tilt="9">
          <dt><svg viewBox="0 0 24 24"><path d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15.08 17,16.5V19H23V16.5C23,14.63 19.87,13 16,13M8,13C4.13,13 1,14.63 1,16.5V19H15V16.5C15,14.63 11.87,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z"/></svg> Team Size</dt>
          <dd>4 Developers</dd>
        </div>
        <div data-tilt="9">
          <dt><svg viewBox="0 0 24 24"><path d="M16.36,14C16.44,13.34 16.5,12.68 16.5,12C16.5,11.32 16.44,10.66 16.36,10H19.74C19.9,10.64 20,11.31 20,12C20,12.69 19.9,13.36 19.74,14M14.59,19.56C15.19,18.45 15.65,17.25 15.97,16H18.92C17.96,17.65 16.43,18.93 14.59,19.56M14.34,14H9.66C9.56,13.34 9.5,12.68 9.5,12C9.5,11.32 9.56,10.65 9.66,10H14.34C14.43,10.65 14.5,11.32 14.5,12C14.5,12.68 14.43,13.34 14.34,14M12,19.96C11.17,18.76 10.5,17.43 10.09,16H13.91C13.5,17.43 12.83,18.76 12,19.96M8,8H5.08C6.03,6.34 7.57,5.06 9.4,4.44C8.8,5.55 8.35,6.75 8,8M5.08,16H8C8.35,17.25 8.8,18.45 9.4,19.56C7.57,18.93 6.03,17.65 5.08,16M4.26,14C4.1,13.36 4,12.69 4,12C4,11.31 4.1,10.64 4.26,10H7.64C7.56,10.66 7.5,11.32 7.5,12C7.5,12.68 7.56,13.34 7.64,14M12,4.03C12.83,5.23 13.5,6.57 13.91,8H10.09C10.5,6.57 11.17,5.23 12,4.03M18.92,8H15.97C15.65,6.75 15.19,5.55 14.59,4.44C16.43,5.07 17.96,6.34 18.92,8M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"/></svg> Tech Stack</dt>
          <dd>HTML · CSS · JS · PHP</dd>
        </div>
        <div data-tilt="9">
          <dt><svg viewBox="0 0 24 24"><path d="M19,19H5V8H19M16,1V3H8V1H6V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3H18V1M17,12H12V17H17V12Z"/></svg> Year</dt>
          <dd>2025 — 2026</dd>
        </div>
      </dl>
    </div>
  </section>

  <!-- TECH MARQUEE
  <div class="cap-marquee" aria-hidden="true">
    <div class="track">
      <div class="group">
        <span>HTML</span><i></i><span>CSS</span><i></i><span>JavaScript</span><i></i><span>PHP</span><i></i>
        <span>WordPress</span><i></i><span>Git &amp; GitHub</span><i></i><span>Responsive</span><i></i><span>UI design</span><i></i>
      </div>
    </div>
  </div> -->

  <!-- ABOUT — 3D FLIPBOOK -->
  <section class="cap-book" id="about" aria-label="About the project">
    <div class="container">
      <div class="cb-head">
        <p class="kicker reveal">About the project</p>
        <h2 class="reveal">Open our <em>story.</em></h2>
        <p class="reveal">Click the book and turn the pages — five short chapters about our portfolio.</p>
      </div>

      <div class="book-stage" id="bookStage" data-open="0">
        <div class="book-wrap" id="capBook" tabindex="0" role="group" aria-label="Interactive book about the project">
          <div class="book-shadow"></div>
          <div class="book">

            <!-- Leaf 0: cover | page 1 -->
            <div class="leaf">
              <div class="face f cover">
                <div class="frame"></div>
                <span class="c-k"> Quadro Project</span>
                <h3>Our <em>Story</em></h3>
                <div class="gem"></div>
                <span class="c-y">2025 — 2026</span>
                <span class="hint">Click to open</span>
              </div>
              <div class="face b">
                <span class="pg-k">Prologue</span>
                <h3>About the <em>project</em></h3>
                <p class="quote">This isn’t just a website — it’s the culmination of our learning journey.</p>
                <p class="mob-hide">Every line of code and every pixel represents our growth as aspiring developers.</p>
                <span class="pg-no">— 1 —</span>
              </div>
            </div>

            <!-- Leaf 1: page 2 | page 3 -->
            <div class="leaf">
              <div class="face f">
                <span class="pg-k">Chapter 01</span>
                <h3>The <em>Team</em></h3>
                <p>Four developers from Opol Community College, working together on one unified platform.</p>
                <div class="pg-stats">
                  <div><b>4</b><span>Developers</span></div>
                  <div><b>1</b><span>Platform</span></div>
                </div>
                <span class="pg-no">— 2 —</span>
              </div>
              <div class="face b">
                <span class="pg-k">Chapter 02</span>
                <h3>The <em>Build</em></h3>
                <p class="mob-hide">Built from scratch, from the first line of markup to a finished, responsive site.</p>
                <ul class="pg-tags">
                  <li>HTML</li><li>CSS</li><li>JavaScript</li><li>PHP</li><li>WordPress</li><li>Git</li>
                </ul>
                <span class="pg-no">— 3 —</span>
              </div>
            </div>

            <!-- Leaf 2: page 4 | page 5 -->
            <div class="leaf">
              <div class="face f">
                <span class="pg-k">Chapter 03</span>
                <h3>The <em>Portfolios</em></h3>
                <p class="mob-hide">Individual portfolios, coding skills, and collaborative projects — all in one place.</p>
                <div class="pg-links">
                  <a href="<?php echo esc_url(home_url('/friends/frank/')); ?>"><span>Meet the Developer</span><span>→</span></a>
                  <a href="<?php echo esc_url(home_url('/our-members/')); ?>"><span>Meet the Team</span><span>→</span></a>
                </div>
                <span class="pg-no">— 4 —</span>
              </div>
              <div class="face b">
                <span class="pg-k">Chapter 04</span>
                <h3>The <em>Journey</em></h3>
                <ul class="pg-time">
                  <li><b>2025</b>Learning the fundamentals</li>
                  <li><b>Mid-year</b>Building real projects <span class="mob-hide">together</span></li>
                  <li><b>2026</b>Launching our portfolio</li>
                </ul>
                <span class="pg-no">— 5 —</span>
              </div>
            </div>

            <!-- Leaf 3: end page | back cover -->
            <div class="leaf">
              <div class="face f end">
                <span class="pg-k">The end… or the start</span>
                <h3>Now see the <em>work</em></h3>
                <a class="btn" href="#work"><span>Explore the work</span></a>
              </div>
              <div class="face b cover"><div class="frame"></div></div>
            </div>

          </div>
        </div>

        <div class="bk-ctrl">
          <button class="btn bk-start" type="button" data-bk="open"><span>Open the book</span></button>
          <div class="bk-nav">
            <button class="bk-btn" type="button" data-bk="prev" aria-label="Previous pages">←</button>
            <div class="bk-info">
              <span class="bk-label" id="bkLabel">Cover</span>
              <span class="bk-dots"><i></i><i></i><i></i></span>
            </div>
            <button class="bk-btn" type="button" data-bk="next" aria-label="Next pages">→</button>
            <button class="btn-ghost" type="button" data-bk="replay">Replay</button>
          </div>
        </div>
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

      <a class="cap-portal reveal" href="<?php echo esc_url(home_url('/friends/frank/')); ?>" data-tilt="4">
        <span class="num">01</span>
        <h3>Meet the Developer</h3>
        <p>My personal journey, the skills I've mastered, and the systems I've built.</p>
        <span class="go"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 12h16M14 6l6 6-6 6"/></svg></span>
      </a>

      <a class="cap-portal reveal" href="<?php echo esc_url(home_url('/our-members/')); ?>" data-tilt="4">
        <span class="num">02</span>
        <h3>Meet the Team</h3>
        <p>Discover the collective minds behind our capstone and explore their individual works.</p>
        <span class="go"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 12h16M14 6l6 6-6 6"/></svg></span>
      </a>
    </div>
  </section>

  <!-- SKILLS -->
  <section class="cap-skills" id="skills" aria-label="Skills we are learning" data-scroll3d>
    <div class="container">
      <div class="head">
        <div>
          <p class="kicker reveal">Our toolkit</p>
          <h2 class="reveal">What we <em>build</em> with</h2>
        </div>
        <p class="reveal">The technologies we utilized to create this website — from the first line of markup to a finished, responsive site.</p>
      </div>
      <ul class="cap-skill-grid">
        <li class="reveal" data-tilt="7"><b>HTML</b><span>Structure &amp; meaning</span></li>
        <li class="reveal" data-tilt="7"><b>CSS</b><span>Layout, type &amp; color</span></li>
        <li class="reveal" data-tilt="7"><b>JavaScript</b><span>Interaction &amp; behavior</span></li>
        <li class="reveal" data-tilt="7"><b>PHP</b><span>Server-side logic</span></li>
        <li class="reveal" data-tilt="7"><b>WordPress</b><span>Themes &amp; content</span></li>
        <li class="reveal" data-tilt="7"><b>Git &amp; GitHub</b><span>Version control</span></li>
        <li class="reveal" data-tilt="7"><b>Responsive</b><span>Every screen size</span></li>
        <li class="reveal" data-tilt="7"><b>UI design</b><span>Considered interfaces</span></li>
      </ul>
    </div>
  </section>

  <!-- CLOSING -->
  <section class="cap-closing" id="contact">
    <div class="container">
      <p class="kicker reveal">Let's begin</p>
      <h2 class="reveal">Discover our <em>work.</em></h2>
      <p class="reveal">A team of creative minds and skilled professionals turning bold ideas into meaningful digital experiences.</p>
      <div class="cta-row reveal">
        <a class="btn" href="<?php echo esc_url(home_url('/our-members')); ?>" data-magnetic><span>Meet the Team</span></a>
      </div>

      <div class="contact-cards">
        <a class="contact-card reveal" href="mailto:hello@ourspace.dev" data-tilt="10">
          <div class="c-icon">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z"/></svg>
          </div>
          <span class="c-label">Email Us</span>
          <span class="c-value">quadro@skill.dev</span>
        </a>
        <a class="contact-card reveal" href="https://www.facebook.com/frankjames.generalao" target="_blank" rel="noopener" data-tilt="10">
          <div class="c-icon">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          </div>
          <span class="c-label">Facebook</span>
          <span class="c-value">Quadro Portfolio</span>
        </a>
        <a class="contact-card reveal" href="#" target="_blank" rel="noopener" data-tilt="10">
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
      <p>© <?php echo date('Y'); ?> Quadro Studio · Final Project</p>
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
  'use strict';
  var root = document.documentElement;
  root.classList.add('cap-js');

  var reduce  = matchMedia('(prefers-reduced-motion: reduce)').matches;
  var fine    = matchMedia('(hover: hover) and (pointer: fine)').matches;
  var desktop = matchMedia('(min-width: 769px)').matches;
  var rich    = fine && desktop && !reduce;           // pointer-driven effects
  if (rich) root.classList.add('cap-tilt');

  var $  = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var lerp  = function (a, b, t) { return a + (b - a) * t; };
  var clamp = function (v, a, b) { return Math.min(b, Math.max(a, v)); };

  /* 0. Marquee: clone the group so the loop is seamless */
  var track = $('.cap-marquee .track');
  if (track && track.firstElementChild) {
    track.appendChild(track.firstElementChild.cloneNode(true));
  }

  /* 1. Reveal — staggered per batch via --d (CSS animation does the 3D rise) */
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
  var bar   = $('#readProgress');
  var hero  = $('.cap-hero');
  var s3d   = $$('[data-scroll3d]');
  var ticking = false;

  function onScroll() {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(function () {
      var y = window.scrollY || root.scrollTop;
      var max = root.scrollHeight - innerHeight;
      bar.style.width = (max > 0 ? (y / max) * 100 : 0) + '%';

      if (!reduce) {
        if (y < innerHeight * 1.3) hero.style.setProperty('--sy', y.toFixed(1));
        var vh = innerHeight;
        s3d.forEach(function (el) {
          var r = el.getBoundingClientRect();
          if (r.bottom < -200 || r.top > vh + 200) return;   // off-screen, skip
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

  /* 3. Smooth pointer loop: cursor glow + hero scene parallax (--px / --py) */
  if (rich) {
    var glow = $('#cursorGlow');
    var gx = innerWidth / 2, gy = innerHeight / 2, mx = gx, my = gy;
    var tx = 0, ty = 0, cx = 0, cy = 0;

    document.addEventListener('pointermove', function (e) { mx = e.clientX; my = e.clientY; });
    hero.addEventListener('pointermove', function (e) {
      var r = hero.getBoundingClientRect();
      tx = (e.clientX - r.left) / r.width - 0.5;
      ty = (e.clientY - r.top) / r.height - 0.5;
    });
    hero.addEventListener('pointerleave', function () { tx = 0; ty = 0; });

    (function loop() {
      gx = lerp(gx, mx, 0.08); gy = lerp(gy, my, 0.08);
      glow.style.left = gx.toFixed(1) + 'px';
      glow.style.top  = gy.toFixed(1) + 'px';

      cx = lerp(cx, tx, 0.06); cy = lerp(cy, ty, 0.06);
      if (Math.abs(cx - tx) > 0.0005 || Math.abs(cy - ty) > 0.0005) {
        hero.style.setProperty('--px', cx.toFixed(4));
        hero.style.setProperty('--py', cy.toFixed(4));
      }
      requestAnimationFrame(loop);
    })();
  }

  /* 4. Magnetic buttons (uses the `translate` property, never fights hover transform) */
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

  /* 6. 3D flipbook — click to open, auto-turns pages 1 → 5 */
  (function () {
    var wrap = $('#capBook'), stage = $('#bookStage');
    if (!wrap) return;
    var leaves = $$('.leaf', wrap), N = leaves.length, MAX = N - 1;
    var dots = $$('.bk-dots i', stage), label = $('#bkLabel');
    var nextB = $('[data-bk="next"]', stage);
    var pos = 0, timer = null;
    var labels = ['Cover', 'Pages 1 – 2', 'Pages 3 – 4', 'Page 5'];

    leaves.forEach(function (l, i) { l.style.zIndex = N - i; });

    function ui() {
      wrap.classList.toggle('open', pos > 0);
      stage.setAttribute('data-open', pos > 0 ? '1' : '0');
      label.textContent = labels[pos];
      dots.forEach(function (d, j) { d.classList.toggle('on', j === pos - 1); });
      nextB.disabled = pos >= MAX;
    }

    function go(n) {
      n = clamp(n, 0, MAX);
      if (n === pos) return;
      var from = pos, changed = [];
      pos = n;
      leaves.forEach(function (l, i) { if ((i < from) !== (i < pos)) changed.push(i); });
      if (n < from) changed.reverse();
      changed.forEach(function (i, k) {
        var l = leaves[i];
        l.style.transitionDelay = (k * 0.16) + 's';
        l.style.zIndex = 60;
        l.classList.toggle('flip', i < pos);
        setTimeout(function () { l.style.zIndex = (i < pos) ? i + 1 : N - i; }, 750 + k * 160);
      });
      ui();
    }

    function stop() { clearInterval(timer); timer = null; }
    function play() {
      stop();
      timer = setInterval(function () { if (pos < MAX) go(pos + 1); else stop(); }, 4200);
    }
    function openBook() { go(1); play(); }

    wrap.addEventListener('click', function () { if (pos === 0) openBook(); });
    wrap.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') { if (pos === 0) { e.preventDefault(); openBook(); } }
      else if (e.key === 'ArrowRight') { stop(); go(pos + 1); }
      else if (e.key === 'ArrowLeft')  { stop(); go(pos - 1); }
    });
    stage.addEventListener('click', function (e) {
      var b = e.target.closest('[data-bk]');
      if (!b) return;
      var a = b.getAttribute('data-bk');
      if (a === 'open') openBook();
      else if (a === 'next') { stop(); go(pos + 1); }
      else if (a === 'prev') { stop(); go(pos - 1); }
      else if (a === 'replay') { stop(); go(0); setTimeout(openBook, 1900); }
    });

    /* subtle pointer-follow tilt */
    if (rich) {
      stage.addEventListener('pointermove', function (e) {
        var r = stage.getBoundingClientRect();
        wrap.style.setProperty('--bx', ((e.clientX - r.left) / r.width - 0.5).toFixed(3));
        wrap.style.setProperty('--by', ((e.clientY - r.top) / r.height - 0.5).toFixed(3));
      });
      stage.addEventListener('pointerleave', function () {
        wrap.style.setProperty('--bx', 0); wrap.style.setProperty('--by', 0);
      });
    }
    ui();
  })();

  /* 7. Smooth anchor scroll */
  $$('a[href^="#"]').forEach(function (a) {
    a.addEventListener('click', function (e) {
      var id = a.getAttribute('href');
      if (id.length < 2) return;
      var target = $(id);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'start' });
      }
    });
  });
})();
</script>

<?php get_footer(); ?>
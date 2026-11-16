<?php
/**
 * Template Name: Skills & Expertise
 * Template Post Type: page
 * Ultra 3D Aesthetic Edition — Matched with front-page.php
 */
get_header(); ?>

<style>
/* ===== SKILLS PAGE — Ultra 3D Edition v2 ===== */
.skills-page {
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
.skills-page *,.skills-page *::before,.skills-page *::after{box-sizing:border-box}
.skills-page a{color:inherit;text-decoration:none}
.skills-page :focus-visible{outline:2px solid var(--gold);outline-offset:4px}
.skills-page .container{max-width:1280px;margin:0 auto;padding:0 clamp(28px,7vw,112px);position:relative;z-index:1}

/* Perspective for 3D */
.skills-page .container,
.skill-list,
.tools-grid{perspective:1400px}

/* Ambient stage */
.skills-page::before{
  content:"";position:fixed;inset:0;pointer-events:none;z-index:0;
  background:
    radial-gradient(600px 400px at 15% 5%, rgba(196,165,102,.10), transparent 70%),
    radial-gradient(500px 400px at 85% 10%, rgba(212,188,139,.10), transparent 70%),
    radial-gradient(700px 500px at 50% 100%, rgba(196,165,102,.06), transparent 70%);
}

/* ===== SCROLL PROGRESS ===== */
.sp-progress{
  position:fixed;top:0;left:0;height:3px;width:0%;
  background:linear-gradient(90deg,#8f6f3a,var(--gold),var(--gold-2),var(--gold-3));
  z-index:9999;transition:width .15s linear;
  box-shadow:0 0 12px rgba(196,165,102,.6);
}

/* ===== CURSOR GLOW ===== */
.sp-glow{
  position:fixed;width:420px;height:420px;border-radius:50%;
  background:radial-gradient(circle,rgba(168,135,78,.12),transparent 70%);
  pointer-events:none;z-index:1;transform:translate(-50%,-50%);
  will-change:transform;
}
@media (max-width:768px),(hover:none){.sp-glow{display:none}}

/* ===== KICKER ===== */
.skills-page .kicker{
  font-family:var(--sans);font-size:.7rem;font-weight:500;letter-spacing:.24em;
  text-transform:uppercase;color:var(--gold);margin:0 0 24px;
  display:inline-flex;align-items:center;gap:16px;
  padding:8px 16px 8px 0;border-radius:2px;
}
.skills-page .kicker::before{content:"";width:40px;height:1px;background:var(--gold)}
.skills-js .kicker.reveal::before,
.skills-js .kicker.reveal::after{width:0;transition:width 1.1s var(--ease-out) .35s}
.skills-js .kicker.reveal.in::before,
.skills-js .kicker.reveal.in::after{width:40px}

/* ===== HERO ===== */
.skills-hero{
  position:relative;
  padding:clamp(180px,20vw,260px) 0 clamp(60px,8vw,100px);
  overflow:hidden;text-align:center;
}
.skills-hero .container{
  position:relative;z-index:2;
  translate:0 calc(var(--sy,0) * .1px);
  opacity:calc(1 - var(--sy,0) * .0006);
}

/* Floating orbs */
.skill-orb{
  position:absolute;border-radius:50%;pointer-events:none;z-index:1;
  background:radial-gradient(circle at 35% 30%,rgba(255,255,255,.45),rgba(196,165,102,.35) 40%,transparent 72%);
  filter:blur(2px);
  animation:floatOrb 22s infinite ease-in-out;
  translate:
    calc(var(--px,0) * var(--depth,30) * 1px)
    calc(var(--py,0) * var(--depth,30) * 1px + var(--sy,0) * var(--sdepth,-.08) * 1px);
  will-change:transform,translate;
}
.skill-orb.o1{width:260px;height:260px;top:15%;right:12%;--depth:-46;--sdepth:-.14}
.skill-orb.o2{width:140px;height:140px;bottom:28%;right:32%;--depth:64;--sdepth:-.06;animation-delay:6s}
.skill-orb.o3{width:180px;height:180px;top:48%;left:4%;--depth:-28;--sdepth:-.1;animation-delay:12s}
@keyframes floatOrb{
  0%,100%{transform:translate(0,0) scale(1);opacity:.35}
  50%{transform:translate(30px,-40px) scale(1.15);opacity:.65}
}

/* ----- 3D hero scene (glass cube, matches front-page) ----- */
.skills-stage{
  position:absolute;right:clamp(2%,6vw,9%);top:24%;
  width:420px;height:420px;z-index:1;
  perspective:1100px;pointer-events:none;
  translate:0 calc(var(--sy,0) * -.12px);
  opacity:0;animation:stageIn 1.6s var(--ease-out) .6s forwards;
}
@keyframes stageIn{from{opacity:0;scale:.82}to{opacity:1;scale:1}}
.skills-scene{
  position:absolute;inset:0;transform-style:preserve-3d;
  transform:
    rotateX(calc(var(--py,0) * -20deg + 16deg))
    rotateY(calc(var(--px,0) * 28deg - 8deg));
}
.skills-scene > *{position:absolute;left:50%;top:50%;transform-style:preserve-3d}

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
@media (max-width:1100px){.skills-stage{display:none}}

/* Eyebrow pill */
.skills-hero .eyebrow{
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
.skills-hero .eyebrow .dot{
  width:6px;height:6px;border-radius:50%;background:var(--gold);
  box-shadow:0 0 0 4px rgba(168,135,78,.15);
  animation:dotPulse 2.4s ease-in-out infinite;
}
@keyframes dotPulse{
  0%,100%{box-shadow:0 0 0 4px rgba(168,135,78,.15)}
  50%{box-shadow:0 0 0 9px rgba(168,135,78,0)}
}

/* H1 per-line flip */
.skills-hero h1{
  font-family:var(--serif);font-weight:300;letter-spacing:-.035em;
  font-size:clamp(3.2rem,8.5vw,7.4rem);line-height:.94;margin:0 0 40px;
  color:var(--ink);
  text-shadow:0 1px 0 rgba(255,255,255,.7),0 2px 8px rgba(20,18,14,.05);
}
.skills-hero h1 .line{
  display:block;overflow:hidden;padding:.06em 0 .12em;margin-bottom:-.12em;
  perspective:800px;
}
.skills-hero h1 .line > span{
  display:inline-block;transform:translateY(110%) rotateX(-60deg);
  transform-origin:0 100%;
  animation:capRise 1.3s var(--ease-out) forwards;
}
.skills-hero h1 .line:nth-child(1) > span{animation-delay:.25s}
.skills-hero h1 .line:nth-child(2) > span{animation-delay:.42s}
.skills-hero h1 em{
  font-style:italic;font-weight:400;
  background:linear-gradient(110deg,#8f6f3a 0%,var(--gold) 25%,var(--gold-3) 50%,var(--gold) 75%,#8f6f3a 100%);
  background-size:220% 100%;
  -webkit-background-clip:text;background-clip:text;
  -webkit-text-fill-color:transparent;color:transparent;
  filter:drop-shadow(0 2px 6px rgba(168,135,78,.2));
  animation:shimmer 7s ease-in-out 1.6s infinite alternate;
}
@keyframes shimmer{from{background-position:0% 50%}to{background-position:100% 50%}}

.skills-hero .lede{
  max-width:600px;margin:0 auto;font-size:1.06rem;font-weight:300;line-height:1.8;
  color:var(--ink-3);letter-spacing:.005em;
  opacity:0;animation:capFade 1s var(--ease) .9s forwards;
}
@keyframes capRise{to{transform:none}}
@keyframes capFade{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:none}}

/* ===== SHARED TILT + GLARE ===== */
.skills-page [data-tilt]{position:relative;transform-style:preserve-3d}
.skills-page [data-tilt]::after{
  content:"";position:absolute;inset:0;border-radius:inherit;pointer-events:none;z-index:2;
  background:radial-gradient(420px circle at var(--mx,50%) var(--my,50%),rgba(255,255,255,.6),transparent 60%);
  opacity:0;transition:opacity .5s var(--ease);
}
.skills-page [data-tilt]:hover::after{opacity:.65}
.skills-technical [data-tilt]::after{
  background:radial-gradient(320px circle at var(--mx,50%) var(--my,50%),rgba(212,188,139,.26),transparent 62%);
}
.skills-tilt [data-tilt]{
  transition-property:box-shadow,background,border-color,color,opacity !important;
  will-change:transform;
}

/* =========================================================
   TECHNICAL SKILLS (Dark Slab + 3D Glass Cards)
   ========================================================= */
.skills-technical {
  padding: clamp(80px, 10vw, 140px) clamp(24px, 4vw, 64px);
  position: relative;
  
  /* Solid background on the section itself */
  background: linear-gradient(135deg, #14120E 0%, #1a1712 100%);
  border-radius: 32px;
  margin: 0 clamp(12px, 3vw, 48px);
  box-shadow: 0 1px 0 rgba(255,255,255,.05) inset, 0 -1px 0 rgba(0,0,0,.4) inset, 0 30px 80px -20px rgba(20,18,14,.4);
  
  /* Scroll-linked 3D effect */
  transform:
    perspective(1600px)
    rotateX(calc(var(--p,0) * 3deg))
    scale(calc(1 - var(--p,0) * var(--p,0) * .035));
  transform-origin: 50% 50%;
  will-change: transform;
}

.skills-technical .kicker {
  color: var(--gold-3);
  background: linear-gradient(180deg, rgba(255,255,255,.08), rgba(255,255,255,.02));
  border: 1px solid rgba(196,165,102,.3);
  margin: 0 auto 32px; display: flex; width: fit-content;
}
.skills-technical .kicker::before { background: var(--gold-3); }
.skills-technical .kicker::after { display: none; }

.skills-technical h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2.4rem, 5vw, 4.4rem);
  line-height: 1.05; margin: 0 0 64px; color: var(--ivory); text-align: center;
  text-shadow: 0 1px 0 rgba(0,0,0,.3);
}
.skills-technical h2 em {
  font-style: italic;
  background: linear-gradient(135deg, var(--gold) 0%, var(--gold-2) 50%, var(--gold-3) 100%);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent;
}

/* Skill Grid (2 columns) */
.skill-list {
  list-style: none; padding: 0; margin: 0;
  display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px;
  position: relative; z-index: 1;
}

/* Skill Cards (Glassy Dark) */
.skill-item {
  display: flex; flex-direction: column;
  padding: 22px 26px;
  border-radius: 14px;
  background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.02));
  border: 1px solid rgba(255,255,255,.08);
  box-shadow: 0 1px 0 rgba(255,255,255,.08) inset, 0 8px 20px -8px rgba(0,0,0,.4);
  transition: transform .5s var(--ease-out), border-color .4s, background .4s, box-shadow .5s var(--ease);
}

.skill-item:hover {
  transform: translateY(-3px);
  border-color: rgba(196,165,102,.4);
  background: linear-gradient(180deg, rgba(196,165,102,.12), rgba(196,165,102,.04));
  box-shadow: 0 1px 0 rgba(255,255,255,.1) inset, 0 16px 40px -10px rgba(168,135,78,.35);
}

.skill-header {
  display: flex; justify-content: space-between; align-items: baseline;
  margin-bottom: 8px;
  transition: translate .6s var(--ease-out);
  translate: calc(var(--nx,0) * 8px) 0;
}

.skill-name {
  font-family: var(--serif); font-weight: 400;
  font-size: clamp(1.3rem, 2vw, 1.6rem);
  letter-spacing: -.01em; color: var(--ivory);
  transition: color .4s;
}
.skill-item:hover .skill-name { color: var(--gold-3); }

.skill-percent {
  font-family: var(--serif); font-size: 1.1rem; font-style: italic; color: var(--gold-3);
}

.skill-desc {
  font-size: .85rem; font-weight: 300; letter-spacing: .04em;
  color: rgba(247,244,236,.5); margin-bottom: 20px;
  transition: translate .6s var(--ease-out), color .4s;
  translate: calc(var(--nx,0) * 8px) 0;
}
.skill-item:hover .skill-desc { color: rgba(247,244,236,.7); }

/* Progress Bar */
.skill-bar-bg {
  width: 100%; height: 4px;
  background: rgba(0,0,0,.4);
  border-radius: 4px; overflow: hidden;
  box-shadow: 0 1px 2px rgba(0,0,0,.5) inset, 0 1px 0 rgba(255,255,255,.1);
  position: relative;
}
.skill-bar-fill {
  height: 100%; width: 0%;
  background: linear-gradient(90deg, var(--gold), var(--gold-2), var(--gold-3));
  border-radius: 4px;
  transition: width 1.5s var(--ease-out);
  box-shadow: 0 0 10px rgba(196,165,102,.6), 0 1px 0 rgba(255,255,255,.4) inset;
}

/* ===== TOOLS GRID ===== */
.skills-creative{padding:clamp(80px,10vw,140px) 0}
.skills-creative .grid-layout{
  display:grid;grid-template-columns:1fr 1.5fr;gap:clamp(40px,8vw,120px);
  align-items:start;
}
.skills-creative h2{
  font-family:var(--serif);font-weight:300;font-size:clamp(2.4rem,4vw,3.5rem);
  line-height:1.1;letter-spacing:-.02em;margin:0 0 24px;color:var(--ink);
}
.skills-creative h2 em{
  font-style:italic;
  background:linear-gradient(135deg,#8f6f3a,var(--gold),var(--gold-2));
  -webkit-background-clip:text;background-clip:text;
  -webkit-text-fill-color:transparent;color:transparent;
}
.skills-creative p{
  font-size:1.05rem;font-weight:300;line-height:1.85;color:var(--ink-3);
  margin:0 0 48px;max-width:40ch;
}

.tools-grid{
  display:grid;grid-template-columns:repeat(3,1fr);gap:20px;
}
.tool-card{
  position:relative;
  display:flex;flex-direction:column;
  align-items:center;justify-content:center;
  padding:40px 20px 32px;
  background:linear-gradient(180deg,rgba(255,255,255,.9),rgba(247,244,236,.65));
  border:1px solid rgba(255,255,255,.7);
  border-radius:20px;
  overflow:hidden;
  cursor:pointer;
  text-decoration:none;
  color:inherit;
  aspect-ratio:1/1;
  box-shadow:var(--shadow-1);
  transform-style:preserve-3d;
}
.tool-card::before{
  content:"";position:absolute;top:0;left:0;width:100%;height:3px;
  background:linear-gradient(90deg,var(--gold),var(--gold-2));
  transform:scaleX(0);transition:transform .5s var(--ease-out);
}
.tool-card:hover::before{transform:scaleX(1)}

.tool-icon{
  width:64px;height:64px;margin-bottom:20px;
  transition:transform .5s var(--ease-out);
  display:flex;align-items:center;justify-content:center;
}
.tool-icon svg{width:100%;height:100%;filter:drop-shadow(0 4px 8px rgba(0,0,0,.1))}
.tool-card:hover .tool-icon{transform:scale(1.15) rotate(-5deg)}

.tool-card h3{
  font-family:var(--serif);font-weight:400;font-size:1.2rem;
  margin:0 0 4px;color:var(--ink);text-align:center;transition:color .3s;
}
.tool-card:hover h3{color:var(--gold)}
.tool-card .tool-role{
  font-size:.68rem;font-weight:600;letter-spacing:.12em;
  text-transform:uppercase;color:var(--muted);text-align:center;transition:color .3s;
}
.tool-card:hover .tool-role{color:var(--ink-3)}

.tool-desc{
  position:absolute;inset:0;
  background:rgba(20,18,14,.85);
  backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);
  color:var(--ivory);
  display:flex;align-items:center;justify-content:center;
  padding:28px;text-align:center;
  font-size:.85rem;font-weight:300;line-height:1.6;
  opacity:0;transform:translateY(20px);
  transition:all .4s var(--ease-out);
  border-radius:inherit;
}
.tool-card:hover .tool-desc{opacity:1;transform:translateY(0)}
.tool-desc em{color:var(--gold-2);font-style:italic}

/* ===== REVEAL ===== */
.skills-js .reveal{opacity:0;transform-origin:50% 100%}
.skills-js .reveal.in{
  opacity:1;
  animation:revealIn 1.15s var(--ease-out) var(--d,0ms) backwards;
}
@keyframes revealIn{
  from{opacity:0;translate:0 46px;rotate:1 0 0 14deg;scale:.96}
  to{opacity:1;translate:0 0;rotate:1 0 0 0deg;scale:1}
}

/* ===== RESPONSIVE ===== */
@media (max-width:900px){
  .skill-list{grid-template-columns:1fr;gap:16px}
  .skills-creative .grid-layout{grid-template-columns:1fr;gap:40px}
  .tools-grid{grid-template-columns:repeat(2,1fr)}
}
@media (max-width:600px){
  .tools-grid{grid-template-columns:1fr 1fr;gap:12px}
  .tool-card{padding:24px 12px;aspect-ratio:1/1;border-radius:16px}
  .tool-icon{width:48px;height:48px;margin-bottom:12px}
  .tool-card h3{font-size:1rem}
  .tool-card .tool-role{font-size:.6rem}
}

/* ===== REDUCED MOTION ===== */
@media (prefers-reduced-motion:reduce){
  .skills-page *,.skills-page *::before,.skills-page *::after{
    animation:none !important;transition:none !important;
  }
  .skills-hero h1 .line > span,.skills-hero .eyebrow,.skills-hero .lede{transform:none;opacity:1}
  .skills-js .reveal{opacity:1}
  .skills-js .kicker.reveal::before,.skills-js .kicker.reveal::after{width:40px}
  .skills-technical{transform:none}
  .skills-stage,.skill-orb,.sp-progress,.sp-glow{display:none}
}
</style>

<!-- Reading Progress Bar -->
<div class="sp-progress" id="skillsProgress"></div>

<!-- Cursor Glow -->
<div class="sp-glow" id="skillsCursorGlow"></div>

<main class="skills-page">

  <!-- HERO -->
  <section class="skills-hero">
    <div class="skill-orb o1"></div>
    <div class="skill-orb o2"></div>
    <div class="skill-orb o3"></div>

    <!-- 3D scene (glass cube) -->
    <div class="skills-stage" aria-hidden="true">
      <div class="skills-scene">
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
      <p class="eyebrow">Our Arsenal <span class="dot"></span> 2026</p>
      <h1>
        <span class="line"><span>Skills &amp;</span></span>
        <span class="line"><span><em>Expertise.</em></span></span>
      </h1>
      <p class="lede">
        The tools, languages, and principles we use to transform ideas into
        functional, beautiful digital experiences.
      </p>
    </div>
  </section>

  <!-- TECHNICAL SKILLS -->
  <section class="skills-technical" data-scroll3d>
    <div class="container">
      <p class="kicker reveal">Core Competencies</p>
      <h2 class="reveal">Technical <em>Foundation.</em></h2>
      
      <ul class="skill-list">
        <li class="skill-item reveal" data-tilt="5">
          <div class="skill-header">
            <span class="skill-name">HTML &amp; CSS</span>
            <span class="skill-percent">95%</span>
          </div>
          <div class="skill-desc">Semantic structure, responsive layout, modern Grid &amp; Flexbox</div>
          <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="95"></div></div>
        </li>
        <li class="skill-item reveal" data-tilt="5">
          <div class="skill-header">
            <span class="skill-name">JavaScript</span>
            <span class="skill-percent">85%</span>
          </div>
          <div class="skill-desc">ES6+, DOM manipulation, async/await, DOM APIs</div>
          <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="85"></div></div>
        </li>
        <li class="skill-item reveal" data-tilt="5">
          <div class="skill-header">
            <span class="skill-name">PHP &amp; WordPress</span>
            <span class="skill-percent">88%</span>
          </div>
          <div class="skill-desc">Custom theme development, template hierarchy, hooks</div>
          <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="88"></div></div>
        </li>
        <li class="skill-item reveal" data-tilt="5">
          <div class="skill-header">
            <span class="skill-name">UI / UX Design</span>
            <span class="skill-percent">80%</span>
          </div>
          <div class="skill-desc">Wireframing, typography, color theory, accessibility</div>
          <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="80"></div></div>
        </li>
        <li class="skill-item reveal" data-tilt="5">
          <div class="skill-header">
            <span class="skill-name">Version Control</span>
            <span class="skill-percent">82%</span>
          </div>
          <div class="skill-desc">Git, GitHub, branching strategies, collaboration</div>
          <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="82"></div></div>
        </li>
      </ul>
    </div>
  </section>

  <!-- CREATIVE TOOLS -->
  <section class="skills-creative">
    <div class="container">
      <div class="grid-layout">
        <div>
          <h2 class="reveal">Tools we <em>love.</em></h2>
          <p class="reveal">
            We don't use tools just to use them. We choose the right instruments
            to craft digital experiences with precision and care.
          </p>
        </div>

        <div class="tools-grid">

          <!-- VS CODE -->
          <div class="tool-card reveal" data-tilt="6">
            <div class="tool-icon">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path fill="#007ACC" d="M17.5,2.5L15,0L5,9.5L1.5,7L0,7.5L3.5,11L0,14.5L1.5,15L5,12.5L15,22L17.5,19.5V2.5M14,6.5L6,11L14,15.5V6.5M14,18.5L6,14L14,9.5V18.5Z"/>
              </svg>
            </div>
            <h3>VS Code</h3>
            <span class="tool-role">Code Editor</span>
            <div class="tool-desc">My primary weapon for writing clean, efficient code across every project.</div>
          </div>

          <!-- EXPO GO -->
          <div class="tool-card reveal" data-tilt="6">
            <div class="tool-icon">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="10" fill="#000020"/>
                <circle cx="12" cy="12" r="8" fill="none" stroke="#fff" stroke-width="1.5"/>
                <text x="12" y="15" font-family="Arial" font-size="8" font-weight="bold" fill="#fff" text-anchor="middle">Expo</text>
              </svg>
            </div>
            <h3>Expo Go</h3>
            <span class="tool-role">Mobile Dev</span>
            <div class="tool-desc">Rapid mobile prototyping and testing for our learning app.</div>
          </div>

          <!-- GITHUB -->
          <div class="tool-card reveal" data-tilt="6">
            <div class="tool-icon">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path fill="#181717" d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
              </svg>
            </div>
            <h3>GitHub</h3>
            <span class="tool-role">Collaboration</span>
            <div class="tool-desc">Version control and team collaboration — the backbone of our workflow.</div>
          </div>

          <!-- LARAGON -->
          <div class="tool-card reveal" data-tilt="6">
            <div class="tool-icon">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <rect x="2" y="4" width="20" height="16" rx="2" fill="#0E5C8C"/>
                <rect x="4" y="6" width="16" height="12" rx="1" fill="#1F8ACB"/>
                <text x="12" y="15" font-family="Arial" font-size="7" font-weight="bold" fill="#fff" text-anchor="middle">Laragon</text>
              </svg>
            </div>
            <h3>Laragon</h3>
            <span class="tool-role">Local Dev</span>
            <div class="tool-desc">My local server environment for fast, reliable WordPress testing.</div>
          </div>

          <!-- WORDPRESS -->
          <div class="tool-card reveal" data-tilt="6">
            <div class="tool-icon">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="12" fill="#21759B"/>
                <path fill="#fff" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1.5 14.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm0-5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm3 5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
              </svg>
            </div>
            <h3>WordPress</h3>
            <span class="tool-role">CMS</span>
            <div class="tool-desc">Custom themes and content management for client — driven projects.</div>
          </div>

          <!-- MYSQL -->
          <div class="tool-card reveal" data-tilt="6">
            <div class="tool-icon">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="12" cy="6" rx="9" ry="3" fill="#F29111"/>
                <path fill="#00758F" d="M3,6v6c0,1.66 4.03,3 9,3s9-1.34 9-3V6c0,1.66-4.03,3-9,3S3,7.66 3,6z"/>
                <path fill="#00758F" d="M3,12v6c0,1.66 4.03,3 9,3s9-1.34 9-3v-6c0,1.66-4.03,3-9,3S3,13.66 3,12z"/>
              </svg>
            </div>
            <h3>MySQL</h3>
            <span class="tool-role">Database</span>
            <div class="tool-desc">Reliable data storage and query optimization for backend systems.</div>
          </div>

        </div>
      </div>
    </div>
  </section>

</main>

<script>
(function () {
  'use strict';
  var root = document.documentElement;
  root.classList.add('skills-js');

  var reduce  = matchMedia('(prefers-reduced-motion: reduce)').matches;
  var fine    = matchMedia('(hover: hover) and (pointer: fine)').matches;
  var desktop = matchMedia('(min-width: 769px)').matches;
  var rich    = fine && desktop && !reduce;
  if (rich) root.classList.add('skills-tilt');

  var $  = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var lerp  = function (a, b, t) { return a + (b - a) * t; };
  var clamp = function (v, a, b) { return Math.min(b, Math.max(a, v)); };

  /* 1. Reveal — 3D rise via --d */
  var io = new IntersectionObserver(function (entries) {
    var shown = entries.filter(function (e) { return e.isIntersecting; });
    shown.forEach(function (entry, i) {
      entry.target.style.setProperty('--d', (reduce ? 0 : i * 90) + 'ms');
      entry.target.classList.add('in');
      io.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
  $$('.reveal').forEach(function (el) { io.observe(el); });

  /* 2. Skill bar fill on scroll */
  if (!reduce) {
    var skillIO = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        var bar = entry.target.querySelector('.skill-bar-fill');
        if (bar) {
          var w = bar.getAttribute('data-width');
          setTimeout(function () { bar.style.width = w + '%'; }, 200);
        }
        skillIO.unobserve(entry.target);
      });
    }, { threshold: 0.5 });
    $$('.skill-item').forEach(function (el) { skillIO.observe(el); });
  } else {
    $$('.skill-item').forEach(function (el) {
      var bar = el.querySelector('.skill-bar-fill');
      if (bar) bar.style.width = bar.getAttribute('data-width') + '%';
    });
  }

  /* 3. Scroll: progress, hero parallax, scroll-linked 3D */
  var bar   = $('#skillsProgress');
  var hero  = $('.skills-hero');
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

  /* 4. Cursor glow + hero parallax */
  if (rich) {
    var glow = $('#skillsCursorGlow');
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

  /* 5. 3D tilt + glare */
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
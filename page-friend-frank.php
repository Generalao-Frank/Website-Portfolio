<?php
/**
 * Template Name: Friend Profile - Frank
 * Template Post Type: page
 * Ultra 3D Aesthetic Edition
 */
get_header(); 

$member_name = get_the_title();
$first_name  = explode(' ', $member_name)[0];
?>

<style>
/* =========================================================
   INDIVIDUAL PORTFOLIO — Ultra 3D Edition
   ========================================================= */
.portfolio-page{
  --ivory:#F7F4EC; --ivory-2:#EFEADD; --paper:#FBFAF5;
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

  background:var(--ivory); color:var(--ink); font-family:var(--sans);
  -webkit-font-smoothing:antialiased; overflow-x:hidden;
  position:relative;
}
.portfolio-page *{box-sizing:border-box}
.portfolio-page .container{max-width:1280px;margin:0 auto;padding:0 var(--gutter); position:relative; z-index:1}
.portfolio-page a{color:inherit;text-decoration:none}
.portfolio-page :focus-visible{outline:2px solid var(--gold);outline-offset:4px;border-radius:4px}

/* Ambient stage */
.portfolio-page::before {
  content: ""; position: fixed; inset: 0; pointer-events: none; z-index: 0;
  background:
    radial-gradient(600px 400px at 15% 5%, rgba(196,165,102,.10), transparent 70%),
    radial-gradient(500px 400px at 85% 10%, rgba(212,188,139,.10), transparent 70%),
    radial-gradient(700px 500px at 50% 100%, rgba(196,165,102,.06), transparent 70%);
}

/* Grain */
.portfolio-page::after{
  content:""; position:fixed; inset:0; z-index:2; pointer-events:none;
  opacity:.03; mix-blend-mode:multiply;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

/* Reading progress + cursor glow */
.pp-progress{
  position:fixed; top:0; left:0; height:3px; width:0%;
  background:linear-gradient(90deg,#8f6f3a,var(--gold),var(--gold-2),var(--gold-3));
  z-index:9999; transition:width .1s ease-out;
  box-shadow:0 0 12px rgba(196,165,102,.6);
}
.pp-glow{
  position:fixed; top:0; left:0; width:420px; height:420px; border-radius:50%;
  background:radial-gradient(circle, rgba(168,135,78,.10), transparent 70%);
  pointer-events:none; z-index:1; transform:translate3d(-50%,-50%,0);
}
@media (hover:none),(max-width:900px){ .pp-glow{display:none} }

/* =========================================================
   HERO
   ========================================================= */
.pf-hero{
  padding:clamp(180px,20vw,260px) 0 clamp(72px,9vw,120px);
  position:relative; overflow:hidden;
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

.pf-hero .grid{
  display:grid; grid-template-columns:1.1fr 1fr;
  gap:clamp(40px,8vw,120px); align-items:center; position:relative;
}
.pf-hero .kicker{
  display: inline-flex; align-items: center; gap: 12px;
  padding: 10px 18px; margin: 0 0 32px; border-radius: 999px;
  font-size:.7rem; font-weight:600; letter-spacing:.22em; text-transform:uppercase;
  color:var(--gold);
  background: linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.6));
  border: 1px solid rgba(168,135,78,.22);
  box-shadow: 0 1px 0 rgba(255,255,255,.9) inset, 0 -1px 0 rgba(168,135,78,.06) inset, 0 6px 16px -8px rgba(168,135,78,.25);
  opacity:0; animation:pfUp .9s var(--ease-out) .1s forwards;
}
.pf-hero .kicker::before{
  content: ""; width: 6px; height: 6px; border-radius: 50%; background: var(--gold);
  box-shadow: 0 0 0 4px rgba(168,135,78,.15);
}

.pf-hero h1{
  font-family:var(--serif); font-weight:300;
  font-size:clamp(3rem,6vw,5.5rem);
  line-height:1; letter-spacing:-.035em; margin:0 0 24px;
  color:var(--ink); font-optical-sizing:auto;
  text-shadow: 0 1px 0 rgba(255,255,255,.7), 0 2px 8px rgba(20,18,14,.05);
  opacity:0; animation:pfUp 1s var(--ease-out) .22s forwards;
}
.pf-hero h1 em{
  font-style:italic;
  background:linear-gradient(135deg,#8f6f3a,var(--gold),var(--gold-2),var(--gold-3));
  -webkit-background-clip:text; background-clip:text;
  -webkit-text-fill-color:transparent; color:transparent;
  filter:drop-shadow(0 2px 6px rgba(168,135,78,.2));
}

.pf-hero .tagline{
  font-size:clamp(1rem,1.3vw,1.1rem); font-weight:300; line-height:1.85;
  color:var(--ink-3); margin:0 0 40px; max-width:46ch;
  opacity:0; animation:pfUp 1s var(--ease-out) .4s forwards;
}

.pf-buttons{
  display:flex; gap:20px; align-items:center; flex-wrap:wrap;
  opacity:0; animation:pfUp 1s var(--ease-out) .56s forwards;
}

/* Primary button */
.pf-btn{
  position:relative; display:inline-flex; align-items:center; gap:12px;
  background:linear-gradient(135deg,#14120E 0%,#2E2A22 100%); 
  color: #FFFFFF !important; /* Puting text */
  padding:16px 32px; border-radius:12px; overflow:hidden;
  font-family:var(--sans); font-weight:600; font-size:.76rem;
  letter-spacing:.14em; text-transform:uppercase;
  text-shadow: 0 1px 2px rgba(0,0,0,0.2); /* Shadow para readable kahit gold bg */
  box-shadow: 0 1px 0 rgba(255,255,255,.15) inset, 0 -1px 0 rgba(0,0,0,.3) inset, 0 10px 24px -8px rgba(20,18,14,.4);
  transition:transform .4s var(--ease-out), box-shadow .4s var(--ease);
}
.pf-btn span, .pf-btn svg { position:relative; z-index:2; }
.pf-btn::before{
  content:""; position:absolute; inset:0; z-index:0;
  background:linear-gradient(135deg,var(--gold),var(--gold-2)); opacity:0;
  transition:opacity .4s var(--ease);
}
.pf-btn:hover{ 
  transform:translateY(-2px); 
  box-shadow: 0 1px 0 rgba(255,255,255,.3) inset, 0 -1px 0 rgba(0,0,0,.2) inset, 0 16px 36px -10px rgba(168,135,78,.4); 
}
.pf-btn:hover::before{ opacity:1; }

/* Ghost button */
.pf-btn-ghost{
  display:inline-flex; align-items:center; gap:12px;
  font-family:var(--sans); font-weight:600; font-size:.76rem;
  letter-spacing:.14em; text-transform:uppercase;
  color:var(--ink); padding:14px 22px; border-radius:12px;
  background:linear-gradient(180deg,rgba(255,255,255,.9),rgba(247,244,236,.7));
  border:1px solid rgba(168,135,78,.2);
  box-shadow:0 1px 0 rgba(255,255,255,.95) inset, 0 4px 12px -4px rgba(20,18,14,.1);
  transition:all .4s var(--ease-out);
}
.pf-btn-ghost::before{ content:"←"; font-size:1.1rem; transition:transform .4s var(--ease); }
.pf-btn-ghost:hover{ 
  color:var(--gold); transform:translateY(-2px);
  border-color:rgba(168,135,78,.45);
  box-shadow:0 1px 0 rgba(255,255,255,.95) inset, 0 8px 20px -6px rgba(168,135,78,.3);
}
.pf-btn-ghost:hover::before{ transform:translateX(-4px); }

/* Hero visual (portrait) - 3D Framed */
.pf-hero .visual{
  position:relative; aspect-ratio:4/5; overflow:hidden;
  background:linear-gradient(180deg, rgba(255,255,255,.7), rgba(247,244,236,.5));
  border:1px solid rgba(255,255,255,.8); border-radius:24px;
  box-shadow: var(--shadow-2);
  clip-path:inset(0 0 100% 0);
  animation:pfWipe 1.4s var(--ease-out) .3s forwards;
  transition: transform 0.6s var(--ease-out), box-shadow 0.6s var(--ease);
}
.pf-hero .visual::after{
  content:""; position:absolute; inset:12px;
  border:1px solid rgba(168,135,78,.15); border-radius:16px;
  pointer-events:none; z-index:2; transition:border-color .4s;
}
.pf-hero .visual:hover {
  transform: translateY(-4px) rotate(-0.5deg);
  box-shadow: 0 1px 0 rgba(255,255,255,.95) inset, 0 20px 60px -12px rgba(20,18,14,.24), 0 60px 120px -60px rgba(20,18,14,.3);
}
.pf-hero .visual:hover::after { border-color: rgba(168,135,78,.35); }

.pf-hero .visual img{
  width:100%; height:100%; object-fit:cover; display:block;
  filter:grayscale(25%) contrast(.98);
  transform:scale(1.02);
  transition:transform 1.2s var(--ease-out), filter 1s var(--ease);
}
.pf-hero .visual:hover img{ transform:scale(1.06); filter:grayscale(0%); }

.pf-hero .visual .spotlight{
  position:absolute; inset:0; z-index:1; pointer-events:none;
  background:radial-gradient(260px circle at var(--mx,50%) var(--my,50%), rgba(230,211,168,.22), transparent 60%);
  opacity:0; transition:opacity .5s var(--ease);
}
.pf-hero .visual:hover .spotlight{ opacity:1; }

@keyframes pfUp{ from{opacity:0; transform:translateY(16px)} to{opacity:1; transform:none} }
@keyframes pfWipe{ to{ clip-path:inset(0 0 0 0); } }

/* =========================================================
   MINDSET (Dark Slab)
   ========================================================= */
.pf-mindset{
  padding:var(--section-y) 0;
  position:relative;
}
.pf-mindset::before{
  content:""; position:absolute; inset:0;
  background:linear-gradient(135deg, #14120E 0%, #1a1712 100%);
  z-index:0; border-radius:32px;
  margin:0 clamp(12px,3vw,48px);
  box-shadow: 0 1px 0 rgba(255,255,255,.05) inset, 0 -1px 0 rgba(0,0,0,.4) inset, 0 30px 80px -20px rgba(20,18,14,.4);
}
.pf-mindset .container{ position:relative; z-index:2; text-align:center; }
.pf-mindset blockquote{
  font-family:var(--serif); font-weight:300;
  font-size:clamp(1.6rem,4vw,3rem);
  line-height:1.3; letter-spacing:-.02em;
  margin:0 auto; max-width:900px; quotes:none;
  color:var(--ivory);
  text-shadow: 0 1px 0 rgba(0,0,0,.3);
}
.pf-mindset blockquote em{
  display:inline-block; color:var(--gold-3);
  font-style:italic; margin-top:24px;
  font-size:.55em; letter-spacing:.02em;
}
/* Giant quote mark behind text */
.pf-mindset::after{
  content:"“"; position:absolute; top:10%; left:50%;
  transform:translateX(-50%);
  font-family:var(--serif); font-style:italic;
  font-size:clamp(220px,30vw,420px); line-height:1;
  color:rgba(230,211,168,.06); pointer-events:none; z-index:1;
}

/* =========================================================
   ABOUT
   ========================================================= */
.pf-about{
  padding:var(--section-y) 0;
}
.pf-about .grid{
  display:grid; grid-template-columns:1fr 1.5fr;
  gap:clamp(40px,8vw,120px); align-items:start;
}
.pf-about .kicker{
  font-size:.7rem; font-weight:600; letter-spacing:.22em; text-transform:uppercase;
  color:var(--gold); margin:0 0 20px; display:inline-flex; align-items:center; gap:12px;
  padding:10px 18px; border-radius:999px;
  background:linear-gradient(180deg,rgba(255,255,255,.9),rgba(247,244,236,.6));
  border:1px solid rgba(168,135,78,.22);
  box-shadow:0 1px 0 rgba(255,255,255,.9) inset, 0 4px 12px -4px rgba(168,135,78,.15);
}
.pf-about .kicker::before { content: ""; width: 6px; height: 6px; border-radius: 50%; background: var(--gold); box-shadow: 0 0 0 4px rgba(168,135,78,.15); }
.pf-about h2{
  font-family:var(--serif); font-weight:300;
  font-size:clamp(2rem,4vw,3.5rem);
  line-height:1.1; letter-spacing:-.025em; margin:0; color:var(--ink);
  text-shadow: 0 1px 0 rgba(255,255,255,.7);
}
.pf-about h2 em{
  font-style:italic;
  background:linear-gradient(135deg,#8f6f3a,var(--gold),var(--gold-2));
  -webkit-background-clip:text; background-clip:text;
  -webkit-text-fill-color:transparent; color:transparent;
}

/* About text panel */
.pf-about .bio-content{
  font-size:1.05rem; font-weight:300; line-height:1.85; color:var(--ink-3);
  padding:clamp(32px,4vw,48px); border-radius:24px;
  background:linear-gradient(180deg, rgba(255,255,255,.75), rgba(247,244,236,.55));
  border:1px solid rgba(255,255,255,.7); backdrop-filter:blur(12px);
  box-shadow: var(--shadow-1); position:relative;
}
.pf-about .bio-content::before{
  content:""; position:absolute; left:0; top:32px; bottom:32px; width:2px;
  border-radius:2px; background:linear-gradient(180deg,var(--gold),var(--gold-2));
  box-shadow:0 0 10px rgba(196,165,102,.5);
}
.pf-about .bio-content p:first-of-type{
  font-family:var(--serif); font-size:1.25rem; font-weight:400;
  color:var(--ink); line-height:1.6;
  padding-left:24px; margin-bottom:32px;
}
.pf-about .bio-content p{ margin:0 0 24px; padding-left:24px; }
.pf-about .bio-content p:last-child{ margin-bottom:0; }

/* =========================================================
   SKILLS
   ========================================================= */
.pf-skills{ padding:var(--section-y) 0; }
.pf-skills .section-head{
  display:flex; justify-content:space-between; align-items:baseline;
  gap:24px; margin-bottom:56px;
  padding-bottom:24px; border-bottom:1px solid var(--line);
}
.pf-skills h2{
  font-family:var(--serif); font-weight:300;
  font-size:clamp(2rem,4vw,3.5rem);
  letter-spacing:-.025em; margin:0; color:var(--ink);
}
.pf-skills h2 em{
  font-style:italic;
  background:linear-gradient(135deg,#8f6f3a,var(--gold),var(--gold-2));
  -webkit-background-clip:text; background-clip:text;
  -webkit-text-fill-color:transparent; color:transparent;
}
.pf-skills .subtitle{
  font-size:.74rem; font-weight:600; letter-spacing:.18em;
  text-transform:uppercase; color:var(--muted);
}

/* 3D Skill Cards */
.skill-cards{
  display:grid; grid-template-columns:repeat(3,1fr);
  gap:clamp(16px,2vw,24px);
}
.skill-card{
  position:relative; padding:clamp(24px,3vw,32px);
  background:linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.65));
  border:1px solid rgba(255,255,255,.7);
  border-radius:20px; overflow:hidden;
  box-shadow: var(--shadow-1);
  transition:transform .5s var(--ease-out), box-shadow .5s var(--ease), border-color .4s;
}
.skill-card::before{
  content:""; position:absolute; left:0; top:0; bottom:0; width:3px;
  background:linear-gradient(to bottom,var(--gold),var(--gold-2));
  transform:scaleY(0); transform-origin:top;
  transition:transform .5s var(--ease);
}
.skill-card:hover{
  border-color:rgba(168,135,78,.4); transform:translateY(-6px);
  box-shadow: var(--shadow-2);
}
.skill-card:hover::before{ transform:scaleY(1); }

.skill-card .num{
  font-family:var(--serif); font-style:italic;
  font-size:1.15rem; color:var(--gold);
  display:block; margin-bottom:16px;
}
.skill-card h3{
  font-family:var(--serif); font-size:1.4rem; font-weight:400;
  margin:0 0 12px; color:var(--ink); letter-spacing:-.01em;
  transition:color 0.3s;
}
.skill-card:hover h3 { color: var(--gold); }
.skill-card p{
  font-size:.94rem; font-weight:300; line-height:1.7;
  color:var(--ink-3); margin:0;
}

/* =========================================================
   HOBBIES
   ========================================================= */
.pf-hobbies{
  padding:var(--section-y) 0;
}
.pf-hobbies h2{
  font-family:var(--serif); font-weight:300;
  font-size:clamp(2rem,4vw,3.5rem);
  letter-spacing:-.025em; margin:0 0 56px;
  color:var(--ink); text-align:center;
}
.pf-hobbies h2 em{
  font-style:italic;
  background:linear-gradient(135deg,#8f6f3a,var(--gold),var(--gold-2));
  -webkit-background-clip:text; background-clip:text;
  -webkit-text-fill-color:transparent; color:transparent;
}

.hobbies-grid{
  display:grid; grid-template-columns:repeat(3,1fr);
  gap:clamp(16px,2vw,24px); max-width:960px; margin:0 auto;
}
.hobby-item{
  position:relative; display:flex; flex-direction:column;
  align-items:center; justify-content:center; gap:16px;
  padding:clamp(24px,3vw,32px) 20px; text-align:center;
  background:linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.65));
  border:1px solid rgba(255,255,255,.7);
  border-radius:20px; overflow:hidden;
  box-shadow: var(--shadow-1);
  transition:transform .4s var(--ease-out), box-shadow .4s var(--ease), border-color .4s;
}
.hobby-item::before{
  content:""; position:absolute; inset:0;
  background:linear-gradient(135deg, rgba(196,165,102,.10), transparent 55%);
  opacity:0; transition:opacity .4s var(--ease);
  pointer-events:none;
}
.hobby-item > *{ position:relative; z-index:1; }

.hobby-icon{
  display:grid; place-items:center;
  width:60px; height:60px; border-radius:16px;
  background:linear-gradient(160deg, rgba(255,255,255,.9), rgba(247,244,236,.6));
  border:1px solid rgba(168,135,78,.15);
  color:var(--gold);
  box-shadow: 0 1px 0 rgba(255,255,255,.9) inset, 0 4px 10px -2px rgba(20,18,14,.05);
  transition:transform .5s var(--ease), background .4s, border-color .4s, box-shadow .4s;
}
.hobby-icon svg{ width:28px; height:28px; fill:currentColor; }

.hobby-item span{
  font-family:var(--sans); font-size:.9rem; font-weight:600;
  color:var(--ink-3); letter-spacing:.04em; position:relative;
  transition:color .3s;
}
.hobby-item span::after{
  content:""; position:absolute; left:50%; bottom:-8px;
  width:0; height:2px; border-radius:2px; background:var(--gold);
  transform:translateX(-50%);
  transition:width .5s var(--ease);
}

.hobby-item:hover, .hobby-item:focus-visible{
  border-color:rgba(168,135,78,.4); transform:translateY(-4px);
  box-shadow: var(--shadow-2);
}
.hobby-item:hover::before{ opacity:1; }
.hobby-item:hover .hobby-icon{
  color:var(--ivory); background:linear-gradient(135deg,var(--gold),var(--gold-2));
  border-color:transparent; transform:rotate(-6deg) scale(1.05);
  box-shadow: 0 6px 16px -4px rgba(168,135,78,.4);
}
.hobby-item:hover span{ color:var(--gold); }
.hobby-item:hover span::after{ width:60%; }

/* =========================================================
   CTA (Dark Slab)
   ========================================================= */
.pf-cta{
  padding:var(--section-y) 0;
  position:relative;
}
.pf-cta::before{
  content:""; position:absolute; inset:0;
  background:linear-gradient(135deg, #14120E 0%, #1a1712 100%);
  z-index:0; border-radius:32px;
  margin:0 clamp(12px,3vw,48px);
  box-shadow: 0 1px 0 rgba(255,255,255,.05) inset, 0 -1px 0 rgba(0,0,0,.4) inset, 0 30px 80px -20px rgba(20,18,14,.4);
}
.pf-cta .container{ position:relative; z-index:1; text-align:center; }
.pf-cta h2{
  font-family:var(--serif); font-weight:300;
  font-size:clamp(2.4rem,5vw,4.4rem);
  line-height:1; letter-spacing:-.035em; margin:0 0 24px;
  color:var(--ivory); text-shadow: 0 1px 0 rgba(0,0,0,.3);
}
.pf-cta h2 em{
  font-style:italic;
  background:linear-gradient(135deg, var(--gold) 0%, var(--gold-2) 50%, var(--gold-3) 100%);
  -webkit-background-clip:text; background-clip:text;
  -webkit-text-fill-color:transparent; color:transparent;
}
.pf-cta p{
  color:rgba(247,244,236,.7); font-weight:300; line-height:1.8;
  margin:0 auto 48px; max-width:46ch; font-size:1.04rem;
}

.pf-cta .socials{
  display:flex; justify-content:center; gap:14px; flex-wrap:wrap;
}
.pf-cta .socials a{
  display:inline-flex; align-items:center; gap:10px;
  font-size:.74rem; font-weight:600; letter-spacing:.14em; text-transform:uppercase;
  color:var(--ivory); padding:12px 22px; border-radius:50px;
  background: rgba(255,255,255,.06);
  border:1px solid rgba(255,255,255,.1);
  transition:all .35s var(--ease);
}
.pf-cta .socials a svg{
  width:16px; height:16px; fill:currentColor;
  transition:transform .35s var(--ease);
}
.pf-cta .socials a:hover{
  background:var(--gold); color:var(--ink); border-color:var(--gold);
  transform:translateY(-2px);
  box-shadow: 0 10px 24px -8px rgba(168,135,78,.5);
}
.pf-cta .socials a:hover svg{ transform:scale(1.1); }

/* =========================================================
   RESPONSIVE & REDUCED MOTION
   ========================================================= */
@media (max-width:900px){
  .pf-hero .grid{ grid-template-columns:1fr; gap:48px; text-align:center; }
  .pf-hero .visual{ aspect-ratio:1/1; max-width:360px; margin:0 auto; }
  .pf-hero .kicker { margin: 0 auto 32px; }
  .pf-buttons { justify-content: center; }
  .pf-about .grid{ grid-template-columns:1fr; gap:32px; text-align:center; }
  .pf-about .bio-content::before { display: none; }
  .pf-about .bio-content p:first-of-type, .pf-about .bio-content p { padding-left: 0; }
  .skill-cards{ grid-template-columns:1fr; }
  .hobbies-grid{ grid-template-columns:1fr 1fr; }
  .pf-skills .section-head{ flex-direction:column; align-items:center; gap:12px; text-align:center; }
}
@media (max-width:520px){
  .hobbies-grid{ grid-template-columns:1fr; }
  .pf-buttons{ flex-direction:column; align-items:stretch; }
  .pf-btn, .pf-btn-ghost{ justify-content:center; }
}
@media (prefers-reduced-motion:reduce){
  .portfolio-page *, .portfolio-page *::before, .portfolio-page *::after{
    animation:none !important; transition:none !important;
  }
  .pf-hero .kicker,.pf-hero h1,.pf-hero .tagline,.pf-buttons{ opacity:1 !important; transform:none !important; }
  .pf-hero .visual{ clip-path:none !important; }
  .pp-progress,.pp-glow,.pf-cube{ display:none; }
}
</style>

<!-- Reading progress -->
<div class="pp-progress" id="ppProgress" aria-hidden="true"></div>

<!-- Cursor glow -->
<div class="pp-glow" id="ppGlow" aria-hidden="true"></div>

<main class="portfolio-page">

  <!-- HERO -->
  <section class="pf-hero">
    <div class="pf-cube" aria-hidden="true">
      <span></span><span></span><span></span><span></span><span></span><span></span>
    </div>
    <div class="container">
      <div class="grid">
        <div class="text">
          <p class="kicker">System Developer</p>
          <h1>Hi, I'm <em><?php echo esc_html($first_name); ?>.</em></h1>
          <p class="tagline">
            A self-taught system developer who believes that the best way to learn
            is to build. I may not know everything yet, but I am persistent,
            resourceful, and committed to delivering results on time.
          </p>
          <div class="pf-buttons">
            <a href="#contact" class="pf-btn"><span>Get in Touch</span></a>
            <a href="<?php echo esc_url(home_url('/our-members/')); ?>" class="pf-btn-ghost">Back to Members</a>
          </div>
        </div>
        <div class="visual" id="pfPortrait">
          <img
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/frankdp.jpg'); ?>"
            alt="<?php echo esc_attr($member_name); ?>"
            loading="lazy">
          <span class="spotlight" aria-hidden="true"></span>
        </div>
      </div>
    </div>
  </section>

  <!-- MINDSET -->
  <section class="pf-mindset" aria-label="Personal philosophy">
    <div class="container">
      <blockquote>
        “ Ang kabiguan ay hindi katapusan, kundi bahagi ng paglalakbay tungo sa tagumpay. ”
        <em>— Frank</em>
      </blockquote>
    </div>
  </section>

  <!-- ABOUT -->
  <section class="pf-about">
    <div class="container">
      <div class="grid">
        <div>
          <p class="kicker">About Me</p>
          <h2>A mind for <em>growth.</em></h2>
        </div>
        <div class="bio-content">
          <p>
            As a system developer, I don't just focus on writing code. I focus on understanding
            how the entire system works — from the database to the user interface. I'm driven
            by curiosity and the desire to solve real problems.
          </p>
          <p>
            I believe that being a great developer isn't about knowing everything from the start.
            It's about being resourceful enough to figure things out, persistent enough to push
            through challenges, and disciplined enough to finish tasks right on schedule.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- SKILLS -->
  <section class="pf-skills" aria-labelledby="skills-heading">
    <div class="container">
      <div class="section-head">
        <h2 id="skills-heading">How I <em>work.</em></h2>
        <p class="subtitle">Core Competencies</p>
      </div>
      <div class="skill-cards">
        <div class="skill-card">
          <span class="num">01</span>
          <h3>System Development</h3>
          <p>Understanding how different components of an application communicate. Building from the ground up with a focus on logic and structure.</p>
        </div>
        <div class="skill-card">
          <span class="num">02</span>
          <h3>Continuous Learning</h3>
          <p>I don't claim to know everything. But I am highly adaptable, resourceful, and capable of learning new technologies on the fly to solve problems.</p>
        </div>
        <div class="skill-card">
          <span class="num">03</span>
          <h3>Punctual Delivery</h3>
          <p>Discipline over motivation. I organize my tasks, manage my time wisely, and ensure that projects are completed within the agreed deadline.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- HOBBIES -->
  <section class="pf-hobbies" aria-labelledby="hobbies-heading">
    <div class="container">
      <h2 id="hobbies-heading">Beyond the <em>screen.</em></h2>
      <div class="hobbies-grid">

        <a href="<?php echo esc_url(home_url('/hobbies/chess/')); ?>" class="hobby-item" aria-label="Hobby — Chess">
          <div class="hobby-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24"><path d="M19,22H5V20H19V22M17,10C17,7.24 14.76,5 12,5C9.24,5 7,7.24 7,10C7,12.03 8.21,13.77 10,14.58V17H14V14.58C15.79,13.77 17,12.03 17,10M12,3C15.87,3 19,6.13 19,10C19,12.41 17.71,14.53 15.78,15.71L16,17H8L8.22,15.71C6.29,14.53 5,12.41 5,10C5,6.13 8.13,3 12,3Z"/></svg>
          </div>
          <span>Chess</span>
        </a>

        <a href="<?php echo esc_url(home_url('/hobbies/online-games/')); ?>" class="hobby-item" aria-label="Hobby — Online Games">
          <div class="hobby-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24"><path d="M7.97,16L5,19C4.67,19.3 4.23,19.5 3.75,19.5A1.75,1.75 0 0,1 2,17.75V17.5L3,10.12C3.21,7.81 5.14,6 7.5,6H16.5C18.86,6 20.79,7.81 21,10.12L22,17.5V17.75A1.75,1.75 0 0,1 20.25,19.5C19.77,19.5 19.33,19.3 19,19L16.03,16H7.97M7,9V11H5V12H7V14H8V12H10V11H8V9H7M16.5,9A1,1 0 0,0 15.5,10A1,1 0 0,0 16.5,11A1,1 0 0,0 17.5,10A1,1 0 0,0 16.5,9M14.5,12A1,1 0 0,0 13.5,13A1,1 0 0,0 14.5,14A1,1 0 0,0 15.5,13A1,1 0 0,0 14.5,12Z"/></svg>
          </div>
          <span>Online Games</span>
        </a>

        <a href="<?php echo esc_url(home_url('/hobbies/dama/')); ?>" class="hobby-item" aria-label="Hobby — Dama">
          <div class="hobby-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24"><path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10Z"/></svg>
          </div>
          <span>Dama</span>
        </a>

        <a href="<?php echo esc_url(home_url('/hobbies/home-workout/')); ?>" class="hobby-item" aria-label="Hobby — Home Workout">
          <div class="hobby-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24"><path d="M20.57,14.86L22,13.43L20.57,12L17,15.57L8.43,7L12,3.43L10.57,2L9.14,3.43L7.71,2L5.57,4.14L4.14,2.71L2.71,4.14L4.14,5.57L2,7.71L3.43,9.14L2,10.57L3.43,12L7,8.43L15.57,17L12,20.57L13.43,22L14.86,20.57L16.29,22L18.43,19.86L19.86,21.29L21.29,19.86L19.86,18.43L22,16.29L20.57,14.86Z"/></svg>
          </div>
          <span>Home Workout</span>
        </a>

        <a href="<?php echo esc_url(home_url('/hobbies/building-systems/')); ?>" class="hobby-item" aria-label="Hobby — Building Systems">
          <div class="hobby-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24"><path d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z"/></svg>
          </div>
          <span>Building Systems</span>
        </a>

        <a href="<?php echo esc_url(home_url('/hobbies/reading/')); ?>" class="hobby-item" aria-label="Hobby — Reading and Learning">
          <div class="hobby-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24"><path d="M21,5C19.89,4.65 18.67,4.5 17.5,4.5C15.55,4.5 13.45,4.9 12,6C10.55,4.9 8.45,4.5 6.5,4.5C4.55,4.5 2.45,4.9 1,6V20.65C1,20.9 1.25,21.15 1.5,21.15C1.6,21.15 1.65,21.1 1.75,21.1C3.1,20.45 5.05,20 6.5,20C8.45,20 10.55,20.4 12,21.5C13.45,20.4 15.55,20 17.5,20C19.15,20 20.8,20.3 22.25,21.05C22.35,21.1 22.4,21.1 22.5,21.1C22.75,21.1 23,20.85 23,20.6V6C22.4,5.55 21.75,5.25 21,5M21,18.5C19.9,18.15 18.7,18 17.5,18C15.8,18 14.1,18.35 12.5,19V8C14.1,7.35 15.8,7 17.5,7C18.7,7 19.9,7.15 21,7.5V18.5Z"/></svg>
          </div>
          <span>Reading &amp; Learning</span>
        </a>

      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="pf-cta" id="contact">
    <div class="container">
      <h2>Let's build <em>together.</em></h2>
      <p>For more info kindly message me on any of the platforms below.</p>

      <div class="socials">
        <a href="https://www.facebook.com/frankjames.generalao" target="_blank" rel="noopener noreferrer" aria-label="Facebook — Frank James Generalao (opens in new tab)">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          Facebook
        </a>
        <a href="https://www.instagram.com/prangkoo__" target="_blank" rel="noopener noreferrer" aria-label="Instagram — @prangkoo__ (opens in new tab)">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
          Instagram
        </a>
        <a href="https://t.me/abododo27" target="_blank" rel="noopener noreferrer" aria-label="Telegram — @abododo27 (opens in new tab)">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9.78 18.65l.28-4.23 7.68-6.92c.34-.31-.07-.46-.52-.19L7.74 13.3 3.64 12c-.88-.25-.89-.86.2-1.3l15.97-6.16c.73-.33 1.43.18 1.15 1.3l-2.72 12.81c-.19.91-.74 1.13-1.5.71L12.6 16.3l-1.99 1.93c-.23.23-.42.42-.83.42z"/></svg>
          Telegram
        </a>
      </div>
    </div>
  </section>

</main>

<script>
(function(){
  'use strict';
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const finePointer  = window.matchMedia('(hover:hover) and (pointer:fine)').matches;

  /* ---------- 1. Reading progress ---------- */
  const bar = document.getElementById('ppProgress');
  if (bar && !reduceMotion) {
    let tick = false;
    const update = () => {
      const max = document.documentElement.scrollHeight - window.innerHeight;
      bar.style.width = (max > 0 ? (window.scrollY / max) * 100 : 0) + '%';
      tick = false;
    };
    window.addEventListener('scroll', () => {
      if (!tick) { requestAnimationFrame(update); tick = true; }
    }, { passive: true });
    update();
  }

  /* ---------- 2. Cursor glow ---------- */
  const glow = document.getElementById('ppGlow');
  if (glow && !reduceMotion && finePointer) {
    let raf = null, lx = 0, ly = 0;
    document.addEventListener('mousemove', (e) => {
      lx = e.clientX; ly = e.clientY;
      if (!raf) {
        raf = requestAnimationFrame(() => {
          glow.style.transform = `translate3d(${lx - 210}px, ${ly - 210}px, 0)`;
          raf = null;
        });
      }
    }, { passive: true });
  }

  /* ---------- 3. Portrait cursor spotlight ---------- */
  const portrait = document.getElementById('pfPortrait');
  if (portrait && !reduceMotion && finePointer) {
    portrait.addEventListener('mousemove', (e) => {
      const r = portrait.getBoundingClientRect();
      portrait.style.setProperty('--mx', (e.clientX - r.left) + 'px');
      portrait.style.setProperty('--my', (e.clientY - r.top) + 'px');
    });
  }
})();
</script>

<?php get_footer(); ?>
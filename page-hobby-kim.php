<?php
/**
 * Template Name: Hobby Detail Page - kim
 * Template Post Type: page
 * Ultra 3D Aesthetic Edition v3 — Deep Enhanced
 */
get_header(); 

global $post;
$slug = $post->post_name;

// Dynamic Data Base sa Slug
$hobby_data = [
    'watching-drama' => [
        'title' => 'Watching Drama',
        'icon' => '<path d="M21,3H3C1.89,3 1,3.89 1,5V17A2,2 0 0,0 3,19H8V21H16V19H21A2,2 0 0,0 23,17V5C23,3.89 22.1,3 21,3M21,17H3V5H21M16,11L9,15V7"/>',
        'desc' => 'Immersion in stories, cultures, and emotions. Whether it\'s a gripping K-Drama or a thrilling Western series, it\'s my way to unwind and explore different worlds.',
        'quote' => '"Every series is a new perspective waiting to be discovered."',
        'fun_facts' => [
            ['num' => '50+', 'label' => 'Series Finished'],
            ['num' => '1K+', 'label' => 'Hours Watched'],
            ['num' => '4', 'label' => 'Fave Genres']
        ],
        'gallery' => [
            'https://images.unsplash.com/photo-1522869635100-9f4c5e86aa37?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1594909122845-11baa439b7bf?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1574375927938-d5a98e8ffe85?q=80&w=800&auto=format&fit=crop'
        ]
    ],
    'singing' => [
        'title' => 'Singing',
        'icon' => '<path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12C20,12.5 19.92,12.96 19.76,13.39C19.21,12.11 17.89,11.25 16.5,11.25C15.93,11.25 15.41,11.42 15,11.71C14.59,11.42 14.07,11.25 13.5,11.25C12.11,11.25 10.79,12.11 10.24,13.39C10.08,12.96 10,12.5 10,12A2,2 0 0,1 12,10C13.11,10 14,10.89 14,12C14,13.11 13.11,14 12,14A2,2 0 0,1 10,12C10,13.66 11.34,15 13,15C14.12,15 15.16,14.32 15.75,13.38C16.34,14.32 17.38,15 18.5,15C19.66,15 20.73,14.28 21.31,13.3C19.75,18.18 15.16,22 9,22A8,8 0 0,1 4,12A8,8 0 0,1 12,4Z"/>',
        'desc' => 'Music is the language of the soul. Singing allows me to express emotions that words alone cannot capture.',
        'quote' => '"Where words fail, music speaks."',
        'fun_facts' => [
            ['num' => '100+', 'label' => 'Songs Mastered'],
            ['num' => '5', 'label' => 'Vocal Ranges'],
            ['num' => '3', 'label' => 'Open Mic Nights']
        ],
        'gallery' => [
            'https://images.unsplash.com/photo-1516280440502-861f28b4c2f0?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1520523839897-bd0b52f945a0?q=80&w=800&auto=format&fit=crop'
        ]
    ],
    'dancing' => [
        'title' => 'Dancing',
        'icon' => '<path d="M12,2A3,3 0 0,1 15,5A3,3 0 0,1 12,8A3,3 0 0,1 9,5A3,3 0 0,1 12,2M9,9H15A2,2 0 0,1 17,11V14L15,14V22H13V18H11V22H9V14L7,14V11A2,2 0 0,1 9,9M5,14A2,2 0 0,1 7,16V17H5V14M19,14A2,2 0 0,0 17,16V17H19V14Z"/>',
        'desc' => 'Movement is freedom. Dancing keeps me active, sharpens my coordination, and brings pure joy after a long day of coding.',
        'quote' => '"Dance is the hidden language of the soul."',
        'fun_facts' => [
            ['num' => '8', 'label' => 'Dance Styles'],
            ['num' => '200+', 'label' => 'Hours Practiced'],
            ['num' => '12', 'label' => 'Performances']
        ],
        'gallery' => [
            'https://images.unsplash.com/photo-1547153760-18fc86324498?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1535525153412-5a42439a210d?q=80&w=800&auto=format&fit=crop'
        ]
    ],
    'online-games-kim' => [
        'title' => 'Online Games',
        'icon' => '<path d="M7.97,16L5,19C4.67,19.3 4.23,19.5 3.75,19.5A1.75,1.75 0 0,1 2,17.75V17.5L3,10.12C3.21,7.81 5.14,6 7.5,6H16.5C18.86,6 20.79,7.81 21,10.12L22,17.5V17.75A1.75,1.75 0 0,1 20.25,19.5C19.77,19.5 19.33,19.3 19,19L16.03,16H7.97M7,9V11H5V12H7V14H8V12H10V11H8V9H7M16.5,9A1,1 0 0,0 15.5,10A1,1 0 0,0 16.5,11A1,1 0 0,0 17.5,10A1,1 0 0,0 16.5,9M14.5,12A1,1 0 0,0 13.5,13A1,1 0 0,0 14.5,14A1,1 0 0,0 15.5,13A1,1 0 0,0 14.5,12Z"/>',
        'desc' => 'Strategic thinking meets fun. Playing online games with friends helps me build teamwork, quick reflexes, and problem-solving skills.',
        'quote' => '"The best stories are the ones we play."',
        'fun_facts' => [
            ['num' => 'Diamond', 'label' => 'Peak Rank'],
            ['num' => '20+', 'label' => 'Games Played'],
            ['num' => '500+', 'label' => 'Matches Won']
        ],
        'gallery' => [
            'https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1538481199705-c710c4e965fc?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1552820728-8b83bb6b773f?q=80&w=800&auto=format&fit=crop'
        ]
    ],
    'reading-books' => [
        'title' => 'Reading Books',
        'icon' => '<path d="M21,5C19.89,4.65 18.67,4.5 17.5,4.5C15.55,4.5 13.45,4.9 12,6C10.55,4.9 8.45,4.5 6.5,4.5C4.55,4.5 2.45,4.9 1,6V20.65C1,20.9 1.25,21.15 1.5,21.15C1.6,21.15 1.65,21.1 1.75,21.1C3.1,20.45 5.05,20 6.5,20C8.45,20 10.55,20.4 12,21.5C13.45,20.4 15.55,20 17.5,20C19.15,20 20.8,20.3 22.25,21.05C22.35,21.1 22.4,21.1 22.5,21.1C22.75,21.1 23,20.85 23,20.6V6C22.4,5.55 21.75,5.25 21,5M21,18.5C19.9,18.15 18.7,18 17.5,18C15.8,18 14.1,18.35 12.5,19V8C14.1,7.35 15.8,7 17.5,7C18.7,7 19.9,7.15 21,7.5V18.5Z"/>',
        'desc' => 'Books are portals to endless knowledge. Reading expands my vocabulary, improves focus, and fuels my imagination.',
        'quote' => '"A reader lives a thousand lives before he dies."',
        'fun_facts' => [
            ['num' => '30+', 'label' => 'Books Read'],
            ['num' => '5', 'label' => 'Fave Authors'],
            ['num' => '2', 'label' => 'Reading Goals']
        ],
        'gallery' => [
            'https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1495446815901-a7297e633e8d?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=800&auto=format&fit=crop'
        ]
    ]
];

$data = isset($hobby_data[$slug]) ? $hobby_data[$slug] : $hobby_data['reading-books'];
?>

<style>
/* ===== HOBBY PAGE — Ultra 3D Edition v3 ===== */
.hobby-page {
  --ivory:#F7F4EC; --paper:#FBFAF5;
  --ink:#14120E; --ink-3:#4A443A;
  --gold:#A8874E; --gold-2:#C4A566; --gold-3:#D4BC8B;
  --line:rgba(168,135,78,.16);
  --muted:#7A7266;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  --ease:cubic-bezier(.22,.8,.2,1); --ease-out:cubic-bezier(.16,1,.3,1);
  
  --shadow-1: 0 1px 0 rgba(255,255,255,.9) inset, 0 -1px 0 rgba(168,135,78,.06) inset, 0 2px 4px rgba(20,18,14,.04), 0 8px 24px -8px rgba(20,18,14,.12), 0 20px 40px -20px rgba(20,18,14,.18);
  --shadow-2: 0 1px 0 rgba(255,255,255,.95) inset, 0 -1px 0 rgba(168,135,78,.1) inset, 0 4px 8px rgba(20,18,14,.06), 0 16px 40px -10px rgba(20,18,14,.18), 0 40px 80px -40px rgba(20,18,14,.24);

  background: var(--ivory); color: var(--ink); font-family: var(--sans);
  -webkit-font-smoothing: antialiased; overflow-x: hidden; position: relative;
  min-height: 100vh;
}

/* Custom Scrollbar */
.hobby-page ::-webkit-scrollbar { width: 8px; }
.hobby-page ::-webkit-scrollbar-track { background: var(--ivory); }
.hobby-page ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 10px; }

/* Ambient stage */
.hobby-page::before {
  content: ""; position: fixed; inset: 0; pointer-events: none; z-index: 0;
  background:
    radial-gradient(600px 400px at 15% 5%, rgba(196,165,102,.10), transparent 70%),
    radial-gradient(500px 400px at 85% 10%, rgba(212,188,139,.10), transparent 70%),
    radial-gradient(700px 500px at 50% 100%, rgba(196,165,102,.06), transparent 70%);
}

.hobby-page .container {
  max-width: 1100px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px);
  position: relative; z-index: 2;
}

/* ===== CURSOR GLOW ===== */
.cursor-glow {
  position: fixed; width: 400px; height: 400px; border-radius: 50%;
  background: radial-gradient(circle, rgba(168,135,78,0.12), transparent 70%);
  pointer-events: none; z-index: 1; transform: translate(-50%, -50%);
  will-change: transform;
}
@media (max-width: 768px) { .cursor-glow { display: none; } }

/* Floating orbs */
.hobby-orb {
  position: absolute; border-radius: 50%; pointer-events: none; z-index: 1;
  background: radial-gradient(circle at 35% 30%,rgba(255,255,255,.45),rgba(196,165,102,.35) 40%,transparent 72%);
  filter: blur(2px);
  animation: floatOrb 22s infinite ease-in-out;
  translate:
    calc(var(--px,0) * var(--depth,30) * 1px)
    calc(var(--py,0) * var(--depth,30) * 1px + var(--sy,0) * var(--sdepth,-.08) * 1px);
  will-change: transform, translate;
}
.hobby-orb.o1{width:300px;height:300px;top:10%;right:10%;--depth:-40;--sdepth:-.14}
.hobby-orb.o2{width:160px;height:160px;bottom:20%;right:25%;--depth:60;--sdepth:-.06;animation-delay:6s}
.hobby-orb.o3{width:200px;height:200px;top:40%;left:5%;--depth:-20;--sdepth:-.1;animation-delay:12s}
@keyframes floatOrb {
  0%,100%{transform:translate(0,0) scale(1);opacity:.35}
  50%{transform:translate(30px,-40px) scale(1.15);opacity:.65}
}

/* ===== SHARED TILT + GLARE ===== */
.hobby-page [data-tilt]{position:relative;transform-style:preserve-3d}
.hobby-page [data-tilt]::after{
  content:"";position:absolute;inset:0;border-radius:inherit;pointer-events:none;z-index:2;
  background:radial-gradient(420px circle at var(--mx,50%) var(--my,50%),rgba(255,255,255,.6),transparent 60%);
  opacity:0;transition:opacity .5s var(--ease);
}
.hobby-page [data-tilt]:hover::after{opacity:.65}
.hobby-tilt [data-tilt]{
  transition-property:box-shadow,background,border-color,color,opacity !important;
  will-change:transform;
}

/* ===== HERO ===== */
.hobby-hero {
  padding: clamp(160px, 18vw, 240px) 0 clamp(80px, 10vw, 140px);
  text-align: center; position: relative;
}
.hobby-hero .container {
  translate: 0 calc(var(--sy,0) * .1px);
  opacity: calc(1 - var(--sy,0) * .0006);
}

/* Back Button */
.back-link {
  position: absolute; top: clamp(100px, 12vw, 140px); left: clamp(24px, 6vw, 96px);
  z-index: 10; display: inline-flex; align-items: center; gap: 8px;
  font-family: var(--sans); font-size: .75rem; font-weight: 600;
  letter-spacing: .14em; text-transform: uppercase; color: var(--muted);
  text-decoration: none; transition: color .3s, transform .3s;
}
.back-link:hover { color: var(--gold); transform: translateX(-4px); }

/* 3D Floating Icon Box */
.hobby-icon-large {
  width: 150px; height: 150px; margin: 0 auto 48px;
  display: grid; place-items: center;
  background: linear-gradient(160deg, rgba(255,255,255,.95), rgba(247,244,236,.7));
  border: 1px solid rgba(255,255,255,.9);
  border-radius: 36px;
  box-shadow: 
    var(--shadow-2), 
    inset 0 0 40px rgba(196,165,102,.15);
  color: var(--gold);
  position: relative;
  transform-style: preserve-3d;
  animation: floatIcon 6s ease-in-out infinite;
}
.hobby-icon-large::after {
  content: ""; position: absolute; inset: 12px; border-radius: 24px;
  border: 1px solid rgba(168,135,78,.15); pointer-events: none;
}
.hobby-icon-large svg { 
  width: 72px; height: 72px; fill: currentColor; 
  filter: drop-shadow(0 6px 16px rgba(168,135,78,.4)); 
}
@keyframes floatIcon {
  0%,100% { transform: translateY(0) rotateX(0deg) rotateY(0deg); }
  50% { transform: translateY(-15px) rotateX(8deg) rotateY(-8deg); }
}

.hobby-hero h1 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(3rem, 7vw, 6rem);
  line-height: 1.05; letter-spacing: -0.03em; margin: 0 0 24px; color: var(--ink);
}
.hobby-hero h1 em {
  font-style: italic;
  background: linear-gradient(135deg, #8f6f3a, var(--gold), var(--gold-2), var(--gold-3));
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent;
  filter: drop-shadow(0 2px 6px rgba(168,135,78,.2));
}

.hobby-hero .desc {
  font-size: 1.15rem; font-weight: 300; line-height: 1.85; color: var(--ink-3);
  max-width: 650px; margin: 0 auto;
}

/* ===== STATS / FUN FACTS ===== */
.hobby-stats {
  padding: 0 0 clamp(80px, 10vw, 120px);
}
.stats-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;
  max-width: 800px; margin: 0 auto;
}
.stat-box {
  position: relative; text-align: center; padding: 32px 20px;
  border-radius: 20px;
  background: linear-gradient(180deg, rgba(255,255,255,.9), rgba(247,244,236,.65));
  border: 1px solid rgba(255,255,255,.7);
  box-shadow: var(--shadow-1);
  transition: transform .4s var(--ease-out), box-shadow .4s var(--ease);
  transform-style: preserve-3d;
}
.stat-box::before {
  content: ""; position: absolute; left: 50%; top: 20px; bottom: 20px; width: 2px;
  transform: translateX(-50%); border-radius: 2px;
  background: linear-gradient(180deg, var(--gold), var(--gold-2));
  opacity: .3; box-shadow: 0 0 8px rgba(196,165,102,.5);
}
.stat-box:hover { box-shadow: var(--shadow-2); }
.stat-box .num {
  font-family: var(--serif); font-size: clamp(2.4rem, 4vw, 3.2rem);
  color: var(--ink); display: block; line-height: 1; position: relative; z-index: 1;
  font-variant-numeric: tabular-nums;
}
.stat-box .label {
  font-size: .72rem; font-weight: 600; letter-spacing: .16em; text-transform: uppercase;
  color: var(--muted); margin-top: 12px; display: block; position: relative; z-index: 1;
}

/* ===== QUOTE (Dark Slab) ===== */
.hobby-quote-section {
  padding: 0 0 clamp(80px, 10vw, 140px);
}
.hobby-quote-box {
  padding: clamp(48px, 6vw, 80px) clamp(24px, 4vw, 60px);
  border-radius: 32px;
  background: linear-gradient(135deg, #14120E 0%, #1a1712 100%);
  box-shadow: 0 1px 0 rgba(255,255,255,.05) inset, 0 -1px 0 rgba(0,0,0,.4) inset, 0 30px 80px -20px rgba(20,18,14,.4);
  text-align: center; position: relative; overflow: hidden;
  transform-style: preserve-3d; will-change: transform;
  transform: perspective(1400px) rotateX(calc(var(--p,0) * 3deg)) scale(calc(1 - var(--p,0) * var(--p,0) * .02));
}
.hobby-quote-box::before {
  content: ""; position: absolute; top: 50%; left: 50%; width: 80%; height: 80%;
  background: radial-gradient(circle, rgba(196,165,102,.15), transparent 70%);
  transform: translate(-50%, -50%); pointer-events: none;
}
.hobby-quote-box blockquote {
  position: relative; z-index: 2;
  font-family: var(--serif); font-weight: 300; font-size: clamp(1.8rem, 4vw, 3rem);
  line-height: 1.3; letter-spacing: -0.02em; margin: 0; color: var(--ivory);
  text-shadow: 0 1px 0 rgba(0,0,0,.3);
}

/* ===== GALLERY (3D Tilt Cards) ===== */
.hobby-gallery {
  padding: 0 0 clamp(100px, 12vw, 160px);
}
.gallery-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;
}
.gallery-item {
  position: relative; aspect-ratio: 4/5; border-radius: 20px; overflow: hidden;
  background: var(--paper); border: 1px solid rgba(255,255,255,.8);
  box-shadow: var(--shadow-1);
  transform-style: preserve-3d;
  transition: transform .5s var(--ease-out), box-shadow .5s var(--ease);
}
.gallery-item::after {
  content: ""; position: absolute; inset: 10px; border: 1px solid rgba(168,135,78,.15);
  border-radius: 12px; pointer-events: none; z-index: 2; transition: border-color .4s;
}
.gallery-item:hover {
  border-color: rgba(168,135,78,.4);
  box-shadow: var(--shadow-2);
}
.gallery-item:hover::after { border-color: rgba(168,135,78,.35); }
.gallery-item img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  filter: grayscale(30%); transition: transform 1s var(--ease-out), filter .8s;
  translate: calc(var(--nx,0) * 8px) calc(var(--ny,0) * 8px);
}
.gallery-item:hover img { transform: scale(1.05); filter: grayscale(0%); }

/* ===== CONTENT (Glass Panel) ===== */
.hobby-content {
  padding: 0 0 clamp(100px, 12vw, 180px);
}
.hobby-content .glass-panel {
  padding: clamp(40px, 6vw, 64px);
  border-radius: 24px;
  background: linear-gradient(180deg, rgba(255,255,255,.75), rgba(247,244,236,.55));
  border: 1px solid rgba(255,255,255,.7);
  backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);
  box-shadow: var(--shadow-1);
  position: relative;
  transform:
    perspective(1400px)
    rotateX(calc(var(--p,0) * 3deg))
    scale(calc(1 - var(--p,0) * var(--p,0) * .02));
  transform-origin: 50% 50%; will-change: transform;
}
.hobby-content .glass-panel::before {
  content: ""; position: absolute; left: 0; top: 40px; bottom: 40px; width: 3px;
  border-radius: 3px; background: linear-gradient(180deg, var(--gold), var(--gold-2));
  box-shadow: 0 0 12px rgba(196,165,102,.6);
}
.hobby-content h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2.2rem, 4vw, 3.2rem);
  line-height: 1.1; letter-spacing: -0.02em; margin: 0 0 32px; color: var(--ink);
  padding-left: clamp(16px, 3vw, 32px);
}
.hobby-content h2 em {
  font-style: italic;
  background: linear-gradient(135deg, #8f6f3a, var(--gold), var(--gold-2));
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent;
}
.hobby-content p {
  font-size: 1.1rem; font-weight: 300; line-height: 1.9; color: var(--ink-3);
  margin: 0 0 24px; padding-left: clamp(16px, 3vw, 32px);
}
.hobby-content p:last-child { margin-bottom: 0; }

/* ===== REVEAL ===== */
.hobby-js .reveal { opacity: 0; transform-origin: 50% 100%; }
.hobby-js .reveal.in {
  opacity: 1;
  animation: revealIn 1.15s var(--ease-out) var(--d,0ms) backwards;
}
@keyframes revealIn {
  from { opacity: 0; translate: 0 46px; rotate: 1 0 0 14deg; scale: .96; }
  to { opacity: 1; translate: 0 0; rotate: 1 0 0 0deg; scale: 1; }
}

/* ===== RESPONSIVE ===== */
@media (max-width: 900px) {
  .gallery-grid { grid-template-columns: repeat(2, 1fr); }
  .stats-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
  .back-link { top: 90px; }
  .gallery-grid { grid-template-columns: 1fr; }
  .stats-grid { grid-template-columns: 1fr; }
  .hobby-content .glass-panel::before { display: none; }
  .hobby-content h2, .hobby-content p { padding-left: 0; }
  .hobby-orb { display: none; }
}
@media (prefers-reduced-motion: reduce) {
  .hobby-page *, .hobby-page *::before, .hobby-page *::after {
    animation: none !important; transition: none !important;
  }
  .hobby-js .reveal { opacity: 1; }
  .hobby-quote-box, .hobby-content .glass-panel { transform: none; }
  .hobby-orb, .cursor-glow { display: none; }
}
</style>

<!-- Cursor Glow -->
<div class="cursor-glow" id="hobbyCursorGlow"></div>

<main class="hobby-page">
  <!-- Back Button -->
  <a href="<?php echo esc_url(home_url('/friends/kim/')); ?>" class="back-link">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
    Back to Profile
  </a>

  <!-- HERO -->
  <section class="hobby-hero">
    <div class="hobby-orb o1"></div>
    <div class="hobby-orb o2"></div>
    <div class="hobby-orb o3"></div>

    <div class="container">
      <!-- Dynamic Icon -->
      <div class="hobby-icon-large reveal" data-tilt="8">
        <svg viewBox="0 0 24 24"><?php echo $data['icon']; ?></svg>
      </div>
      
      <!-- Dynamic Title -->
      <h1 class="reveal">
        <?php 
          $title_parts = explode(' ', $data['title']); 
          echo $title_parts[0]; 
          if (isset($title_parts[1])) echo ' <em>' . $title_parts[1] . '</em>';
        ?>
      </h1>
      
      <!-- Dynamic Description -->
      <p class="desc reveal"><?php echo esc_html($data['desc']); ?></p>
    </div>
  </section>

  <!-- STATS / FUN FACTS -->
  <section class="hobby-stats">
    <div class="container">
      <div class="stats-grid">
        <?php foreach ($data['fun_facts'] as $index => $fact) : ?>
          <div class="stat-box reveal" data-tilt="5" style="transition-delay: <?php echo $index * 100; ?>ms;">
            <span class="num"><?php echo esc_html($fact['num']); ?></span>
            <span class="label"><?php echo esc_html($fact['label']); ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- QUOTE (Dark Slab) -->
  <section class="hobby-quote-section">
    <div class="container">
      <div class="hobby-quote-box reveal" data-scroll3d>
        <blockquote><?php echo esc_html($data['quote']); ?></blockquote>
      </div>
    </div>
  </section>

  <!-- GALLERY (Interactive 3D Cards) -->
  <section class="hobby-gallery">
    <div class="container">
      <div class="gallery-grid">
        <?php foreach ($data['gallery'] as $index => $img_url) : ?>
          <div class="gallery-item reveal" data-tilt="6" style="transition-delay: <?php echo $index * 100; ?>ms;">
            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($data['title']); ?> Gallery Image">
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- CONTENT (Glass Panel) -->
  <section class="hobby-content">
    <div class="container">
      <div class="glass-panel reveal" data-scroll3d>
        <h2>Why I <em>love</em> it.</h2>
        <p>
          This hobby isn't just a pastime; it's a part of who I am. It provides a healthy balance to my technical work, 
          allowing me to recharge, find inspiration, and keep my creativity flowing. Whether I'm sharing the experience 
          with friends or enjoying it in solitude, it always brings a sense of fulfillment and joy.
        </p>
        <p>
          Engaging in this activity has taught me valuable lessons in patience, dedication, and the importance of taking 
          breaks. It reminds me that life is about more than just code and projects—it's about the experiences that shape us 
          into well-rounded individuals.
        </p>
      </div>
    </div>
  </section>
</main>

<script>
(function () {
  'use strict';
  var root = document.documentElement;
  root.classList.add('hobby-js');

  var reduce  = matchMedia('(prefers-reduced-motion: reduce)').matches;
  var fine    = matchMedia('(hover: hover) and (pointer: fine)').matches;
  var desktop = matchMedia('(min-width: 769px)').matches;
  var rich    = fine && desktop && !reduce;
  if (rich) root.classList.add('hobby-tilt');

  var $  = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var lerp  = function (a, b, t) { return a + (b - a) * t; };
  var clamp = function (v, a, b) { return Math.min(b, Math.max(a, v)); };

  /* 1. Reveal — 3D rise */
  var io = new IntersectionObserver(function (entries) {
    var shown = entries.filter(function (e) { return e.isIntersecting; });
    shown.forEach(function (entry, i) {
      entry.target.style.setProperty('--d', (reduce ? 0 : i * 90) + 'ms');
      entry.target.classList.add('in');
      io.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
  $$('.reveal').forEach(function (el) { io.observe(el); });

  /* 2. Scroll: hero parallax, scroll-linked 3D */
  var hero  = $('.hobby-hero');
  var s3d   = $$('[data-scroll3d]');
  var ticking = false;

  function onScroll() {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(function () {
      var y = window.scrollY || root.scrollTop;

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

  /* 3. Cursor glow + hero parallax */
  if (rich) {
    var glow = $('#hobbyCursorGlow');
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
        glow.style.transform = 'translate3d(' + (gx - 200).toFixed(1) + 'px,' + (gy - 200).toFixed(1) + 'px,0)';
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

  /* 4. 3D tilt + glare */
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
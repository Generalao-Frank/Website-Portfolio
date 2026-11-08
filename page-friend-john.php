<?php
/**
 * Template Name: Friend Profile - John
 * Template Post Type: page
 */
get_header(); 

$member_name = get_the_title();
$first_name = explode(' ', $member_name)[0];
?>

<style>
/* ===== INDIVIDUAL PORTFOLIO — Luxury Editorial Pro Max (Ivan) ===== */
.portfolio-page {
  --ivory:#F7F4EC; --paper:#FBFAF5; --ink:#1A1814; --ink-3:#4A443A;
  --gold:#A8874E; --gold-2:#C4A566; --line:#DED7C7; --muted:#7A7266;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  background: var(--ivory); color: var(--ink); font-family: var(--sans);
  min-height: 100vh; position: relative; overflow-x: hidden;
  -webkit-font-smoothing: antialiased; scroll-behavior: smooth;
}

/* Custom Scrollbar */
.portfolio-page ::-webkit-scrollbar { width: 8px; }
.portfolio-page ::-webkit-scrollbar-track { background: var(--ivory); }
.portfolio-page ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 10px; }

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

.portfolio-page .container { max-width: 1280px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px); position: relative; z-index: 2; }

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

/* ===== HERO SECTION ===== */
.pf-hero {
  padding: clamp(160px, 18vw, 220px) 0 clamp(80px, 10vw, 140px);
  position: relative;
}
.pf-hero::before {
  content:""; position:absolute; top:-10%; right:-10%; width:70vw; height:70vw;
  max-width:900px; max-height:900px; border-radius:50%;
  background:radial-gradient(circle, rgba(196,165,102,.15), transparent 65%);
  pointer-events:none;
}
.pf-hero .grid {
  display: grid; grid-template-columns: 1.1fr 1fr; gap: clamp(40px, 8vw, 120px);
  align-items: center; position: relative;
}

.pf-hero .kicker {
  font-size:.72rem; font-weight:500; letter-spacing:.24em; text-transform:uppercase;
  color:var(--gold); margin:0 0 24px; display:flex; align-items:center; gap:16px;
}
.pf-hero .kicker::before { content:""; width:40px; height:1px; background:var(--gold); }
.pf-hero h1 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(3rem, 6vw, 5.5rem);
  line-height: 1.05; letter-spacing: -0.03em; margin: 0 0 24px; color: var(--ink);
}
.pf-hero h1 em { color: var(--gold); font-style: italic; }
.pf-hero .tagline {
  font-size: 1.1rem; font-weight: 300; line-height: 1.8; color: var(--ink-3);
  margin: 0 0 40px; max-width: 46ch;
}

/* Buttons */
.pf-buttons { display: flex; gap: 24px; align-items: center; flex-wrap: wrap; }
.pf-btn {
  display: inline-flex; align-items: center; gap: 12px;
  background: var(--ink); color: var(--ivory); text-decoration: none;
  padding: 16px 32px; border-radius: 2px;
  font-family: var(--sans); font-weight: 500; font-size: 0.78rem; 
  letter-spacing: 0.14em; text-transform: uppercase;
  transition: all 0.4s;
}
.pf-btn:hover {
  background: var(--gold); color: var(--ink); transform: translateY(-2px);
  box-shadow: 0 10px 30px -10px rgba(168, 135, 78, 0.4);
}

/* Image Side */
.pf-hero .visual {
  aspect-ratio: 4/5; border-radius: 2px; overflow: hidden; background: var(--paper);
  border: 1px solid var(--line);
  display: flex; align-items: center; justify-content: center;
  position: relative;
  box-shadow: 20px 20px 0 0 var(--line);
}
.pf-hero .visual img { 
  width: 100%; height: 100%; object-fit: cover; display: block;
  filter: grayscale(20%);
  transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), filter 0.8s;
}
.pf-hero .visual:hover img { transform: scale(1.03); filter: grayscale(0%); }

/* ===== MINDSET SECTION ===== */
.pf-mindset {
  padding: clamp(100px, 12vw, 160px) 0;
  background: var(--ink); color: var(--ivory); text-align: center;
  position: relative;
}
.pf-mindset::before {
  content:""; position:absolute; top:50%; left:50%; transform:translate(-50%, -50%);
  width:80vw; height:80vw; max-width:800px; max-height:800px;
  background:radial-gradient(circle, rgba(196,165,102,.1), transparent 70%);
  pointer-events:none;
}
.pf-mindset .container { position: relative; }
.pf-mindset blockquote {
  font-family: var(--serif); font-weight: 300; font-size: clamp(1.6rem, 4vw, 3rem);
  line-height: 1.3; letter-spacing: -0.02em; margin: 0 auto; max-width: 900px;
}
.pf-mindset blockquote em { color: var(--gold-2); font-style: italic; }

/* ===== BIO SECTION ===== */
.pf-about {
  padding: clamp(80px, 10vw, 140px) 0;
  background: var(--paper); border-bottom: 1px solid var(--line);
}
.pf-about .grid {
  display: grid; grid-template-columns: 1fr 1.5fr; gap: clamp(40px, 8vw, 120px);
  align-items: start;
}
.pf-about h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2rem, 4vw, 3.5rem);
  line-height: 1.1; letter-spacing: -0.02em; margin: 0; color: var(--ink);
}
.pf-about h2 em { color: var(--gold); font-style: italic; }
.pf-about .bio-content {
  font-size: 1.1rem; font-weight: 300; line-height: 1.85; color: var(--ink-3);
}
.pf-about .bio-content p { margin: 0 0 24px; }

/* ===== SKILLS ===== */
.pf-skills { padding: clamp(80px, 10vw, 140px) 0; }
.pf-skills .section-head {
  display: flex; justify-content: space-between; align-items: baseline;
  margin-bottom: 64px; border-bottom: 1px solid var(--line); padding-bottom: 24px;
}
.pf-skills h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2rem, 4vw, 3.5rem);
  letter-spacing: -0.02em; margin: 0; color: var(--ink);
}
.pf-skills h2 em { color: var(--gold); font-style: italic; }
.pf-skills .subtitle {
  font-size: 0.8rem; font-weight: 500; letter-spacing: 0.14em; text-transform: uppercase;
  color: var(--muted);
}

.skill-cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.skill-card {
  padding: 32px; background: var(--paper); border: 1px solid var(--line);
  border-radius: 2px; transition: all 0.4s;
}
.skill-card:hover {
  border-color: var(--gold); transform: translateY(-4px);
  box-shadow: 0 20px 40px -20px rgba(168, 135, 78, 0.2);
}
.skill-card .num {
  font-family: var(--serif); font-style: italic; font-size: 1.2rem;
  color: var(--gold); display: block; margin-bottom: 16px;
}
.skill-card h3 {
  font-family: var(--serif); font-size: 1.4rem; font-weight: 400; 
  margin: 0 0 12px; color: var(--ink);
}
.skill-card p {
  font-size: 0.95rem; font-weight: 300; line-height: 1.7; color: var(--ink-3);
  margin: 0;
}

/* ===== STATS SECTION (NEW!) ===== */
.pf-stats {
  padding: 0 0 clamp(80px, 10vw, 140px);
}
.stats-grid {
  display: grid; grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}
.stat-box {
  position: relative; padding: 40px 24px; text-align: center;
  background: rgba(255,255,255,0.6);
  border: 1px solid var(--line);
  border-radius: 2px;
  transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
  overflow: hidden;
}
.stat-box::before {
  content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 2px;
  background: var(--gold); transform: scaleX(0); transition: transform 0.5s ease;
}
.stat-box:hover {
  border-color: var(--gold);
  transform: translateY(-6px);
  box-shadow: 0 20px 40px -15px rgba(168,135,78,0.2);
  background: #fff;
}
.stat-box:hover::before { transform: scaleX(1); }
.stat-box .stat-icon {
  width: 32px; height: 32px; color: var(--gold); margin: 0 auto 16px; display: block;
}
.stat-box .label {
  font-size: 0.7rem; font-weight: 500; letter-spacing: 0.16em; 
  text-transform: uppercase; color: var(--muted); margin-bottom: 12px; display: block;
}
.stat-box .value {
  font-family: var(--serif); font-size: 1.4rem; font-weight: 400; color: var(--ink);
}

/* ===== CONTACT CTA ===== */
.pf-cta {
  padding: clamp(100px, 12vw, 160px) 0;
  background: var(--ink); color: var(--ivory); text-align: center;
}
.pf-cta h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2.5rem, 5vw, 4.5rem);
  line-height: 1; letter-spacing: -0.03em; margin: 0 0 24px;
}
.pf-cta h2 em { color: var(--gold-2); font-style: italic; }
.pf-cta p {
  color: rgba(247, 244, 236, 0.7); font-weight: 300; line-height: 1.8;
  margin: 0 auto 48px; max-width: 46ch; font-size: 1.05rem;
}

/* Social Links with Icons */
.pf-cta .socials { display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; }
.pf-cta .socials a {
  display: inline-flex; align-items: center; gap: 10px;
  font-size: 0.78rem; font-weight: 500; letter-spacing: 0.14em; text-transform: uppercase;
  color: var(--ivory); text-decoration: none; padding: 12px 24px;
  border: 1px solid rgba(247, 244, 236, 0.2); border-radius: 50px; 
  transition: all 0.3s;
}
.pf-cta .socials a svg { width: 16px; height: 16px; fill: currentColor; transition: fill 0.3s; }
.pf-cta .socials a:hover { 
  background: var(--ivory); color: var(--ink); border-color: var(--ivory); 
  transform: translateY(-2px);
}

/* Reveal Animation */
.reveal { opacity: 0; transform: translateY(40px); transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1), transform 1s cubic-bezier(0.16, 1, 0.3, 1); }
.reveal.in { opacity: 1; transform: translateY(0); }

@media (max-width: 900px) {
  .pf-hero .grid { grid-template-columns: 1fr; gap: 40px; }
  .pf-hero .visual { aspect-ratio: 1/1; max-width: 350px; box-shadow: 12px 12px 0 0 var(--line); }
  .pf-about .grid { grid-template-columns: 1fr; gap: 32px; }
  .skill-cards, .stats-grid { grid-template-columns: 1fr; }
  .pf-skills .section-head { flex-direction: column; align-items: flex-start; gap: 12px; }
  .floating-bg { display: none; }
}
</style>

<!-- Reading Progress Bar -->
<div class="read-progress" id="readProgress"></div>

<!-- Cursor Glow -->
<div class="cursor-glow" id="cursorGlow"></div>

<main class="portfolio-page">
  <!-- Floating Background Elements -->
  <span class="floating-bg fb-1">✎</span>
  <span class="floating-bg fb-2">⚙</span>
  <span class="floating-bg fb-3">✓</span>

  <!-- HERO SECTION -->
  <section class="pf-hero">
    <div class="container">
      <div class="grid">
        <div class="text">
          <p class="kicker">Project Manager</p>
          <h1>Hi, I'm <em><?php echo esc_html($first_name); ?>.</em></h1>
          <p class="tagline">
            A dedicated Project Manager who believes that great projects are built on clear communication, 
            proper planning, and teamwork. I organize, coordinate, and lead — ensuring every task 
            is delivered on time and with purpose.
          </p>
          <div class="pf-buttons">
            <a href="#contact" class="pf-btn">Get in Touch</a>
            <a href="<?php echo esc_url(home_url('/our-members/')); ?>" class="pf-btn-ghost">Back to Members</a>
          </div>
        </div>
        <div class="visual">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/ivan.jpg'); ?>" alt="<?php echo esc_attr($member_name); ?>">
        </div>
      </div>
    </div>
  </section>

  <!-- MINDSET SECTION -->
  <section class="pf-mindset">
    <div class="container">
      <blockquote>
        “ A great project isn't just about the code — it's about the people, the plan, and the <em>purpose.</em> ” <em>— Ivan</em>
      </blockquote>
    </div>
  </section>

  <!-- ABOUT SECTION -->
  <section class="pf-about">
    <div class="container">
      <div class="grid">
        <div>
          <p class="kicker">About Me</p>
          <h2>A mind for <em>managing.</em></h2>
        </div>
        <div class="bio-content">
          <p>
            As a Project Manager, I don't just focus on completing tasks. I focus on leading teams, 
            managing project timelines, and ensuring that every part of a project works toward a common goal.
            I believe that effective communication, proper planning, and teamwork are essential to achieving 
            successful results.
          </p>
          <p>
            I believe that being a great Project Manager isn't about having all the answers from the beginning. 
            It's about being organized enough to manage responsibilities, flexible enough to adapt to challenges, 
            communicative enough to bring people together, and responsible enough to ensure that projects are 
            completed efficiently and successfully within the given deadline.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- SKILLS SECTION -->
  <section class="pf-skills">
    <div class="container">
      <div class="section-head">
        <h2>How I <em>lead.</em></h2>
        <p class="subtitle">Core Competencies</p>
      </div>
      <div class="skill-cards">
        <div class="skill-card reveal">
          <span class="num">01</span>
          <h3>Project Planning</h3>
          <p>Breaking down complex projects into manageable tasks. Building timelines, assigning roles, and ensuring everyone knows their role.</p>
        </div>
        <div class="skill-card reveal">
          <span class="num">02</span>
          <h3>Team Coordination</h3>
          <p>Bridging communication between developers, designers, and stakeholders. Keeping the team aligned and motivated throughout the project.</p>
        </div>
        <div class="skill-card reveal">
          <span class="num">03</span>
          <h3>Time Management</h3>
          <p>Ensuring every milestone is met. Prioritizing critical tasks and resolving blockers before they become problems.</p>
        </div>
      </div>
    </div>
  </section>

    <!-- HOBBIES SECTION (formerly Stats) -->
  <section class="pf-stats">
    <div class="container">
      <div class="section-head" style="margin-bottom: 48px;">
        <h2>Beyond the <em>screen.</em></h2>
        <p class="subtitle">My Passions & Interests</p>
      </div>
      
      <div class="stats-grid">
        <!-- CHESS -->
        <div class="stat-box reveal">
          <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M19,22H5V20H19V22M17,10C17,7.24 14.76,5 12,5C9.24,5 7,7.24 7,10C7,12.03 8.21,13.77 10,14.58V17H14V14.58C15.79,13.77 17,12.03 17,10M12,3C15.87,3 19,6.13 19,10C19,12.41 17.71,14.53 15.78,15.71L16,17H8L8.22,15.71C6.29,14.53 5,12.41 5,10C5,6.13 8.13,3 12,3Z"/></svg>
          <span class="label">Strategy</span>
          <div class="value">Chess</div>
        </div>

        <!-- BASKETBALL -->
        <div class="stat-box reveal">
          <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10Z"/></svg>
          <span class="label">Court</span>
          <div class="value">Basketball</div>
        </div>

        <!-- LISTENING MUSIC -->
        <div class="stat-box reveal">
          <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12,3V13.55C11.41,13.21 10.73,13 10,13A3,3 0 0,0 7,16A3,3 0 0,0 10,19A3,3 0 0,0 13,16V7H17V5H12V3Z"/></svg>
          <span class="label">Vibes</span>
          <div class="value">Listening Music</div>
        </div>

        <!-- SINGING -->
        <div class="stat-box reveal">
          <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12C20,12.5 19.92,12.96 19.76,13.39C19.21,12.11 17.89,11.25 16.5,11.25C15.93,11.25 15.41,11.42 15,11.71C14.59,11.42 14.07,11.25 13.5,11.25C12.11,11.25 10.79,12.11 10.24,13.39C10.08,12.96 10,12.5 10,12A2,2 0 0,1 12,10C13.11,10 14,10.89 14,12C14,13.11 13.11,14 12,14A2,2 0 0,1 10,12C10,13.66 11.34,15 13,15C14.12,15 15.16,14.32 15.75,13.38C16.34,14.32 17.38,15 18.5,15C19.66,15 20.73,14.28 21.31,13.3C19.75,18.18 15.16,22 9,22A8,8 0 0,1 4,12A8,8 0 0,1 12,4Z"/></svg>
          <span class="label">Voice</span>
          <div class="value">Singing</div>
        </div>

        <!-- BLOGGER -->
        <div class="stat-box reveal">
          <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M19,19H5V5H19V19M17,17H7V15H17V17M17,13H7V11H17V13M17,9H7V7H17V9Z"/></svg>
          <span class="label">Written</span>
          <div class="value">Blogger</div>
        </div>

        <!-- TIKTOKER -->
        <div class="stat-box reveal">
          <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M16.6 5.82s.51.5 0 0A4.278 4.278 0 0 1 15.54 3h-3.09v12.4a2.592 2.592 0 0 1-2.59 2.5c-1.42 0-2.6-1.16-2.6-2.6 0-1.72 1.66-3.01 3.37-2.48V9.66c-3.45-.46-6.47 2.22-6.47 5.64 0 3.33 2.76 5.7 5.69 5.7 3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 0 0 4.3 1.38V7.3s-1.88.09-3.24-1.48z"/></svg>
          <span class="label">Content</span>
          <div class="value">Tiktoker</div>
        </div>
      </div>
    </div>
  </section>

  <!-- CONTACT CTA -->
  <section class="pf-cta" id="contact">
    <div class="container">
      <h2>Let's lead <em>together.</em></h2>
      <p>Kung may proyekto ka sa isipan o gusto mo lang mag-usap tungkol sa team management, laging bukas ang aking inbox.</p>
      
      <div class="socials">
        <!-- Facebook -->
        <a href="#" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          Facebook
        </a>
        <!-- Gmail -->
        <a href="mailto:ivan@ourspace.dev" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z"/></svg>
          Gmail
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
  // Reveal Animation
  const reveals = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.classList.add('in');
        }, i * 100);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });
  reveals.forEach(reveal => observer.observe(reveal));

  // Reading Progress Bar
  const progressBar = document.getElementById('readProgress');
  window.addEventListener('scroll', () => {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (scrollTop / scrollHeight) * 100;
    progressBar.style.width = scrolled + '%';
  });

  // Cursor Glow
  const cursorGlow = document.getElementById('cursorGlow');
  if (window.innerWidth > 768) {
    document.addEventListener('mousemove', (e) => {
      cursorGlow.style.left = e.clientX + 'px';
      cursorGlow.style.top = e.clientY + 'px';
    });
  }
});
</script>

<?php get_footer(); ?>
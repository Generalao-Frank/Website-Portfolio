<?php
/**
 * Template Name: Friend Profile - Frank
 * Template Post Type: page
 */
get_header(); 

$member_name = get_the_title();
$first_name = explode(' ', $member_name)[0];
?>

<style>
/* ===== INDIVIDUAL PORTFOLIO — Luxury Editorial Pro Max ===== */
.portfolio-page {
  --ivory:#F7F4EC; --paper:#FBFAF5; --ink:#1A1814; --ink-3:#4A443A;
  --gold:#A8874E; --gold-2:#C4A566; --line:#DED7C7; --muted:#7A7266;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  background: var(--ivory); color: var(--ink); font-family: var(--sans);
  -webkit-font-smoothing: antialiased;
}
.portfolio-page .container { max-width: 1280px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px); }

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
.pf-mindset .quote-mark {
  font-family: var(--serif); font-size: 6rem; line-height: 0; color: var(--gold);
  display: block; margin-bottom: 24px; opacity: 0.5; font-style: italic;
}
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

/* ===== HOBBIES SECTION (Updated with Icons) ===== */
.pf-hobbies {
  padding: clamp(80px, 10vw, 140px) 0;
  background: var(--ivory); border-bottom: 1px solid var(--line);
}
.pf-hobbies h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2rem, 4vw, 3.5rem);
  letter-spacing: -0.02em; margin: 0 0 48px; color: var(--ink); text-align: center;
}
.pf-hobbies h2 em { color: var(--gold); font-style: italic; }
.hobbies-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;
  max-width: 900px; margin: 0 auto;
}
.hobby-item {
  display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 16px;
  padding: 32px 20px; text-align: center; border: 1px solid var(--line);
  border-radius: 2px; background: var(--paper);
  transition: all 0.3s;
}
.hobby-icon {
  color: var(--muted);
  transition: color 0.3s, transform 0.3s;
}
.hobby-icon svg {
  width: 32px; height: 32px; fill: currentColor;
}
.hobby-item span {
  font-family: var(--sans); font-size: 0.9rem; font-weight: 500; 
  color: var(--ink-3); letter-spacing: 0.04em;
}
.hobby-item:hover {
  border-color: var(--gold); transform: translateY(-4px);
  box-shadow: 0 10px 20px -10px rgba(168, 135, 78, 0.15);
}
.hobby-item:hover .hobby-icon { color: var(--gold); transform: scale(1.1); }
.hobby-item:hover span { color: var(--gold); }

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

/* Social Links */
.pf-cta .socials { display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; }
.pf-cta .socials a {
  display: inline-flex; align-items: center; gap: 10px;
  font-size: 0.78rem; font-weight: 500; letter-spacing: 0.14em; text-transform: uppercase;
  color: var(--ivory); text-decoration: none; padding: 12px 24px;
  border: 1px solid rgba(247, 244, 236, 0.2); border-radius: 50px; 
  transition: all 0.3s;
}
.pf-cta .socials a svg { width: 16px; height: 16px; fill: currentColor; }
.pf-cta .socials a:hover { 
  background: var(--ivory); color: var(--ink); border-color: var(--ivory); 
  transform: translateY(-2px);
}

@media (max-width: 900px) {
  .pf-hero .grid { grid-template-columns: 1fr; gap: 40px; }
  .pf-hero .visual { aspect-ratio: 1/1; max-width: 350px; box-shadow: 12px 12px 0 0 var(--line); }
  .pf-about .grid { grid-template-columns: 1fr; gap: 32px; }
  .skill-cards { grid-template-columns: 1fr; }
  .hobbies-grid { grid-template-columns: 1fr 1fr; }
  .pf-skills .section-head { flex-direction: column; align-items: flex-start; gap: 12px; }
}
</style>

<main class="portfolio-page">
  
  <!-- HERO SECTION -->
  <section class="pf-hero">
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
            <a href="#contact" class="pf-btn">Get in Touch</a>
            <a href="<?php echo esc_url(home_url('/our-members/')); ?>" class="pf-btn-ghost">Back to Members</a>
          </div>
        </div>
        <div class="visual">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/frankdp.jpg'); ?>" alt="<?php echo esc_attr($member_name); ?>">
        </div>
      </div>
    </div>
  </section>

  <!-- MINDSET SECTION -->
  <section class="pf-mindset">
    <div class="container">
      <blockquote>
        “ Ang kabiguan ay hindi katapusan, kundi bahagi ng paglalakbay tungo sa tagumpay. ” <em>— Frank</em>
      </blockquote>
    </div>
  </section>

  <!-- ABOUT SECTION -->
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

  <!-- SKILLS SECTION -->
  <section class="pf-skills">
    <div class="container">
      <div class="section-head">
        <h2>How I <em>work.</em></h2>
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

       <!-- HOBBIES SECTION -->
  <section class="pf-hobbies">
    <div class="container">
      <h2>Beyond the <em>screen.</em></h2>
      <div class="hobbies-grid">
        
        <a href="<?php echo esc_url(home_url('/hobbies/chess/')); ?>" class="hobby-item">
          <div class="hobby-icon">
            <svg viewBox="0 0 24 24"><path d="M19,22H5V20H19V22M17,10C17,7.24 14.76,5 12,5C9.24,5 7,7.24 7,10C7,12.03 8.21,13.77 10,14.58V17H14V14.58C15.79,13.77 17,12.03 17,10M12,3C15.87,3 19,6.13 19,10C19,12.41 17.71,14.53 15.78,15.71L16,17H8L8.22,15.71C6.29,14.53 5,12.41 5,10C5,6.13 8.13,3 12,3Z" /></svg>
          </div>
          <span>Chess</span>
        </a>

        <a href="<?php echo esc_url(home_url('/hobbies/online-games/')); ?>" class="hobby-item">
          <div class="hobby-icon">
            <svg viewBox="0 0 24 24"><path d="M7.97,16L5,19C4.67,19.3 4.23,19.5 3.75,19.5A1.75,1.75 0 0,1 2,17.75V17.5L3,10.12C3.21,7.81 5.14,6 7.5,6H16.5C18.86,6 20.79,7.81 21,10.12L22,17.5V17.75A1.75,1.75 0 0,1 20.25,19.5C19.77,19.5 19.33,19.3 19,19L16.03,16H7.97M7,9V11H5V12H7V14H8V12H10V11H8V9H7M16.5,9A1,1 0 0,0 15.5,10A1,1 0 0,0 16.5,11A1,1 0 0,0 17.5,10A1,1 0 0,0 16.5,9M14.5,12A1,1 0 0,0 13.5,13A1,1 0 0,0 14.5,14A1,1 0 0,0 15.5,13A1,1 0 0,0 14.5,12Z" /></svg>
          </div>
          <span>Online Games</span>
        </a>

        <a href="<?php echo esc_url(home_url('/hobbies/dama/')); ?>" class="hobby-item">
          <div class="hobby-icon">
            <svg viewBox="0 0 24 24"><path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10Z" /></svg>
          </div>
          <span>Dama</span>
        </a>

        <a href="<?php echo esc_url(home_url('/hobbies/home-workout/')); ?>" class="hobby-item">
          <div class="hobby-icon">
            <svg viewBox="0 0 24 24"><path d="M20.57,14.86L22,13.43L20.57,12L17,15.57L8.43,7L12,3.43L10.57,2L9.14,3.43L7.71,2L5.57,4.14L4.14,2.71L2.71,4.14L4.14,5.57L2,7.71L3.43,9.14L2,10.57L3.43,12L7,8.43L15.57,17L12,20.57L13.43,22L14.86,20.57L16.29,22L18.43,19.86L19.86,21.29L21.29,19.86L19.86,18.43L22,16.29L20.57,14.86Z" /></svg>
          </div>
          <span>Home Workout</span>
        </a>

        <a href="<?php echo esc_url(home_url('/hobbies/building-systems/')); ?>" class="hobby-item">
          <div class="hobby-icon">
            <svg viewBox="0 0 24 24"><path d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z" /></svg>
          </div>
          <span>Building Systems</span>
        </a>

        <a href="<?php echo esc_url(home_url('/hobbies/reading/')); ?>" class="hobby-item">
          <div class="hobby-icon">
            <svg viewBox="0 0 24 24"><path d="M21,5C19.89,4.65 18.67,4.5 17.5,4.5C15.55,4.5 13.45,4.9 12,6C10.55,4.9 8.45,4.5 6.5,4.5C4.55,4.5 2.45,4.9 1,6V20.65C1,20.9 1.25,21.15 1.5,21.15C1.6,21.15 1.65,21.1 1.75,21.1C3.1,20.45 5.05,20 6.5,20C8.45,20 10.55,20.4 12,21.5C13.45,20.4 15.55,20 17.5,20C19.15,20 20.8,20.3 22.25,21.05C22.35,21.1 22.4,21.1 22.5,21.1C22.75,21.1 23,20.85 23,20.6V6C22.4,5.55 21.75,5.25 21,5M21,18.5C19.9,18.15 18.7,18 17.5,18C15.8,18 14.1,18.35 12.5,19V8C14.1,7.35 15.8,7 17.5,7C18.7,7 19.9,7.15 21,7.5V18.5Z" /></svg>
          </div>
          <span>Reading & Learning</span>
        </a>

      </div>
    </div>
  </section>


  <!-- CONTACT CTA -->
  <section class="pf-cta" id="contact">
    <div class="container">
      <h2>Let's build <em>together.</em></h2>
      <p>For more info kindly message me on any of the platforms below.</p>
      
      <div class="socials">
        <!-- Facebook -->
        <a href="https://www.facebook.com/frankjames.generalao" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          Facebook
        </a>
        <!-- Gmail
        <a href="mailto:frank@gmail.com" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z"/></svg>
          Gmail
        </a> -->
        <!-- Instagram -->
        <a href="https://www.instagram.com/prangkoo__?obrf=MzFsdGt4b21uMHUy" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
          Instagram
        </a>
        <!-- Telegram -->
        <a href="https://t.me/abododo27" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.2１.２５８-１．９１．１７７－．１８４３．２４７－２．９７７３．３０７－３．２３．００７－．０３２．０１４－．１５－．０５６－．２１２ｓ－．１７４－．０４１－．２４９－．０２４ｃ－．１０６．０２４－１．７９３　１．１４－５．０６１　３．３４５－．４８　０．３３－１．９１３　０．４９－１．３０２　０．４８－０．４２８－０．００８－１．２５２－０．２４１－１．８６５－０．４４－０．７５２－０．２４５－１．３４９－０．３７４－１．２９７－０．７８９＋０．０２７－０．２１６＋０．３２５－０．４３７＋Ｏ９３ －Ｏ６６３ ＋３ －Ｏ５２４ ＋５ －Ｏ５２９ ＋６ －ＯＯｌ４ ＋３ －Ｏｌ８６ ＋４ －Ｏｌ２７ ＋４ －Ｏｌ３５ｚ"/></svg>
          Telegram
        </a>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
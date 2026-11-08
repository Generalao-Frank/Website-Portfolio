<?php
/**
 * Template Name: Friend Profile - Jay Mark
 * Template Post Type: page
 */

get_header();

$member_name = get_the_title();
$first_letter = substr($member_name, 0, 1);
?>

<style>
/* ===== INDIVIDUAL PORTFOLIO — Luxury Editorial ===== */
.portfolio-page {
  --ivory:#F7F4EC; --paper:#FBFAF5; --ink:#1A1814; --ink-3:#4A443A;
  --gold:#A8874E; --gold-2:#C4A566; --line:#DED7C7; --muted:#7A7266;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  background: var(--ivory); color: var(--ink); font-family: var(--sans);
  -webkit-font-smoothing: antialiased;
}
.portfolio-page .container { max-width: 1280px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px); }

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
  display: grid; grid-template-columns: 1.2fr 1fr; gap: clamp(40px, 8vw, 120px);
  align-items: center; position: relative;
}

.pf-hero .kicker {
  font-size:.72rem; font-weight:500; letter-spacing:.24em; text-transform:uppercase;
  color:var(--gold); margin:0 0 24px; display:flex; align-items:center; gap:16px;
}
.pf-hero .kicker::before { content:""; width:40px; height:1px; background:var(--gold); }
.pf-hero h1 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(3.5rem, 7vw, 7rem);
  line-height: 0.95; letter-spacing: -0.03em; margin: 0 0 24px; color: var(--ink);
}
.pf-hero h1 em { color: var(--gold); font-style: italic; }
.pf-hero .tagline {
  font-size: 1.15rem; font-weight: 300; line-height: 1.8; color: var(--ink-3);
  margin: 0 0 40px; max-width: 40ch;
}

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
.pf-btn-ghost {
  font-size: 0.78rem; font-weight: 500; letter-spacing: 0.14em; text-transform: uppercase;
  color: var(--ink); text-decoration: none; padding-bottom: 4px;
  border-bottom: 1px solid var(--line); transition: all 0.3s;
}
.pf-btn-ghost:hover { border-color: var(--gold); color: var(--gold); }

.pf-hero .visual {
  aspect-ratio: 4/5; border: 1px solid var(--line); border-radius: 2px;
  overflow: hidden; background: var(--paper);
  display: flex; align-items: center; justify-content: center;
  position: relative;
}
.pf-hero .visual img { width: 100%; height: 100%; object-fit: cover; display: block; }
.pf-hero .visual .initial {
  font-family: var(--serif); font-size: 10rem; color: var(--gold); opacity: 0.3; font-style: italic;
}
.pf-hero .visual::after {
  content: ""; position: absolute; inset: 0; 
  border: 8px solid var(--ivory); border-radius: 2px; pointer-events: none;
}

.pf-about {
  padding: clamp(80px, 10vw, 140px) 0;
  background: var(--paper); border-top: 1px solid var(--line); border-bottom: 1px solid var(--line);
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

.skill-cards {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;
}
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
.pf-cta .socials { display: flex; justify-content: center; gap: 32px; }
.pf-cta .socials a {
  font-size: 0.8rem; font-weight: 500; letter-spacing: 0.14em; text-transform: uppercase;
  color: var(--ivory); text-decoration: none; padding-bottom: 4px;
  border-bottom: 1px solid rgba(247, 244, 236, 0.2); transition: all 0.3s;
}
.pf-cta .socials a:hover { border-color: var(--gold-2); color: var(--gold-2); }

@media (max-width: 900px) {
  .pf-hero .grid { grid-template-columns: 1fr; gap: 40px; }
  .pf-hero .visual { aspect-ratio: 1/1; max-width: 350px; }
  .pf-about .grid { grid-template-columns: 1fr; gap: 32px; }
  .skill-cards { grid-template-columns: 1fr; }
  .pf-skills .section-head { flex-direction: column; align-items: flex-start; gap: 12px; }
}

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


/* =========================================
   HOBBIES SECTION
========================================= */

.pf-hobbies {
  padding: clamp(80px, 10vw, 140px) 0;
  background: var(--ivory);
  border-bottom: 1px solid var(--line);
}

.pf-hobbies h2 {
  font-family: var(--serif);
  font-weight: 300;
  font-size: clamp(2rem, 4vw, 3.5rem);
  letter-spacing: -.02em;
  margin: 0 0 48px;
  color: var(--ink);
  text-align: center;
}

.pf-hobbies h2 em {
  color: var(--gold);
  font-style: italic;
}

.hobbies-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 16px;
  max-width: 900px;
  margin: 0 auto;
}

.hobby-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 16px;
  padding: 32px 20px;
  min-height: 145px;
  text-align: center;
  border: 1px solid var(--line);
  border-radius: 2px;
  background: var(--paper);
  text-decoration: none;
  transition: all .3s ease;
}

.hobby-icon {
  color: var(--muted);
  transition: color .3s, transform .3s;
}

.hobby-icon svg {
  width: 34px;
  height: 34px;
  fill: none;
  stroke: currentColor;
  stroke-width: 1.8;
  stroke-linecap: round;
  stroke-linejoin: round;
}

.hobby-item span {
  font-family: var(--sans);
  font-size: .9rem;
  font-weight: 500;
  color: var(--ink-3);
  letter-spacing: .04em;
  transition: color .3s;
}

.hobby-item:hover {
  border-color: var(--gold);
  transform: translateY(-4px);
  box-shadow: 0 10px 20px -10px rgba(168,135,78,.15);
}

.hobby-item:hover .hobby-icon {
  color: var(--gold);
  transform: scale(1.1);
}

.hobby-item:hover span {
  color: var(--gold);
}

/* Responsive Hobbies */

@media (max-width: 900px) {
  .hobbies-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 520px) {
  .hobbies-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
  }

  .hobby-item {
    padding: 25px 10px;
    min-height: 125px;
  }

  .hobby-item span {
    font-size: .78rem;
  }

  .hobby-icon svg {
    width: 30px;
    height: 30px;
  }
}

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
  
  <section class="pf-hero">
    <div class="container">
      <div class="grid">
        <div class="text">
          <p class="kicker">System Analysis</p> <!-- Role ni Jay -->
          <h1>Hi, I'm <em><?php echo esc_html(explode(' ', $member_name)[0]); ?>.</em></h1>
          <p class="tagline">
            I design intuitive interfaces that prioritize the user. I believe great design 
            is invisible—it guides people naturally without them having to think about it.
          </p> <!-- Tagline ni Jay -->
          <div class="pf-buttons">
            <a href="#contact" class="pf-btn">Get in Touch</a>
            <a href="<?php echo esc_url(home_url('/our-members/')); ?>" class="pf-btn-ghost">Back to Members</a>
          </div>
        </div>
        <div class="visual">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/markdp.jpg'); ?>" alt="<?php echo esc_attr($member_name); ?>">
        </div>
      </div>
    </div>
  </section>
  <section class="pf-mindset">
    <div class="container">
     
      <blockquote>
        “ Mag decisyon nang pinag-iisipan, para sa huli walang pag-sisihan.  ”
        <br> <em>— Jay Mark</em></br>
          
      </blockquote>
    </div>
  </section>

   <section class="pf-about">
    <div class="container">
      <div class="grid">
        <div>
          <p class="kicker">About Me</p>
          <h2>A mind for <em>design.</em></h2>
        </div>
        <div class="bio-content">
          <p>
            As a System Analyst, I don't just focus on how a system works. 
            I focus on understanding user needs, analyzing processes, 
            and finding effective solutions to real-world problems. 
            I believe that every detail matters, from gathering requirements and analyzing data to designing efficient system workflows. 
            I'm driven by curiosity, critical thinking, and the desire to turn complex ideas into practical and meaningful digital solutions. 
          </p>
          <p>
            I believe that being a great System Analyst isn't about knowing everything about systems from the beginning. 
            It's about being curious enough to understand user needs, resourceful enough to find solutions, 
            analytical enough to solve complex problems, 
            and disciplined enough to deliver efficient and well-designed system solutions within the given deadline.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="pf-skills">
  <div class="container">
    <div class="section-head">
      <h2>What I <em>do.</em></h2>
      <p class="subtitle">Core Competencies</p>
    </div>

    <div class="skill-cards">
      <!-- Skills ni Jay -->

      <div class="skill-card">
        <span class="num">01</span>
        <h3>System Analysis</h3>
        <p>
          Analyzing system requirements, understanding user needs, and
          identifying effective solutions to improve system functionality
          and efficiency.
        </p>
      </div>

      <div class="skill-card">
        <span class="num">02</span>
        <h3>Requirements Gathering</h3>
        <p>
          Gathering and documenting user requirements through interviews,
          research, and analysis to ensure that system features meet
          user expectations.
        </p>
      </div>

      <div class="skill-card">
        <span class="num">03</span>
        <h3>System Modeling & Design</h3>
        <p>
          Creating system diagrams, workflows, and data models to
          visualize system processes and provide a clear guide
          for system development.
        </p>
      </div>

    </div>
  </div>
</section>

 
<section class="pf-hobbies">
  <div class="container">

    <h2>Beyond the <em>screen.</em></h2>

    <div class="hobbies-grid">

      <!-- 01. Badminton -->
      <a href="<?php echo esc_url(home_url('/hobbies/badminton/')); ?>" class="hobby-item">
        <div class="hobby-icon">
          <svg viewBox="0 0 24 24">
            <path d="M14 14L21 21"/>
            <path d="M3 3L9 2L15 8L9 14L3 8Z"/>
            <path d="M9 14L15 8"/>
            <path d="M15 15L19 11"/>
            <path d="M17 17L21 13"/>
          </svg>
        </div>
        <span>Badminton</span>
      </a>

      <!-- 02. Online Games -->
      <a href="<?php echo esc_url(home_url('/hobbies/games/')); ?>" class="hobby-item">
        <div class="hobby-icon">
          <svg viewBox="0 0 24 24">
            <path d="M6.5 7H17.5C19.4 7 20.8 8.4 21.2 10.3L22 15.5C22.3 17.4 20.2 18.8 18.6 17.6L15.5 15H8.5L5.4 17.6C3.8 18.8 1.7 17.4 2 15.5L2.8 10.3C3.2 8.4 4.6 7 6.5 7Z"/>
            <path d="M7 10V14M5 12H9"/>
            <circle cx="16.5" cy="11" r="1"/>
            <circle cx="18.5" cy="13" r="1"/>
          </svg>
        </div>
        <span>Online Games</span>
      </a>

      <!-- 03. Home Workout -->
      <a href="<?php echo esc_url(home_url('/hobbies/workout/')); ?>" class="hobby-item">
        <div class="hobby-icon">
          <svg viewBox="0 0 24 24">
            <path d="M6 7V17"/>
            <path d="M3 9V15"/>
            <path d="M18 7V17"/>
            <path d="M21 9V15"/>
            <path d="M6 12H18"/>
            <path d="M3 12H6"/>
            <path d="M18 12H21"/>
          </svg>
        </div>
        <span>Home Workout</span>
      </a>

      <!-- 04. Watching Movies -->
      <a href="<?php echo esc_url(home_url('/hobbies/watching-movies/')); ?>" class="hobby-item">
        <div class="hobby-icon">
          <svg viewBox="0 0 24 24">
            <rect x="3" y="4" width="18" height="16" rx="2"/>
            <path d="M3 9H21"/>
            <path d="M7 4L10 9"/>
            <path d="M14 4L17 9"/>
            <path d="M10 13L15 15.5L10 18V13Z"/>
          </svg>
        </div>
        <span>Watching Movies</span>
      </a>

      <!-- 05. Listening to Music -->
      <a href="<?php echo esc_url(home_url('/hobbies/listening-music/')); ?>" class="hobby-item">
        <div class="hobby-icon">
          <svg viewBox="0 0 24 24">
            <path d="M9 18V5L21 3V16"/>
            <path d="M9 8L21 6"/>
            <ellipse cx="6" cy="18" rx="3" ry="2"/>
            <ellipse cx="18" cy="16" rx="3" ry="2"/>
          </svg>
        </div>
        <span>Listening to Music</span>
      </a>

    </div>
  </div>
</section>

  <section class="pf-cta" id="contact">
    <div class="container">
      <h2>Let's build <em>together.</em></h2>
      <p>For more info kindly message me on any of the platforms below.</p>
      
      <div class="socials">
        <!-- Facebook -->
        <a href="https://www.facebook.com/share/18mtNPWVmV/" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          Facebook
        </a>
        <!-- Gmail
        <a href="mailto:frank@gmail.com" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z"/></svg>
          Gmail
        </a> -->
        <!-- Instagram -->
        <a href="https://www.instagram.com/jaymark_generalao?srtk=M3NpdzRnZXIyYW0z" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
          Instagram
        </a>
        
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
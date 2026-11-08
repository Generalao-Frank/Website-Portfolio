<?php
/**
 * Template Name: Our Members
 * Template Post Type: page
 */
get_header(); ?>

<style>
/* ===== MEMBERS PAGE — Luxury Editorial Pro Max ===== */
.members-page {
  --ivory:#F7F4EC; --paper:#FBFAF5; --ink:#1A1814; --ink-3:#4A443A;
  --gold:#A8874E; --gold-2:#C4A566; --line:#DED7C7; --muted:#7A7266;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  background: var(--ivory); color: var(--ink); font-family: var(--sans);
  -webkit-font-smoothing: antialiased;
}
.members-page .container { max-width: 1320px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px); }

/* ===== HERO SECTION ===== */
.members-hero {
  padding: clamp(160px, 18vw, 220px) 0 clamp(40px, 6vw, 80px);
  text-align: center; position: relative;
}
.members-hero::before {
  content:""; position:absolute; top:0; left:50%; transform:translateX(-50%);
  width:60vw; height:60vw; max-width:800px; max-height:800px;
  background:radial-gradient(circle, rgba(196,165,102,.12), transparent 65%);
  pointer-events:none;
}
.members-hero .kicker {
  font-size:.72rem; font-weight:500; letter-spacing:.28em; text-transform:uppercase;
  color:var(--gold); margin:0 0 24px; display:flex; align-items:center; justify-content:center; gap:16px;
}
.members-hero .kicker::before, .members-hero .kicker::after { content:""; width:40px; height:1px; background:var(--gold); }
.members-hero h1 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(3rem, 8vw, 6.5rem);
  line-height: 1; letter-spacing: -0.03em; margin: 0 0 32px; color: var(--ink);
}
.members-hero h1 em { color: var(--gold); font-style: italic; }
.members-hero .lede {
  max-width: 580px; margin: 0 auto; font-size: 1.1rem; font-weight: 300; 
  line-height: 1.8; color: var(--ink-3);
}

/* ===== STATS STRIP ===== */
.members-stats {
  display: flex; justify-content: center; gap: clamp(32px, 6vw, 96px);
  padding: clamp(32px, 5vw, 56px) 0;
  border-top: 1px solid var(--line); border-bottom: 1px solid var(--line);
  margin-bottom: clamp(60px, 8vw, 100px);
  flex-wrap: wrap;
}
.stat-item { text-align: center; }
.stat-item .number {
  font-family: var(--serif); font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 300;
  color: var(--ink); display: block; line-height: 1;
}
.stat-item .number em { color: var(--gold); font-style: italic; }
.stat-item .label {
  font-size: 0.72rem; font-weight: 500; letter-spacing: 0.16em; text-transform: uppercase;
  color: var(--muted); margin-top: 8px; display: block;
}

/* ===== MEMBERS GRID ===== */
.members-grid-section { padding: 0 0 clamp(100px, 12vw, 180px); }
.members-grid {
  display: grid; grid-template-columns: repeat(4, 1fr); 
  gap: clamp(20px, 3vw, 32px); align-items: start;
}

/* ===== MEMBER CARD ===== */
.member-card {
  position: relative; text-decoration: none; color: inherit; display: block;
  transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}
.member-card:hover { transform: translateY(-8px); }

.member-image {
  position: relative; aspect-ratio: 3/4; overflow: hidden;
  background: var(--paper); border: 1px solid var(--line);
  border-radius: 2px; margin-bottom: 24px;
}
.member-image img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  transition: transform 1s cubic-bezier(0.16, 1, 0.3, 1), filter 1s;
  filter: grayscale(40%); /* Ginawang mas gray para elegant */
}
.member-card:hover .member-image img {
  transform: scale(1.06); filter: grayscale(0%);
}

/* Overlay & View Profile button */
.member-image::after {
  content: ""; position: absolute; inset: 0; 
  background: linear-gradient(to top, rgba(26,24,20,.6), transparent 50%);
  opacity: 0; transition: opacity 0.4s; pointer-events: none;
}
.member-card:hover .member-image::after { opacity: 1; }

/* The "View Profile" button that appears on hover */
.view-profile-btn {
  position: absolute; bottom: 20px; left: 50%; transform: translate(-50%, 20px);
  background: var(--ivory); color: var(--ink); 
  padding: 10px 20px; border-radius: 50px;
  font-size: 0.7rem; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase;
  opacity: 0; transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
  pointer-events: none; white-space: nowrap; z-index: 2;
}
.member-card:hover .view-profile-btn {
  opacity: 1; transform: translate(-50%, 0);
}

/* Text Content */
.member-info { display: flex; flex-direction: column; gap: 6px; text-align: center; }
.member-name {
  font-family: var(--serif); font-weight: 400; font-size: clamp(1.3rem, 2vw, 1.5rem); 
  letter-spacing: -0.015em; color: var(--ink); transition: color 0.3s; margin: 0;
}
.member-card:hover .member-name { color: var(--gold); }
.member-role {
  font-size: 0.68rem; font-weight: 500; letter-spacing: 0.16em; 
  text-transform: uppercase; color: var(--muted);
}

/* ===== SCROLL ANIMATION ===== */
.reveal {
  opacity: 0; transform: translateY(30px);
  transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1), transform 1s cubic-bezier(0.16, 1, 0.3, 1);
}
.reveal.in { opacity: 1; transform: translateY(0); }
.reveal:nth-child(1) { transition-delay: 0.1s; }
.reveal:nth-child(2) { transition-delay: 0.2s; }
.reveal:nth-child(3) { transition-delay: 0.3s; }
.reveal:nth-child(4) { transition-delay: 0.4s; }

/* Responsive */
@media (max-width: 1024px) {
  .members-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 600px) {
  .members-grid { grid-template-columns: 1fr; gap: 48px; }
  .member-image { aspect-ratio: 4/5; }
}
</style>

<main class="members-page">
  <!-- Hero -->
  <section class="members-hero">
    <div class="container">
      <p class="kicker reveal">The Collective</p>
      <h1 class="reveal">Meet the <em>minds</em><br>behind the code.</h1>
      <p class="lede reveal">
        A team of passionate, detail-oriented developers building the web one 
        project at a time.
      </p>
    </div>
  </section>

  <!-- Stats Strip (Bagong Feature) -->
  <div class="container">
    <div class="members-stats reveal">
      <div class="stat-item">
        <span class="number">04</span>
        <span class="label">Team Members</span>
      </div>
      <div class="stat-item">
        <span class="number">12<em>+</em></span>
        <span class="label">Projects Built</span>
      </div>
      <div class="stat-item">
        <span class="number">04</span>
        <span class="label">Years Learning</span>
      </div>
      <div class="stat-item">
        <span class="number">01</span>
        <span class="label">Shared Vision</span>
      </div>
    </div>
  </div>

  <!-- Members Grid -->
  <section class="members-grid-section">
    <div class="container">
      <div class="members-grid">
        
        <!-- MEMBER 1 (Frank) -->
        <a href="<?php echo esc_url(home_url('/friends/frank')); ?>" class="member-card reveal">
          <div class="member-image">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/frankdp.jpg'); ?>" alt="Frank James Generalao">
            <span class="view-profile-btn">View Portfolio</span>
          </div>
          <div class="member-info">
            <h3 class="member-name">Frank James Generalao</h3>
            <span class="member-role"> Programmer</span>
          </div>
        </a>

        <!-- MEMBER 2 (Jay) -->
        <a href="<?php echo esc_url(home_url('/friends/jay')); ?>" class="member-card reveal">
          <div class="member-image">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/markdp.jpg'); ?>" alt="Jay Mark Generalao">
            <span class="view-profile-btn">View Portfolio</span>
          </div>
          <div class="member-info">
            <h3 class="member-name">Jay Mark Generalao</h3>
            <span class="member-role">System Analyst</span>
          </div>
        </a>

        <!-- MEMBER 3 (John) -->
        <a href="<?php echo esc_url(home_url('/friends/john')); ?>" class="member-card reveal">
          <div class="member-image">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/ivan.jpg'); ?>" alt="John Ivan Roland Sabella">
            <span class="view-profile-btn">View Portfolio</span>
          </div>
          <div class="member-info">
            <h3 class="member-name">John Ivan Roland Sabella</h3>
            <span class="member-role">Project Manager</span>
          </div>
        </a>

        <!-- MEMBER 4 (Kim) -->
        <a href="<?php echo esc_url(home_url('/friends/kim')); ?>" class="member-card reveal">
          <div class="member-image">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/kimmy.jpg'); ?>" alt="Kim Martinez">
            <span class="view-profile-btn">View Portfolio</span>
          </div>
          <div class="member-info">
            <h3 class="member-name">Kim Martinez</h3>
            <span class="member-role">Technical Writter</span>
          </div>
        </a>

      </div>
    </div>
  </section>
</main>

<script>
// JS para sa reveal animation kapag nag-scroll
document.addEventListener("DOMContentLoaded", function() {
  const reveals = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });
  
  reveals.forEach(reveal => observer.observe(reveal));
});
</script>

<?php get_footer(); ?>
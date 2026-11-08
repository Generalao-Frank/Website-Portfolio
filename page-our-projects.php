<?php
/**
 * Template Name: Our Projects
 * Template Post Type: page
 */
get_header(); ?>

<style>
/* ===== PROJECTS PAGE — Professional Edition ===== */
.projects-page {
  --ivory:#F7F4EC; --paper:#FBFAF5; --ink:#1A1814; --ink-3:#4A443A;
  --gold:#A8874E; --gold-2:#C4A566; --line:#DED7C7; --muted:#7A7266;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  background: var(--ivory); color: var(--ink); font-family: var(--sans);
  -webkit-font-smoothing: antialiased; overflow-x: hidden;
}

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

.projects-page .container {
  max-width: 1280px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px);
  position: relative; z-index: 2;
}

/* Hero Section */
.projects-hero {
  padding: clamp(160px, 18vw, 220px) 0 clamp(60px, 8vw, 100px);
  position: relative; overflow: hidden;
}
.projects-hero::before {
  content:""; position:absolute; top:-10%; right:-5%; width:60vw; height:60vw;
  max-width:700px; max-height:700px; border-radius:50%;
  background:radial-gradient(circle, rgba(196,165,102,.12), transparent 65%);
  pointer-events:none;
}
.projects-hero .kicker {
  font-size:.72rem; font-weight:500; letter-spacing:.24em; text-transform:uppercase;
  color:var(--gold); margin:0 0 24px; display:flex; align-items:center; gap:16px;
}
.projects-hero .kicker::before { content:""; width:40px; height:1px; background:var(--gold); }
.projects-hero h1 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(3rem, 8vw, 6.5rem);
  line-height: 1; letter-spacing: -0.03em; margin: 0 0 32px; max-width: 16ch;
}
.projects-hero h1 em { color: var(--gold); font-style: italic; }
.projects-hero .lede {
  max-width: 580px; font-size: 1.1rem; font-weight: 300; 
  line-height: 1.8; color: var(--ink-3);
}

/* Stats Strip (NEW) */
.projects-stats {
  display: grid; grid-template-columns: repeat(3, 1fr);
  gap: 24px; padding: clamp(32px, 5vw, 56px) 0;
  border-top: 1px solid var(--line); border-bottom: 1px solid var(--line);
  margin-bottom: clamp(60px, 8vw, 100px);
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

/* Projects List */
.projects-list {
  padding: 0 0 clamp(100px, 12vw, 180px);
  border-top: 1px solid var(--line);
}
.project-item {
  display: grid; grid-template-columns: 1fr 1fr; gap: clamp(40px, 6vw, 96px);
  align-items: center; padding: clamp(60px, 8vw, 100px) 0;
  border-bottom: 1px solid var(--line);
}
.project-item:nth-child(even) .project-content { order: 2; }
.project-item:nth-child(even) .project-visual { order: 1; }

/* Content */
.project-content .num {
  font-family: var(--serif); font-style: italic; font-size: 1.2rem;
  color: var(--gold); display: block; margin-bottom: 16px;
}
.project-content h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2rem, 4vw, 3.4rem);
  line-height: 1.1; letter-spacing: -0.02em; margin: 0 0 24px; color: var(--ink);
}
.project-content p {
  font-size: 1.02rem; font-weight: 300; line-height: 1.8; color: var(--ink-3);
  margin: 0 0 32px; max-width: 44ch;
}

/* Tags / Tech Stack */
.project-tags {
  display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 40px;
}
.project-tags span {
  font-size: 0.7rem; font-weight: 500; letter-spacing: 0.1em; text-transform: uppercase;
  color: var(--ink-3); padding: 8px 16px; 
  background: var(--paper);
  border: 1px solid var(--line); border-radius: 50px;
  transition: all 0.3s;
}
.project-item:hover .project-tags span {
  border-color: var(--gold); color: var(--gold);
}

/* Button */
.project-link {
  display: inline-flex; align-items: center; gap: 12px;
  font-size: 0.8rem; font-weight: 500; letter-spacing: 0.14em; text-transform: uppercase;
  color: var(--ink); text-decoration: none; padding-bottom: 6px;
  border-bottom: 1px solid var(--ink); transition: all 0.3s;
}
.project-link:hover { color: var(--gold); border-color: var(--gold); gap: 18px; }

/* Visuals & Images */
.project-visual {
  position: relative; aspect-ratio: 4/3; border-radius: 2px;
  overflow: hidden; background: var(--paper); border: 1px solid var(--line);
  box-shadow: 0 10px 30px -15px rgba(26,24,20,0.1);
  transition: box-shadow 0.5s, transform 0.5s;
}
.project-visual img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), filter 0.8s;
  filter: grayscale(10%);
}
.project-item:hover .project-visual {
  box-shadow: 0 30px 60px -20px rgba(26,24,20,0.25);
  transform: translateY(-6px);
}
.project-item:hover .project-visual img { 
  transform: scale(1.04); filter: grayscale(0%); 
}

/* Reveal Animation */
.reveal { opacity: 0; transform: translateY(40px); transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1), transform 1s cubic-bezier(0.16, 1, 0.3, 1); }
.reveal.in { opacity: 1; transform: translateY(0); }

/* Responsive */
@media (max-width: 900px) {
  .project-item { grid-template-columns: 1fr; gap: 40px; }
  .project-item:nth-child(even) .project-content { order: 1; }
  .project-item:nth-child(even) .project-visual { order: 2; }
  .project-visual { aspect-ratio: 16/9; }
  .projects-stats { grid-template-columns: 1fr; gap: 32px; }
}
</style>

<!-- Reading Progress Bar -->
<div class="read-progress" id="readProgress"></div>

<!-- Cursor Glow -->
<div class="cursor-glow" id="cursorGlow"></div>

<main class="projects-page">
  <!-- Hero -->
  <section class="projects-hero">
    <div class="container">
      <p class="kicker">Selected Work</p>
      <h1>Digital products<br>built with <em>intention.</em></h1>
      <p class="lede">
        A curated selection of our capstone projects — from conceptual 
        designs to fully functional web applications.
      </p>
    </div>
  </section>

  <!-- Stats Strip -->
  <div class="container">
    <div class="projects-stats reveal">
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

  <!-- Projects List -->
  <section class="projects-list">
    <div class="container">
      
      <!-- PROJECT 01: SCHOOL MANAGEMENT SYSTEM -->
      <article class="project-item">
        <div class="project-content reveal">
          <span class="num">01</span>
          <h2>School Management<br>System</h2>
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
          <a href="#" class="project-link">View Project →</a>
        </div>
        <div class="project-visual reveal">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/sms_cpst.jpg'); ?>" alt="School Management System">
        </div>
      </article>

      <!-- PROJECT 02: BUS TICKETING -->
      <article class="project-item">
        <div class="project-content reveal">
          <span class="num">02</span>
          <h2>Bus Ticketing<br>System</h2>
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
          <a href="#" class="project-link">View Case Study →</a>
        </div>
        <div class="project-visual reveal">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/busticket_cpst.jpg'); ?>" alt="Bus Ticketing System">
        </div>
      </article>

      <!-- PROJECT 03: MOBILE LEARNING APP -->
      <article class="project-item">
        <div class="project-content reveal">
          <span class="num">03</span>
          <h2>Mobile Learning<br>Platform</h2>
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
          <a href="#" class="project-link">Explore Project →</a>
        </div>
        <div class="project-visual reveal">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mobile_cpst.jpg'); ?>" alt="Mobile Learning Platform">
        </div>
      </article>

    </div>
  </section>
</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
  // 1. Reveal Animation
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

  // 2. Reading Progress Bar
  const progressBar = document.getElementById('readProgress');
  window.addEventListener('scroll', () => {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (scrollTop / scrollHeight) * 100;
    progressBar.style.width = scrolled + '%';
  });

  // 3. Cursor Glow
  const cursorGlow = document.getElementById('cursorGlow');
  if (window.innerWidth > 768) {
    document.addEventListener('mousemove', (e) => {
      cursorGlow.style.left = e.clientX + 'px';
      cursorGlow.style.top = e.clientY + 'px';
    });
  }

  // 4. Animated Counters
  const counters = document.querySelectorAll('.stat-item .number');
  const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const target = parseInt(el.getAttribute('data-target'));
        if (target) {
          let current = 0;
          const increment = target / 50;
          const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
              current = target;
              clearInterval(timer);
            }
            el.textContent = Math.floor(current) + (el.querySelector('em') ? '+' : '');
          }, 30);
        }
        counterObserver.unobserve(el);
      }
    });
  }, { threshold: 0.5 });
  counters.forEach(c => counterObserver.observe(c));
});
</script>

<?php get_footer(); ?>
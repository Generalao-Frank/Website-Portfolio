<?php
/**
 * Template Name: Skills & Expertise
 * Template Post Type: page
 */
get_header(); ?>

<style>
/* ===== SKILLS PAGE — Professional Edition ===== */
.skills-page {
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

.skills-page .container {
  max-width: 1280px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px);
  position: relative; z-index: 2;
}

/* Hero */
.skills-hero {
  padding: clamp(160px, 18vw, 220px) 0 clamp(60px, 8vw, 100px);
  text-align: center; position: relative;
}
.skills-hero::before {
  content:""; position:absolute; top:0; left:50%; transform:translateX(-50%);
  width:60vw; height:60vw; max-width:800px; max-height:800px;
  background:radial-gradient(circle, rgba(196,165,102,.1), transparent 65%);
  pointer-events:none;
}
.skills-hero .kicker {
  font-size:.72rem; font-weight:500; letter-spacing:.24em; text-transform:uppercase;
  color:var(--gold); margin:0 0 24px; display:flex; align-items:center; justify-content:center; gap:16px;
}
.skills-hero .kicker::before, .skills-hero .kicker::after { 
  content:""; width:40px; height:1px; background:var(--gold); 
}
.skills-hero h1 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(3rem, 8vw, 6.5rem);
  line-height: 1; letter-spacing: -0.03em; margin: 0 0 32px; color: var(--ink);
}
.skills-hero h1 em { color: var(--gold); font-style: italic; }
.skills-hero .lede {
  max-width: 550px; margin: 0 auto; font-size: 1.1rem; font-weight: 300; 
  line-height: 1.8; color: var(--ink-3);
}

/* ===== TECHNICAL SKILLS (Dark) ===== */
.skills-technical {
  background: var(--ink); color: var(--ivory);
  padding: clamp(80px, 10vw, 140px) 0;
}
.skills-technical .kicker { color: var(--gold-2); }
.skills-technical .kicker::before, .skills-technical .kicker::after { background: var(--gold-2); }
.skills-technical h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2.4rem, 5vw, 4.4rem);
  line-height: 1.05; margin: 0 0 64px; color: var(--ivory); text-align: center;
}
.skills-technical h2 em { color: var(--gold-2); font-style: italic; }

.skill-list { list-style: none; padding: 0; margin: 0; }
.skill-item {
  padding: clamp(24px, 3vw, 36px) 0;
  border-bottom: 1px solid rgba(247, 244, 236, 0.1);
  transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
  position: relative;
}
.skill-item:hover {
  padding-left: 20px;
  border-color: rgba(196, 165, 102, 0.4);
}
.skill-header {
  display: flex; justify-content: space-between; align-items: baseline;
  margin-bottom: 12px;
}
.skill-name {
  font-family: var(--serif); font-weight: 300; font-size: clamp(1.4rem, 2.5vw, 2rem);
  letter-spacing: -0.01em; color: var(--ivory); transition: color 0.3s;
}
.skill-item:hover .skill-name { color: var(--gold-2); }
.skill-percent {
  font-family: var(--serif); font-size: 1rem; font-style: italic; color: var(--gold-2);
}
.skill-desc {
  font-size: 0.82rem; font-weight: 400; letter-spacing: 0.04em;
  color: rgba(247, 244, 236, 0.55); margin-bottom: 16px;
}
/* Progress Bar */
.skill-bar-bg {
  width: 100%; height: 4px; background: rgba(247, 244, 236, 0.1);
  border-radius: 4px; overflow: hidden;
}
.skill-bar-fill {
  height: 100%; width: 0%; 
  background: linear-gradient(90deg, var(--gold), var(--gold-2));
  border-radius: 4px;
  transition: width 1.5s cubic-bezier(0.16, 1, 0.3, 1);
  box-shadow: 0 0 10px rgba(196,165,102,0.5);
}

/* ===== CREATIVE & TOOLS (Light) ===== */
.skills-creative {
  background: var(--paper); padding: clamp(80px, 10vw, 140px) 0;
  border-bottom: 1px solid var(--line);
}
.skills-creative .grid-layout {
  display: grid; grid-template-columns: 1fr 1.5fr; gap: clamp(40px, 8vw, 120px);
  align-items: start;
}
.skills-creative h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2.4rem, 4vw, 3.5rem);
  line-height: 1.1; letter-spacing: -0.02em; margin: 0 0 24px; color: var(--ink);
}
.skills-creative h2 em { color: var(--gold); font-style: italic; }
.skills-creative p {
  font-size: 1.05rem; font-weight: 300; line-height: 1.8; color: var(--ink-3);
  margin: 0 0 48px; max-width: 40ch;
}

/* ===== TOOLS GRID (Visual Cards) ===== */
.tools-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;
}
.tool-card {
  position: relative;
  display: flex; flex-direction: column; 
  align-items: center; justify-content: center;
  padding: 40px 20px 32px;
  background: var(--ivory);
  border: 1px solid var(--line);
  border-radius: 2px;
  overflow: hidden;
  transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
  cursor: pointer;
  text-decoration: none;
  color: inherit;
  aspect-ratio: 1/1;
}
.tool-card:hover {
  border-color: var(--gold);
  transform: translateY(-8px);
  box-shadow: 0 25px 50px -15px rgba(168, 135, 78, 0.25);
}
/* Gold Accent Top Bar */
.tool-card::before {
  content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 3px;
  background: var(--gold); transform: scaleX(0); 
  transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
}
.tool-card:hover::before { transform: scaleX(1); }

/* Icon Area */
.tool-icon {
  width: 64px; height: 64px; margin-bottom: 20px;
  transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
  display: flex; align-items: center; justify-content: center;
}
.tool-icon svg { width: 100%; height: 100%; }
.tool-card:hover .tool-icon { transform: scale(1.15) rotate(-5deg); }

/* Text */
.tool-card h3 {
  font-family: var(--serif); font-weight: 400; font-size: 1.2rem;
  margin: 0 0 4px; color: var(--ink); text-align: center;
  transition: color 0.3s;
}
.tool-card:hover h3 { color: var(--gold); }
.tool-card .tool-role {
  font-size: 0.68rem; font-weight: 500; letter-spacing: 0.12em;
  text-transform: uppercase; color: var(--muted); text-align: center;
  transition: color 0.3s;
}
.tool-card:hover .tool-role { color: var(--ink-3); }

/* Hover Description Overlay */
.tool-desc {
  position: absolute; inset: 0;
  background: var(--ink); color: var(--ivory);
  display: flex; align-items: center; justify-content: center;
  padding: 24px; text-align: center;
  font-size: 0.85rem; font-weight: 300; line-height: 1.6;
  opacity: 0; transform: translateY(20px);
  transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
  border-radius: 2px;
}
.tool-card:hover .tool-desc {
  opacity: 1; transform: translateY(0);
}
.tool-desc em { color: var(--gold-2); font-style: italic; }

/* Reveal */
.reveal { opacity: 0; transform: translateY(40px); transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1), transform 1s cubic-bezier(0.16, 1, 0.3, 1); }
.reveal.in { opacity: 1; transform: translateY(0); }

/* Responsive */
@media (max-width: 900px) {
  .skills-creative .grid-layout { grid-template-columns: 1fr; gap: 40px; }
  .tools-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 600px) {
  .tools-grid { grid-template-columns: 1fr 1fr; }
  .tool-card { padding: 24px 12px; aspect-ratio: 1/1; }
  .tool-icon { width: 48px; height: 48px; margin-bottom: 12px; }
  .tool-card h3 { font-size: 1rem; }
  .tool-card .tool-role { font-size: 0.6rem; }
}
</style>

<!-- Reading Progress Bar -->
<div class="read-progress" id="readProgress"></div>

<!-- Cursor Glow -->
<div class="cursor-glow" id="cursorGlow"></div>

<main class="skills-page">
  <!-- Hero -->
  <section class="skills-hero">
    <div class="container">
      <p class="kicker reveal">Our Arsenal</p>
      <h1 class="reveal">Skills &amp; <em>Expertise.</em></h1>
      <p class="lede reveal">
        The tools, languages, and principles we use to transform ideas into 
        functional, beautiful digital experiences.
      </p>
    </div>
  </section>

  <!-- Technical Skills (Dark) -->
  <section class="skills-technical">
    <div class="container">
      <p class="kicker reveal" style="justify-content:center;">Core Competencies</p>
      <h2 class="reveal">Technical <em>Foundation.</em></h2>
      
      <ul class="skill-list">
        <li class="skill-item reveal">
          <div class="skill-header">
            <span class="skill-name">HTML &amp; CSS</span>
            <span class="skill-percent">95%</span>
          </div>
          <div class="skill-desc">Semantic structure, responsive layout, modern Grid &amp; Flexbox</div>
          <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="95"></div></div>
        </li>
        <li class="skill-item reveal">
          <div class="skill-header">
            <span class="skill-name">JavaScript</span>
            <span class="skill-percent">85%</span>
          </div>
          <div class="skill-desc">ES6+, DOM manipulation, async/await, DOM APIs</div>
          <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="85"></div></div>
        </li>
        <li class="skill-item reveal">
          <div class="skill-header">
            <span class="skill-name">PHP &amp; WordPress</span>
            <span class="skill-percent">88%</span>
          </div>
          <div class="skill-desc">Custom theme development, template hierarchy, hooks</div>
          <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="88"></div></div>
        </li>
        <li class="skill-item reveal">
          <div class="skill-header">
            <span class="skill-name">UI / UX Design</span>
            <span class="skill-percent">80%</span>
          </div>
          <div class="skill-desc">Wireframing, typography, color theory, accessibility</div>
          <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="80"></div></div>
        </li>
        <li class="skill-item reveal">
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

  <!-- Creative & Tools (Light) -->
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
          <div class="tool-card reveal">
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
          <div class="tool-card reveal">
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
          <div class="tool-card reveal">
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
          <div class="tool-card reveal">
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
          <div class="tool-card reveal">
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
          <div class="tool-card reveal">
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
document.addEventListener("DOMContentLoaded", function() {
  // 1. Reveal Animation
  const reveals = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.classList.add('in');
        }, i * 80);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });
  reveals.forEach(reveal => observer.observe(reveal));

  // 2. Progress Bar Animation
  const skillItems = document.querySelectorAll('.skill-item');
  const skillObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const bar = entry.target.querySelector('.skill-bar-fill');
        if (bar) {
          const width = bar.getAttribute('data-width');
          setTimeout(() => {
            bar.style.width = width + '%';
          }, 200);
        }
        skillObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });
  skillItems.forEach(item => skillObserver.observe(item));

  // 3. Reading Progress Bar
  const progressBar = document.getElementById('readProgress');
  window.addEventListener('scroll', () => {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (scrollTop / scrollHeight) * 100;
    progressBar.style.width = scrolled + '%';
  });

  // 4. Cursor Glow
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
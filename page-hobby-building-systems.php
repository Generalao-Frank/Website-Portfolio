<?php
/**
 * Template Name: Hobby - Building Systems - frank
 * Template Post Type: page
 */
get_header(); 

$content = get_the_content();
$first_para = '';
if ( !empty($content) ) {
    $first_para = explode('</p>', $content)[0];
    $first_para = strip_tags($first_para, '<em><strong><i><b>') . '</p>';
}
?>

<style>
/* ===== HOBBY: BUILDING SYSTEMS — Professional Edition ===== */
.hobby-systems {
  --ivory:#F7F4EC; --paper:#FBFAF5; --ink:#1A1814; --gold:#A8874E; --gold-2:#C4A566;
  --line:#DED7C7; --muted:#7A7266;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  background: var(--paper); color: var(--ink); font-family: var(--sans);
  min-height: 100vh; position: relative; overflow-x: hidden;
  -webkit-font-smoothing: antialiased; scroll-behavior: smooth;
}

/* Custom Scrollbar (Gold) */
.hobby-systems ::-webkit-scrollbar { width: 8px; }
.hobby-systems ::-webkit-scrollbar-track { background: var(--ivory); }
.hobby-systems ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 10px; }

/* Reading Progress Bar */
.read-progress {
  position: fixed; top: 0; left: 0; height: 3px; width: 0%;
  background: linear-gradient(90deg, var(--gold), var(--gold-2));
  z-index: 9999; transition: width 0.1s ease-out;
  box-shadow: 0 0 10px rgba(168,135,78,0.6);
}

/* Parallax Blueprint Grid */
.hobby-systems::before {
  content: ""; position: absolute; inset: 0; pointer-events: none;
  background-image: 
    linear-gradient(rgba(168,135,78,0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(168,135,78,0.04) 1px, transparent 1px);
  background-size: 40px 40px;
  z-index: 0;
}

/* Floating Code Snippets Background */
.floating-code {
  position: absolute; font-family: monospace; color: var(--gold); 
  opacity: 0.08; font-size: 4rem; pointer-events: none; z-index: 0;
  animation: floatSlow 15s infinite ease-in-out;
  user-select: none;
}
.fc-1 { top: 15%; left: 5%; animation-delay: 0s; }
.fc-2 { top: 40%; right: 8%; animation-delay: 3s; font-size: 6rem; }
.fc-3 { bottom: 20%; left: 10%; animation-delay: 6s; }
.fc-4 { top: 70%; right: 15%; animation-delay: 9s; font-size: 3rem; }
@keyframes floatSlow {
  0%, 100% { transform: translateY(0) rotate(0deg); }
  50% { transform: translateY(-30px) rotate(10deg); }
}

/* Custom Cursor Glow */
.cursor-glow {
  position: fixed; width: 400px; height: 400px; border-radius: 50%;
  background: radial-gradient(circle, rgba(168,135,78,0.08), transparent 70%);
  pointer-events: none; z-index: 1; transform: translate(-50%, -50%);
  transition: opacity 0.3s ease;
}
@media (max-width: 768px) { .cursor-glow { display: none; } }

.hobby-systems .container { max-width: 900px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px); position: relative; z-index: 2; }

/* Back Button */
.back-link { 
  display: inline-flex; align-items: center; gap: 8px; margin-top: 140px; 
  font-size: 0.8rem; font-weight: 500; letter-spacing: 0.14em; text-transform: uppercase; 
  color: var(--gold); text-decoration: none; transition: all 0.3s; 
  padding: 8px 16px; border: 1px solid transparent; border-radius: 50px;
}
.back-link:hover { 
  color: var(--ink); border-color: var(--line); background: rgba(255,255,255,0.4);
  transform: translateX(-4px);
}

/* Hero & Liquid Glass Icon */
.hobby-hero { padding: clamp(32px, 5vw, 64px) 0 clamp(40px, 6vw, 80px); text-align: center; }
.hobby-hero .icon-wrapper {
  display: inline-flex; align-items: center; justify-content: center;
  width: 120px; height: 120px; border-radius: 50%; margin: 0 auto 32px;
  background: rgba(255,255,255,0.5);
  border: 1px solid var(--gold);
  box-shadow: 
    0 10px 30px -10px rgba(168,135,78,0.3),
    inset 0 0 20px rgba(168,135,78,0.05);
  backdrop-filter: blur(10px);
  animation: floatIcon 4s ease-in-out infinite;
}
@keyframes floatIcon {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}
.hobby-hero .icon { width: 56px; height: 56px; color: var(--gold); }

.hobby-hero h1 { 
  font-family: var(--serif); font-weight: 300; font-size: clamp(3rem, 8vw, 6rem); 
  line-height: 1; letter-spacing: -0.03em; margin: 0 0 24px; color: var(--ink); 
}
.hobby-hero h1 em { color: var(--gold); font-style: italic; }

/* Quote */
.hobby-quote { 
  font-family: var(--serif); font-weight: 300; font-size: clamp(1.4rem, 3vw, 2.2rem); 
  line-height: 1.4; letter-spacing: -0.01em; text-align: center; 
  margin: 0 auto 80px; max-width: 700px; padding: 0 20px; 
  position: relative; color: var(--ink);
  padding: 40px 20px;
  border-top: 1px solid var(--line); border-bottom: 1px solid var(--line);
}
.hobby-quote em { color: var(--gold); font-style: italic; }

/* ===== ACTION PHOTO SECTION ===== */
.action-photo-section { margin-bottom: 100px; }
.action-photo-frame {
  position: relative; max-width: 700px; margin: 0 auto;
  border-radius: 2px; overflow: hidden;
  border: 1px solid var(--line);
  box-shadow: 
    0 30px 60px -20px rgba(0,0,0,0.15),
    20px 20px 0 0 var(--line);
  transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}
.action-photo-frame:hover {
  transform: translate(-4px, -4px);
  box-shadow: 
    0 40px 80px -20px rgba(0,0,0,0.2),
    24px 24px 0 0 var(--gold);
}
.action-photo-frame img {
  width: 100%; height: auto; display: block;
  filter: grayscale(15%) contrast(1.05);
  transition: filter 0.6s, transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
}
.action-photo-frame:hover img {
  filter: grayscale(0%) contrast(1);
  transform: scale(1.02);
}
.action-photo-caption {
  text-align: center; margin-top: 24px;
  font-family: var(--serif); font-style: italic;
  font-size: 1rem; color: var(--muted); letter-spacing: 0.02em;
}
.action-photo-caption::before { content: "— "; }
.action-photo-caption::after { content: " —"; }

/* Tech Setup Strip (Bagong Feature) */
.setup-strip {
  display: flex; justify-content: center; gap: 40px;
  margin-top: 32px; padding: 24px 20px;
  background: var(--ivory); border: 1px solid var(--line); border-radius: 2px;
  flex-wrap: wrap;
}
.setup-item {
  display: flex; align-items: center; gap: 8px;
  font-size: 0.75rem; font-weight: 500; letter-spacing: 0.08em;
  text-transform: uppercase; color: var(--muted);
}
.setup-item strong { color: var(--ink); font-weight: 500; }
.setup-item .dot-icon {
  width: 6px; height: 6px; background: var(--gold); border-radius: 50%;
}

/* Content */
.hobby-content { 
  font-size: 1.1rem; font-weight: 300; line-height: 1.9; 
  color: #4A443A; padding-bottom: 60px; 
}
.hobby-content p { margin: 0 0 24px; }

/* Stats Section Pro */
.hobby-stats {
  display: grid; grid-template-columns: repeat(3, 1fr);
  gap: 24px; padding-bottom: 120px;
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

/* Reveal Animation */
.reveal { opacity: 0; transform: translateY(40px); transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1), transform 1s cubic-bezier(0.16, 1, 0.3, 1); }
.reveal.in { opacity: 1; transform: translateY(0); }

@media (max-width: 700px) {
  .hobby-stats { grid-template-columns: 1fr; }
  .floating-code { display: none; }
  .action-photo-frame { box-shadow: 0 20px 40px -10px rgba(0,0,0,0.1), 10px 10px 0 0 var(--line); }
  .setup-strip { flex-direction: column; gap: 16px; align-items: center; }
}
</style>

<!-- Reading Progress Bar -->
<div class="read-progress" id="readProgress"></div>

<!-- Cursor Glow -->
<div class="cursor-glow" id="cursorGlow"></div>

<main class="hobby-systems">
  <!-- Floating Background Elements -->
  <span class="floating-code fc-1">&lt;/&gt;</span>
  <span class="floating-code fc-2">{ }</span>
  <span class="floating-code fc-3">=&gt;</span>
  <span class="floating-code fc-4">[ ]</span>

  <div class="container">
    <a href="<?php echo esc_url(home_url('/friends/frank/')); ?>" class="back-link">← Back to Frank</a>
    
    <section class="hobby-hero">
      <div class="icon-wrapper">
        <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z"/>
        </svg>
      </div>
      <h1 class="reveal">Building Systems <em>& Logic.</em></h1>
    </section>
    
    <!-- DYNAMIC QUOTE -->
    <blockquote class="hobby-quote reveal">
      <?php if ( !empty($first_para) ) : ?>
        <?php echo $first_para; ?>
      <?php else : ?>
        “ A system is never finished. It evolves, adapts, and <em>teaches you something new every time you touch it.</em> ”
      <?php endif; ?>
    </blockquote>

    <!-- ===== ACTION PHOTO SECTION ===== -->
    <section class="action-photo-section reveal">
      <div class="action-photo-frame">
        <!-- 
          PALITAN MO ITO:
          Ilagay mo yung totoong filename ng picture mo habang nagko-code.
        -->
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/frankcode.jpg'); ?>" alt="Frank building systems">
      </div>
      <p class="action-photo-caption">Deep in the zone — architecting the next system.</p>
      
      <!-- Tech Setup Strip -->
      <div class="setup-strip">
        <div class="setup-item">
          <span class="dot-icon"></span> Editor: <strong>VS Code</strong>
        </div>
        <div class="setup-item">
          <span class="dot-icon"></span> OS: <strong>Windows 11</strong>
        </div>
        <div class="setup-item">
          <span class="dot-icon"></span> Stack: <strong>PHP + MySQL</strong>
        </div>
      </div>
    </section>

    <!-- DYNAMIC CONTENT -->
    <section class="hobby-content">
      <?php 
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();
            $paragraphs = explode('</p>', get_the_content());
            foreach($paragraphs as $p) {
              if(trim(strip_tags($p)) !== '') {
                echo '<p class="reveal">' . strip_tags($p, '<em><strong><i><b><a><br>') . '</p>';
              }
            }
          endwhile;
        else :
          echo '<p class="reveal">I enjoy building systems from the ground up — designing the architecture, connecting the dots, and watching it come alive.</p>';
        endif;
      ?>
    </section>

    <!-- STATS SECTION -->
    <section class="hobby-stats">
      <div class="stat-box reveal">
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z"/></svg>
        <span class="label">Focus</span>
        <div class="value">Full Stack</div>
      </div>
      <div class="stat-box reveal">
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.79 4.21,10.21L9,15V16A2,2 0 0,0 11,18M17.9,17.39C17.64,16.58 16.9,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39Z"/></svg>
        <span class="label">Main Stack</span>
        <div class="value">PHP / JS</div>
      </div>
      <div class="stat-box reveal">
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12,2A7,7 0 0,0 5,9C5,11.38 6.19,13.47 8,14.74V17A1,1 0 0,0 9,18H15A1,1 0 0,0 16,17V14.74C17.81,13.47 19,11.38 19,9A7,7 0 0,0 12,2M9,21A1,1 0 0,0 10,22H14A1,1 0 0,0 15,21V20H9V21Z"/></svg>
        <span class="label">Mindset</span>
        <div class="value">Always Learning</div>
      </div>
    </section>
  </div>
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
});
</script>

<?php get_footer(); ?>
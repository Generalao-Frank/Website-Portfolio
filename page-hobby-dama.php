<?php
/**
 * Template Name: Hobby - Dama - frank
 * Template Post Type: page
 */
get_header(); 

// Dynamic Quote Extraction
$content = get_the_content();
$first_para = '';
if ( !empty($content) ) {
    $first_para = explode('</p>', $content)[0];
    $first_para = strip_tags($first_para, '<em><strong><i><b>') . '</p>';
}
?>

<style>
/* ===== HOBBY: DAMA — Professional Edition (Warm Classic) ===== */
.hobby-dama {
  --ivory:#F2E8D5; --paper:#EBE0C8; --ink:#2B1D0E; --gold:#8B5A2B; --gold-2:#A6753E;
  --line:#D5C7A9; --muted:#7A6A54;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  background: var(--paper); color: var(--ink); font-family: var(--sans);
  min-height: 100vh; position: relative; overflow-x: hidden;
  -webkit-font-smoothing: antialiased;
  scroll-behavior: smooth;
}

/* Custom Scrollbar */
.hobby-dama ::-webkit-scrollbar { width: 8px; }
.hobby-dama ::-webkit-scrollbar-track { background: var(--ivory); }
.hobby-dama ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 10px; }

/* Reading Progress Bar */
.read-progress {
  position: fixed; top: 0; left: 0; height: 3px; width: 0%;
  background: linear-gradient(90deg, var(--gold), var(--gold-2));
  z-index: 9999; transition: width 0.1s ease-out;
  box-shadow: 0 0 10px rgba(139,90,43,0.6);
}

/* Classic Wooden Pattern Background */
.hobby-dama::before {
  content: ""; position: absolute; inset: 0; pointer-events: none;
  background-image: 
    repeating-linear-gradient(45deg, rgba(139,90,43,0.03) 0px, rgba(139,90,43,0.03) 2px, transparent 2px, transparent 10px),
    repeating-linear-gradient(-45deg, rgba(139,90,43,0.02) 0px, rgba(139,90,43,0.02) 2px, transparent 2px, transparent 10px);
  z-index: 0;
}

/* Floating Checkers (Background Elements) */
.floating-pieces {
  position: absolute; border-radius: 50%; background: var(--gold); 
  opacity: 0.08; pointer-events: none; z-index: 0;
  animation: floatSlow 12s infinite ease-in-out;
}
.fp-1 { width: 40px; height: 40px; top: 15%; left: 8%; animation-delay: 0s; }
.fp-2 { width: 60px; height: 60px; top: 35%; right: 10%; animation-delay: 3s; background: var(--ink); }
.fp-3 { width: 30px; height: 30px; bottom: 25%; left: 15%; animation-delay: 6s; background: var(--ink); }
.fp-4 { width: 50px; height: 50px; top: 70%; right: 12%; animation-delay: 9s; }
@keyframes floatSlow {
  0%, 100% { transform: translateY(0) rotate(0deg); }
  50% { transform: translateY(-40px) rotate(180deg); }
}

/* Custom Cursor Glow */
.cursor-glow {
  position: fixed; width: 400px; height: 400px; border-radius: 50%;
  background: radial-gradient(circle, rgba(139,90,43,0.1), transparent 70%);
  pointer-events: none; z-index: 1; transform: translate(-50%, -50%);
  transition: opacity 0.3s ease;
}
@media (max-width: 768px) { .cursor-glow { display: none; } }

.hobby-dama .container { max-width: 900px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px); position: relative; z-index: 2; }

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
  background: rgba(255,255,255,0.4);
  border: 1px solid var(--gold);
  box-shadow: 
    0 10px 30px -10px rgba(139,90,43,0.3),
    inset 0 0 20px rgba(139,90,43,0.05);
  backdrop-filter: blur(10px);
  animation: floatIcon 4s ease-in-out infinite;
}
@keyframes floatIcon {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}
.hobby-hero .icon { width: 56px; height: 56px; color: var(--gold); }

.hobby-hero h1 { 
  font-family: var(--serif); font-weight: 400; font-size: clamp(3rem, 8vw, 6rem); 
  line-height: 1; letter-spacing: -0.02em; margin: 0 0 24px; color: var(--ink); 
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

/* Content */
.hobby-content { 
  font-size: 1.1rem; font-weight: 300; line-height: 1.9; 
  color: #3A2C1C; padding-bottom: 60px; 
}
.hobby-content p { margin: 0 0 24px; }

/* Stats Section Pro */
.hobby-stats {
  display: grid; grid-template-columns: repeat(3, 1fr);
  gap: 24px; padding-bottom: 120px;
}
.stat-box {
  position: relative; padding: 40px 24px; text-align: center;
  background: rgba(255,255,255,0.5);
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
  box-shadow: 0 20px 40px -15px rgba(139,90,43,0.2);
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
  .floating-pieces { display: none; }
}
</style>

<!-- Reading Progress Bar -->
<div class="read-progress" id="readProgress"></div>

<!-- Cursor Glow -->
<div class="cursor-glow" id="cursorGlow"></div>

<main class="hobby-dama">
  <!-- Floating Background Elements -->
  <div class="floating-pieces fp-1"></div>
  <div class="floating-pieces fp-2"></div>
  <div class="floating-pieces fp-3"></div>
  <div class="floating-pieces fp-4"></div>

  <div class="container">
    <a href="<?php echo esc_url(home_url('/friends/frank/')); ?>" class="back-link">← Back to Frank</a>
    
    <section class="hobby-hero">
      <div class="icon-wrapper">
        <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10Z"/>
        </svg>
      </div>
      <h1 class="reveal">Dama <em>& Tradition.</em></h1>
    </section>
    
    <!-- DYNAMIC QUOTE -->
    <blockquote class="hobby-quote reveal">
      <?php if ( !empty($first_para) ) : ?>
        <?php echo $first_para; ?>
      <?php else : ?>
        “ Dama is simple to learn, but hard to master. It's a game of <em>small victories</em> and silent calculations. ”
      <?php endif; ?>
    </blockquote>

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
          echo '<p class="reveal">Dama has been played for centuries. It is the type of game where the board never changes, but the story always does.</p>';
        endif;
      ?>
    </section>

    <!-- STATS SECTION -->
    <section class="hobby-stats">
      <div class="stat-box reveal">
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.79 4.21,10.21L9,15V16A2,2 0 0,0 11,18M17.9,17.39C17.64,16.58 16.9,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39Z"/></svg>
        <span class="label">Years Playing</span>
        <div class="value">Since 2015</div>
      </div>
      <div class="stat-box reveal">
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12,3L2,12H5V20H19V12H22L12,3M12,8.75A2.25,2.25 0 0,1 14.25,11A2.25,2.25 0 0,1 12,13.25A2.25,2.25 0 0,1 9.75,11A2.25,2.25 0 0,1 12,8.75M12,15C13.5,15 16.5,15.75 16.5,17.25V18H7.5V17.25C7.5,15.75 10.5,15 12,15Z"/></svg>
        <span class="label">Preferred Side</span>
        <div class="value">White Pieces</div>
      </div>
      <div class="stat-box reveal">
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z"/></svg>
        <span class="label">Favorite Move</span>
        <div class="value">The Double Capture</div>
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
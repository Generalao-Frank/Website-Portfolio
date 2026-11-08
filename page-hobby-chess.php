<?php
/**
 * Template Name: Hobby - Chess - frank
 * Template Post Type: page
 */
get_header(); 

// Dynamic Quote
$content = get_the_content();
$first_para = '';
if ( !empty($content) ) {
    $first_para = explode('</p>', $content)[0];
    $first_para = strip_tags($first_para, '<em><strong><i><b>') . '</p>';
}
?>

<style>
/* ===== HOBBY: CHESS — Professional Edition ===== */
.hobby-chess {
  --ivory:#F7F4EC; --ink:#1A1814; --gold:#A8874E; --gold-2:#C4A566;
  --line:#DED7C7; --muted:#9A9284;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  background: var(--ink); color: var(--ivory); font-family: var(--sans);
  min-height: 100vh; position: relative; overflow-x: hidden;
  -webkit-font-smoothing: antialiased; scroll-behavior: smooth;
}

/* Custom Scrollbar */
.hobby-chess ::-webkit-scrollbar { width: 8px; }
.hobby-chess ::-webkit-scrollbar-track { background: var(--ink); }
.hobby-chess ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 10px; }

/* Reading Progress Bar */
.read-progress {
  position: fixed; top: 0; left: 0; height: 3px; width: 0%;
  background: linear-gradient(90deg, var(--gold), var(--gold-2));
  z-index: 9999; transition: width 0.1s ease-out;
  box-shadow: 0 0 10px rgba(168,135,78,0.6);
}

/* Subtle Chess Board Background */
.hobby-chess::before {
  content: ""; position: absolute; inset: 0; pointer-events: none;
  background-image: 
    linear-gradient(45deg, rgba(196,165,102,.03) 25%, transparent 25%), 
    linear-gradient(-45deg, rgba(196,165,102,.03) 25%, transparent 25%), 
    linear-gradient(45deg, transparent 75%, rgba(196,165,102,.03) 75%), 
    linear-gradient(-45deg, transparent 75%, rgba(196,165,102,.03) 75%);
  background-size: 80px 80px;
  background-position: 0 0, 0 40px, 40px -40px, -40px 0px;
  opacity: 0.8; z-index: 0;
}

/* Floating Chess Symbols */
.floating-chess {
  position: absolute; font-family: var(--serif); color: var(--gold); 
  opacity: 0.06; font-size: 8rem; pointer-events: none; z-index: 0;
  animation: floatChess 15s infinite ease-in-out;
  user-select: none; font-style: italic;
}
.fc-1 { top: 10%; left: 5%; animation-delay: 0s; }
.fc-2 { top: 35%; right: 8%; animation-delay: 3s; font-size: 10rem; }
.fc-3 { bottom: 20%; left: 10%; animation-delay: 6s; }
.fc-4 { top: 70%; right: 15%; animation-delay: 9s; font-size: 6rem; }
@keyframes floatChess {
  0%, 100% { transform: translateY(0) rotate(0deg); }
  50% { transform: translateY(-30px) rotate(15deg); }
}

/* Cursor Glow */
.cursor-glow {
  position: fixed; width: 400px; height: 400px; border-radius: 50%;
  background: radial-gradient(circle, rgba(168,135,78,0.1), transparent 70%);
  pointer-events: none; z-index: 1; transform: translate(-50%, -50%);
  transition: opacity 0.3s ease;
}
@media (max-width: 768px) { .cursor-glow { display: none; } }

.hobby-chess .container { max-width: 900px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px); position: relative; z-index: 2; }

/* Back Button */
.back-link { 
  display: inline-flex; align-items: center; gap: 8px; margin-top: 140px; 
  font-size: 0.8rem; font-weight: 500; letter-spacing: 0.14em; text-transform: uppercase; 
  color: var(--gold); text-decoration: none; transition: all 0.3s; 
  padding: 8px 16px; border: 1px solid transparent; border-radius: 50px;
}
.back-link:hover { 
  color: var(--ivory); border-color: rgba(247,244,236,0.15); background: rgba(255,255,255,0.05);
  transform: translateX(-4px);
}

/* Hero & Liquid Glass Icon */
.hobby-hero { padding: clamp(32px, 5vw, 64px) 0 clamp(40px, 6vw, 80px); text-align: center; }
.hobby-hero .icon-wrapper {
  display: inline-flex; align-items: center; justify-content: center;
  width: 120px; height: 120px; border-radius: 50%; margin: 0 auto 32px;
  background: rgba(255,255,255,0.03);
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
  line-height: 1; letter-spacing: -0.03em; margin: 0 0 24px; color: var(--ivory); 
}
.hobby-hero h1 em { color: var(--gold); font-style: italic; }

/* Quote */
.hobby-quote { 
  font-family: var(--serif); font-weight: 300; font-size: clamp(1.4rem, 3vw, 2.2rem); 
  line-height: 1.4; letter-spacing: -0.01em; text-align: center; 
  margin: 0 auto 80px; max-width: 700px; padding: 0 20px; 
  position: relative; color: var(--ivory);
  padding: 40px 20px;
  border-top: 1px solid rgba(247,244,236,0.1); 
  border-bottom: 1px solid rgba(247,244,236,0.1);
}
.hobby-quote em { color: var(--gold); font-style: italic; }

/* ===== ACTION PHOTO SECTION (NEW!) ===== */
.action-photo-section {
  margin-bottom: 100px;
}
.action-photo-frame {
  position: relative;
  max-width: 700px;
  margin: 0 auto;
  border-radius: 2px;
  overflow: hidden;
  border: 1px solid rgba(247,244,236,0.15);
  box-shadow: 
    0 30px 60px -20px rgba(0,0,0,0.5),
    20px 20px 0 0 rgba(168,135,78,0.15);
  transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}
.action-photo-frame:hover {
  transform: translate(-4px, -4px);
  box-shadow: 
    0 40px 80px -20px rgba(0,0,0,0.6),
    24px 24px 0 0 rgba(168,135,78,0.25);
}
.action-photo-frame img {
  width: 100%; height: auto; display: block;
  filter: grayscale(20%);
  transition: filter 0.6s, transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
}
.action-photo-frame:hover img {
  filter: grayscale(0%);
  transform: scale(1.02);
}
.action-photo-caption {
  text-align: center; margin-top: 24px;
  font-family: var(--serif); font-style: italic;
  font-size: 1rem; color: var(--muted); letter-spacing: 0.02em;
}
.action-photo-caption::before { content: "— "; }
.action-photo-caption::after { content: " —"; }

/* Content */
.hobby-content { 
  font-size: 1.1rem; font-weight: 300; line-height: 1.9; 
  color: rgba(247,244,236,0.75); padding-bottom: 60px; 
}
.hobby-content p { margin: 0 0 24px; }

/* Stats Section Pro */
.hobby-stats {
  display: grid; grid-template-columns: repeat(3, 1fr);
  gap: 24px; padding-bottom: 120px;
}
.stat-box {
  position: relative; padding: 40px 24px; text-align: center;
  background: rgba(247,244,236,0.03);
  border: 1px solid rgba(247,244,236,0.1);
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
  background: rgba(247,244,236,0.05);
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
  font-family: var(--serif); font-size: 1.4rem; font-weight: 400; color: var(--gold-2);
}

/* Reveal Animation */
.reveal { opacity: 0; transform: translateY(40px); transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1), transform 1s cubic-bezier(0.16, 1, 0.3, 1); }
.reveal.in { opacity: 1; transform: translateY(0); }

@media (max-width: 700px) {
  .hobby-stats { grid-template-columns: 1fr; }
  .floating-chess { display: none; }
  .action-photo-frame { box-shadow: 0 20px 40px -10px rgba(0,0,0,0.5), 10px 10px 0 0 rgba(168,135,78,0.15); }
}
</style>

<!-- Reading Progress Bar -->
<div class="read-progress" id="readProgress"></div>

<!-- Cursor Glow -->
<div class="cursor-glow" id="cursorGlow"></div>

<main class="hobby-chess">
  <!-- Floating Chess Symbols -->
  <span class="floating-chess fc-1">♔</span>
  <span class="floating-chess fc-2">♕</span>
  <span class="floating-chess fc-3">♖</span>
  <span class="floating-chess fc-4">♘</span>

  <div class="container">
    <a href="<?php echo esc_url(home_url('/friends/frank/')); ?>" class="back-link">← Back to Frank</a>
    
    <section class="hobby-hero">
      <div class="icon-wrapper">
        <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
          <path d="M19,22H5V20H19V22M17,10C17,7.24 14.76,5 12,5C9.24,5 7,7.24 7,10C7,12.03 8.21,13.77 10,14.58V17H14V14.58C15.79,13.77 17,12.03 17,10M12,3C15.87,3 19,6.13 19,10C19,12.41 17.71,14.53 15.78,15.71L16,17H8L8.22,15.71C6.29,14.53 5,12.41 5,10C5,6.13 8.13,3 12,3Z"/>
        </svg>
      </div>
      <h1 class="reveal">Chess <em>& Strategy.</em></h1>
    </section>
    
    <!-- DYNAMIC QUOTE -->
    <blockquote class="hobby-quote reveal">
      <?php if ( !empty($first_para) ) : ?>
        <?php echo $first_para; ?>
      <?php else : ?>
        “ In chess, every move is a commitment. You learn patience, foresight, and the art of <em>looking before you leap.</em> ”
      <?php endif; ?>
    </blockquote>

    <!-- ===== ACTION PHOTO SECTION ===== -->
    <section class="action-photo-section reveal">
      <div class="action-photo-frame">
        <!-- 
          PALITAN MO ITO: 
          Ilagay mo yung totoong filename ng picture mo na naglalaro ng chess.
          Halimbawa: frank-chess.jpg, chess-match.png, etc.
        -->
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/frankchess.jpg'); ?>" alt="Frank playing chess">
      </div>
      <p class="action-photo-caption">The quiet before the storm — analyzing the board.</p>
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
          echo '<p class="reveal">Chess taught me that the best moves aren\'t always the most obvious ones. It is a game of silence, calculation, and nerve.</p>';
        endif;
      ?>
    </section>

    <!-- STATS SECTION -->
    <section class="hobby-stats">
      <div class="stat-box reveal">
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.79 4.21,10.21L9,15V16A2,2 0 0,0 11,18M17.9,17.39C17.64,16.58 16.9,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39Z"/></svg>
        <span class="label">Experience</span>
        <div class="value">5+ Years</div>
      </div>
      <div class="stat-box reveal">
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12,3L2,12H5V20H19V12H22L12,3M12,8.75A2.25,2.25 0 0,1 14.25,11A2.25,2.25 0 0,1 12,13.25A2.25,2.25 0 0,1 9.75,11A2.25,2.25 0 0,1 12,8.75M12,15C13.5,15 16.5,15.75 16.5,17.25V18H7.5V17.25C7.5,15.75 10.5,15 12,15Z"/></svg>
        <span class="label">Favorite Opening</span>
        <div class="value">Sicilian Defense</div>
      </div>
      <div class="stat-box reveal">
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z"/></svg>
        <span class="label">Current Rating</span>
        <div class="value">1500 ELO</div>
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
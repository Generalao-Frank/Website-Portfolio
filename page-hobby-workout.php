<?php
/**
 * Template Name: Hobby - Home Workout - frank
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
/* ===== HOBBY: HOME WORKOUT — Professional Edition ===== */
.hobby-workout {
  --ivory:#F7F4EC; --paper:#FBFAF5; --ink:#1A1814; --gold:#A8874E; --gold-2:#C4A566;
  --line:#DED7C7; --muted:#7A7266;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  background: var(--paper); color: var(--ink); font-family: var(--sans);
  min-height: 100vh; position: relative; overflow-x: hidden;
  -webkit-font-smoothing: antialiased; scroll-behavior: smooth;
}

/* Custom Scrollbar */
.hobby-workout ::-webkit-scrollbar { width: 8px; }
.hobby-workout ::-webkit-scrollbar-track { background: var(--ivory); }
.hobby-workout ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 10px; }

/* Reading Progress Bar */
.read-progress {
  position: fixed; top: 0; left: 0; height: 3px; width: 0%;
  background: linear-gradient(90deg, var(--gold), var(--gold-2));
  z-index: 9999; transition: width 0.1s ease-out;
  box-shadow: 0 0 10px rgba(168,135,78,0.6);
}

/* Subtle Diagonal Pattern */
.hobby-workout::before {
  content: ""; position: absolute; inset: 0; pointer-events: none;
  background-image: repeating-linear-gradient(
    -45deg, rgba(168, 135, 78, 0.02), rgba(168, 135, 78, 0.02) 2px,
    transparent 2px, transparent 20px
  );
  z-index: 0;
}

/* Floating Fitness Elements */
.floating-fitness {
  position: absolute; font-family: var(--serif); color: var(--gold); 
  opacity: 0.06; pointer-events: none; z-index: 0;
  animation: floatSlow 15s infinite ease-in-out;
  user-select: none;
}
.ff-1 { top: 15%; left: 5%; font-size: 8rem; animation-delay: 0s; }
.ff-2 { top: 40%; right: 8%; font-size: 6rem; animation-delay: 3s; }
.ff-3 { bottom: 20%; left: 10%; font-size: 10rem; animation-delay: 6s; }
.ff-4 { top: 70%; right: 15%; font-size: 5rem; animation-delay: 9s; }
@keyframes floatSlow {
  0%, 100% { transform: translateY(0) rotate(0deg); }
  50% { transform: translateY(-30px) rotate(10deg); }
}

/* Cursor Glow */
.cursor-glow {
  position: fixed; width: 400px; height: 400px; border-radius: 50%;
  background: radial-gradient(circle, rgba(168,135,78,0.08), transparent 70%);
  pointer-events: none; z-index: 1; transform: translate(-50%, -50%);
  transition: opacity 0.3s ease;
}
@media (max-width: 768px) { .cursor-glow { display: none; } }

.hobby-workout .container { max-width: 900px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px); position: relative; z-index: 2; }

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
    0 10px 30px -10px rgba(168,135,78,0.3),
    inset 0 0 20px rgba(168,135,78,0.05);
  backdrop-filter: blur(10px);
  animation: pulseIcon 3s ease-in-out infinite;
}
@keyframes pulseIcon {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.08); }
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
  position: relative; max-width: 650px; margin: 0 auto;
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
  filter: grayscale(20%) contrast(1.05);
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
  .floating-fitness { display: none; }
  .action-photo-frame { box-shadow: 0 20px 40px -10px rgba(0,0,0,0.1), 10px 10px 0 0 var(--line); }
}
</style>

<!-- Reading Progress Bar -->
<div class="read-progress" id="readProgress"></div>

<!-- Cursor Glow -->
<div class="cursor-glow" id="cursorGlow"></div>

<main class="hobby-workout">
  <!-- Floating Fitness Elements -->
  <span class="floating-fitness ff-1">💪</span>
  <span class="floating-fitness ff-2">🏋️</span>
  <span class="floating-fitness ff-3">🔥</span>
  <span class="floating-fitness ff-4">⚡</span>

  <div class="container">
    <a href="<?php echo esc_url(home_url('/friends/jay/')); ?>" class="back-link">← Back to Jay</a>
    
    <section class="hobby-hero">
      <div class="icon-wrapper">
        <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
          <path d="M20.57,14.86L22,13.43L20.57,12L17,15.57L8.43,7L12,3.43L10.57,2L9.14,3.43L7.71,2L5.57,4.14L4.14,2.71L2.71,4.14L4.14,5.57L2,7.71L3.43,9.14L2,10.57L3.43,12L7,8.43L15.57,17L12,20.57L13.43,22L14.86,20.57L16.29,22L18.43,19.86L19.86,21.29L21.29,19.86L19.86,18.43L22,16.29L20.57,14.86Z"/>
        </svg>
      </div>
      <h1 class="reveal">Home Workout <em>& Discipline.</em></h1>
    </section>
    
    <!-- DYNAMIC QUOTE -->
   <blockquote class="hobby-quote reveal">
  <?php if ( !empty($first_para) ) : ?>
    <?php echo $first_para; ?>
  <?php else : ?>
    “ Progress takes patience and dedication. Every workout is a step toward becoming a <em>stronger, healthier version of myself.</em> ”
  <?php endif; ?>
</blockquote>

    <!-- ===== ACTION PHOTO SECTION ===== -->
    <section class="action-photo-section reveal">
      <div class="action-photo-frame">
        <!-- 
          PALITAN MO ITO:
          Ilagay mo yung totoong filename ng picture mo.
        -->
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/frankworkout.jpg'); ?>" alt="Frank working out at home">
      </div>
      <p class="action-photo-caption">Strength is built through consistency, one workout at a time.</p>
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
          echo '<p class="reveal">Working out at home taught me that discipline is built in the small, quiet moments. No audience, just progress.</p>';
        endif;
      ?>
    </section>

    <!-- STATS SECTION -->
    <section class="hobby-stats">
      <div class="stat-box reveal">
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12,2A7,7 0 0,0 5,9C5,11.38 6.19,13.47 8,14.74V17A1,1 0 0,0 9,18H15A1,1 0 0,0 16,17V14.74C17.81,13.47 19,11.38 19,9A7,7 0 0,0 12,2M9,21A1,1 0 0,0 10,22H14A1,1 0 0,0 15,21V20H9V21Z"/></svg>
        <span class="label">Routine</span>
        <div class="value">Calisthenics</div>
      </div>
      <div class="stat-box reveal">
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M19,19H5V5H19V19M17,17H7V12H17V17Z"/></svg>
        <span class="label">Frequency</span>
        <div class="value">4x / Week</div>
      </div>
      <div class="stat-box reveal">
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M16,6L18.29,8.29L13.41,13.17L9.41,9.17L2,16.59L3.41,18L9.41,12L13.41,16L19.71,9.71L22,12V6H16Z"/></svg>
        <span class="label">Goal</span>
        <div class="value">Abs  </div>
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
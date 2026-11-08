<?php
/**
 * Template Name: Hobby - Reading - frank
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
/* ===== HOBBY: READING — Professional Edition (Cozy & Literary) ===== */
.hobby-reading {
  --bg:#FBF7F0; --paper:#F4ECDD; --ink:#2C2419; --gold:#A8784E; --gold-2:#C4956A;
  --line:#E5D6C0; --muted:#7A6A54;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  background: var(--bg); color: var(--ink); font-family: var(--sans);
  min-height: 100vh; position: relative; overflow-x: hidden;
  -webkit-font-smoothing: antialiased; scroll-behavior: smooth;
}

/* Custom Scrollbar */
.hobby-reading ::-webkit-scrollbar { width: 8px; }
.hobby-reading ::-webkit-scrollbar-track { background: var(--bg); }
.hobby-reading ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 10px; }

/* Reading Progress Bar */
.read-progress {
  position: fixed; top: 0; left: 0; height: 3px; width: 0%;
  background: linear-gradient(90deg, var(--gold), var(--gold-2));
  z-index: 9999; transition: width 0.1s ease-out;
  box-shadow: 0 0 10px rgba(168,120,78,0.6);
}

/* Subtle Paper Texture Background */
.hobby-reading::before {
  content: ""; position: absolute; inset: 0; pointer-events: none;
  background-image: 
    linear-gradient(rgba(168,120,78,0.02) 1px, transparent 1px),
    linear-gradient(90deg, rgba(168,120,78,0.02) 1px, transparent 1px);
  background-size: 30px 30px;
  z-index: 0;
}

/* Floating Book Pages (Background Elements) */
.floating-book {
  position: absolute; font-family: var(--serif); color: var(--gold); 
  opacity: 0.06; pointer-events: none; z-index: 0;
  animation: floatSlow 15s infinite ease-in-out;
  user-select: none; font-style: italic;
}
.fb-1 { top: 15%; left: 5%; font-size: 8rem; animation-delay: 0s; }
.fb-2 { top: 40%; right: 8%; font-size: 6rem; animation-delay: 3s; }
.fb-3 { bottom: 20%; left: 10%; font-size: 10rem; animation-delay: 6s; }
.fb-4 { top: 70%; right: 15%; font-size: 5rem; animation-delay: 9s; }
@keyframes floatSlow {
  0%, 100% { transform: translateY(0) rotate(0deg); }
  50% { transform: translateY(-30px) rotate(10deg); }
}

/* Cursor Glow */
.cursor-glow {
  position: fixed; width: 400px; height: 400px; border-radius: 50%;
  background: radial-gradient(circle, rgba(168,120,78,0.08), transparent 70%);
  pointer-events: none; z-index: 1; transform: translate(-50%, -50%);
  transition: opacity 0.3s ease;
}
@media (max-width: 768px) { .cursor-glow { display: none; } }

.hobby-reading .container { max-width: 800px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px); position: relative; z-index: 2; }

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
    0 10px 30px -10px rgba(168,120,78,0.3),
    inset 0 0 20px rgba(168,120,78,0.05);
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
  font-style: italic;
}
.hobby-quote em { color: var(--gold); font-style: italic; }

/* ===== ACTION PHOTO SECTION ===== */
.action-photo-section {
  margin-bottom: 100px;
}
.action-photo-frame {
  position: relative;
  max-width: 650px;
  margin: 0 auto;
  border-radius: 2px;
  overflow: hidden;
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
  filter: sepia(15%) grayscale(10%);
  transition: filter 0.6s, transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
}
.action-photo-frame:hover img {
  filter: sepia(0%) grayscale(0%);
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
  font-size: 1.15rem; font-weight: 300; line-height: 2; 
  color: #4A3F30; padding-bottom: 60px; 
}
.hobby-content p { margin: 0 0 24px; }

/* Drop Cap (Unang letra ng unang paragraph) */
.hobby-content p:first-of-type:first-letter {
  font-family: var(--serif); font-size: 4rem; float: left; line-height: 0.9;
  padding-right: 12px; padding-top: 6px; color: var(--gold); font-weight: 400;
}

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
  box-shadow: 0 20px 40px -15px rgba(168,120,78,0.2);
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
  .floating-book { display: none; }
  .action-photo-frame { box-shadow: 0 20px 40px -10px rgba(0,0,0,0.1), 10px 10px 0 0 var(--line); }
}
</style>

<!-- Reading Progress Bar -->
<div class="read-progress" id="readProgress"></div>

<!-- Cursor Glow -->
<div class="cursor-glow" id="cursorGlow"></div>

<main class="hobby-reading">
  <!-- Floating Background Elements -->
  <span class="floating-book fb-1">📖</span>
  <span class="floating-book fb-2">❝</span>
  <span class="floating-book fb-3">📚</span>
  <span class="floating-book fb-4">❞</span>

  <div class="container">
    <a href="<?php echo esc_url(home_url('/friends/frank/')); ?>" class="back-link">← Back to Frank</a>
    
    <section class="hobby-hero">
      <div class="icon-wrapper">
        <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
          <path d="M21,5C19.89,4.65 18.67,4.5 17.5,4.5C15.55,4.5 13.45,4.9 12,6C10.55,4.9 8.45,4.5 6.5,4.5C4.55,4.5 2.45,4.9 1,6V20.65C1,20.9 1.25,21.15 1.5,21.15C1.6,21.15 1.65,21.1 1.75,21.1C3.1,20.45 5.05,20 6.5,20C8.45,20 10.55,20.4 12,21.5C13.45,20.4 15.55,20 17.5,20C19.15,20 20.8,20.3 22.25,21.05C22.35,21.1 22.4,21.1 22.5,21.1C22.75,21.1 23,20.85 23,20.6V6C22.4,5.55 21.75,5.25 21,5M21,18.5C19.9,18.15 18.7,18 17.5,18C15.8,18 14.1,18.35 12.5,19V8C14.1,7.35 15.8,7 17.5,7C18.7,7 19.9,7.15 21,7.5V18.5Z"/>
        </svg>
      </div>
      <h1 class="reveal">Reading <em>& Learning.</em></h1>
    </section>
    
    <!-- DYNAMIC QUOTE -->
    <blockquote class="hobby-quote reveal">
      <?php if ( !empty($first_para) ) : ?>
        <?php echo $first_para; ?>
      <?php else : ?>
        “ A reader lives a thousand lives before he dies. <em>The man who never reads lives only one.</em> ”
      <?php endif; ?>
    </blockquote>

    <!-- ===== ACTION PHOTO SECTION ===== -->
    <section class="action-photo-section reveal">
      <div class="action-photo-frame">
        <!-- 
          PALITAN MO ITO: 
          Ilagay mo yung totoong filename ng picture mo.
        -->
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/frankread.jpg'); ?>" alt="Frank reading a book">
      </div>
      <p class="action-photo-caption">Lost in pages, finding new worlds.</p>
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
          echo '<p class="reveal">Reading is my quiet escape and my greatest teacher. From fiction to technical books, every page is a doorway to something new.</p>';
        endif;
      ?>
    </section>

    <!-- STATS SECTION -->
    <section class="hobby-stats">
      <div class="stat-box reveal">
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M21,5C19.89,4.65 18.67,4.5 17.5,4.5C15.55,4.5 13.45,4.9 12,6C10.55,4.9 8.45,4.5 6.5,4.5C4.55,4.5 2.45,4.9 1,6V20.65C1,20.9 1.25,21.15 1.5,21.15C1.6,21.15 1.65,21.1 1.75,21.1C3.1,20.45 5.05,20 6.5,20C8.45,20 10.55,20.4 12,21.5C13.45,20.4 15.55,20 17.5,20C19.15,20 20.8,20.3 22.25,21.05C22.35,21.1 22.4,21.1 22.5,21.1C22.75,21.1 23,20.85 23,20.6V6C22.4,5.55 21.75,5.25 21,5M21,18.5C19.9,18.15 18.7,18 17.5,18C15.8,18 14.1,18.35 12.5,19V8C14.1,7.35 15.8,7 17.5,7C18.7,7 19.9,7.15 21,7.5V18.5Z"/></svg>
        <span class="label">Books Read</span>
        <div class="value">50+ This Year</div>
      </div>
      <div class="stat-box reveal">
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M11,14H13V16H11V14M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10Z"/></svg>
        <span class="label">Favorite Genre</span>
        <div class="value">Philosophy</div>
      </div>
      <div class="stat-box reveal">
        <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M17.75,4.09L15.22,6.03L16.13,9.09L13.5,7.28L10.87,9.09L11.78,6.03L9.25,4.09L12.44,4L13.5,1L14.56,4L17.75,4.09M21.25,11L19.61,12.25L20.2,14.23L18.5,13.06L16.8,14.23L17.39,12.25L15.75,11L17.81,10.95L18.5,9L19.19,10.95L21.25,11M18.97,15.95C19.8,15.87 20.69,17.05 20.16,17.8C19.84,18.25 19.5,18.67 19.08,19.07C15.17,23 8.84,23 4.94,19.07C1.03,15.17 1.03,8.83 4.94,4.93C5.34,4.53 5.76,4.17 6.21,3.85C6.96,3.32 8.14,4.21 8.06,5.04C7.79,7.9 8.75,10.87 10.95,13.06C13.14,15.26 16.1,16.22 18.97,15.95M17.33,17.97C14.5,17.81 11.7,16.64 9.53,14.5C7.36,12.31 6.2,9.5 6.04,6.68C3.23,9.82 3.34,14.64 6.35,17.66C9.37,20.67 14.19,20.78 17.33,17.97Z"/></svg>
        <span class="label">Reading Time</span>
        <div class="value">30 mins / day</div>
      </div>
    </section>
  </div>
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
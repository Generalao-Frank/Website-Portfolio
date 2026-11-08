
<?php
/**
 * Template Name: Hobby - Badminton - jay
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
/* ===== HOBBY: BADMINTON — Professional Edition ===== */
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

/* Subtle Badminton Background */
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

/* Floating Badminton Symbols */
.floating-chess {
  position: absolute; font-family: var(--serif); color: var(--gold);
  opacity: 0.07; font-size: 8rem; pointer-events: none; z-index: 0;
  animation: floatChess 15s infinite ease-in-out;
  user-select: none;
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

.hobby-chess .container {
  max-width: 900px; margin: 0 auto;
  padding: 0 clamp(24px, 6vw, 96px);
  position: relative; z-index: 2;
}

/* Back Button */
.back-link {
  display: inline-flex; align-items: center; gap: 8px;
  margin-top: 140px; font-size: 0.8rem; font-weight: 500;
  letter-spacing: 0.14em; text-transform: uppercase;
  color: var(--gold); text-decoration: none;
  transition: all 0.3s; padding: 8px 16px;
  border: 1px solid transparent; border-radius: 50px;
}
.back-link:hover {
  color: var(--ivory); border-color: rgba(247,244,236,0.15);
  background: rgba(255,255,255,0.05);
  transform: translateX(-4px);
}

/* Hero & Icon */
.hobby-hero {
  padding: clamp(32px, 5vw, 64px) 0 clamp(40px, 6vw, 80px);
  text-align: center;
}
.hobby-hero .icon-wrapper {
  display: inline-flex; align-items: center; justify-content: center;
  width: 120px; height: 120px; border-radius: 50%;
  margin: 0 auto 32px; background: rgba(255,255,255,0.03);
  border: 1px solid var(--gold);
  box-shadow: 0 10px 30px -10px rgba(168,135,78,0.3),
              inset 0 0 20px rgba(168,135,78,0.05);
  backdrop-filter: blur(10px);
  animation: floatIcon 4s ease-in-out infinite;
}
@keyframes floatIcon {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}
.hobby-hero .icon {
  width: 56px; height: 56px; color: var(--gold);
}

.hobby-hero h1 {
  font-family: var(--serif); font-weight: 300;
  font-size: clamp(3rem, 8vw, 6rem);
  line-height: 1; letter-spacing: -0.03em;
  margin: 0 0 24px; color: var(--ivory);
}
.hobby-hero h1 em {
  color: var(--gold); font-style: italic;
}

/* Quote */
.hobby-quote {
  font-family: var(--serif); font-weight: 300;
  font-size: clamp(1.4rem, 3vw, 2.2rem);
  line-height: 1.4; letter-spacing: -0.01em;
  text-align: center; margin: 0 auto 80px;
  max-width: 700px; padding: 40px 20px;
  position: relative; color: var(--ivory);
  border-top: 1px solid rgba(247,244,236,0.1);
  border-bottom: 1px solid rgba(247,244,236,0.1);
}
.hobby-quote em {
  color: var(--gold); font-style: italic;
}

/* Action Photo */
.action-photo-section { margin-bottom: 100px; }

.action-photo-frame {
  position: relative; max-width: 700px;
  margin: 0 auto; border-radius: 2px; overflow: hidden;
  border: 1px solid rgba(247,244,236,0.15);
  box-shadow: 0 30px 60px -20px rgba(0,0,0,0.5),
              20px 20px 0 0 rgba(168,135,78,0.15);
  transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}
.action-photo-frame:hover {
  transform: translate(-4px, -4px);
  box-shadow: 0 40px 80px -20px rgba(0,0,0,0.6),
              24px 24px 0 0 rgba(168,135,78,0.25);
}
.action-photo-frame img {
  width: 100%; height: auto; display: block;
  filter: grayscale(20%);
  transition: filter 0.6s, transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
}
.action-photo-frame:hover img {
  filter: grayscale(0%); transform: scale(1.02);
}
.action-photo-caption {
  text-align: center; margin-top: 24px;
  font-family: var(--serif); font-style: italic;
  font-size: 1rem; color: var(--muted);
  letter-spacing: 0.02em;
}
.action-photo-caption::before { content: "— "; }
.action-photo-caption::after { content: " —"; }

/* Content */
.hobby-content {
  font-size: 1.1rem; font-weight: 300;
  line-height: 1.9; color: rgba(247,244,236,0.75);
  padding-bottom: 60px;
}
.hobby-content p { margin: 0 0 24px; }

/* Stats */
.hobby-stats {
  display: grid; grid-template-columns: repeat(3, 1fr);
  gap: 24px; padding-bottom: 120px;
}
.stat-box {
  position: relative; padding: 40px 24px;
  text-align: center; background: rgba(247,244,236,0.03);
  border: 1px solid rgba(247,244,236,0.1);
  border-radius: 2px;
  transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
  overflow: hidden;
}
.stat-box::before {
  content: ""; position: absolute; top: 0; left: 0;
  width: 100%; height: 2px; background: var(--gold);
  transform: scaleX(0); transition: transform 0.5s ease;
}
.stat-box:hover {
  border-color: var(--gold); transform: translateY(-6px);
  box-shadow: 0 20px 40px -15px rgba(168,135,78,0.2);
  background: rgba(247,244,236,0.05);
}
.stat-box:hover::before { transform: scaleX(1); }
.stat-box .stat-icon {
  width: 32px; height: 32px; color: var(--gold);
  margin: 0 auto 16px; display: block;
}
.stat-box .label {
  font-size: 0.7rem; font-weight: 500;
  letter-spacing: 0.16em; text-transform: uppercase;
  color: var(--muted); margin-bottom: 12px; display: block;
}
.stat-box .value {
  font-family: var(--serif); font-size: 1.4rem;
  font-weight: 400; color: var(--gold-2);
}

/* Reveal Animation */
.reveal {
  opacity: 0; transform: translateY(40px);
  transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1),
              transform 1s cubic-bezier(0.16, 1, 0.3, 1);
}
.reveal.in { opacity: 1; transform: translateY(0); }

@media (max-width: 700px) {
  .hobby-stats { grid-template-columns: 1fr; }
  .floating-chess { display: none; }
  .action-photo-frame {
    box-shadow: 0 20px 40px -10px rgba(0,0,0,0.5),
                10px 10px 0 0 rgba(168,135,78,0.15);
  }
}
</style>

<!-- Reading Progress Bar -->
<div class="read-progress" id="readProgress"></div>

<!-- Cursor Glow -->
<div class="cursor-glow" id="cursorGlow"></div>

<main class="hobby-chess">

  <!-- Floating Badminton Symbols -->
  <span class="floating-chess fc-1">🏸</span>
  <span class="floating-chess fc-2">🏸</span>
  <span class="floating-chess fc-3">✦</span>
  <span class="floating-chess fc-4">🏸</span>

  <div class="container">

    <a href="<?php echo esc_url(home_url('/friends/jay/')); ?>" class="back-link">
      ← Back to jay
    </a>

    <section class="hobby-hero">

      <div class="icon-wrapper">
        <!-- Professional Badminton Racket SVG Icon -->
        <svg class="icon" viewBox="0 0 64 64"
             fill="none" stroke="currentColor"
             stroke-width="2.2" stroke-linecap="round"
             stroke-linejoin="round">

          <!-- Racket Head -->
          <ellipse cx="24" cy="21" rx="13" ry="17"
                   transform="rotate(35 24 21)"/>

          <!-- Racket Strings -->
          <path d="M13 10 L35 30"/>
          <path d="M17 5 L39 25"/>
          <path d="M9 16 L31 36"/>
          <path d="M12 28 L29 7"/>
          <path d="M19 36 L36 15"/>

          <!-- Racket Neck -->
          <path d="M34 33 L39 39"/>

          <!-- Racket Handle -->
          <path d="M39 39 L54 55"/>
          <path d="M36 42 L51 58"/>
          <path d="M39 39 L36 42"/>
          <path d="M51 58 L54 55"/>

          <!-- Shuttlecock -->
          <path d="M47 8 L55 3 L59 9 L51 14 Z"/>
          <path d="M47 8 L44 16"/>
          <path d="M55 3 L52 12"/>
          <path d="M59 9 L52 15"/>
          <path d="M44 16 Q48 20 52 15"/>
        </svg>
      </div>

      <h1 class="reveal">Badminton <em>& Passion.</em></h1>

    </section>

    <!-- DYNAMIC QUOTE -->
    <blockquote class="hobby-quote reveal">
      <?php if ( !empty($first_para) ) : ?>
        <?php echo $first_para; ?>
      <?php else : ?>
        “Badminton is more than just a game. It is about speed,
        discipline, and the determination to give every
        <em>shot your best.</em>”
      <?php endif; ?>
    </blockquote>

    <!-- ACTION PHOTO SECTION -->
    <section class="action-photo-section reveal">

      <div class="action-photo-frame">
        <!-- Replace with your actual badminton photo -->
        <img
          src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/jaybadminton.jpg'); ?>"
          alt="Jay playing badminton"
        >
      </div>

      <p class="action-photo-caption">
        Every shot counts — passion, focus, and the spirit of the game.
      </p>

    </section>

    <!-- DYNAMIC CONTENT -->
    <section class="hobby-content">
      <?php
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();
            $paragraphs = explode('</p>', get_the_content());
            foreach($paragraphs as $p) {
              if(trim(strip_tags($p)) !== '') {
                echo '<p class="reveal">' .
                  strip_tags($p, '<em><strong><i><b><a><br>') .
                  '</p>';
              }
            }
          endwhile;
        else :
          echo '<p class="reveal">
            Badminton is one of the sports I enjoy because it keeps
            me active and challenges my speed, focus, and coordination.
            Every match teaches me to stay determined, think quickly,
            and never give up until the last point.
          </p>';
        endif;
      ?>
    </section>

    <!-- STATS SECTION -->
    <section class="hobby-stats">

      <div class="stat-box reveal">
        <!-- Shuttlecock Icon -->
        <svg class="stat-icon" viewBox="0 0 24 24"
             fill="none" stroke="currentColor"
             stroke-width="1.7" stroke-linecap="round"
             stroke-linejoin="round">
          <path d="M12 14L5 5L8 3L12 12L16 3L19 5L12 14Z"/>
          <path d="M12 14L10 20Q12 22 14 20L12 14Z"/>
        </svg>
        <span class="label">Playing Style</span>
        <div class="value">Fast & Active</div>
      </div>

      <div class="stat-box reveal">
        <!-- Racket Icon -->
        <svg class="stat-icon" viewBox="0 0 24 24"
             fill="none" stroke="currentColor"
             stroke-width="1.7" stroke-linecap="round"
             stroke-linejoin="round">
          <ellipse cx="9" cy="8" rx="5" ry="7"
                   transform="rotate(-30 9 8)"/>
          <path d="M12 13L21 22"/>
          <path d="M5 3L13 11M3 8L10 15"/>
          <path d="M4 13L11 5"/>
        </svg>
        <span class="label">Favorite Shot</span>
        <div class="value">Smash</div>
      </div>

      <div class="stat-box reveal">
        <!-- Trophy Icon -->
        <svg class="stat-icon" viewBox="0 0 24 24"
             fill="none" stroke="currentColor"
             stroke-width="1.7" stroke-linecap="round"
             stroke-linejoin="round">
          <path d="M8 4H16V9C16 12 14 14 12 14C10 14 8 12 8 9V4Z"/>
          <path d="M8 6H4V8C4 11 6 12 9 12"/>
          <path d="M16 6H20V8C20 11 18 12 15 12"/>
          <path d="M12 14V19"/>
          <path d="M8 21H16"/>
          <path d="M9 19H15"/>
        </svg>
        <span class="label">Favorite Sport</span>
        <div class="value">Badminton</div>
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
    const scrollTop = document.documentElement.scrollTop ||
                      document.body.scrollTop;

    const scrollHeight = document.documentElement.scrollHeight -
                         document.documentElement.clientHeight;

    const scrolled = scrollHeight > 0
      ? (scrollTop / scrollHeight) * 100
      : 0;

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
```
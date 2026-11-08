<?php
/**
 * Template Name: Friend Profile - Kim
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
</style>

<main class="portfolio-page">
  
  <section class="pf-hero">
    <div class="container">
      <div class="grid">
        <div class="text">
          <p class="kicker">Backend Developer</p> <!-- Role ni Kim -->
          <h1>Hi, I'm <em><?php echo esc_html(explode(' ', $member_name)[0]); ?>.</em></h1>
          <p class="tagline">
            I build the engines that power web applications. I focus on database 
            architecture, server logic, and making sure everything runs securely behind the scenes.
          </p> <!-- Tagline ni Kim -->
          <div class="pf-buttons">
            <a href="#contact" class="pf-btn">Get in Touch</a>
            <a href="<?php echo esc_url(home_url('/our-members/')); ?>" class="pf-btn-ghost">Back to Members</a>
          </div>
        </div>
        <div class="visual">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/kimmy.jpg'); ?>" alt="<?php echo esc_attr($member_name); ?>">
        </div>
      </div>
    </div>
  </section>

  <section class="pf-about">
    <div class="container">
      <div class="grid">
        <div>
          <p class="kicker">About Me</p>
          <h2>A mind for <em>logic.</em></h2> <!-- Iniba natin para kay Kim -->
        </div>
        <div class="bio-content">
          <?php 
            if ( have_posts() ) :
              while ( have_posts() ) : the_post();
                the_content(); 
              endwhile;
            else :
              echo '<p>I specialize in database management and server-side scripting. I enjoy solving complex logical problems and optimizing backend performance for scale.</p>';
            endif;
          ?>
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
        <!-- Skills ni Kim -->
        <div class="skill-card">
          <span class="num">01</span>
          <h3>Database Management</h3>
          <p>Designing efficient relational databases using MySQL. Writing optimized queries and ensuring data integrity.</p>
        </div>
        <div class="skill-card">
          <span class="num">02</span>
          <h3>Server-Side Logic</h3>
          <p>Writing secure and scalable backend code in PHP. Handling authentication, data processing, and server routing.</p>
        </div>
        <div class="skill-card">
          <span class="num">03</span>
          <h3>Security &amp; Maintenance</h3>
          <p>Implementing security best practices to prevent vulnerabilities. Regularly maintaining and upgrading server environments.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="pf-cta" id="contact">
    <div class="container">
      <h2>Let's build <em>together.</em></h2>
      <p>If you have a project in mind or just want to discuss backend development, my inbox is always open.</p>
      <div class="socials">
        <a href="#">GitHub</a>
        <a href="#">LinkedIn</a>
        <a href="mailto:kim@ourspace.dev">Email</a> <!-- Email ni Kim -->
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
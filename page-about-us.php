<?php
/**
 * Template Name: About Us Luxury
 * Template Post Type: page
 */
get_header(); ?>

<style>
/* ===== ABOUT PAGE — Luxury Editorial ===== */
.about-page {
  --ivory:#F7F4EC; --paper:#FBFAF5; --ink:#1A1814; --ink-3:#4A443A;
  --gold:#A8874E; --gold-2:#C4A566; --line:#DED7C7; --muted:#7A7266;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  background: var(--ivory); color: var(--ink); font-family: var(--sans);
  -webkit-font-smoothing: antialiased;
}

.about-page .container {
  max-width: 1280px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px);
}

/* Hero Section */
.about-hero {
  padding: clamp(160px, 18vw, 220px) 0 clamp(80px, 10vw, 120px);
  position: relative; overflow: hidden;
}
.about-hero::before {
  content:""; position:absolute; top:-20%; right:-10%; width:70vw; height:70vw;
  max-width:800px; max-height:800px; border-radius:50%;
  background:radial-gradient(circle, rgba(196,165,102,.12), transparent 65%);
  pointer-events:none;
}
.about-hero .kicker {
  font-size:.72rem; font-weight:500; letter-spacing:.24em; text-transform:uppercase;
  color:var(--gold); margin:0 0 24px; display:flex; align-items:center; gap:16px;
}
.about-hero .kicker::before { content:""; width:40px; height:1px; background:var(--gold); }
.about-hero h1 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(3rem, 8vw, 6.5rem);
  line-height: 1; letter-spacing: -0.03em; margin: 0 0 40px; max-width: 16ch;
}
.about-hero h1 em { color: var(--gold); font-style: italic; }
.about-hero .lede {
  max-width: 600px; font-size: 1.1rem; font-weight: 300; line-height: 1.8;
  color: var(--ink-3); margin: 0;
}

/* Editorial Grid */
.about-editorial {
  padding: clamp(80px, 10vw, 140px) 0; background: var(--paper);
  border-top: 1px solid var(--line); border-bottom: 1px solid var(--line);
}
.about-grid {
  display: grid; grid-template-columns: 1fr 1.2fr; gap: clamp(40px, 8vw, 120px);
  align-items: start;
}
.about-grid h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2rem, 4vw, 3.2rem);
  line-height: 1.1; letter-spacing: -0.02em; margin: 0 0 24px;
}
.about-grid p {
  font-size: 1.05rem; font-weight: 300; line-height: 1.85; color: var(--ink-3);
  margin: 0 0 24px;
}
.about-grid p:last-child { margin-bottom: 0; }

/* Image placeholder */
.about-image-box {
  position: relative; aspect-ratio: 4/5; border-radius: 2px; overflow: hidden;
  background: var(--ivory); border: 1px solid var(--line);
  display: flex; align-items: center; justify-content: center;
}
.about-image-box img {
  width: 100%; height: 100%; object-fit: cover; display: block;
}
.about-image-box .placeholder-text {
  font-family: var(--serif); font-size: 1.2rem; color: var(--muted); font-style: italic; text-align: center; padding: 20px;
}

/* Values / Stats Section */
.about-values {
  padding: clamp(80px, 10vw, 140px) 0; background: var(--ink); color: var(--ivory);
}
.about-values .kicker { color: var(--gold-2); }
.about-values .kicker::before { background: var(--gold-2); }
.about-values h2 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(2.4rem, 5vw, 4.4rem);
  line-height: 1.05; margin: 0 0 64px; color: var(--ivory);
}
.about-values h2 em { color: var(--gold-2); font-style: italic; }
.values-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px;
}
.value-item {
  border-top: 1px solid rgba(247, 244, 236, 0.15); padding-top: 24px;
}
.value-item .num {
  font-family: var(--serif); font-style: italic; font-size: 1.5rem;
  color: var(--gold-2); margin-bottom: 16px; display: block;
}
.value-item h3 {
  font-family: var(--serif); font-size: 1.6rem; font-weight: 400; margin: 0 0 16px;
}
.value-item p {
  font-size: 0.95rem; font-weight: 300; line-height: 1.7; color: rgba(247, 244, 236, 0.7); margin: 0;
}

/* Responsive */
@media (max-width: 900px) {
  .about-grid { grid-template-columns: 1fr; }
  .values-grid { grid-template-columns: 1fr; gap: 32px; }
  .about-image-box { aspect-ratio: 16/9; max-height: 400px; }
}
</style>

<main class="about-page">
  <!-- Hero -->
  <section class="about-hero">
    <div class="container">
      <p class="kicker">Our Story</p>
      <h1>Driven by <em>craft,</em><br>guided by purpose.</h1>
      <p class="lede">
        We are a collective of aspiring developers building digital experiences 
        from the ground up. This is our final project journey — where code meets design.
      </p>
    </div>
  </section>

  <!-- Editorial Content -->
  <section class="about-editorial">
    <div class="container">
      <div class="about-grid">
        <div class="about-grid-text">
          <h2>The people behind the pixels.</h2>
          <p>
            OurSpace started as a simple idea: build a space where students can showcase 
            their growth without the noise. Instead of chasing trends, we focused on the 
            fundamentals — clean code, thoughtful design, and systems that actually work.
          </p>
          <p>
            Every project in this portfolio represents a step forward. From the first 
            HTML tag to complex PHP integrations, we've learned that real progress 
            happens in the details. We embrace the process, not just the outcome.
          </p>
        </div>
              <div class="about-image-box">
          <?php 
            
            echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/groupdp.jpg') . '" alt="OurSpace Team">';
          ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Values / Stats -->
  <section class="about-values">
    <div class="container">
      <p class="kicker">Our Foundation</p>
      <h2>What <em>drives</em> us forward.</h2>
      
      <div class="values-grid">
        <div class="value-item">
          <span class="num">01</span>
          <h3>Intention</h3>
          <p>We don't build just to build. Every line of code and every pixel is placed with purpose.</p>
        </div>
        <div class="value-item">
          <span class="num">02</span>
          <h3>Collaboration</h3>
          <p>Great things aren't built alone. We learn from each other, review each other's work, and grow together.</p>
        </div>
        <div class="value-item">
          <span class="num">03</span>
          <h3>Iteration</h3>
          <p>Version 1 is never the final version. We ship, we test, we refine, and we ship again.</p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
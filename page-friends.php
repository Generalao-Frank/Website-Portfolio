<?php
/**
 * Template Name: Friends Directory
 * Template Post Type: page
 */
get_header(); ?>

<style>
/* ===== FRIENDS DIRECTORY — Luxury Editorial ===== */
.friends-page {
  --ivory:#F7F4EC; --paper:#FBFAF5; --ink:#1A1814; --ink-3:#4A443A;
  --gold:#A8874E; --gold-2:#C4A566; --line:#DED7C7; --muted:#7A7266;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  background: var(--ivory); color: var(--ink); font-family: var(--sans);
  -webkit-font-smoothing: antialiased;
}
.friends-page .container { max-width: 1280px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px); }

/* Hero Section */
.friends-hero {
  padding: clamp(160px, 18vw, 220px) 0 clamp(60px, 8vw, 100px);
  text-align: center; position: relative;
}
.friends-hero::before {
  content:""; position:absolute; top:0; left:50%; transform:translateX(-50%);
  width:60vw; height:60vw; max-width:800px; max-height:800px;
  background:radial-gradient(circle, rgba(196,165,102,.1), transparent 65%);
  pointer-events:none;
}
.friends-hero .kicker {
  font-size:.72rem; font-weight:500; letter-spacing:.24em; text-transform:uppercase;
  color:var(--gold); margin:0 0 24px; display:flex; align-items:center; justify-content:center; gap:16px;
}
.friends-hero .kicker::before, .friends-hero .kicker::after { 
  content:""; width:40px; height:1px; background:var(--gold); 
}
.friends-hero h1 {
  font-family: var(--serif); font-weight: 300; font-size: clamp(3rem, 8vw, 6.5rem);
  line-height: 1; letter-spacing: -0.03em; margin: 0 0 32px; color: var(--ink);
}
.friends-hero h1 em { color: var(--gold); font-style: italic; }
.friends-hero .lede {
  max-width: 550px; margin: 0 auto; font-size: 1.1rem; font-weight: 300; 
  line-height: 1.8; color: var(--ink-3);
}

/* Grid */
.friends-grid-section { padding: 0 0 clamp(100px, 12vw, 180px); }
.friends-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); 
  gap: clamp(24px, 4vw, 48px); align-items: start;
}

/* Card */
.friend-card {
  position: relative; text-decoration: none; color: inherit; display: block;
  transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
}
.friend-card:hover { transform: translateY(-6px); }

.friend-image {
  position: relative; aspect-ratio: 4/5; overflow: hidden;
  background: var(--paper); border: 1px solid var(--line);
  border-radius: 2px; margin-bottom: 24px;
}
.friend-image img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), filter 0.8s;
  filter: grayscale(20%);
}
.friend-card:hover .friend-image img { transform: scale(1.04); filter: grayscale(0%); }
.friend-image::after {
  content: ""; position: absolute; inset: 0; 
  background: linear-gradient(to top, rgba(26,24,20,.4), transparent 40%);
  opacity: 0; transition: opacity 0.4s;
}
.friend-card:hover .friend-image::after { opacity: 1; }

.friend-image-placeholder {
  width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;
  background: var(--ivory);
}
.friend-image-placeholder span {
  font-family: var(--serif); font-size: 4rem; color: var(--gold); opacity: 0.5; font-style: italic;
}

.friend-info { display: flex; flex-direction: column; gap: 6px; }
.friend-name {
  font-family: var(--serif); font-weight: 400; font-size: 1.6rem; 
  letter-spacing: -0.015em; color: var(--ink); transition: color 0.3s; margin: 0;
}
.friend-card:hover .friend-name { color: var(--gold); }
.friend-role {
  font-size: 0.76rem; font-weight: 500; letter-spacing: 0.14em; 
  text-transform: uppercase; color: var(--muted);
}
.friend-socials { margin-top: 12px; display: flex; gap: 16px; }
.friend-socials span {
  color: var(--gold); font-size: 0.85rem; transition: color 0.3s;
  border-bottom: 1px solid transparent;
}
.friend-card:hover .friend-socials span { color: var(--ink); border-bottom-color: var(--ink); }

@media (max-width: 1024px) { .friends-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 700px) {
  .friends-grid { grid-template-columns: 1fr; gap: 48px; }
  .friend-image { aspect-ratio: 16/9; }
}
</style>

<main class="friends-page">
  <section class="friends-hero">
    <div class="container">
      <p class="kicker">The Directory</p>
      <h1>Explore the <em>team.</em></h1>
      <p class="lede">Click on a member to view their individual portfolio.</p>
    </div>
  </section>

  <section class="friends-grid-section">
    <div class="container">
      <div class="friends-grid">
        
        <!-- FRANK -->
        <a href="<?php echo esc_url(home_url('/friends/frank/')); ?>" class="friend-card">
          <div class="friend-image">
             <div class="friend-image-placeholder"><span>F.</span></div>
          </div>
          <div class="friend-info">
            <h3 class="friend-name">Frank James Generalao</h3>
            <span class="friend-role">Lead Developer</span>
            <div class="friend-socials"><span>View Portfolio →</span></div>
          </div>
        </a>

        <!-- JAY MARK -->
        <a href="<?php echo esc_url(home_url('/friends/jay-mark/')); ?>" class="friend-card">
          <div class="friend-image">
             <div class="friend-image-placeholder"><span>J.</span></div>
          </div>
          <div class="friend-info">
            <h3 class="friend-name">Jay Mark Generalao</h3>
            <span class="friend-role">UI / UX Designer</span>
            <div class="friend-socials"><span>View Portfolio →</span></div>
          </div>
        </a>

        <!-- JOHN IVAN -->
        <a href="<?php echo esc_url(home_url('/friends/john-ivan/')); ?>" class="friend-card">
          <div class="friend-image">
             <div class="friend-image-placeholder"><span>J.</span></div>
          </div>
          <div class="friend-info">
            <h3 class="friend-name">John Ivan Roland Sabella</h3>
            <span class="friend-role">Frontend Developer</span>
            <div class="friend-socials"><span>View Portfolio →</span></div>
          </div>
        </a>

        <!-- KIM -->
        <a href="<?php echo esc_url(home_url('/friends/kim/')); ?>" class="friend-card">
          <div class="friend-image">
             <div class="friend-image-placeholder"><span>K.</span></div>
          </div>
          <div class="friend-info">
            <h3 class="friend-name">Kim Martinez</h3>
            <span class="friend-role">Backend Developer</span>
            <div class="friend-socials"><span>View Portfolio →</span></div>
          </div>
        </a>

      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
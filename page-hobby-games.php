<?php
/**
 * Template Name: Hobby - Online Games
 * Template Post Type: page
 */
get_header(); ?>

<style>
.hobby-games {
  --dark:#0A0B0E; --panel:#12141A; --neon:#00E5FF; --purple:#B040FF; --text:#E0E0E0;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  background: var(--dark); color: var(--text); font-family: var(--sans);
  min-height: 100vh;
  background-image: 
    linear-gradient(rgba(0,229,255,0.03) 1px, transparent 1px),
    linear-gradient(90deg, rgba(0,229,255,0.03) 1px, transparent 1px);
  background-size: 40px 40px;
}
.hobby-games .container { max-width: 900px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px); }
.back-link { display: inline-flex; align-items: center; gap: 8px; margin-top: 140px; font-size: 0.8rem; font-weight: 500; letter-spacing: 0.14em; text-transform: uppercase; color: var(--neon); text-decoration: none; transition: color 0.3s, text-shadow 0.3s; }
.back-link:hover { color: #fff; text-shadow: 0 0 10px var(--neon); }
.hobby-hero { padding: clamp(32px, 5vw, 64px) 0 clamp(40px, 6vw, 80px); text-align: center; }
.hobby-hero .icon { width: 80px; height: 80px; color: var(--neon); margin: 0 auto 32px; filter: drop-shadow(0 0 15px rgba(0,229,255,0.5)); }
.hobby-hero h1 { font-family: var(--serif); font-weight: 300; font-size: clamp(3rem, 8vw, 6rem); line-height: 1; letter-spacing: -0.03em; margin: 0 0 24px; color: #fff; text-shadow: 0 0 20px rgba(0,229,255,0.3); }
.hobby-hero h1 em { color: var(--neon); font-style: italic; }
.hobby-quote { font-family: var(--serif); font-weight: 300; font-size: clamp(1.4rem, 3vw, 2.2rem); line-height: 1.4; text-align: center; margin: 0 auto 80px; max-width: 700px; padding: 0 20px; color: #fff; }
.hobby-quote em { color: var(--purple); font-style: italic; }
.hobby-content { font-size: 1.1rem; font-weight: 300; line-height: 1.9; color: rgba(224,224,224,0.75); padding-bottom: 120px; }
.hobby-content p { margin: 0 0 24px; }
</style>

<main class="hobby-games">
  <div class="container">
    <a href="<?php echo esc_url(home_url('/friends/jay/')); ?>" class="back-link">← Back to Jay</a>
    <section class="hobby-hero">
      <svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M7.97,16L5,19C4.67,19.3 4.23,19.5 3.75,19.5A1.75,1.75 0 0,1 2,17.75V17.5L3,10.12C3.21,7.81 5.14,6 7.5,6H16.5C18.86,6 20.79,7.81 21,10.12L22,17.5V17.75A1.75,1.75 0 0,1 20.25,19.5C19.77,19.5 19.33,19.3 19,19L16.03,16H7.97M7,9V11H5V12H7V14H8V12H10V11H8V9H7M16.5,9A1,1 0 0,0 15.5,10A1,1 0 0,0 16.5,11A1,1 0 0,0 17.5,10A1,1 0 0,0 16.5,9M14.5,12A1,1 0 0,0 13.5,13A1,1 0 0,0 14.5,14A1,1 0 0,0 15.5,13A1,1 0 0,0 14.5,12Z"/></svg>
      <h1>Online Games <em>& Competition.</em></h1>
    </section>
    
   <blockquote class="hobby-quote">
  “ Online gaming is more than just entertainment. It builds friendships, sharpens the mind, and teaches me the value of <em>strategy, teamwork, and perseverance.</em> ”
</blockquote>
    <section class="hobby-content">
      <?php 
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();
            the_content(); 
          endwhile;
        else :
          echo '<p>Whether it\'s ranked matches or casual lobbies, online gaming is where strategy meets community.</p>';
        endif;
      ?>
    </section>
  </div>
</main>

<?php get_footer(); ?>
<?php
/**
 * Template Name: Hobby Detail
 * Template Post Type: page
 */
get_header(); 

// Kunin ang pangalan ng hobby (e.g., "Chess", "Dama", "Home Workout")
$hobby_name = get_the_title();
?>

<style>
/* ===== HOBBY DETAIL — Luxury Editorial (Cohesive Design) ===== */
.hobby-page {
  --ivory:#F7F4EC; --paper:#FBFAF5; --ink:#1A1814; --gold:#A8874E; --line:#DED7C7;
  --serif:'Fraunces',Georgia,serif; --sans:'Inter',system-ui,sans-serif;
  background: var(--paper); color: var(--ink); font-family: var(--sans);
  min-height: 100vh;
  -webkit-font-smoothing: antialiased;
}
.hobby-page .container { max-width: 900px; margin: 0 auto; padding: 0 clamp(24px, 6vw, 96px); }

/* Back Button */
.back-link { 
  display: inline-flex; align-items: center; gap: 8px; margin-top: 140px; 
  font-size: 0.8rem; font-weight: 500; letter-spacing: 0.14em; text-transform: uppercase; 
  color: var(--gold); text-decoration: none; transition: color 0.3s; 
}
.back-link:hover { color: var(--ink); }

/* Hero */
.hobby-hero { 
  padding: clamp(32px, 5vw, 64px) 0 clamp(40px, 6vw, 80px); 
  text-align: center; 
}
.hobby-hero .icon { 
  width: 80px; height: 80px; color: var(--gold); margin: 0 auto 32px; 
}
.hobby-hero h1 { 
  font-family: var(--serif); font-weight: 300; font-size: clamp(3rem, 8vw, 6rem); 
  line-height: 1; letter-spacing: -0.03em; margin: 0 0 24px; color: var(--ink); 
}
.hobby-hero h1 em { color: var(--gold); font-style: italic; }

/* Quote */
.hobby-quote { 
  font-family: var(--serif); font-weight: 300; font-size: clamp(1.4rem, 3vw, 2.2rem); 
  line-height: 1.4; letter-spacing: -0.01em; text-align: center; 
  margin: 0 auto 80px; max-width: 700px; padding: 0 20px; color: var(--ink); 
}
.hobby-quote em { color: var(--gold); font-style: italic; }

/* Content */
.hobby-content { 
  font-size: 1.1rem; font-weight: 300; line-height: 1.9; 
  color: #4A443A; padding-bottom: 120px; 
}
.hobby-content p { margin: 0 0 24px; }
.hobby-content h2, .hobby-content h3 {
  font-family: var(--serif); font-weight: 400; color: var(--ink);
  margin: 48px 0 16px; line-height: 1.2;
}
</style>

<main class="hobby-page">
  <div class="container">
    <a href="<?php echo esc_url(home_url('/friends/frank/')); ?>" class="back-link">← Back to Frank</a>
    
    <section class="hobby-hero">
      <!-- 
        Dito natin nilalagay yung icon. 
        Naka-dynamic siya base sa pangalan ng Page (Title).
        Kung "Chess" ang title, chess icon ang lalabas. Kung "Reading", book icon.
      -->
      <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
        <?php 
          if ( stripos($hobby_name, 'chess') !== false ) {
            echo '<path d="M19,22H5V20H19V22M17,10C17,7.24 14.76,5 12,5C9.24,5 7,7.24 7,10C7,12.03 8.21,13.77 10,14.58V17H14V14.58C15.79,13.77 17,12.03 17,10M12,3C15.87,3 19,6.13 19,10C19,12.41 17.71,14.53 15.78,15.71L16,17H8L8.22,15.71C6.29,14.53 5,12.41 5,10C5,6.13 8.13,3 12,3Z"/>';
          } elseif ( stripos($hobby_name, 'game') !== false ) {
            echo '<path d="M7.97,16L5,19C4.67,19.3 4.23,19.5 3.75,19.5A1.75,1.75 0 0,1 2,17.75V17.5L3,10.12C3.21,7.81 5.14,6 7.5,6H16.5C18.86,6 20.79,7.81 21,10.12L22,17.5V17.75A1.75,1.75 0 0,1 20.25,19.5C19.77,19.5 19.33,19.3 19,19L16.03,16H7.97M7,9V11H5V12H7V14H8V12H10V11H8V9H7M16.5,9A1,1 0 0,0 15.5,10A1,1 0 0,0 16.5,11A1,1 0 0,0 17.5,10A1,1 0 0,0 16.5,9M14.5,12A1,1 0 0,0 13.5,13A1,1 0 0,0 14.5,14A1,1 0 0,0 15.5,13A1,1 0 0,0 14.5,12Z"/>';
          } elseif ( stripos($hobby_name, 'dama') !== false ) {
            echo '<path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10Z"/>';
          } elseif ( stripos($hobby_name, 'workout') !== false ) {
            echo '<path d="M20.57,14.86L22,13.43L20.57,12L17,15.57L8.43,7L12,3.43L10.57,2L9.14,3.43L7.71,2L5.57,4.14L4.14,2.71L2.71,4.14L4.14,5.57L2,7.71L3.43,9.14L2,10.57L3.43,12L7,8.43L15.57,17L12,20.57L13.43,22L14.86,20.57L16.29,22L18.43,19.86L19.86,21.29L21.29,19.86L19.86,18.43L22,16.29L20.57,14.86Z"/>';
          } elseif ( stripos($hobby_name, 'system') !== false ) {
            echo '<path d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z"/>';
          } else {
            // Default: Book Icon (para sa Reading)
            echo '<path d="M21,5C19.89,4.65 18.67,4.5 17.5,4.5C15.55,4.5 13.45,4.9 12,6C10.55,4.9 8.45,4.5 6.5,4.5C4.55,4.5 2.45,4.9 1,6V20.65C1,20.9 1.25,21.15 1.5,21.15C1.6,21.15 1.65,21.1 1.75,21.1C3.1,20.45 5.05,20 6.5,20C8.45,20 10.55,20.4 12,21.5C13.45,20.4 15.55,20 17.5,20C19.15,20 20.8,20.3 22.25,21.05C22.35,21.1 22.4,21.1 22.5,21.1C22.75,21.1 23,20.85 23,20.6V6C22.4,5.55 21.75,5.25 21,5M21,18.5C19.9,18.15 18.7,18 17.5,18C15.8,18 14.1,18.35 12.5,19V8C14.1,7.35 15.8,7 17.5,7C18.7,7 19.9,7.15 21,7.5V18.5Z"/>';
          }
        ?>
      </svg>
      <h1><?php echo esc_html($hobby_name); ?> <em>& Passion.</em></h1>
    </section>
    
    <!-- Dito natin kinukuha yung Quote mula sa WP Editor (yung unang block/paragraph) -->
    <blockquote class="hobby-quote">
      <?php 
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();
            // Kukunin lang yung unang paragraph para maging quote
            $content = get_the_content();
            $first_para = explode('</p>', $content)[0];
            echo strip_tags($first_para, '<em><strong><i><b>') . '</p>';
          endwhile;
        endif;
      ?>
    </blockquote>

    <section class="hobby-content">
      <?php 
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();
            // Lalabas yung buong content na isinulat sa WP Editor
            the_content(); 
          endwhile;
        else :
          echo '<p>No content has been added yet. Please write something in the WordPress editor.</p>';
        endif;
      ?>
    </section>
  </div>
</main>

<?php get_footer(); ?>
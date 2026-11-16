<?php
/**
 * Header — Ultra 3D Aesthetic Edition (Rotating Logo)
 * Preserves: brand, nav items, CTA, mobile toggle, WP conditionals.
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <!-- Scroll progress bar -->
  <div class="site-progress" aria-hidden="true"><span></span></div>

  <!-- Custom cursor (desktop only, respects reduced-motion) -->
  <div class="cursor-dot" aria-hidden="true"></div>
  <div class="cursor-ring" aria-hidden="true"></div>

  <!-- 3D Environment (behind header) -->
  <div class="header-stage" aria-hidden="true">
    <span class="stage-blob blob-a"></span>
    <span class="stage-blob blob-b"></span>
    <span class="stage-blob blob-c"></span>
  </div>

  <!-- Ultra 3D Floating Header -->
  <header class="site-header" id="siteHeader">
    <div class="header-sheen" aria-hidden="true"></div>

    <div class="header-inner">

      <!-- Brand -->
 <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Home">
  <!-- Container na magbibigay ng 3D effect at animation -->
  <div class="brand-logo-wrap">
    <!-- Palitan ang src ng totoong path ng image na inupload mo -->
    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/quadro-icon.png'); ?>" 
         alt="Quadro Logo" 
         class="brand-logo-img">
  </div>
  <span class="brand-text">
  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/quadro-wordmark.png'); ?>" 
       alt="Quadro Logo Text" 
       class="brand-text-img">
</span>
</a>

      <!-- Centered Nav -->
      <nav class="primary-navigation" id="primary-navigation" aria-label="Primary navigation">
        <ul class="menu-list">
          <li class="menu-item<?php echo is_front_page() ? ' current-menu-item' : ''; ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>"><span>Home</span></a>
          </li>
          <li class="menu-item<?php echo is_page('about-us') ? ' current-menu-item' : ''; ?>">
            <a href="<?php echo esc_url(home_url('/about-us/')); ?>"><span>About</span></a>
          </li>
          <li class="menu-item<?php echo is_page('our-members') ? ' current-menu-item' : ''; ?>">
            <a href="<?php echo esc_url(home_url('/our-members/')); ?>"><span>Members</span></a>
          </li>
          <li class="menu-item<?php echo is_page('our-projects') ? ' current-menu-item' : ''; ?>">
            <a href="<?php echo esc_url(home_url('/our-projects/')); ?>"><span>Projects</span></a>
          </li>
          <li class="menu-item<?php echo is_page('skills-expertise') ? ' current-menu-item' : ''; ?>">
            <a href="<?php echo esc_url(home_url('/skills-expertise/')); ?>"><span>Skills</span></a>
          </li>
          <li class="menu-item<?php echo is_page('contact-us') ? ' current-menu-item' : ''; ?>">
            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"><span>Contact</span></a>
          </li>
        </ul>
      </nav>

      <!-- Right CTA -->
      <div class="nav-right">
        <a class="nav-cta" href="<?php echo esc_url(home_url('/contact-us/')); ?>">
          <span>Let's Talk</span>
        </a>
        <button class="menu-toggle" type="button" aria-expanded="false"
                aria-controls="primary-navigation" aria-label="Toggle navigation">
          <span></span><span></span><span></span>
        </button>
      </div>

    </div>
  </header>
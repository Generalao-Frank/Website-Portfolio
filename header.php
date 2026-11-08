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

  <!-- Premium Floating Header -->
  <header class="site-header" id="siteHeader">
    <div class="header-inner">

      <!-- Brand -->
      <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Home">
        <span class="brand-mark" aria-hidden="true">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="12" cy="12" r="4.2" stroke="currentColor" stroke-width="1.6"/>
            <circle cx="12" cy="12" r="8.5" stroke="currentColor" stroke-width="1.2" opacity="0.45"/>
          </svg>
        </span>
        <span class="brand-text">OurSpace<em>.</em></span>
      </a>

      <!-- Centered Nav -->
      <nav class="primary-navigation" id="primary-navigation" aria-label="Primary navigation">
        <ul class="menu-list">
          <li class="menu-item<?php echo is_front_page() ? ' current-menu-item' : ''; ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
          </li>
          <li class="menu-item<?php echo is_page('about-us') ? ' current-menu-item' : ''; ?>">
            <a href="<?php echo esc_url(home_url('/about-us/')); ?>">About</a>
          </li>
          <li class="menu-item<?php echo is_page('our-members') ? ' current-menu-item' : ''; ?>">
            <a href="<?php echo esc_url(home_url('/our-members/')); ?>">Members</a>
          </li>
          <li class="menu-item<?php echo is_page('our-projects') ? ' current-menu-item' : ''; ?>">
            <a href="<?php echo esc_url(home_url('/our-projects/')); ?>">Projects</a>
          </li>
          <li class="menu-item<?php echo is_page('skills-expertise') ? ' current-menu-item' : ''; ?>">
            <a href="<?php echo esc_url(home_url('/skills-expertise/')); ?>">Skills</a>
          </li>
          <li class="menu-item<?php echo is_page('contact-us') ? ' current-menu-item' : ''; ?>">
            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact</a>
          </li>
        </ul>
      </nav>

      <!-- Right CTA -->
      <div class="nav-right">
        <a class="nav-cta" href="<?php echo esc_url(home_url('/contact-us/')); ?>">
          <span>Let's Talk</span>
        </a>

        <!-- Mobile Toggle -->
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" aria-label="Toggle navigation">
          <span></span><span></span><span></span>
        </button>
      </div>

    </div>
  </header>
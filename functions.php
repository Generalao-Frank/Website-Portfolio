
<?php
if (!defined('ABSPATH')) {
    exit;
}

function my_custom_portfolio_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');

    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'my-custom-portfolio')
    ));
}
add_action('after_setup_theme', 'my_custom_portfolio_setup');

function my_custom_portfolio_enqueue_assets()
{
    $theme_dir = get_stylesheet_directory();
    $theme_uri = get_stylesheet_directory_uri();

    // Main theme stylesheet
    $style_file = $theme_dir . '/style.css';

    if (file_exists($style_file)) {
        wp_enqueue_style(
            'my-custom-portfolio-style',
            get_stylesheet_uri(),
            array(),
            filemtime($style_file)
        );
    }

    // Additional CSS
    $custom_css = $theme_dir . '/assets/css/custom.css';

    if (file_exists($custom_css)) {
        wp_enqueue_style(
            'my-custom-portfolio-custom',
            $theme_uri . '/assets/css/custom.css',
            array('my-custom-portfolio-style'),
            filemtime($custom_css)
        );
    }

    // Main JavaScript
    $main_js = $theme_dir . '/assets/js/main.js';

    if (file_exists($main_js)) {
        wp_enqueue_script(
            'my-custom-portfolio-main',
            $theme_uri . '/assets/js/main.js',
            array(),
            filemtime($main_js),
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'my_custom_portfolio_enqueue_assets');

// ===== CONTACT FORM -> GMAIL =====
function handle_custom_contact_form() {
    if ( isset($_POST['custom_contact_submit']) ) {
        // ⚠️ PALITAN ITO NG TOTOONG GMAIL MO
        $to_email = 'frankjamesgeneralao@gmail.com';
        
        $name    = sanitize_text_field($_POST['name']);
        $email   = sanitize_email($_POST['email']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);

        $email_subject = "New Contact Message: " . $subject;
        $email_body  = "You have received a new message from your portfolio contact form.\n\n";
        $email_body .= "Name: " . $name . "\n";
        $email_body .= "Email: " . $email . "\n";
        $email_body .= "Subject: " . $subject . "\n\n";
        $email_body .= "Message:\n" . $message . "\n";
        
        $headers = array(
            'Content-Type: text/plain; charset=UTF-8',
            'From: ' . get_bloginfo('name') . ' <no-reply@' . parse_url(home_url(), PHP_URL_HOST) . '>',
            'Reply-To: ' . $name . ' <' . $email . '>'
        );

        $sent = wp_mail( $to_email, $email_subject, $email_body, $headers );

        if ( $sent ) {
            wp_redirect( add_query_arg('success', '1', wp_get_referer()) );
        } else {
            wp_redirect( add_query_arg('error', '1', wp_get_referer()) );
        }
        exit;
    }
}
add_action('init', 'handle_custom_contact_form');

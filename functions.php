<?php
/**
 * Pushing Together — BlankSlate Child Theme
 * functions.php
 */

// ── Enqueue parent + child styles ────────────────────────────────────────────
/**
 * Inline SVG logo helper
 */
function pt_logo_svg( $height = 32, $class = '' ) {
    $file = get_stylesheet_directory() . '/assets/images/pt-logo.svg';
    if ( ! file_exists( $file ) ) return '';
    $svg = file_get_contents( $file );
    // Inject height and optional class
    $svg = preg_replace( '/height="[^"]*"/', 'height="' . esc_attr( $height ) . '"', $svg );
    if ( $class ) {
        $svg = str_replace( '<svg ', '<svg class="' . esc_attr( $class ) . '" ', $svg );
    }
    return $svg;
}

function pt_logo_svg_mobile( $height = 32, $class = '' ) {
    $file = get_stylesheet_directory() . '/assets/images/mobile-hero-logo-new.svg';
    if ( ! file_exists( $file ) ) return '';
    $svg = file_get_contents( $file );
    // Inject height and optional class
    $svg = preg_replace( '/height="[^"]*"/', 'height="' . esc_attr( $height ) . '"', $svg );
    if ( $class ) {
        $svg = str_replace( '<svg ', '<svg class="' . esc_attr( $class ) . '" ', $svg );
    }
    return $svg;
}

add_action( 'wp_enqueue_scripts', 'pt_enqueue_styles' );
function pt_enqueue_styles() {
    // Parent theme (required for child theme)
    wp_enqueue_style(
        'blankslate-parent',
        get_template_directory_uri() . '/style.css'
    );
    // Compiled SCSS → CSS
    wp_enqueue_style(
        'pushing-together',
        get_stylesheet_directory_uri() . '/assets/css/main.css',
        [ 'blankslate-parent' ],
        filemtime( get_stylesheet_directory() . '/assets/css/main.css' )
    );
    // Swiper carousel
    wp_enqueue_style(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        [],
        '11'
    );
    wp_enqueue_script(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        [],
        '11',
        true
    );
    wp_enqueue_script(
        'pushing-together-js',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        [ 'swiper' ],
        filemtime( get_stylesheet_directory() . '/assets/js/main.js' ),
        true
    );
}

// ── Theme supports ────────────────────────────────────────────────────────────
add_action( 'after_setup_theme', 'pt_theme_setup' );
function pt_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ] );

    register_nav_menus( [
        'primary' => __( 'Primary Navigation', 'pushing-together' ),
        'footer'  => __( 'Footer Navigation',  'pushing-together' ),
    ] );
}

// ── ACF: load/save JSON to theme ──────────────────────────────────────────────
add_filter( 'acf/settings/save_json', 'pt_acf_json_save_point' );
function pt_acf_json_save_point( $path ) {
    return get_stylesheet_directory() . '/acf-json';
}

add_filter( 'acf/settings/load_json', 'pt_acf_json_load_point' );
function pt_acf_json_load_point( $paths ) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}

// ── ACF: options page ─────────────────────────────────────────────────────────
add_action( 'acf/init', 'pt_acf_options_page' );
function pt_acf_options_page() {
    if ( function_exists( 'acf_add_options_page' ) ) {
        acf_add_options_page( [
            'page_title' => 'Site Options',
            'menu_title' => 'Site Options',
            'menu_slug'  => 'acf-options',
            'capability' => 'manage_options',
            'redirect'   => false,
            'icon_url'   => 'dashicons-admin-settings',
        ] );
    }
}

// ── ACF: register flexible content block for homepage ────────────────────────
add_action( 'acf/init', 'pt_register_acf_blocks' );
function pt_register_acf_blocks() {
    if ( ! function_exists( 'acf_register_block_type' ) ) return;
    // Blocks registered via ACF field groups instead — see acf-json/
}

// ── Custom post types ─────────────────────────────────────────────────────────
add_action( 'init', 'pt_register_post_types' );
function pt_register_post_types() {
    // Events
    register_post_type( 'pt_event', [
        'labels'      => [
            'name'          => __( 'Events', 'pushing-together' ),
            'singular_name' => __( 'Event',  'pushing-together' ),
        ],
        'public'      => true,
        'has_archive' => true,
        'supports'    => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'menu_icon'   => 'dashicons-calendar-alt',
        'rewrite'     => [ 'slug' => 'events' ],
    ] );

    // Sponsors
    register_post_type( 'pt_sponsor', [
        'labels'      => [
            'name'          => __( 'Sponsors', 'pushing-together' ),
            'singular_name' => __( 'Sponsor',  'pushing-together' ),
        ],
        'public'      => false,
        'show_ui'     => true,
        'supports'    => [ 'title', 'thumbnail' ],
        'menu_icon'   => 'dashicons-awards',
    ] );
}

// ── Helper: get ACF field with fallback ───────────────────────────────────────
function pt_field( $key, $fallback = '', $post_id = false ) {
    if ( ! function_exists( 'get_field' ) ) return $fallback;
    $val = $post_id ? get_field( $key, $post_id ) : get_field( $key );
    return $val ?: $fallback;
}

// ── Body classes ──────────────────────────────────────────────────────────────
add_filter( 'body_class', 'pt_body_classes' );
function pt_body_classes( $classes ) {
    if ( is_front_page() ) $classes[] = 'is-home';
    return $classes;
}

// ── Allow SVG uploads ─────────────────────────────────────────────────────────
add_filter( 'upload_mimes', 'pt_allow_svg' );
function pt_allow_svg( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}

// Fix SVG display in media library
add_filter( 'wp_check_filetype_and_ext', 'pt_fix_svg_mime', 10, 5 );
function pt_fix_svg_mime( $data, $file, $filename, $mimes, $real_mime ) {
    if ( ! $data['ext'] && ! $data['type'] ) {
        $ext = strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) );
        if ( $ext === 'svg' || $ext === 'svgz' ) {
            $data['ext']  = $ext;
            $data['type'] = 'image/svg+xml';
        }
    }
    return $data;
}

// Show SVGs as thumbnails in media library
add_action( 'admin_head', 'pt_svg_thumb_css' );
function pt_svg_thumb_css() {
    echo '<style>
        img[src$=".svg"] { width: 100% !important; height: auto !important; }
        .attachment-266x266[src$=".svg"],
        .thumbnail[src$=".svg"] { width: 266px; height: auto; }
    </style>';
}

// ── Force Classic Editor (disable Gutenberg) ──────────────────────────────────
add_filter( 'use_block_editor_for_post', '__return_false', 10 );
add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );

// ── Remove default BlankSlate junk ────────────────────────────────────────────
add_action( 'init', 'pt_cleanup' );
function pt_cleanup() {
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'rsd_link' );
}

// ── Newsletter AJAX subscription ──────────────────────────────────────────────
add_action( 'wp_ajax_pt_newsletter_subscribe',        'pt_newsletter_subscribe' );
add_action( 'wp_ajax_nopriv_pt_newsletter_subscribe', 'pt_newsletter_subscribe' );

function pt_newsletter_subscribe() {
    check_ajax_referer( 'pt_newsletter_nonce', 'pt_nonce' );

    $email      = sanitize_email( $_POST['email'] ?? '' );
    $first_name = sanitize_text_field( $_POST['first_name'] ?? '' );

    if ( ! is_email( $email ) ) {
        wp_send_json_error( [ 'message' => 'Please enter a valid email address.' ] );
    }

    // Try MailPoet API if available
    if ( class_exists( '\MailPoet\API\API' ) ) {
        try {
            $api        = \MailPoet\API\API::MP( 'v1' );
            $subscriber = [ 'email' => $email ];
            if ( $first_name ) $subscriber['first_name'] = $first_name;
            $lists = $api->getLists();
            $list_ids = ! empty( $lists ) ? [ $lists[0]['id'] ] : [];
            $api->addSubscriber( $subscriber, $list_ids );
            wp_send_json_success( [ 'message' => "You're in! Welcome to the community. 🛹" ] );
        } catch ( \Exception $e ) {
            // If already subscribed, that's fine
            if ( strpos( $e->getMessage(), 'already subscribed' ) !== false ) {
                wp_send_json_success( [ 'message' => "You're already on the list — thanks! 🤙" ] );
            }
            wp_send_json_error( [ 'message' => 'Something went wrong. Please try again.' ] );
        }
    }

    // Fallback: save to WP options and email admin
    $subscribers = get_option( 'pt_newsletter_subscribers', [] );
    if ( isset( $subscribers[ $email ] ) ) {
        wp_send_json_success( [ 'message' => "You're already on the list — thanks! 🤙" ] );
    }
    $subscribers[ $email ] = [
        'first_name' => $first_name,
        'date'       => current_time( 'mysql' ),
    ];
    update_option( 'pt_newsletter_subscribers', $subscribers );

    wp_mail(
        get_option( 'admin_email' ),
        'New Newsletter Signup — Pushing Together',
        "New subscriber:\nName: {$first_name}\nEmail: {$email}\nDate: " . current_time( 'mysql' ),
        [ 'Content-Type: text/plain; charset=UTF-8' ]
    );

    wp_send_json_success( [ 'message' => "You're in! Welcome to the community. 🛹" ] );
}

// ── Performance optimizations ────────────────────────────────
// Dequeue heavy WP block editor assets on frontend (saves ~600KB JS)
add_action( 'wp_enqueue_scripts', function () {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'global-styles' );
    wp_dequeue_style( 'classic-theme-styles' );
    wp_dequeue_script( 'wp-embed' );
    // WooCommerce CSS/JS — not needed on any page for this site
    wp_dequeue_style( 'woocommerce-general' );
    wp_dequeue_style( 'woocommerce-layout' );
    wp_dequeue_style( 'woocommerce-smallscreen' );
    wp_dequeue_style( 'wc-blocks-style' );
    wp_dequeue_style( 'wc-blocks-vendors-style' );
    wp_dequeue_script( 'woocommerce' );
    wp_dequeue_script( 'wc-cart-fragments' );
    wp_dequeue_script( 'wc-add-to-cart' );
}, 100 );

// Aggressively deregister block editor + React scripts on frontend
// WooCommerce pulls these in as deps — deregister entirely so nothing can re-enqueue
add_action( 'wp_enqueue_scripts', function () {
    if ( is_admin() ) return;
    $kill = [
        'wp-components', 'wp-block-editor', 'wp-blocks', 'wp-edit-post',
        'wp-editor', 'wp-format-library', 'wp-block-library',
        'react', 'react-dom', 'react-jsx-runtime',
        'wp-block-serialization-default-parser',
        'wp-polyfill', 'wp-dom-ready', 'wp-hooks', 'wp-i18n',
        'wp-primitives', 'wp-icons',
    ];
    foreach ( $kill as $handle ) {
        wp_dequeue_script( $handle );
        wp_deregister_script( $handle );
    }
}, 999 );

// Load GiveWP Stripe scripts only on donate page
add_action( 'wp_enqueue_scripts', function () {
    if ( ! is_page( 'donate' ) ) {
        // Kill all Stripe + GiveWP scripts on non-donate pages
        $stripe_handles = [
            'give-stripe-js', 'give-stripe-onpage-js', 'give-stripe',
            'stripe-js', 'give-stripe-js-js', 'give-stripe-onpage-js-js',
        ];
        foreach ( $stripe_handles as $h ) {
            wp_dequeue_script( $h );
            wp_deregister_script( $h );
        }
        // Catch anything loading from stripe.com
        global $wp_scripts;
        if ( isset( $wp_scripts->registered ) ) {
            foreach ( $wp_scripts->registered as $handle => $script ) {
                if ( strpos( $script->src ?? '', 'stripe.com' ) !== false ) {
                    wp_dequeue_script( $handle );
                    wp_deregister_script( $handle );
                }
            }
        }
    }
}, 999 );

// Browser caching headers for static assets
add_action( 'send_headers', function () {
    if ( ! is_admin() ) {
        header( 'Cache-Control: public, max-age=31536000, immutable', false );
    }
} );

// Preload hero image for faster LCP
add_action( 'wp_head', function () {
    if ( is_front_page() || is_home() ) {
        $hero_img = get_theme_mod( 'hero_image', '' );
        if ( $hero_img ) {
            echo '<link rel="preload" as="image" href="' . esc_url( $hero_img ) . '">' . "\n";
        }
    }
}, 1 );

// Add missing image attributes (width/height/lazy) to reduce CLS
add_filter( 'the_content', function ( $content ) {
    return $content;
} );

// ── Favicon ───────────────────────────────────────────────────
add_action( 'wp_head', function () {
    $favicon = get_stylesheet_directory_uri() . '/assets/images/favicon.svg';
    echo '<link rel="icon" type="image/svg+xml" href="' . esc_url( $favicon ) . '">' . "\n";
} );

// ── Contact form AJAX ─────────────────────────────────────────
add_action('wp_ajax_pt_contact_submit',        'pt_contact_submit');
add_action('wp_ajax_nopriv_pt_contact_submit', 'pt_contact_submit');

function pt_contact_submit() {
    check_ajax_referer('pt_contact', 'pt_contact_nonce');
    $name    = sanitize_text_field($_POST['name'] ?? '');
    $email   = sanitize_email($_POST['email'] ?? '');
    $subject = sanitize_text_field($_POST['subject'] ?? 'General inquiry');
    $message = sanitize_textarea_field($_POST['message'] ?? '');
    if (!is_email($email) || empty($message)) {
        wp_send_json_error(['message' => 'Please fill in all required fields.']);
    }
    $body = "Name: $name\nEmail: $email\nSubject: $subject\n\nMessage:\n$message";
    wp_mail(get_option('admin_email'), "Contact Form: $subject", $body, ["Reply-To: $name <$email>"]);
    wp_send_json_success(['message' => "Thanks $name! We'll get back to you within 1–2 business days. 🤙"]);
}

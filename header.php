<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Custom cursor -->
<div class="c-cursor-dot" aria-hidden="true"></div>
<div class="c-cursor-ring" aria-hidden="true"></div>

<header id="site-header">

  <!-- Logo — inline SVG for full CSS control -->
   <div class="nav-logo-wrap">
    <div class="nav-logo">
      <a class="desktop-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php bloginfo( 'name' ); ?>">
        <?php echo pt_logo_svg( 32, 'pt-logo' ); ?>
      </a>
      <a class="mobile-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php bloginfo( 'name' ); ?>">
        <?php echo pt_logo_svg_mobile( 32, 'pt-logo' ); ?>
      </a>
    </div>
  </div>

  <!-- Right side: pill with links + donate -->
  <div class="nav-right">
    <nav id="site-nav" class="nav-links-desktop" aria-label="Primary navigation">
      <?php
      $nav_pages = [
        'Home'    => '/',
        'About'   => '/about',
        'Contact' => '/contact',
      ];
      wp_nav_menu( [
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'nav-links',
        'fallback_cb'    => function() use ( $nav_pages ) {
          echo '<ul class="nav-links">';
          foreach ( $nav_pages as $label => $path ) {
            $url     = home_url( $path );
            $current = untrailingslashit( $url ) === untrailingslashit( ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
            $active  = $current ? ' class="current-menu-item" aria-current="page"' : '';
            echo '<li' . $active . '><a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a></li>';
          }
          echo '</ul>';
        },
      ] );
      ?>
    </nav>

    <!-- Mobile toggle -->
    <button class="nav-toggle" aria-label="Toggle navigation" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>

    <a href="<?php echo esc_url( pt_field( 'donate_url', home_url('/donate'), 'option' ) ); ?>"
       class="btn btn-primary nav-donate">
      Donate
    </a>
  </div>

  <!-- Mobile nav links: direct child of header so it wraps below -->
  <nav id="site-nav-mobile" class="nav-links-mobile" aria-label="Mobile navigation">
    <?php
    wp_nav_menu( [
      'theme_location' => 'primary',
      'container'      => false,
      'menu_class'     => 'nav-links nav-links--mobile',
      'fallback_cb'    => function() use ( $nav_pages ) {
        echo '<ul class="nav-links nav-links--mobile">';
        foreach ( $nav_pages as $label => $path ) {
          $url     = home_url( $path );
          $current = untrailingslashit( $url ) === untrailingslashit( ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
          $active  = $current ? ' class="current-menu-item" aria-current="page"' : '';
          echo '<li' . $active . '><a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a></li>';
        }
        echo '</ul>';
      },
    ] );
    ?>
  </nav>

</header>

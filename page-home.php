<?php

/**
  Template Name: Page Accueil
 */
?>

<!DOCTYPE html>

<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Paris Yoseikan</title>
  <link href="https://fonts.googleapis.com/css?family=Maven+Pro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Questrial&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body>

  <div id="home-background" class="parallax">
    <nav class="navbar navbar-expand-md home-navbar">
      <a class="navbar-brand" href="<?php echo get_site_url() ?>">
        <img id="logo_py_white" src="<?php echo get_template_directory_uri() . '/parisyos_logo_white.png'; ?>">
        <span id="py-name">Paris Yoseikan</span>
      </a>
      <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu"
        aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php
              wp_nav_menu(
                array(
                  'theme_location'  => 'primary',
                  'container'       => 'div',
                  'container_class' => 'collapse navbar-collapse',
                  'container_id'    => 'navbarMenu',
                  'menu_class'      => 'menu',
                  'echo'            => true,
                  'fallback_cb'     => 'wp_page_menu',
                  'items_wrap'      => '<ul class="navbar-nav navbar-items ml-auto">%3$s</ul>',
                  'depth'           => 0,
                  'walker'          => new Mf_theme_nav_menu_walker
                )
              );
            ?>
    </nav>
    <div class="site-name">
      <div class="logo-slogan">
        <img id="big_logo_py" src="<?php echo get_template_directory_uri() . '/css/parisyos_logo_big.png'; ?>">
      </div>
      <div class="site-description">
      <?php echo get_bloginfo ( 'description' ); ?>
    </div>
    </div>
  </div>

  <main role="main" class="container">

    <div class="starter-template">

      <div class="row">
        <?php
          if (have_posts()) {
            while (have_posts()) {
              the_post();
        ?>
        <div class="col-12 p-0 card home-card">
          <p><?php the_content(); ?></p>
        </div>
        <?php get_footer(); ?>
        <?php
            }
          }
        ?>
      </div>

    </div>

  </main>
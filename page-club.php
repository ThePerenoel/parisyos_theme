<?php

/**
  Template Name: Page club
 */

get_header(); ?>


<main role="main" class="container">

  <div class="starter-template-default club-page">

    <div class="row">
      <?php
          if (have_posts()) {
            while (have_posts()) {
              the_post();
        ?>
      <div class="col-12">
        <h1>
          <?php the_title();?>
        </h1>
        <p><?php the_content(); ?></p>
      </div>

      <?php
            }
          }
        ?>
    </div>

  </div>

</main>

<?php get_footer(); ?>
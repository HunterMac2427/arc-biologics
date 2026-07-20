<?php
/**
 * Default page template — used by Cart, Checkout, and generic WP pages
 */
get_header();
?>

<main class="ab-page">
  <div class="ab-container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <h1 class="ab-page-title"><?php the_title(); ?></h1>
      <div class="ab-page-content">
        <?php the_content(); ?>
      </div>
    <?php endwhile; endif; ?>
  </div>
</main>

<?php get_footer(); ?>

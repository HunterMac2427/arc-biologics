<?php
/**
 * Default template — falls back to front-page.php for homepage.
 * This file is required for a valid WordPress theme.
 */
get_header();
?>

<main class="ab-section ab-section-dark">
  <div class="ab-container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
      </article>
    <?php endwhile; else : ?>
      <p>No content found.</p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>

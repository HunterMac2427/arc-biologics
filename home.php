<?php
/**
 * Blog Archive Template (home.php)
 * WordPress uses this for the Posts page / blog index.
 */
get_header();
?>

<section class="ab-shop-hero">
  <div class="ab-container">
    <p class="ab-label ab-label-decorated">Research Library</p>
    <h1 class="ab-hero-heading">
      <span class="ab-heading-light">Latest from</span>
      <span class="ab-heading-bold ab-gradient-text">the Lab.</span>
    </h1>
    <p class="ab-hero-sub">In-depth guides on peptide science, mechanisms of action, and the latest compound research.</p>
  </div>
</section>

<section class="ab-section ab-section-dark">
  <div class="ab-container">
    <?php if (have_posts()) : ?>
    <div class="ab-blog-grid ab-stagger">
      <?php while (have_posts()) : the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="ab-blog-card ab-reveal">
          <div class="ab-blog-thumb">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('medium_large'); ?>
            <?php endif; ?>
          </div>
          <div class="ab-blog-body">
            <h4><?php the_title(); ?></h4>
          </div>
        </a>
      <?php endwhile; ?>
    </div>

    <?php if ($wp_query->max_num_pages > 1) : ?>
    <div class="ab-products-cta">
      <div class="ab-blog-pagination">
        <?php
        echo paginate_links([
          'prev_text' => '&larr; Prev',
          'next_text' => 'Next &rarr;',
          'type'      => 'list',
        ]);
        ?>
      </div>
    </div>
    <?php endif; ?>

    <?php else : ?>
    <div class="ab-section-header">
      <p>No articles published yet. Check back soon.</p>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>

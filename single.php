<?php
/**
 * Single Blog Post Template
 */
get_header();

while (have_posts()) : the_post();
  $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
?>

<!-- Hero Banner -->
<section class="ab-post-hero"<?php if ($thumb) : ?> style="background-image: linear-gradient(180deg, rgba(12,12,16,0.4) 0%, rgba(12,12,16,0.85) 60%, #0C0C10 100%), url('<?php echo esc_url($thumb); ?>');"<?php endif; ?>>
  <div class="ab-container">
    <div class="ab-post-hero-content">
      <time class="ab-post-date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('F j, Y'); ?></time>
      <h1 class="ab-post-title"><?php the_title(); ?></h1>
      <?php if (has_excerpt()) : ?>
        <p class="ab-post-excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Post Content -->
<article class="ab-section ab-section-dark">
  <div class="ab-container ab-post-container">
    <div class="ab-post-content">
      <?php the_content(); ?>
    </div>

    <div class="ab-post-footer">
      <a href="/blog/" class="ab-btn ab-btn-outline">&larr; Back to Research Library</a>
      <a href="/shop/" class="ab-btn ab-btn-primary">Browse Compounds</a>
    </div>
  </div>
</article>

<?php endwhile; ?>

<?php get_footer(); ?>

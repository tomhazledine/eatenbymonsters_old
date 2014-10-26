<?php // Generic Archive Page ?>

<?php get_header(); ?>

<h1>Generic Archive</h1>

<?php if ( have_posts() ) : ?>

  <?php while ( have_posts() ) : the_post(); ?>

    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

  <?php endwhile; ?>

<?php else : ?>
  
  <h2>No Posts Here!</h2>

<?php endif; ?>
    
<?php get_footer(); ?>
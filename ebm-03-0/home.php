<?php get_header(); ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if(is_home() && 1 == $paged ):
  
  //get_template_part('seasonal');
  
  get_template_part('module01'); ?>
  
  <div class="main-content clearfix">
    
<?php else:?>

  <div class="main-content clearfix">
    
  <div class="pagenavi-box top clearfix">
    <?php if(function_exists('wp_pagenavi')): ?>
      <?php wp_pagenavi(); ?>
    <?php else: ?>
  
      <div class="prev-posts fallback">
        <?php previous_posts_link( '« Newer Entries' ) ?>
      </div><!-- .prev-posts-fallback -->
      <div class="next-posts fallback">
        <?php next_posts_link('Older Entries »', 0); ?>
      </div><!-- .next-posts-fallback -->
  
    <?php endif; ?>
  </div><!-- .pagenavi-top -->
    
<?php endif;?>
  
<!--div class="test-loop-filtering-answer">
  <?php 
  /*
  if ($post_to_exclude_ID){
    echo $post_to_exclude_ID;
  }else{
    echo "nothing to see here";
  }
  //*/
  ?>
</div-->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php get_template_part('home-post'); ?>

<?php endwhile; ?>

<?php //include (TEMPLATEPATH . '/inc/nav.php' ); ?>

<div class="pagenavi-box bottom clearfix">
  <?php if(function_exists('wp_pagenavi')): ?>
    <?php wp_pagenavi(); ?>
  <?php else: ?>
    
    <div class="prev-posts fallback">
      <?php previous_posts_link( '« Newer Entries' ) ?>
    </div><!-- .prev-posts-fallback -->
    <div class="next-posts fallback">
      <?php next_posts_link('Older Entries »', 0); ?>
    </div><!-- .next-posts-fallback -->
    
  <?php endif; ?>
</div><!-- .pagenavi-bottom -->

<?php else : ?>

	<h2>Not Found</h2>

<?php endif; ?>

</div><!-- .main-content -->

<?php //get_template_part('module02'); ?>

<?php get_footer(); ?>
<?php get_header(); ?>

<?php //get_template_part('seasonal'); ?>

<?php get_template_part('module01'); ?>

<?php // get_sidebar(); ?>

<div class="main-content clearfix">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

		<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

		<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

		<div class="entry">
			<?php the_excerpt(); ?>
		</div>

		<div class="postmetadata">
			<?php the_tags('Tags: ', ', ', '<br />'); ?>
			Posted in <?php the_category(', ') ?> | 
			<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
		</div>

	</div>

<?php endwhile; ?>

<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

<?php else : ?>

	<h2>Not Found</h2>

<?php endif; ?>

</div><!-- .main-content -->

<?php //get_sidebar("secondary"); ?>

<?php get_footer(); ?>
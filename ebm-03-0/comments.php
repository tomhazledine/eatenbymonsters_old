<?php
// The template for displaying Comments.
?>
	<div id="comments" class="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'toolbox' ); ?></p>
	</div><!-- #comments -->
	<?php
			// Stop the rest of comments.php from being processed,
			// but don't kill the script entirely -- we still have
			// to fully load the template.
			return;
		endif;
	?>
	
	<?php if ( have_comments() ) : ?>
		<h4 id="comments-title" class="comments-title">
			<?php
				printf( _n( 'One lonely comment so far, why not give it some company?', '%1$s comments so far. Join the debate!', get_comments_number(), 'toolbox' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h4>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-nav-above">
			<?php //* ?><h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'toolbox' ); ?></h1><?php //*/ ?>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'toolbox' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'toolbox' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php
				// Loop through and list the comments. Tell wp_list_comments()
				// to use ebm_comment() to format the comments.
				// If you want to overload this in a child theme then you can
				// define ebm_comment() and that will be used instead.
				// See ebm_comment() in toolbox/functions.php for more.
				wp_list_comments( array( 'callback' => 'ebm_comment' ) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-nav-below">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'toolbox' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'toolbox' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'toolbox' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are no comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'toolbox' ); ?></p>
	<?php endif; ?>

	<?php comment_form(
	array(
		'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label></br><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Your comment goes here&hellip;"></textarea></p>',
		//'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		//'comment_field'        => '<p class="comment-form-comment">...',
		//'must_log_in'          => '<p class="must-log-in">...',
		//'logged_in_as'         => '<p class="logged-in-as">...',
		'comment_notes_before' => '<p class="comment-notes">Your email address will not be published.</p>',
		'comment_notes_after'  => '',
		//'id_form'              => 'commentform',
		'id_submit'            => 'comment-submit',
		//'title_reply'          => __( 'Leave a Reply' ),
		//'title_reply_to'       => __( 'Leave a Reply to %s' ),
		//'cancel_reply_link'    => __( 'Cancel reply' ),
		'label_submit'         => __( 'submit comment' ),
		)
	); ?>


</div><!-- #comments -->

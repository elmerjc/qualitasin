<?php
/*
The comments page for composer
*/

	$composer_comment_title = composer_get_option_value('single_comment_title', esc_html__('Comments', 'composer' ) );
	$composer_comment_form_title = composer_get_option_value('single_comment_form_title', esc_html__('Leave a Comment', 'composer' ) );
	$composer_comment_form_btn_text = composer_get_option_value('single_comment_form_btn_text', esc_html__('Add Comment', 'composer' ) );


// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
  	<div class="alert help">
    	<p class="nocomments"><?php esc_html_e("This post is password protected. Enter the password to view comments.", 'composer' ); ?></p>
  	</div>
  <?php
    return;
  }

if ( have_comments() ) :  ?>


    	
   <h2 class="pull-out comment-title-wrap"><?php esc_html_e( 'Comments', 'composer' ); ?></h2>
    <h3 id="comments-title" class="title"><?php comments_number( '<span>'. esc_html__( 'No', 'composer' ) . '</span>' . $composer_comment_title , '<span>'. esc_html__( 'One', 'composer' ) . '</span>' . $composer_comment_title, '<span>%</span> ' ) . $composer_comment_title; ?></h3>
	
	<ul class="comment-list">
		<?php wp_list_comments('callback=composer_comments'); ?>
	</ul>
	
	<?php previous_comments_link();
	next_comments_link();

	else : // this is displayed if there are no comments so far 

	if ( comments_open() ) : 
    	// If comments are open, but there are no comments.

	else : // comments are closed ?>
	
	<!-- If comments are closed. -->
	<!--p class="nocomments"><?php esc_html_e("Comments are closed.", 'composer' ); ?></p>-->

	<?php endif; 

endif; 

if ( comments_open() ) : ?>

<div class="clear">	
	<?php 

	$composer_commenter = wp_get_current_commenter();
	$composer_req = get_option( 'require_name_email' );
	$composer_aria_req = ( $composer_req ? " aria-required='true'" : '' );

	$composer_comments_args = array(
	  'id_form'           => 'commentform',
	  'id_submit'         => 'submit',
	  'title_reply'       => $composer_comment_form_title,
	  'title_reply_to'    => esc_html__( 'Leave a Reply to %s', 'composer' ),
	  'cancel_reply_link' => esc_html__( 'Cancel Reply', 'composer' ),
	  'label_submit'      => $composer_comment_form_btn_text,
	 

	  'comment_field' =>  '<p class="comment-form-comment clear"><label for="comment">'. esc_html__( 'Comment', 'composer' ) .'<span class="color">*</span>'.
	    '</label><textarea id="comment" class="textArea" name="comment"  cols="45" rows="8" placeholder="'. esc_attr__( 'Comment here...', 'composer' ).'" aria-required="true">' .
	    '</textarea></p>',

	  'comment_notes_before' => '',  

	  'comment_notes_after' => '',

	  'fields' => apply_filters( 'comment_form_default_fields', array(

	    'author' =>
	      '<p class="comment-form-author">' .
	      '<label for="author">' . esc_html__( 'Name ', 'composer' ) . 
	      ( $composer_req ? '<span class="color">*</span>' : '' ) . '</label> ' .
	      '<input id="author" name="author"  class="textArea" type="text" value="" size="30" placeholder="'. esc_attr__( 'Name', 'composer' ) .'"' . $composer_aria_req . ' /></p>',

	    'email' =>
	      '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'composer' ) . 
	      ( $composer_req ? '<span class="color">*</span>' : '' ) . '</label> ' .
	      '<input id="email" name="email"  class="textArea" type="text" value="" size="30" placeholder="'. esc_attr__( 'E-Mail', 'composer' ) .'"' . $composer_aria_req . ' /></p>',

	    'url' =>
	      '<p class="comment-form-url"><label for="url">' .
	      esc_html__( 'Website :', 'composer' ) . '</label>' .
	      '<input id="url" name="url" type="text"   class="textArea" value="" size="30" placeholder="'. esc_attr__( 'Got a website?', 'composer' ) .'" /></p>'
	    )
	  ),
	);

	comment_form( $composer_comments_args );

	do_action( 'comment_form', $post->ID ); 
	?>

</div>

<?php endif; // if you delete this the sky will fall on your head

<div id="comments" class="comments-area container">

  <?php if ( have_comments() ) : ?>
    <h2 class="comments-title">
      <?php
        printf( _nx( 'Um comentário em "%2$s"', '%1$s comentários em "%2$s"', get_comments_number(), 'comments title'),
        number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
      ?>
    </h2>

    <ol class="comment-list list-group">
      <?php
        wp_list_comments( array(
          'style'      => 'ol',
          'short_ping' => true,
          'walker' => new Bootstrap_Walker_Comment()
        ) );
      ?>
    </ol>

    <?php the_comments_navigation(); ?>

  <?php endif; ?>

  <?php
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
  ?>
    <p class="no-comments alert alert-warning"><?php _e( 'Os comentários estão fechados.' ); ?></p>
  <?php endif; ?>

  <?php 
    $comments_args = array(
      'comment_field' => '<div class="form-group"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" class="form-control" name="comment" aria-required="true"></textarea></div>',
      'class_submit' => 'btn btn-primary'
    );
    comment_form($comments_args); 
  ?>

</div>

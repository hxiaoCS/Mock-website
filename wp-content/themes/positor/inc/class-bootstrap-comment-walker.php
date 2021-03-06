<?php
/**
 * Comment walker class for showing comments in a Bootstrap 4 theme.
 *
 * Based on the work of Aymene Bourafai: https://github.com/bourafai/wp-bootstrap-4-comment-walker.
 * Copy this file to your inc folder. In functions.php add:
 *     require get_template_directory() . '/inc/class-bootstrap-comment-walker.php';
 *
 * Replace wp_list_comments in your comments.php with this to use this
 * 		<?php
 *			wp_list_comments( array(
 *				'style'         => 'ol',
 *				'max_depth'     => 3,
 *				'short_ping'    => true,
 *				'avatar_size'   => '75',
 *				'walker'        => new Bootstrap_Comment_Walker(),
 *			) );
 *			?>
 *
 * @package     Positor
 */

?>
<?php
/**
 * The walker class.
 */
class Bootstrap_Comment_Walker extends Walker_Comment {
	/**
	 * Output a comment in the HTML5 format.
	 *
	 * @since 1.0.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param object $comment the comments list.
	 * @param int    $depth   Depth of comments.
	 * @param array  $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
		?>		
		<<?php echo $tag; // WPCS: XSS OK. ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'has-children media' : ' media' ); ?>> 
			

			<div class="media-body " id="div-comment-<?php comment_ID(); ?>">
				<div class="media">
					<div class="d-flex mr-3">
						<?php if ( 0 !== $args['avatar_size'] ) : ?>
							<img class="comment_avatar rounded-circle" src="
								<?php echo esc_url( get_avatar_url( $comment, $args['avatar_size'], 'mm', '', array(
									'default' => 'avatar_default',
								) ) );
								?>">
						<?php endif; ?>
					</div>
					<div class="media-body mb-5">
						<h4 class="media-heading "><?php echo get_comment_author_link() ?>
							<time class="small text-muted" datetime="<?php comment_time( 'c' ); ?>">
										<?php comment_date() ?>,
										<?php comment_time() ?>
							</time>
						</h4>
						<div class="comment-content">
						<?php comment_text(); ?>
						<div class="d-inline d-block">
							<?php edit_comment_link( __( 'Edit', 'positor' ), '', '' ); ?>
							<?php
								comment_reply_link( array_merge( $args, array(
									'add_below' => 'div',
									'depth'     => $depth,
									'max_depth' => $args['max_depth'],
									'before'    => '',
									'after'     => '',
								) ) );
							?>
						</div>
					</div><!-- .comment-content -->
					

					</div><!-- .comment-metadata -->
				</div>
				<div class="text-warning">
					<?php if ( '0' === $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation label label-info text-muted small"><?php esc_html_e( 'Your comment is awaiting moderation.', 'positor' ); ?></p>
					<?php endif; ?>				
				</div>

								
				<!-- </div> -->

			<!-- </div>	 -->
<?php
	}
}

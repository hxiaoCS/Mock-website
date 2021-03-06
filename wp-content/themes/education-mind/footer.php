<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Education_Mind
 */

	/**
	 * Hook - education_mind_action_after_content.
	 *
	 * @hooked education_mind_content_end - 10
	 */
	do_action( 'education_mind_action_after_content' );
?>

	<?php
	/**
	 * Hook - education_mind_action_before_footer.
	 *
	 * @hooked education_mind_add_footer_widgets - 5
	 * @hooked education_mind_footer_start - 10
	 */
	do_action( 'education_mind_action_before_footer' );
	?>
	<?php
	  /**
	   * Hook - education_mind_action_footer.
	   *
	   * @hooked education_mind_footer_copyright - 10
	   */
	  do_action( 'education_mind_action_footer' );
	?>
	<?php
	/**
	 * Hook - education_mind_action_after_footer.
	 *
	 * @hooked education_mind_footer_end - 10
	 */
	do_action( 'education_mind_action_after_footer' );
	?>

<?php
	/**
	 * Hook - education_mind_action_after.
	 *
	 * @hooked education_mind_page_end - 10
	 * @hooked education_mind_footer_goto_top - 20
	 */
	do_action( 'education_mind_action_after' );
?>

<?php wp_footer(); ?>
</body>
</html>

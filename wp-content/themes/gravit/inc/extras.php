<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package jordan
 */

/**
 * Get our wp_nav_menu() fallback, wp_pag_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function jordan_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'jordan_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function jordan_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'jordan_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function jordan_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() ) {
		return $title;
	}

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$sit_edescription = get_bloginfo( 'description', 'display' );
	if ( $sit_edescription && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $sit_edescription";
	}

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'jordan' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'jordan_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call th_epost() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function jordan_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'jordan_setup_author' );

/**
 * Adding Page Meta Box for Social Media Profiles
 */

add_action( 'add_meta_boxes', 'jordan_meta_box_add' );
function jordan_meta_box_add() {
    add_meta_box( 'social', __( 'Social Profiles', 'jordan' ), 'jordan_meta_box', 'page', 'normal', 'high' );
}

function jordan_meta_box() {
    _e( 'If you are using the About Me Template enter your social profile links here.', 'jordan' );

 	global $post;
	wp_nonce_field( 'jordan_meta_box_nonce', 'meta_box_nonce' );
	?>
	<p>
	    <label for="jordan_facebook"><?php _e( 'Facebook', 'jordan' );  ?></label><br />
	    <input type="text" name="jordan_facebook" id="jordan_facebook" value="<?php echo esc_attr( get_post_meta( $post->ID, 'jordan_facebook', true ) ); ?>" />
	</p>
	<p>
	    <label for="jordan_twitter"><?php _e( 'Twitter', 'jordan' );  ?></label><br />
	    <input type="text" name="jordan_twitter" id="jordan_twitter" value="<?php echo esc_attr( get_post_meta( $post->ID, 'jordan_twitter', true ) ); ?>" />
	</p>
	<p>
	    <label for="jordan_google-plus"><?php _e( 'Google+', 'jordan' );  ?></label><br />
	    <input type="text" name="jordan_google-plus" id="jordan_google-plus" value="<?php echo esc_attr( get_post_meta( $post->ID, 'jordan_google-plus', true ) ); ?>" />
	</p>
	<p>
	    <label for="jordan_linkedin"><?php _e( 'LinkedIn', 'jordan' );  ?></label><br />
	    <input type="text" name="jordan_linkedin" id="jordan_linkedin" value="<?php echo esc_attr( get_post_meta( $post->ID, 'jordan_linkedin', true ) ); ?>" />
	</p>
	<p>
	    <label for="jordan_youtube"><?php _e( 'YouTube', 'jordan' );  ?></label><br />
	    <input type="text" name="jordan_youtube" id="jordan_youtube" value="<?php echo esc_attr( get_post_meta( $post->ID, 'jordan_youtube', true ) ); ?>" />
	</p>
	<p>
	    <label for="jordan_instagram"><?php _e( 'Instagram', 'jordan' );  ?></label><br />
	    <input type="text" name="jordan_instagram" id="jordan_instagram" value="<?php echo esc_attr( get_post_meta( $post->ID, 'jordan_instagram', true ) ); ?>" />
	</p>
	<p>
	    <label for="jordan_pinterest"><?php _e( 'Pinterest', 'jordan' );  ?></label><br />
	    <input type="text" name="jordan_pinterest" id="jordan_pinterest" value="<?php echo esc_attr( get_post_meta( $post->ID, 'jordan_pinterest', true ) ); ?>" />
	</p>


<?php }

add_action( 'save_post', 'jordan_meta_box_save' );
function jordan_meta_box_save( $post_id )
{
	global $post;
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'jordan_meta_box_nonce' ) ) return;

    // if our current user can't edit this post, bail
    if ( ! current_user_can( 'edit_post', $post->ID ) )
    return;

    // Make sure your data is set before trying to save it
    if( isset( $_POST['jordan_facebook'] ) )  {
        update_post_meta( $post_id, 'jordan_facebook', $_POST['jordan_facebook'] );
    }

      if( isset( $_POST['jordan_twitter'] ) )  {
        update_post_meta( $post_id, 'jordan_twitter', $_POST['jordan_twitter'] );
    }

      if( isset( $_POST['jordan_google-plus'] ) )  {
        update_post_meta( $post_id, 'jordan_google-plus', $_POST['jordan_google-plus'] );
    }

      if( isset( $_POST['jordan_linkedin'] ) )  {
        update_post_meta( $post_id, 'jordan_linkedin', $_POST['jordan_linkedin'] );
    }

      if( isset( $_POST['jordan_youtube'] ) )  {
        update_post_meta( $post_id, 'jordan_youtube', $_POST['jordan_youtube'] );
    }

       if( isset( $_POST['jordan_instagram'] ) )  {
        update_post_meta( $post_id, 'jordan_instagram', $_POST['jordan_instagram'] );
    }

       if( isset( $_POST['jordan_pinterest'] ) )  {
        update_post_meta( $post_id, 'jordan_pinterest', $_POST['jordan_pinterest'] );
    }
} ?>

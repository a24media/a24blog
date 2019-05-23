<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package xpressmag
 */

if ( ! function_exists( 'xpressmag_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function xpressmag_posted_on( $meta_options = array() ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			//'<span>'.esc_html_x( 'Posted on : %s', 'post date', 'xpressmag' ).'<span>',
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$comment_meta = '';
		
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

			$num_comments = esc_attr( get_comments_number() );

			if ( $num_comments == 0 ) {
				$comments_txt = 0;
			} elseif ( $num_comments > 1 ) {
				/* translators: %d: number of comments */
				$comments_txt = sprintf( esc_html__( '%d ', 'xpressmag' ), $num_comments );
			} else {
				$comments_txt = esc_html__( '1 ', 'xpressmag' );
			}

			$comment_meta = '<span class="comments-link"><a href="' . esc_url( get_comments_link() ).'">' . $comments_txt . '</a></span>';
		}

		$byline = sprintf(
			/* translators: %s: post author. */
			'<span>'.esc_html_x( 'by : %s', 'post author', 'xpressmag' ).'</span>',
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		if( empty( $meta_options ) ){

			echo '<ul class="post_meta">
		            <li class="posted_date">'.wp_kses_post( $posted_on ).'</li> 
		            <li class="post_author">'.wp_kses_post( $byline ) .'</li>
		            <li class="comments">'.wp_kses_post( $comment_meta ).'</li>
		        </ul>';
		}else{ ?>

			<ul class="post_meta">
				<?php  if(in_array('date', $meta_options)){ ?>

					<li class="posted_date"><?php echo wp_kses_post( $posted_on ); ?></li> 

		        <?php }  if(in_array('author', $meta_options)){ ?>

					<li class="post_author"><?php echo wp_kses_post( $byline ); ?></li> 

		        <?php }  if(in_array('comment', $meta_options)){ ?>

					<li class="comments"><?php echo wp_kses_post( $comment_meta ); ?></li> 

		        <?php } ?>
		    </ul>
		<?php
			
		}

	}
endif;

if ( ! function_exists( 'xpressmag_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function xpressmag_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'xpressmag' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'xpressmag_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function xpressmag_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'xpressmag' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'xpressmag' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'xpressmag' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'xpressmag' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'xpressmag' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'xpressmag' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'xpressmag_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function xpressmag_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail' );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

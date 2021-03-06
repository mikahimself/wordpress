<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package mikahimself-2020
 */

if ( ! function_exists( 'mikahimself_2020_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function mikahimself_2020_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf($time_string);
		echo '<i class="far fa-calendar align-baseline"></i>' . "\n";
		echo '                  <span class="align-middle"> ' . $posted_on . '</span>' . "\n";

	}
endif;

if ( ! function_exists( 'mikahimself_2020_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function mikahimself_2020_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'mikahimself-2020' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'mikahimself_2020_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function mikahimself_2020_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* ML2020: Clean up post footer links and add proper classes. */
			$categories_list = preg_replace('/<a /', '             <a class="btn mh2020-btn"', get_the_category_list( esc_html__( ' ', 'mikahimself-2020' ) ));
			$categories_list = preg_replace('/<\/a>/', '</a>' . "\n"  , $categories_list);
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<i class="fas fa-tags align-middle margin-r8 mh2020-icon-button"></i>' . "\n" . esc_html__( ' %1$s', 'mikahimself-2020' ) . "\n", $categories_list );
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'mikahimself-2020' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'mikahimself-2020' ) . '</span>' . "\n", $tags_list );
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '              <span class="float-right mh2020-icon-button">' . "\n                ";
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( '<i class="far fa-comment mh2020-icon-button"></i>', 'mikahimself-2020' ),
						array(
							'span' => array(
								'class' => array(),
							),
							'i' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( '<i class="far fa-comment"></i>', 'mikahimself-2020' ),
						array(
							'span' => array(
								'class' => array(),
							),
							'i' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( '<i class="far fa-comment"></i>', 'mikahimself-2020' ),
						array(
							'span' => array(
								'class' => array(),
							),
							'i' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'btn'
			);
			if (get_comments_number() > 0) {
				echo "\n" . '                <span class="align-middle">' . get_comments_number() . '</span>' . "\n" . '              </span>' . "\n";
			} else {
				echo "\n" . '              </span>' . "\n";
			}
		} 

		edit_post_link(
			sprintf('<i class="far fa-edit mh2020-icon-button"></i>'),
			'<span class="float-right mh2020-icon-button">',
			'</span>',
			$post,
			'btn'
		);
	}
endif;

if ( ! function_exists( 'mikahimself_2020_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function mikahimself_2020_post_thumbnail() {
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
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

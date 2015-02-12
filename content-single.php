<?php
/**
 * @package bjorn-gus-portfolio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

        <?php
        /* translators: used between list items, there is a space after the comma */
        $category_list = get_the_category_list( __( ', ', 'bjorn-gus-portfolio' ) );
        if ( bjorn_gus_portfolio_categorized_blog() ) {
            echo '<div class="category-list">' . $category_list . '</div>';
        }
        ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php bjorn_gus_portfolio_posted_on(); ?>

            <?php
            //Get all custom post type keys from this post to show in meta
            $custom_field_keys = get_post_custom_keys();

            $custom_field_keys_trimmed = array();

            //Iterate trough them
            foreach ($custom_field_keys as $key => $value)
            {
                $valuet = trim($value);
                // the if test excludes values for WordPress internally maintained
                // custom keys such as _edit_last and _edit_lock.
                if ( '_' == $valuet{0} || $valuet ==='enclosure'  )
                    continue;

                array_push($custom_field_keys_trimmed, $valuet);
            }

            foreach ($custom_field_keys_trimmed as $correctKey ){
                $values = get_post_custom_values($correctKey);

                //if a key has a certain type echo it and add an suiting fontawesome icon
                echo "<span><a href=" . $values{0} . ">";

                if ($correctKey ==="Video") { echo '<i class="fa fa-video-camera"></i>'; }
                if ($correctKey ==="Code") { echo  '<i class="fa fa-file-code-o"></i>'; }
                if ($correctKey ==="Report") { echo '<i class="fa-file-pdf-o"></i>'; }
                if ($correctKey ==="Github") { echo '<i class="fa fa-github"></i>'; }

                echo $correctKey . "</a></span>" ;
            }


            echo "<span> Etiketter: </span>";
            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '<span class="fa fa-tag"></span>', __( ' <span class="fa fa-tag"></span>', 'bjorn-gus-portfolio' ) );
            if ( $tags_list ) {
                printf( '<span class="tags-links ">' . __( '%1$s', 'bjorn-gus-portfolio' ) . '</span>', $tags_list );
            }

            /*
            if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
                echo '<span class="comments-link">';
                comments_popup_link( __( 'Leave a comment', 'bjorn-gus-portfolio' ), __( '1 Comment', 'bjorn-gus-portfolio' ), __( '% Comments', 'bjorn-gus-portfolio' ) );
                echo '</span>';
            }
            */
            ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
        <?php
        if (has_post_thumbnail()) {
            echo '<div class="single-post-thumbnail clear">';
            echo '<div class="image-shifter">';
            echo the_post_thumbnail('large-thumb');
            echo '</div>';
            echo '</div>';
        }
        ?>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bjorn-gus-portfolio' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php bjorn_gus_portfolio_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

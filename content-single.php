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

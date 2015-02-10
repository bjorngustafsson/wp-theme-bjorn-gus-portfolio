<?php
/**
 * @package bjorn-gus-portfolio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="index-box">

        <header class="entry-header">

            <?php
            // Display a thumb tack in the top right hand corner if this post is sticky
            if (is_sticky()) {
                echo '<i class="fa fa-thumb-tack sticky-post"></i>';
            }
            ?>

            <?php
            /* translators: used between list items, there is a space after the comma */
            $category_list = get_the_category_list( __( ', ', 'bjorn-gus-portfolio' ) );
            if ( bjorn_gus_portfolio_categorized_blog() && !(is_front_page()) ) {
                echo '<div class="category-list">' . $category_list . '</div>';
            }
            ?>

            <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

            <?php if ( 'post' == get_post_type() ) : ?>
            <div class="entry-meta">
                <?php bjorn_gus_portfolio_posted_on(); ?>
                <?php
                if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
                    echo '<span class="comments-link">';
                    comments_popup_link( __( 'Leave a comment', 'bjorn-gus-portfolio' ), __( '1 Comment', 'bjorn-gus-portfolio' ), __( '% Comments', 'bjorn-gus-portfolio' ) );
                    echo '</span>';
                }
                ?>

            </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">

            <?php
            if (has_post_thumbnail()) {
                echo '<div class="small-index-thumbnail clear">';

                //Link to the post, code line below taken from footer "continue reading" in this file
                echo '<a href="' . get_permalink() . '" title="' . __('Läs mer: ', 'bjorn-gus-portfolio') . get_the_title() . '" rel="bookmark">';
                echo the_post_thumbnail('index-thumb');
                echo '</a>';
                echo '</div>';
            }
            ?>


            <?php
            the_excerpt();

                /* translators: %s: Name of current post */
            /*
                the_content( sprintf(
                    __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bjorn-gus-portfolio' ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
            */
            ?>

            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'bjorn-gus-portfolio' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer continue-reading">
            <?php echo '<a href="' . get_permalink() . '" title="' . __('Continue reading ', 'bjorn-gus-portfolio') . get_the_title() . '" rel="bookmark">Läs mer<i class="fa fa-arrow-circle-o-right"></i></a>'; ?>
            <?php bjorn_gus_portfolio_entry_footer(); ?>
            <hr>

        </footer><!-- .entry-footer -->

    </div><!-- . index-box -->
</article><!-- #post-## -->
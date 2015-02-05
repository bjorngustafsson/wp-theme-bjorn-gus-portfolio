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

            <?php if ( 'post' == get_post_type() ) : ?>

            <?php endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php
            the_content();

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

            <?php bjorn_gus_portfolio_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </div><!-- . index-box -->
</article><!-- #post-## -->
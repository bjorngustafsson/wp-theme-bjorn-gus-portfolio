<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package bjorn-gus-portfolio
 */
?>

<section class="<?php if ( is_404() ) { echo 'error-404'; } else { echo 'no-results'; } ?> not-found">
    <div class="index-box">
        <header class="entry-header">
            <h1 class="entry-title">
                <?php
                if ( is_404() ) { _e( 'Page not available', 'bjorn-gus-portfolio' ); }
                else if ( is_search() ) { printf( __( 'Hittade inget på: <em>', 'bjorn-gus-portfolio') . get_search_query() . '</em>' ); }
                else { _e( 'Nothing Found', 'bjorn-gus-portfolio' );}
                ?>
            </h1>
        </header>

        <div class="entry-content">
            <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

                <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'bjorn-gus-portfolio' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

            <?php elseif ( is_404() ) : ?>

                <p><?php _e( 'You seem to be lost. To find what you are looking for check out the most recent articles below or try a search:', 'bjorn-gus-portfolio' ); ?></p>
                <?php get_search_form(); ?>

            <?php elseif ( is_search() ) : ?>

                <p><?php echo _e( 'Ingenting matchade dina sökord . Kolla in de senaste artiklarna nedan eller prova att söka efter något annat', 'bjorn-gus-portfolio' ); ?></p>
                <?php get_search_form(); ?>

            <?php else : ?>

                <p><?php _e( 'It seems we can’t find what you’re looking for. Perhaps searching can help.', 'bjorn-gus-portfolio' ); ?></p>
                <?php get_search_form(); ?>

            <?php endif; ?>
        </div><!-- .entry-content -->
    </div><!-- .index-box -->

    <?php
    if ( is_404() || is_search() ) {

        ?>
        <header class="page-header"><h1 class="page-title">Most recent posts:</h1></header>
        <?php
        // Get the 6 latest posts
        $args = array(
            'posts_per_page' => 6
        );

        $latest_posts_query = new WP_Query( $args );

        // The Loop
        if ( $latest_posts_query->have_posts() ) {
            while ( $latest_posts_query->have_posts() ) {

                $latest_posts_query->the_post();
                // Get the standard index page content
                get_template_part( 'content', get_post_format() );

            }
        }
        /* Restore original Post Data */
        wp_reset_postdata();

    }
    ?>

</section><!-- .no-results -->
<?php
/**
 * Created by PhpStorm.
 * User: Bjorn
 * Date: 2015-02-03
 * Time: 11:59
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
    return;
}
?>

<div id="supplementary">
    <div id="footer-widgets" class="footer-widgets widget-area clear" role="complementary">
        <?php dynamic_sidebar( 'sidebar-2' ); ?>
    </div><!-- #footer-sidebar -->
</div><!-- #supplementary -->
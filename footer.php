<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

        </div><!-- .col-full -->
    </div><!-- #content -->

    <?php do_action( 'storefront_before_footer' ); ?>

    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="col-full">

            <?php
                /**
                 * Functions hooked in to storefront_footer action
                 *
                 * @hooked storefront_footer_widgets - 10
                 * @hooked storefront_credit         - 20
                 */
                //do_action( 'storefront_footer' );
            ?>

            <h2 class="footer-heading">&copy; <?= date("Y") ?> BASISTA Media GmbH</h2>

            <ul class="footer-list">
                <li><?= function_exists('encryptx') ? encryptx("info@basista-media.de") : "info@basista-media.de" ?></li>
                <?php wp_nav_menu( [
                    'theme_location' => 'footer',
                    'container' => false,
                    'items_wrap' => '%3$s'
                ] ); ?>
            </ul>


        </div><!-- .col-full -->
    </footer><!-- #colophon -->

    <?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

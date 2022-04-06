<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
<footer id="site-footer">

    <div class="container section-inner">

        <p class="footer-copyright">&copy;
			<?php
			echo date_i18n(
			/* translators: Copyright date format, see https://www.php.net/manual/datetime.format.php */
				_x( 'Y', 'copyright date format', 'twentytwenty' )
			);
			?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
        </p><!-- .footer-copyright -->

		<?php
		if ( function_exists( 'the_privacy_policy_link' ) ) {
			the_privacy_policy_link( '<p>', '</p>' );
		}
		?>


        <a class="to-the-top" href="#my-header">

            <span class="to-the-top-short">
                <?php
                /* translators: %s: HTML character for up arrow. */
                printf( __( 'Up %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
                ?>
		    </span><!-- .to-the-top-short -->
        </a><!-- .to-the-top -->

    </div><!-- .section-inner -->

</footer><!-- #site-footer -->

<?php wp_footer(); ?>

<!--
saeed: below tags are opened in header.php.
-->
</body>
</html>

<footer id="site-footer" style="direction: ltr">

    <div class="container section-inner">

        <p class="footer-copyright" style="padding-right: 2rem">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
        </p><!-- .footer-copyright -->

        <a class="to-the-top" href="#my-header">
            <span class="to-the-top-short">
                <?php
                /* translators: %s: HTML character for up arrow. */
                printf( __( 'Up %s' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
                ?>
		    </span>
        </a>

    </div>
</footer>

<?php wp_footer(); ?>

<!--
saeed: below tags are opened in header.php.
-->
</body>
</html>

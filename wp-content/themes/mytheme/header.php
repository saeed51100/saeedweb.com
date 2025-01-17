<!doctype html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title><?php bloginfo( 'name' ); ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">


    <style>


    </style>

	<?php wp_head(); ?>

</head>
<!--<body>-->
<body <?php body_class(); ?>>

<header class="navbar navbar-expand-md navbar-dark fixed-top bg-light shadow">
    <div class="container">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
                <h5><?php bloginfo( 'name' ); ?></h5>
			<?php endif; ?>
        </a>

		<?php if ( ! is_page( 'about' ) ): ?>
            <button class="navbar-toggler position-absolute d-md-none collapsed bg-secondary"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
		<?php endif ?>

        <!--
        saeed: search form without widget.
        <div class="m-2">
            <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input name="s" class="form-control" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
        -->


        <!--    saeed: search form using widget.  -->
        <!--		--><?php //if ( is_active_sidebar( 'sidebar' ) ) : ?>
        <!--			--><?php //dynamic_sidebar( 'sidebar' ); ?>
        <!--		--><?php //endif; ?>


        <!--    saeed: search form using ivory search shortcode.  -->
		<?php echo do_shortcode( '[ivory-search id="5" title="Default Search Form"]' ); ?>


        <nav class="nav main-nav">
            <div class="container">
                <!--            https://github.com/wp-bootstrap/wp-bootstrap-navwalker -->
				<?php
				$args = array(
					'theme_location'  => 'primary',
					'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'bs-example-navbar-collapse-1',
					//				'menu_class'      => 'navbar-nav mr-auto',
					'menu_class'      => 'nav nav-pills pull-right',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker(),

				);
				?>

				<?php wp_nav_menu( $args ); ?>
            </div>
        </nav>
    </div>
</header>

<!--    How to prevent anchor links from scrolling behind a sticky header with one line of CSS-->
<!-- https://gomakethings.com/how-to-prevent-anchor-links-from-scrolling-behind-a-sticky-header-with-one-line-of-css/ -->
<article id="my-header" style="scroll-margin-top: 1em;">
</article>
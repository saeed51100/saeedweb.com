<?php

// Theme Support
function business_theme_setup()
{
    // Logo Support
    add_theme_support('custom-logo');

//	Post Thumbnails
    add_theme_support('post-thumbnails');

//	https://github.com/wp-bootstrap/wp-bootstrap-navwalker
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

    register_nav_menus(array(
        'primary' => __('Primary Menu')
    ));
}

add_action('after_setup_theme', 'business_theme_setup');


//Including CSS & JavaScript.
//https://developer.wordpress.org/themes/basics/including-css-javascript/
//https://www.codexico.com/bootstrap-font-awesome-jquery-popperjs-wordpress/
//https://https://getbootstrap.com/docs/5.1/getting-started/rtl/
//https://www.bootstrapcdn.com/fontawesome/
//https://getbootstrap.com/docs/5.1/getting-started/introduction/
function add_theme_scripts()
{
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css', false, NULL, 'all');
    wp_enqueue_style( 'fontawesome-free', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css' );
    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array('jquery'), true);
}

add_action('wp_enqueue_scripts', 'add_theme_scripts');


function example_function()
{
    if (is_admin_bar_showing()) {
        ?>
        <style>
            @media screen and (max-width: 2000px) {
                header {
                    margin-top: 32px !important
                }
            }

            @media screen and (max-width: 782px) {
                header {
                    margin-top: 46px !important
                }
            }
        </style>
        <?php
    }
}

add_action('init', 'example_function');

function my_excerpt_length($length)
{
    return 60;
}

add_filter('excerpt_length', 'my_excerpt_length');

// Widget Locations
function init_widgets($id)
{
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));

}

add_action('widgets_init', 'init_widgets');

// bootstrap pagination
// https://fellowtuts.com/bootstrap/wordpress-pagination-bootstrap-4-style/
// saeed: This function modified by saeed. refer to source link above if you need.
function fellowtuts_wpbs_pagination($pages = '', $range = 2)
{
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;

        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {

        echo '<ul class="pagination justify-content-center ft-wpbs">';

//		echo '<li class="page-item disabled hidden-md-down d-none d-lg-block"><span class="page-link">Page ' . $paged . ' of ' . $pages . '</span></li>';

        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
            echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link(1) . '" aria-label="First Page">&laquo;</a></li>';
        }

        if ($paged > 1 && $showitems < $pages) {
            echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($paged - 1) . '" aria-label="Previous Page">&lsaquo;</a></li>';
        }

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? '<li class="page-item active"><span class="page-link"><span class="sr-only"></span>' . $i . '</span></li>' : '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
            }
        }

        if ($paged < $pages && $showitems < $pages) {
            echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($paged + 1) . '" aria-label="Next Page">&rsaquo;</a></li>';
        }

        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
            echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($pages) . '" aria-label="Last Page">&raquo;</a></li>';
        }

        echo '</ul>';
        echo '</nav>';
        echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> ' . $paged . ' <span class="text-muted">of</span> ' . $pages . ' ]</div>';
    }
}

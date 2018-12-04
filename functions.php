<?php

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );

/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style() {
    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );
}

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */

/**
 * Registers navigation areas.
 *
 * @return void
 */
function register_navigation_areas()
{
    register_nav_menus([
        'footer' => "Footer",
    ]);
}
add_action('after_setup_theme', 'register_navigation_areas');

/**
 * Proper way to enqueue scripts and styles
 */
function register_styles_and_scrips() {

    $main_css = "/dist/css/main.css";
    wp_enqueue_style(
        'basista',
        get_stylesheet_directory_uri() . $main_css,
        ["storefront-style"],
        hash_file('md5', get_stylesheet_directory() . $main_css)
    );

    $main_js = "/dist/js/main.js";
    wp_enqueue_script(
        'basista',
        get_stylesheet_directory_uri() . $main_js,
        [],
        hash_file('md5', get_stylesheet_directory() . $main_css),
        true
    );

}
add_action( 'wp_enqueue_scripts', 'register_styles_and_scrips' );


function add_book_author($arg1) {
    global $product;
    $author = $product->get_attribute('pa_autor');
    if($author) echo "<p class=\"basista-loop-product__author\">$author</p>";
}

add_action( 'woocommerce_shop_loop_item_title', 'add_book_author');
// woocommerce_template_loop_product_title

<?php

function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );

function planholmen_single_title() {
    the_title( '<h1 class="product_title entry-title">', '</h1>' );
}

add_action( 'woocommerce_single_product_summary', 'planholmen_single_title', 5 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// remove woocommerce backorder e-mails
function remove_woocommerce_mails ($email_class) {
	remove_action( 'woocommerce_product_on_backorder_notification', array( $email_class, 'backorder' ) );
}

add_action('woocommerce_email', 'remove_woocommerce_mails');

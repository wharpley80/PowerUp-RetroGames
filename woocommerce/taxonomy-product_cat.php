<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//wc_get_template( 'archive-product.php' );


// We need to get the top-level category so we know which template to load.
$get_cat = $wp_query->query['product_cat'];

// Split
$all_the_cats = explode('/', $get_cat);

// How many categories are there?
$cat_count = count($all_the_cats);

//
// All the cats say meow!
//

// Define the parent
$parent_cat = $all_the_cats[0];

// Main Wedding Invitations
if ( $parent_cat == 'nes' ) {
	woocommerce_get_template( 'page-nes-shop.php' );

} else if ( $parent_cat == 'snes' ) {
	woocommerce_get_template( 'page-snes-shop.php' );

} else if ( $parent_cat == 'sega' ) {
	woocommerce_get_template( 'page-sega-shop.php' );
//} else if ( $parent_cat == 'snes')  {
//	woocommerce_get_template( 'page-snes.php' );
} else {
	woocommerce_get_template( 'archive-product.php' );
}

// Collection Layout
//elseif ( $parent_cat == 'wedding-collections' && $cat_count == 2 ) woocommerce_get_template( 'subcat-archive-product.php' );

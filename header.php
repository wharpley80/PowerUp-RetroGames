<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="<?php bloginfo('template_directory'); ?>/img/snes_favicon.ico" type="image/x-icon">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?> | Retro Video Games | Nintendo, Super Nintendo, Sega Genesis,
      consoles, games, controllers, hookups, and more.
    </title>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>> 
    <div class="top-head">
      <h5><i class="fi-star"></i>FREE US SHIPPING on orders over $49!</h5>
      <h5 class="warranty"><i class="fi-shield"></i>60 DAY WARRANTY on ALL orders!</h5>
    </div>
    <div class="top-bar">
      <div class="container">
        <span data-responsive-toggle="responsive-menu" data-hide-for="large">
          <button class="menu-icon dark" type="button" data-toggle></button>
        </span>
        <div id="responsive-menu">  
          <div class="top-bar-left">

            <?php 
              $defaults = array(
                'container' => false,
                'theme_location' => 'primary-menu',
                'menu_class' => 'no-bullet',
                'menu_class' => 'dropdown',
                'menu_id' => 'responsive-menu'
              );

              wp_nav_menu( $defaults );
            ?>

          </div>
        </div>
        <a href="<?php bloginfo('url'); ?>"><img class="logo-img" src="<?php bloginfo('template_directory'); ?>/img/My_Logo.png"></a>
        <div class="top-bar-right">
          <?php
            global $woocommerce;
            $cart_url = $woocommerce->cart->get_cart_url();
            $checkout_url = $woocommerce->cart->get_checkout_url();
          ?>
          <a href="<?php echo $cart_url; ?>"><i class="fi-shopping-cart"></i>Cart</a>
          <a href="<?php echo $checkout_url; ?>"><i class="fi-check"></i>Checkout</a>
        </div>
      </div>
    </div>
    <div class="main-search">
      <?php get_sidebar('head'); ?>
      <?php //get_product_search_form();// get_search_form(); ?>
    </div>
    <div class="game-systems">
      <div class="logo small-4 columns">
        <a href="<?php bloginfo('url'); ?>/?p=20"><img class="system-logo" src="<?php bloginfo('template_directory'); ?>/img/nes_logo.png"></a>
      </div>
      <div class="logo small-4 columns">
        <a href="<?php bloginfo('url'); ?>/?p=18"><img class="system-logo" src="<?php bloginfo('template_directory'); ?>/img/snes_logo.png"></a>
      </div>
      <div class="logo small-4 columns">
        <a href="<?php bloginfo('url'); ?>/?p=16"><img class="system-logo" src="<?php bloginfo('template_directory'); ?>/img/sega_genesis.png"></a>
      </div>
    </div>

<?php 

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( 'woocommerce' );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);
//remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar',10);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 10 );
add_action( 'woocommerce_before_single_product_summary', 'comments_template', 30);
add_action( 'wpt_footer', 'wpt_footer_cart_link' );

// Counts the resuts for the NES page
function nes_result_count() {

  $args = array( 
    'post_type' => 'product', 
    'posts_per_page' => 12, 
    'product_cat' => 'nes', 
    'orderby' => 'rand' 
  );

  $nes_loop = new WP_Query( $args );
  ?>

  <p class="snes-count"><?php
    $paged    = max( 1, $nes_loop->get( 'paged' ) );
    $per_page = $nes_loop->get( 'posts_per_page' );
    $total    = $nes_loop->found_posts;
    $first    = ( $per_page * $paged ) - $per_page + 1;
    $last     = min( $total, $nes_loop->get( 'posts_per_page' ) * $paged );

    if ( $total <= $per_page || -1 === $per_page ) {
      printf( _n( 'Showing the single result', 'Showing all %d results', $total, 'woocommerce' ), $total );
    } else {
      printf( _nx( 'Showing the single result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, '%1$d = first, %2$d = last, %3$d = total', 'woocommerce' ), $first, $last, $total );
    }
    ?>
  </p>
<?php
}

// Displays nes games on the NES page
function nes_loop() {

  $args = array( 
    'post_type' => 'product', 
    'posts_per_page' => 12, 
    'product_cat' => 'nes', 
    'orderby' => 'rand' 
  );

  $nes_loop = new WP_Query( $args );
   
  wc_product_post_class();
  ?>

  <ul class="products">
   
    <?php while ( $nes_loop->have_posts() ) : $nes_loop->the_post(); global $product; ?>

      <li class="product">    

        <a href="<?php echo get_permalink( $nes_loop->post->ID ) ?>" title="<?php echo esc_attr($nes_loop->post->post_title ? $nes_loop->post->post_title : $nes_loop->post->ID); ?>">

          <?php woocommerce_show_product_sale_flash( $post, $product ); ?>

          <?php if (has_post_thumbnail( $nes_loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>

          <h3 ><?php the_title(); ?></h3>

          <span class="price"><?php echo $product->get_price_html(); ?></span>                    

        </a>

        <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>

      </li>

    <?php endwhile; ?>

    <?php wp_reset_query(); ?>

  </ul>

<?php
}

// Counts the resuts for the SNES page
function snes_result_count() {

  $args = array( 
    'post_type' => 'product', 
    'posts_per_page' => 12, 
    'product_cat' => 'snes', 
    'orderby' => 'rand' 
  );

  $snes_loop = new WP_Query( $args );
  ?>

  <p class="snes-count"><?php
    $paged    = max( 1, $snes_loop->get( 'paged' ) );
    $per_page = $snes_loop->get( 'posts_per_page' );
    $total    = $snes_loop->found_posts;
    $first    = ( $per_page * $paged ) - $per_page + 1;
    $last     = min( $total, $snes_loop->get( 'posts_per_page' ) * $paged );

    if ( $total <= $per_page || -1 === $per_page ) {
      printf( _n( 'Showing the single result', 'Showing all %d results', $total, 'woocommerce' ), $total );
    } else {
      printf( _nx( 'Showing the single result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, '%1$d = first, %2$d = last, %3$d = total', 'woocommerce' ), $first, $last, $total );
    }
    ?>
  </p>
<?php
}

// Displays snes games on the SNES page
function snes_loop() {

  $args = array( 
    'post_type' => 'product', 
    'posts_per_page' => 12, 
    'product_cat' => 'snes', 
    'orderby' => 'rand' 
  );

  $snes_loop = new WP_Query( $args );
   
  wc_product_post_class();
  ?>

  <ul class="products">
   
    <?php while ( $snes_loop->have_posts() ) : $snes_loop->the_post(); global $product; ?>

      <li class="product">    

        <a href="<?php echo get_permalink( $snes_loop->post->ID ) ?>" title="<?php echo esc_attr($snes_loop->post->post_title ? $snes_loop->post->post_title : $snes_loop->post->ID); ?>">

          <?php woocommerce_show_product_sale_flash( $post, $product ); ?>

          <?php if (has_post_thumbnail( $snes_loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>

          <h3 ><?php the_title(); ?></h3>

          <span class="price"><?php echo $product->get_price_html(); ?></span>                    

        </a>

        <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>

      </li>

    <?php endwhile; ?>

    <?php wp_reset_query(); ?>

  </ul>

<?php
}

// Counts the resuts for the Genesis page
function sega_result_count() {

  $args = array( 
    'post_type' => 'product', 
    'posts_per_page' => 12, 
    'product_cat' => 'sega', 
    'orderby' => 'rand' 
  );

  $snes_loop = new WP_Query( $args );
  ?>

  <p class="snes-count"><?php
    $paged    = max( 1, $snes_loop->get( 'paged' ) );
    $per_page = $snes_loop->get( 'posts_per_page' );
    $total    = $snes_loop->found_posts;
    $first    = ( $per_page * $paged ) - $per_page + 1;
    $last     = min( $total, $snes_loop->get( 'posts_per_page' ) * $paged );

    if ( $total <= $per_page || -1 === $per_page ) {
      printf( _n( 'Showing the single result', 'Showing all %d results', $total, 'woocommerce' ), $total );
    } else {
      printf( _nx( 'Showing the single result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, '%1$d = first, %2$d = last, %3$d = total', 'woocommerce' ), $first, $last, $total );
    }
    ?>
  </p>
<?php
}

// Displays snes games on the SNES page
function sega_loop() {

  $args = array( 
    'post_type' => 'product', 
    'posts_per_page' => 12, 
    'product_cat' => 'sega', 
    'orderby' => 'rand' 
  );

  $snes_loop = new WP_Query( $args );
   
  wc_product_post_class();
  ?>

  <ul class="products">
   
    <?php while ( $snes_loop->have_posts() ) : $snes_loop->the_post(); global $product; ?>

      <li class="product">    

        <a href="<?php echo get_permalink( $snes_loop->post->ID ) ?>" title="<?php echo esc_attr($snes_loop->post->post_title ? $snes_loop->post->post_title : $snes_loop->post->ID); ?>">

          <?php woocommerce_show_product_sale_flash( $post, $product ); ?>

          <?php if (has_post_thumbnail( $snes_loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>

          <h3 ><?php the_title(); ?></h3>

          <span class="price"><?php echo $product->get_price_html(); ?></span>                    

        </a>

        <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>

      </li>

    <?php endwhile; ?>

    <?php wp_reset_query(); ?>

  </ul>

<?php
}

function game_condition_fields() {

  global $post;
  $product_cat = get_the_terms($post->ID, 'product_cat');

  foreach ( $product_cat as $cat ) {
    $current_cat = $cat->slug;
    }
  if ( $current_cat == 'snes-games' || $current_cat == 'sega-games' || $current_cat == 'nes-games') {
    ?>
    <h5 class="cond-label">Cart Condition: <?php the_field('cart_condition'); ?></h5>
    <h5 class="cond-label">Label Condition: <?php the_field('label_condition'); ?></h5>
    <?php
  }
}
add_action( 'woocommerce_single_product_summary', 'game_condition_fields', 9);

function playthrough_link_field() {

  global $post;
  $product_cat = get_the_terms($post->ID, 'product_cat');

  foreach ( $product_cat as $cat ) {
    $current_cat = $cat->slug;
    }
  if ( $current_cat == 'snes-games' || $current_cat == 'sega-games' || $current_cat == 'nes-games') {
    ?>
    <h5 class="cond-label">View Our Playthrough: <?php the_field('view_our_playthrough'); ?></h5>
    <?php
  }
}
add_action( 'woocommerce_single_product_summary', 'playthrough_link_field', 9);

function wpt_footer_cart_link() {

  global $woocommerce;

  if ( (sizeof( $woocommerce->cart->cart_contents) > 0) && ( !is_cart() && !is_checkout() ) ) :
    echo '<a class="btn alt" href="' . $woocommerce->cart->get_cart_url() . '" title="' . __( 'Cart' ) . '">' . __( 'Cart' ) . '</a>';
    echo '<a class="btn" href="' . $woocommerce->cart->get_checkout_url() . '" title="' . __( 'Checkout' ) . '">' . __( 'Checkout' ) . '</a>';
  endif;

}
  
function unset_shipping_when_free_is_available_all_zones( $rates, $package ) {
     
  $all_free_rates = array();
   
  foreach ( $rates as $rate_id => $rate ) {
    if ( 'free_shipping' === $rate->method_id ) {
      $all_free_rates[ $rate_id ] = $rate;
      break;
    }
  }
   
  if ( empty( $all_free_rates )) {
    return $rates;
  } else {
    return $all_free_rates;
  } 
}
add_filter( 'woocommerce_package_rates', 'unset_shipping_when_free_is_available_all_zones', 10, 2);

// Display 12 products per page. 
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

// Change number or products per row to 3
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3; // 3 products per row
  }
}
add_filter('loop_shop_columns', 'loop_columns');

function wpt_custom_billing_fields( $fields = array() ) {

  unset( $fields['billing_company'] );
  unset( $fields['billing_phone'] );

  return $fields;

}
add_filter( 'woocommerce_billing_fields', 'wpt_custom_billing_fields' );

function wpt_excerpt_length( $length ) {
  return 16;
}
add_filter( 'excerpt_length', 'wpt_excerpt_length', 999 );

function register_theme_menus() {

  register_nav_menus(
    array(
      'primary-menu' => __( 'Primary Menu' ),
      'company-menu' => __( 'Company Menu' ),
      'game-menu' => __( 'Game Menu' )
    )
  );
}
add_action( 'init', 'register_theme_menus' );

function wpt_create_widget( $name, $id, $description ) {

  register_sidebar(array(
    'name' => __( $name ),   
    'id' => $id, 
    'description' => __( $description ),
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="module-heading">',
    'after_title' => '</h2>'
  ));

}

wpt_create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar' );
wpt_create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );
wpt_create_widget( 'Nes Sidebar', 'nes', 'Displays on the side of pages in the nes section' );
wpt_create_widget( 'Shop Sidebar', 'shop', 'Displays on the side of pages in the shop section' );
wpt_create_widget( 'SNES Sidebar', 'snes', 'Displays on the side of pages in the snes section' );
wpt_create_widget( 'Sega Sidebar', 'sega', 'Displays on the side of pages in the sega section' );
wpt_create_widget( 'Head Sidebar', 'head', 'Displays on the header of pages' );

function wpt_theme_styles() {

  wp_enqueue_style( 'foundation_css', get_template_directory_uri() . '/css/foundation.css' );
  wp_enqueue_style( 'foundation_fonts', get_template_directory_uri() . '/css/foundation-icons/foundation-icons.css' );
  wp_enqueue_style( 'googlefont_css', 'http://fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic' );
  wp_enqueue_style( 'googlefont_atomic', 'https://fonts.googleapis.com/css?family=Atomic+Age' );
  wp_enqueue_style( 'googlefont_titillium', 'https://fonts.googleapis.com/css?family=Titillium+Web' );
  wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'wpt_theme_styles' );

function wpt_theme_js() {

  wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/js/modernizr.js', '', '', false );  
  wp_enqueue_script( 'foundation_js', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '', true );
  wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/app.js', array('jquery', 'foundation_js'), '', true );    

}
add_action( 'wp_enqueue_scripts', 'wpt_theme_js' );

//add_filter( 'show_admin_bar', '__return_false' );

?>
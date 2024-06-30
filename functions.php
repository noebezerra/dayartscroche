<?php 

function dayartscroche_add_woocommerce_support() {
  add_theme_support( 'woocommerce');
}
add_action('after_setup_theme', 'dayartscroche_add_woocommerce_support');

function dayartscroche_css() {
  wp_register_style('dayartscroche-style', get_template_directory_uri() . '/style.css', [], '1.0.0');
  wp_enqueue_style('dayartscroche-style');
}
add_action('wp_enqueue_scripts', 'dayartscroche_css');

function dayartscroche_js() {
  wp_register_script('dayartscroche-script', get_template_directory_uri() . '/js/script.js', [], '1.0.0', true);
  wp_enqueue_script('dayartscroche-script');
}
add_action('wp_enqueue_scripts', 'dayartscroche_js');

function dayartscroche_custom_image() {
  add_image_size('slide', 1000, 800, ['center', 'top']);
  update_option('medium_crop', 1);
}
do_action('after_setup_theme', 'dayartscroche_custom_image');

function dayartscroche_loop_shop_per_page() {
  return 6;
}
add_filter('loop_shop_per_page', 'dayartscroche_loop_shop_per_page');

function remove_some_body_class($classes){
  $woo_class = array_search('woocommerce', $classes);
  $woopage_class = array_search('woocommerce-page', $classes);
  $search = in_array('archive', $classes) || in_array('product-template-default', $classes);
  if ($woo_class && $woopage_class && $search) {
    unset($classes[$woo_class]);
    unset($classes[$woopage_class]);
  }
  return $classes;
}
add_filter('body_class', 'remove_some_body_class');

function format_products($products, $img_size = 'medium') {
  $products_final = [];
  foreach ($products as $product) {
    $products_final[] = [
      'name' => $product->get_name(),
      'price' => $product->get_price_html(),
      'link' => $product->get_permalink(),
      'img' => wp_get_attachment_image_src($product->get_image_id(), $img_size)[0],
    ];
  }
  return $products_final;
}

function dayartscroche_product_list($products) { ?>
  <ul class="products-list">
    <?php foreach ($products as $product): ?>
      <li class="product-item">
        <a href="<?= $product['link'] ?>">
          <div class="product-info">
            <img src="<?= $product['img'] ?>" alt="<?= $product['name'] ?>">
            <h2><?= $product['name'] ?></h2>
          </div>
          <div class="product-overlay">
            <span class="btn-link">Ver mais</span>
          </div>
        </a>
        <div class="product-footer">
          <?= $product['price'] ?>
          <!-- <a class="btn-add-cart">Comprar</a> -->
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
<?php }

// barra de administrador wordpress
// add_filter( 'show_admin_bar', '__return_true');


include(get_template_directory().'/inc/user-custom-menu.php');


?>
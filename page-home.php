<?php
  // Template Name: Home
  get_header();

  $products_slide = wc_get_products([
    'limit' => 6,
    'tag' => ['slide'],
  ]);

  $products_new = wc_get_products([
    'limit' => 9,
    'orderby' => 'date',
    'order' => 'DESC',
  ]);

  $products_sales = wc_get_products([
    'limit' => 9,
    'meta_key' => 'total_sales',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
  ]);

  $data = [];
  // $data['slide'] = format_products($products_slide, 'slide');
  $data['lancamentos'] = format_products($products_new);
  // $data['vendidos'] = format_products($products_sales);
?>

<section class="container-index about-home" style="text-align: center">
  <div>
    <img src="<?php echo get_stylesheet_directory_uri().'/img/icons/hand.svg'; ?>" alt="">
    <p>Peças feitas a mão</p>
  </div>
  <div>
    <img src="<?php echo get_stylesheet_directory_uri().'/img/icons/parts.svg' ?>" alt="">
    <p>Sob demanda</p>
  </div>
</section>
<div style="clear: both;"></div>
<section class="container">

<?php if (have_posts()) { while (have_posts()) { the_post(); ?>
  <!-- <h1 class="subtitulo">Lançamentos</h1> -->
  <?php dayartscroche_product_list($data['lancamentos']); ?>
<?php }} ?>  <!-- fecha if e while -->

</section>

<?php get_footer(); ?>

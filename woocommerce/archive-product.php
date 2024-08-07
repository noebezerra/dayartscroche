<?php get_header(); ?>

<?php 
$products = [];
if (have_posts()) { while (have_posts()) { the_post();
  $products[] = wc_get_product(get_the_ID());
}} 
$data = [];
$data['products'] = format_products($products);
?>

<div class="container breadcrumb">
  <?php woocommerce_breadcrumb(['delimiter' => ' > ']); ?>
</div>

<article class="container products-archive">
  <nav class="filtros">
    <h2>Filtros</h2>
  </nav>
  <main>
    <?php 
    if (count($data['products'])) {
      woocommerce_catalog_ordering();
      dayartscroche_product_list($data['products']);
      echo get_the_posts_pagination();
    } else { ?>
      <p>Nenhum resultado encontrado.</p>
    <?php } ?>
  </main>
</article>

<?php get_footer(); ?>

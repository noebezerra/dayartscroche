<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name'); ?><?php wp_title(' | '); ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@200;300;400;600&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
  <div class="container">
    <div class="busca">
      <form action="<?php bloginfo('url'); ?>/shop/" method="get">
        <input type="text" name="s" id="s" placeholder="Buscar" value="<?php the_search_query(); ?>">
        <input class="hidden" type="text" name="post_type" value="product">
        <input id="searchbutton" type="submit" value="Buscar">
      </form>
    </div>
    <a href="/"><img src="<?php echo get_stylesheet_directory_uri().'/img/dayartscroche-logo.svg'; ?>" alt=""></a>
    <nav class="conta">
      <a href="/minha-conta" class="minha-conta">Minha conta</a>
      <a href="/carrinho" class="carrinho">Carrinho
        <?php if ($cart_count = WC()->cart->get_cart_contents_count()): ?>
        <span class="carrinho-count"><?php echo $cart_count; ?></span>
        <?php endif; ?>
      </a>
    </nav>
  </div>
</header>
<div class="sep-detail"></div>
<?php
  wp_nav_menu([
    'menu' => 'categorias',
    'container' => 'nav',
    'container_class' => 'menu-categorias',
  ])
?>

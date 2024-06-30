<?php get_header(); ?>

<?php 
if (have_posts()) {
  while (have_posts()) {
    the_post();
  ?>
  <div class="container">
    <h1 class="titulo"><?php the_title(); ?></h1>
    <main class="container-index"><?php the_content(); ?></main>
  </div>

  <?php }} ?>

<?php get_footer(); ?>

<?php

function dayartscroche_custom_menu($menu_itens) {
  unset($menu_itens['downloads']);
  return $menu_itens;
}

add_filter('woocommerce_account_menu_items', 'dayartscroche_custom_menu');

?>
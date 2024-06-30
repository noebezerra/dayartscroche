<section class="orcamento">
  <h6>Seu crochê do seu jeito</h6>
  <button class="btn-orcamento">Orçamento</button>
</section>
<footer>
  <div class="container footer-info">
    <section>
      <?php
        wp_nav_menu([
          'menu' => 'footer',
          'container' => 'nav',
          'container_class' => 'footer-menu',
        ]);
      ?>
    </section>
    <section>
      <h3>Nos acompanhe</h3>
      <?php
        wp_nav_menu([
          'menu' => 'redes',
          'container' => 'nav',
          'container_class' => 'footer-redes',
        ]);
      ?>
    </section>
    <section>
      <h3>Meios de pagamento</h3>
      
    </section>
  </div>
  <small class="footer-copy" style="text-align: center; padding: 60px;">Feito com <span style="color: red">❤︎</span> e <span style="color: #e69211">crochê</span></small>
</footer>

<?php wp_footer(); ?>

</body>
</html>
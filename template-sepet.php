<?php
/*
Template Name: Sepet Şablonu
*/
get_header(); ?>

<main class="cart-page" style="padding: 40px 0;">
    <div class="container" style="max-width: 1000px; margin: 0 auto;">
        <h1 class="cart-title" style="text-align: center; font-size: 32px; margin-bottom: 30px;">
            🛒 Sepetim
        </h1>

        <div class="cart-wrapper" style="background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
            <?php echo do_shortcode('[woocommerce_cart]'); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>

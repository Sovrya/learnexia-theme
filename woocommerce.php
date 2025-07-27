<?php
/**
 * Template Name: WooCommerce Shop Page
 * Description: Learnexia teması için özel Woocommerce sayfa şablonu
 */

get_header(); ?>

<main class="shop-page">
    <section class="shop-hero">
        <div class="container">
            <h1 class="shop-title"><?php the_title(); ?></h1>
            <p class="shop-subtitle">Gizemli görevlerin ekipmanları burada seni bekliyor!</p>
        </div>
    </section>

    <section class="shop-products container">
        <?php woocommerce_content(); ?>
    </section>
</main>

<?php get_footer(); ?>
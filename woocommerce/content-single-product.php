<?php
defined('ABSPATH') || exit;
global $product;

do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form();
    return;
}
?>

<section id="product-<?php the_ID(); ?>" <?php wc_product_class('df-single container', $product); ?>>

    <!-- === ÜRÜN ÜST BLOK === -->
    <div class="df-product-content">

        <!-- === Sol: Galeri === -->
        <div class="df-gallery">
            <?php
                // Ürün görselleri ve galerisi
                do_action('woocommerce_before_single_product_summary');
            ?>
        </div>

        <!-- === Sağ: Bilgi === -->
        <div class="df-summary">
            <h1 class="df-title"><?php the_title(); ?></h1>

            <div class="df-price">
                <?php echo $product->get_price_html(); ?>
            </div>

            <div class="df-short-desc">
                <?php echo apply_filters('woocommerce_short_description', $post->post_excerpt); ?>
            </div>

            <div class="df-cart">
                <?php woocommerce_template_single_add_to_cart(); ?>
            </div>

            <div class="df-meta">
                <?php woocommerce_template_single_meta(); ?>
            </div>
        </div>
    </div>

    <!-- === ALT: SADECE Sekmeler (Açıklama, Ek bilgi, Yorumlar) === -->
    <div class="df-product-tabs">
        <?php woocommerce_output_product_data_tabs(); ?>
    </div>
</section>

<?php do_action('woocommerce_after_single_product'); ?>

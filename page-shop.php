<?php
/* Template Name: Mağaza Sayfası */
get_header(); ?>

<main class="shop-page container" style="padding: 40px 0;">

    <!-- DİNAMİK BAŞLIK -->
    <h1 class="shop-title" style="text-align: center; font-size: 32px; margin-bottom: 20px;">
        <?php echo esc_html(get_theme_mod('magaza_baslik', '🎓 Tüm Eğitim Paketleri')); ?>
    </h1>

    <!-- DİNAMİK ALT AÇIKLAMA -->
    <?php
    $aciklama = get_theme_mod('magaza_aciklama');
    if (!empty($aciklama)) {
        echo '<p style="text-align:center; max-width:700px; margin: 0 auto 40px; color:#555;">' . esc_html($aciklama) . '</p>';
    }
    ?>

    <!-- ÜRÜNLER -->
    <section class="products-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">

        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1
        );
        $loop = new WP_Query($args);

        while ($loop->have_posts()) : $loop->the_post();
            global $product;

            // Customizer renk değerleri
            $bg_color      = get_theme_mod('magaza_urun_bg', '#ffffff');
            $title_color   = get_theme_mod('magaza_urun_baslik_renk', '#222222');
            $price_color   = get_theme_mod('magaza_fiyat_renk', '#27ae60');
            $button_bg     = get_theme_mod('magaza_buton_arka_renk', '#0073aa');
            $button_color  = get_theme_mod('magaza_buton_yazi_renk', '#ffffff');
            ?>

            <div class="product-card"
                 style="background: <?php echo esc_attr($bg_color); ?>;
                        border-radius: 10px;
                        padding: 20px;
                        text-align: center;
                        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
                        transition: transform 0.2s;">

                <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit;">
                    <div style="margin-bottom: 15px;">
                        <?php echo $product->get_image('medium'); ?>
                    </div>
                    <h2 style="font-size: 18px; margin-bottom: 10px; color: <?php echo esc_attr($title_color); ?>;">
                        <?php the_title(); ?>
                    </h2>
                </a>

                <p class="price"
                   style="font-size: 16px; font-weight: bold; color: <?php echo esc_attr($price_color); ?>; margin-bottom: 15px;">
                    <?php echo $product->get_price_html(); ?>
                </p>

                <a href="?add-to-cart=<?php echo $product->get_id(); ?>" class="add-to-cart-button"
                   style="display: inline-block;
                          background-color: <?php echo esc_attr($button_bg); ?>;
                          color: <?php echo esc_attr($button_color); ?>;
                          padding: 10px 20px;
                          border-radius: 6px;
                          font-size: 14px;
                          text-decoration: none;">
                    Sepete Ekle
                </a>
            </div>

        <?php endwhile;
        wp_reset_postdata(); ?>

    </section>
</main>

<?php get_footer(); ?>

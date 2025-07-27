
<?php

// ------------------------------
// MENÜLER
// ------------------------------
function learnexia_register_menus() {
    register_nav_menus(array(
        'main-menu'   => __('Ana Menü', 'learnexia'),
        'footer-menu' => __('Alt Menü', 'learnexia')
    ));
}
add_action('init', 'learnexia_register_menus');

// ------------------------------
// FONT AWESOME YÜKLE
// ------------------------------
function load_fontawesome() {
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'load_fontawesome');

// ------------------------------
// TEMA CSS YÜKLE
// ------------------------------
function learnexia_enqueue_styles() {
    wp_enqueue_style('theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'learnexia_enqueue_styles');

// ------------------------------
// CUSTOMIZER AYARLARI
// ------------------------------
function learnexia_customize_register($wp_customize) {
    // ---------------- LOGO ve RENK ----------------
    $wp_customize->add_setting('learnexia_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'learnexia_logo', array(
        'label'    => __('Site Logosu', 'learnexia'),
        'section'  => 'title_tagline',
        'settings' => 'learnexia_logo',
        'priority' => 8,
    )));

    $wp_customize->add_setting('learnexia_bg_color', array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'learnexia_bg_color', array(
        'label'   => __('Arka Plan Rengi', 'learnexia'),
        'section' => 'colors',
    )));

    $wp_customize->add_setting('learnexia_menu_font', array('default' => 'Open Sans'));
    $wp_customize->add_control('learnexia_menu_font', array(
        'label'   => __('Menü Yazı Tipi', 'learnexia'),
        'section' => 'title_tagline',
        'type'    => 'select',
        'choices' => array(
            'Open Sans'     => 'Open Sans',
            'Roboto'        => 'Roboto',
            'Lato'          => 'Lato',
            'Montserrat'    => 'Montserrat',
            'Poppins'       => 'Poppins',
        ),
    ));

    // ---------------- HERO ----------------
    $wp_customize->add_section('hero_alani', array(
        'title' => 'Hero Alanı',
        'priority' => 100,
    ));
    $wp_customize->add_setting('hero_baslik', array('default' => 'Gizemi Keşfet, Bilgiyi Edin'));
    $wp_customize->add_control('hero_baslik', array(
        'label' => 'Başlık',
        'section' => 'hero_alani',
    ));
    $wp_customize->add_setting('hero_aciklama', array('default' => 'Learnexia Akademi ile kendi serüvenine çık...'));
    $wp_customize->add_control('hero_aciklama', array(
        'label' => 'Açıklama',
        'section' => 'hero_alani',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting('hero_buton_metni', array('default' => 'Mağazayı Keşfet'));
    $wp_customize->add_control('hero_buton_metni', array(
        'label' => 'Buton Metni',
        'section' => 'hero_alani',
    ));
    $wp_customize->add_setting('hero_buton_link', array('default' => '/magaza'));
    $wp_customize->add_control('hero_buton_link', array(
        'label' => 'Buton Linki',
        'section' => 'hero_alani',
    ));
    $wp_customize->add_setting('hero_gorsel');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_gorsel', array(
        'label' => 'Görsel',
        'section' => 'hero_alani',
    )));

    // ---------------- NEDEN BİZ ----------------
    $wp_customize->add_section('nedenbiz_alani', array(
        'title' => 'Neden Learnexia Akademi?',
        'priority' => 110,
    ));
    $wp_customize->add_setting('nedenbiz_baslik', array(
        'default' => 'Neden Learnexia Akademi?',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('nedenbiz_baslik', array(
        'label' => 'Bölüm Başlığı',
        'section' => 'nedenbiz_alani',
    ));
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("nedenbiz_{$i}_gorsel");
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "nedenbiz_{$i}_gorsel", array(
            'label' => "Kart {$i} Görsel",
            'section' => 'nedenbiz_alani',
        )));
        $wp_customize->add_setting("nedenbiz_{$i}_baslik", array('default' => "Kart {$i} Başlık"));
        $wp_customize->add_control("nedenbiz_{$i}_baslik", array(
            'label' => "Kart {$i} Başlık",
            'section' => 'nedenbiz_alani',
        ));
        $wp_customize->add_setting("nedenbiz_{$i}_aciklama", array('default' => "Kart {$i} Açıklama"));
        $wp_customize->add_control("nedenbiz_{$i}_aciklama", array(
            'label' => "Kart {$i} Açıklama",
            'section' => 'nedenbiz_alani',
            'type' => 'textarea',
        ));
    }

    // ---------------- FOOTER ----------------
    $wp_customize->add_section('footer_alani', array(
        'title'    => 'Alt Bilgi (Footer)',
        'priority' => 200,
    ));
    $wp_customize->add_setting('footer_col1_title', ['default' => 'Learnexia Akademi']);
    $wp_customize->add_control('footer_col1_title', [
        'label' => 'Sütun 1 - Başlık',
        'section' => 'footer_alani',
    ]);
    $wp_customize->add_setting('footer_col1_text', [
        'default' => 'Gizemli dünyaları keşfetmek isteyenler için hazırlanmış bir eğitim platformudur.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('footer_col1_text', [
        'label' => 'Sütun 1 - Açıklama',
        'section' => 'footer_alani',
        'type' => 'textarea',
    ]);
    $wp_customize->add_setting('footer_col2_title', ['default' => 'Menü']);
    $wp_customize->add_control('footer_col2_title', [
        'label' => 'Sütun 2 - Başlık',
        'section' => 'footer_alani',
    ]);
    $wp_customize->add_setting('footer_col3_title', ['default' => 'İletişim']);
    $wp_customize->add_control('footer_col3_title', [
        'label' => 'Sütun 3 - Başlık',
        'section' => 'footer_alani',
    ]);
    $wp_customize->add_setting('footer_email', ['default' => 'ferattas@adbridger.com']);
    $wp_customize->add_control('footer_email', [
        'label' => 'İletişim E-posta',
        'section' => 'footer_alani',
        'type' => 'email',
    ]);
    $wp_customize->add_setting('footer_tel', ['default' => '+90 555 555 55 55']);
    $wp_customize->add_control('footer_tel', [
        'label' => 'İletişim Telefon',
        'section' => 'footer_alani',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('footer_copyright', [
        'default' => 'Learnexia. Tüm hakları saklıdır.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('footer_copyright', [
        'label' => 'Telif Yazısı',
        'section' => 'footer_alani',
    ]);
}
add_action('customize_register', 'learnexia_customize_register');

// ------------------------------
// CUSTOMIZER: İletişim Sayfası
// ------------------------------
function learnexia_customize_iletisim($wp_customize) {
    $wp_customize->add_section('iletisim_sayfasi_alani', array(
        'title'    => 'İletişim Sayfası',
        'priority' => 130,
    ));

    $wp_customize->add_setting('iletisim_baslik', array(
        'default' => 'İletişim Formu',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('iletisim_baslik', array(
        'label'   => 'Sayfa Başlığı',
        'section' => 'iletisim_sayfasi_alani',
    ));

    $wp_customize->add_setting('iletisim_aciklama', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('iletisim_aciklama', array(
        'label'   => 'Alt Açıklama',
        'section' => 'iletisim_sayfasi_alani',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('iletisim_arka_plan', array(
        'default' => '#ffffff',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'iletisim_arka_plan', array(
        'label'   => 'Form Arka Plan Rengi',
        'section' => 'iletisim_sayfasi_alani',
    )));
}
add_action('customize_register', 'learnexia_customize_iletisim');

// ------------------------------
// CUSTOMIZER: Mağaza Sayfası
// ------------------------------
function learnexia_customize_magaza($wp_customize) {
    $wp_customize->add_section('magaza_sayfasi_alani', array(
        'title'       => 'Mağaza Sayfası',
        'priority'    => 140,
        'description' => 'Mağaza sayfasındaki görsel öğeleri özelleştirin.'
    ));

    // Başlık
    $wp_customize->add_setting('magaza_baslik', array(
        'default'           => '🎓 Tüm Eğitim Paketleri',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('magaza_baslik', array(
        'label'   => 'Sayfa Başlığı',
        'section' => 'magaza_sayfasi_alani',
        'type'    => 'text',
    ));

    // Alt Açıklama
    $wp_customize->add_setting('magaza_aciklama', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('magaza_aciklama', array(
        'label'   => 'Alt Açıklama',
        'section' => 'magaza_sayfasi_alani',
        'type'    => 'textarea',
    ));

    // Ürün Kart Arka Plan Rengi
    $wp_customize->add_setting('magaza_urun_bg', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'magaza_urun_bg', array(
        'label'   => 'Ürün Kartı Arka Planı',
        'section' => 'magaza_sayfasi_alani',
    )));

    // Ürün Başlığı Rengi
    $wp_customize->add_setting('magaza_urun_baslik_renk', array(
        'default'           => '#222222',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'magaza_urun_baslik_renk', array(
        'label'   => 'Ürün Başlığı Rengi',
        'section' => 'magaza_sayfasi_alani',
    )));

    // Fiyat Rengi
    $wp_customize->add_setting('magaza_fiyat_renk', array(
        'default'           => '#27ae60',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'magaza_fiyat_renk', array(
        'label'   => 'Fiyat Rengi',
        'section' => 'magaza_sayfasi_alani',
    )));

    // Buton Arka Plan Rengi
    $wp_customize->add_setting('magaza_buton_arka_renk', array(
        'default'           => '#0073aa',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'magaza_buton_arka_renk', array(
        'label'   => 'Buton Arka Plan Rengi',
        'section' => 'magaza_sayfasi_alani',
    )));

    // Buton Yazı Rengi
    $wp_customize->add_setting('magaza_buton_yazi_renk', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'magaza_buton_yazi_renk', array(
        'label'   => 'Buton Yazı Rengi',
        'section' => 'magaza_sayfasi_alani',
    )));
}
add_action('customize_register', 'learnexia_customize_magaza');


// ------------------------------
// İLETİŞİM FORMU GÖNDERME
// ------------------------------
function learnexia_iletisim_formu_isle() {
    if (
        isset($_POST['name'], $_POST['email'], $_POST['message']) &&
        empty($_POST['website'])
    ) {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);

        $to = get_option('admin_email');
        $subject = 'İletişim Formu: ' . $name;
        $headers = ['Content-Type: text/plain; charset=UTF-8', 'From: '.$name.' <'.$email.'>'];
        $body = "Ad: $name\nE-posta: $email\n\nMesaj:\n$message";

        if (wp_mail($to, $subject, $body, $headers)) {
            wp_redirect(add_query_arg('durum', 'ok', wp_get_referer()));
        } else {
            wp_redirect(add_query_arg('durum', 'hata', wp_get_referer()));
        }
    } else {
        wp_redirect(add_query_arg('durum', 'eksik', wp_get_referer()));
    }
    exit;
}
add_action('admin_post_iletisim_formu_gonder', 'learnexia_iletisim_formu_isle');
add_action('admin_post_nopriv_iletisim_formu_gonder', 'learnexia_iletisim_formu_isle');

function learnexia_customize_cart_full($wp_customize) {
    $wp_customize->add_section('cart_full_settings', array(
        'title'    => 'Sepet Sayfası (Tam Ayar)',
        'priority' => 160,
    ));

    // Başlık
    $wp_customize->add_setting('cart_title', ['default' => '🛒 Sepetim']);
    $wp_customize->add_control('cart_title', [
        'label' => 'Sayfa Başlığı',
        'section' => 'cart_full_settings',
        'type' => 'text',
    ]);

    // Arka Plan
    $wp_customize->add_setting('cart_bg_color', ['default' => '#f9f9f9']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cart_bg_color', [
        'label' => 'Arka Plan Rengi',
        'section' => 'cart_full_settings',
    ]));

    // Ürün adı yazı rengi
    $wp_customize->add_setting('cart_product_title_color', ['default' => '#222222']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cart_product_title_color', [
        'label' => 'Ürün Adı Rengi',
        'section' => 'cart_full_settings',
    ]));

    // Ürün adı fontu
    $wp_customize->add_setting('cart_product_font', ['default' => 'Open Sans']);
    $wp_customize->add_control('cart_product_font', [
        'label' => 'Ürün Adı Fontu',
        'section' => 'cart_full_settings',
        'type' => 'select',
        'choices' => [
            'Open Sans' => 'Open Sans',
            'Roboto' => 'Roboto',
            'Lato' => 'Lato',
            'Poppins' => 'Poppins',
            'Montserrat' => 'Montserrat',
        ],
    ]);

    // Fiyat rengi
    $wp_customize->add_setting('cart_price_color', ['default' => '#27ae60']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cart_price_color', [
        'label' => 'Fiyat Rengi',
        'section' => 'cart_full_settings',
    ]));

    // Sepeti Güncelle Buton Metni
    $wp_customize->add_setting('cart_update_btn_text', ['default' => 'Sepeti Güncelle']);
    $wp_customize->add_control('cart_update_btn_text', [
        'label' => 'Güncelle Butonu Yazısı',
        'section' => 'cart_full_settings',
    ]);

    // Buton Arka Plan
    $wp_customize->add_setting('cart_btn_bg', ['default' => '#0073aa']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cart_btn_bg', [
        'label' => 'Buton Arka Plan Rengi',
        'section' => 'cart_full_settings',
    ]));

    // Buton Yazı Rengi
    $wp_customize->add_setting('cart_btn_text_color', ['default' => '#ffffff']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cart_btn_text_color', [
        'label' => 'Buton Yazı Rengi',
        'section' => 'cart_full_settings',
    ]));

    // Sil (❌) ikon rengi
    $wp_customize->add_setting('cart_remove_icon_color', ['default' => '#e74c3c']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cart_remove_icon_color', [
        'label' => 'Sil (❌) İkonu Rengi',
        'section' => 'cart_full_settings',
    ]));

    // Sil (❌) ikon metni
    $wp_customize->add_setting('cart_remove_icon_text', ['default' => '❌']);
    $wp_customize->add_control('cart_remove_icon_text', [
        'label' => 'Sil İkonu',
        'section' => 'cart_full_settings',
        'type' => 'text',
    ]);
}
add_action('customize_register', 'learnexia_customize_cart_full');

function learnexia_cart_custom_styles() {
    ?>
    <style>
        .cart-container {
            background-color: <?php echo get_theme_mod('cart_bg_color', '#f9f9f9'); ?>;
        }
        .cart-product-wrapper .cart-title a {
            color: <?php echo get_theme_mod('cart_product_title_color', '#222222'); ?>;
            font-family: "<?php echo get_theme_mod('cart_product_font', 'Open Sans'); ?>", sans-serif;
        }
        .shop_table .cart td:nth-child(2), /* Fiyat sütunu */
        .shop_table .cart td:nth-child(4) {
            color: <?php echo get_theme_mod('cart_price_color', '#27ae60'); ?>;
        }
        .cart-actions .button {
            background-color: <?php echo get_theme_mod('cart_btn_bg', '#0073aa'); ?>;
            color: <?php echo get_theme_mod('cart_btn_text_color', '#ffffff'); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'learnexia_cart_custom_styles');

// CUSTOMIZER: Sepet Ödeme Butonu Ayarları
function learnexia_customize_checkout_button($wp_customize) {
    $wp_customize->add_section('cart_checkout_button_settings', array(
        'title'    => 'Sepet: Ödeme Butonu',
        'priority' => 170,
    ));

    $wp_customize->add_setting('checkout_btn_text', ['default' => 'Ödeme sayfasına git']);
    $wp_customize->add_control('checkout_btn_text', [
        'label' => 'Buton Yazısı',
        'section' => 'cart_checkout_button_settings',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('checkout_btn_bg', ['default' => '#8e44ad']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'checkout_btn_bg', [
        'label' => 'Buton Arka Plan Rengi',
        'section' => 'cart_checkout_button_settings',
    ]));

    $wp_customize->add_setting('checkout_btn_text_color', ['default' => '#ffffff']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'checkout_btn_text_color', [
        'label' => 'Buton Yazı Rengi',
        'section' => 'cart_checkout_button_settings',
    ]));
}
add_action('customize_register', 'learnexia_customize_checkout_button');

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

    <?php
    // Google Font yükle
    $google_font = get_theme_mod('learnexia_menu_font', 'Poppins');
    echo '<link href="https://fonts.googleapis.com/css2?family=' . urlencode($google_font) . '&display=swap" rel="stylesheet">';
    wp_head();
    ?>

    <style>
        body {
            background-color: <?php echo get_theme_mod('learnexia_bg_color', '#ffffff'); ?>;
            font-family: '<?php echo esc_html($google_font); ?>', sans-serif;
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <div class="site-container">

        <header class="site-header">
            <div class="container header-flex">

                <!-- Logo -->
                <div class="logo">
                    <a href="<?php echo esc_url(home_url()); ?>">
                        <?php
                        $custom_logo = get_theme_mod('learnexia_logo');
                        if ($custom_logo) {
                            echo '<img src="' . esc_url($custom_logo) . '" alt="' . get_bloginfo('name') . '">';
                        } else {
                            echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/logo.png" alt="Learnexia Logo">';
                        }
                        ?>
                    </a>
                </div>

                <!-- Navigation -->
                <nav class="main-nav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'menu_class'     => 'nav-links',
                        'container'      => false,
                    ));
                    ?>

                    <!-- Mini Cart -->
                    <div class="header-cart">
                        <div class="mini-cart-wrapper">
                            <a class="cart-icon" href="#" aria-label="Sepet">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                            </a>
                            <div class="mini-cart-dropdown">
                                <?php if (WC()->cart->is_empty()) : ?>
                                    <p class="empty-cart-msg">🛒 Sepetiniz şu anda boş.</p>
                                <?php else : ?>
                                    <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :
                                        $_product = $cart_item['data'];
                                        $product_name = $_product->get_name();
                                        $quantity = $cart_item['quantity'];
                                        $price = wc_price($_product->get_price());
                                        $permalink = $_product->is_visible() ? $_product->get_permalink($cart_item) : '';
                                    ?>
                                        <div class="woocommerce-mini-cart-item">
                                            <?php echo $permalink ? '<a href="' . esc_url($permalink) . '">' . esc_html($product_name) . '</a>' : esc_html($product_name); ?>
                                            <span class="mini-cart-item-qty">x<?php echo esc_html($quantity); ?> – <?php echo $price; ?></span>
                                            <form method="post" action="<?php echo esc_url(wc_get_cart_remove_url($cart_item_key)); ?>" style="display:inline;">
                                                <button type="submit" class="remove-item-button">❌</button>
                                            </form>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="mini-cart-buttons">
                                        <a href="<?php echo wc_get_cart_url(); ?>" class="button">🛍 Sepetim</a>
                                        <a href="<?php echo wc_get_checkout_url(); ?>" class="button">💳 Ödeme</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- User Menu -->
                    <div class="user-menu">
                        <?php if (is_user_logged_in()) :
                            $current_user = wp_get_current_user(); ?>
                            <div class="user-dropdown">
                                <span><i class="fas fa-user"></i> <?php echo esc_html($current_user->display_name); ?></span>
                                <ul class="dropdown-list">
                                    <li><a href="<?php echo esc_url(site_url('/egitimim')); ?>">📘 Eğitimlerim</a></li>
                                    <li><a href="<?php echo esc_url(wc_get_account_endpoint_url('orders')); ?>">🧾 Siparişlerim</a></li>
                                    <li><a href="<?php echo esc_url(wc_get_account_endpoint_url('edit-account')); ?>">👤 Hesap Bilgilerim</a></li>
                                    <li><a href="<?php echo esc_url(wp_logout_url(home_url())); ?>">🚪 Çıkış Yap</a></li>
                                </ul>
                            </div>
                        <?php else : ?>
                            <a href="<?php echo esc_url(site_url('/login')); ?>" aria-label="Giriş Yap"><i class="fas fa-user"></i></a>
                        <?php endif; ?>
                    </div>
                </nav>
            </div>
        </header>

        <!-- Sepet Açılır Menü Script -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const cartIcon = document.querySelector(".mini-cart-wrapper .cart-icon");
                const cartDropdown = document.querySelector(".mini-cart-dropdown");

                if (cartIcon && cartDropdown) {
                    cartIcon.addEventListener("click", function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        cartDropdown.classList.toggle("open");
                    });

                    document.addEventListener("click", function (e) {
                        if (!cartDropdown.contains(e.target) && !cartIcon.contains(e.target)) {
                            cartDropdown.classList.remove("open");
                        }
                    });
                }
            });
        </script>

    </div> <!-- .site-container sonu -->
    <?php wp_footer(); ?>
</body>
</html>

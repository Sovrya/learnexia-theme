<footer class="site-footer">
    <div class="container footer-content">

        <!-- Hakkımızda -->
        <div class="footer-column footer-about">
            <h4><?php echo esc_html(get_theme_mod('footer_col1_title', 'Learnexia Akademi')); ?></h4>
            <p><?php echo esc_html(get_theme_mod('footer_col1_text')); ?></p>
        </div>

        <!-- Menü -->
        <div class="footer-column footer-menu">
            <h4><?php echo esc_html(get_theme_mod('footer_col2_title', 'Menü')); ?></h4>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'container' => false,
                'menu_class' => 'footer-links',
                'fallback_cb' => function () {
                    echo '<ul class="footer-links">
                            <li><a href="/">Ana Sayfa</a></li>
                            <li><a href="/magaza">Mağaza</a></li>
                            <li><a href="/iletisim">İletişim</a></li>
                          </ul>';
                }
            ));
            ?>
        </div>

        <!-- İletişim -->
        <div class="footer-column footer-info">
            <h4><?php echo esc_html(get_theme_mod('footer_col3_title', 'İletişim')); ?></h4>
            <p><a href="mailto:<?php echo esc_attr(get_theme_mod('footer_email')); ?>">
                <?php echo esc_html(get_theme_mod('footer_email')); ?>
            </a></p>
            <p><a href="tel:<?php echo preg_replace('/\\D+/', '', get_theme_mod('footer_tel')); ?>">
                <?php echo esc_html(get_theme_mod('footer_tel')); ?>
            </a></p>
        </div>

    </div>

    <div class="container copyright">
        <p>&copy; <?php echo date("Y"); ?> Made with Sovira <br>
            <?php echo esc_html(get_theme_mod('footer_copyright')); ?>
        </p>
    </div>

    <?php wp_footer(); ?>
</footer>

<?php
/*
Template Name: İletişim Sayfası
*/
get_header();
?>

<main>
    <div class="container">
        <!-- Başlık -->
        <h2 style="text-align:center; margin-top: 60px;">
            <?php echo esc_html(get_theme_mod('iletisim_baslik', 'İletişim Formu')); ?>
        </h2>

        <!-- Açıklama -->
        <?php 
        $aciklama = get_theme_mod('iletisim_aciklama');
        if (!empty($aciklama)) {
            echo '<p style="text-align:center; max-width:600px; margin: 20px auto 40px; color:#666;">' . esc_html($aciklama) . '</p>';
        }
        ?>

        <!-- İçerik -->
        <div class="entry-content"
             style="max-width: 600px; margin: 40px auto; background: <?php echo esc_attr(get_theme_mod('iletisim_arka_plan', '#ffffff')); ?>; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">

            <!-- Durum mesajları -->
            <?php if (isset($_GET['durum'])) :
                $status = $_GET['durum'];
                $messages = [
                    'ok'    => '✅ Mesajınız başarıyla gönderildi.',
                    'hata'  => '❌ Mail gönderilirken bir hata oluştu.',
                    'eksik' => '⚠️ Lütfen tüm alanları doldurunuz.',
                ];
                if (isset($messages[$status])) :
                    echo '<div style="margin-bottom:20px; padding:12px; border-radius:6px; background:#f9f9f9; color:#333; border:1px solid #ccc;">' . $messages[$status] . '</div>';
                endif;
            endif; ?>

            <!-- İletişim Formu -->
            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" id="contactForm"
                  style="display:flex; flex-direction:column; gap:16px;">

                <!-- WordPress için action -->
                <input type="hidden" name="action" value="iletisim_formu_gonder">

                <label for="name">Ad Soyad:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">E-Posta:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Mesajınız:</label>
                <textarea id="message" name="message" rows="5" required></textarea>

                <!-- Honeypot field (bot kontrolü) -->
                <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off">

                <button type="submit"
                        style="background-color: #0073aa; color: white; border: none; padding: 12px; font-size: 16px; border-radius: 6px; cursor: pointer;">
                    Gönder
                </button>
            </form>
        </div>
    </div>
</main>

<?php get_footer(); ?>

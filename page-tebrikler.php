<?php
/*
Template Name: Tebrikler Sayfası
*/
get_header();
?>

<main class="thank-you-page">
    <div class="container" style="max-width:600px; margin:50px auto; text-align:center; padding:30px; background:#f8f9fa; border-radius:12px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
        <?php
        if (!isset($_GET['order_id'])) {
            echo '<p style="color: #e74c3c;">🚫 Sipariş bulunamadı.</p>';
        } else {
            $order_id = intval($_GET['order_id']);
            $order = wc_get_order($order_id);

            if (!$order) {
                echo '<p style="color: #e74c3c;">🚫 Geçersiz sipariş numarası.</p>';
            } else {
                ?>
                <h1 style="font-size:28px; color:#2ecc71;">🎉 Teşekkürler!</h1>
                <p style="font-size:18px; margin: 20px 0;">Siparişiniz başarıyla alındı.</p>
                <p><strong>Sipariş Numaranız:</strong> #<?php echo esc_html($order->get_order_number()); ?></p>
                <a href="<?php echo esc_url($order->get_view_order_url()); ?>" style="display:inline-block; margin-top:20px; background-color:#0073aa; color:white; padding:12px 24px; border-radius:6px; text-decoration:none;">Sipariş Detaylarını Görüntüle</a>
                <?php
            }
        }
        ?>
    </div>
</main>

<?php get_footer(); ?>

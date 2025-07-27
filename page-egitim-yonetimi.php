<?php
/* Template Name: Eğitim Yönetimi */
get_header();

// Sadece adminler görebilir
if (!current_user_can('manage_options')) {
    echo '<div class="container"><p>⛔ Bu sayfaya erişim izniniz yok.</p></div>';
    get_footer();
    exit;
}

// Dosya işlemleri için gerekli WordPress fonksiyonları
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');

// Form gönderildiğinde içerikleri kaydet
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = intval($_POST['egitim_id']);
    $video_url = esc_url_raw($_POST['video_url']);
    $dokuman_url = esc_url_raw($_POST['dokuman_url']);

    // Video dosyası yüklendiyse önceliklidir
    if (!empty($_FILES['video_file']['name'])) {
        $video_file_id = media_handle_upload('video_file', 0);
        if (!is_wp_error($video_file_id)) {
            $video_url = wp_get_attachment_url($video_file_id);
        }
    }

    // Döküman dosyası yüklendiyse önceliklidir
    if (!empty($_FILES['dokuman_file']['name'])) {
        $dokuman_file_id = media_handle_upload('dokuman_file', 0);
        if (!is_wp_error($dokuman_file_id)) {
            $dokuman_url = wp_get_attachment_url($dokuman_file_id);
        }
    }

    // post_meta olarak kaydet
    update_post_meta($product_id, 'egitim_video', $video_url);
    update_post_meta($product_id, 'egitim_dokuman', $dokuman_url);

    echo '<div class="success">✅ Eğitim içeriği başarıyla kaydedildi.</div>';
}

// WooCommerce ürünlerini al (eğitimler)
$egitimler = wc_get_products(['limit' => -1]);
?>

<div class="container">
    <h2>🎓 Eğitim İçerik Yönetimi</h2>
    <form method="post" enctype="multipart/form-data">
        <label><strong>Eğitim Seç:</strong></label>
        <select name="egitim_id" required>
            <?php foreach ($egitimler as $urun): ?>
                <option value="<?= $urun->get_id(); ?>"><?= $urun->get_name(); ?></option>
            <?php endforeach; ?>
        </select>

        <label><strong>Video Linki (YouTube/Vimeo/MP4):</strong></label>
        <input type="url" name="video_url" placeholder="https://...">

        <label><strong>veya Video Dosyası Yükle:</strong></label>
        <input type="file" name="video_file" accept="video/*">

        <label><strong>Döküman Linki (PDF, ZIP vs.):</strong></label>
        <input type="url" name="dokuman_url" placeholder="https://...">

        <label><strong>veya Döküman Dosyası Yükle:</strong></label>
        <input type="file" name="dokuman_file" accept=".pdf,.zip,.doc,.docx">

        <button type="submit">💾 Kaydet</button>
    </form>
</div>

<style>
.container {
  max-width: 700px;
  margin: 40px auto;
  padding: 20px;
  background: #fefefe;
  border-radius: 10px;
  box-shadow: 0 4px 16px rgba(0,0,0,0.08);
}

form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

input, select, button {
  padding: 12px;
  font-size: 16px;
  border-radius: 6px;
  border: 1px solid #ccc;
}

button {
  background-color: #2f8f5b;
  color: white;
  border: none;
  cursor: pointer;
  font-weight: bold;
  transition: background-color 0.2s ease;
}

button:hover {
  background-color: #24794b;
}

.success {
  background: #e3f9e5;
  color: #276738;
  padding: 12px;
  border-left: 5px solid #4CAF50;
  margin-top: 20px;
  border-radius: 6px;
}
</style>

<?php get_footer(); ?>

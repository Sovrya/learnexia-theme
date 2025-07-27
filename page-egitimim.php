<?php
/* Template Name: Eğitimim */
get_header();

if (!is_user_logged_in()) {
    echo '<div class="container"><p>🔒 Bu sayfayı görüntülemek için giriş yapmanız gerekiyor.</p></div>';
    get_footer();
    exit;
}

$current_user_id = get_current_user_id();

// Kullanıcının tamamlanmış siparişlerini al
$orders = wc_get_orders([
    'customer_id' => $current_user_id,
    'status' => 'completed',
    'limit' => -1,
]);

$education_ids = [];

foreach ($orders as $order) {
    foreach ($order->get_items() as $item) {
        $product_id = $item->get_product_id();
        if (!in_array($product_id, $education_ids)) {
            $education_ids[] = $product_id;
        }
    }
}
?>

<div class="container">
    <h2>📚 Aldığınız Eğitimler</h2>

    <?php if (empty($education_ids)) : ?>
        <p>Henüz bir eğitim satın almadınız.</p>
    <?php else : ?>
        <div class="egitim-grid">
            <?php foreach ($education_ids as $id) :
                $title = get_the_title($id);
                $link = get_permalink($id);
                $thumbnail = get_the_post_thumbnail($id, 'medium');
                $excerpt = get_the_excerpt($id);

                $video_url = get_post_meta($id, 'egitim_video', true);
                $dokuman_url = get_post_meta($id, 'egitim_dokuman', true);
            ?>
                <div class="egitim-card">
                    <?= $thumbnail ?>
                    <div class="egitim-info">
                        <h3><?= $title ?></h3>
                        <?php if ($excerpt) : ?>
                            <p><?= wp_trim_words($excerpt, 15) ?></p>
                        <?php endif; ?>

                        <?php if ($video_url) : ?>
                            <div class="video-wrapper">
                                <video controls width="100%">
                                    <source src="<?= esc_url($video_url) ?>" type="video/mp4">
                                    Tarayıcınız video oynatmayı desteklemiyor.
                                </video>
                            </div>
                        <?php endif; ?>

                        <?php if ($dokuman_url) : ?>
                            <p><a class="dokuman-link" href="<?= esc_url($dokuman_url) ?>" download>📄 Dökümanı indir</a></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<style>
.container {
  max-width: 1200px;
  margin: 40px auto;
  padding: 20px;
}

h2 {
  font-size: 28px;
  margin-bottom: 30px;
  text-align: center;
  color: #222;
}

.egitim-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 30px;
}

.egitim-card {
  background: #fff;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0,0,0,0.06);
  transition: transform 0.2s ease;
}

.egitim-card:hover {
  transform: scale(1.02);
}

.egitim-card img {
  width: 100%;
  height: 180px;
  object-fit: cover;
}

.egitim-info {
  padding: 20px;
}

.egitim-info h3 {
  font-size: 20px;
  margin-bottom: 10px;
  color: #333;
}

.egitim-info p {
  font-size: 14px;
  color: #555;
  margin-bottom: 10px;
}

.video-wrapper {
  margin-top: 15px;
}

.dokuman-link {
  display: inline-block;
  background: #4CAF50;
  color: white;
  padding: 8px 14px;
  border-radius: 6px;
  text-decoration: none;
  font-size: 14px;
}

.dokuman-link:hover {
  background: #3e9e46;
}
</style>

<?php get_footer(); ?>

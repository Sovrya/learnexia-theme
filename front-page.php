<?php get_header(); ?>

<!-- Ana stil dosyası -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />

<!-- Hero Alanı -->
<section class="hero-section">
    <div class="container">
        <div class="hero-wrapper">
            <!-- Metin Bölümü -->
            <div class="hero-text">
                <h1><?php echo esc_html(get_theme_mod('hero_baslik', 'Gizemi Keşfet, Bilgiyi Edin')); ?></h1>
                <p><?php echo esc_html(get_theme_mod('hero_aciklama', 'Learnexia Akademi ile kendi serüvenine çık. Eğitimler, ekipmanlar ve topluluk seni bekliyor.')); ?></p>
                <a href="<?php echo esc_url(get_theme_mod('hero_buton_link', '/magaza')); ?>" class="cta-button">
                    <?php echo esc_html(get_theme_mod('hero_buton_metni', 'Mağazayı Keşfet')); ?>
                </a>
            </div>

            <!-- Görsel Bölümü -->
            <div class="hero-image">
                <img src="<?php echo esc_url(get_theme_mod('hero_gorsel', get_template_directory_uri() . '/assets/images/logo.png')); ?>" alt="Dedektif Görseli" />
            </div>
        </div>
    </div>
</section>

<!-- Neden Biz? Bölümü -->
<section class="nedenbiz-section">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html(get_theme_mod('nedenbiz_baslik', 'Neden Learnexia Akademi?')); ?></h2>

        <div class="nedenbiz-cards">
            <?php for ($i = 1; $i <= 3; $i++) : ?>
                <div class="card">
                    <img src="<?php echo esc_url(get_theme_mod("nedenbiz_{$i}_gorsel", get_template_directory_uri() . '/assets/images/deneme.jpg')); ?>" alt="Kart <?php echo $i; ?>" />
                    <h3><?php echo esc_html(get_theme_mod("nedenbiz_{$i}_baslik", "Kart {$i} Başlık")); ?></h3>
                    <p><?php echo esc_html(get_theme_mod("nedenbiz_{$i}_aciklama", "Kart {$i} Açıklama")); ?></p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>

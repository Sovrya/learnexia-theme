<?php
/**
 * Template Name: Hakkımızda
 */

get_header();
?>

<main class="about-page">

    <section class="hero-section about-hero">
        <div class="container">
            <h1 class="section-title">Hakkımızda</h1>
            <p class="section-subtitle">Learnexia Akademi’nin hikayesiyle tanışın.</p>
        </div>
    </section>

    <section class="about-content">
        <div class="container">

            <div class="about-text">
                <h2>Biz Kimiz?</h2>
                <p>Learnexia Akademi, gizemli dünyaları keşfetmek isteyenler için kurulmuş özel bir eğitim
                    platformudur. Amacımız; dedektiflik, gözlem becerisi, analitik düşünme ve olay çözümleme konularında
                    hem teorik hem pratik eğitimler sunmaktır.</p>

                <h2>Ne Yapıyoruz?</h2>
                <p>Katılımcılarımıza, interaktif eğitim modülleri, senaryo bazlı görevler ve özel ekipmanlarla
                    desteklenmiş uygulamalı öğrenme imkânı sağlıyoruz. Aynı zamanda aktif bir toplulukla bilgi
                    paylaşımını ve iş birliğini teşvik ediyoruz.</p>

                <h2>Vizyonumuz</h2>
                <p>Bilgiye ulaşmanın eğlenceli, sürükleyici ve gerçekçi bir yolunu sunmak. Öğrenmeyi oyunlaştırmak,
                    keşfetmeyi teşvik etmek ve dedektiflik ruhunu herkesle buluşturmak.</p>
            </div>

            <div class="about-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about.jpg" alt="Hakkımızda Görseli">
            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>
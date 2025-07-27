<?php get_header(); ?>

<main class="homepage">

    <!-- Hero Alanı -->
    <section class="hero">
        <div class="container">
            <h1 class="hero-title">Learnexia'a Hoş Geldiniz</h1>
            <p class="hero-subtitle">Gizemli dünyaları keşfetmeye hazır mısınız?</p>
            <a href="/shop" class="btn btn-primary">Alışverişe Başla</a>
        </div>
    </section>

    <!-- Özellikler Bölümü -->
    <section class="features">
        <div class="container grid-3">

            <div class="feature-box">
                <h3>Online Eğitim</h3>
                <p>Alanında uzmanlardan interaktif eğitimler.</p>
            </div>

            <div class="feature-box">
                <h3>Dedektif Ekipmanları</h3>
                <p>Profesyonel gizli görev ekipmanları mağazamızda.</p>
            </div>

            <div class="feature-box">
                <h3>Topluluk</h3>
                <p>Diğer meraklılarla bilgi alışverişinde bulunun.</p>
            </div>

        </div>
    </section>

    <!-- Blog Yazıları -->
    <section class="latest-posts">
        <div class="container">
            <h2 class="section-title">Son Yazılar</h2>

            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <article class="post-preview">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php the_excerpt(); ?></p>
            </article>
            <?php endwhile; ?>

            <?php else : ?>
            <p>Henüz yazı eklenmemiş.</p>
            <?php endif; ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>
<?php get_header(); ?>

<main class="container">
    <section class="default-page">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                the_content(); // Sayfa içeriğini (örneğin [woocommerce_cart]) buraya basar
            endwhile;
        endif;
        ?>
    </section>
</main>

<?php get_footer(); ?>
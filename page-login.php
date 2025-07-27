<?php
/*
Template Name: Giriş Sayfası
*/
get_header();
?>

<main class="login-page">
    <div class="container">
        <div style="max-width: 420px; margin: 60px auto; background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.05);">
            <h2 style="text-align:center; font-size: 28px; margin-bottom: 30px;">🔐 Giriş Yap</h2>

            <?php if (is_user_logged_in()) : ?>
                <p style="text-align:center; font-size:16px;">
                    ✅ Zaten giriş yaptınız.<br>
                    <a href="<?php echo wp_logout_url(home_url()); ?>" style="color: #0073aa; font-weight: bold;">Çıkış yap</a>
                </p>
            <?php else : ?>
                <form method="post" action="<?php echo esc_url(site_url('wp-login.php', 'login_post')); ?>" style="display:flex; flex-direction:column; gap:20px;">
                    <div>
                        <label for="log" style="font-weight: bold;">Kullanıcı Adı veya E-Posta</label>
                        <input type="text" name="log" id="log" required
                            style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 6px;">
                    </div>

                    <div>
                        <label for="pwd" style="font-weight: bold;">Şifre</label>
                        <input type="password" name="pwd" id="pwd" required
                            style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 6px;">
                    </div>

                    <input type="hidden" name="redirect_to" value="<?php echo home_url('/my-account'); ?>">

                    <input type="submit" value="Giriş Yap"
                        style="background-color: #0073aa; color: white; border: none; padding: 12px; font-size: 16px; border-radius: 6px; cursor: pointer; transition: background 0.3s;">
                </form>

                <p style="text-align:center; margin-top: 25px; font-size: 15px;">
                    Hesabınız yok mu? <a href="<?php echo site_url('/register'); ?>" style="color:#e67e22; font-weight: bold;">Kayıt olun</a>
                </p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>

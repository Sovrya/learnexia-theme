<?php
/*
Template Name: Kayıt Sayfası
*/
get_header();
?>

<main class="register-page">
    <div class="container">
        <div style="max-width: 420px; margin: 60px auto; background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.05);">
            <h2 style="text-align:center; font-size: 28px; margin-bottom: 30px;">📝 Kayıt Ol</h2>

            <?php if (is_user_logged_in()) : ?>
                <p style="text-align:center; font-size: 16px;">
                    Zaten giriş yaptınız. <br>
                    <a href="<?php echo wp_logout_url(home_url()); ?>" style="color: #0073aa; font-weight: bold;">Çıkış yap</a>
                </p>
            <?php else : ?>

                <?php if (isset($_GET['register'])) :
                    $status = $_GET['register'];
                    $messages = [
                        'success' => '✅ Kayıt başarıyla tamamlandı. Giriş yapabilirsiniz.',
                        'eksik'   => '⚠️ Lütfen tüm alanları doldurun.',
                        'var'     => '❌ Bu kullanıcı adı veya e-posta zaten kayıtlı.',
                        'hata'    => '🚫 Kayıt sırasında bir hata oluştu. Lütfen tekrar deneyin.'
                    ];
                    if (isset($messages[$status])) : ?>
                        <div style="background: #f8f9fa; padding: 15px; border-radius: 6px; color: #333; text-align:center; margin-bottom: 20px;">
                            <?php echo $messages[$status]; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
                    <input type="hidden" name="action" value="kullanici_kayit">

                    <div>
                        <label for="username" style="font-weight: bold;">Kullanıcı Adı</label>
                        <input type="text" name="username" id="username" required
                            style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 6px;">
                    </div>

                    <div>
                        <label for="email" style="font-weight: bold;">E-posta</label>
                        <input type="email" name="email" id="email" required
                            style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 6px;">
                    </div>

                    <div>
                        <label for="password" style="font-weight: bold;">Şifre</label>
                        <input type="password" name="password" id="password" required
                            style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 6px;">
                    </div>

                    <button type="submit"
                        style="background-color: #0073aa; color: white; border: none; padding: 12px; font-size: 16px; border-radius: 6px; cursor: pointer;">
                        Kayıt Ol
                    </button>
                </form>

                <p style="text-align:center; margin-top: 25px; font-size: 15px;">
                    Zaten bir hesabınız var mı? <a href="<?php echo site_url('/login'); ?>" style="color:#e67e22; font-weight: bold;">Giriş yapın</a>
                </p>

            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>

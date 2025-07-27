<?php if (isset($_GET['durum']) && $_GET['durum'] === 'ok') : ?>
<div class="success-message">✅ Mesajınız başarıyla gönderildi.</div>
<?php endif; ?>
<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" id="contactForm">
    <input type="hidden" name="action" value="iletisim_formu_gonder">

    <label for="name">Ad Soyad:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">E-Posta:</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Mesajınız:</label>
    <textarea id="message" name="message" required></textarea>

    <!-- Honeypot -->
    <input type="text" name="website" style="display:none">

    <button type="submit">Gönder</button>
</form>
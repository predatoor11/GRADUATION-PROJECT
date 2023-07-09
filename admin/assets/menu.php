<div class="sidebar">
    <div class="logo">
        <div class="menu"><a href="index.php">Yönetim Paneli</a></div>
        <div class="who-login">Hoşgeldin <span><?php echo $_SESSION['username']; ?></span></div>
    </div>
    <ul>
        <li><a href="index.php">Anasayfa</a></li>
        <li><a href="logoYonetimi.php">Logo Yönetimi</a></li>
        <li><a href="sliderYonetimi.php">Slider Yönetimi</a></li>
        <!-- <li><a href=".php">Restoran Listele</a></li> -->
        <li><a href="restoranEkle.php">Restoran Ekle</a></li>
        <li><a href="restoranDuzenle.php">Restoran Düzenle</a></li>
        <li><a href="rezervasyonKontrol.php">Rezervasyon Kontrol</a></li>
        <li><a href="iletisim.php">İletişim</a></li>
        <li>
            <a href="#" class="dropdown-btn">Kullanıcı Yönetimi&nbsp;<i class="fas fa-chevron-down"></i></a>
            <ol class="dropdown-container">
                <li><a href="kullanicilistele.php">Kullanıcı Listele</a></li>
                <li><a href="kullanicilar.php">Kullanıcı Ekle</a></li>
                <li><a href="kullaniciduzenle.php">Kullanıcı Düzenle</a></li>
            </ol>
        </li>
        <li><a href="dogunigar.zip" class="important">Proje dosyaları</a></li>
        <li><a href="logout.php">Çıkış Yap</a></li>
    </ul>
    <button class="sidebarBtn">
        <span></span>
    </button>
</div>
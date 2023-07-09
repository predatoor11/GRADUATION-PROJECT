<?php
    include "admin/properties/veritabani.php";
    $sql = "SELECT * FROM `logo` WHERE `ID` = 1";
    $query = mysqli_query($dbconnect, $sql);
    $kayit = mysqli_fetch_assoc($query);
    $logo = $kayit['LOGO'];
    mysqli_close($dbconnect);
?>
<footer>
    <div class="content">
        <div class="box">
            <div class="logo">
                <a href="index.php"><img src="<?php echo $logo; ?>"></a>
            </div>
            <div class="link">
                <h5>Menü</h5>
                <span><a href="index.php">Anasayfa</a></span>
                <span><a href="restoranlar.php">Restoranlar</a></span>
                <span><a href="iletisim.php">İletişim</a></span>
            </div>
            <div class="link">
                <h5>Yardımcı Siteler</h5>
                <span><a href="https://google.com" target="_blank">Google</a></span>
                <span><a href="https://stackoverflow.com/" target="_blank">Stackoverflow</a></span>
                <span><a href="http://codepen.io" target="_blank">Codepen</a></span>
                <span><a href="https://www.w3schools.com/" target="_blank">w3school</a></span>
            </div>
            <div class="link">
                <h5>Yardımcı İçerikler</h5>
                <span><a href="https://getbootstrap.com/docs/4.3/layout/overview/" target="_blank">Bootstrap</a></span>
                <span><a href="https://code.jquery.com/" target="_blank">Jquery</a></span>
            </div>
        </div>
    </div>
    <div class="copyright">&copy Tüm Haklarımız Saklıdır</div>
</footer>
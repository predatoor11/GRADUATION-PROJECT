<!DOCTYPE html>
<html lang="tr">
<head>
    <?php include "assets/head.php"; ?>
    <title>Anasayfa</title>
</head>
<body>
    
    <?php include "assets/menu.php"; ?>

    <div class="index-container">
        <div class="left">
            <div class="slogan">
                <h2>Kolay&Hızlı</h2>
                <h2>Online</h2>
                <h2>Rezervasyon</h2>
            </div>
        </div>
        <div class="right">
            <div id="slideshow">
                <?php
                    include "admin/properties/veritabani.php";
                    $sql = "SELECT * FROM `slider` WHERE `SIRA` BETWEEN 0 AND 10 ORDER BY `SIRA` ASC";
                    $query = mysqli_query($dbconnect, $sql);
                    if(mysqli_num_rows($query))
                    {
                        while($kayit = mysqli_fetch_assoc($query))
                        {
                            print "<span>
                                    <img src='{$kayit['IMG']}' alt=''>";
                                if(!empty($kayit['P']))
                                {
                                    echo "<p>{$kayit['P']}</p>";
                                }
                            print "</span>";
                        }
                    }
                    mysqli_close($dbconnect);
                ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row pt-3 pb-5 text-center"><div class="col"><h2 class="highlights">Önerilen Restoranlar</h2><hr /></div></div>
        <div class="row">
            <div class="card-container">
                <?php
                    include "admin/properties/veritabani.php";
                    $sql = "SELECT * FROM `restoranlar` WHERE `DURUM` = 1 LIMIT 3";
                    $query = mysqli_query($dbconnect, $sql);
                    while($kayit = mysqli_fetch_assoc($query))
                    {
                        $rand = rand(60,90);
                        print <<<CARD
                            <div class='card'>
                                <div class='front'>
                                    <img src="{$kayit['RESIM']}">
                                    <div class='header'><h4>{$kayit['RESTORAN_ADI']}</h4></div>
                                    <div class='content'>
                                        <div class='background'>
                                            <div class='info'>
                                                <a href='http://maps.google.com/?q={$kayit['KONUM']}' target="_blank"><i class='fas fa-mobile-alt'></i>&nbsp;&nbsp;{$kayit['KONUM']}</a>
                                                <br>
                                                <a href='tel:{$kayit['TELEFON']}' target="_blank"><i class='fas fa-map-marker-alt'></i>&nbsp;&nbsp;{$kayit['TELEFON']}</a>
                                            </div>
                                            <div class='rating'>
                                                    <label>$rand%</label>
                                                <div class='star-ratings-sprite'>
                                                    <span style="width: $rand%; " class='star-ratings-sprite-rating'></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='footer'>
                                        <a href='{$kayit['YONLENDIRME']}'><span>Rezervasyon Yap</span></a>
                                    </div>
                                </div>
                            </div>
                        CARD;
                    }
                    mysqli_close($dbconnect);
                ?>
                
            </div>
        </div>
        <div class="row py-3 justify-content-center">
            <div class="more-btn">
                <a href="restoranlar.php" class="btn btn-4"><span>Restoranlar</span></a> 
            </div>
        </div>
    </div>
    <?php include "assets/footer.php"; ?>

    <!-- Scripts -->
    <script src="js/index-slider.js"></script>
</body>
</html>
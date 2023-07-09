<?php include "./assets/timeout.php"; ?>
<?php include "./assets/login-control.php"; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php include "./assets/head.php"; ?>
    <title>Restoran Ekle</title>
</head>
<body>
    
<?php include "./assets/menu.php"; ?>


<?php

    $error = "";
    if(isset($_REQUEST['restoranEkle']))
    {
        $restoranadi = $_REQUEST['restoranadi'];
        $konum = $_REQUEST['konum'];
        $eposta = $_REQUEST['eposta'];
        $telefon = $_REQUEST['telefon'];
        $aciklama = $_REQUEST['aciklama'];
        $mutfaklar = $_REQUEST['mutfaklar'];
        $menu = $_REQUEST['menu'];
        $ogunler = $_REQUEST['ogunler'];
        $php = ".php";


        
        $link = $restoranadi;
        while(strpos($link, " "))
        {
            $cikar = strstr($link, " ");
            $link = str_replace($cikar, "-", $link);
            $link = $link.substr($cikar, 1);
            $link = replace($link);
        }
        $link = strtolower($link);
        
        @$img_name = $_FILES["resim"]["name"];
        if(!empty($img_name))
        {
            include "properties/veritabani.php";
            $uploads = "uploads/img/";
            
            @$img_tmp = $_FILES["resim"]['tmp_name'];
            
            $img_way = $uploads . basename($img_name);
            $index = "admin/".$img_way;
            
            @move_uploaded_file($img_tmp, $img_way);

            $link = $link.$php;
            $createPage = "../".$link;
            $durum = 1;

            $sql = "INSERT INTO `restoranlar` (YONLENDIRME, RESTORAN_ADI, RESIM, RESIM_ADMIN, ACIKLAMA, MUTFAKLAR, MENU, OGUNLER, KONUM, EPOSTA, TELEFON, DURUM)
                    VALUES ('$link', '$restoranadi', '$index', '$img_way', '$aciklama', '$mutfaklar', '$menu', '$ogunler', '$konum', '$eposta', '$telefon', $durum)";
            $query = mysqli_query($dbconnect, $sql);

            touch("$createPage");
            $folder = fopen($createPage, 'w+');
            $yeniSayfa = <<<sayfa
            <?php
                \$file = "";
                \$file = \$_SERVER["SCRIPT_NAME"];
                \$file = substr(\$file, 1);
                include "admin/properties/veritabani.php";
                \$sql = "SELECT * FROM `restoranlar` WHERE `YONLENDIRME` = '\$file' AND `DURUM` = 1";
                \$query = mysqli_query(\$dbconnect, \$sql);
                \$kayit = mysqli_fetch_assoc(\$query);
                \$restoran_id = \$kayit['ID'];
                \$baslik = \$kayit['RESTORAN_ADI'];
                \$resim = \$kayit['RESIM'];
                \$yazi = \$kayit['ACIKLAMA'];
                \$mutfaklar = \$kayit['MUTFAKLAR'];
                \$menuler = \$kayit['MENU'];
                \$ogun = \$kayit['OGUNLER'];
                \$location = \$kayit['KONUM'];
                \$posta = \$kayit['EPOSTA'];
                \$tel = \$kayit['TELEFON'];
                \$durum = \$kayit['DURUM'];
                \$error = "";
                if(empty(\$baslik))
                {
                    \$baslik = "Bu restoran aktif değildir.";
                }
            ?>
            <!DOCTYPE html>
            <html lang="tr">
            <head>
                <?php include "assets/head.php"; ?>
                <title><?php echo \$baslik; ?></title>
            </head>
            <body>
                <?php include "assets/menu.php"; ?>
                <div class="container-fluid py-5">
                    <div class="row justify-content-center">
                        <div class="page">
                            <div class="rest-header">
                                <div class="img">
                                    <img src="<?php echo \$resim; ?>" alt="">
                                    <span><?php echo \$baslik; ?></span>
                                </div>
                            </div>
                            <div class="info-container">
                                <?php 
                                    if(\$yazi != "")
                                    {
                                        print <<<__
                                        <div class="info-box">
                                            <h5>Açıklama</h5><hr />
                                            <p>\$yazi</p>
                                        </div>
                                        __;
                                    }
                                ?>
                                <div class="info-box">
                                    <h5>Ayrıntılar</h5><hr />
                                    <h6>MUTFAKLAR</h6>
                                    <p><?php echo \$mutfaklar; ?></p>
                                    <h6>MENÜ</h6>
                                    <p><?php echo \$menuler; ?></p>
                                    <h6>ÖĞÜNLER</h6>
                                    <p><?php echo \$ogun; ?></p>
                                </div>
                                <div class="info-box">
                                    <h5>Konum ve İletişim Bilgileri</h5><hr />
                                    <a href="http://maps.google.com/?q=<?php echo \$location; ?>" target="_blank">
                                        <p><i class="fas fa-map-marker-alt"></i><?php echo \$location; ?></p>
                                    </a>
                                    <a href="mailto:<?php echo \$posta; ?>" target="_blank"><p><i class="fas fa-envelope"></i><?php echo \$posta; ?></p></a>
                                    <a href="tel:<?php echo \$tel; ?>"><p><i class="fas fa-phone"></i><?php echo \$tel; ?></p></a>
                                </div>
                            </div>
                            <?php
                                if(isset(\$_REQUEST['form-gonder']))
                                {
                                    \$name = \$_REQUEST['name'];
                                    \$tel = \$_REQUEST['tel'];
                                    \$saat = \$_REQUEST['time'];
                                    \$date = \$_REQUEST['date'];
                                    \$person = \$_REQUEST['person'];
                                    if(empty(\$name) || empty(\$tel))
                                    {
                                        \$error = "<div class='alert alert-danger' role='alert'>Boş kısım bırakmayınız.</div>";
                                    } else {
                                        include "admin/properties/veritabani.php";
                                        \$sql = "SELECT * FROM `restoranlar` WHERE `ID` = \$restoran_id";
                                        \$query = mysqli_query(\$dbconnect, \$sql);
                                        \$kayit = mysqli_fetch_assoc(\$query);
                                        \$id = \$kayit['ID'];
                                        \$sql = "INSERT INTO `rezervasyon` (ADSOYAD, TELEFON, SAAT, TARIH, KISI_SAYISI, RESTORAN_ID, DURUM)
                                        VALUES ('\$name', '\$tel', \$saat, '\$date', \$person, \$restoran_id, 1)";
                                        mysqli_query(\$dbconnect, \$sql);
                                    }
                                }
                            ?>
                            <div class="form-container">
                                <div class="head"><h2>Online Rezervasyon Oluştur</h2></div>
                                <div class="form-box">
                                    <div class="form">
                                        <form action="">
                                            <div class="column">
                                                <span>Ad Soyad</span>
                                                <input type="text" name="name" placeholder="Örn: Doğu Nigar" required>
                                            </div>
                                            <div class="column">
                                                <span>Telefon</span>
                                                <input type="text" name="tel" placeholder="Örn: 05554443322" required>
                                            </div>
                                            <div class="column">
                                                <span>Saat</span>
                                                <select name="time">
                                                    <option value="">Saat seçiniz..</option>
                                                    <?php
                                                        include "admin/properties/veritabani.php";
                                                        \$sql = "SELECT `saat`.`ID`, `saat`.`SAAT` FROM `saat` WHERE `saat`.`ID` NOT IN (SELECT `saat`.`ID` FROM `rezervasyon` 
                                                        JOIN `saat` ON `saat`.`ID` = `rezervasyon`.`SAAT` WHERE `rezervasyon`.`RESTORAN_ID` = \$restoran_id)";
                                                        \$query = mysqli_query(\$dbconnect, \$sql);
                                                        while(\$kayit = mysqli_fetch_assoc(\$query))
                                                        {
                                                            \$id = \$kayit['ID'];
                                                            \$time = \$kayit['SAAT'];
                                                            print <<<saat
                                                                <option value="\$id">\$time</option>
                                                            saat;
                                                        }
                                                        mysqli_close(\$dbconnect);
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="column">
                                                <span>Tarih</span>
                                                <input type="date" name="date" required>
                                            </div>
                                            <div class="column">
                                                <span>Kişi Sayısı</span>
                                                <select name="person">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                            <div class="column">
                                                <input type="submit" name="form-gonder">
                                            </div>          
                                            <div class="column">
                                                <?php echo \$error; ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include "assets/footer.php"; ?>
            </body>
            </html>
            sayfa;
            fwrite($folder, $yeniSayfa);
            fclose($folder);
            mysqli_close($dbconnect);
            $error = "<div class='alert alert-success' role='alert'>Yükleme Başarılı.</div>";
            header("Refresh:2; URL=restoranEkle.php");
        } else {
            $error = "<div class='alert alert-danger' role='alert'>Resim dosyası seçmelisiniz.</div>";
        }

    }
?>


<form action="" enctype="multipart/form-data" method="POST">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 mt-3">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="restoranadi" placeholder="Restoran Adı" >
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 mt-3">
                <div class="input-group mb-2">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="resim" id="inputGroupFile01" >
                        <label class="custom-file-label" for="inputGroupFile01">Resim Seçiniz</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 mt-3">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="konum" placeholder="Konum" >
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 mt-3">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="eposta" placeholder="E Posta">
                    <input type="text" class="form-control" name="telefon" placeholder="Telefon" >
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 mt-3">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="aciklama" placeholder="Açıklama" multiple>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 mt-3">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="mutfaklar" placeholder="Mutfaklar" multiple>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 mt-3">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="menu" placeholder="Menü" multiple>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 mt-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="ogunler" placeholder="Öğünler" multiple>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 mt-4">
                <input class="btn btn-primary" name="restoranEkle" type="submit" value="Restoranı Ekle">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 mt-4">
                <?php echo $error; ?>
            </div>
        </div>
    </div>
</form>

</body>
</html>
<?php
    function replace($veri) {
        $veri = str_replace("ğ", "g", $veri);
        $veri = str_replace("Ğ", "G", $veri);
        $veri = str_replace("ı", "i", $veri);
        $veri = str_replace("İ", "I", $veri);
        $veri = str_replace("ü", "u", $veri);
        $veri = str_replace("Ü", "U", $veri);
        $veri = str_replace("ö", "o", $veri);
        $veri = str_replace("Ö", "O", $veri);
        $veri = str_replace("ş", "s", $veri);
        $veri = str_replace("Ş", "S", $veri);
        $veri = str_replace("Ç", "C", $veri);
        $veri = str_replace("ç", "c", $veri);
        return $veri;
    }
?>
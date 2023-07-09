<?php
    $file = "";
    $file = $_SERVER["SCRIPT_NAME"];
    $file = substr($file, 1);
    include "admin/properties/veritabani.php";
    $sql = "SELECT * FROM `restoranlar` WHERE `YONLENDIRME` = '$file' AND `DURUM` = 1";
    $query = mysqli_query($dbconnect, $sql);
    $kayit = mysqli_fetch_assoc($query);
    $restoran_id = $kayit['ID'];
    $baslik = $kayit['RESTORAN_ADI'];
    $resim = $kayit['RESIM'];
    $yazi = $kayit['ACIKLAMA'];
    $mutfaklar = $kayit['MUTFAKLAR'];
    $menuler = $kayit['MENU'];
    $ogun = $kayit['OGUNLER'];
    $location = $kayit['KONUM'];
    $posta = $kayit['EPOSTA'];
    $tel = $kayit['TELEFON'];
    $durum = $kayit['DURUM'];
    $error = "";
    $success = "";
    if(empty($baslik) && empty($restoran_id))
    {
        $baslik = "Bu restoran aktif değildir.";
        header("Refresh: 3; Url=index.php");
    }
?>
<?php
    if(isset($_REQUEST['form-gonder']))
    {
        $name = $_REQUEST['name'];
        $tel = $_REQUEST['tel'];
        $saat = $_REQUEST['time'];
        $date = $_REQUEST['date'];
        $person = $_REQUEST['person'];
        if(empty($name) || empty($tel))
        {
            $error = "<div class='alert alert-danger' role='alert'>Boş kısım bırakmayınız.</div>";
        } else {
            include "admin/properties/veritabani.php";
            $sql = "SELECT * FROM `restoranlar` WHERE `ID` = $restoran_id";
            $query = mysqli_query($dbconnect, $sql);
            $kayit = mysqli_fetch_assoc($query) or die("Bu restoran aktif işlem göstermemektedir.");
            $id = $kayit['ID'];
            $sql = "INSERT INTO `rezervasyon` (ADSOYAD, TELEFON, SAAT, TARIH, KISI_SAYISI, RESTORAN_ID, DURUM)
            VALUES ('$name', '$tel', $saat, '$date', $person, $restoran_id, 1)";
            mysqli_query($dbconnect, $sql);
            mysqli_close($dbconnect);
            $success = "<div class='alert alert-success' role='alert'>Rezervasyon başarıyla oluşturuldu.</div>";
            header("Refresh:3; URL=$file");
        }
    }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php include "assets/head.php"; ?>
    <title><?php echo $baslik; ?></title>
</head>
<body>
    <?php include "assets/menu.php"; ?>
    <div class="container-fluid py-5">
        <div class="row justify-content-center"><div class="col-4"><?php echo $success; ?></div></div>
        <div class="row justify-content-center">
            <div class="page">
                <div class="rest-header">
                    <div class="img">
                        <img src="<?php echo $resim; ?>" alt="">
                        <span><?php echo $baslik; ?></span>
                    </div>
                </div>
                <div class="info-container">
                    <?php 
                        if($yazi != "")
                        {
                            print <<<__
                            <div class="info-box">
                                <h5>Açıklama</h5><hr />
                                <p>$yazi</p>
                            </div>
                            __;
                        }
                    ?>
                    <div class="info-box">
                        <h5>Ayrıntılar</h5><hr />
                        <h6>MUTFAKLAR</h6>
                        <p><?php echo $mutfaklar; ?></p>
                        <h6>MENÜ</h6>
                        <p><?php echo $menuler; ?></p>
                        <h6>ÖĞÜNLER</h6>
                        <p><?php echo $ogun; ?></p>
                    </div>
                    <div class="info-box">
                        <h5>Konum ve İletişim Bilgileri</h5><hr />
                        <a href="http://maps.google.com/?q=<?php echo $location; ?>" target="_blank">
                            <p><i class="fas fa-map-marker-alt"></i><?php echo $location; ?></p>
                        </a>
                        <a href="mailto:<?php echo $posta; ?>" target="_blank"><p><i class="fas fa-envelope"></i><?php echo $posta; ?></p></a>
                        <a href="tel:<?php echo $tel; ?>"><p><i class="fas fa-phone"></i><?php echo $tel; ?></p></a>
                    </div>
                </div>
                <div class="form-container">
                    <div class="head"><h2>Online Rezervasyon Oluştur</h2></div>
                    <div class="form-box">
                        <div class="form">
                            <form action="">
                                <div class="column">
                                    <span>Ad Soyad</span>
                                    <input type="text" name="name" id="name" placeholder="Örn: Doğu Nigar" required>
                                </div>
                                <div class="column">
                                    <span>Telefon</span>
                                    <input type="text" name="tel" id="tel" placeholder="Örn: 05554443322" required>
                                </div>
                                <div class="column">
                                    <span>Saat</span>
                                    <select name="time" required>
                                        <option value="">Saat seçiniz..</option>
                                        <?php
                                            include "admin/properties/veritabani.php";
                                            $sql = "SELECT `saat`.`ID`, `saat`.`SAAT` FROM `saat` WHERE `saat`.`ID` NOT IN (SELECT `saat`.`ID` FROM `rezervasyon` 
                                            JOIN `saat` ON `saat`.`ID` = `rezervasyon`.`SAAT` WHERE `rezervasyon`.`RESTORAN_ID` = $restoran_id)";
                                            $query = mysqli_query($dbconnect, $sql);
                                            while($kayit = mysqli_fetch_assoc($query))
                                            {
                                                $id = $kayit['ID'];
                                                $time = $kayit['SAAT'];
                                                print <<<saat
                                                    <option value="$id">$time</option>
                                                saat;
                                            }
                                            mysqli_close($dbconnect);
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
                                    <input type="submit" name="form-gonder" value="Oluştur">
                                </div>          
                                <div class="column">
                                    <?php echo $error; ?>
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
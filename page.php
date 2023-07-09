<?php
    $file = $_SERVER["SCRIPT_NAME"];
    $file = substr($file, 1);
    include "admin/properties/veritabani.php";
    $sql = "SELECT * FROM `restoranlar` WHERE `YONLENDIRME` = '$file'";
    $query = mysqli_query($dbconnect, $sql);
    $kayit = mysqli_fetch_assoc($query);
    $restoran_id = $kayit['ID'];
    $title = $kayit['RESTORAN_ADI'];
    $image = $kayit['RESIM'];
    $aciklama = $kayit['ACIKLAMA'];
    $mutfak = $kayit['MUTFAKLAR'];
    $menu = $kayit['MENU'];
    $ogunler = $kayit['OGUNLER'];
    $konum = $kayit['KONUM'];
    $eposta = $kayit['EPOSTA'];
    $telefon = $kayit['TELEFON'];
    $error = "";
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php include "assets/head.php"; ?>
    <title><?php echo $title; ?></title>
</head>
<body>
    
    <?php include "assets/menu.php"; ?>

    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="page">
                <div class="rest-header">
                    <div class="img">
                        <img src="<?php echo $image; ?>" alt="">
                        <span><?php echo $title; ?></span>
                    </div>
                </div>
                <div class="info-container">
                    <?php 
                        if($aciklama != "")
                        {
                            print <<<__
                            <div class="info-box">
                                <h5>Açıklama</h5><hr />
                                <p>$aciklama</p>
                            </div>
                            __;
                        }
                    ?>
                    <div class="info-box">
                        <h5>Ayrıntılar</h5><hr />
                        <h6>MUTFAKLAR</h6>
                        <p><?php echo $mutfak; ?></p>
                        <h6>MENÜ</h6>
                        <p><?php echo $menu; ?></p>
                        <h6>ÖĞÜNLER</h6>
                        <p><?php echo $ogunler; ?></p>
                    </div>
                    <div class="info-box">
                        <h5>Konum ve İletişim Bilgileri</h5><hr />
                        <a href="http://maps.google.com/?q=<?php echo $konum; ?>" target="_blank">
                            <p><i class="fas fa-map-marker-alt"></i><?php echo $konum; ?></p>
                        </a>
                        <a href="mailto:<?php echo $eposta; ?>" target="_blank"><p><i class="fas fa-envelope"></i><?php echo $eposta; ?></p></a>
                        <a href="tel:<?php echo $telefon; ?>"><p><i class="fas fa-phone"></i><?php echo $telefon; ?></p></a>
                    </div>
                </div>
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
                            $kayit = mysqli_fetch_assoc($query);
                            $id = $kayit['ID'];
                            $sql = "INSERT INTO `rezervasyon` (ADSOYAD, TELEFON, SAAT, TARIH, KISI_SAYISI, RESTORAN_ID)
                            VALUES ('$name', '$tel', $saat, '$date', $person, $restoran_id)";
                            mysqli_query($dbconnect, $sql);
                        }
                    }
                ?>
                <div class="form-container">
                    <div class="head"><h2>Online Rezervasyon Oluştur</h2></div>
                    <div class="form-box">
                        <div class="form">
                            <form action="" method="POST">
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
                                    <input type="submit" name="form-gonder" value="Rezervasyon Oluştur">
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
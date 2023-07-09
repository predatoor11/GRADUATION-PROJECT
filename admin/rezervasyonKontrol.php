<?php include "./assets/timeout.php" ?>
<?php include "./assets/login-control.php"; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php include "./assets/head.php" ?>
    <title>Rezervasyon Kontrol</title>
</head>
<body>
    
<?php include "./assets/menu.php" ?>

<?php
    $error = "";
        if(isset($_REQUEST['rez-onayla'])) // rezervasyon tamamlandıktan sonrasındaki onaylama işlemi
        {
            $bitmis_id = $_REQUEST['rez-onayla'];
            include "properties/veritabani.php";
            $sql = "SELECT * FROM `rezervasyon` WHERE `ID` = $bitmis_id";
            $query = mysqli_query($dbconnect, $sql);
            $kayit = mysqli_fetch_assoc($query);
            extract($kayit);
            $sql = "UPDATE `rezervasyon` SET `DURUM` = 0 WHERE `ID` = $bitmis_id";
            mysqli_query($dbconnect, $sql);
            mysqli_close($dbconnect);
            header("location: rezervasyonKontrol.php");
        } else if(isset($_REQUEST['rez-sil'])) { // rezervasyonu iptal eder
            $bitmis_id = $_REQUEST['rez-sil'];
            include "properties/veritabani.php";
            $sql = "UPDATE `rezervasyon` SET `DURUM` = -1 WHERE `ID` = $bitmis_id";
            mysqli_query($dbconnect, $sql);
            mysqli_close($dbconnect);
            header("location: rezervasyonKontrol.php");
        }
?>
    <div class="container-fluid px-5">
        <div class="row py-5">
            <div class="col-12 upload">
                <form action="" method="GET">
                    <input class="large" type="text" name="search_text" placeholder="Restoran adını veya Tarihe göre arayın.">
                    <input type="submit" name="search" id="search" value="Ara" hidden>
                    <label for="search"><i class="fas fa-search"></i></label>
                </form>
            </div>
        </div>
        <div class="row py-2">
            <div class="rezervasyon-container">

                <?php
                    if(isset($_REQUEST['search'])) //search butonu tıklandığında
                    {
                        if(!empty($_REQUEST['search_text'])) // search-text boş değilse
                        {
                            $search_text = $_REQUEST['search_text'];
                            include "properties/veritabani.php";
                            $sql = "SELECT `R`.`ID` ,`RE`.`RESTORAN_ADI`, `R`.`ADSOYAD`, `R`.`TELEFON`, `S`.`SAAT`, `R`.`TARIH`, `R`.`KISI_SAYISI` FROM `rezervasyon` AS `R` 
                                    JOIN `saat` AS `S` ON `S`.`ID` = `R`.`SAAT` 
                                    JOIN `restoranlar` AS `RE` ON `RE`.`ID` = `R`.`RESTORAN_ID` 
                                    WHERE `R`.`DURUM` = 1 AND CONCAT(`RE`.`RESTORAN_ADI`, `R`.`TARIH`) LIKE '%$search_text%' ORDER BY `R`.`TARIH` ASC";
                            $query = mysqli_query($dbconnect, $sql);
                            $qno = mysqli_num_rows($query);
                            if($qno > 0) // veri varsa işlemi yapar
                            {
                                print <<<table1
                                <div class="table-container">
                                    <table class="table white">
                                    <thead>
                                        <tr style="color: #d54;">
                                            <th scope="col">Restoran Adı</th>
                                            <th scope="col">Ad Soyad</th>
                                            <th scope="col">Telefon</th>
                                            <th scope="col">Saat</th>
                                            <th scope="col">Tarih</th>
                                            <th scope="col">Kişi Sayısı</th>
                                            <th scope="col">Bitir</th>
                                            <th scope="col">İptal Et</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                table1;
                                while($kayit = mysqli_fetch_assoc($query))
                                {
                                    $rez_id = $kayit['ID'];

                                    print <<<rez_goster
                                        <tr>
                                            <td>{$kayit['RESTORAN_ADI']}</td>
                                            <td>{$kayit['ADSOYAD']}</td>
                                            <td>{$kayit['TELEFON']}</td>
                                            <td>{$kayit['SAAT']}</td>
                                            <td>{$kayit['TARIH']}</td>
                                            <td>{$kayit['KISI_SAYISI']}</td>
                                            <form method="POST">
                                            <td>
                                                <input type="submit" name="rez-onayla" id="rez-onayla-$rez_id" value="$rez_id">
                                                <label class="btn1" for="rez-onayla-$rez_id">Tamamlandı</label>
                                            </td>
                                            <td>
                                                <input type="submit" name="rez-sil" id="rez-sil-$rez_id" value="$rez_id">
                                                <label class="btn2" for="rez-sil-$rez_id">İptal Et</label>
                                            </td>
                                            </form>
                                        </tr>
                                    rez_goster;

                                }
                                print "
                                        </tbody>
                                    </table>
                                </div>";
                            } else { // arama sonucuna dair veri bulunamazsa
                                $error = "<div class='alert alert-danger' role='alert'>Arama sonucu bulunamadı.</div>";
                            }
                            mysqli_close($dbconnect); 
                        } else { // text-search boşken arama butonuna tıklandğında yapılan işlem
                            include "properties/veritabani.php";
                            $sql = "SELECT `R`.`ID` ,`RE`.`RESTORAN_ADI`, `R`.`ADSOYAD`, `R`.`TELEFON`, `S`.`SAAT`, `R`.`TARIH`, `R`.`KISI_SAYISI` FROM `rezervasyon` AS `R` 
                                    JOIN `saat` AS `S` ON `S`.`ID` = `R`.`SAAT`
                                    JOIN `restoranlar` AS `RE` ON `RE`.`ID` = `R`.`RESTORAN_ID`
                                    WHERE `R`.`DURUM` = 1 ORDER BY `R`.`TARIH` ASC, `S`.`SAAT` ASC";
                            $query = mysqli_query($dbconnect, $sql);
                            $qno = mysqli_num_rows($query);
                            if($qno > 0)
                            {
                                print <<<table1
                                <div class="table-container">
                                    <table class="table white">
                                    <thead>
                                        <tr style="color: #d54;">
                                            <th scope="col">Restoran Adı</th>
                                            <th scope="col">Ad Soyad</th>
                                            <th scope="col">Telefon</th>
                                            <th scope="col">Saat</th>
                                            <th scope="col">Tarih</th>
                                            <th scope="col">Kişi Sayısı</th>
                                            <th scope="col">Bitir</th>
                                            <th scope="col">İptal Et</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                table1;
                                while($kayit = mysqli_fetch_assoc($query))
                                {
                                    $rez_id = $kayit['ID'];

                                    print <<<rez_goster
                                        <tr>
                                            <td>{$kayit['RESTORAN_ADI']}</td>
                                            <td>{$kayit['ADSOYAD']}</td>
                                            <td>{$kayit['TELEFON']}</td>
                                            <td>{$kayit['SAAT']}</td>
                                            <td>{$kayit['TARIH']}</td>
                                            <td>{$kayit['KISI_SAYISI']}</td>
                                            <form method="POST">
                                            <td>
                                                <input type="submit" name="rez-onayla" id="rez-onayla-$rez_id" value="$rez_id">
                                                <label class="btn1" for="rez-onayla-$rez_id">Tamamlandı</label>
                                            </td>
                                            <td>
                                                <input type="submit" name="rez-sil" id="rez-sil-$rez_id" value="$rez_id">
                                                <label class="btn2" for="rez-sil-$rez_id">İptal Et</label>
                                            </td>
                                            </form>
                                        </tr>
                                    rez_goster;

                                }
                                print "
                                        </tbody>
                                    </table>
                                </div>";
                            }
                            mysqli_close($dbconnect);
                        }
                    } else { // hiçbir özel işlem ortada yok iken yapılan işlem
                        include "properties/veritabani.php";
                        $sql = "SELECT `R`.`ID` ,`RE`.`RESTORAN_ADI`, `R`.`ADSOYAD`, `R`.`TELEFON`, `S`.`SAAT`, `R`.`TARIH`, `R`.`KISI_SAYISI` FROM `rezervasyon` AS `R` 
                                JOIN `saat` AS `S` ON `S`.`ID` = `R`.`SAAT`
                                JOIN `restoranlar` AS `RE` ON `RE`.`ID` = `R`.`RESTORAN_ID`
                                WHERE `R`.`DURUM` = 1 ORDER BY `R`.`TARIH` ASC, `S`.`SAAT` ASC";
                        $query = mysqli_query($dbconnect, $sql);
                        if(mysqli_num_rows($query) > 0)
                        {
                            print <<<table1
                                <div class="table-container">
                                    <table class="table white">
                                    <thead>
                                        <tr style="color: #d54;">
                                            <th scope="col">Restoran Adı</th>
                                            <th scope="col">Ad Soyad</th>
                                            <th scope="col">Telefon</th>
                                            <th scope="col">Saat</th>
                                            <th scope="col">Tarih</th>
                                            <th scope="col">Kişi Sayısı</th>
                                            <th scope="col">Bitir</th>
                                            <th scope="col">İptal Et</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            table1;
                            while($kayit = mysqli_fetch_assoc($query))
                            {
                                $rez_id = $kayit['ID'];

                                print <<<rez_goster
                                    <tr>
                                        <td>{$kayit['RESTORAN_ADI']}</td>
                                        <td>{$kayit['ADSOYAD']}</td>
                                        <td>{$kayit['TELEFON']}</td>
                                        <td>{$kayit['SAAT']}</td>
                                        <td>{$kayit['TARIH']}</td>
                                        <td>{$kayit['KISI_SAYISI']}</td>
                                        <form method="POST">
                                        <td>
                                            <input type="submit" name="rez-onayla" id="rez-onayla-$rez_id" value="$rez_id">
                                            <label class="btn1" for="rez-onayla-$rez_id">Tamamlandı</label>
                                        </td>
                                        <td>
                                            <input type="submit" name="rez-sil" id="rez-sil-$rez_id" value="$rez_id">
                                            <label class="btn2" for="rez-sil-$rez_id">İptal Et</label>
                                        </td>
                                        </form>
                                    </tr>
                                rez_goster;

                            }
                            print "
                                    </tbody>
                                </table>
                            </div>";
                        } else {
                            $error = "<div class='alert alert-secondary' role='alert'>Veri bulunamadı.</div>";
                        }
                        mysqli_close($dbconnect);
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <?php echo $error; ?>
            </div>
        </div>
    </div>

</body>
    </html>
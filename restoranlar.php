<?php

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php include "assets/head.php"; ?>
    <title>Restoranlar</title>
</head>
<body>
    
    <?php include "assets/menu.php"; ?>

    <div class="container">
        <div class="row py-5">
            <div class="content-container">
                <div class="search-and-filter">
                    <div class="search">
                        <div class="text">
                            <form method="GET">
                                <input type="text" name="search-text" placeholder="Mutfak veya restoran arayın.">
                                <input type="submit" name="search" id="search">
                                <label for="search"><i class="fas fa-search"></i></label>
                            </form>
                        </div>
                    </div>
                    <div class="food">
                        <span>Menü</span>
                        <form method="GET">
                        <div class="select">
                            <select name="cesit" onchange="this.form.submit()">
                                <option value="0">Seçiniz</option>
                                <option value="Çorba">Çorba</option>
                                <option value="Et Ürünleri">Et Ürünleri</option>
                                <option value="Deniz Mahsülleri">Deniz Mahsülleri</option>
                                <option value="Pizza">Pizza</option>
                                <option value="Hamburger">Hamburger</option>
                                <option value="Vejetaryen">Vejetaryen</option>
                                <option value="Vegan">Vegan</option>
                                <option value="Tatlı">Tatlı</option>
                            </select>
                        </div>
                        </form>
                    </div>
                    <!-- <div class="food">
                        <form action="" method="GET">
                        <span>Mutfak Türü</span>
                        <div class="check">
                            <input type="checkbox" name="mutfak" id="1" onchange="this.form.submit()" value="Türk Mutfağı"><label for="1">Türk Mutfağı</label>
                        </div>
                        <div class="check">
                            <input type="checkbox" name="mutfak" id="2" onchange="this.form.submit()" value=""><label for="2">Dünya Mutfağı</label>
                        </div>
                        <div class="check">
                            <input type="checkbox" name="mutfak" id="3" onchange="this.form.submit()" value=""><label for="3">Pizza & İtalyan</label>
                        </div>
                        <div class="check">
                            <input type="checkbox" name="mutfak" id="4" onchange="this.form.submit()" value=""><label for="4">Çin Mutfağı</label>
                        </div>
                        </form>
                    </div> -->
                </div>
                <div class="content-box">
                    <?php
                        if(isset($_REQUEST['search']))
                        {
                            $text = $_REQUEST['search-text'];
                            if(!empty($text))
                            {
                                include "admin/properties/veritabani.php";
                                $sql = "SELECT * FROM `restoranlar` WHERE `DURUM` = 1 AND CONCAT(`RESTORAN_ADI`, `MUTFAKLAR`) LIKE ('%$text%')";
                                $query = mysqli_query($dbconnect, $sql);
                                $qno = mysqli_num_rows($query);
                                mysqli_close($dbconnect);
                                if($qno > 0)
                                {
                                    while($kayit = mysqli_fetch_assoc($query))
                                    {
                                        $bol = $kayit['MUTFAKLAR'];
                                        if(strpos($bol, ", ")) {
                                            $bol = explode(", ",$bol);
                                        } else if(strpos($bol, ",")) {
                                            $bol = explode(",",$bol);
                                        } else if(strpos($bol, " ")) {
                                            $bol = explode(" ",$bol);
                                        } else if(strpos($bol, "  ")) {
                                            $bol = explode("  ",$bol);
                                        }
                                        print <<<yaz
                                            <div class="box">
                                                <div class="img">
                                                    <img src="{$kayit['RESIM']}" alt="">
                                                    <a href="{$kayit['YONLENDIRME']}">Rezervasyon Yap</a>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="{$kayit['YONLENDIRME']}">{$kayit['RESTORAN_ADI']}</a></h4>
                                                    <p>{$kayit['ACIKLAMA']}</p>
                                                </div>
                                                <div class="footer">
                                                    <h6>Mutfak</h6>
                                                    <p>$bol[0]</p>
                                                    <p>$bol[1]</p>
                                                    <p>$bol[2]</p>
                                                </div>
                                            </div>
                                        yaz;
                                    }
                                } else {
                                    echo <<<search_failed
                                        <div class="search-failed">Arama sonucu bulunamadı.</div>
                                    search_failed;
                                }
                            } else {
                                include "admin/properties/veritabani.php";
                                $sql = "SELECT *  FROM `restoranlar` WHERE `DURUM` = 1";
                                $query = mysqli_query($dbconnect, $sql);
                                mysqli_close($dbconnect);
                                while($kayit = mysqli_fetch_assoc($query))
                                {
                                    $bol = $kayit['MUTFAKLAR'];
                                    if(strpos($bol, ", ")) {
                                        $bol = explode(", ",$bol);
                                    } else if(strpos($bol, ",")) {
                                        $bol = explode(",",$bol);
                                    } else if(strpos($bol, " ")) {
                                        $bol = explode(" ",$bol);
                                    } else if(strpos($bol, "  ")) {
                                        $bol = explode("  ",$bol);
                                    }
                                    print <<<yaz
                                    <div class="box">
                                        <div class="img">
                                            <img src="{$kayit['RESIM']}" alt="">
                                            <a href="{$kayit['YONLENDIRME']}">Rezervasyon Yap</a>
                                        </div>
                                        <div class="content">
                                            <h4><a href="{$kayit['YONLENDIRME']}">{$kayit['RESTORAN_ADI']}</a></h4>
                                            <p>{$kayit['ACIKLAMA']}</p>
                                        </div>
                                        <div class="footer">
                                            <h6>Mutfak</h6>
                                            <p>$bol[0]</p>
                                            <p>$bol[1]</p>
                                            <p>$bol[2]</p>
                                        </div>
                                    </div>
                                    yaz;
                                }
                            }
                        }
                        else if(isset($_REQUEST['cesit'])) {
                            $cesit = $_REQUEST['cesit'];
                            include "admin/properties/veritabani.php";
                            $sql = "SELECT * FROM `restoranlar` WHERE `DURUM` = 1 AND CONCAT(`MENU`) LIKE ('%$cesit%')";
                            $query = mysqli_query($dbconnect, $sql);
                            $qno = mysqli_num_rows($query);
                            mysqli_close($dbconnect);
                            if($qno > 0)
                            {
                                while($kayit = mysqli_fetch_assoc($query))
                                {
                                    $bol = $kayit['MUTFAKLAR'];
                                    if(strpos($bol, ", ")) {
                                        $bol = explode(", ",$bol);
                                    } else if(strpos($bol, ",")) {
                                        $bol = explode(",",$bol);
                                    } else if(strpos($bol, " ")) {
                                        $bol = explode(" ",$bol);
                                    } else if(strpos($bol, "  ")) {
                                        $bol = explode("  ",$bol);
                                    }
                                    print <<<yaz
                                        <div class="box">
                                            <div class="img">
                                                <img src="{$kayit['RESIM']}" alt="">
                                                <a href="{$kayit['YONLENDIRME']}">Rezervasyon Yap</a>
                                            </div>
                                            <div class="content">
                                                <h4><a href="{$kayit['YONLENDIRME']}">{$kayit['RESTORAN_ADI']}</a></h4>
                                                <p>{$kayit['ACIKLAMA']}</p>
                                            </div>
                                            <div class="footer">
                                                <h6>Mutfak</h6>
                                                <p>$bol[0]</p>
                                                <p>$bol[1]</p>
                                                <p>$bol[2]</p>
                                            </div>
                                        </div>
                                    yaz;
                                }
                            } else {
                                echo <<<search_failed
                                    <div class="search-failed">Arama sonucu bulunamadı.</div>
                                search_failed;
                            }
                        }
                        else {
                            include "admin/properties/veritabani.php";
                            $sql = "SELECT *  FROM `restoranlar` WHERE `DURUM` = 1";
                            $query = mysqli_query($dbconnect, $sql);
                            mysqli_close($dbconnect);
                            while($kayit = mysqli_fetch_assoc($query))
                            {
                                $bol = $kayit['MUTFAKLAR'];
                                if(strpos($bol, ", ")) {
                                    $bol = explode(", ",$bol);
                                } else if(strpos($bol, ",")) {
                                    $bol = explode(",",$bol);
                                } else if(strpos($bol, " ")) {
                                    $bol = explode(" ",$bol);
                                } else if(strpos($bol, "  ")) {
                                    $bol = explode("  ",$bol);
                                }
                                print <<<yaz
                                <div class="box">
                                    <div class="img">
                                        <img src="{$kayit['RESIM']}" alt="">
                                        <a href="{$kayit['YONLENDIRME']}">Rezervasyon Yap</a>
                                    </div>
                                    <div class="content">
                                        <h4><a href="{$kayit['YONLENDIRME']}">{$kayit['RESTORAN_ADI']}</a></h4>
                                        <p>{$kayit['ACIKLAMA']}</p>
                                    </div>
                                    <div class="footer">
                                        <h6>Mutfak</h6>
                                        <p>$bol[0]</p>
                                        <p>$bol[1]</p>
                                        <p>$bol[2]</p>
                                    </div>
                                </div>
                                yaz;
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php include "assets/footer.php"; ?>
    
</body>
</html>
<?php include "./assets/timeout.php"; ?>
<?php include "./assets/login-control.php"; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php include "./assets/head.php"; ?>
    <title>Restoran Düzenle</title>
</head>
<body>
    
<?php include "./assets/menu.php"; ?>


<?php
    $disabled = "disabled";
    $error = "";
    $resim_sil = "";
    $guncelle_id = "";
    $PAGE_CHECK = "";
    if(isset($_REQUEST['search']))
    {
        if(!empty($_REQUEST['search_text']))
        {
            $search_text = $_REQUEST['search_text'];
            include "properties/veritabani.php";
            $sql = "SELECT * FROM `restoranlar` WHERE CONCAT(`ID`, `RESTORAN_ADI`) LIKE '%$search_text%'";
            $query = mysqli_query($dbconnect, $sql);
            $qno = mysqli_num_rows($query);
            if($qno > 0)
            {
                $kayit = mysqli_fetch_assoc($query);
                extract($kayit);
                $disabled = "";
                $ID = $kayit['ID'];
                if($DURUM == 1)
                {
                    $PAGE_CHECK = "checked";
                } else {
                    $PAGE_CHECK = "";
                }
            } else {
                $error = "<div class='alert alert-danger' role='alert'>Arama sonucu bulunamadı.</div>";
            }
            mysqli_close($dbconnect);
        } else {
            $error = "<div class='alert alert-danger' role='alert'>Kutu boşken sana nasıl özel veri getirebilirim.</div>";
        }
    }
    ?>


<div class="container pt-5 pb-3">
    <div class="row">
        <div class="col upload">
            <form action="" method="GET">
                <input class="large" type="text" name="search_text" id="search_text" placeholder="Restoran Adı veya ID" >
                <input type="submit" name="search" id="search" value="Ara" hidden>
                <label for="search"><i class="fas fa-search"></i></label>
            </form>
        </div>
    </div>
</div>
<?php
    if(isset($_REQUEST['restoranGuncelle']))
    {
        $id = $_REQUEST['idal'];
        include "properties/veritabani.php";
        $sql = "SELECT * FROM `restoranlar` WHERE `ID` = $id";
        $query = mysqli_query($dbconnect, $sql);
        $kayit = mysqli_fetch_assoc($query);
        $resim_sil = $kayit['RESIM_ADMIN'];
        mysqli_close($dbconnect);
        $restoranadi = $_REQUEST['restoranadi'];
        $konum = $_REQUEST['konum'];
        $eposta = $_REQUEST['eposta'];
        $telefon = $_REQUEST['telefon'];
        $aciklama = $_REQUEST['aciklama'];
        $mutfaklar = $_REQUEST['mutfaklar'];
        $menu = $_REQUEST['menu'];
        $ogunler = $_REQUEST['ogunler'];
        $durum;
        $link = $restoranadi;
        $php = ".php";
        if(isset($_REQUEST['durum']))
        {
            $durum = 1;
        } else {
            $durum = 0;
        }

        if(empty($restoranadi))
        {
            $error = "<div class='alert alert-danger' role='alert'>Restoran adı boş olmamalıdır.</div>";
            header("Refresh:2;Url=restoranDuzenle.php");
            exit;
        }
        while(strpos($link, " "))
        {
            $cikar = strstr($link, " ");
            $link = str_replace($cikar, "-", $link);
            $link = $link.substr($cikar, 1);
            $link = replace($link);
        }
        $link = strtolower($link);
        
        $link = $link.$php;
        
        include "properties/veritabani.php";
        $img_name = "";
        @$img_name = $_FILES["image"]["name"];
        if(!empty($img_name))
        {
            unlink($resim_sil);
            $uploads = "img/restoranlar/";
            @$img_tmp = $_FILES["image"]['tmp_name'];
            $img_way = $uploads . basename($img_name);
            @move_uploaded_file($img_tmp, $img_way);
            $index = "admin/".$img_way;
            $sql = "UPDATE `restoranlar` SET `YONLENDIRME` = '$link' ,`RESTORAN_ADI` = '$restoranadi', 
            `RESIM` = '$index', `RESIM_ADMIN` = '$img_way', 
            `ACIKLAMA` = '$aciklama', `MUTFAKLAR` = '$mutfaklar', `MENU` = '$menu', `OGUNLER` = '$ogunler', 
            `KONUM` = '$konum', `EPOSTA` = '$eposta', `TELEFON` = '$telefon', `DURUM` = $durum
            WHERE `ID` = $id";
        mysqli_query($dbconnect, $sql);
        mysqli_close($dbconnect);
        } else {
            $sql = "UPDATE `restoranlar` SET `YONLENDIRME` = '$link' ,`RESTORAN_ADI` = '$restoranadi', 
            `ACIKLAMA` = '$aciklama', `MUTFAKLAR` = '$mutfaklar',
            `MENU` = '$menu', `OGUNLER` = '$ogunler', `KONUM` = '$konum', `EPOSTA` = '$eposta', `TELEFON` = '$telefon', `DURUM` = $durum
            WHERE `ID` = $id";
        mysqli_query($dbconnect, $sql);
        mysqli_close($dbconnect);
        }
        $error = "<div class='alert alert-success' role='alert'>Veri başarıyla güncellendi.</div>";
        $disabled = "disabled";
        header("location: restoranDuzenle.php");
    }
    
?>
<form action="" enctype="multipart/form-data" method="POST">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 col-sm-12 mt-3">
                <div class="show-image mb-2">
                    <img src="<?php if(empty($RESIM_ADMIN)){echo "img/restoranlar/no-img.svg";}else{echo $RESIM_ADMIN;} ?>">
                    <input type="file" name="image" id="resim">
                    <label class="test2" for="resim">Resim seç</label>
                    <span id="resim-isim"></span>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 col-sm-12 mt-3">
                <div class="input-group mb-2">
                    <div class="input-group-prepend upload">
                        <input class="small-50 text-center" type="text" name="idal" value="<?php if(empty($ID)){echo "";}else{echo $ID;} ?>" hidden>
                    </div>
                    <input type="text" class="form-control" name="restoranadi" value="<?php if(empty($RESTORAN_ADI)){echo "";}else{echo $RESTORAN_ADI;} ?>" placeholder="Restoran Adı">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 col-sm-12 mt-3">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="konum" value="<?php if(empty($KONUM)){echo "";}else{echo $KONUM;} ?>" placeholder="Konum">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 col-sm-12 mt-3">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="eposta" value="<?php if(empty($EPOSTA)){echo "";}else{echo $EPOSTA;} ?>" placeholder="E Posta">
                    <input type="text" class="form-control" name="telefon" value="<?php if(empty($TELEFON)){echo "";}else{echo $TELEFON;} ?>" placeholder="Telefon">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 col-sm-12 mt-3">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="aciklama" value="<?php if(empty($ACIKLAMA)){echo "";}else{echo $ACIKLAMA;} ?>" placeholder="Açıklama" multiple required>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 col-sm-12 mt-3">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="mutfaklar" value="<?php if(empty($MUTFAKLAR)){echo "";}else{echo $MUTFAKLAR;} ?>" placeholder="Mutfaklar" multiple required>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 col-sm-12 mt-3">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="menu" value="<?php if(empty($MENU)){echo "";}else{echo $MENU;} ?>" placeholder="Menü" multiple required>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 col-sm-12 mt-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="ogunler" value="<?php if(empty($OGUNLER)){echo "";}else{echo $OGUNLER;} ?>" placeholder="Öğünler" multiple required>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 col-sm-12 mt-3">
                <div class="input-group">
                    <input type="checkbox" class="form-control" name="durum" value="<?php if(empty($DURUM)){echo "";}else{echo $DURUM;} ?>" <?php echo $PAGE_CHECK; ?> placeholder="Durum" multiple>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 col-sm-12 mt-4">
                <input class="btn btn-primary" name="restoranGuncelle" type="submit" value="Restoranı Güncelle" <?php echo $disabled; ?>>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 col-sm-12 mt-4">
                <?php echo $error; ?>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready( function() {
        $('#resim').change(function() {
            var name = $('#resim').val();
            var sayi = name.length;
            name = name.substring(12, sayi);
            $('#resim-isim').css("padding", "10px");
            $('#resim-isim').html(name);
        });
    });
</script>
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
<?php include "./assets/timeout.php" ?>
<?php include "./assets/login-control.php"; ?>

<!DOCTYPE html>
<html lang="tr">
<head>
<?php include "./assets/head.php"; ?>
    <title>Slider Yönetimi</title>
</head>
<body>
<?php include "./assets/menu.php"; ?>



<form action="" method="GET">
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <div class="show-slider">
                    <?php // Slide resimlerini gösteren kod bloğu.
                        $error = "";
                        include "properties/veritabani.php";
                        $sql = "SELECT * FROM `slider` WHERE `SIRA` BETWEEN 0 AND 10 ORDER BY `SIRA`";
                        $query = mysqli_query($dbconnect, $sql);
                        if(mysqli_num_rows($query))
                        {
                            while($kayit = mysqli_fetch_assoc($query))
                            {
                                print <<<resim
                                <div class="slider">
                                    <img src='{$kayit['IMG_ADMIN']}' alt=''>
                                resim;
                                    if(!empty($kayit['P']))
                                    {
                                        echo "<p>{$kayit['P']}</p>";
                                    }
                                    print <<<resim2
                                    <input type="radio" name="sec" value="{$kayit['ID']}">
                                    <span>{$kayit['SIRA']}</span>
                                </div>
                                resim2;
                            }
                        } else {
                            print <<<resim
                            <div class="slider">
                                <img src='img/logo-icon/no-img.png'>
                            </div>
                            resim;
                        }
                        mysqli_close($dbconnect);
                    ?>
                </div>
            </div>
        </div>
    <?php
        if(isset($_REQUEST['slide-sil']))
        {
            if(!empty($_REQUEST['sec']))
            {
                if(isset($_REQUEST['onay']))
                {
                    include "properties/veritabani.php";
                    $sec = $_REQUEST['sec'];
                    $sql = "SELECT `ID`, `IMG_ADMIN` FROM `slider` WHERE `ID` = $sec";
                    $query = mysqli_query($dbconnect, $sql);
                    $kayit = mysqli_fetch_assoc($query);
                    $sil = $kayit['IMG_ADMIN'];
                    unlink($sil);
                    $sql = "DELETE FROM `slider` WHERE ID = $sec";
                    mysqli_query($dbconnect, $sql);
                    mysqli_close($dbconnect);
                    header("location: sliderYonetimi.php");
                    
                } else {
                    $error = "Silme işlemini gerçekleştirmek için onay butonunu işaretleyiniz.";
                }
            } 
            else {
                $error = "Herhangi bir resim seçilmedi.";
            }
        }
    ?>
    <?php
        $dtext = "";
        $dsira = "";
        $disabled = "disabled";
        if(isset($_REQUEST['slide-getir']))
        {
            if(!empty($_REQUEST['sec']))
            {
                include "properties/veritabani.php";
                $sec = $_REQUEST['sec'];
                $sql = "SELECT `ID`, `P`, `SIRA` FROM `slider` WHERE `ID` = $sec";
                $query = mysqli_query($dbconnect, $sql);
                $kayit = mysqli_fetch_assoc($query);
                $did = $kayit['ID'];
                $dtext = $kayit['P'];
                $dsira = $kayit['SIRA'];
                mysqli_close($dbconnect);
                $disabled = "";
            }
            else {
                $error = "Herhangi bir resim seçilmedi.";
            }
        }
    ?>
    <?php
        if(isset($_REQUEST['slide-guncelle']))
        {
            $usira = $_REQUEST['sira'];
            if($usira != "" || $usira == 0)
            {
                include "properties/veritabani.php";
                $utext = $_REQUEST['img-text'];
                $sql = "UPDATE `slider` SET `P` = '$utext', `SIRA` = $usira WHERE `ID` = $did";
                mysqli_query($dbconnect, $sql);
                mysqli_close($dbconnect);
                header("location: sliderYonetimi.php");
            }
            else {
                $error = "Yanlış.";
            }
        }
    ?>
        <div class="row pt-3">
            <div class="col-4 justify-content-start upload">
                <input type="checkbox" name="onay" id="onay">
                <label for="onay">Silmek için onaylayınız.</label>
            </div>
            <div class="col-1 justify-content-start upload">
                <input type="submit" name="slide-sil" value="Sil">
            </div>
            <div class="col-1 justify-content-start upload">
                <input type="submit" name="slide-getir" value="Getir">
            </div>
        </div>
        <div class="row py-2 justify-content-start">
            <div class="col-12 error text-left"><h5><?php echo $error; ?></h5></div>
        </div>
    </form>

<?php
    $error = "";
    if(isset($_REQUEST['img-btn']))
    {
        @$img_name = $_FILES["image"]["name"];
        if(!empty($img_name))
        {
            $uploads = "img/index-slider/";
    
            @$img_tmp = $_FILES["image"]['tmp_name'];
    
            $text = $_REQUEST['img-text'];
            $sira = $_REQUEST['sira'];
    
            $img_way = $uploads . basename($img_name);
            $index = "admin/".$img_way;
            
            @move_uploaded_file($img_tmp, $img_way);
            
            include "properties/veritabani.php";
            $sql = "INSERT INTO `slider` (`NAME`, `TMP_NAME`, `IMG`, `IMG_ADMIN`, `P`, `SIRA`) VALUES ('$img_name', '$img_tmp', '$index', '$img_way', '$text', $sira)";
            $query = mysqli_query($dbconnect, $sql);
            mysqli_close($dbconnect);
            header("Location: sliderYonetimi.php");
        } else {
            $error = "Resim dosyası seçmelisiniz.";
        }
    }

?>

    <form method="POST" enctype="multipart/form-data">
        <div class="row py-2 justify-content-center align-items-start upload">
            <div class="col-3"><p>Resim dosyası:</p></div>
            <div class="col-4">
                <input type="file" name="image" id="image">
                <label for="image">Resmi Seç</label>
            </div>
        </div>
        <div class="row py-2 upload">
            <div class="col-3">
                <p>Resmin açıklaması:</p>
            </div>
            <div class="col-4">
            <input style="width: 100%;" type="text" name="img-text" placeholder="Başlık, Slogan vb." value="<?php echo $dtext; ?>">
            </div>
        </div>
        <div class="row py-2 upload">
            <div class="col-3">
                <p>Yayın sırası:</p>
            </div>
            <div class="col-4">
                <input type="number" min="0" max="10" name="sira" id="sira" placeholder="Sıra" value="<?php echo $dsira; ?>" required>
            </div>
        </div>
        <div class="row py-2 justify-content-center align-items-start upload">
            <div class="col-1 ">
                <input type="submit" name="img-btn" id="img-btn" value="Yükle">
            </div>
            <div class="col-2 upload">
                <input type="submit" name="slide-guncelle" <?php echo $disabled; ?> value="Güncelle">
            </div>
        </div>
    </form>
    <div class="row py-2 justify-content-center align-items-center">
        <div class="col-6 d-flex justify-content-center align-items-start error">
            <?php echo $error; ?>
        </div>
    </div>
</div>

</body>
</html>
<?php include "./assets/timeout.php" ?>
<?php include "./assets/login-control.php"; ?>

<!DOCTYPE html>
<html lang="tr">
<head>
<?php include "./assets/head.php"; ?>
    <title>Logo Yönetimi</title>
</head>
<body>
<?php include "./assets/menu.php"; ?>

<?php
    $error = "";
    if(isset($_REQUEST['file']))
    {
            include "properties/veritabani.php";
            $sql = "SELECT * FROM `logo` WHERE ID = 1";
            $query = mysqli_query($dbconnect, $sql);
            mysqli_close($dbconnect);

            if(!empty($_FILES['logo']['name']))
            {
                if(mysqli_num_rows($query) < 1)
                {
                    $uploads = "img/logo-icon/";

                    @$logo_tmp = $_FILES['logo']['tmp_name'];
                    @$logo_name = $_FILES["logo"]["name"];

                    /* $rand1 = rand(10000, 40000);
                    $rand2 = rand(10000, 40000);
                    $rand3 = rand(10000, 40000);
                    $rand4 = rand(10000, 40000);
                    $rand = $rand1.$rand2.$rand3.$rand4."__"; */

                    $logo_way = $uploads . basename($logo_name);
                    $index = "admin/".$logo_way;
                    @move_uploaded_file($logo_tmp, $logo_way);

                    include "properties/veritabani.php";
                    $sql = "INSERT INTO `logo` (ID, LOGO, LOGO_ADMIN, WHO_ADDED) VALUES (1, '$index', '$logo_way' ,'{$_SESSION['username']}')";
                    $query = mysqli_query($dbconnect, $sql);
                    mysqli_close($dbconnect);
                    header("Location: logoYonetimi.php");
                } else {
                    $error = "<h3 style='color: #db2d36;'>Mevcut bir logonuz zaten bulunmakta.</h3>";
                }
            } else {
                $error = "<h3 style='color: #db2d36;'>Herhangi bir dosya seçilmedi.</h3>";
            }
    }

?>

<div class="container padding-top">
    <form method="POST" enctype="multipart/form-data">
    <div class="row py-2 justify-content-center align-items-start upload">
        <div class="col-2"><p>LOGO:</p></div>
        <div class="col-4">
            <input type="file" name="logo" id="logo" data-multiple-caption="{count} files selected" multiple>
            <label for="logo">Dosya Seç</label>
        </div>
    </div>
    <div class="row py-2 justify-content-center align-items-start upload">
        <div class="col-2"><p>GÖNDER:</p></div>
        <div class="col-4">
            <input type="submit" name="file" id="file" value="Yükle">
        </div>
    </div>
    </form>
    <div class="row py-2 pt-3 justify-content-center align-items-center">
        <div class="col-2 d-flex justify-content-center">
            <?php
                include "properties/veritabani.php";
                $sql = "SELECT ID, LOGO_ADMIN FROM `logo`";
                $query = mysqli_query($dbconnect, $sql);
                mysqli_close($dbconnect);
                if(mysqli_num_rows($query))
                {
                    $kayit = mysqli_fetch_assoc($query);
                    echo "<img src='".$kayit['LOGO_ADMIN']."' width='200px' height='auto'>";
                } else {
                    echo "<img src='img/logo-icon/no-img.png' width='200px' height='auto'>";
                }
            ?>
        </div>
    </div>
    <div class="row py-2 justify-content-center align-items-center upload">
        <div class="col-2 d-flex justify-content-center">
            <?php
                $disabled = "";
                if(isset($_REQUEST['sil']))
                {
                    include "properties/veritabani.php";
                    $sql = "SELECT ID, LOGO_ADMIN FROM `logo`";
                    $query1 = mysqli_query($dbconnect, $sql);
                    $kayit = mysqli_fetch_assoc($query1);
                    $sql = "DELETE FROM `logo` WHERE ID = 1";
                    $query = mysqli_query($dbconnect, $sql);
                    $sil = $kayit['LOGO_ADMIN'];
                    unlink($sil);
                    mysqli_close($dbconnect);
                    header("Location: logoYonetimi.php");
                }
            ?>
            <form>
                <input type="submit" name="sil" id="sil" value="Sil" />
            </form>
        </div>
    </div>
    <div class="row py-2 justify-content-center align-items-center">
        <div class="col-6 d-flex justify-content-center">
            <?php echo $error; ?>
        </div>
    </div>
</div>

</body>
</html>
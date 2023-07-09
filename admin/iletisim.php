<?php include "./assets/timeout.php" ?>
<?php include "./assets/login-control.php"; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php include "./assets/head.php" ?>
    <title>İletişim Paneli</title>
</head>
<body>
    
<?php include "./assets/menu.php" ?>
<?php
    $check = "";
    if(isset($_GET['okunmusMesajGoster']))
    {
        $check = "checked";
    }
?>
    <div class="refresh"><a href="iletisim.php"><i class="fas fa-redo-alt"></i></a></div>
    <div class="container py-5">
        <!-- <div class="row">
            <div class="col-lg-12">
                <form method="GET">
                    <input type="checkbox" name="okunmusMesajGoster" onchange="this.form.submit()" id="goster" echo $check;>
                    <label for="goster">&nbsp;Okunmuş mesajları göster</label>
                </form>
            </div>
        </div> -->
            <?php
                if(isset($_REQUEST['okunmusMesajGoster']))
                {
                    
                } else {
                    print <<<mesajGoster
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <form method="GET">
                    mesajGoster;

                                $error = "";
                                include "properties/veritabani.php";
                                $sql = "SELECT * FROM `contact` WHERE `DURUM` = 1";
                                $query = mysqli_query($dbconnect, $sql);
                                if(mysqli_num_rows($query) > 0) {
                                    while($kayit = mysqli_fetch_assoc($query))
                                    {
                                        extract($kayit);
                                        print <<<yaz
                                        <div class="input-group my-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text contactRadio">
                                                    <input type="radio" name="mesaj" onchange="this.form.submit()" value="$ID">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Text input with radio button" value="$AD" readonly>
                                        </div>
                                        yaz;
                                        $radio = "";
                                    }
                                    mysqli_close($dbconnect);
                                } else {
                                    $error = "<div class='alert alert-warning' role='alert'>Veri bulunamadı.</div>";
                                }
                                print <<<mesajGoster
                                </form>
                                </div>
                                <div class="col-lg-8 col-md-5 col-sm-12">
                                <form action="" method="POST">
                                <div class="row py-3 justify-content-center text-center">
                                mesajGoster;
                                if(isset($_GET['mesaj']))
                                {
                                    $mesaj = $_GET['mesaj'];
                                    include "properties/veritabani.php";
                                    $sql = "SELECT * FROM `contact` WHERE `DURUM` = 1 AND `ID` = $mesaj";
                                    $query = mysqli_query($dbconnect, $sql);
                                    $kayit = mysqli_fetch_assoc($query);
                                    extract($kayit);
                                    print <<<kayital
                                        <div class="col-8 py-3">$AD $SOYAD</div>
                                        <div class="col-8 py-3"><a class="contacta" href="mailto:$EMAIL">$EMAIL</a></div>
                                        <div class="col-8 py-3">$TELEFON</div>
                                        <div class="col-8 py-3">$MESAJ</div>
                                        <div class="col-8 py-3">
                                            <input class="contactBtn py-2 px-4" type="submit" name="okundu" value="Okundu">
                                        </div>
                                        kayital;
                                        mysqli_close($dbconnect);
                                }
                    print <<<mesajGoster
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row text-center">
                    mesajGoster;
                        echo "<div class='col-12'>";
                        echo $error;
                        echo "</div>";
                    echo "</div>";
                }
            ?>
            
    </div>



</body>
    </html>

<?php
    if(isset($_POST['okundu']) && !empty($mesaj))
    {
        include "properties/veritabani.php";
        $sql = "UPDATE `contact` SET `DURUM` = 0 WHERE `ID` = $mesaj";
        mysqli_query($dbconnect, $sql);
        mysqli_close($dbconnect);
    }
?>
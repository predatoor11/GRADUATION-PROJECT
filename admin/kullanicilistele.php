<?php include "./assets/timeout.php" ?>
<?php include "./assets/login-control.php"; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php include "./assets/head.php"; ?>
    <title>Kullanıcı Listele</title>
</head>
<body>
    <?php include "./assets/menu.php"; ?>

    <div class="container padding-100">
        <div class="row">
            <div class="col-lg-12 px-5 d-flex justify-content-end">
                <form>
                    <input type="text" name="search-text" id="search-text" class="text" placeholder="USERNAME or RECORD_DATE">
                    <input type="submit" name="search" id="search" class="submit2" value="Ara">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 px-5 py-3 d-flex justify-content-center">
<?php
    include "./properties/veritabani.php";
    $error = "";
    // FİLTRELEME MANTIĞININ BULUNDUĞU KULLANICILARI LİSTELEYEN ALAN
    if(isset($_REQUEST['search'])) 
    {
        $valueToSearch = $_REQUEST['search-text'];
        $sql = "SELECT * FROM login WHERE CONCAT(`USERNAME`, `RECORD_DATE`) LIKE '%".$valueToSearch."%'";
        $query = mysqli_query($dbconnect, $sql) or die("Query error: <b>$sql<hr></b>");
        if(mysqli_num_rows($query) > 0)
        {
            print "<table class='listele' border='1' cellpadding='15' cellspacing='5'><tbody>";
            print "<tr>";
            while($baslik = mysqli_fetch_field($query))
            {
                print "<th>".$baslik->name."</th>";
            }
            print "</tr>";
            while($kayit = mysqli_fetch_assoc($query))
            {
                print "<tr>";
                    print "<td>".$kayit['ID']."</td>";
                    print "<td>".$kayit['USERNAME']."</td>";
                    print "<td>".$kayit['PASSWORD']."</td>";
                    print "<td>".$kayit['AKTIF']."</td>";
                    print "<td>".$kayit['ADMIN']."</td>";
                    print "<td>".$kayit['YETKILI']."</td>";
                    print "<td>".$kayit['RECORD_DATE']."</td>";
                    print "<td>".$kayit['UPDATE_DATE']."</td>";
                    print "<td>".$kayit['WHO_CREATED']."</td>";
                print "</tr>";
            }
            print "</tbody></table>";
        }
        else
        {
            print "<b>Böyle bir sonuç bulunmamaktadır.</b>";
        }
    }
    else
    {
        // KULLANICILARI DİREKT LİSTELEYEN ALAN
        $sql = "SELECT * FROM login";
        $query = mysqli_query($dbconnect, $sql) or die("Query error: <b>$sql<hr></b>");
        if(mysqli_num_rows($query) > 0)
        {
            print "<table class='listele' border='1' cellpadding='15' cellspacing='5'>";
            print "<tbody><tr>";
            while($baslik = mysqli_fetch_field($query))
            {
                print "<th>".$baslik->name."</th>";
            }
            print "</tr>";
            while($kayit = mysqli_fetch_assoc($query))
            {
                print "<tr>";
                    print "<td>".$kayit['ID']."</td>";
                    print "<td>".$kayit['USERNAME']."</td>";
                    print "<td>".$kayit['PASSWORD']."</td>";
                    print "<td>".$kayit['AKTIF']."</td>";
                    print "<td>".$kayit['ADMIN']."</td>";
                    print "<td>".$kayit['YETKILI']."</td>";
                    print "<td>".$kayit['RECORD_DATE']."</td>";
                    print "<td>".$kayit['UPDATE_DATE']."</td>";
                    print "<td>".$kayit['WHO_CREATED']."</td>";
                print "</tr>";
            }
            print "</tbody></table>";
        }
        else
        {
            echo "<b>Tabloda <u>Veri</u> bulunmamaktadır.</b>";
        }
    }
    // SİLME İŞLEMİNİN YAPILDIĞI BÖLÜM
    if(isset($_REQUEST['delete']))
    {
        if(!empty($_REQUEST['delete1']))
        {
            $sil1 = $_REQUEST['delete1'];
            if(empty($_REQUEST['delete2']))
            {
                $sql = "DELETE FROM `login` WHERE `ID` = $sil1";
            } else {
                $sil2 = $_REQUEST['delete2'];
                $sql = "DELETE FROM `login` WHERE `ID` BETWEEN $sil1 AND $sil2";
            }
            mysqli_query($dbconnect, $sql) or die ("Error: $sql");
            header("Location: kullanicilistele.php");
        } else {
            $error = "' ID ' kısmı boş bırakılamaz.";
        }
    }
    mysqli_close($dbconnect);
?>
            </div>
        </div>
        <form> <!-- Form Başlangıcı -->
        <div class="row">
            <div class="col-lg-12 px-5 d-flex justify-content-end">
                <label class="label-control">İşlemi gerçekleştirmek için <u>ONAY</u> kutusunu işaretleyiniz.
                    <input type="checkbox" name="confirm-to-delete" id="confirm-to-delete" class="onay" required>
                </label>
                <input type="text" name="delete1" id="delete1" class="text-small" placeholder="ID" required>
                <input type="text" name="delete2" id="delete2" class="text-small" placeholder="between to ID">
                <input type="submit" name="delete" id="delete" class="submit2" value="Sil">
            </div>
            <div class="col-lg-12 px-5 py-4 d-flex justify-content-end error"><?php echo $error; ?></div>
        </div>
        </form> <!-- Form Bitişi -->
    </div>
    
</body>
</html>
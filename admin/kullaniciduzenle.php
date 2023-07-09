<?php include "./assets/timeout.php" ?>
<?php include "./assets/login-control.php"; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php include "./assets/head.php" ?>
    <title>Kullanıcı Düzenle</title>
</head>
<body>
    <?php include "./assets/menu.php" ?>

    <div class="container padding-100">
        <form>
        <div class="row">
            <div class="col-lg-12 py-2 d-flex justify-content-center">
                <input type="text" name="search" id="search" placeholder="USERNAME" class="text">
            </div>
            <div class="col-lg-12 py-2 d-flex justify-content-center">
                <input type="submit" name="select" id="select" value="Ara" class="submit2">
            </div>
        </div>
        </form>
    </div>
    <?php
        $error = "";
        $aktif_checked = "";
        $admin_checked = "";
        $yetkili_checked = "";
        if(isset($_REQUEST['select']) && !empty($_REQUEST['search']))
        {
            include "./properties/veritabani.php";
            $select = $_REQUEST['search'];
            $sql = "SELECT * FROM login WHERE CONCAT(`ID`, `USERNAME`) LIKE '%$select%'";
            $query = mysqli_query($dbconnect, $sql);
            if(mysqli_num_rows($query) == 1)
            {
                while($kayit = mysqli_fetch_assoc($query))
                {
                    $ID = $kayit['ID'];
                    $username = $kayit['USERNAME'];
                    $aktif = $kayit['AKTIF'];
                    $admin = $kayit['ADMIN'];
                    $yetkili = $kayit['YETKILI'];
                }
                if($aktif == 1)
                {
                    $aktif_checked = "checked";
                } else {
                    $aktif_checked = "";
                }
                if($admin == 1)
                {
                    $admin_checked = "checked";
                } else {
                    $admin_checked = "";
                }
                if($yetkili == 1)
                {
                    $yetkili_checked = "checked";
                } else {
                    $yetkili_checked = "";
                }
            } else {
                header("Location: kullaniciduzenle.php");
            }
            mysqli_close($dbconnect);
        } else {
            $ID = "BOŞ DEĞER";
            $username = "BOŞ DEĞER";
        }
?>
    <div class="container padding-50">
        <div class="row">
            <div class="col-lg-12 py-2 d-flex justify-content-center">
                <table border="0" class="kullanici-duzenle">
            <form method="post">
                    <tr>
                        <td>
                            <span class="update-text">ID:</span>
                        </td>
                        <td>
                            <input type="text" name="id" disabled value="<?php echo "$ID" ?>" class="update-input">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="update-text">USERNAME:</span>
                        </td>
                        <td>
                            <input type="text" name="new-username" disabled value="<?php echo "$username" ?>" class="update-input">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="update-text">PASSWORD:</span>
                        </td>
                        <td>
                            <input type="password" name="password" id="password" minlength="4" maxlength="16" class="update-input">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="update-text">CONFIRM PASSWORD:</span>
                        </td>
                        <td>
                            <input type="password" name="cpassword" id="cpassword" minlength="4" maxlength="16" class="update-input">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="update-text">AKTIF:</span>
                        </td>
                        <td>
                            <input type="checkbox" name="aktif" <?php echo $aktif_checked; ?> >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="update-text">ADMIN:</span>
                        </td>
                        <td>
                            <input type="checkbox" name="admin" <?php echo $admin_checked; ?> >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="update-text">YETKILI:</span>
                        </td>
                        <td>
                            <input type="checkbox" name="yetkili" <?php echo $yetkili_checked; ?> >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="update-text label-control">İşlem yapabilmek için <u>ONAY</u> kutucuğunu işaretleyiniz.</span>
                        </td>
                        <td>
                            <input type="checkbox" name="confirm" id="confirm" required class="onay">
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2">
                            <input type="submit" name="update" value="Güncelle" class="submit2">
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="6" class="error"><?php echo $error; ?></td>
                    </tr>
            </form>
                </table>
            </div>
        </div>
    </div>
    <?php
        $error = "";
        if(isset($_REQUEST['update']))
        {
            $password = trim($_REQUEST['password'], " ");
            $cpassword = trim($_REQUEST['cpassword'], " ");
            if(!empty($password) && !empty($cpassword) && $password === $cpassword)
            {
                if(strlen($password) >= 4 && strlen($password) <= 16 )
                {
                    $hashpassword = md5(sha1($password));
                    if(isset($_REQUEST['confirm']))
                    {
                        include "./properties/veritabani.php";
                        $sql = "UPDATE login SET PASSWORD = '$hashpassword' WHERE ID = $ID";
                        $query = mysqli_query($dbconnect, $sql);
                        mysqli_close($dbconnect);
                        $error = "Güncelleme başarıyla kaydedildi.";
                    } else {
                        $error = "İşlemleri gerçekleştirebilmek için ONAY butonunu işaretleyiniz.";
                    }
                } else {
                    $error = "Şifreler min=4, max=16 karakterden oluşmalıdır.";
                } 
            }
            if(isset($_REQUEST['aktif']))
            {
                $aktif = 1;
            } else {
                $aktif = 0;
            }
            if(isset($_REQUEST['admin']))
            {
                $admin = 1;
            } else {
                $admin = 0;
            }
            if(isset($_REQUEST['yetkili']))
            {
                $yetkili = 1;
            } else {
                $yetkili = 0;
            }
            
            include "./properties/veritabani.php";
            $sql = "UPDATE `login` SET `AKTIF` = $aktif, `ADMIN` = $admin, `YETKILI` = $yetkili WHERE ID = $ID";
            $query = mysqli_query($dbconnect, $sql);
            mysqli_close($dbconnect);
            $error = "Güncelleme başarıyla kaydedildi.";
        }
    
    ?>

    <script>
        var password = document.getElementById("password")
        , confirm_password = document.getElementById("cpassword");

        function validatePassword() {
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Şifreler uyuşmuyor.");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
</body>
</html>
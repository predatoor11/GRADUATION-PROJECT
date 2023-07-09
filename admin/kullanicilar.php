<?php include "./assets/timeout.php" ?>
<?php include "./assets/login-control.php"; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php include "./assets/head.php"; ?>
    <title>Kullancı Ekle</title>
</head>
<body>
<?php include "./assets/menu.php"; ?>
<?php
    $error = "";
    if(isset($_REQUEST['ekle']))
    {
        include "./properties/veritabani.php";
        // username değişkenine veriyi çekip, veritabanında bu veriden var olup olmadığını sorguluyoruz.
        $username = $_REQUEST['username'];

        $sorgu = "SELECT * FROM login";
        $sonuc = mysqli_query($dbconnect, $sorgu);
        $verisayisi = mysqli_num_rows($sonuc);
        $username_confirm = false;
        for($i = 0; $i < $verisayisi; $i++)
        {
            $cikti = mysqli_fetch_assoc($sonuc);
            $control[$i] = $cikti['USERNAME'];
            if($username === $control[$i])
            {
                $username_confirm = true;
                break;
            }
            else {
                $username_confirm = false;
            }
        }
        if($username_confirm !== true)
        {
            $aktif = 0;
            $admin = 0;
            $yetkili = 0;
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

            if(isset($_REQUEST['confirm']))
            {
                $password = trim($_REQUEST['sifre'], " ");
                $cpassowrd = trim($_REQUEST['tsifre'], " ");
                
                if(strlen($password) >= 4 && strlen($cpassowrd) <= 16 && $password === $cpassowrd)
                {
                    $loginName = $_SESSION['username'];
                    $hashpassword = md5(sha1($password));
                    $sql = "INSERT INTO `login` (`ID`, `USERNAME`, `PASSWORD`, `AKTIF`, `ADMIN`, `YETKILI`, `RECORD_DATE`, `UPDATE_DATE`, `WHO_CREATED`) VALUES (NULL, '$username', '$hashpassword', $aktif, $admin, $yetkili, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '$loginName')";
                    mysqli_query($dbconnect, $sql);
                    $error = "Kullanıcı başarıyla kaydedildi.";
                    header("Location: kullanicilar.php");
                }
                else
                {
                    $error = "Şifreniz kurallara uygun değildir!";
                }
            }
            else
            {
                $error = "İşlemleri tamamlamak için ONAY butonunu işaretleyiniz.";
            }
        }
        else
        {
            $error = "Böyle bir kullanıcı adı bulunmaktadır.";
        }
        mysqli_close($dbconnect);
    }
?>
<div class="container padding-100 d-flex justify-content-center">
    <div class="row">
        <form method="POST">
            <div class="col-lg-12 p-2">
                <input type="text" class="text" name="username" required placeholder="Kullanıcı Adı">
            </div>
            <div class="col-lg-12 p-2">
                <input type="password" class="text text-control" name="sifre" id="sifre" minlength="4" maxlength="16" required placeholder="Şifre"> <!-- required ekle -->
            </div>
            <div class="col-lg-12 p-2">
                <input type="password" class="text text-control" name="tsifre" id="tsifre" minlength="4" maxlength="16" required placeholder="Tekrar Şifre">
            </div>
            <div class="col-lg-12">
                <table class="table-kullanici" border="1">
                    <tr>
                        <td>
                            <label class="label">Aktif&nbsp;</label>
                        </td>
                        <td>
                            <input type="checkbox" class="checkbox" name="aktif">
                        </td>
                        <td>
                            <label class="label">Admin&nbsp;</label>
                        </td>
                        <td>
                            <input type="checkbox" class="checkbox" name="admin">
                        </td>
                        <td>
                            <label class="label">Yetkili&nbsp;</label>
                        </td>
                        <td>
                            <input type="checkbox" class="checkbox" name="yetkili">
                        </td>
                    </tr>
                    <tr>
                        <td class="uyari" colspan="6">* Checkbox işaretli değilse <b><u>aktif</u></b> Değer Sıfırdır.</td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <label class="label-control">İşlemi gerçekleştirmek için <u>ONAY</u> kutusunu işaretleyiniz.
                                <input type="checkbox" name="confirm" id="confirm" class="onay" required>
                            </label>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-8 p-2">
                <button type="submit" name="ekle" class="submit"><span>Kullanıcı oluştur</span></button>
            </div>
            <div class="col-lg-4 p-2"><p id="control"></p></div>
            <div class="col-lg-12 p-2 error"><?php echo $error; ?></div>
        </form>
    </div>
</div>

<script>
    var password = document.getElementById("sifre")
    , confirm_password = document.getElementById("tsifre");

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
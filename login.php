<?php
        unset($_SESSION);
        session_start();
        session_destroy();
        session_start();
        ob_start();
    if(isset($_POST['login']))
    {
        
        include "admin/properties/veritabani.php";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $username_confirm = false;
        $hashpassword = md5(sha1($password));

        $sorgu = "SELECT * FROM login WHERE USERNAME IN ('$username')";
        $query = mysqli_query($dbconnect, $sorgu) or die("Query error: <b>$sorgu<hr></b>");

        if(!empty($username) && !empty($password))
        {
            $verisayisi = mysqli_num_rows($query);
            $error = "&nbsp;";
            for($i = 0; $i < $verisayisi; $i++)
            {
                $kayit = mysqli_fetch_assoc($query);
                $control[$i] = $kayit['USERNAME'];
                if($username == $control[$i])
                {
                    $username_confirm = true;
                    break;
                }
                else {
                    $username_confirm = false;
                }
            }
            if($username_confirm == true)
            {
                $sorgu = "SELECT * FROM `login` WHERE `USERNAME` IN ('$username') and `PASSWORD` IN ('$hashpassword')";
                $query = mysqli_query($dbconnect, $sorgu) or die("Query error: <b>$sorgu<hr></b>");
                if($kayit['USERNAME'] == $username && $kayit['PASSWORD'] == $hashpassword)
                {
                    $sorgu = "SELECT * FROM login WHERE USERNAME IN ('$username') and PASSWORD IN ('$hashpassword') and AKTIF = 1 and ADMIN = 1 and YETKILI = 1";
                    $query = mysqli_query($dbconnect, $sorgu) or die("Query error: <b>$sorgu<hr></b>");
                    if($kayit['AKTIF'] == 1)
                    {
                        if($kayit['ADMIN'] == 1)
                        {
                            $_SESSION["login"] = "admin";
                            $_SESSION["username"] = $username;
                            $_SESSION["password"] = $hashpassword;
                            $_SESSION["admin"] = $kayit['ADMIN'];
                            $_SESSION["last_login_timestamp"] = time();
                            header('location: admin/index.php');
                            exit;
                            // ADMIN PANELİNE YÖNLENDİRME
                        } else {
                            $_SESSION["login"] = "user";
                            $_SESSION["username"] = $username;
                            $_SESSION["password"] = $hashpassword;
                            $_SESSION["admin"] = $kayit['ADMIN'];
                            $_SESSION["last_login_timestamp"] = time();
                            header('location: index.php');
                            exit;
                            // UYGULAMAYA YÖNLENDİRME
                        }
                    } else {
                        $error = "<h4>Hesap Aktif değil.</h4>";
                    }
                } else {
                    $error = "<h4>Kullanıcı adı veya şifre hatalı.</h4>";
                    echo $username."<br>".$hashpassword;
                }
            } else {
                $error = "<h4>Böyle bir kullanıcı adı mevcut değil.</h4>";
            }
        } else {
            $error = "<h4>Kullanıcı adını ve şifreyi boş bırakamazsınız.</h4>";
        }
    }
    ob_end_flush();
?>
<!DOCTYPE html>
<html lang="tr">
<head>

    <?php include "assets/login.php"; ?>
    <?php
        include "admin/properties/veritabani.php";
        $sql = "SELECT ID, LOGO FROM `logo` WHERE ID = 1";
        $query = mysqli_query($dbconnect, $sql);
        mysqli_close($dbconnect);
        $logo = "";
        if(mysqli_num_rows($query))
        {
            $kayit = mysqli_fetch_assoc($query);
            $logo = $kayit['LOGO'];
        }
    ?>
    <?php echo "<link rel='icon' href='$logo'>"; ?>
    
    <title>GIRIS YAP</title>
</head>
<body>

    <div class="register-img"></div>

    <form method="POST">
    <div class="login-container">
        <div class="mid">
            <div class="left">
                <div class="img">
                    <img src="img/authentication.svg" alt="">
                </div>
                <div class="baslik">
                    <h2>Giriş yap</h2>
                </div>
            </div>
            <div class="right login">
                <div class="row">
                    <input class="text" type="text" name="username" id="username" placeholder="Username" value="admin">
                </div>
                <div class="row">
                    <input class="text" type="password" name="password" id="password" placeholder="Password" value="1234">
                </div>
                <div class="row">
                    <input class="button1" type="submit" name="login" value="Giriş yap">
                    <!-- <input class="button2" type="button" onclick="window.location='register.php'" value="Kayıt ol"> -->
                </div>
            </div>
        </div>
        <div class="error">
            <h4><?php
                    if(!empty($error)) { echo "$error"; } else { echo ""; }
                ?>
            </h4>
        </div>
    </div>
    </form>

</body>
</html>
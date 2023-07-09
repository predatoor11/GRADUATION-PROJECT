<?php
/*if(isset($_REQUEST['register']))
{
    header("Location: register.php");
}
    if($_POST)
    {
         session_start();
        ob_start();
        
        include "./admin/properties/veritabani.php";
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(!empty($username) || !empty($password))
        {

            $hashpassword = md5(sha1($password));

            $sorgu = "SELECT * FROM login WHERE USERNAME IN ('$username') and PASSWORD IN ('$hashpassword')";
            $query = mysqli_query($dbconnect, $sorgu) or die("Query error: <b>$sorgu<hr></b>");
            $error = "&nbsp;";
            if(mysqli_num_rows($query) == 1)
            {
                $_SESSION["login"] = "true";
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $hashpassword;
                $_SESSION["last_login_timestamp"] = time();
                $error = "<div class=\"error\"><h6>Giriş başarıyla yapıldı.</h6></div>";
                //sleep(2);
                header('location:index.php');
            } else {
                //echo "<script>alert('Wrong username or password');</script>";
                $error = "<div class=\"error\"><h6>Kullanıcı adı veya şifre hatalı!</h6></div>";
                //echo "<script>setTimeout(function(){ window.location = 'login.php'; }, 100);</script>";
            }
        } else {
            $error = "<div class=\"error\"><h6>Kullanıcı adını ve şifreyi boş bırakamazsınız.</h6></div>";
        }
        
        ob_end_flush();
    } */
?>
<!DOCTYPE html>
<html lang="tr">
<head>

    <?php include "./assets/login.php" ?>
    
    <title>KAYIT OL</title>
</head>
<body>
    <!-- <form method="POST">
    <div class="login-container">
        <div class="login-box">
            <div class="header">
                <h2>Kayıt ol</h2>
            </div>
            <div class="login">
                <div class="input">
                    <input class="text" type="email" name="email" placeholder="E-mail" >
                </div>
                <div class="input">
                    <input class="text" type="text" name="username" id="username" placeholder="Username" >
                </div>
                <div class="input">
                    <input class="text" type="password" name="password" id="password" placeholder="Password" >
                </div>
                <div class="input">
                    <input class="text" type="password" name="cpassword" id="cpassword" placeholder="Repeat Password" >
                </div>
                <div class="input">
                    <input class="login-btn" type="submit" name="login" value="Kayıt ol">
                    <input class="login-btn" type="button" onclick="window.location='login.php'" value="Giriş yap">
                </div>
                    if(!empty($error))
                    {
                        echo "$error"; 
                    } else {
                        echo "";
                    }
            </div>
        </div>
    </div>
    </form> -->

    <div class="register-img"></div>

    <div class="login-container">
        <div class="mid">
            <div class="left">
                <div class="img">
                    <img src="img/mobile-login.svg" alt="">
                </div>
                <div class="baslik">
                    <h2>Kayıt ol</h2>
                </div>
            </div>
            <form method="post">
            <div class="right">
                <div class="row">
                    <input type="email" name="email" placeholder="E-mail" required>
                </div>
                <div class="row">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="row">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="row">
                    <input type="password" name="cpassword" id="cpassword" placeholder="Repeat Password" required>
                </div>
                <div class="row">
                    <input class="button1" type="submit" name="login" value="Kayıt ol">
                    <input class="button2" type="button" onclick="window.location='login.php'" value="Giriş yap">
                </div>
            </div>
            </form>
        </div>
    </div>


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
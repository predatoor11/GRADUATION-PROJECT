<?php
    $error = "";
    if(isset($_POST['contact']))
    {
        extract($_POST);
        if(isset($check))
        {
            if(!empty($name) && !empty($surname) && !empty($email) && !empty($tel) && !empty($message))
            {
                include "admin/properties/veritabani.php";
                $sql = "INSERT INTO `contact` (AD, SOYAD, EMAIL, TELEFON, MESAJ, DURUM) 
                VALUES ('$name','$surname','$email','$tel','$message', 1)";
                mysqli_query($dbconnect, $sql);
                $error = "<div class='alert alert-success' role='alert'>Mesajınız başarıyla iletildi.</div>";
                header("Refresh:2;URL=iletisim.php");
            } else {
                $error = "<div class='alert alert-danger' role='alert'>Boş alan bırakmayınız.</div>";
            }
        } else {
            $error = "<div class='alert alert-danger' role='alert'>Formu göndermek için onay vermelisiniz.</div>";
        }
    }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php include "assets/head.php"; ?>
    <title>İletişim</title>
</head>
<body>
    
    <?php include "assets/menu.php"; ?>

    <div class="container py-3">
        <div class="row">
            <div class="contact-container">
                <div class="contact"><h3>Email</h3><a href="mailto:dogunigar@hotmail.com"><span>dogunigar@hotmail.com</span></a></div>
                <div class="contact"><h3>Telefon</h3><a href="tel:+905394462823"><span>0539 446 2823</span></a></div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col">
                <form method="POST" style="color: #fff;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Ad</label>
                            <input type="text" class="form-control" name="name" id="inputName" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputSurname">Soyad</label>
                            <input type="text" class="form-control" name="surname" id="inputSurname" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" name="email" id="inputEmail" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputTel">Telefon</label>
                            <input type="text" class="form-control" name="tel" id="inputTel" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea">Mesajınız</label>
                        <textarea class="form-control" name="message" id="exampleFormControlTextarea" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Formu onaylayınız.
                            </label>
                        </div>
                    </div>
                    <button type="submit" name="contact" class="btn btn-primary">Mesajı Gönder</button>
                </form>
            </div>
        </div>
        <div class="row"><div class="col-12"><?php echo $error; ?></div></div>
    </div>

    <?php include "assets/footer.php"; ?>
    
</body>
</html>
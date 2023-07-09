<!DOCTYPE html>
<html lang="tr">
<head>
    <?php include "assets/head.php"; ?>
    <title>Card</title>
</head>
<body>

    <div class="container p-5">
        <div class="row">
            <div class="card-container">
                
<?php

    include "admin/properties/veritabani.php";

    $sql = "SELECT * FROM `CARD` ORDER BY `card`.`SIRA` ASC";
    $query = mysqli_query($dbconnect, $sql);
    if(mysqli_num_rows($query) > 0)
    {
        while($kayit = mysqli_fetch_assoc($query))
        {
            echo "
            <div class='card'>
                <div class='front'>
                    <div class='header'><h4>".$kayit['RESTAURANT']."</h4></div>
                    <div class='content'>
                        <div class='background'>
                            <div class='info'>
                                <a href='#'><i class='fas fa-mobile-alt'></i>&nbsp;&nbsp;".$kayit['ADDRESS']."</a>
                                <br>
                                <a href='tel:".$kayit['NUMBER']."'><i class='fas fa-map-marker-alt'></i>&nbsp;&nbsp;".$kayit['NUMBER']."</a>
                            </div>
                            <div class='rating'>
                                    <label>".$kayit['RATING']."%</label>
                                <div class='star-ratings-sprite'>
                                    <span style='width: ".$kayit['RATING']."%' class='star-ratings-sprite-rating'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='footer'>
                        <a href='".$kayit['DETAY']."'><span>Rezervasyon Yap</span></a>
                    </div>
                </div>
            </div>";
        }
    }

?>
            </div>
        </div>
    </div>
    <script>
        let today = new Date().toISOString().substr(0, 10);
        document.querySelector("#today").value = today;

        document.querySelector("#today2").valueAsDate = new Date();
    </script>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="js/card.js"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/9ff000c9ce.js"></script>
</body>
</html>
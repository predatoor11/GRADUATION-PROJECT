<?php
    $dbconnect = mysqli_connect("localhost", "root", "") or die("Veritabanı sunucusuna bağlanılamadı.");
    mysqli_select_db($dbconnect, "proje") or die ("Veritabanı seçilemedi.");
    mysqli_set_charset($dbconnect, 'utf8');
?>
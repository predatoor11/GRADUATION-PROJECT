<!DOCTYPE html>
<html lang="tr">
<head>
    <title>PHP</title>
</head>
<body>
<?php
    // $toplam = 0;
    // $di2 = array (7, 12, 20, 32);
    // foreach ($di2 as $v)
    // {
    //     $toplam += $v;
    // }
    // print "<p>Toplam: $toplam</p>";

    // $id1 = array(24 => "Ali", "Ankara" => 844, "Pi" => 3.14159, 2.4 => 8);
    // print $id1[24];
    // $id1[24] = "Ayse"; // anahtar=24 olan elemanın değeri değişti.
    // $id2[20608888] = "Fatma Girik"; // diziye yeni eleman eklendi.
    // foreach ($id2 as $id => $name)
    // { print "<b>$id</b>: $name<br />"; }
    // $diller = array ("TR" => "Turkce", "ENG" => "English",
    // "GER" => "German", "SPA" => "Spanish");
    // foreach ($diller as $dil => $name)
    // {
    // print "$dil : $name<br/>";
    // }
    // $soyad = "Nigar";
    // $ad = "Doğu";
    // $soyadad = $soyad . ", " . $ad;
    // print "<h1 style='text-align: center;'>$soyadad</h1>";
    // function my_func ()
    // {
    //     print "Merhaba Antalya!";
    // }
    // my_func();
    // $ad = "Doağua";
    // function say_a ($dizgi)
    // {
    //     $n = substr_count($dizgi, "a");
    //     return ($n);
    // }
    // $x = say_a ($ad);
    // print $x;
    // function ykskYaz ($yksk = 100)
    // {
    // echo "Yükseklik: $yksk<br/>";
    // }
    // ykskYaz (320);
    // ykskYaz (); // varsayılan 100
    // ykskYaz (80);
    // function sayilar_oku ($a, $b)
    // {
    //     $sayilar = array($a, $b);
    //     // ...
    //     // $sayilar dizisine değerler
    //     // koymak için gereken PHP satırları
    //     // ...
    //     return ($sayilar);
    // } // end function sayilar_oku
    // $x = sayilar_oku (32, 5);
    // print $x[0];

    // $fp = fopen("file/sea.txt", "r");
    // $line = file("file/sea.txt");
    // fwrite($fp, "Doğu Nigar");
    // foreach($line as $sa)
    // {
    //     print "$sa<br>";
    // }
    // unlink ("file/speaker-4.jpg");
    // for ($i=1; $i<=7; $i++)
    // {
    //     print "<font size=$i><br><b>PHP Öğreniyorum!</b></font>";
    // }
    // $ad = "Doğu";
    // if (isset($ad))
    // {
    //     setcookie("ad", $ad);
    // }
    // if (isset($_COOKIE)) // Eğer çerez varsa...
    // {
    //     foreach ($_COOKIE as $ck => $val)
    //     { print "<dd>Cookie name: $ck; value: $val</dd>\n"; }
    // }

    // print "<p>IP adresiniz: {$_SERVER["SERVER_NAME"]}</p>";
?>
<?php

        // $con = mysqli_connect("localhost", "root","") or die ("Veritabanına bağlanılamadı.");
        // mysqli_select_db($con, "php") or die ("Veritabanı Seçilemedi.");
        
        
        // $sql = "SELECT * FROM `login`";
        // $query = mysqli_query($db, $sql);
        // if(mysqli_num_rows($query) > 0)
        // {
        //     while($result = mysqli_fetch_assoc($query))
        //     {
        //         echo "<p>".$result['USERNAME']."</p>";
        //     }
        // } else {
        //     echo "<h1>Hata</h1>";
        // }
        // $a = "../test.php";
        // touch($a);
        // $dosya = fopen($a, 'r+');
        // $icerik = fread($dosya, filesize($a));
        // echo $icerik;
        // // fwrite($dosya, 'Merhaba Dünya');
        // fclose($dosya);
        // $a = "Asmani Restaurant, Antalya’nın Akdeniz ve Beydağları’na bakan muhteşem manzarasını enfes kokulu eşsiz tatlarla bezenmiş lezzet şölenleriyle bir araya getiriyor. Barut Ailesi imzalı restaurant, tazeliği rehber alırken en doğal ürünleri bahçeden sofranıza taşıyor. Adını ise Osmanlıca’da ‘gökyüzüne, aya ve güneşe ait olan yer’ olan Asmani’den alıyor. Antalya'nın en huzurlu manzarasını ayaklarınızın altına almak istiyorsanız, Asmani mutlaka uğramanız gereken bir restaurant.";
        // if($b = strlen($a))
        // {
        //     echo $b;
        // }
        // print "<form method='GET'>";
        // print '<select name="time">';
        // print '<option value="">Saat seçiniz..</option>';
        // include "properties/veritabani.php";
        // $sql = "SELECT * FROM `saat`";
        // $query = mysqli_query($dbconnect, $sql);
        // mysqli_close($dbconnect);
        // while($kayit = mysqli_fetch_assoc($query))
        // {
        //     $time = $kayit['SAAT'];
        //     $id = $kayit['ID'];
        //     print <<<saat
        //         <option value="$id">$time</option>
        //     saat;
        // }
        // print '</select>';
        // print '<input type="submit" name="gn" value="Gönder" />';
        // print '</form>';

        // if(isset($_REQUEST['gn']))
        // {
        //     extract($_POST);
        //     $text = $_REQUEST['time'];
        //     echo $text;
        // }
        if(isset($_REQUEST['yukle']))
        {
            $uploads = "img/restoranlar/";
                
            @$img_tmp = $_FILES["resim"]['tmp_name'];
            
            $img_way = $uploads . basename($img_name);
            $index = "admin/".$img_way;
            
            @move_uploaded_file($img_tmp, $img_way);
        }
?>
<input type="file" name=
</body>
    </html>
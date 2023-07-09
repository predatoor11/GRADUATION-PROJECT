<?php
    $kime = 'dogu_nigar_fb@hotmail.com';
    $konu = 'Test';
    $mesaj = 'Merhaba';
    mail($kime, $konu, $mesaj) or die("fail");
    
?>
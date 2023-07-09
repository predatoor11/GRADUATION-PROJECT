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
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<!-- Main CSS -->
<link rel="stylesheet" href="css/main.css" type="text/css">
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- Main JS -->
<script src="js/main.js"></script>
<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/9ff000c9ce.js"></script>

<?php echo "<link rel='icon' href='$logo'>"; ?>
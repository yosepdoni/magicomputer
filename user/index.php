<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <title>Magicomputer</title>
</head>
<body>
<?php
    include('../seslog.php'); 
    include "header.php";
?>
 <span hidden><?php echo $session_surel;?> </span>
    <!-- Main content -->
    <section class="content">
    <?php
        error_reporting(0);
        $page = $_GET['p'];

        if($page=="home"){
            include "../home.php";
        }else if($page=="logout"){
            include "../logout.php";
        }else if($page=="profil"){
            include "profil.php";
        }else if($page=="about"){
            include "../about.php";   
        }else if($page=="produk"){
            include "produk.php";
        }else if($page=="produk_detail"){
            include "produk_detail.php";
        }else if($page=="cart"){
            include "cart.php";
        }else if($page=="dlcrt"){
            include "delcart.php";
        }
    ?>
</section>
<?php
include "../template/footer.php"
// header("location: home.php", true, 301);

// exit();
?>
</body>
</html>

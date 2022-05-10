<!DOCTYPE html>
<html lang="fr">
<?php include 'vue/head.php'; 
include "modele/POO.php"; ?>
<body>
    <?php include 'vue/header.php'; 
    if (!isset($_SESSION["user"])) {
        include "modele/guest.php";
        
    }else {
        include "modele/islog.php";
    }
    ?>
    <script src="js/script.js"></script>
</body>
</html>
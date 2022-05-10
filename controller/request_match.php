<?php 
include "../modele/match_algo.php";
include "../modele/POO.php";
session_start();

match_result($_SESSION["user_b"]["ID"], $_GET["match_result"]);

header("Location: http://localhost:8000/index.php");
exit;
?>
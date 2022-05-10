<?php

include "POO.php";
include "loisir.php";
include "../controller/connexion_db.php";

if (isset($_POST["mail"]) && isset($_POST["password"])) {
    $query = "SELECT * FROM users WHERE mail='" . $_POST["mail"] . "' AND password='" . $_POST["password"] . "'";
    foreach ($db->query($query) as $key => $value) {
        if (($_POST["mail"] === $value["mail"]) && ($_POST["password"] === $value["password"])) {
            if ($value["enabled"] == 1)
            {    
                session_start();
                $_SESSION["user_info"] = $value;
                foreach (get_loisir($_SESSION["user_info"]["ID"]) as $key => $value) {
                    $_SESSION["user_loisir"][] = $value["loisir_name"];
                }
                $_SESSION["user"] = new user_meetic($id=$_SESSION["user_info"]["ID"], $name=$_SESSION["user_info"]["nom"], $firstname=$_SESSION["user_info"]["prenom"], $location=$_SESSION["user_info"]["ville"], $genre=$_SESSION["user_info"]["genre"], $loisir=$_SESSION["user_loisir"], $mail=$_SESSION["user_info"]["mail"], $password=$_SESSION["user_info"]["password"], $birth=$_SESSION["user_info"]["birth"], $id_picture=$_SESSION["user_info"]["id_picture"], $description=$_SESSION["user_info"]["description"]);
            }
        }
    }
    
}

header("Location: http://localhost:8000/index.php");
exit;
?>
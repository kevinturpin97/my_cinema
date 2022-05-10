<?php

include "../controller/get_age.php";
include "../controller/connexion_db.php";

if (isset($_POST["firstname"]) && isset($_POST["name"]) && isset($_POST["birth"]) && isset($_POST["genre"]) && isset($_POST["location"]) && isset($_POST["mail"]) && isset($_POST["password"]) && isset($_POST["loisir"])) {
    $date_convert = $_POST["birth"];
    $date_convert = explode("-", $_POST["birth"]);
    array_reverse($date_convert);
    $date_convert = implode("-", $date_convert);

    if (get_age($date_convert) < 18) {

        if ($_POST["genre"] == "femme") {
            $default_id_picture = "avatar_f.png";
        }
        else {
            $default_id_picture = "avatar_h.png";
        }

        $query = "INSERT INTO `users`(`nom`, `prenom`, `birth`, `genre`, `ville`, `mail`, `password`, `id_picture`) VALUES ('" . $_POST["name"] . "', '" . $_POST["firstname"] . "', '" . $date_convert . "', '" . $_POST["genre"] . "', '" . $_POST["location"] . "', '" . $_POST["mail"] . "', '" . $_POST["password"] . "', '" . $default_id_picture . "')";
        $db->exec($query);

        $get_id = $db->query("SELECT users.ID FROM users WHERE users.mail='" .$_POST["mail"]."' AND users.password='" .$_POST["password"]. "'");

        foreach ($get_id as $key => $n_value) {
            foreach ($_POST["loisir"] as $key => $value) {
                $db->exec("INSERT INTO `users_loisir`(`id_loisir`, `id_users`) VALUES ('".$value."', '".$n_value["ID"]."')");
            }
        }
    }
}

echo $value;
?>
<?php

include "../controller/connexion_db.php";

function get_profile()
{
    global $db;
    static $count = 0;
    static $count_bis = 1;

    $list_match = [];
    $query = "SELECT ID, prenom, nom, genre, ville, id_picture, birth, description FROM users WHERE enabled = 1 AND NOT ID=" . $_SESSION["user"]->getId();

    foreach ($db->query($query) as $key => $value) {
        $query = "SELECT * FROM list_match WHERE user_A=" . $_SESSION["user"]->getId() . " AND user_B=" . $value["ID"];

        foreach ($db->query($query) as $key => $value) {
            $count++;
        }

        if ($count == $count_bis) {
            $count_bis++;
        }
        else
        {
            return $value;
        }
    }
}

function match_result($user_b, $match_result)
{
    global $db;

    $query = "INSERT INTO `list_match`(`user_A`, `user_B`, `match_result`) VALUES ('" . $_SESSION["user"]->getId() . "', '" . $user_b . "', '" . $match_result . "');";
    $db->exec($query);
}

function match_reciproque()
{
    global $db;

    $list_match = [];
    $query = "SELECT * FROM list_match WHERE match_result='match' AND user_A=" . $_SESSION["user"]->getId();

    foreach ($db->query($query) as $key => $value) {
        $query = "SELECT * FROM list_match WHERE match_result='match' AND user_A=" . $value["user_B"] . " AND user_B=" . $_SESSION["user"]->getId();

        foreach ($db->query($query) as $key => $value) {
            $query = "SELECT ID, nom, prenom, birth, ville, genre, id_picture, description FROM users WHERE users.ID=" . $value["user_A"] . " AND NOT enabled = 0";

            foreach ($db->query($query) as $key => $value) {
                $list_match[] = $value;
            }
        }
    }
    
    return $list_match;
}

/* function id_to_user($id)
{
    global $db;

    $result = [];
    $query = "SELECT nom, prenom, genre, birth, ville, description, id_picture FROM users INNER JOIN list_match ON users.ID = list_match.user_A WHERE list_match.ID =" . $id . " AND NOT users.enabled=0";
    
    foreach ($db->query($query) as $key => $value) {
        return $value;
    }
} */
?>
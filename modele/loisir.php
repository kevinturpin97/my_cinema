<?php

include "controller/connexion_db.php";


function random_loisir()
{
    global $db;

    $query = "SELECT * FROM loisir ORDER BY RAND() LIMIT 6";
    return $db->query($query);
}

function get_loisir(int $id)
{
    global $db;

    $query = "SELECT * FROM users_loisir INNER JOIN loisir ON loisir.ID = users_loisir.id_loisir INNER JOIN users ON users.ID = users_loisir.id_users WHERE users.ID='" . $id . "';";
    return $db->query($query);
}
?>
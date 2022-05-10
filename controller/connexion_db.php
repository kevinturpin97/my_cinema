<?php

try {
    $db = new PDO (
        "mysql:host=localhost;dbname=my_amitic",
        "debian-sys-maint",
        "m8epZLpg06LYvjk3"
    );

} catch (\Throwable $th) {
    echo "Erreur de connexion:" . $th;
    exit;
}


?>
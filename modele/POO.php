<?php

include "controller/connexion_db.php";

class user_meetic {
    public string $name;
    public string $firstname;
    public string $location;
    public string $genre;
    public array $loisir;
    public int $id;
    public string $mail;
    private string $password;
    public string $birth;
    public string $id_picture;
    public string $description;

    public function __construct($id, $name, $firstname, $location, $genre, $loisir, $mail, $password, $birth, $id_picture, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->location = $location;
        $this->genre = $genre;
        $this->loisir = $loisir;
        $this->mail = $mail;
        $this->password = $password;
        $this->birth = $birth;
        $this->id_picture = $id_picture;
        $this->description = $description;
    }

    public function __destruct()
    {
        global $db;

        $query = "UPDATE users SET mail='".$this->mail.
                    "', password='".$this->password.
                    "', nom='".$this->name.
                    "', prenom='".$this->firstname.
                    "', genre='".$this->genre.
                    "', birth='".$this->birth.
                    "', ville='".$this->location.
                    "', description='".$this->description.
                    "', id_picture='".$this->id_picture;
                    "' WHERE users.ID=".$this->id." ;";
                    
        $db->exec($query);
    }

    private function getPassword()
    {
        return $this->password;
    }

    private function setPassword($password)
    {
        $this->password = $password;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getId_picture()
    {
        return $this->id_picture;
    }

    public function setId_picture($id_picture)
    {
        $this->id_picture = $id_picture;
    }

    public function getBirth()
    {
        return $this->birth;
    }

    public function setBirth($birth)
    {
        $this->birth = $birth;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    public function getLoisir()
    {
        return $this->loisir;
    }

    public function setLoisir($loisir)
    {
        $this->loisir = $loisir;
    }
}
?>
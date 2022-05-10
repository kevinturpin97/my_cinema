<!DOCTYPE html>
<html lang="fr">
   <?php include "vue/head.php"; 
   include "modele/POO.php"; 
   include "modele/match_algo.php";
   include "controller/get_age.php"; ?>
   <body>
      <?php include "vue/header.php"; 
         include "modele/loisir.php"; ?>
      <?php if (isset($_SESSION["user"])) { ?>
      <div class="container">
         <h1>Tableau de bord</h1>
         <div class="row my_profile">
            <h2>Mon Profil</h2>
            <div class="col-md-3">
               <img class="rounded-circle" src="images/user_img/<?php echo $_SESSION["user"]->getId_picture(); ?>" alt="avatar" style="width:200px;" data-holder-rendered="true"> 
            <!-- <input type="file" name="avatar_upload" id="avatar_upload"> -->
            </div>
            
            <div class="col-md-4">
               <p><b>Nom: </b><?php echo ucfirst($_SESSION["user"]->getName()); ?></p>
               <p><b>Prenom: </b><?php echo ucfirst($_SESSION["user"]->getFirstname()); ?></p>
               <p><b>Age: </b><?php echo get_age($_SESSION["user"]->getBirth()); ?> ans</p>
               <p><b>Genre: </b><?php echo ucfirst($_SESSION["user"]->getGenre()); ?></p>
               <p><b>Ville: </b><?php echo ucfirst($_SESSION["user"]->getLocation()); ?></p>
               <p><b>Adresse mail: </b><?php echo $_SESSION["user"]->getMail(); ?></p>
               
               
               <button class="btn btn-success" onclick=""><i class="bi bi-info-circle"></i> Modifier mes informations</button>
            </div>
            <div class="col">
               <p><b>Loisir: </b>
               <ol><?php foreach ($_SESSION["user"]->getLoisir() as $key => $value){  echo "<li class='list_loisir'>".$value."</li>"; } ?></ol></p>
               <p><b>Description: </b><?php echo $_SESSION["user"]->getDescription(); ?></p>
            </div>
            
         </div>
         <!-- Liste des matchs -->
         <div class="row match">
        <h1>Liste des matchs</h1>
        <?php try {
            $test = match_reciproque();
            foreach ($test as $key => $value) {?>
        <div class="row my_profile">
            <div class="col-md-3">
               <img class="rounded-circle" src="images/user_img/<?php echo $value["id_picture"]; ?>" alt="avatar" style="width:200px;" data-holder-rendered="true">
            </div>
            <div class="col-md-4">
               <p><b>Nom: </b><?php echo ucfirst($value["nom"]);?></p>
               <p><b>Prenom: </b><?php echo ucfirst($value["prenom"]);?></p>
               <p><b>Age: </b><?php echo get_age($value["birth"]);?> ans</p>
               <p><b>Genre: </b><?php echo ucfirst($value["genre"]);?></p>
               <p><b>Ville: </b><?php echo ucfirst($value["ville"]);?></p>
               <button class="btn btn-info text-light" onclick="">
                   <i class="bi bi-chat"></i>
                   Envoyer un message
                </button>
                <button class="btn btn-danger text-light" onclick="">
                   <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="col">
               <p><b>Loisir: </b>
               <ol><?php foreach (get_loisir($value["ID"]) as $key => $value){  echo "<li class='list_loisir'>".$value["loisir_name"]."</li>"; } ?></ol></p>
               <p><b>Description: </b><?php echo $value["description"]; ?></p>
            </div>
            
         </div>
         <?php }
        } catch (\Throwable $th) {
            echo "Aucun match récent n'a été trouvé !";
        }?>
    </div>
      </div>
      <?php } else {header("Location: http://localhost:8000/index.php");exit;}?>
      <script src="js/script.js"></script>
   </body>
</html>


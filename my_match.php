<!DOCTYPE html>
<html lang="fr">
<?php include "vue/head.php";
include "modele/POO.php";
include "modele/match_algo.php"; 
include "modele/loisir.php"; 
include "controller/get_age.php"; ?>
<body>
    <?php include "vue/header.php"; ?>
    <div class="container">
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
            echo "Une erreur est survenue: " . $th;
        }?>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
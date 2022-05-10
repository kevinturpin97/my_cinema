<?php include "modele/match_algo.php";
include "modele/loisir.php";
include "controller/get_age.php";
$_SESSION["user_b"] = get_profile();
if ($_SESSION["user_b"] != false) {?>
<div class="container">
    <h1>Matches dès maintenant !</h1>
    <div class="my_card">
    <img src="images/user_img/avatar_h.png" alt="avatar" width="150">
        <div id="user_card">
            <button type="button" class="btn btn-danger" onclick="no_match()">
                <i class="bi bi-x-lg"></i>
                Je n'aime pas
            </button>
            <button type="button" class="btn btn-info" style="color:white" onclick="match()">
                <i class="bi bi-heart"></i>
                J'aime
            </button>
        </div>
        <div class="my_information">
            <p><?php echo ucfirst($_SESSION["user_b"]["prenom"]); ?></p>
            <p><b>&Acirc;ge:</b> <?php echo get_age($_SESSION["user_b"]["birth"]); ?></p>
        </div>
        <div class="my_information">
            <p><?php echo ucfirst($_SESSION["user_b"]["nom"]); ?></p>
            <p><b>Ville:</b> <?php echo ucfirst($_SESSION["user_b"]["ville"]); ?></p>
        </div>
            <p><b>Description:</b> <?php echo $_SESSION["user_b"]["description"]; ?></p>
            <p><b>Loisir:</b> <div><?php foreach (get_loisir($_SESSION["user_b"]["ID"]) as $key => $value) {?>
                <li class="list"><?php echo $value["loisir_name"]; ?></li>
            <?php } ?></div></p>
    </div>
</div>
<?php } else { ?>
<div class="container">
    <h1>Vous avez déjà vu tout le monde !</h1>
    <p>Revenez plus tard pour espérer de nouveaux matchs !</p>
</div>
<?php } ?>
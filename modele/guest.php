<div class="container">
        <h1>My Ami'tic</h1>
        <p>Pour rejoindre notre communauté, inscrivez-vous juste en dessous !</p>
        <div class="row">
        <form action="modele/register.php" method="POST">
            <div class="row justify-content-center">
                <div class="col-4">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control" name="firstname" required/>
                </div>
                <div class="col-4">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" name="name" required/>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4">
                    <label for="birth">Date de naissance</label>
                    <input type="date" name="birth" id="birth" class="form-control" required>
                </div>
                <div class="col-4">
                    <label for="genre">Genre</label>
                    <select name="genre" id="genre" class="form-control" required>
                        <option name="genre" value="homme">Homme</option>
                        <option name="genre" value="femme">Femme</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-8">
                    <label for="location">Ville</label>
                    <input type="text" name="location" id="location" class="form-control" required/>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-8">
                    <label for="mail">Adresse mail</label>
                    <input type="email" name="mail" id="mail" class="form-control" required/>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-8">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" required/>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-8">
                    <label for="verif_password">Retaper le mot de passe</label>
                    <input type="password" name="verif_password" id="verif_password" class="form-control" required/>
                </div>
            </div>
            <div class="row justify-content-center">
            
                <div class="col-8">
                    <label>Choisissez au moins 1 loisir:</label>
                    <?php include 'modele/loisir.php';
                    foreach (random_loisir() as $key => $value) { ?>
                    <li class="no-list"><label for="loisir_<?php echo $value["ID"] ?>"><?php echo $value["loisir_name"]; ?></label>
                    <input type="checkbox" name="loisir[<?php echo $value["ID"] ?>]" id="loisir_<?php echo $value["ID"] ?>" value="<?php echo $value["ID"]; ?>"></li>
                    <?php } ?>
                    
                </div>
                <input type="submit" value="S'inscrire" class="btn btn-outline-dark">
                
            </div>
            
        </form>
        </div>
    </div>
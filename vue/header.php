<?php session_start(); ?>
<header class="p-3 mb-3 border-bottom">
   <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
         <b><a href="index.php" class="navbar-brand link-light">My Ami'tic</a></b>
         <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index.php" class="nav-link px-2 link-light">Accueil</a></li>
            <li><a href="#" class="nav-link px-2 link-light">Fonctionnement</a></li>
            <li><a href="#" class="nav-link px-2 link-light">FAQ</a></li>
            <li><a href="#" class="nav-link px-2 link-light">Contact</a></li>
         </ul>
         <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control" placeholder="Rechercher..." aria-label="Search">
         </form>
         <?php if ($_SESSION["user"]) { ?>
         <div class="dropdown text-end">
            <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" onclick="dropdown();">
            <img src="images/user_img/<?php echo $_SESSION["user"]->getId_picture(); ?>" alt="mdo" class="rounded-circle" width="32" height="32">
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
               <li><a class="dropdown-item link-light" href="#" onclick="dashboard()"><i class="bi bi-person"></i> Mon Compte</a></li>
               <li><a class="dropdown-item link-light" href="#" onclick="my_match()"><i class="bi bi-heart"></i> Mes Matchs</a></li>
               <li><a class="dropdown-item link-light" href="#"><i class="bi bi-gear"></i> Paramètres</a></li>
               <li>
                  <hr class="dropdown-divider">
               </li>
               <li><a class="dropdown-item link-light" href="#" onclick="logout()"><i class="bi bi-box-arrow-left"></i> Déconnexion</a></li>
            </ul>
         </div>
         <?php } else {?>
         <div class="dropdown text-end">
            <button class="btn btn-outline-light" onclick="dropdown()">
            <i class="bi bi-person-circle"></i>
            </button>
            <ul class="dropdown-menu space_around">
               <form action="modele/login.php" method="POST">
                  <li class="text-light">Adresse Mail</li>
                  <li><input type="email" name="mail" id="mail" class="form-control"></li>
                  <li class="text-light">Mot de passe</li>
                  <li><input type="password" name="password" id="password" class="form-control"></li>
                  <br>
                  <li><input type="submit" value="Connecter" class="form-control"></li>
               </form>
            </ul>
         </div>
         <?php } ?>
      </div>
   </div>
</header>
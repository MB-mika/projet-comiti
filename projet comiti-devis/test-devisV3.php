<?php

    session_start();
    // session_destroy();
    $title = 'Devis';
    $currentPage = 'Devis';
    require 'inc/head.php';
    require 'inc/navbar.php';
    require 'function/function_devis.php';
    require 'lib/_helpers/tools.php';

// Vérifie et conditionne  si l'utilisateur est connecté, sinon le renvoyer vers la page de connexion login.php
if(!isset($_SESSION['loginPage'])){
    header("location: login.php");
    exit;
}


// on code les vérifs et les condition des données entrée dans les inputs du formulaire avec la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreAdherents = isset($_POST["nombreAdherents"]) ? (int)$_POST["nombreAdherents"] : 0;
    $nombreSections = isset($_POST["nombreSections"]) ? (int)$_POST["nombreSections"] : 0;
    $federation = isset($_POST["federation"]) ? $_POST["federation"] : "";
    $moisEnCours = isset($_POST["moisEnCours"]) ? (int)$_POST["moisEnCours"] : 0;
    
 
   //  Appel de la fonction  et on rentre les paramettres données dans le POST

   $prixTtcAnnuel = calculerPrixAbonnement($nombreAdherents, $nombreSections, $federation, $moisEnCours);
}



?>




<body>

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                    <div class="text-center">
                    
                        <h3 class="text-center mt-1 mb-5 pb-1 ">COMITI-Asso</h3>
                    </div>

                             <form method="post" action="">

                                <div class="form-outline mb-4">
                                    <label class="form-label"for="nombreAdherents">Nombre d'adhérents :</label>
                                    <input type="number" name="nombreAdherents" id="nombreAdherents"class="form-control" required>
                                </div>  
                                
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="nombreSections">Nombre de sections :</label>
                                    <input type="number" name="nombreSections" id="nombreSections" class="form-control" required>
                                </div> 
                                    
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="federation">Fédération :</label>
                                    <select name="federation" id="federation" class="form-control" required>
                                        <option value=""></option>
                                        <option value="A">Autre fédération</option>
                                        <option value="N">Fédération de Natation</option>
                                        <option value="G">Fédération de Gymnastique</option>
                                        <option value="B">Fédération de Basket</option>
                                        
                                    </select>
                                </div>
                                    
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="moisEnCours">Mois en cours :</label>
                                    <input type="number" name="moisEnCours" id="moisEnCours" class="form-control" required>
                                </div>

                                    <button class="btn btn-primary btn-rounded btn-block  fa-lg gradient-custom-2 mb-3 "input type="submit" value="Calculer">Calculer</button>


                                <div class="form-outline mb-4">
                                    <label class="form-label" for="moisEnCours">Total des cotisations annuelles :</label>
                                    <input class="form-control" type="text" value="<?= isset($prixTtcAnnuel) && is_numeric($prixTtcAnnuel) ? ' '. $prixTtcAnnuel . ' € ': '' ?>" aria-label="Disabled input example" disabled readonly>
                                </div>

                             </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>   
</body>

<!-- <?php

// debug($prixTtcAnnuel)

?> -->


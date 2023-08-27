<?php
session_start();
// session_destroy();
$title = 'connexion| Session';
$currentPage = 'Connexion';
require 'inc/head.php';
// require 'inc/navbar.php';
require 'db/dataUser.php';

// Vérifier si le formulaire a été soumis


?>

<section class="h-100 gradient-form" style="background-color: #D1E8E2;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100 ">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black" style="background-image:url(https://comiti-asso.fr/wp-content/uploads/2022/10/comiti_asso_blanc_serrure_img_v1.png) ;">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-5">

                <div class="text-center">
                
                  <h4 class="text-center mt-3 mb-5 pb-2">COMITI-Asso</h4>
                </div>

                <form action="traitement.php" method="POST"> 
                  <p>Please login to your account</p>
                  <hr>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Username</label>
                    <input type="text" id="form2Example11" class="form-control" name="username" required/>
                    <span class="erreur"><?= isset($erreur_username) ? $erreur_username : '' ; ?></span>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Password</label>
                    <input type="password" id="form2Example22" class="form-control" name="password"/>
                    <span class="erreur"><?= isset($erreur_password) ? $erreur_password : ''; ?></span>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-secondary btn-rounded btn-block  fa-lg gradient-custom-2 mb-3 " type="submit">Log
                      in</button>
                    <a class="text-muted" href="#!">Forgot password?</a>
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
<?php
session_start();

$title = 'Dashboard| Session';
$currentPage = 'Dashboard';
require 'inc/head.php';
require 'inc/navbar.php';
require 'db/dataUser.php';
require 'function/function.php';

// Vérifie et conditionne  si l'utilisateur est connecté, sinon le renvoyer vers la page de connexion login.php
if(!isset($_SESSION['loginPage'])){
    header("location: login.php");
    exit;
}

// Affiche les informations de l'utilisateur connecté
// $on stocke dans $username la value du name qui est stocker dans la session loginPage
// et le array userlogged qui a été créer dans le traitement.
$username = $_SESSION['loginPage']['userLogged']['Name'];


?>


  <title>Page dashboard</title>


<h2 class="row row-cols-5 gap-3 justify-content-center">Bienvenue, <?= $username ?> .</h2>
<div class= "container-fluid">
<!-- <img src="./img/comiti_asso_blanc_serrure_img_v1.png"  alt="logo et représentatif du fonctionnement comiti-asso" title="Comiti-asso"> -->
<img style="display: block;-webkit-user-select: none;margin: auto;cursor: zoom-in;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;" src="https://comiti-asso.fr/wp-content/uploads/2022/10/comiti_asso_blanc_serrure_img_v1.png" width="1516" height="1110">

</div>



<!-- submit qui permet d'éffacer la session en passant par le GET -->




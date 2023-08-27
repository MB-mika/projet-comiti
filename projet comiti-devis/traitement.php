<?php
session_start();
require 'db/dataUser.php';

// Vérifier si le formulaire a été soumis


  // var_dump(isset($_SESSION['loginPage']));
  // var_dump($_POST);
if (!isset($_SESSION['loginPage'])) {

    $errors = [];
    // Exemple de validation du champ "nom"
    $username = $_POST['username'];
    if (empty($username)) {
      $errors['username'] = "Le champ nom est obligatoire.";
    }
  
    // Exemple de validation du champ "mot de passe"
    $password = $_POST['password'];
    if (empty($password)) {
      $errors['password'] = "Le champ password est obligatoire.";
    } 

    if(!empty($errors)){
        var_dump($errors);
        
     

    }else {
      
      foreach($comiti as $user){

        // cela permet de vérifieret de comparé les données  transmise dans le $_POST et mon fichier dataUser dans le tableau $parasitic
        
        if ($_POST['username'] == $user['Name'] && $_POST['password'] == $user['password']){
          // la variable $user est celle du foreach qui parcours le array $parasitic
          // qui se trouve dans le fichier dataUser.php

          $_SESSION['loginPage']['userLogged'] = $user;
          header('Location: dashboard.php');
          exit;
        }

      }


    }
   
  
  }

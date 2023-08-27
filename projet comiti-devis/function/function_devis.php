<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
function calculerPrixAbonnement($nombreAdherents, $nombreSections, $federation, $moisEnCours) {
    $prixTtcAnnuel = 0;
    $prixAdherents = 0;
    $prixSections = $nombreSections * 5; // Prix des sections par section
  
    
    // Calcul du prix des adhérents je préfère créer une condition en switch car plus simple pour 
    // rajouter d'autre condition par la suite.
    switch (true) {
        case ($nombreAdherents <= 100):
            $prixAdherents = $nombreAdherents * 10;
            break;
        case ($nombreAdherents <= 200):
            $prixAdherents = $nombreAdherents * 0.10;
            break;
        case ($nombreAdherents <= 500):
            $prixAdherents = $nombreAdherents * 0.09;
            break;
        case ($nombreAdherents <= 1000):
            $prixAdherents = $nombreAdherents * 0.08;
            break;
        default:
            $prixAdherents = (ceil($nombreAdherents / 1000) * 70);
            break;
    }
   
    // condition pour Section offerte si plus de 1000 adhérents
    if ($nombreAdherents > 1000) {
        $prixSections -= 5;
    }
    
    // Réduction en fonction de la catégorie de la fédération suppose un select pour le formulaire
    if ($federation === "N") {
        $prixSections -= 15;
    } elseif ($federation === "G") {
        $prixAdherents *= 0.85; // Réduction de 15%
    } elseif ($federation === "B") {
        $prixSections *= 0.70; // Réduction de 30%
    }elseif ($federation === "A") {
        $prixSections ;
    }
    
    // Nouvelle fonctionnalité : donc création d'une boucle pour  ajustement du prix des sections en fonction du mois
    // et rajout de condition pour éviter les erreurs soit par la division par 0 non prit en compte par modulo 
    for ($numeroSection = 1; $numeroSection <= $nombreSections; $numeroSection++) {
        if ($moisEnCours !== 0 && $moisEnCours !== $numeroSection && $numeroSection % $moisEnCours === 0)  {
            $prixSections -= 2; // Passage de 5€/mois HT à 3€/mois HT
        }
    }
    
    // Calcul du prix TTC
    $prixTotalHT = $prixAdherents + $prixSections;
    $prixTTC = $prixTotalHT * 1.20; // Ajout de 20% de TVA
    $prixTtcAnnuel = $prixTTC * 12; //Ajout annuel soit 12 mois
    return $prixTtcAnnuel;

}
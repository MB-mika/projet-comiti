<?php



 function calculerPrixAbonnement($nombreAdherents, $nombreSections, $federation, $moisEnCours) {
    $prixAdherents = 0;
    $prixSections = $nombreSections * 5; // Prix des sections par section
    
    // Calcul du prix des adhérents
    if ($nombreAdherents <= 100) {
        $prixAdherents = $nombreAdherents * 10;
    } elseif ($nombreAdherents <= 200) {
        $prixAdherents = $nombreAdherents * 0.10;
    } elseif ($nombreAdherents <= 500) {
        $prixAdherents = $nombreAdherents * 0.09;
    } elseif ($nombreAdherents <= 1000) {
        $prixAdherents = $nombreAdherents * 0.08;
    } else {
        $prixAdherents = (ceil($nombreAdherents / 1000) * 70);
    }
    
    // Section offerte si plus de 1000 adhérents
    if ($nombreAdherents > 1000) {
        $prixSections -= 5;
    }
    
    // Réduction en fonction de la fédération
    if ($federation === "N") {
        $prixSections -= 15;
    } elseif ($federation === "G") {
        $prixAdherents *= 0.85; // Réduction de 15%
    } elseif ($federation === "B") {
        $prixSections *= 0.70; // Réduction de 30%
    }
    
    // Nouvelle fonctionnalité : ajustement du prix des sections en fonction du mois
    for ($numeroSection = 1; $numeroSection <= $nombreSections; $numeroSection++) {
        if ($numeroSection % $moisEnCours === 0) {
            $prixSections -= 2; // Passage de 5€/mois HT à 3€/mois HT
        }
    }
    
    // Calcul du prix TTC
    $prixTotalHT = $prixAdherents + $prixSections;
    $prixTTC = $prixTotalHT * 1.20; // Ajout de 20% de TVA
    
    return $prixTTC;
}

// Exemple d'utilisation
$nombreAdherents = 5000;
$nombreSections = 2;
$federation = "N";
$moisEnCours = 8; // Par exemple, août
$prixTTC = calculerPrixAbonnement($nombreAdherents, $nombreSections, $federation, $moisEnCours);
echo "Le prix TTC de l'abonnement est : " . $prixTTC . "€";


?>

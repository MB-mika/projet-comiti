<!DOCTYPE html>
<html>
<head>
    <title>Calcul Prix Abonnement</title>
</head>

</html>




<?php



function calculerPrixAbonnement($nombreAdherents, $nombreSections, $federation, $moisEnCours) {
    $prixAdherents = 0;
    $prixSections = $nombreSections * 5; // Prix des sections par section
    
    // Calcul du prix des adhérents
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreAdherents = isset($_POST["nombreAdherents"]) ? (int)$_POST["nombreAdherents"] : 0;
    $nombreSections = isset($_POST["nombreSections"]) ? (int)$_POST["nombreSections"] : 0;
    $federation = isset($_POST["federation"]) ? $_POST["federation"] : "";
    $moisEnCours = isset($_POST["moisEnCours"]) ? (int)$_POST["moisEnCours"] : 0;
    
    $prixTTC = calculerPrixAbonnement($nombreAdherents, $nombreSections, $federation, $moisEnCours);
}


?>




<body>
    <form method="post" action="">
        <label for="nombreAdherents">Nombre d'adhérents :</label>
        <input type="number" name="nombreAdherents" id="nombreAdherents" required><br>
        
        <label for="nombreSections">Nombre de sections :</label>
        <input type="number" name="nombreSections" id="nombreSections" required><br>
        
        <label for="federation">Fédération :</label>
        <select name="federation" id="federation" required>
            <option value="N">Non affilié</option>
            <option value="G">Groupe A</option>
            <option value="B">Groupe B</option>
        </select><br>
        
        <label for="moisEnCours">Mois en cours :</label>
        <input type="number" name="moisEnCours" id="moisEnCours" required><br>
        
        <input type="submit" value="Calculer">
        <div>
        <input class="form-control" type="text" value="<?= isset($prixTTC) && is_numeric($prixTTC) ? ' '. $prixTTC . ' € ': '' ?>" aria-label="Disabled input example" disabled readonly>
        </div>
    </form>
</body>

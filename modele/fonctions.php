<?php
function getLesVols() {
    
// Déclaration d’un tableau

$vols = array();

  // Appel au fichier permettant la connection à la BD
 require dirname(__FILE__). "/Connect.php";

try {
    $rep = $bdd->prepare('SELECT * FROM vol');
    $rep->execute(); 
    while ($donnees = $rep->fetch()) { 
        $vols($donnees['']);
    }
} catch (Exception $e) {
    die ('Erreur :' . $e ->getMessage());
}

// Selection de la base de données et requete SQL


// Remplissage d’un tableau correspondant à chaque vol


 // Remplissage du tableau multi-dimensionnel $vols avec chacun des vols
   


// Retourner le tableau

return $vols;

}
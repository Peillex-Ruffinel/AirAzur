<?php
function getLesVols() {
$vols = array();
$v = 0;

include 'pdoConnect.php';

try {
    $rep = $bdd->prepare('SELECT * FROM vol');
    $rep->execute(); 
    while ($donnees = $rep->fetch(PDO::FETCH_ASSOC)) {
        $lesVols[$v] = array(
            $donnees['numvol'],
            $donnees['depart'], 
            $donnees['arrivee'], 
            $donnees['datedepart'], 
            $donnees['datearrive'], 
            $donnees['place'], 
            $donnees['idavion'], 
            $donnees['prix']);
        $v++;
    }
} catch (Exception $e) {
    die ('Erreur :' . $e ->getMessage());
}
 // Remplissage du tableau multi-dimensionnel $vols avec chacun des vols
    array_push($vols, $lesVols);

// Retourner le tableau

return $vols;
}

function reserverVol () {
    // rÃ©cup numÃ©ro vol
    $numero = $_REQUEST["numero"];
    return $numero;
}

function initPanier() {
    if(!isset($_SESSION['reservations'])) {
	$_SESSION['reservations']= array();
    }
}

function ajouterAuPanier($reservation) {    
    $_SESSION['reservations'][]= $reservation;
}

function validerReservation() {
    $reservation = array();
    $reservation["numero"] =  $numero;
    $nom = $_REQUEST["nom"];
    $reservation["nom"] =  $nom;
    $prenom = $_REQUEST["prenom"];
    $reservation["prenom"] =  $prenom;
    $adr = $_REQUEST["adr"];
    $reservation["adr"] =  $adr;
    $ville = $_REQUEST["ville"];
    $reservation["ville"] =  $ville;
    $cp = $_REQUEST["cp"];
    $reservation["cp"] =  $cp;
    $mail = $_REQUEST["mail"];
    $reservation["mail"] =  $mail;
    $nbVoyageur = $_REQUEST["nbVoyageur"];
    $reservation["nbVoyageur"] =  $nbVoyageur;
    
    include 'pdoConnect.php';

    /*try {
        $insertion = $bdd->prepare('INSERT INTO reservation ()
						VALUES (\'\', :, :, :, :)');
	$insertion->execute(array(
            '' => $,
            '' => $,
            '' => $,
            '' => $
            ));
    } catch(Exeption $erreur) {
        die('Erreur : '.$erreur->getMessage());
    }*/
    
    return $reservation;
}

function getLesReservations() {
    $reserv = array();
    $r = 0;

    include 'pdoConnect.php';

    try {
        $rep = $bdd->prepare('SELECT * FROM ');
        $rep->execute(); 
        while ($donnees = $rep->fetch(PDO::FETCH_ASSOC)) {
            $lesReserv[$r] = array(
            $donnees['numvol'],
            $donnees['depart'], 
            $donnees['arrivee'], 
            $donnees['datedepart'], 
            $donnees['datearrive'], 
            $donnees['place'], 
            $donnees['idavion'], 
            $donnees['prix']);
        $r++;
    }
    } catch (Exception $e) {
        die ('Erreur :' . $e ->getMessage());
    }
    array_push($reserv, $lesReserv);

    return $reserv;
}

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
    // récup numéro vol
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

function getNumUtilisateur($nom ,$prenom){
   
    include 'pdoConnect.php';
    try {
        $rep = $bdd->prepare('SELECT numutil FROM utilisateur
                WHERE nom="'.$nom.'" AND prenom="'.$prenom.'" '
	);
        
        $rep->execute(); 
        $donnees = $rep->fetch(PDO::FETCH_ASSOC);
        $num = $donnees['numutil'];
        
    }catch (Exception $e) {
        die ('Erreur :' . $e ->getMessage());
    }
    return $num;
}

function validerReservation() {
    $reservation = array();
    $numero = $_REQUEST["numero"];
    $reservation["numero"] =  $numero;
    $nom = $_REQUEST["nom"];
    $reservation["nom"] =  $nom;
    $prenom = $_REQUEST["prenom"];
    $reservation["prenom"] =  $prenom;
    $adr = $_REQUEST["adresse"];
    $reservation["adr"] =  $adr;
    $ville = $_REQUEST["ville"];
    $reservation["ville"] =  $ville;
    $cp = $_REQUEST["cp"];
    $reservation["cp"] =  $cp;
    $mail = $_REQUEST["mail"];
    $reservation["mail"] =  $mail;
    $nbVoyageur = $_REQUEST["place"];
    $reservation["nbVoyageur"] =  $nbVoyageur;
    
    include 'pdoConnect.php';

    try {
        $insertion = $bdd->prepare('INSERT INTO utilisateur (nom, prenom, email, adress, ville, cp)
            VALUES ("'.$nom.'","'.$prenom.'","'.$mail.'","'.$adr.'","'.$ville.'","'.$cp.'")');
        $insertion->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $mail,
            'adress' => $adr,
            'ville'=> $ville,
            'cp'=>$cp
            ));
    } catch(Exeption $erreur) {
        die('Erreur : '.$erreur->getMessage());
    }
    
    $idutil = getNumUtilisateur($nom, $prenom);
    
    try {
        $insertion = $bdd->prepare('INSERT INTO reserver (idvol, idutil, nbplace)
            VALUES ("'.$numero.'","'.$idutil.'","'.$nbVoyageur.'")');
	$insertion->execute(array(
            'idvol' => $numero,
            'idutil' => $idutil,
            'nbplace' => $nbVoyageur
            ));
    } catch(Exeption $erreur) {
        die('Erreur : '.$erreur->getMessage());
    }
    
    return $reservation;
}

function getLesReservations() {
    $reserv = array();
    $r = 0;
    include 'pdoConnect.php';
    try {
        $rep = $bdd->prepare('SELECT nom, prenom, idvol, nbplace, idutil
		FROM reserver JOIN utilisateur ON reserver.idutil=utilisateur.numutil');
		
		/*SELECT nom, prenom, idvol, nbplace FROM reserver 
        JOIN utilisateur ON reserver.idutil=utilisateur.numutil
        JOIN vol ON reserver.idvol=vol.numvol*/
        
        $rep->execute(); 
        while ($donnees = $rep->fetch(PDO::FETCH_ASSOC)) {
            $lesReserv[$r] = array(
            $donnees['nom'],
            $donnees['prenom'], 
            $donnees['idvol'], 
            $donnees['nbplace'],
            $donnees['idutil']);
        $r++;
    }
} catch (Exception $e) {
    die ('Erreur :' . $e ->getMessage());
}
 // Remplissage du tableau multi-dimensionnel $vols avec chacun des vols
    array_push($reserv, $lesReserv);
// Retourner le tableau
return $reserv;
}

function getIdUtil(){
    $idutil =  $_REQUEST["idutil"];
    return $idutil;
}
function getIdVol(){
    $idvol =  $_REQUEST["idvol"];
    return $idvol;
}
function getLaReservation($idutil, $idvol){
    $reserv = array();
    $r = 0;
    include 'pdoConnect.php';
    try {
        $rep = $bdd->prepare('SELECT nom, prenom, idvol, nbplace, idutil 
		FROM reserver JOIN utilisateur ON reserver.idutil=utilisateur.numutil
                WHERE idvol="'.$idvol.'"
                AND idutil='.$idutil);
        
        $rep->execute(); 
        while ($donnees = $rep->fetch(PDO::FETCH_ASSOC)) {
            $laReserv = array(
            $donnees['idvol'],
            $donnees['idutil'],
            $donnees['nom'],
            $donnees['prenom'], 
            $donnees['nbplace']);
            $r++;
    }
    } catch (Exception $e) {
        die ('Erreur :' . $e ->getMessage());
    }
     // Remplissage du tableau multi-dimensionnel $vols avec chacun des vols
    array_push($reserv, $laReserv);
// Retourner le tableau
return $reserv;
}
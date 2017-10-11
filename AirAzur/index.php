<?php
if(!isset($_REQUEST['action']))
    $action = 'accueil';
else
    $action = $_REQUEST['action'];

// vue qui crée l’en-tête de la page
include("vues/v_entete.php") ;

switch($action)
{
    case 'accueil':
        include("vues/v_accueil.php");
    break;
    
    case 'voirVols' :
        include "modele/fonctions.php";
        $lesVols = getLesVols();
        //var_dump($lesVols[0]);
        include("vues/v_vols.php");
    break;
    
    case 'reservation':
        include "modele/fonctions.php";
        $lesReservations = getLesReservations();
        //var_dump($lesReservations[0]);
        include("vues/v_reservation.php");
    break;
    
    case 'formulaireReservation':
        include'modele/fonctions.php';
        $numero = reserverVol();
        include("vues/v_formulaireReservation.php");
    break;

    case 'validerReservation':
        include'modele/fonctions.php';
        $reservation = validerReservation();
        include("vues/v_confirmeReservation.php");
    break;
    case 'pdfReservation':
        include'modele/fonctions.php';
        $idutil = getIdUtil();
        $idvol = getIdVol();
        $laReservation = getLaReservation($idutil, $idvol);
        var_dump($laReservation);
        //include("vues/v_formulaireReservation.php");
    break;
}

// vue qui crée le pied de page
include("vues/v_pied.php") ;
?>

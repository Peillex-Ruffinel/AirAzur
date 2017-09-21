<?php
include("modele/pdoConnect");

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
    
    case 'catalogue':
        include("vues/v_catalogue.php");
        break;
    
    case 'reservation':
        include("vues/v_reservation.php");
        break;
    
    case 'voirVols' :
        $lesVols = getLesVols();
        include("vues/v_vols.php");
        break;
}

// vue qui crée le pied de page
include("vues/v_pied.php") ;
?>
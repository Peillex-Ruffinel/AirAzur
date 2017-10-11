<div id="contenu">
<?php
foreach($lesVols[0] as $i =>$unVol) {
   
   echo"
    <div id ='vol'>
        Vol <strong>" . $unVol[0] . "</strong> <br />
        Départ : ". $unVol[1] . " - ". $unVol[3]."<br />
        Arrivé : ". $unVol[2] . " - ". $unVol[4]."<br /> 
        <strong>Prix " . $unVol[7] . "</strong> - 
        <a href = 'index.php?action=formulaireReservation&numero=$unVol[0]'>réserver</a>
        <br /> <br />
    </div>";
}
?>
</div>
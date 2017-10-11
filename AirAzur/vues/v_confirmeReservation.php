<div id='contenu'>
    <?php
        $num=$reservation['numero'];
        $nom = $reservation['nom'];
        $prenom = $reservation['prenom'];
        
        echo "La réservation pour le vol n°$num est confirmée pour le client $prenom $nom.";    
    ?>
</div>

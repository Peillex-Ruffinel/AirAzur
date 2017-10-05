<html>
<?php

?>

<div id="contenue">
    <form>
        <fieldset>
            <legend>Réservation n°</legend>
            <label>Nom</label>
            <input type='text' name='nom' maxlength='30' placeholder='Votre nom'><br />
            <label>Prénom</label>
            <input type='text' name='prenom' maxlength='30' placeholder='Votre prénom'><br />
            <label>E-mail</label>
            <input type='email' name='mail' placeholder='Votre mail'><br />
            <label>Adresse</label>
            <input type='text' name='adresss' maxlength='100' placeholder='Votre adresse'><br />
            <label>Code postale</label>
            <input type='text' name='cp' maxlength='5' placeholder='Code Postale'><br />
            <label>Ville</label>
            <input type='text' name='ville' maxlength='30' placeholder='Ville'><br />
            <label>Nombre de places</label>
            <input type='number' value=1 name='place'><br />
            <input type='submit' value='Réserver'>
            <input type='reset' value='Annuler'><br />
        </fieldset>
    </form>
</div>


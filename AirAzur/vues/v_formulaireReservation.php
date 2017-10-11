<html>

<div id="contenu">
	<?php echo"
    <form id='reservation' method='POST' action='index.php?action=validerReservation'>
        <fieldset>
            <legend>Réservation de vol n°$numero</legend>
            <label>Nom*</label>
            <input type='text' name='nom' maxlength='30' placeholder='Votre nom' required><br />
            <label>Prénom*</label>
            <input type='text' name='prenom' maxlength='30' placeholder='Votre pr�nom' required><br />
            <label>mail*</label>
            <input type='email' name='mail' placeholder='Votre mail'required><br />
            <label>adresse*</label>
            <input type='text' name='adresse' maxlength='100' placeholder='Votre adresse' required><br />
            <label>code postale*</label>
            <input type='text' name='cp' maxlength='5' placeholder='Code Postale' required><br />
            <label>ville*</label>
            <input type='text' name='ville' maxlength='30' placeholder='Ville' required><br />
            <label>Nombre de voyageurs*</label>
            <input type='number' value=1 name='place'><br />
            <input type='hidden' value='$numero' name='numero'>
            <input type='submit' value='Reserver'>
            <input type='reset' value='Annuler'><br />
        </fieldset>
    </form>"; ?>
</div>



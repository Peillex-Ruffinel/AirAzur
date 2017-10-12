<!-- vue qui affiche le tableau des reservations -->
    <h3> Les Réservations </h3>
    <table id ='reservations'>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Numéro de vol</th>
            <th>Nombre de places</th>
            <th>PDF</th>
        </tr> 
        <?php
            foreach($lesReservations[0] as $i =>$unRes) {
               echo"
                <tr>
                    <td>$unRes[0]</td>
                    <td>$unRes[1]</td>
                    <td>$unRes[2]</td>
                    <td>$unRes[3]</td>
                    <td><a href='index.php?action=pdfReservation&idvol=$unRes[2]&idutil=$unRes[4]'><img style='heigth : 25px; width : 25px;' src='images/pdf.png'/></a></td>
                </tr>";
            }
        ?>
    </table>

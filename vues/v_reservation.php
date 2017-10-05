<html>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Numéro de vol</td>h
            <th>Nombre de places</th>
            <th>PDF</th>
        </tr>
        <?php
            foreach($LesRevervations as $i =>$unRev) {

               echo"
                <tr>
                    <td>$unRev[0]</td>
                    <td>$unRev[1]</td>
                    <td>$unRev[2]</td>
                    <td>$unRev[3]</td>
                    <td><a href='index.php'><img src='image/pdf.png'/></a></td>
                </tr>";
            }
        ?>
    </table>

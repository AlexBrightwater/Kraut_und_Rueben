<?php
    require_once '../../Service/DatabaseConnection.php';
    require_once '../../Service/Statements.php';

    include_once '../../header.php';
?>
    <main>   
        <h1>Kraut und Rueben</h1>
        <br />
        <h3>Zutaten</h3>
        <table>
            <tr>
                <th>Zutat</th>
                <th>Preis</th>
                <th>Bestand</th>
            </tr>
            <?php
                $ingredients = Ingredients($conn);
                while ($row = mysqli_fetch_assoc($ingredients)){
                    echo "<tr> <td>". $row["zutat_name"] ."</td> <td>". $row["nettopreis_ct"] / 100 ." €</td> <td>". $row["bestand"] ." stk</td> </tr>";
                }
            ?>
        </table>
    </main> 



<?php
    mysqli_close($conn);
    include_once '../../footer.php';
?>

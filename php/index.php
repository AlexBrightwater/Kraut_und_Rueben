<?php
    require_once 'conn.php';
    require_once 'functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Kraut und Rueben</title>
    </head>
    <body>
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
                $ingredients = AllIngredients($conn);
                while ($row = mysqli_fetch_assoc($ingredients)){
                    echo "<tr> <td>". $row["zutat_name"] ."</td> <td>". $row["nettopreis_ct"] / 100 ." €</td> <td>". $row["bestand"] ."</td> </tr>";
                }
            ?>
        </table>
    </body>
</html>

<?php
    mysqli_close($conn);
?>

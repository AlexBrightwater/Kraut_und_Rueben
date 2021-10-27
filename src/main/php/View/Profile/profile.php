<?php
include_once '../../header.php';
include_once '../../Service/DatabaseConnection.php';
include_once '../../Service/Statements.php';
?>

<main>
    <?php
    if (isset($_SESSION["kunde_id"])) {
        $now = (int) date('H');
        switch (true) {
            case ($now >= 22) && ($now <= 4):
                $timeoday = 'Gute Nacht, ';
                break;
            case ($now >= 5) && ($now <= 11):
                $timeoday = 'Guten Morgen, ';
                break;
            case ($now >= 12) && ($now <= 14):
                $timeoday = 'Guten Mittag, ';
                break;
            case ($now >= 15) && ($now <= 17):
                $timeoday = 'Guten Nachmittag, ';
                break;
            case ($now >= 18) && ($now <= 21):
                $timeoday = 'Guten Abend, ';
                break;
            default:
                $timeoday = 'Guten Hallo, ';
                break;
        };
        echo "<div class='kundeninfo'>";
        echo "<h1>" . $timeoday . $_SESSION["firstname"] . "</h1>";

        echo "<p>Vorname: " . $_SESSION["firstname"] . "</p>";
        echo "<p>Nachname: " . $_SESSION["lastname"] . "</p>";
        echo "<p>E-Mail: " . $_SESSION["email"] . "</p>";
        echo "<p>Geburtsdatum: " . $_SESSION["birthdate"] . "</p>";
        echo "<p>Ort: " . $_SESSION["city"] . "</p>";
        echo "<p>Plz.: " . $_SESSION["postalCode"] . "</p>";
        echo "<p>Straße: " . $_SESSION["street"] . "</p>";
        echo "<p>Haus Nr.: " . $_SESSION["houseNo"] . "</p>";
        echo "<p>Telefon: " . $_SESSION["phone"] . "</p>";

        echo    "<form action='/Kraut_und_Rueben/src/main/php/Controller/ProfileController.php' method='post'>
                        <button class='delete-profile' type='submit' name='delete'>Profil löschen</button>
                    </form>";
        echo "</div>";

        echo "<br>";

        echo "<div class='all-orders'>";
        $orders = MyOrders($conn);
        while ($orderRow = mysqli_fetch_assoc($orders)) {
            echo "<div class='order-card'>";
            echo "<h3 class='meineBestellungen'>Meine Bestellungen vom " . $orderRow["datum"] . "</h3> <hr>";
            echo "<table> <tr><th>Item</th><th>Menge</th></tr>";
            $orderedRecipes = RecipesOfOrder($conn, $orderRow["bestellung_id"]);
            if (mysqli_num_rows($orderedRecipes) > 0) {
                while ($recipesRow = mysqli_fetch_assoc($orderedRecipes)) {
                    echo "<tr><td>" . $recipesRow["rezept_name"] . "</td><td>" . "x" . $recipesRow["menge"] . "</td></tr>";
                }
            }

            $orderedIngredients = IngredientsOfOrder($conn, $orderRow["bestellung_id"]);
            if (mysqli_num_rows($orderedIngredients) > 0) {
                while ($ingredientsRow = mysqli_fetch_assoc($orderedIngredients)) {
                    echo "<tr><td>" . $ingredientsRow["zutat_name"] . "</td><td>" . "x" . $ingredientsRow["menge"] . "</td></tr>";
                }
            }
            echo "</table>";
            echo "<hr><div class='gesamtpreis'><h4>Gesamtpreis</h4><h4>" . $orderRow["gesamtpreis_ct"] / 100 . "€</h4></div>";
            echo "</div>";/* close order-card */
        }
        echo "</div>";/* clode all-orders */
    } else {
        header("location: login.php");
        exit();
    }
    ?>
</main>
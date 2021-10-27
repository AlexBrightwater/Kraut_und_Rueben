<?php
include_once '../../header.php';
include_once '../../Service/DatabaseConnection.php';
include_once '../../Service/Statements.php';
?>

<main>
    <?php
    if (isset($_SESSION["kunde_id"])) {
        echo "<p>Vorname: " . $_SESSION["firstname"] . "</p>";
        echo "<p>Nachname: " . $_SESSION["lastname"] . "</p>";
        echo "<p>E-Mail: " . $_SESSION["email"] . "</p>";
        echo "<p>Geburtsdatum: " . $_SESSION["birthdate"] . "</p>";
        echo "<p>Ort: " . $_SESSION["city"] . "</p>";
        echo "<p>Plz.: " . $_SESSION["postalCode"] . "</p>";
        echo "<p>Straße: " . $_SESSION["street"] . "</p>";
        echo "<p>Haus Nr.: " . $_SESSION["houseNo"] . "</p>";
        echo "<p>Telefon: " . $_SESSION["phone"] . "</p>";

        echo "<form action='/Kraut_und_Rueben/src/main/php/Controller/ProfileController.php' method='post'>
                    <button class='delete-profile' type='submit' name='delete'>Profil löschen</button>
                  </form>";

        echo "<br>";
        echo "";
        $orders = MyOrders($conn);
        echo "<table>";
        echo "<tr><th><h4>Meine Bestellungen</h4></th><th colspan='2'></th></tr>";
        while ($orderRow = mysqli_fetch_assoc($orders)) {
            echo "<tr><td>" . $orderRow["datum"] . "</td><td colspan='2'></td></tr>";
            echo "<tr><td colspan='3'></td></tr>";

            $orderedRecipes = RecipesOfOrder($conn, $orderRow["bestellung_id"]);
            if(mysqli_num_rows($orderedRecipes)>0){
                echo "<tr><td>Bestellte Rezepte</td><td colspan='3'></tr>";
                while ($recipesRow = mysqli_fetch_assoc($orderedRecipes)){
                    echo "<tr><td></td><td>" . $recipesRow["rezept_name"] . "</td><td>x". $recipesRow["menge"] ."</td></tr>";
                }
                echo "<tr><td colspan='3'></td></tr>";
            }


            $orderedIngredients = IngredientsOfOrder($conn, $orderRow["bestellung_id"]);
            if(mysqli_num_rows($orderedIngredients)>0) {
                echo "<tr><td>Bestellte Zutaten</td><td colspan='3'></tr>";
                while ($ingredientsRow = mysqli_fetch_assoc($orderedIngredients)) {
                    echo "<tr><td></td><td>" . $ingredientsRow["zutat_name"] . "</td><td>x" . $ingredientsRow["menge"] . "</td></tr>";
                }
                echo "<tr><td colspan='3'></td></tr>";
            }

            echo "<tr><td colspan='2'></td><td>" . $orderRow["gesamtpreis_ct"] / 100 . "€</td></tr>";
            echo "<tr><td colspan='3'></td></tr>";
        }
    } else {
        header("location: login.php");
        exit();
    }
    ?>
</main>
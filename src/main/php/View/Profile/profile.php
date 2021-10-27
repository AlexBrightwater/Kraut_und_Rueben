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

        echo "<div>";

        $orders = MyOrders($conn);
        while ($orderRow = mysqli_fetch_assoc($orders)) {
            echo "<h3>Meine Bestellungen vom ". $orderRow["datum"] ."</h3>";
            echo "<h4>Item</h4>";
            echo "<h4>Menge</h4>";

            $orderedRecipes = RecipesOfOrder($conn, $orderRow["bestellung_id"]);
            if(mysqli_num_rows($orderedRecipes)>0){
                while ($recipesRow = mysqli_fetch_assoc($orderedRecipes)){
                    echo "<p>". $recipesRow["rezept_name"] . "x" .$recipesRow["menge"] ."</p>";
                }

            }

            $orderedIngredients = IngredientsOfOrder($conn, $orderRow["bestellung_id"]);
            if(mysqli_num_rows($orderedIngredients)>0) {
                while ($ingredientsRow = mysqli_fetch_assoc($orderedIngredients)) {
                    echo "<p>". $ingredientsRow["zutat_name"] . "x" .$ingredientsRow["menge"] ."</p>";
                }
            }

            echo "<div><h4>Gesamtpreis". $orderRow["gesamtpreis_ct"] / 100 ."€</h4></div>";
        }

        echo "</div>";

    } else {
        header("location: login.php");
        exit();
    }
    ?>
</main>
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
        echo "<p>Straße: " . $_SESSION["street"] . "</p>";
        echo "<p>Hause Nr.: " . $_SESSION["houseNo"] . "</p>";
        echo "<p>Plz.: " . $_SESSION["postalCode"] . "</p>";
        echo "<p>Ort: " . $_SESSION["city"] . "</p>";
        echo "<p>Telefon: " . $_SESSION["phone"] . "</p>";

        echo "<form action='/Kraut_und_Rueben/src/main/php/Controller/ProfileController.php' method='post'>
                    <button class='delete-profile' type='submit' name='delete'>Profil löschen</button>
                  </form>";

        echo "<br>";
        echo "Meine Bestellungen";
        $orders = MyOrders($conn);
        echo "<table>";
        echo "<tr><th>Datum</th><th>Preis</th></tr>";
        while ($row = mysqli_fetch_assoc($orders)) {
            echo "<tr><td>" . $row["datum"] . "</td><td>" . $row["gesamtpreis_ct"] / 100 . "€</td></tr>";
        }
        /*
            SELECT bestellungrezept.bestellung_id, rezept.rezept_name, bestellungrezept.menge FROM `bestellungrezept`
            INNER JOIN rezept ON rezept.rezept_id = bestellungrezept.rezept_id
            WHERE bestellung_id = 1

            SELECT bestellungzutat.bestellung_id, zutat.zutat_name,  bestellungzutat.menge FROM bestellungzutat
            INNER JOIN zutat ON bestellungzutat.zutat_id = zutat.zutat_id
            WHERE bestellung_id = 1
            */
    } else {
        header("location: login.php");
        exit();
    }
    ?>
</main>
<?php
    session_start();
    include_once '../../header.php';
?>

    <main>
        <?php
        if(isset($_SESSION["kunde_id"])){
            echo "<p>Vorname: ". $_SESSION["firstname"] ."</p>";
            echo "<p>Nachname: ". $_SESSION["lastname"] ."</p>";
            echo "<p>E-Mail: ". $_SESSION["email"] ."</p>";
            echo "<p>Geburtsdatum: ". $_SESSION["birthdate"] ."</p>";
            echo "<p>Straße: ". $_SESSION["street"] ."</p>";
            echo "<p>Hause Nr.: ". $_SESSION["houseNo"] ."</p>";
            echo "<p>Plz.: ". $_SESSION["postalCode"] ."</p>";
            echo "<p>Ort: ". $_SESSION["city"] ."</p>";
            echo "<p>Telefon: ". $_SESSION["phone"] ."</p>";
        }
        else {
            //header("location: login.php");
            //exit();
        }
        ?>
        <form action="/Kraut_und_Rueben/src/main/php/Controller/ProfileController.php" method="post">
            <button class="delete-profile" type="submit" name="delete">Profil löschen</button>
        </form>
    </main>

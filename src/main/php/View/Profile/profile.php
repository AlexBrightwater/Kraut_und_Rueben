<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kraut&Rüben</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav>
    <div class="wrapper">
        <a href="View/Index/index.php"><img class="wrapper-item wrapper-logo wrapper-left" src="../../../../../www/img/logo.png" alt="logo"></a>

            <?php
            if(isset($_SESSION["kunde_id"])){
                echo '<div class="wrapper-right"> <a id="logoutbutton" class="wrapper-item wrapper-button" href="../../Controller/LogoutController.php">Log out</a> </div>';
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

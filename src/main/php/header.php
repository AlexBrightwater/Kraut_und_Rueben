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
                <div class="wrapper-right">
                    <?php
                        if(isset($_SESSION["kunde_id"])){
                            echo '<a id="profilebutton" class="wrapper-item wrapper-button" href="../Profile/profile.php">Profile</a>';
                            echo '<a id="logoutbutton" class="wrapper-item wrapper-button" href="../../Controller/LogoutController.php">Log out</a>';
                        }else{
                            echo '<a id="loginbutton" class="wrapper-item wrapper-button" href="../Profile/login.php">Log in</a>';
                        }
                    ?>
                </div>
            </div>
        </nav>
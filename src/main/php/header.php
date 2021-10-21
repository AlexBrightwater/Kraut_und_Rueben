<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Kraut&Rüben</title>
        <link rel="stylesheet" href="/Kraut_und_Rueben/www/css/style.css">
    </head>
    <body>
        <nav>
                <a href="View/Index/index.php"><img class="wrapper-item wrapper-logo wrapper-left" src="../../../../../www/img/logo.png" alt="logo"></a>
                <div>
                    <?php
                        $path = '/Kraut_und_Rueben/src/main/php/View/Index/';

                        if(isset($_SESSION["kunde_id"])){
                            if($_SERVER['REQUEST_URI'] == $path . 'profile.php'){
                                echo '<a id="logoutbutton" class="wrapper-item wrapper-button" href="../../Controller/LogoutController.php">Log out</a>';
                            }
                            else if($_SERVER['REQUEST_URI'] == $path . 'login.php'){
                                /*No Buttons here */
                            }
                            else{
                                echo '<a id="profilebutton" class="wrapper-item wrapper-button" href="../Profile/profile.php">Profile</a>';
                                echo '<a id="logoutbutton" class="wrapper-item wrapper-button" href="../../Controller/LogoutController.php">Log out</a>';
                            }
                            
                        }
                        else{
                            echo '<a id="loginbutton" class="wrapper-item wrapper-button" href="../Profile/login.php">Log in</a>';
                        }
                    ?>
                </div>
        </nav>
        <div class="wrapper">
            <div class="wrapper-leftbar"></div>
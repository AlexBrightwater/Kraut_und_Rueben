<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Kraut & Rüben</title>
        <link rel="stylesheet" href="/Kraut_und_Rueben/www/css/style.css">
        <link rel="stylesheet" href="/Kraut_und_Rueben/www/css/profile.css">
        <script src="https://kit.fontawesome.com/1908996dcd.js" crossorigin="anonymous"></script>
    </head>
    <body>

    <script>
        function nodown(){ 
            var element = document.getElementById("dropdown-content");
            element.style.opacity = '0'
        }
                
       function dropdown(){
        var element = document.getElementById("dropdown-content");
        if(element.style.opacity === '0') {
                element.style.opacity = '100%';
                element.style.transition = '0.3s ease-in-out';
            } else {
                element.style.opacity = '0'
            }
       }
    </script>
        <nav class='header'>
                <a href="/Kraut_und_Rueben/src/main/php/View/Index/index.php"><img class="wrapper-item wrapper-logo wrapper-left" src="../../../../../www/img/logo.png" alt="logo"></a>
                <div>
                    <?php
                        $path = '/Kraut_und_Rueben/src/main/php/View/';

                        if(isset($_SESSION["kunde_id"])){
                            if($_SERVER['REQUEST_URI'] == $path . 'Profile/profile.php'){
                                echo '<a id="logoutbutton" class="wrapper-item wrapper-button" href="../../Controller/LogoutController.php">Log out</a>';
   
                            }
                            else if($_SERVER['REQUEST_URI'] == $path . 'Profile/login.php'){
                                /*No Buttons here  Also this is not possible*/
                            }
                            else if($_SERVER['REQUEST_URI'] == $path . 'Profile/signup.php'){
                                /*No BUtton here This is not possible*/
                            }
                            else{
                                echo '<a id="profilebutton" class="wrapper-item wrapper-button" href="../Profile/profile.php">Profile</a>';
                                echo '<a id="logoutbutton" class="wrapper-item wrapper-button" href="../../Controller/LogoutController.php">Log out</a>';
                            }
                            
                        }
                        else{
                            echo '<a id="loginbutton" class="wrapper-item wrapper-button" href="../Profile/login.php">Log in</a>';
                            echo '<a id="signupbutton" class="wrapper-item wrapper-button" href="../Profile/signup.php">Sign Up</a>';

                        }
                    ?>
                    <i class="fas fa-bars" onmouseover="dropdown()"></i>
                    <div class="dropdown-content" id="dropdown-content">
                        <ul>
                            <li><a href="/Kraut_und_Rueben/src/main/php/View/Index/index.php">Home</a></li>
                            <li><a href="/Kraut_und_Rueben/src/main/php/impressum.php">Impressum</a></li>
                            <li><a href="/Kraut_und_Rueben/src/main/php/datenschutz.php">Datenschutz</a></li>
                        </ul>
                    </div>
                </div> 
        </nav>
        <div class="wrapper" onclick="nodown()">
            <div class="wrapper-leftbar"></div>
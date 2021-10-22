<?php

if(isset($_POST["delete"])){
    session_start();

    require_once '../Service/DatabaseConnection.php';
    require_once '../Service/ProfileFunctions.php';

    deleteUser($conn);

    session_unset();
    session_destroy();

    header("location: /Kraut_und_Rueben/src/main/php/View/Index/index.php");
    exit();
}else{
    header("location: /Kraut_und_Rueben/src/main/php/View/Profile/profile.php?error=wrongSubmit");
    exit();
}
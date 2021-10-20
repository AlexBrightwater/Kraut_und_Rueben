<?php

if(isset($_POST["submit"])){

    require_once '../Service/DatabaseConnection.php';
    require_once '../Service/ProfileFunctions.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(emptyInputLogin($email, $password) !== false){
        header("location: ../View/Profile/login.php?error=emptyinput");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../View/Profile/login.php?error=invalidEmail");
        exit();
    }

    loginUser($conn, $email, $password);
}else{
    header("location: ../View/Profile/login.php");
    exit();
}
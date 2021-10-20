<?php

if(isset($_POST["submit"])){

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["password-repeat"];
    $birthdate = $_POST['birthdate'];
    $street = $_POST['street'];
    $houseNo = $_POST['houseNo'];
    $postalCode = $_POST['postalCode'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];

    require_once '../Service/DatabaseConnection.php';
    require_once '../Service/ProfileFunctions.php';

    if(emptyInputSignup($email, $password, $passwordRepeat) !== false){
        header("location: ../View/Profile/signup.php?error=emptyinput");
        exit();
    }
    if(!empty($email)){
        if(invalidEmail($email) !== false){
            header("location: ../View/Profile/signup.php?error=invalidEmail");
            exit();
        }
    }
    if(passwordsDontMatch($password,$passwordRepeat) !== false){
        header("location: ../View/Profile/signup.php?error=nopasswordmatch");
        exit();
    }
    if(userExists($conn, $email) !== false){
        header("location: ../View/Profile/signup.php?error=usernameistaken");
        exit();
    }

    createUser($conn, $firstname, $lastname, $email, $password, $birthdate, $street, $houseNo, $postalCode, $city, $phone);


}else{
    header("location: ../View/Profile/signup.php");
    exit();
}
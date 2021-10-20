<?php

    //Signup

    function emptyInputSignup($email, $password, $passwordRepeat){
        if(empty($email) || empty($password) || empty($passwordRepeat)){
            return true;
        }
        return false;
    }

    function invalidEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    function passwordsDontMatch($password, $passwordRepeat){
        if($password !== $passwordRepeat){
            return true;
        }
        return false;
    }

    function userExists($conn, $email){

        $sql = "SELECT * FROM kunde WHERE email = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../View/Profile/signup.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email);

        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }else{
            return false;
        }

        mysqli_stmt_close($stmt);
    }

    function createUser($conn, $firstname, $lastname, $email, $password, $birthdate, $street, $houseNo, $postalCode, $city, $phone){
        $sql = "INSERT INTO kunde (vorname, ncahname, email, passwort, geburtsdatum, strasse, haus_nr, plz, ort, telefon) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ./View/Profile/signup.php?error=stmtfailed");
            exit();
        }

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssssssssss", $firstname, $lastname, $email, $hashedPwd, $birthdate, $street, $houseNo, $postalCode, $city, $phone);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $userExists = userExists($conn, $email);
        session_start();

        $_SESSION["kunde_id"]=$userExists["kunde_id"];
        $_SESSION["firstname"]=$userExists["vorname"];
        $_SESSION["lastname"] = $userExists["nachname"];
        $_SESSION["email"] = $userExists["email"];
        $_SESSION["birthdate"] = $userExists["geburtsdatum"];
        $_SESSION["street"] = $userExists["strasse"];
        $_SESSION["houseNo"] = $userExists["haus_nr"];
        $_SESSION["postalCode"] = $userExists["pls"];
        $_SESSION["city"] = $userExists["ort"];
        $_SESSION["phone"] = $userExists["telefon"];

        header("location: ../View/Index/index.php");
        exit();
    }

    //Login

    function emptyInputLogin($email, $password){
        if(empty($email) || empty($password)){
            return true;
        }
        return false;
    }

    function loginUser($conn, $email, $password){
        $userExists = userExists($conn, $email);

        if($userExists === false){
            header("location: ./View/Profile/login.php?error=userdoesntexist");
            exit();
        }

        $passwordHashed = $userExists["passwort"];

        $checkPwd = password_verify($password, $passwordHashed);

        if($checkPwd === false){
            header("location: ../View/Profile/login.php?error=wrongpassword");
            exit();
        } else if($checkPwd === true){
            session_start();
            $_SESSION["kunde_id"]=$userExists["kunde_id"];
            $_SESSION["firstname"]=$userExists["vorname"];
            $_SESSION["lastname"] = $userExists["nachname"];
            $_SESSION["email"] = $userExists["email"];
            $_SESSION["birthdate"] = $userExists["geburtsdatum"];
            $_SESSION["street"] = $userExists["strasse"];
            $_SESSION["houseNo"] = $userExists["haus_nr"];
            $_SESSION["postalCode"] = $userExists["pls"];
            $_SESSION["city"] = $userExists["ort"];
            $_SESSION["phone"] = $userExists["telefon"];
            header("location: ../View/Index/index.php");
            exit();
        }
    }

    function deleteUser($conn){
        $user = $_SESSION["kunde_id"];

    }

<?php

    if(isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confPassword = $_POST["confPassword"];
        $firstName = $_POST["name"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $dob = $_POST["dob"];

        
        require_once "dbh-inc.php";
        require_once "functions-inc.php";

        //Validation
        $passwordsMatch = passwordMatch($password, $confPassword);
        if(!$passwordsMatch) {
            header("location:../registration.php?error=passwordsmatch");
            exit();
        }

        $invUsername = invalidUsername($username);
        if($invUsername){
            header("location:../registration.php?error=usernameInvalid");
            exit();
        }

        $emptyInputs = emptyInputs($username, $password, $confPassword, $firstName, $lastName, $email, $dob);
        if($emptyInputs) {
            header("location:../registration.php?error=emptyInputs");
            exit();
        }

        $invalidEmail = invalidEmail($email);
        if(!$invalidEmail) {
            header("location:../registration.php?error=invalidEmail");
            exit();
        }

        if(userExists($conn, $username) !== false) {
            header("location:../registration.php?error=usernameExists");
            exit();
        }

        createUser($conn, $username, $password, $firstName, $lastName, $email, $dob);

    }
    else {
        header("location:../registration.php");
    }




?>
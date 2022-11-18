<?php


function createUser($conn, $username, $password, $firstName, $lastName, $email, $dob) {
    //Function to create user account in database

    $registrationDate = date("y-m-d");

    $sql = "INSERT INTO users (username, password, firstName, lastName, email, dob, registrationDate) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt  = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../registration.php?error=statementfailed");
        exit();
    }
        

        
        mysqli_stmt_bind_param($stmt, "sssssss", $username, $password, $firstName, $lastName, $email, $dob, $registrationDate);

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location../registration.php?error=none");
        
    
}

function loadUsers($conn) {
    // Function to load all users from database

    $sql = "SELECT * FROM users";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load users";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function passwordMatch($password, $confPassword) {
    if($password == $confPassword) {
        $result = true;
    }
    return $result;
}

function invalidUsername($username) {
    $result = false;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }

    return $result;
}

function emptyInputs($username, $password, $confPassword, $firstName, $lastName, $email, $dob) {
    if(empty($username) || empty($password) || empty($confPassword) || empty($firstName) || empty($lastName) || empty($email) || empty($dob)) {
        return true;
    }
}

function invalidEmail($email) {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    else {
        return false;
    }
    
}

function usersExists($conn, $username) {
    $sql = "SELECT * FROM users WHERE username = ?;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../registration.php?error=statementFailed");
            exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    mysql_stmt_close($stmt);

    if($row = mysqli_fetch_assoc($result)) {
        // Cannot Register
        return $row;
    }
    else {
        
        return false;
    }
}


?>
<?php 
    if (isset($_POST["submit"])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $psw = $_POST["password"];
        $email = $_POST["email"];

        require_once 'connect.php';
        require_once 'functions.php';

        if(invalidUid($email) === false) {
            header("location: sign.php?error=invaliduid");
            exit();
        }
        if(uidExists($conn, $email) !== false) {
            header("location: sign.php?error=usernametaken");
            exit();
        }
        createUser($conn, $fname, $lname, $email, $psw);
    }
    else {
        header("location: index.php");
    }
?>
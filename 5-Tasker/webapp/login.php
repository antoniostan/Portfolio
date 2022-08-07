<?php
    if (isset($_POST["submit"])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $psw = $_POST["password"];

        require_once 'connect.php';
        require_once 'functions.php';
        if(invalidUid($email) === false) {
            header("location: sign.php?error=invaliduid");
            exit();
        }
        loginUser($conn, $email, $psw);
    }
    else {
        header("location: index.php?error=submitfailed");
    }
<?php

session_start();

function invalidUid($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = false;
    } else {
        $result = true;
    }

    return $result;
}

function uidExists($conn, $email) {
    $sql = "SELECT * FROM tasker WHERE email = '$email';";
    $result = mysqli_query($conn, $sql);
    if(!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    if(mysqli_num_rows($result) == 0) {
        $result = false;
        return $result;
    }
    else {
        $result = true;
        return $result;
    }
    exit();
}


function createUser($conn, $fname, $lname, $email, $psw) {
    $hashedPwd = password_hash($psw, PASSWORD_DEFAULT);
    $sql = "INSERT INTO tasker (fname, lname, password, email) VALUES('$fname', '$lname', '$hashedPwd', '$email');";
    // echo $sql;
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: sign.php?error=none");
        exit();
    } else {
        echo "error: " + mysqli_error($conn);
    }
}

function loginUser($conn, $email, $psw) {
    $sql = "SELECT * FROM tasker WHERE email = '$email';";
    $result = mysqli_query($conn, $sql);
    if(!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    $pwdHashed = $row["password"];

    if(mysqli_num_rows($result) != 0 && $email === $row["email"]) {
        if(password_verify($psw, $pwdHashed)) {
            session_start();
            $_SESSION["id"] = $row["id"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["fname"] = $row["fname"];
            $_SESSION["lname"] = $row["lname"];
            header("location: welcome.php");
            exit();
        }
        else {
            header("location: sign.php?error=wrongpass");
            exit();
        }
    }
    else {
        header("location: sign.php?error=wronguser");
        exit();
    }
}


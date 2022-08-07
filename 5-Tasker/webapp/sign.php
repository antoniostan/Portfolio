<?php
    session_start();
    require_once 'connect.php';
    require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/sign.css" type="text/css">
    <script src="/js/sign.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>  
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_SESSION["usr"])) {
		echo "<h2>You are currently logged in as: ". $_SESSION["usr"] ."</h2> <a href='logout.php'>Log Out</a>";
    } else {
        echo "
        <div class='bg'>
        <div class='container' id='standard'>
            ";
            if(isset($_GET["error"])) {
                if($_GET["error"] == "invaliduid") {
                    echo "
                    <center>
                        <h3 style='text-decoration: underline; color: red;'>You entered an invalid email!</h3>
                    </center>
                    ";
                }
                if($_GET["error"] == "usernametaken") {
                    echo "
                    <center>
                        <h3 style='text-decoration: underline; color: red;'>You entered a taken email!</h3>
                    </center>
                    ";
                }
                if($_GET["error"] == "wrongpass" || $_GET["error"] == "wronguser") {
                    echo "
                    <center>
                        <h3 style='text-decoration: underline; color: red;'>You entered username or password wrong!</h3>
                    </center>
                    ";
                }
                if($_GET["error"] == "none") {
                    echo "
                    <center>
                        <h3 style='text-decoration: underline; color: green;'>You succesfully registered!</h3>
                    </center>
                    ";
                }
            }
            echo "
            <h1>TASKER</h1>
            <button class='sign' id='sign' onclick='activateSign()'>Sign Up</button><br><br><br><br><br>
            <a href='#' class='log' id='log' onclick='activateLog()'>Log In</a><br><br><br><br>
            <h4>Prin inscrierea in aplicatie esti de acord cu <a href='#' class='blue'>Termenii si Conditiile</a> aplicate.</h4>
        </div>
        <div class='container_2' id='sign-up'>
            <h1>TASKER</h1>
            <form action='insert_member.php' method='post'>
                <input type='text' id='fname' name='fname' placeholder='First Name' required><br><br>
                <input type='text' id='lname' name='lname' placeholder='Last Name' required><br><br>
                <input type='text' id='email' name='email' placeholder='Email Address' required><br><br>
                <input type='password' id='password' name='password' placeholder='Password' required><br><br>
                <h4>Prin inscrierea in aplicatie esti de acord cu <a href='#' class='blue'>Termenii si Conditiile</a> aplicate.</h4>
                <button type='submit' name='submit' class='log'>Create Account</button>
            </form>
        </div>
        <div class='container_2' id='log-in'>
            <h1>TASKER</h1>
            <form action='login.php' method='post'>
                <input type='text' id='email' name='email' placeholder='Email Address' required><br><br>
                <input type='password' id='pass' name='password' placeholder='Password' required><br><br>
                <button type='submit' name='submit' class='log'>Log In</button>
            </form>
        </div>
    </div>
        ";
    }
    ?>
</body>
</html>
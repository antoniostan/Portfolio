<?php 
    session_start();
    require('connect.php');
    require('functions.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/welcome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">   
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
    <script src="/js/navigation.js"></script>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Welcome</title>
</head>
<body>
    <?php
    echo "
    <div class='border'>
        <div style='float:right;margin-top: 30px;'>
            <a href='logout.php' class='select-button'>Log Out</a>
        </div>
    </div>
    <div class='container'>
        <h1 class='welcome-title'>TASKER</h1>
        <h4 class='welcome-subtitle'>Profilul tau Tasker:</h4>
        <div class='content'>
            <div class='left'>
                <div class='card'>
                    <img src='/img/feature1.jpg'>";
                    echo "<p class='card-content'>Name: " . $_SESSION["fname"] . " " . $_SESSION["lname"] . "</p>";
                    echo "<p class='card-content'>&#9733; 4.9 (1071 reviews)</p>
                    <p class='card-content'>454 Taskuri</p>
                </div>
                <div class='about'>
                    <h3 class='about-title'>About me</h3>
                    <p class='description'>Taskerul de top din Bucuresti! Te astept sa colaboram impreuna.</p>
                    <hr class='short'>
                    <p class='additional'><i class='material-icons'>add_location</i>Lucrez in Bucharest</p>
                    <p class='additional'><i class='material-icons'>beenhere</i>Buletin Verificat</p>
                    <p class='additional'><i class='material-icons'>calendar_today</i>Tasker din 2022</p>
                </div>
                <div class='skills'>
                    <h3 class='skill-title'>My skills</h3>
                    <hr class='long'>
                    <p class='skill'>Computer Help</p><p class='symbol'>&#62;</p>
                    <hr class='long'>
                    <p class='skill'>Livrare</p><p class='symbol'>&#62;</p>
                    <hr class='long'>
                    <p class='skill'>Distractie</p><p class='symbol'>&#62;</p>
                    <hr class='long'>
                    <p class='skill'>Asistent personal</p><p class='symbol'>&#62;</p>
                    <hr class='long'>
                    <p class='skill'>Asamblare mobila</p><p class='symbol'>&#62;</p>
                    <hr class='long'>
                    <p class='skill'>Organizare eveniment</p><p class='symbol'>&#62;</p> 
                </div>
            </div>
            <div class='right'>
                <div class='review'>
                    <div class='text-review'>
                        <h3 class='padding'>Computer Help pentru 100RON</h3>
                        <p class='padding'>&#9733; 5.0 (12 review-uri)</p>
                        <p class='padding'>Windows & Mac OSX</p>
                        <a href='#' class='link-review'>Vezi review-uri</a>
                    </div>
                    <div class='select'>
                        <a href='#' class='select-button'>Selecteaza si Continua</a>
                    </div>
                </div>
                <div class='review'>
                    <div class='text-review'>
                        <h3 class='padding'>Livrare pentru 60RON</h3>
                        <p class='padding'>&#9733; 4.8 (28 review-uri)</p>
                        <p class='padding'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        <a href='#' class='link-review'>Vezi review-uri</a>
                    </div>
                    <div class='select'>
                        <a href='#' class='select-button'>Selecteaza si Continua</a>
                    </div>
                </div>
                <div class='review'>
                    <div class='text-review'>
                        <h3 class='padding'>Distractie pentru 500RON</h3>
                        <p class='padding'>&#9733; No reviews</p>
                        <p class='padding'>Am un costum de Mos Craciun complet!</p>
                        <a href='#' class='link-review'>Vezi review-uri</a>
                    </div>
                    <div class='select'>
                        <a href='#' class='select-button'>Selecteaza si Continua</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
    ?>
</body>
</html>
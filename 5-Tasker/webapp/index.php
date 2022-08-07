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
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">    
    <script src="/js/navigation.js"></script>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>TASKER</title>
</head>
<body>
    <?php 
    if(isset($_SESSION["email"])) {
		echo "<h2>You are currently logged in as: ". $_SESSION["usr"] ."</h2> <a href='logout.php'>Log Out</a>";
    } else {
        echo "
        <header id='primary-header' class='primary-header'>
        <nav>
            <ul class='navbar'>
                <li id='logo'><a href='#'>TASKER</a></li>
                <li><a href='#'>Locatii</a></li>
                <div class='dropdown' onmouseover='activateDropdown()' onmouseout='deactivateDropdown()'>
                    <button class='dropbtn'>Servicii</button>
                    <div id='myDropdown' class='dropdown-content'>
                        <h5 style='text-align:center'>TASKURI POPULARE</h5>
                        <a href='#'>Asamblarea de mobila</a>
                        <a href='#'>Montare TV</a>
                        <a href='#'>Mester</a>
                        <a href='#'>Gradinar</a>
                        <a href='#'>Serviciu de Livrare</a>
                        <a href='#'>Vopsit</a>
                    </div>
                </div>
                <li><a href='/sign.php'>Sign-up / Login</a></li>
                <li id='special'><a href='#'>Devino membru!</a></li>
            </ul>
        </nav>
        <div class='background'>
            <div class='join'>
                <h1>Casa ta merita mai mult!</h1>
                <hr class='short'>
                <p>Curatarea de primavara cu ajutorul unui Tasker de incredere.</p>
                <div class='search'>
                    <input type='text' id='search' name='search' placeholder='Am nevoie de...'>
                    <button type='submit'>Cauta</button>
                </div>
                <div class='background-buttons'>
                    <a href='#' class='bg-btn'>Asamblare de Mobila</a>
                    <a href='#' class='bg-btn'>Montare TV</a>
                    <a href='#' class='bg-btn'>Gradinar</a>
                    <a href='#' class='see-more'>Vezi mai mult</a>
                </div>
            </div>
        </div>
    </header>
    <h1 class='important'>Proiecte Populare</h1>
    <main id='projects'>
        <div class='grid'>
            <article>
                <a href='#'>
                    <img src='/img/card.jpg' alt='Furniture Assembly'>
                    <div class='text'>
                        <p>Ansamblare de mobila</p>
                        <h3>Pret mediu: 50RON - 125RON</h3>
                    </div>
                </a>
            </article>
            <article>
                <a href='#'>
                    <img src='/img/card1.jpg' alt='TV Mounting'>
                    <div class='text'>
                        <p>Montare TV</p>
                        <h3>Pret mediu: 30RON - 75RON</h3>
                    </div>
                </a>
            </article>
            <article>
                <a href='#'>
                    <img src='/img/card2.jpg' alt='Handyman'>
                    <div class='text'>
                        <p>Mester</p>
                        <h3>Pret mediu: 100RON - 420RON</h3>
                    </div>
                </a>
            </article>
            <article>
                <a href='#'>
                    <img src='/img/card3.jpg' alt='Gardener'>
                    <div class='text'>
                        <p>Gradinar</p>
                        <h3>Pret mediu: 35RON - 175RON</h3>
                    </div>
                </a>
            </article>
            <article>
                <a href='#'>
                    <img src='/img/card4.jpg' alt='Delivery Service'>
                    <div class='text'>
                        <p>Serviciu de Livrare</p>
                        <h3>Pret mediu: 10RON - 30RON</h3>
                    </div>
                </a>
            </article>
            <article>
                <a href='#'>
                    <img src='/img/card6.jpg' alt='Painting'>
                    <div class='text'>
                        <p>Vopsit</p>
                        <h3>Pret mediu: 30RON - 175RON</h3>
                    </div>
                </a>
            </article>
            <article>
                <a href='#'>
                    <img src='/img/card7.jpg' alt='Light Installation'>
                    <div class='text'>
                        <p>Instalator</p>
                        <h3>Pret mediu: 95RON - 225RON</h3>
                    </div>
                </a>
            </article>
            <article>
                <a href='#'>
                    <img src='/img/card8.jpg' alt='Cleaning Services'>
                    <div class='text'>
                        <p>Serviciu de Curatenie</p>
                        <h3>Pret mediu: 50RON - 100RON</h3>
                    </div>
                </a>
            </article>
        </div>

        <div id='purpose' class='container purpose-img'>
            <div class='purpose-content'>
                <div class='purpose-text'>
                    <h2>Viata facuta mai usoara</h2>
                    <p>
                        Cand viata se aglomereaza, nu te mai bate cu ea singur!
                    </p>
                    <p>
                        Castigati inapoi timpul pentru a face ceea ce iubesti fara sa spargi pusculita.
                    </p>
                    <h5>&#10004; Alegeti tasker-ul dupa nota, pret si practica.</h5>
                    <h5>&#10004; Planifica task-ul cand poti tu!</h5>
                    <h5>&#10004; Vorbeste, plateste si ofera bacsis intr-o singura platforma.</h5>
                </div>
            </div>
        </div>

        <div id='featured'>
            <div class='carousel_v grid enlarged'>
                <article class='featured'>
                    <img src='/img/feature1.jpg' alt='Featured Taskers'>
                    <div class='featured-text'>
                        <p class='name'>Alex F.</p>
                        <p class='reviews'>9.6 / 10 &#11088;</p>
                        <p class='reviews'>143 tasks &#9989;</p>
                        <hr>
                        <p class='grey'>
                            Abilitati:
                        </p>
                        <div class='left'>
                            <p>Instalator &#10145;</p>
                            <p>Gradinar &#10145;</p> 
                            <p>Ansamblare mobila &#10145;</p>
                        </div>
                        <div class='right'>
                            <p class='right'> 50RON / hr</p>
                            <p class='right'>65RON / hr</p>
                            <p class='right'>40RON / hr</p>
                        </div>
                        
                        <hr class='featured-hr'>
                        <h6>Sunt potrivit pentru: </h6>
                        <p class='none'>Am resursele potrivite pentru a te ajuta sa te muti...</p>
                    </div>
                </article>
                <article class='featured'>
                    <img src='/img/feature32.jpg' alt='Featured Taskers'>
                    <div class='featured-text'>
                        <p class='name'>Corina T.</p>
                        <p class='reviews'>9.6 / 10 &#11088;</p>
                        <p class='reviews'>143 tasks &#9989;</p>
                        <hr>
                        <p class='grey'>
                            Abilitati:
                        </p>
                        <div class='left'>
                            <p>Curatenie &#10145;</p>
                            <p>Zugrav &#10145;</p> 
                            <p>Electrician &#10145;</p>
                        </div>
                        <div class='right'>
                            <p class='right'> 35RON / hr</p>
                            <p class='right'>85RON / hr</p>
                            <p class='right'>105RON / hr</p>
                        </div>
                        
                        <hr class='featured-hr'>
                        <h6>Sunt potrivit pentru: </h6>
                        <p class='none'>Am resursele potrivite pentru a te ajuta sa te muti...</p>
                    </div>
                </article>
                <article class='featured'>
                    <img src='/img/feature3.jpg' alt='Featured Taskers'>
                    <div class='featured-text'>
                        <p class='name'>Vlad F.</p>
                        <p class='reviews'>9.6 / 10 &#11088;</p>
                        <p class='reviews'>143 tasks &#9989;</p>
                        <hr>
                        <p class='grey'>
                            Abilitati:
                        </p>
                        <div class='left'>
                            <p>Tehnician &#10145;</p>
                            <p>Gradinar &#10145;</p> 
                            <p>Ansamblare mobila &#10145;</p>
                        </div>
                        <div class='right'>
                            <p class='right'> 75RON / hr</p>
                            <p class='right'>55RON / hr</p>
                            <p class='right'>60RON / hr</p>
                        </div>
                        
                        <hr class='featured-hr'>
                        <h6>Sunt potrivit pentru: </h6>
                        <p class='none'>Am resursele potrivite pentru a te ajuta sa te muti...</p>
                    </div>
                </article>
                <article class='featured'>
                    <img src='/img/feature4.jpg' alt='Featured Taskers'>
                    <div class='featured-text'>
                        <p class='name'>Razvan M.</p>
                        <p class='reviews'>9.6 / 10 &#11088;</p>
                        <p class='reviews'>143 tasks &#9989;</p>
                        <hr>
                        <p class='grey'>
                            Abilitati:
                        </p>
                        <div class='left'>
                            <p>Instalator &#10145;</p>
                            <p>Zidar &#10145;</p> 
                            <p>Renovari &#10145;</p>
                        </div>
                        <div class='right'>
                            <p class='right'> 50RON / hr</p>
                            <p class='right'> 95RON / hr</p>
                            <p class='right'> 250RON / hr</p>
                        </div>
                        
                        <hr class='featured-hr'>
                        <h6>Sunt potrivit pentru: </h6>
                        <p class='none'>Am resursele potrivite pentru a te ajuta sa te muti...</p>
                    </div>
                </article>
            </div>
        </div>
        <div id='team' class='team container'>
            <div class='team-content'>
                <div class='team-image'>
                    <img src='/img/moving2.jpg' alt='Teamwork'>
                </div>
                <div class='team-text'>
                    <h2>O echipa gata sa-ti satisfaca nevoile!</h2>
                    <p class='short-width'>
                        Construieste-ti echipa ta de Taskeri pentru a-ti face viata mai usoara.
                        Orice ai nevoie, se descurca ei!
                    </p>
                    <h5>&#10004; Compara preturi, note si reviewuri intre Taskeri.</h5>
                    <h5>&#10004; Alege persoana potrivita pentru Task-ul tau.</h5>
                    <h5>&#10004; Salveaza la favorite pentru a contacta din nou.</h5>
                </div>
            </div>
        </div>

        <div id='cities' class='cities'>
            <h1 class='important'>Orasele in care lucram: </h2>
            <div class='container-city'>
                <div class='search'>
                    <input type='text' id='search' name='search' placeholder='Introdu orasul/codul postal'>
                    <button type='submit'>Cauta</button>
                </div>
            </div>
        </div>

        <div id='ready' class='ready'>
            <div class='container'>
                <h1 class='important centered'>
                    Esti gata?
                </h1>
                <div class='container-choice'>
                    <div class='vl'></div>
                    <div class='left'>
                        <h3>Elibereaza-ti programul si termina ce ai de facut azi!</h3>
                        <img src='/img/sign.jpg' alt='Sign in'><br><br><br>
                        <a href='sign.php' class='join-2'>Log in</a>
                    </div>
                    <div class='right'>
                        <h3>Devino usurarea oamenilor in viata de zi cu zi!</h3>
                        <img src='/img/register.jpg' alt='Register'><br><br><br>
                        <a href='sign.php' class='join-2'>Register</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer id='footer'>
        <p class='grey'>
            Urmareste-ne si aici: 
            <a href='#' class='fa fa-facebook'></a>
            <a href='#' class='fa fa-instagram'></a>
            <a href='#' class='fa fa-twitter'></a>
        </p>
        <div class='footer'>
            <ul class='navbar-footer left'>
                <li><p class='grey'>Descopera</p></li>
                <li class='footer-link'>
                    <a href='#'>Devino Tasker</a>
                </li>
                <li class='footer-link'>
                    <a href='#'>Serviciile disponibile</a>
                </li>
                <li class='footer-link'>
                    <a href='#'>Serviciile pe orase</a>
                </li>
                <li class='footer-link'>
                    <a href='#'>Taskeri 'Elite'</a>
                </li>
                <li class='footer-link'>
                    <a href='#'>Ajutor</a>
                </li>
            </ul>
            <ul class='navbar-footer middle'>
                <li><p class='grey'>Companie</p></li>
                <li class='footer-link'>
                    <a href='#'>Despre Noi</a>
                </li>
                <li class='footer-link'>
                    <a href='#'>Cariere</a>
                </li>
                <li class='footer-link'>
                    <a href='#'>Stiri</a>
                </li>
                <li class='footer-link'>
                    <a href='#'>Blog</a>
                </li>
                <li class='footer-link'>
                    <a href='#'>Conditii si Termeni</a>
                </li>
            </ul>
            <ul class='navbar-footer right'>
                <li><p class='grey'>Descarca</p></li>
                <li><p>Curand va fi lansata si pe telefon!</p></li>
                <li class='footer-link'>
                    <a href='#' class='fa-brands fa-app-store'></a>
                    <a href='#' class='fa-brands fa-play-store'></a>
                </li>
            </ul>
        </div>
        <p class='grey'>Copyright&copy; Antonio Stan 2022</p>
    </footer>
        ";
    }
    ?>
    

</body>
</html>
<?php
session_start();
require_once "pdo.php";

//password
?>
<!DOCTYPE html>
<html lang="en">

<!--
      Cyber Pro - Flash Cards html
      Hackathon - Hack-it-together '23
      Miriam Gelbstein, Meira Soffer, Liel Shkap
-->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet"/>
    <link href="css/main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="flashcards.css" />
    <title>Flash Cards</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#"></a>
        <a class="navbar-brand" href="#">
            <img src="images/cyberprologo.png" width="300" height="180" alt="">
        </a>
        <a class="navbar-brand" href="#">
            <?php if (isset($_SESSION["user"])) {
                echo("Hello, ".($_SESSION["user"]). "!");
                } ?>
        </a>
        <a class="navbar-brand" href="logout.php">
            Logout
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="new.php">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="matching.php">Matching Game</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="flashcards.php">Flashcards</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php if ( ! isset($_SESSION["user"]) ) {?>
<h1 style="color: grey; text-align: center; padding-top: 1vw;">Please Log In</h1>
<?php } else { ?>
<section class="section-plans" id="section-plans">
    <div class="u-center-text u-margin-bottom-big">
        <h2 class="heading-secondary">
            CyberPro Flash Cards
        </h2>

    </div>

    <div class="row">
        <div class="col-1-of-3">
            <div class="card">
                <div class="card__side card__side--front-1">
                    <div class="card__title card__title--1">
                        <h4 class="card__question">What is considered personal information?</h4>
                    </div>
                </div>
                <div class="card__side card__side--back card__side--back-1">
                    <div class="card__answer">
                        <p>Anything with personal info, like your address, name, number etc..</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-1-of-3">
            <div class="card">
                <div class="card__side card__side--front-2">
                    <div class="card__title card__title--2">
                        <h4 class="card__question">What do you do if you see something harmful online?</h4>
                    </div>
                </div>
                <div class="card__side card__side--back card__side--back-2">
                    <div class="card__answer">
                        <p>Tell a parent, teacher or any adult person</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-1-of-3">
            <div class="card">
                <div class="card__side card__side--front-2">
                    <div class="card__title card__title--2">
                        <h4 class="card__question">What are some examples of cyber threats</h4>
                    </div>
                </div>
                <div class="card__side card__side--back card__side--back-2">
                    <div class="card__answer">
                        <p>Phishing, Catfishing,Identity Theft etc.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-1-of-3">
            <div class="card">
                <div class="card__side card__side--front-3">
                    <div class="card__title card__title--3">
                        <h4 class="card__question">Is it a good idea to share your passwords with your BESTIES?!</h4>
                    </div>
                </div>
                <div class="card__side card__side--back card__side--back-3">
                    <div class="card__answer">
                        <p>Nope!</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-1-of-3">
            <div class="card">
                <div class="card__side card__side--front-3">
                    <div class="card__title card__title--3">
                        <h4 class="card__oversized_question">What should you do if someone messages you online
                            claiming to be from your school or that they know you or your family?</h4>
                    </div>
                </div>
                <div class="card__side card__side--back card__side--back-3">
                    <div class="card__answer">
                        <p>Don't accept their invite and ask an adult!</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-1-of-3">
            <div class="card">
                <div class="card__side card__side--front-3">
                    <div class="card__title card__title--3">
                        <h4 class="card__oversized_question">What happens to something you post on the internet and then later delete?</h4>
                    </div>
                </div>
                <div class="card__side card__side--back card__side--back-3">
                    <div class="card__answer">
                        <p>It stays somewhere on the web forever! (so be careful what you are putting online!!!)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-1-of-3">
            <div class="card">
                <div class="card__side card__side--front-1">
                    <div class="card__title card__title--1">
                        <h4 class="card__question">What if someone is bullying you online - Cyber Bullying?</h4>
                    </div>
                </div>
                <div class="card__side card__side--back card__side--back-1">
                    <div class="card__answer">
                        <p>Stop,<br /> Block<br/> and tell an adult</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-1-of-3">
            <div class="card">
                <div class="card__side card__side--front-2">
                    <div class="card__title card__title--2">
                        <h4 class="card__question">Can you trust everything you see online?</h4>
                    </div>
                </div>
                <div class="card__side card__side--back card__side--back-2">
                    <div class="card__answer">
                        <p>Definitely Not!!!</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-1-of-3">
            <div class="card">
                <div class="card__side card__side--front-2">
                    <div class="card__title card__title--2">
                        <h4 class="card__oversized_question">What precautions can and should you take when using a public
                            computer, such as in the library </h4>
                    </div>
                </div>
                <div class="card__side card__side--back card__side--back-2">
                    <div class="card__oversized_answer">
                        <ul>
                            <li>Don't put in any private info</li>
                            <li>Don't go to private pages</li>
                            <li>Don't save any passwords/pictures/documents onto the computer</li>
                            <li>Be sure to log out of everything when you are done!!!</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-1-of-3">
            <div class="card">
                <div class="card__side card__side--front-3">
                    <div class="card__title card__title--3">
                        <h4 class="card__question">What is phishing and why is it a cyber threat?</h4>
                    </div>
                </div>
                <div class="card__side card__side--back card__side--back-3">
                    <div class="card__answer">
                        <p>When a person pretends to be a reliable company to get people to share
                            their personal information</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-1-of-3">
            <div class="card">
                <div class="card__side card__side--front-3">
                    <div class="card__title card__title--3">
                        <h4 class="card__question">What is a virus or malware?</h4>
                    </div>
                </div>
                <div class="card__side card__side--back card__side--back-3">
                    <div class="card__oversized_answer">
                        <p>Kind of like a virus in the body, it enters the computer acting like a safe, normal file.
                            But, once it gets in, it can steal private information or harm your computer etc..</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-1-of-3">
            <div class="card">
                <div class="card__side card__side--front-3">
                    <div class="card__title card__title--3">
                        <h4 class="card__oversized_question">What are parental controls and filters.
                            Why are they helpful in protecting yourself online?</h4>
                    </div>
                </div>
                <div class="card__side card__side--back card__side--back-3">
                    <div class="card__oversized_answer">
                        <p>They are ways for your parents or a safe company to block unsafe websites from your computer to
                            prevent viruses or other bad things that can be found online! This is a great idea!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="u-center-text u-margin-top-huge">
        <a href="flashcards.html" class="btn btn--green">Back to top</a>
    </div>
</section>
<?php } ?>
</body>
</html>

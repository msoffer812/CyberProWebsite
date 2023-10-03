<?php
header('Content-Type: text/html; charset=UTF-8');
?><html>
<head>
    <title>Home</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="responsiveslides.min.js"></script>
    <link href="css/slideshow.css" rel="stylesheet" >
    <link href="css/main.css" rel="stylesheet">

    <?php $name = "home";
     include 'header.php';
     include 'checkcookie.php';
?>
    <div class="split""></div>
    <p class="container text-center"><span class="h1">CyberPro!</span><span class="small">
        is a fun, kid-friendly website, designed to teach kids
            how to utilize the internet safely. With flashcards, quizzes, and many games to come,
            kids will come to understand the dangers of the internet - explained in kid-friendly
            fashion, and will learn what the do's and don'ts of web surfing. CyberPro is a highly
            recommended website by parents and schools all around the world. Check us out! It's free!</span>
        </p>

    <div class="split""></div>

<?php include 'footer.php'?>

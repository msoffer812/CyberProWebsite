<html>
<head>
    <title>Games</title>
    <?php
    $name = "test";
    $specName="games";
    include 'header.php';
    include 'checkcookie.php';
    if(! isset($_SESSION['user']))
    {
        include 'notLoggedin.php';
    } else {?>
    <div class="container">
    <div class="h2">Under Construction, Come Back Soon!</div></div>
<?php } include 'footer.php'?>
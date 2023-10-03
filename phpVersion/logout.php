<?php
session_start();
//destroy the cookie
if(isset($_COOKIE['user']))
{
    $cookieName = "user";
    $expirationTime = time() - 5000; // 1 hour ago
    setcookie($cookieName, "", $expirationTime, "/");
}

session_destroy();
header('location: index.php');
?>

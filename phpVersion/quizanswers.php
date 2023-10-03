<?php
session_start();
require_once 'pdo.php';
$answers = $_POST['answers'];
$correctAnswers = $_SESSION['correct'];
$_SESSION['results']=true;
for($i=0;$i<3;$i++)
{
    if($answers[$i] != $correctAnswers[$i])
    {
        $_SESSION['results']=false;
    }
}
if($_SESSION['results'])
{
    $sql = "SELECT score FROM users WHERE email= :eml";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':eml' => $_SESSION['email']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $score = $row['score'];
    $score++;
    $sql = "Update users SET score=:scr WHERE email=:eml";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':scr' => $score,
        ':eml' => $_SESSION['email']));
}
header('Location:quiz.php');

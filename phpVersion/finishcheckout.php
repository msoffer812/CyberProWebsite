<?php
$name = "order";
include 'header.php';
include 'checkcookie.php';

    $stmt = $pdo->prepare("SELECT user_id FROM users WHERE email=:eml");
    $stmt -> execute(array(
        ':eml' => $_SESSION['user']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $user = $row['user_id'];
    $add = ($_POST['street'] . ' ' . $_POST['city'] . ' ' . $_POST['state'] . ' ' . strval($_POST['zip']));
    $sql = "INSERT INTO orders (phone, address, order_items, order_total, orderer) VALUES(:pn, :ad, :it, :tot, :ord)";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute(array(
        ':pn' => $_POST['phone'],
        ':ad'=>$add,
        ':it'=> $_SESSION['order'],
        ':tot'=>$_SESSION['total'],
        ':ord' => $user,
    ));
    $_SESSION['successm'] = "Success, order received!";
    header('location:order.php');
 ?>

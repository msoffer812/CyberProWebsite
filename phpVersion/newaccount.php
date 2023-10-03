<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['cancel'] ) ) {
    //redirect to home
    header("Location: home.php");
    return;
}

// Check to see if we have some POST data, if we do process it
if ( isset($_POST["email"]) && isset($_POST["password"]) ) {
    if (strlen($_POST["email"]) < 1 || strlen($_POST["password"]) < 1 || strlen($_POST["name"])< 1) {
        $_SESSION["error2"] = "Email, password, and name are required";
        header("Location: login.php");
        return;
    } else {
        $emailStr = str_split($_POST["email"]);
        for ($x = 0; $x < strlen($_POST["email"]); $x++) {
            if ($emailStr[$x] == "@") {
                $check2 = "1";
            }
        }
        if ($check2 !== "1") {
            $_SESSION["error2"] = "Email must have an at-sign (@)";
            header("Location: login.php");
            return;
        } else if(strlen($_POST["password"])<6 || strlen($_POST["password"])>14)
        {
            $_SESSION["error2"] = "Password must be between 6 and 14 characters";
            header("Location: login.php");
            return;
        }
        else {
            $sql = "SELECT*FROM users WHERE email = :eml";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':eml' => htmlentities($_POST["email"])
            ));
            $row = $stmt->fetch(PDO:: FETCH_ASSOC);
            if($row)
            {
                $_SESSION["error2"] = "This email is already associated with another account";
                header("Location: login.php");
                return;
            }
            else
            {
                $_SESSION["email"] = htmlentities($_POST["email"]);
                $_SESSION["password"] = htmlentities($_POST["password"]);
                $_SESSION['name'] = htmlentities($_POST['name']);
                $_SESSION['category'] = htmlentities($_POST['usercategory']);
                if(isset($_POST["color"]))
                {
                    $_SESSION["profilec"] = htmlentities($_POST['color']);
                }
                else
                {
                    $_SESSION["profilec"] = 7;
                }
                $salt = "meiraistheawesomesteeever54352343";
                $pass = $_SESSION['password'] . $salt;
                $newPass = hash('md5', $pass);
                $sql = "INSERT INTO users (category, name, email, password, score, profilecolor) VALUES(:cat, :nm, :eml, :psw, 0, :pc)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(
                    ':cat' => $_SESSION['category'],
                    ':nm' => $_SESSION['name'],
                    ':eml' => $_SESSION["email"],
                    ':psw' => $newPass,
                    ':pc' => $_SESSION["profilec"]
                ));
                $_SESSION["success2"] = "Account Created";
                unset($_SESSION["email"]);
                header("Location: login.php");
                return;
            }

        }
    }
}
?>
<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: home.php");
    return;
}

// Check to see if we have some POST data, if we do process it
if ( isset($_POST["email"]) && isset($_POST["password"]) ) {
    if (strlen($_POST["email"]) < 1 || strlen($_POST["password"]) < 1) {
        $_SESSION["error"] = "Email and password are required";
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
            $_SESSION["error"] = "Email must have an at-sign (@)";
            header("Location: login.php");
            return;
        } else {
            $_SESSION["email"] = htmlentities($_POST["email"]);
            $_SESSION["password"] = htmlentities($_POST["password"]);
            $salt = "meiraistheawesomesteeever54352343";
            $pass = $_SESSION["password"] . $salt;
            $newPass = hash('md5', $pass);

            $sql = "SELECT*FROM users WHERE email = :eml";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':eml' => $_SESSION["email"]
            ));
            $row = $stmt->fetch(PDO:: FETCH_ASSOC);
            if ($row === false) {
                $_SESSION["error"] = "Incorrect email";
                header("Location: login.php");
                return;
            }
            elseif ($row['password'] !== $newPass) {
                $_SESSION["error"] = "Incorrect Password";
                header("Location: login.php");
                return;
            }
            else {
                $_SESSION["user"] = htmlentities($_POST["email"]);
                $_SESSION["success"] = "Logged in.";
                $sql = "SELECT users.category, usercategory.category_id, usercategory.category FROM users INNER JOIN usercategory ON users.category = usercategory.category_id WHERE email=:eml ";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(':eml' => $_SESSION['user']));
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['cat'] = $row['category'];

                error_log("Login success" . $_SESSION["email"]);
                if(isset($_POST['rememberMe']))
                {
                    $cookieName = "user";
                    $cookieValue = $_SESSION['user'];
                    $expirationTime = time() + (30 * 24 * 60 * 60);

                    setcookie($cookieName, $cookieValue, $expirationTime, "/");

                }
                header("Location: quiz.php");
                return;
            }
        }
    }
}
?>
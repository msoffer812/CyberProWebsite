<?php
require_once "pdo.php";
session_start();
$_SESSION['LoggedIn']=false;
if( isset($_POST['username']) && isset($_POST['password']) )
{
    if (strlen($_POST['username'])<1 || strlen($_POST['password'])<1)
    {
        $_SESSION['error'] = "Username and password are required";
        header("Location: login.php");
        return;
    }
    else
    {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password']= $_POST['password'];
        $sql = "SELECT*FROM authorizedusers WHERE username=:us AND password=:pw";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':us' => $_SESSION['username'], ':pw' => $_POST['password']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    if($row)
    {
        $_SESSION['LoggedIn']=true;
    }
}
?>
<html>
<head>
    <title>Check</title>
</head>
<body>
<?php
echo "<p><a href='content.php'>Click here to advance to content page</a></p>";
?>
</body>
</html>

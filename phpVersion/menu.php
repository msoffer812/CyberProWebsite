<?php
if(isset($_SESSION['user']))
{
    $sql = "SELECT name, profilecolor, colors.color FROM users INNER JOIN colors ON profilecolor = color_id WHERE email=:eml ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':eml' => $_SESSION['user']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $color = $row['color'];
    $namearray = str_split($row["name"]);
    $fletter = strtoupper($namearray[0]);
}

echo '<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand pr-3 btn-roll" href="#home"><img src="images/cyberprologo.png" alt="logo" width="200"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link';
         if($name == "home"){echo ' active';}
         echo '" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link';
          if($name == "login"){echo ' active';}
         echo '" href="login.php">Login or Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link';
        if($name == "rankings"){echo ' active';}
        echo '" href="rankings.php">Rankings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link';
        if($name == "learning"){echo ' active';}
        echo '" href="learning.php">Learning</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link';
            if($name == "order"){echo ' active';}
            echo '" href="order.php">Order Learning Materials';
            if(isset($_SESSION['user']))
                {
                    $user = $_SESSION['cat'];
                    if($user !== "teacher")
                    {
               echo '<i class="fas fa-lock locked-icon"></i>';
                }

                }

           echo '</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle';
        if($name=="test"){echo' active';}
        echo '" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Test Your Knowledge
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="quiz.php">Quizzes</a></li>
            <li><a class="dropdown-item" href="games.php">Games</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link';
            if($name == "contact"){echo ' active';}
                echo '" href="contact.php">Contact Us</a>
        </li>
      </ul>';
       if((isset($_SESSION['user'])))
                {
    echo '<div class="ml-auto">
       <a class="nav-link" href="logout.php" style="margin-right: -5vw">Logout</a>
       </div>
    <div class="ml-auto">
   <span class="profile-show" style="background:';
    echo $color;
    echo ';font-size: 4vw;">';
    echo $fletter;

    echo '</span></a></div>';
                }
  echo  '</div>
  </div>
</nav>'
?>

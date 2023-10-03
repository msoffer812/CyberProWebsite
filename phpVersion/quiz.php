<html>
<head>
    <title>Quizzes</title>
    <?php
    $name = "test";
    require_once "pdo.php";
    $specName="quiz";
    include 'header.php';

    include 'checkcookie.php';
    if(! isset($_SESSION['user']))
    {
        include 'notloggedin.php';
    } else {
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        $message = "Generate a Quiz";
        if(ISSET($_SESSION['results']))
        {
            if($_SESSION['results'] == true)
            {
                echo '<div class="h1" style="margin-top: 10vh;">Congratulations! You scored perfectly on the quiz. Your ranking has now risen.</div>';
                $message = "Generate a New Quiz to Get Even Higher!";
            }
            else{
                echo '<div class="h1" style="margin-top: 10vh;">Sorry! Nice Try.</div>';
                $message = "Generate a New Quiz and Try Again";
            }

        }
        echo '<div class="container"><div id="button-div" style="margin-top: 5vh;margin-bottom:25vh;">';
            echo '<form method="post">';
            echo ' <button type="submit" class="btn btn-primary btn-lg btn-block">'.$message.'</button>';
            echo '</form></div></div>';

    } else
    {
        $a = rand(1, 8);
        do
        {
            $b = rand(1, 8);
        }while($b == $a);
        do
        {
            $c = rand(1, 8);
        }while(($c == $a) || ($c == $b));

        echo '<body>';
        echo '<div class="container mt-3" style="margin: 10%; border:thick solid grey;"><form action="quizanswers.php" method="post">';
        echo '<div class="h2">Fill in the correct answers:</div>';
        $z=0;
        $stmt = $pdo->query("SELECT*FROM quizq");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        if(($row['question_id'] == $a) || ($row['question_id'] == $b) || ($row['question_id'] == $c))
        {
            echo '<div class="form-group">';
            echo '<label for="question" class="h6">'.$row['question'].'</label>';
            echo '<div class="form-check">';
            echo '<input type="radio" class="form-check-input" name="answers['.$z.']" id="1" value="1">';
            echo ' <label class="form-check-label" for="1">'.$row['a1'].'</label>';
            echo '</div>';
            echo '<div class="form-check">';
            echo '<input type="radio" class="form-check-input" name="answers['.$z.']" id="2" value="2">';
            echo ' <label class="form-check-label" for="2">'.$row['a2'].'</label>';
            echo '</div>';
            if ($row['a3']!= NULL) {
                echo '<div class="form-check">';
                echo '<input type="radio" class="form-check-input" name="answers['.$z.']" id="3" value="3">';
                echo ' <label class="form-check-label" for="3">'.$row['a3'].'</label>';
                echo '</div>';
            }
            if ($row['a4'] != NULL) {
                echo '<div class="form-check">';
                echo '<input type="radio" class="form-check-input" name="answers['.$z.']" id="4" value="4">';
                echo ' <label class="form-check-label" for="4">'.$row['a4'].'</label>';
                echo '</div>';
            }
            if ($row['a5']!= NULL) {
                echo '<div class="form-check">';
                echo '<input type="radio" class="form-check-input" name="answers['.$z.']" id="5" value="5">';
                echo ' <label class="form-check-label" for="5">'.$row['a5'].'</label>';
                echo '</div>';
            }
            echo '</div>';

            $correctanswers[$z]=$row['correctanswer'];
            $z++;
        }
    }

    $_SESSION['correct'] = $correctanswers;
    echo ' <button type="submit" class="btn btn-primary">Submit</button>';
    echo '</form></div>';

        ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
</html>


<?php } } include 'footer.php'?>

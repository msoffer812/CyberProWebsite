<html>
<head>
    <title>Rankings</title>
    <?php
    $name = "rankings";
    include 'header.php';
    include 'checkcookie.php';
    if(! isset($_SESSION['user']))
    {
        include 'notloggedin.php';
    } else {
        $sql = "SELECT * FROM users INNER JOIN colors ON profilecolor = color_id ORDER BY score DESC";
        $stmt = $pdo->query($sql);
        echo '<div class="container"><table class="table table-sm table-dark">
  <thead>
    <tr>
      <th scope="col">Ranking</th>
      <th scope="col">Score</th>
      <th scope="col">User</th>
    </tr>
  </thead>
  <tbody>';
        $i=1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $color=$row['color'];
           echo '<tr>';
           echo'<td>'.$i.'</td>';
           echo'<td>'.$row['score'].'</td>';
           echo'<td><span class="profile-show" style="display: inline-block;width: 2vw;height: 2vw;border-radius: 2vw;margin-right: 10px;cursor: pointer;background:';
            echo $color;
            echo ';">';
            echo '</span>'.$row['name'].'</tr>';
               $i++;
        }
        echo ' </tbody></table></div>';
        ?>
<?php } include 'footer.php';?>

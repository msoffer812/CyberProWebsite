<html>
<head>
    <title>Test Your Knowledge</title>
    <?php
    $name = "order";
    include 'header.php';
    include 'checkcookie.php';
    if(! isset($_SESSION['user']))
    {
        include 'notloggedin.php';
    } else if($_SESSION['cat'] !== "teacher")
    {
        include 'notateacher.php';
    }
        else {?>

            <div class="container">
                <h2>Order Form</h2>
                <?php if(isset($_SESSION['noorder']))
                    {
                        echo '<span style="color:red">'.$_SESSION['noorder'].'</span>';
                        unset($_SESSION['noorder']);
                    } else if (isset($_SESSION['successm']))
                {
                    echo '<span style="color:green">'.$_SESSION['successm'].'</span>';
                    unset($_SESSION['successm']);
                }?>
                <form method="post" action="checkout.php"><?php
                $stmt = $pdo->query("SELECT items_sale.category, item_category.category_id, item_category.cat_name FROM items_sale INNER JOIN item_category ON items_sale.category = item_category.category_id WHERE category=1");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                    $bleep = ucfirst($row['cat_name']);
                }
                echo '<p class="container-sm font-italic font-weight-bold">'.$bleep.'</p>'; ?>
                <table class="table table-striped"><tbody>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM items_sale WHERE category=1");
                    $d=0;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                        if($d==0)
                    {
                        echo '<tr>';
                    }
                    echo '
                        <td> <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="s1" name="order[]" value="'.$row['item_id'].'">
                                <input type="hidden" name="item" value="'.$row['item_id'].'">
                                <label class="form-check-label font-weight-bold">'.$row['name'].'</label>
                                <p class="font-weight-light">$ '.$row['price'].'</p>
                                <div class="container-sm font-italic">'.$row['description'].'</div></div></td>';
                       if($d == 1)
                       {
                       echo '</tr>';
                       $d = 0;
                       } else
                       {
                       $d++;
                       }
                       }
                       echo  '</tbody></table>';
                    $stmt = $pdo->query("SELECT items_sale.category, item_category.category_id, item_category.cat_name FROM items_sale INNER JOIN item_category ON items_sale.category = item_category.category_id WHERE category=2");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                    $bleep = ucfirst($row['cat_name']);
                    }
                    echo '<p class="container-sm font-italic font-weight-bold">'.$bleep.'</p>'; ?>
                    <table class="table table-striped"><tbody>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM items_sale WHERE category=2");
                    $d=0;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                        if($d==0)
                    {
                        echo '<tr>';
                    }
                    echo '
                        <td> <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="s1" name="order[]" value="'.$row['item_id'].'">
                                <label class="form-check-label font-weight-bold">'.$row['name'].'</label>
                                <p class="font-weight-light">$ '.$row['price'].'</p>
                                <div class="container-sm font-italic">'.$row['description'].'</div></div></td>';
                       if($d == 1)
                       {
                       echo '</tr>';
                       $d = 0;
                       } else
                       {
                       $d++;
                       }
                       }
                       echo  '</tbody></table>';
                    $stmt = $pdo->query("SELECT items_sale.category, item_category.category_id, item_category.cat_name FROM items_sale INNER JOIN item_category ON items_sale.category = item_category.category_id WHERE category=3");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                        $bleep = ucfirst($row['cat_name']);
                    }
                    echo '<p class="container-sm font-italic font-weight-bold">'.$bleep.'</p>'; ?>
                    <table class="table table-striped"><tbody>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM items_sale WHERE category=3");
                    $d=0;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                        if($d==0)
                    {
                        echo '<tr>';
                    }
                    echo '
                        <td> <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="s1" name="order[]" value="'.$row['item_id'].'">
                                <label class="form-check-label font-weight-bold">'.$row['name'].'</label>
                                <p class="font-weight-light">$ '.$row['price'].'</p>
                                <div class="container-sm font-italic">'.$row['description'].'</div></div></td>';
                       if($d == 1)
                       {
                       echo '</tr>';
                       $d = 0;
                       } else
                       {
                       $d++;
                       }
                       }
                       echo  '</tbody></table><button type="submit" class="btn btn-primary">Checkout</button></div></form>';

 } include 'footer.php' ?>


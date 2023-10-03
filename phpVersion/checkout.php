<?php
$name = "order";
include 'header.php';
include 'checkcookie.php';
if(empty($_POST['order']))
{
    $_SESSION['noorder'] = "You must order something";
    header('location:order.php');
} else
{
    $f = $_POST['order'];
    $items=array();
    $cost = 0;
    for($i=0; $i<count($f); $i++)
    {
        $sql = "SELECT name, price FROM items_sale WHERE item_id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':id'=>$f[$i]));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        array_push($items, $row['name']);
        $pr = (float)$row['price'];
        $cost += $pr;
    }

    $fd = implode(', ', $items);
    $_SESSION['order'] = $fd;
    $_SESSION['total']=$cost;

}

echo '<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="bootstrap-5.3.0-dist" />
   
    <link href="css/profilestyle.css" rel="stylesheet"/> 
    <link href="css/main.css" rel="stylesheet" />
    </head>
    <body><div class="h2">Enter the Delivery Information</div>';
    if(isset($_SESSION['err']))
    {
        echo '<span style="red">'.$_SESSION['err'].'</span>';
        unset($_SESSION['err']);
    }
    echo '<div class="container-sm"><form action="finishcheckout.php" method="post" style="border: thin solid black;">
<div class="container-sm" style="padding-bottom: 2vw;padding-top:1vw;">
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="street" id="inputAddress" placeholder="1234 Main St" required>
    </div>
    <div class="form-group col-md-6">
    <label for="phone">Phone Number</label>
      <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx" required>
      </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="city" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" name="state" class="form-control" required>';
        $states = ["AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "FL", "GA", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MA", "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC", "ND", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VT", "VA", "WA", "WV", "WI", "WY"];
        for($i=0;$i<count($states); $i++)
        {
            echo'<option value="'.$states[$i].'">'.$states[$i].'</option>';
        }
        echo'</select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" name="zip" class="form-control" id="inputZip" pattern="[0-9]{5}" required>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Finish Checkout</button>
</div></form></div>';

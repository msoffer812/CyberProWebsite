<html>
<head>
    <title>Login</title>
    <link href="css/stylecircles.css" rel="stylesheet">
    <?php
    require_once "pdo.php";
    $name = "login";
    ?>

<?php
    include 'header.php';?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mb-5" style="border-right: thin solid black;border-left: thin solid black;margin-left: -2vw; padding-right: 1vw;">
                <?php
                // flash message
                if ( isset($_SESSION["error"]) ) {
                    echo('<p style="color:red">'.htmlentities($_SESSION["error"])."</p>\n");
                    unset($_SESSION["error"]);
                }
                if ( isset($_SESSION["success"]) ) {
                    echo('<p style="color:green">'.htmlentities($_SESSION["success"])."</p>\n");
                    unset($_SESSION["success"]);
                }
                ?>
                <h3>Log In</h3>
                <form action="loginresponse.php" method="post">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter your email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="rememberMe" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Remember me for 30 days
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-6 mb-5" style="border-right:thin solid black;margin-left: 2vw; margin-right: -1vw;">
                <?php
                // flash message
                if ( isset($_SESSION["error2"]) ) {
                    echo('<p style="color:red">'.htmlentities($_SESSION["error2"])."</p>\n");
                    unset($_SESSION["error2"]);
                }
                if ( isset($_SESSION["success2"]) ) {
                    echo('<p style="color:green">'.htmlentities($_SESSION["success2"])."</p>\n");
                    unset($_SESSION["success2"]);
                }
                ?>
                <h3>Sign Up</h3>
                <form action="newaccount.php" method="post">

                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Username" name="name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="6-14 characters">
                    </div>


                        <div class="form-group">
                            <label for="category">Select an option:</label>
                            <select class="form-control" name="usercategory" id="category">
                                <option value="1">Student</option>
                                <option value="2">Teacher</option>
                            </select>
                        </div>
                    <div class="form-group">
                        <label for="color">Choose a Profile Style</label>

                        <input type="radio" class="new-radio" id="rd" name="color" value="1">
                        <label for="rd" class="new-radio" id="red"></label>

                        <input type="radio" id="bl" name="color" value="2">
                        <label for="bl" id="blue" class="new-radio"></label>

                        <input type="radio" id="grn" name="color" value="3">
                        <label for="grn" id="green" class="new-radio"></label>

                        <input type="radio" id="prpl" name="color" value="4">
                        <label for="prpl" id="purple" class="new-radio"></label>

                        <input type="radio" id="pnk" name="color" value="5">
                        <label for="pnk" id="pink" class="new-radio"></label>

                        <input type="radio" id="gry" name="color" value="6">
                        <label for="gry" id="grey" class="new-radio"></label>

                        <input type="radio" id="wht" name="color" value="7">
                        <label for="wht" id= "white" class="new-radio"></label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php  include 'footer.php';?>


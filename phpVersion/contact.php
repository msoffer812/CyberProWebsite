<html>
<head>
    <title>Contact Us</title>
    <?php
    $name = "contact";
    include 'header.php';
    include 'checkcookie.php';
    if(! isset($_SESSION['user']))
    {
        include 'notLoggedin.php';
    } else {
        if(isset($_GET['email']) && isset($_GET['message'])) {
            if (strlen($_GET['email'])>1 && strlen($_GET['message'])>1) {
                $person_email = $_GET['email'];
                $person_message = $_GET['message'];
                $message = 'User email: ' . $person_email . '\n User Message: ' . $person_message;
                require 'PHPMailer-master/PHPMailerAutoload.php';
                $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->SMTPSecure = 'ssl';
                $mail->SMTPAuth = true;
                $mail->SMTPDebug = 0; //this is very verbose, just for testing, change to 0
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 465;
                $mail->Username = 'meiraswebprogramming@gmail.com';
                $mail->Password = 'PASSWORD_HERE';
                $mail->setFrom('meiraswebprogramming@gmail.com');
                $mail->addAddress('meiraswebprogramming@gmail.com');
                $mail->Subject = 'Website Message';
                $mail->Body = $message;
//send the message, check for errors
                if (!$mail->send()) {
                    echo "ERROR: " . $mail->ErrorInfo;
                } else {
                    echo "SUCCESS";
                    header('location:contact.php');
                }

            }
        }

        ?>
            "<div class="container">
        <h3>Enter the following to contact us:</h3>
        <form method="get" action="" style="text-align:left;margin-left:25vw;">
            <div class="form-group">
                <label for="emailInput">Email address:</label>
                <input type="email" class="form-control col-6" name="email" id="emailInput" placeholder="Johndoe@gmail.com">
            </div>
            <div class="form-group">
                <label for="textAreaInput">Message:</label>
                <textarea class="form-control col-6"  name="message" id="textAreaInput"  rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
                </div>
            </div>"
        <?php
        // if (!($_POST['email'] == $_SESSION['email'] && $_POST['message'] == $_SESSION['message']))
        //{

        //}

        ?>
    <?php } include 'footer.php'?>



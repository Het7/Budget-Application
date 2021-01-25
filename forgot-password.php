<?php
	include("connection.php");
	include("functions.php");
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  if ($_POST)
  {
    $email = $_POST['email'];

    $selectquery = mysqli_query($con, "select * from users where email ='{$email}'") or die(mysqli_error($con));
    $count = mysqli_num_rows($selectquery);
    $row = mysqli_fetch_array($selectquery);

    if ($count>0)
    {
      // Load Composer's autoloader
      require 'vendor/autoload.php';

      // Instantiation and passing `true` enables exceptions
      $mail = new PHPMailer(true);

      try {
          //Server settings
          $mail->SMTPDebug = 0;                                    // Enable verbose debug output
          $mail->isSMTP();                                        // Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                  // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                             // Enable SMTP authentication
          $mail->Username   = 'noreplybudgeter@gmail.com';     // SMTP username
          $mail->Password   = 'viratkohli1234';                             // SMTP password, not included for privacy
          $mail->SMTPSecure = 'tls';          				 // Enable TLS encryption
          $mail->Port       = 587;                          // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

          //Recipients
          $mail->setFrom('noreplybudgeter@gmail.com', 'Mailer');
          $mail->addAddress($email, $email);     // Add a recipient


          // Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'Forgot Password';
          $mail->Body    = "Hey! Your password is {$row['password']}. This is an automated email, so please do not respond to this.";
          $mail->AltBody = "Hi $email your Password is {$row['password']}";

          $mail->send();
          echo "<p class=email-sent> Your password has been sent to your email! </p>";
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    }
    else
    {
      echo "<script>alert('Email not found')</script>";
    }
  }



?>

<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="css/newStyle.css"/>
   </head>

   <body>
      <header class="header">
         <h2 class="logo">Welcome to BudgetER</h2>
         <input type="checkbox" id="nav-toggle" class="nav-toggle">
         <nav>
            <ul>
              <li><a href="login.php">Home</a></li>
            </ul>
         </nav>
         <label for="nav-toggle" class="nav-toggle-label">
         <span></span>
         </label>
      </header>


      <section class="left-section">

         <div id="left-form" class="form fade-in-element">
            <h2 class="fp">Forgot Password</h2>
            <form method="post">
               <input type="email" name="email" class="input-box" placeholder="Enter Your Email">
               <input type="submit" name="login-btn" class="btn" value="Submit">

            </form>
         </div>
      </section>



   </body>
</html>

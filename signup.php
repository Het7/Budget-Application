<?php
	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password, email) values ('$user_id','$user_name','$password', '$email')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		} else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
   <head>
      <title>Signup</title>
      <link rel="stylesheet" type="text/css" href="css/signup-page.css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <header class="header">
         <h2 class="logo">Welcome <?php echo $name ?> to BudgetER</h2>
         <input type="checkbox" id="nav-toggle" class="nav-toggle">
         <nav>
            <ul>
               <li><a href="login.php">Login</a></li>
            </ul>
         </nav>
         <label for="nav-toggle" class="nav-toggle-label">
         <span></span>
         </label>
      </header>

			<div class="signup-page">
				<div class="img-info">
      <img class="bank" src="bank.jpg" alt="money">
      <p> <span style="color: #a75d00;">Congratulations</span>, you are one step closer to meeting all <br>
				 your financial goals! Fill out the form to register or <br>
         click <a href="login.php" style="color: #a75d00;"> here</a> if you already have an account.
      </p>
		</div>
      <section class="left-section">
         <div id="left-form" class="form fade-in-element">
					 <h1 style="text-align: center;"> Signup</h1>
            <form method="post">
               <input type="text" name="user_name" class="input-box" placeholder="Username" required>
               <input type="email" name="email" class="input-box" placeholder="Email" required>
               <input type="password" name="password" class="input-box" placeholder="Enter Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}"
  		title="Must contain at least one number, one uppercase and lowercase letter, and at least 7 or more characters">
               <input id="button" type="submit" name="login-btn" class="btn" value="Signup">
            </form>
         </div>
      </section>
		</div>
   </body>
</html>

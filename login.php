<?php

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);

					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}

			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
   <head>
      <title></title>

      <link rel="stylesheet" type="text/css" href="css/login.css"/>
   </head>
   <body>
      <header class="header">
         <h2 class="logo">Welcome <?php echo $name ?> to BudgetER</h2>
         <input type="checkbox" id="nav-toggle" class="nav-toggle">
         <nav>
            <ul>
               <li><a href="signup.php">Get Started</a></li>
            </ul>
         </nav>
         <label for="nav-toggle" class="nav-toggle-label">
         <span></span>
         </label>
      </header>

			<div class="page">
      <p class="login-info"> Make all the right money moves. Get a complete view of your
         <br>income, bills and transactions in one place. BudgetER helps
         <br>you know how much you have — and exactly how you’re spending it.
				 <br> Signup for a free account today!
      </p>
      <section class="left-section" id="flex-container">
         <div id="left-form" class="form fade-in-element">
            <h2 style="text-align: center;"> Login</h2>
            <form method="post">
               <input type="text" name="user_name" class="input-box" placeholder="Username" required>
               <input type="password" name="password" class="input-box" placeholder="Enter Password" required>
               <input type="submit" name="login-btn" class="btn" value="Login">
            </form>
						<h3 class="forgot-pass"><a href="forgot-password.php">Forgot Password?</a></h3>
         </div>
      </section>
		</div>
   </body>
</html>

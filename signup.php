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

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<style type="text/css">

	* {
	    box-sizing: border-box;
	    font-family: Tahoma !important;
	}

	body {
	    font-family: 'Segoe UI';
	    font-size: 25px;
	    background-color: #eae6e6;
	}

	.title {
		top: 50px;
		margin-right: 95px;
		margin-top: 10px;
		position: fixed;
	}

	.bank {
		width: 300px;
		margin-left: 150px;
		top: 80px;
		position: fixed;
	}

	p {
	  text-align: center;
	  font-size: 20px;
		top: 450px;
		left: 40px;
	  line-height: 1.5;
		position: fixed;
	}

	#left-form{
	  top: 160px;
	}

	.left-section {
		position: fixed !important;
	}

	.last-line {
	  font-size: 25px;
	  color: #a75d00;
	}


	.form input {
	    min-width: 400px;
	    display: block;
	    margin: 20px;
	    padding: 15px 20px;
	    background-color: #ece7e7;
	    font-size: 20px;
	    border: none;
	    outline: none;
	    font-size: 22px;
	    box-shadow: 15px 15px 25px #a8a8a8;
	    transition: box-shadow 0.5s;
	}

	.form input:focus {
	    box-shadow: 5px 5px 15px #a8a8a8;
	}

	.form .btn {
	    margin: auto;
	    padding: 10px 35px;
	    background-color: #f1a566;
	    color: #fff;
	    border: none;
	    font-size: 22px;
	    border-radius: 10px;
	    box-shadow: 15px 15px 25px #a8a8a8;
	    transition: box-shadow 0.5s;
	    outline: none;
	}

	.form .btn:hover {
	    box-shadow: 5px 5px 15px #aaa;
	}

	.form {
	    display: flex;
	    flex-direction: column;
	    justify-content: space-around;
	    align-items: center;
	    height: 50vh;
	    width: 50vw;
	    position: fixed;
	    bottom: 0px;
	    font-size: 35px;
	    margin-left: 700px;
	}

	.fade-in-element {
	    animation-name: fade-in-element;
	    animation-duration: 1s;
	    animation-fill-mode: forwards;
	}


	@media (min-width:801px)  {
		.bank{
			top: 150px;
			}

			p {
				text-align: center;
				font-size: 20px;
				top: 550px;
				left: 40px;
				line-height: 1.5;
				position: fixed;
			}

			.form input {
					min-width: 200px;
					display: block;
					margin: 20px;
					padding: 15px 20px;
					background-color: #ece7e7;
					font-size: 20px;
					border: none;
					outline: none;
					font-size: 22px;
					box-shadow: 15px 15px 25px #a8a8a8;
					transition: box-shadow 0.5s;
			}

			.form {
					display: flex;
					flex-direction: column;
					justify-content: space-around;
					align-items: center;
					height: 50vh;
					width: 50vw;
					position: fixed;
					bottom: 0px;
					font-size: 35px;
					margin-left: 400px;
			}

			.title {
				top: 140px;
				right: 130px;
				position: fixed;
			} }



	@media (min-width:1025px) {

		.bank{
			top: 150px;
			}

			p {
				text-align: center;
				font-size: 20px;
				top: 550px;
				left: 40px;
				line-height: 1.5;
				position: fixed;
			}

			.form input {
					min-width: 200px;
					display: block;
					margin: 20px;
					padding: 15px 20px;
					background-color: #ece7e7;
					font-size: 20px;
					border: none;
					outline: none;
					font-size: 22px;
					box-shadow: 15px 15px 25px #a8a8a8;
					transition: box-shadow 0.5s;
			}

			.form {
					display: flex;
					flex-direction: column;
					justify-content: space-around;
					align-items: center;
					height: 50vh;
					width: 50vw;
					position: fixed;
					bottom: 0px;
					font-size: 35px;
					margin-left: 400px;
			}

			.title {
				top: 140px;
				right: 300px;
				position: fixed;
			}
		}

	@media (min-width:1281px) {
		.bank{
			top: 150px;
			}

			p {
				text-align: center;
				font-size: 20px;
				top: 550px;
				left: 40px;
				line-height: 1.5;
				position: fixed;
			}

			.form input {
					min-width: 400px;
					display: block;
					margin: 20px;
					padding: 15px 20px;
					background-color: #ece7e7;
					font-size: 20px;
					border: none;
					outline: none;
					font-size: 22px;
					box-shadow: 15px 15px 25px #a8a8a8;
					transition: box-shadow 0.5s;
			}

			.form {
					display: flex;
					flex-direction: column;
					justify-content: space-around;
					align-items: center;
					height: 50vh;
					width: 50vw;
					position: fixed;
					bottom: 0px;
					font-size: 35px;
					margin-left: 580px;
			}

			.title {
				top: 140px;
				right: 300px;
				position: fixed;
			} }

			@media (max-width:1639px) {
				.bank{
					top: 150px;
					}

					p {
						text-align: center;
						font-size: 20px;
						top: 550px;
						left: 40px;
						line-height: 1.5;
						position: fixed;
					}

					.form input {
							min-width: 400px;
							display: block;
							margin: 20px;
							padding: 15px 20px;
							background-color: #ece7e7;
							font-size: 20px;
							border: none;
							outline: none;
							font-size: 22px;
							box-shadow: 15px 15px 25px #a8a8a8;
							transition: box-shadow 0.5s;
					}

					.form {
							display: flex;
							flex-direction: column;
							justify-content: space-around;
							align-items: center;
							height: 50vh;
							width: 50vw;
							position: fixed;
							bottom: 0px;
							font-size: 35px;
							margin-left: 580px;
					}

					.title {
						top: 140px;
						right: 450px;
						position: fixed;
					} }


					@media (max-width:2000px) {
						.bank{
							top: 150px;
							}

							p {
								text-align: center;
								font-size: 20px;
								top: 550px;
								left: 40px;
								line-height: 1.5;
								position: fixed;
							}

							.form input {
									min-width: 400px;
									display: block;
									margin: 20px;
									padding: 15px 20px;
									background-color: #ece7e7;
									font-size: 20px;
									border: none;
									outline: none;
									font-size: 22px;
									box-shadow: 15px 15px 25px #a8a8a8;
									transition: box-shadow 0.5s;
							}

							.form {
									display: flex;
									flex-direction: column;
									justify-content: space-around;
									align-items: center;
									height: 50vh;
									width: 50vw;
									position: fixed;
									bottom: 0px;
									font-size: 35px;
									margin-left: 580px;
							}

							.title {
								top: 140px;
								right: 650px;
								position: fixed;
							} }

	}


	</style>

	<img class="bank" src="bank.jpg" alt="money">

	<p> <span style="color: #a75d00;">Congratulations</span>, you are one step closer to meeting all your financial goals!
			<br> Click <a href="login.php" style="color: #a75d00;">here</a> if you already have an account.
	</p>

	<section class="left-section">


	   <div id="left-form" class="form fade-in-element">
			 	<h2 class="title">Signup</h2>
	      <form method="post">
	         <input type="text" name="user_name" class="input-box" placeholder="Username">
	         <input type="text" name="email" class="input-box" placeholder="Email">
	         <input type="password" name="password" class="input-box" placeholder="Enter Password">
	         <input id="button" type="submit" name="login-btn" class="btn" value="Signup">
	      </form>

	   </div>
	</section>


</body>
</html>

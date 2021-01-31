<?php
session_start();

	include("connection.php");
	include("functions.php");


	$user_data = check_login($con);
  $name = $user_data['user_name'];
?>


<!DOCTYPE html>
<html>
   <head>
		 <script src="https://kit.fontawesome.com/593e22ddf2.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="css/newStyle.css"/>
			<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
			<script type="text/javascript" src="js/custom.js"></script>
			<link rel="stylesheet" href="css/cb.css">

   </head>

   <script type="text/javascript">
      $(document).ready( function() {
        $('#deletesuccess').delay(1300).fadeOut();
      });
   </script>


	 <script type="text/javascript">
			$(document).ready( function() {
				$('#editsuccess').delay(1300).fadeOut();
			});
	 </script>



   <body>


		 <!-- ChatBot -->
<div class="chat_icon">
	<i class="fas fa-question"></i>
</div>

<div class="chat_box">
	<div class="wrapper">
		<div class="title">BudgetBot Help!</div>
		<div class="cb-form">
				<div class="bot-inbox inbox">
						<div class="icon">
								<i class="fas fa-user"></i>
						</div>
						<div class="msg-header">
								<p>Hello there, how can I help you?</p>
						</div>
				</div>
				<div class="bot-inbox inbox">
						<div class="icon">
								<i class="fas fa-user"></i>
						</div>
						<div class="msg-header">
								<p>Do you want to know your income, expense, and/or total income?</p>
						</div>
				</div>
		</div>
		<div class="typing-field">
				<div class="input-data">
						<input id="data" type="text" placeholder="Type something here.." required>
						<button id="send-btn">Send</button>
				</div>
		</div>
</div>

</div>
<!-- ChatBot end -->



      <header class="header">
         <h2 class="logo">Welcome <?php echo $name ?> to the Dashboard</h2>
         <input type="checkbox" id="nav-toggle" class="nav-toggle">
         <nav>
            <ul>
							 <li><a href="chart.php">Data</a></li>
               <li><a href="logout.php">Logout</a></li>
            </ul>
         </nav>
         <label for="nav-toggle" class="nav-toggle-label">
         <span></span>
         </label>
      </header>
      <?php if (isset($_SESSION['msg'])): ?>
      <div id=deletesuccess>
         <?php
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            ?>
      </div>
      <?php endif ?>

// INCOME AND EXPENSE DIFFERENT DROPDOWN MENU CREATE
      <div id="left-form" class="form fade-in-element">
         <form action="info.php" method="post">
            <div class="radio-group">
               <label class="radio">
               <input type="radio" value="Income" name="cashflow" required>Income
               <span></span>
               </label>
               <label class="radio">
               <input type="radio" value="Expense" name="cashflow">Expense
               <span></span>
               </label>
            </div>
            <input id="amount" type="number" step="0.01" name="amount" class="input-box" placeholder="Amount" required>
            <input type="text" name="description" class="input-box" placeholder="Description" required>
            <div class="select">
               <select name="category" id="format">
                  <option value="">Select Expense Category</option>
                  <option value="Housing"> Housing</option>
                  <option value="Transportation"> Transportation</option>
                  <option value="Food"> Food</option>
                  <option value="Utilities"> Utilities</option>
                  <option value="Medical/Healthcare"> Medical/Healthcare</option>
                  <option value="Insurance"> Insurance</option>
                  <option value="Personal"> Personal</option>
                  <option value="Education"> Education</option>
                  <option value="Gifts/Donations"> Gifts/Donations</option>
                  <option value="Entertainment"> Entertainment</option>
               </select>
            </div>
            <input type="submit" name="submit" id="info-submit" class="btn" value="Submit" onclick="addedSuccess()">
         </form>
      </div>
      <table class="content-table">
         <thead>
            <tr>
               <th>Cashflow</th>
               <th>Amount</th>
               <th>Description</th>
               <th>Category</th>
							 <th>Action</th>

            </tr>
         </thead>
         <tbody>
            <?php include_once('data.php'); ?>
         </tbody>
      </table>


   </body>
</html>

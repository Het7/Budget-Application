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
      <link rel="stylesheet" type="text/css" href="css/newStyle.css"/>
   </head>
   <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
   <script type="text/javascript">
      $(document).ready( function() {
        $('#deletesuccess').delay(1300).fadeOut();
      });
   </script>
   <body>
      <div class="info">
         <p> Your income is <?php echo $_SESSION['Income']; ?></p>
         <p> Your expense is <span > <?php echo $_SESSION['Expense']; ?> </span> </p>
         <p> Your net balance is <span> <?php echo $_SESSION['total']; ?> </span> </p>
      </div>
      <header class="header">
         <h2 class="logo">Welcome <?php echo $name ?> to the Dashboard</h2>
         <input type="checkbox" id="nav-toggle" class="nav-toggle">
         <nav>
            <ul>
							
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
            <input type="number" step="0.01" name="amount" class="input-box" placeholder="Amount" required>
						<input type="text" name="description" class="input-box" placeholder="Description" required>

<div class="select">
						<select name="category" id="format">
							<option value=""> Select Category</option>
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

            <input type="submit" name="submit" class="btn" value="Submit" onclick="addedSuccess()">
         </form>
      </div>
      <table class="content-table">
         <thead>
            <tr>
               <th>Cashflow</th>
               <th>Amount</th>
               <th>Description</th>
							 <th>Category</th>
							 <th>Date</th>
            </tr>
         </thead>
         <tbody>
            <?php include_once('data.php'); ?>
         </tbody>
      </table>
   </body>
</html>

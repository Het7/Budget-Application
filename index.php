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
      <link rel="stylesheet" type="text/css" href="css/hi.css"/>
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
           <input type="hidden" name="id" value="<?php echo $num; ?>">
            <input type="text" name="cashflow" class="input-box" placeholder="Income/Expense" required>
            <input type="number" step="0.01" name="amount" class="input-box" placeholder="43" required>
            <input type="text" name="description" class="input-box" placeholder="Shoes" required>
            <input type="submit" name="submit" class="btn" value="Submit" onclick="addedSuccess()">
         </form>
      </div>

      <table class="content-table">
         <thead>
            <tr>
               <th>Cashflow</th>
               <th>Amount</th>
               <th>Description</th>
            </tr>
         </thead>
         <tbody>
            <?php include_once('data.php'); ?>
         </tbody>
      </table>


   </body>
</html>

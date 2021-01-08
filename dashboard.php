
   <?php
   session_start();

   	include("connection.php");
   	include("functions.php");
    include_once('header.php');

   	$user_data = check_login($con);

   ?>
<!DOCTYPE html>
<html lang="en">


<div id="left-form" class="form fade-in-element">
   <h1 class="login-text">Login</h1>
   <form action="dashboard.php" method="post">
      <input type="text" name="cashflow" class="input-box" placeholder="Income/Expense">
      <input type="number" step="0.01" name="amount" class="input-box" placeholder="43">
      <input type="text" name="description" class="input-box" placeholder="Shoes">
      <input type="submit" name="submit" class="btn" value="Submit">
   </form>
</div>



      <?php if(!isset($_SESSION['username'])): header("location: logout.php");?>
      <?php else: ?>
      <?php endif ?>


   </body>
</html>

   <head>
      <link rel="stylesheet" href="css/style-dashboard.css">
      <link rel="stylesheet" href="css/input.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Dashboard</title>
   </head>
   <body>

<?php

 $user_data = check_login($con);
 $name = $user_data['user_name'];

 ?>

      <header>
         <h2 class="logo" style="float: left">Welcome <?php echo $name ?>, to the <a href="index.php"> dashboard</a></h2>
         <input type="checkbox" id="nav-toggle" class="nav-toggle">
         <nav>
            <ul>
               <li><a href="income.php">Income</a></li>
               <li><a href="#">Expenses</a></li>
               <li><a href="#">All</a></li>
               <li><a href="logout.php">Logout</a></li>
            </ul>
         </nav>
         <label for="nav-toggle" class="nav-toggle-label">
         <span></span>
         </label>
      </header>

<?php
include_once('index.php');

$user_data = check_login($con);
$name = $user_data['user_name'];




$query = "SELECT * FROM users WHERE user_name='$name'";
$result = mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
$id=$row["id"];


$stmt = "SELECT * FROM info WHERE user_id='$id';";
$output = mysqli_query($con, $stmt);
$resultCheck = mysqli_num_rows($output);

if ($resultCheck > 0)  {
  while ($data = mysqli_fetch_assoc($output)) {
  echo "<tr><td>". $data["cashflow"] ."</td><td>". $data["amount"] ."</td><td>". $data["description"] ;
  }
}

else{
  echo "<p style= 'margin: auto;'> No data has been inputed yet! </p>";
}



$sumIncome = "SELECT SUM(amount) AS `totalI` FROM info WHERE cashflow='income' AND cashflow='Income' AND user_id='$id'";
$outIncome = mysqli_query($con, $sumIncome);
$outputIncome = mysqli_fetch_array($outIncome);
$totalIncome = $outputIncome['totalI'];
$_SESSION['Income'] = $totalIncome;
if (empty($totalIncome)) {
    $_SESSION['Income'] = "$0.00";
}

else {
  $_SESSION['Income'] = $totalIncome;
}


$sumExpense = "SELECT SUM(amount) AS `totalE` FROM info WHERE cashflow='expense' AND cashflow='expense' AND user_id='$id'";
$outExpense = mysqli_query($con, $sumExpense);
$outputExpense = mysqli_fetch_array($outExpense);
$totalExpense = $outputExpense['totalE'];
if (empty($totalExpense)) {

    $_SESSION['Expense'] = "$0.00";
}

else {
  $_SESSION['Expense'] = $totalExpense;
}


$total = $totalIncome - $totalExpense;
if (empty($totalExpense) && empty($totalIncome)) {

    $_SESSION['total'] = "$0.00";
}

else {
  $_SESSION['total'] = $total;
}



?>

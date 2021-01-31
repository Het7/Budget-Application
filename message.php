<!-- Created By CodingNepal -->
<?php
session_start();
// connecting to database
//include_once("data.php");
include_once('connection.php');
include("functions.php");


$user_data = check_login($con);
$name = $user_data['user_name'];
$query = "SELECT * FROM users WHERE user_name='$name'";
$result = mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
$id=$row["id"];


$sumIncome = "SELECT SUM(amount) AS `totalI` FROM info WHERE cashflow='income' AND cashflow='Income' AND user_id='$id'";
$outIncome = mysqli_query($con, $sumIncome);
$outputIncome = mysqli_fetch_array($outIncome);
$totalIncome = $outputIncome['totalI'];
$_SESSION['Income'] = $totalIncome;
if (empty($totalIncome)) {
    $_SESSION['Income'] = "0.00";
}

else {
  $_SESSION['Income'] = $totalIncome;
}


$sumExpense = "SELECT SUM(amount) AS `totalE` FROM info WHERE cashflow='expense' AND cashflow='expense' AND user_id='$id'";
$outExpense = mysqli_query($con, $sumExpense);
$outputExpense = mysqli_fetch_array($outExpense);
$totalExpense = $outputExpense['totalE'];
if (empty($totalExpense)) {

    $_SESSION['Expense'] = "0.00";
}

else {
  $_SESSION['Expense'] = $totalExpense;
}


$total = $totalIncome - $totalExpense;
if (empty($totalExpense) && empty($totalIncome)) {

    $_SESSION['total'] = "0.00";
}

else {
  $_SESSION['total'] = $total;
}


// getting user message through ajax
$getMesg = mysqli_real_escape_string($con, $_POST['text']);

/*if (str_contains($getMesg, 'expense')) {
  echo "true";
}
*/

//checking user query to database query
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($con, $check_data) or die("Error");

// if the user query is matched to inputs in the database, the query will show the reply otherwise the else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $replay = $fetch_data['replies'];
    echo $replay;
} elseif (str_contains(strtolower($getMesg), 'income')) {
    echo $name. ", your total income is $". $_SESSION['Income'];
} elseif (str_contains(strtolower($getMesg), 'expense')) {
  echo $name. ", your total expense is $". $_SESSION['Expense'];
} elseif (str_contains(strtolower($getMesg), 'total')) {
  echo $name. ", your net-income is $". $_SESSION['total'];
} elseif (str_contains(strtolower($getMesg, 'net income')) {
    echo $name. ", your net-income is $". $_SESSION['total'];
}

else{
    echo "Sorry I didn't understand that! I can help you figure out your income, expense, and net income.";
}



?>

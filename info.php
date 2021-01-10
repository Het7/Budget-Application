<?php
session_start();
ini_set('display_errors', '1'); ini_set('display_startup_errors', '1'); error_reporting(E_ALL);
error_reporting(E_ALL);
ini_set('display_errors', '1');

include("connection.php");
include("functions.php");


$user_data = check_login($con);
$name = $user_data['user_name'];



$query = "SELECT * FROM users WHERE user_name='$name'";
$result = mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
$id=$row["id"];


$cashflow = $_POST['cashflow'];
$amount = $_POST['amount'];
$description = $_POST['description'];
$category = $_POST['category'];

$sql = "INSERT INTO info (cashflow, amount, description, category, user_id) VALUES ('$cashflow', '$amount', '$description', '$category', '$id');";

mysqli_query($con, $sql);

if (isset($_POST['submit'])) {
  $_SESSION['msg'] = "Data Entry Added!";
}



header("Location: index.php")

?>

<?php

include_once('connection.php');


$did = $_GET["did"];


$delete_query = "delete from info where id='$did'";
$q = mysqli_query($con, $delete_query);

if ($q) {
  header("location: index.php");
}




 ?>

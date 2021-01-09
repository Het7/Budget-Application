<?php

$dbhost = "remotemysql.com";
$dbuser = "K0yLK3eaPf";
$dbpass = "YsB31vzu5x";
$dbname = "K0yLK3eaPf";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}

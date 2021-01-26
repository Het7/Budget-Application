<?php

$mysqli = new MySQLi("localhost", "het", "het123", "login_sample_db");
if($mysqli->connect_errno){
  echo "Failed to connect to MySQL: " . $mysqli->connect_errno;
}

isset($_POST["department"]) ? $department = $_POST["department"] : $department = "";

$personnel = "";
$month = "";
$bar_graph = "";

$getData = "SELECT * FROM info WHERE category = '$department'";
$rows = $mysqli->query($getData);
$rowcount = $rows->num_rows;
if($rowcount > 0){
  while($r = $rows->fetch_assoc()){
    $personnel .= '"' . $r["amount"] . '",';
    $month .= '"' . $r["month"] . '",';
  }
}

$personnel = substr($personnel, 0, -1);
$month = substr($month, 0, -1);
$bar_graph = '
<canvas id="graph" data-settings=
\'{
"type": "bar",
"data":
{
  "labels": [' . $month . '],
  "datasets":
  [{
    "label": "' . $department . '",
    "backgroundColor": "#000000",
    "borderColor": "#000000",
    "data": [' . $personnel . ']
  }]
},
"options":
{
  "legend":
  {
    "display": true
  }
}
}\'
></canvas>';

echo $bar_graph;

?>

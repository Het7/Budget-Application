<?php

session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
  $name = $user_data['user_name'];

$query = "SELECT * FROM users WHERE user_name='$name'";
$result = mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
$id=$row["id"];



?>

<html>
  <head>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/pie.css"/>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],

          <?php

          $result1=$con->query("select amount from info where category='Housing'");
          while($row1=$result1->fetch_assoc()){
            echo "['Housing'," .$row1['amount']."],";
          }

          $result2=$con->query("select amount from info where category='Transportation' and user_id='$id'");
          while($row2=$result2->fetch_assoc()){
            echo "['Transportation'," .$row2['amount']."],";
          }

          $result3=$con->query("select amount from info where category='Food'");
          while($row3=$result3->fetch_assoc()){
            echo "['Food'," .$row3['amount']."],";
          }

          $result4=$con->query("select amount from info where category='Utilities' and user_id='$id'");
          while($row4=$result4->fetch_assoc()){
            echo "['Utilities'," .$row4['amount']."],";
          }

          $result5=$con->query("select amount from info where category='Medical/Healthcare'");
          while($row5=$result5->fetch_assoc()){
            echo "['Medical/Healthcare'," .$row5['amount']."],";
          }

          $result6=$con->query("select amount from info where category='Personal'");
          while($row6=$result6->fetch_assoc()){
            echo "['Personal'," .$row6['amount']."],";
          }

          $result7=$con->query("select amount from info where category='Education'");
          while($row7=$result7->fetch_assoc()){
            echo "['Education'," .$row7['amount']."],";
          }

          $result8=$con->query("select amount from info where category='Gifts/Donations'");
          while($row8=$result8->fetch_assoc()){
            echo "['Gifts/Donations'," .$row8['amount']."],";
          }

          $result9=$con->query("select amount from info where category='Entertainment'");
          while($row9=$result9->fetch_assoc()){
            echo "['Entertainment'," .$row9['amount']."],";
          }
           ?>
        ]);

        var options = {


						title: 'My Daily Activities',


						backgroundColor: '#eae6e6'
					


        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
		<header class="header">
			 <h2 class="logo">Welcome <?php echo $name ?> to the Dashboard</h2>
			 <input type="checkbox" id="nav-toggle" class="nav-toggle">
			 <nav>
					<ul>
						 <li><a href="logout.php">Logout</a></li>
						 <li><a href="pie.php">Data</a></li>
					</ul>
			 </nav>
			 <label for="nav-toggle" class="nav-toggle-label">
			 <span></span>
			 </label>
		</header>

    <div id="piechart"></div>
  </body>
</html>

<?php

include_once("connection.php");
include_once("functions.php");

?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>MySQL and Chart.js</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.5.0/materia/bootstrap.min.css">
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col text-center" style="margin-top: 25px; margin-bottom: 25px;">
        <select class="custom-select" id="selDepartment">
          <option value="Food" selected="">Food</option>
          <option value="HR Department">HR Department</option>
          <option value="Accounting Department">Accounting Department</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col" id="divGraph">
        <!-- BAR GRAPH GOES HERE -->
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
  <script>

    $(document).ready(function(){
      $.ajax({
        url: "queries.php",
        type: "post",
        data: {
          department: "Food"
        },
        success: function(bar_graph){
          $("#divGraph").html(bar_graph);
          $("#graph").chart = new Chart($("#graph"), $("#graph").data("settings"));
        }
      });

      $("#selDepartment").change(function(){
        $.ajax({
          url: "queries.php",
          type: "post",
          data: {
            department: $(this).val()
          },
          success: function(bar_graph){
            $("#divGraph").html(bar_graph);
            $("#graph").chart = new Chart($("#graph"), $("#graph").data("settings"));
          }
        });
      });
    });

  </script>

</body>
</html>

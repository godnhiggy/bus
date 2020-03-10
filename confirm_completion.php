<?php
session_start();
$completed = $_POST["completed"];
$_SESSION["completed"] = $completed;


?>

<!DOCTYPE html>
<html>
<head>
  <style>
  body {
    background-color: lightblue;
  }

  h1 {
    color: white;
    text-align: center;
  }

  div {
    font-family: verdana;
    font-size: 40px;
  }
  </style>

</head>
<body>




  <div align="center">
    <br> <br> <br>
    Are you sure you are finished?
    <br><br>

    <a href="arrival_action.php">YES</a>
    <br> <br> <br>

    <br> <br> <br>

    <a href="bus_home.php">no</a>


  </div>
</body>

</html>

<?php
session_start();
if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Bus</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Add Bus</h2>
  </div>

  <form method="post" action="add_bus_action.php">
  	
  	<div class="input-group">
  		<label>New Bus Number</label>
  		<input type="number" name="newBusNo" >
  	</div>


  	<div class="input-group">
  		<button type="submit" class="btn" name="addBusNo">Add Bus Number</button>
  	</div>
  	<p>
  	<!--	Not yet a member? <a href="register_insurance.php">Sign up</a>-->
  	</p>
  </form>

</body>
</html>

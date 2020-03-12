<?php
session_start();
date_default_timezone_set("America/Detroit");

//if (!isset($_SESSION['username'])) {
//  	$_SESSION['msg'] = "You must log in first";
//  	header('location: login.php');
//  }
//  if (isset($_GET['logout'])) {
//  	session_destroy();
//  	unset($_SESSION['username']);
//  	header("location: login.php");
//  }
$userName = $_SESSION["userName"];
$delete = $_SESSION["delete"];
$_SESSION["completed"]=NULL;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Bus Edit</title>
  <!--<link rel="stylesheet" type="text/css" href="style.css">-->
  <style>

  table {
    /*border-collapse: collapse;
    margin: auto;*/
  }
  td {
    border: 1px solid black;
  }

  #width {
      width: 300px;
  }

  label {
  color: #000000;
  font-weight: bold;
  display: block;
  width: 200px;
  float: left;
  }
  /*label:after { content: ": " }*/

  .button {
    background-color: #2196F3;
    border: none;
    border-radius: 10px;
    color: black;
    padding: 15px 32px;
    text-align: center;
    cursor: pointer;
    font-size: 30px;
  }

  .item1 { grid-area: header;
          text-align: center;
  }
  /*.item2 { grid-area: left;
          text-align: right;
  }
  .item3 { grid-area: main;
          text-align: center;
  }*/
  .item2 { grid-area: main;
          text-align: center;
  }
  .item5 { grid-area: footer;
          text-align: center;
  }
  .item6 { grid-area: bottom;
          text-align: center;

  }

  .grid-container {
    display: grid;
    grid-template-areas:
      'header header header header header header'
      'main main main main main main'
      'footer footer footer footer footer footer'
      'bottom bottom bottom bottom bottom bottom';
    grid-gap: 0px;
    background-color: #2196F3;
    padding: 10px;
  }

  .grid-container > div {
    background-color: rgba(255, 255, 255, 0.8);
    text-align: center;
    padding: 20px 0;
    font-size: 40px;
  }
      select {
          text-align: center;
          width: 200px;
          margin: 10px;
          font-size: 30px;
      }
  </style>

</head>
<body>
  <div class="grid-container">
  <div class="item1">
  	<h2>Bus Edit</h2>
  </div>
<div class="item2">
    <?php
  $servername = "localhost";
  $dbusername = "bjekqemy_higgy";
  $password = "Brett73085";
  $dbname = "bjekqemy_bus";


  // Create connection
  $conn = new mysqli($servername, $dbusername, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }

  ?>
  <form action="edit_action.php" method="POST">
  <?php
  $todayDate = date("m:d:y");
        $sql = "SELECT * FROM arrival WHERE busDateStamp='$todayDate' AND finalized=''";
      $result = $conn->query($sql);
      if ($result->num_rows > 0)
                {

          // output data of each row
          while($row = $result->fetch_assoc()) {

              $busNumber = $row["busNumber"];

              $busTimeStamp = $row["busTimeStamp"];
              $busDateTime = $row["busDateStamp"];

        echo "<table><th><td id='width'>Bus #".$busNumber." </td><td>Click Time to Delete --></td><td>

            <input class='button' type='submit' value='".$busTimeStamp."' name='delete'>



        </td></th></table><br>";




          }

}
      ?>

    </form>
</div>
</div>




  </form>
</body>
</html>

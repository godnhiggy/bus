<?php
session_start();
date_default_timezone_set("America/Detroit");
$busDutyDone=$_SESSION["busDutyDone"];

if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
$userName = $_SESSION["userName"];
$delete = $_SESSION["delete"];
$_SESSION["completed"]=NULL;
?>

<!DOCTYPE html>

<html>
<head>

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
.item2 { grid-area: left;
        text-align: right;
}
.item3 { grid-area: main;
        text-align: left;
}
.item4 { grid-area: right;
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
    'left left main main right right'
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
    <?php
    $startDate = date("D, M d, Y");
if(!empty($_SESSION["busDutyDone"])){
    echo "Your Bus Duty is OVER for the day!";
    echo "<br>";
    echo "Now go Have a nice day...Yer Awesome!";
    echo "<br>";
echo $startDate;
echo "<br>";
echo $busDutyDone;
} else {
echo "Hey Teach! Welcome to Bus Duty! ";
echo "<br>";
echo $startDate;
echo "<br>";
echo $busDutyDone;
}
     ?>
  </div>
  <div class="item2"></div>

  <div class="item3">

<form action="arrival_action.php" method="POST">
  <!--<label for="busNumber">New Bus Number</label><input type="text" name="busNumber"<br>-->
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

  //installing a list to choose team members
  ?>
  <!--<label for="busNumber">Bus Number<br></label>-->

  <select name="busNumber[]" required>
  <option value="" disabled>Select Bus</option>
  <?php
  $sql = "SELECT busNumber, arrived FROM bus ORDER BY busNumber";
  $result = $conn->query($sql);

  //$arrived = $result->fetch_assoc();
  //$busNumber = $_POST[""];
  //$sqlA = "UPDATE bus SET arrived='y' WHERE busNumber='$busNumber'";
  //$arrived = $conn->query($sqlA);



  if ($result->num_rows > 0)
            {

      // output data of each row
      while($row = $result->fetch_assoc()) {


        $busNumber = $row["busNumber"];
        $arrived2 = $row["arrived"];
        if(!$arrived2){



         // $totalwordcount = str_word_count($row["essay"]);

  ?>

    <option value=<?php echo $busNumber;?> ><?php echo $busNumber;?></option>

  <?php
}
      }

   }

  //else {

    //  echo "0 results";
  //}

  ?>

  </select>  <br>
      <input type="hidden" name="busTime" value=busTime>


      <br><br><br>
    <label for="submit"></label><input class="button" type="submit" value="Submit Time" name="submit">
   </form>


  <br><br><br><br><br>
  <a href='add_bus.php'>Click Here</a> <br>if Bus not on BUS LIST
  <br><br>
  <a href='pdf_create_date.php'>Click Here</a> <br>to Print Bus Log
  <br><br>
  <a href='edit.php'>Click Here</a> <br>to Delete a record
  </div>
  <div class="item4">
<?php
$todayDate = date("m:d:y");
//if (!$_SESSION["delete"])
//{
    $sql = "SELECT * FROM arrival WHERE busDateStamp='$todayDate' AND finalized=''";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
              {

        // output data of each row
        while($row = $result->fetch_assoc()) {
           // $totalwordcount = str_word_count($row["essay"]);


            $busNumber = $row["busNumber"];
            $busTimeStamp = $row["busTimeStamp"];
            //$d=strtotime($busTimeStamp);
            //$displayTime = date("g:i A", $d);


            $busDateTime = $row["busDateStamp"];
            //$d=strtotime($datTime);
            //$datTime = date("D", $d);
            //$busTimeStamp = date_create("$busTimeStamp");
            //$busTimeStamp = date_format("$busTimeStamp, Y/m/d H:i:s");


      echo "<table><th><td id='width'>Bus #".$busNumber." </td><td id='width'>".$busTimeStamp;
      echo "</td></th></table><br>";
        }
     }
  // }

  //   else{

   //    die("Bus Duty Complete");
   //  }


    ?>

  </div>





  <div class="item5">
    <!--<input type="hidden" name="busTime" value=busTime>
    <label for="submit"></label><input class="button" type="submit" value="Submit" name="submit">
   </form>-->
  </div>

  <div class="item6">
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

    //installing a list to choose team members
    ?>

  </div>

  <div class="item6">
    <form action="confirm_completion.php" method="POST">

      <input class="button" type="submit" value="completed" name="completed">

    </form>

  </div>
</div>

</body>
</html>

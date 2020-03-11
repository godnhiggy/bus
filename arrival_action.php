<?php
session_start();
date_default_timezone_set("america/new_york");
//$_SESSION["completed"] = $_POST["completed"];
$completed = $_SESSION["completed"];
$busNumber = $_POST["busNumber"];
$busTime = $_POST["busTime"];
$date = $_POST["dateCreated"];



//echo $busNumber;

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
//$currentTime = date("Y-m-d h:i:s");
//$d=strtotime($currentTime);
$datTime = date("g:i:sa");
$busDateStamp = date("m:d:y");
$busWeek = date("Y-W");
$busDay = date(D);






//$_SESSION = $busDateStamp;

/////////////IDENTIFY BUS ARRIVALS


if (isset($_POST['submit'])){


$sql = "INSERT INTO arrival (busNumber, busTimeStamp, busDateStamp, busWeekStamp, busDay, finalized)
VALUES ('$busNumber[0]', '$datTime', '$busDateStamp', '$busWeek', '$busDay', '')";

if ($conn->query($sql) === TRUE) {
   // echo "<div align='center'>";
    //echo "<br>";echo "<br>";echo "<br>";echo "<br>";
   //echo "New record created successfully";
   //echo "<br>";echo "<br>";
  // echo " <meta http-equiv = 'refresh' content = '2; url = /insurance/insurance_input.php'/> ";
//header('location: bus_home.php');
  // echo "</div>";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

}





//////////////////SET BUS ARRIVAL TO YES TEMPORARILY
if($busNumber){
$sql = "UPDATE bus SET arrived='y' WHERE busNumber='$busNumber[0]'";
if ($conn->query($sql) === TRUE) {
  //echo "Removed bus from start list";
  header('location: bus_home.php');
}else {echo "not connected to bus";}

}



//////////////////RESET BUS ARRIVAL

if($completed){
  $_SESSION["delete"] = "done";
$sql = "UPDATE bus SET arrived='' WHERE arrived='y'";
$sql1 = "UPDATE arrival SET finalized='yes' WHERE busDateStamp='$busDateStamp'";

if ($conn->query($sql) === TRUE)

   {
//  echo "<div align='center'>";
  //echo "<br><br>";
 // die("Bus Duty Over....Have a Great Day!");
   //echo "</div>";
  //header('location: bus_home.php');
//}else {echo "not connected to bus";}

//$sql1 = "UPDATE arrivals SET finalized='yes' WHERE busDateStamp='$busDateStamp'";
//if (
    $conn->query($sql1) === TRUE;
//    ) {


//}
//session_unset();
$_SESSION["busDutyDone"] = "yes";
header('location: bus_home.php');
}

}


//$conn->close();
?>

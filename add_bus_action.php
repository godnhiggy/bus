<?php
session_start();

$newBusNo = $_POST['newBusNo'];

$servername = "localhost";
$dbusername = "bjekqemy_higgy";
$password = "Brett73085";
$dbname = "bjekqemy_bus";
 //Create connection
$conn = new mysqli($servername, $dbusername, $password, $dbname);
 //Check connection
if($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT busNumber FROM bus WHERE busNumber = '$newBusNo'";
$result = $conn->query($sql);

if($result != "1") {



  $sql1 = "INSERT INTO bus (busNumber, arrived, avgTime)
  VALUES ('$newBusNo', '', '')";
 $result1 = $conn->query($sql1); 

  //if ($conn->query($sql) === TRUE) {
      header('location: bus_home.php');

}
//}
//else{header('location: bus_home.php');}
?>


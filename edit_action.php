<?php
session_start();
$delete = $_POST["delete"];
$busNumber = $_POST["busNumber"];
//echo $delete;
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

if ($delete) {
  $sql = "DELETE FROM arrival WHERE busTimeStamp='$delete'";

if ($conn->query($sql) === TRUE) {
    header('location: bus_home.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$sql = "UPDATE bus SET arrived='' WHERE busNumber='$busNumber'";

if ($conn->query($sql) === TRUE) {
echo "Record updated successfully";
} else {
echo "Error updating record: " . $conn->error;




}
}
$conn->close();
?>

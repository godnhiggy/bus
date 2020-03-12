<?php
session_start();
date_default_timezone_set("America/Detroit");
$delete = $_POST["delete"];
$busNumber = $_SESSION["busNumber"];

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

    $sql = "SELECT * FROM arrival WHERE busTimeStamp='$delete'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
          {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        $busNumber = $row["busNumber"];

    }

}

else {

  echo "0 results";
}


  $sql = "DELETE FROM arrival WHERE busTimeStamp='$delete'";

if ($conn->query($sql) === TRUE) {

} else {
    echo "Error deleting record: " . $conn->error;
}

$sql = "UPDATE bus SET arrived='' WHERE busNumber='$busNumber'";

if ($conn->query($sql) === TRUE) {
    //$_SESSION["busNumber"]==NULL;
header('location: bus_home.php');
} else {
echo "Error updating record: " . $conn->error;




}
}

$conn->close();
?>

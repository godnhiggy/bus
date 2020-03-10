<?php
session_start();
$userName = $_SESSION["userName"];
//$delete = $_SESSION["delete"];
//$_SESSION["delete"]=NULL;
?>

<!DOCTYPE html>

<html>
<head>

<style>

table {
  border-collapse: collapse;
  /*margin: auto;*/
}
table {
  border: 1px solid black;

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
  text-align: right;
  padding: 20px 0;
  font-size: 20px;
}
</style>

</head>

<body>
  <div class="grd-container">
    <div>
      <h1>Create a PDF for Arrival Times for a Single Day</h1>
    </div>
    <div>
      <form action="pdf_action.php" method="POST">
        <input type="date" name="busDate">
        <br>
        <input type="submit" name="submitDate" value="Submit">

      </form>
    </div>
  </div>
  <div class="grd-container">
    <div>
      <h1>Create a PDF for Arrival Times for a Single Bus</h1>
    </div>
    <div>
      <form action="pdf_action.php" method="POST">
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
        <label for="busNumber">Bus Number<br></label><select name="busNumber" multiple size="10" required>
        <br>
        <?php
        $sql = "SELECT * FROM bus ORDER BY busNumber";
        $result = $conn->query($sql);
        //$arrived = $result->fetch_assoc();
        //$busNumber = $_POST[""];
        //$sqlA = "UPDATE bus SET arrived='y' WHERE busNumber='$busNumber'";
        //$arrived = $conn->query($sqlA);



        if ($result->num_rows > 0)
  {

            // output data of each row
            while($row = $result->fetch_assoc())
      {
              $busNumber = $row["busNumber"];


        ?>

          <option value=<?php echo $busNumber;?>><?php echo $busNumber;?></option>

        <?php
      }
   }
          ?>

        </select>
        <input type="submit" name="submitBus" value="Submit">

      </form>
    </div>
    <div>
        <h1>Create a PDF for Arrival Times for a Single Week...choose any day during the requested week</h1>
    </div>
    <div>
           <form action="pdf_week_action.php" method="POST">
        <input type="date" name="busWeek">
        <br>
        <input type="submit" name="submitWeek" value="Submit">

      </form>   
        
        
    </div>
  </div>

</body>
</html>

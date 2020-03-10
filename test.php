<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Bus</title>
  
</head>
<body>
  <div class="header">
      <?php
  $date = new DateTime('2011-11-10 20:17:23', new DateTimeZone('UTC'));
$date->setTimezone(new DateTimeZone('America/New_York'));


echo $date->format('Y-m-d H:i:s O I'); // 2011-11-10 15:17:23 -0500

echo "<br>";
if (date('I', time()))
{
	echo "We're in DST!";
}
else
{
	echo "'We're not in DST!";
}
echo"<br>";

date_default_timezone_set("america/new_york");
echo date_default_timezone_get();
$date = date("h:i:sA");
echo "<br>";
echo $date;




?>
  	</div>


</body>
</html>
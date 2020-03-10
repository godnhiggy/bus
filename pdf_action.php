<?php
require("fpdf182/fpdf.php");
if(!empty($_POST["submitDate"])){
$today = date("Y.m.d");
$pdf=new FPDF();
$pdf->AddPage();
//$pdf->SetMargins(float left, float top [, float right]);
$pdf->SetFont("Arial","BI",10);
$pdf->Cell(175,9,"Bus Log for Adairsville High School",1,1,C);
$pdf->Cell(100,20,"This document created on {$today}",0,1);


  $pdfDate = $_POST["busDate"];
  $d=strtotime($pdfDate);
  $pdfDate = date("m:d:y", $d);
  $pdfPrintDate = date("D m:d:y");
    $db = mysqli_connect('localhost', 'bjekqemy_higgy', 'Brett73085', 'bjekqemy_bus');

    $user_check_query = "SELECT * FROM arrival WHERE busDateStamp='$pdfDate'";
    $result = mysqli_query($db, $user_check_query);
    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc())
          {
            $busNumber = $row["busNumber"];
            $busTime = $row["busTimeStamp"];
            //$d=strtotime($busTime);
            //$busTime = date("g:i:s A", $d);
            $pdf->Cell(50,9,"On {$pdfDate}",1,0,C);
            $pdf->Cell(100,9,"Bus {$busNumber}     arrived at     {$busTime}",1,1,C);
          }
    }
$pdf->output();
}

if(!empty($_POST["submitBus"])){
$today = date("Y.m.d");
$pdf=new FPDF();
$pdf->AddPage();
//$pdf->SetMargins(float left, float top [, float right]);
$pdf->SetFont("Arial","BI",10);
$pdf->Cell(175,9,"Bus Log for Adairsville High School",1,1,C);
$pdf->Cell(100,20,"This document created on {$today}",0,1);

  $busNumber = $_POST["busNumber"];
  //$busNumber = "1";
  //echo $busNumber;
  $d=strtotime($pdfDate);
  $pdfDate = date("m:d:y", $d);
  $pdfPrintDate = date("D m:d:y");
    $db = mysqli_connect('localhost', 'bjekqemy_higgy', 'Brett73085', 'bjekqemy_bus');

    $user_check_query = "SELECT * FROM arrival WHERE busNumber='$busNumber'";
    $result = mysqli_query($db, $user_check_query);
    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc())
          {
            $busNumber = $row["busNumber"];

            $busTime = $row["busTimeStamp"];
            $d=strtotime($busTime);
            $busTime = date("g:i:s A", $d);

            $busDate = $row["busTimeStamp"];
            $d=strtotime($busDate);
            $busDate = date("D m:d:y", $d);

            $pdf->Cell(50,9,"On {$pdfPrintDate}",1,0,C);
            $pdf->Cell(100,9,"Bus {$busNumber}  at  {$busTime}   on   {$busDate}",1,1,C);
          }
    }
$pdf->output();

}

if(!empty($_POST["submitWeek"])){
$today = date("Y.m.d");
$pdf=new FPDF();
$pdf->AddPage();
//$pdf->SetMargins(float left, float top [, float right]);
$pdf->SetFont("Arial","BI",10);
$pdf->Cell(175,9,"Bus Log for Adairsville High School",1,1,C);
$pdf->Cell(100,20,"This document created on {$today}",0,1);


  $pdfWeek = $_POST["busWeek"];
  $w=strtotime($pdfWeek);
  $pdfWeek = date("Y-W", $w);
  echo $pdfWeek;
  $pdfPrintDate = date("D m:d:y");
    $db = mysqli_connect('localhost', 'bjekqemy_higgy', 'Brett73085', 'bjekqemy_bus');
    
    $bus_query = "SELECT * FROM bus";
    $week_query = "SELECT * FROM arrival WHERE busWeekStamp='$pdfWeek' AND busNumber='$busNumberQ'";
    $result = mysqli_query($db, $bus_query);
    echo "<br>";
    echo $result;
    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc())
          {
               $busNumberQ = $row["busNumber"];
              echo $busNumberQ;
              echo "<br>";
    }
    }
$pdf->output();
}

 ?>

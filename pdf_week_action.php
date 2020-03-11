<?php
require("fpdf.php");


//echo "this is werking";

$postWeek = $_POST["submitWeek"];
//echo $postWeek;

if(!empty($postWeek))
{
$today = date("Y.m.d");
$pdf=new FPDF();
$pdf->AddPage();
//$pdf->SetMargins(float left, float top [, float right]);
$pdf->SetFont("Arial","BI",10);
$pdf->Cell(175,9,"Bus Log for Adairsville High School",1,1,C);
$pdf->Cell(100,20,"This document created on {$today}",0,1);
$pdf->Cell(25,9,"Bus Number",1,0,C);
$pdf->Cell(25,9,"Monday",1,0,C);
$pdf->Cell(25,9,"Tuesday",1,0,C);
$pdf->Cell(25,9,"Wednesday",1,0,C);
$pdf->Cell(25,9,"Thursday",1,0,C);
$pdf->Cell(25,9,"Friday",1,1,C);

  $pdfWeek = $_POST["busWeek"];
  $dw=strtotime($pdfWeek);
  $pdfWeek = date("Y-W", $dw);
  $d=strtotime($pdfDate);
  $pdfDate = date("m:d:y", $d);
  $pdfPrintDate = date("D m:d:y");
    $db = mysqli_connect('localhost', 'bjekqemy_higgy', 'Brett73085', 'bjekqemy_bus');

/////////////Start a Day's search for INfo
    $user_check_query = "SELECT * FROM bus ORDER BY busNumber";
    $result = mysqli_query($db, $user_check_query);

    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc())
          {
            $busNumber = $row["busNumber"];
$pdf->Cell(25,9,"{$busNumber}",1,0,C);


$user_check_query = "SELECT * FROM arrival WHERE busWeekStamp='$pdfWeek' AND busDay = 'Mon' AND busNumber='$busNumber'";
$resultMon = mysqli_query($db, $user_check_query);

if ($resultMon->num_rows > 0)
{
    // output data of each row
    while($rowMon = $resultMon->fetch_assoc())
      {

        $busDay = $rowMon["busDay"];
        $busTime = $rowMon["busTimeStamp"];
        $pdf->Cell(25,9,"{$busTime}",1,0,C);
    }

}else
      {
        $pdf->Cell(25,9,"DNA",1,0,C);
  }
    //}  remove temp
//}     remove temp
//////////////End A Day's Search for Info
/////////////Start a Day's search for INfo

$user_check_query = "SELECT * FROM arrival WHERE busWeekStamp='$pdfWeek' AND busDay = 'Tue' AND busNumber='$busNumber'";
$resultTue = mysqli_query($db, $user_check_query);

if ($resultTue->num_rows > 0)
{
    // output data of each row
    while($rowTue = $resultTue->fetch_assoc())
      {

        $busDay = $rowTue["busDay"];
        $busTime = $rowTue["busTimeStamp"];
        $pdf->Cell(25,9,"{$busTime}",1,0,C);
    }

}else
      {
        $pdf->Cell(25,9,"DNA",1,0,C);
  }


//////////////End A Day's Search for Info
/////////////Start a Day's search for INfo

$user_check_query = "SELECT * FROM arrival WHERE busWeekStamp='$pdfWeek' AND busDay = 'Wed' AND busNumber='$busNumber'";
$resultWed = mysqli_query($db, $user_check_query);

if ($resultWed->num_rows > 0)
{
    // output data of each row
    while($rowWed = $resultWed->fetch_assoc())
      {

        $busDay = $rowWed["busDay"];
        $busTime = $rowWed["busTimeStamp"];
        $pdf->Cell(25,9,"{$busTime}",1,0,C);
    }

}else
      {
        $pdf->Cell(25,9,"DNA",1,0,C);
  }


//////////////End A Day's Search for Info
/////////////Start a Day's search for INfo

$user_check_query = "SELECT * FROM arrival WHERE busWeekStamp='$pdfWeek' AND busDay = 'Thu' AND busNumber='$busNumber'";
$resultThu = mysqli_query($db, $user_check_query);

if ($resultThu->num_rows > 0)
{
    // output data of each row
    while($rowThu = $resultThu->fetch_assoc())
      {

        $busDay = $rowThu["busDay"];
        $busTime = $rowThu["busTimeStamp"];
        $pdf->Cell(25,9,"{$busTime}",1,0,C);
    }

}else
      {
        $pdf->Cell(25,9,"DNA",1,0,C);
  }


//////////////End A Day's Search for Info
/////////////Start a Day's search for INfo

$user_check_query = "SELECT * FROM arrival WHERE busWeekStamp='$pdfWeek' AND busDay = 'Fri' AND busNumber='$busNumber'";
$resultFri = mysqli_query($db, $user_check_query);

if ($resultFri->num_rows > 0)
{
    // output data of each row
    while($rowFri = $resultFri->fetch_assoc())
      {

        $busDay = $rowFri["busDay"];
        $busTime = $rowFri["busTimeStamp"];
        $pdf->Cell(25,9,"{$busTime}",1,1,C);
    }

}else
      {
        $pdf->Cell(25,9,"DNA",1,1,C);
  }


//////////////End A Day's Search for Info


    }
}



$pdf->output();

}
 ?>

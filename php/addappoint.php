<?php
//连接数据库
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
 	}
  
mysql_select_db("399lovelypets", $con);


//从页面获取数据
$appointmentid=$_POST['appointmentid'];
$date=$_POST['date'];
$starthour = $_POST['starthour'];
$startminute=$_POST['startminute'];
$endhour = $_POST['endhour'];
$endminute = $_POST['endminute'];
$customerid = $_POST['customerid'];
$doctorid = $_POST['doctorid'];
$clinicid = $_POST['clinicid'];
$petid= $_POST['petid'];
//echo $petid;
$description=$_POST['description'];

$starttime=$date." ".$starthour.":".$startminute.":00";
$endtime=$date." ".$endhour.":".$endminute.":00";

$sql="Insert into appointment (AppointmentID, starttime,endtime,AppointmentDate,CustomerID,ClinicID,DoctorID,PetID,AppointmentDescription) 
VALUES ('$appointmentid', '$starttime','$endtime','$date','$customerid','$clinicid','$doctorid','$petid','$description')";
//$sql="Insert into appointment (AppointmentID) values ('$appointmentid')";测试单项输出
$query = mysql_query($sql,$con); 

echo $appointmentid;

//测试各项输出是不是正常
//echo $date; 
//echo $starthour;
//echo $startminute;
//echo $endhour;
//echo $endminute;
//echo $customerid;
//echo $doctorid;
//echo $clinicid;
//echo $description;



?>

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
 	}
  
mysql_select_db("399lovelypets", $con);
$doctorid=$_POST["doctorid"]; 

//echo $username; 
$doctorsql="select WorkingclinicID from staff where StaffId = '$doctorid'"; 
$doctorquery = mysql_query($doctorsql,$con); 
$rows=mysql_fetch_array($doctorquery);
echo $rows[0];
?>
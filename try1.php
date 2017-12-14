
<?php
error_reporting(0);
$q=$_GET["q"];

$con = mysql_connect('localhost', 'root');
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("399lovelypets", $con);

$sql="SELECT * FROM pet INNER JOIN petowner ON pet.PetOwnerID = petowner.PetOwnerID INNER JOIN clinic ON pet.ClinicID = clinic.ClinicID WHERE PetID = '".$q."'";

$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
 {  echo "<div class='city'>";
	echo "<strong style='color: darkgrey; margin-left:30px;'>Pet ID: </strong>" . $row['PetID'] . "<br><br>";
	echo "<strong style='color: darkgrey; margin-left:30px;'>Pet Name: </strong>" . $row['PetName'] . "<br><br>";
	echo "<strong style='color: darkgrey; margin-left:30px;'>Pet Species: </strong>" . $row['PetSpecies'] . "<br><br>";
	echo "<strong style='color: darkgrey; margin-left:30px;'>Pet Gender: </strong>" . $row['PetGender'] . "<br><br>";
	echo "<strong style='color: darkgrey; margin-left:30px;'>Pen ID: </strong>" . $row['PenID'] . "<br><br>";
	echo "<strong style='color: darkgrey; margin-left:30px;'>Pet Owner's Name: </strong>" . $row['PetOwnerName'] . "<br><br>";
	echo "<strong style='color: darkgrey; margin-left:30px;'>Clinic: </strong>" . $row['ClinicName'] . "<br><br>";
	echo "<strong style='color: darkgrey; margin-left:30px;'>Pet Description: </strong>" . $row['PetDescription'] . "<br><br>";
    echo "<strong style='color: darkgrey; margin-left:30px;'>Pet Condition: </strong>" . $row['PetCondition'] . "<br><br>";
	echo "<div>";
}
mysql_close($con);
?>
<br>
<?php
error_reporting(0);
$q=$_GET["q"];

$con = mysql_connect('localhost', 'root');
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("399lovelypets", $con);

$sql="SELECT * FROM treatmentrecord INNER JOIN staff ON treatmentrecord.DoctorID=staff.StaffID WHERE PetID = '".$q."'";

$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
 {  echo "<div class='city' >";
    echo "<hr><br><br>";
    echo "<h2 style='margin-left:30px;'>Treatment Record</h2><br>";
	echo "<strong style='color: darkgrey; margin-left:30px;'>Treatment Record ID: </strong>" . $row['TreatmentRecordID'] . "<br><br>";
  	echo "<strong style='color: darkgrey; margin-left:30px;'>Doctor ID: </strong>" . $row['DoctorID'] . "<br><br>";
	echo "<strong style='color: darkgrey; margin-left:30px;'>Doctor Name: </strong>" . $row['StaffName'] . "<br><br>";
	echo "<strong style='color: darkgrey; margin-left:30px;'>Room: </strong>" . $row['RoomID'] . "<br><br>";
	echo "<strong style='color: darkgrey; margin-left:30px;'>Treatment Start Time </strong>" . $row['TreatmentStartTime'] . "<br><br>";
	echo "<strong style='color: darkgrey; margin-left:30px;'>Treatment Start Date: </strong>" . $row['TreatmentDate'] . "<br><br>";
	echo "<strong style='color: darkgrey; margin-left:30px;'>Treatment End Time: </strong>" . $row['TreatmentEndTime'] . "<br><br>";
	echo "<strong style='color: darkgrey; margin-left:30px;'>Treatment End Date: </strong>" . $row['TreatmentEndDate'] . "<br><br>";
  echo "<strong style='color: darkgrey; margin-left:30px;'>Treatment Process Description: </strong>" . $row['TreatmentProcessDescription'] . "<br><br>";
	echo "<strong style='color: darkgrey; margin-left:30px;'>Treatment Result: </strong>" . $row['TreatmentResult'] . "<br><br>";
  echo "<strong style='color: darkgrey; margin-left:30px;'>Treatment Result Description: </strong>" . $row['TreatmentResultDescription'] . "<br><br>";
	echo "<div>";
}
mysql_close($con);
?>
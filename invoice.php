<?php
error_reporting(0);
$q=$_GET["q"];

$con = mysql_connect("localhost", "root");
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("399lovelypets", $con);

$sql="SELECT * FROM pet INNER JOIN petowner ON pet.PetOwnerID = petowner.PetOwnerID INNER JOIN clinic ON pet.ClinicID = clinic.ClinicID WHERE PetID = '".$q."'";

$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
{
	echo "<div class='city6'>";
	    echo "<h1 style='color:coral; margin-left:12px;'>Invoice Info:</h1>";
	    echo "<hr><br>";
	    echo "<h2 style='margin-left:20px; margin-top:10px;'>Pet Informtaion</h2><br><br>";
	    echo "<strong style='color: darkgrey;margin-left:20px;'>Pet ID: </strong>" . $row['PetID'] . "<br><br>";
	    echo "<strong style='color: darkgrey;margin-left:20px;'>Pet Name: </strong>" . $row['PetName'] . "<br><br>";
        echo "<hr><br>";
	    echo "<h2 style='margin-left:20px;'>Pet Owner's contact Informtaion</h2><br><br>";
	    echo "<strong style='color: darkgrey;margin-left:20px;'>Pet Owner's Name: </strong><br><big style='margin-left:20px;'>" . $row['PetOwnerName'] . "</big><br><br>";
	    echo "<strong style='color: darkgrey;margin-left:20px;'>Phone Number: </strong><br><big style='margin-left:20px;'>" . $row['PetOwnerPhoneNumber'] . "</big><br><br>";
	    echo "<strong style='color: darkgrey;margin-left:20px;'>Email Address: </strong><br><big style='margin-left:20px;'>" . $row['PetOwnerEmailAddress'] . "</big><br><br>";
	    echo "<strong style='color: darkgrey;margin-left:20px;'>Home Address: </strong><br><p style='margin-left:20px;'>" . $row['PetOwnerHomeAddress'] . "</p><br><br>";
    echo "</div>";
    
    echo "<div class='city7'>";
	
	echo "<button type='button' class='button' style='margin-left:330px;margin-top:22px;'>Print</button>";
    
	echo "<h2 style=' margin-top:15px;'>Payment Detail</h2><br>";
	echo "<strong style='color: darkgrey;'>Clinic: </strong>" . $row['ClinicName'] . "<br><br>";

}
mysql_close($con);

?>








<?php
error_reporting(0);
$q=$_GET["q"];

$con = mysql_connect("localhost", "root");
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("399lovelypets", $con);

$sql="SELECT * FROM treatmentrecord INNER JOIN staff ON treatmentrecord.DoctorID=staff.StaffID WHERE PetID = '".$q."'";

$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
{
	    echo "<strong style='color: darkgrey;'>Service Start Time: </strong>" . $row['TreatmentStartTime'] . ", " . $row['TreatmentDate'] . "<br><br>";
	    echo "<strong style='color: darkgrey;'>Service Finish Time: </strong>" . $row['TreatmentEndTime'] . ", " . $row['TreatmentEndDate'] . "<br><br>";
	echo "<strong style='color: darkgrey;'>Doctor ID: </strong>" . $row['DoctorID'] . "";
	    echo "<strong style='color: darkgrey;margin-left:20px;'>DoctorName: </strong>" . $row['StaffName'] . "<br><br>";
	    echo "<p style='color:blue'>Each price includes 10% GST.</p>";
        echo "<hr><br>";

}
mysql_close($con);

?>
   



<?php
error_reporting(0);
$q=$_GET["q"];

$con = mysql_connect("localhost", "root");
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("399lovelypets", $con);

$sql_1="SELECT * FROM service INNER JOIN treatment ON service.TreatmentName=treatment.TreatmentName WHERE PetID = '".$q."'";

$sql_2="SELECT SUM(Price*Amount) AS sum_money From service INNER JOIN treatment ON service.TreatmentName=treatment.TreatmentName WHERE PetID = '".$q."'";

$sql_3="SELECT SUM(Price*Amount/10) AS gst From service INNER JOIN treatment ON service.TreatmentName=treatment.TreatmentName WHERE PetID = '".$q."'";

$result = mysql_query($sql_1);

echo "<table style='margin-left:10px;'>";
	    echo "<tr>";
		echo "<th><h4>Payment Name</h4></th>"; 
        echo "<th><h4>Payment Category</h4></th>";
        echo "<th><h4>Amount</h4></th>";
        echo "<th><h4>Price($)</h4></th>";
		echo "</tr>";

while($row = mysql_fetch_array($result))
{
	    echo "<tr>";
        echo "<td>" . $row['TreatmentName'] . "</td>";
	    echo "<td>" . $row['TreatmentCategory'] . "</td>";
	    echo "<td>" . $row['Amount'] . "</td>";
	    echo "<td><label name='a' value='" . $row['Price'] . "'>" . $row['Price'] . "</td>";
	    echo "</tr>";

}
echo "</table>";

echo "<hr>";
$result_2 = mysql_query($sql_2);
while($row = mysql_fetch_array($result_2))
{ echo "<h1 style='color:coral;margin-left:150px;'>Total Payment: $" . $row['sum_money'] . "</h1>"; }

$result_3 = mysql_query($sql_3);
while($row = mysql_fetch_array($result_3))
{ echo "<h2 style='color:blue; margin-left:180px;'>Including GST: $" . $row['gst'] . "</h2>"; }

mysql_close($con);
?>


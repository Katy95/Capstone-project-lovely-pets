<!DOCTYPE html>
<html>
    
    <head> 
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Treatment Record Form</title>

        <!-- Mobile viewport optimized: h5bp.com/viewport -->
        <meta name="viewport" content="width=device-width" />
        
        <!-- Style Sheet-->
        <link href='http://fonts.googleapis.com/css family=Dosis:200,300,400,500,600,700,800' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" type="text/css" href="css/treatmentrecord.css">  
		      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                <link rel="stylesheet" href="/resources/demos/style.css">
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script> 
                <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<style>
			table {
				border-collapse: collapse;
				width: 100%;
				background-color: white;
			}
			th, td {
				padding: 8px;
				text-align: left;
				border-bottom: 1px solid #ddd;
			}
		</style>
        <script>
                $( function() {
    $( ".datepicker" ).datepicker({
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true
    });
  } );
                </script>
    </head>
    
    <body>
        <div class="container">
            
            <!--SIDEBAR-->
            <aside id="sidebar">
            
            <!--logo-->
            <a href="#" class="logo"><img src="pic/logo2.png" alt="logo" /></a>
            
            <!--main-menu-->
            <nav class="main-nav">
                <ul>
							<li><a href="homepage.html">Homepage</a></li>
							<li><a href="clinicinfohomepage.php">Clinic Info</a></li>
							<li><a href="petview.php?page=1">Pet Info</a></li>
							<li><a href="petowner.php">Petowner Info</a></li>
							<li><a href="appointmentinfo.html">Appointment Info</a></li>
							<li><a href="treatmentinfo.php?page=1">Treatment Info</a></li>
							<li class="active"><a href="treatmentrecord.php">Treatment Record</a></li>
							<li><a href="staffinfo.php">Staff Info</a></li>
                </ul>
            </nav>
            
            </aside>
            
            <!--CONTENT-->
            <section id="content">
            
                <!--header-->
                <header>
                    <h1>Treatment Record Form</h1>
                </header>
            
                <!--main-->
				
                <div style="overflow: scroll;" class="main">	
					
<?php
// Print a cookie
$us=$_POST['start'];
?>

<?php
					    error_reporting(0);
								$con = mysql_connect("localhost", "root");
                            if (!$con){
                                die("" . mysql_error());
                            }
                            mysql_select_db("399lovelypets", $con);
						function fill_treatment_1($con)
						{
                            $sql = "SELECT * FROM treatment";
								
                            $mydata = mysql_query($sql, $con);

                    		while($record = mysql_fetch_array($mydata)){
								$output .= "<option value='".$record['TreatmentCategory']."'>".$record['TreatmentCategory']."</option>";
							}
	                        return $output;

						}
						function fill_treatment_2($con)
						{
                            $sql = "SELECT * FROM treatment";
								
                            $mydata = mysql_query($sql, $con);

                    		while($record = mysql_fetch_array($mydata)){
								$output .= "<option value='".$record['TreatmentName']."'>".$record['TreatmentName']."</option>";
							}
	                        return $output;

						}

?>


<form action="starttreatment.php" method="post">

<?php
error_reporting(0);

$con = mysql_connect('localhost', 'root');
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("399lovelypets", $con);
$sql="SELECT * FROM pet WHERE PetID = '$us'";

$result = mysql_query($sql);

while($row = mysql_fetch_array($result))

                            {
	                            
	                            echo "<div class='city1'>";
	                            
                                echo "<h2 style='color: dimgray;margin-left:20px; margin-top:20px;'>Sickness Condition</h2><br><br>";
								echo "<big style='color:darkgrey; margin-left:20px;'>Pet Name: </big>" . $row['PetName'] . "<br><br>";
								echo "<big style='color:darkgrey; margin-left:20px;'>Pet ID: </big><input type=text name=start size=8% value='" . $row['PetID'] . "'><br><br>";

								echo "<big style='color:darkgrey; margin-left:20px;'>Pet Species: </big>" . $row['PetSpecies'] . "<br><br>";
								echo "<big style='color:darkgrey; margin-left:20px;'>Pet Description: <br></big><p style='margin-left:20px;margin-top:5px;'>" . $row['PetDescription'] . "</p><br><br>";
	                            echo "<hr style=' margin-left:20px;'>";
	                            echo "<br>";
	                            echo "</div>";
}
	mysql_close($con);
	                          
?>





<?php
error_reporting(0);

$con = mysql_connect('localhost', 'root');
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("399lovelypets", $con);
$sql="SELECT * FROM appointment INNER JOIN staff ON appointment.DoctorID = staff.StaffID WHERE PetID = '$us'";

$result = mysql_query($sql);

while($row = mysql_fetch_array($result))

                            {
	                            echo "<div class='city5'>";
                                echo "<big><h2  style='margin-left:20px; margin-top:20px;'>Check the Treatment Information :</h2></big>";
	                            echo "<strong style='color: darkgray; margin-left: 130px;'><h2 style='margin-left:200px;'>-Time and place</h2></strong><br><br>";
								echo "<big style='color:darkgrey; margin-left:20px;'>Doctor Name:</big> " . $row['StaffName'] . "<br><br>";
	                            echo "<big name='doctorID' style='color:darkgrey; margin-left:20px;'>Doctor ID:</big><input type=text name=doctorID size=8% value='" . $row['DoctorID'] . "'><br><br>";
	                          

?>
					
    <strong style="margin-left:20px;">Treatment Room:</strong>
    <select name="roomID" class="round" rows="30" cols="30%">
		<option value=""></option>
        <option value="A01">A001</option>
        <option value="A02">A002</option>
        <option value="A03">A003</option>
        <option value="B01">B001</option>
        <option value="B02">B002</option>
        <option value="B03">B003</option>
        <option value="B04">B004</option>
        <option value="B05">B005</option>
        <option value="C01">C001</option>
        <option value="C02">C002</option>
        <option value="C03">C003</option>
        <option value="C04">C004</option>
        <option value="C05">C005</option>
    </select>
    <br><br> 
    <strong style="margin-left:20px;">Treatment Start Time:</strong>
        <select name='treatmentStartTime' class='round'>
        <option value=""></option>
        <option value="7:00">7:00</option>
        <option value="8:00">8:00</option>
        <option value="9:00">9:00</option>
        <option value="10:00">10:00</option>
        <option value="11:00">11:00</option>
        <option value="12:00">12:00</option>
        <option value="13:00">13:00</option>
        <option value="14:00">14:00</option>
        <option value="15:00">15:00</option>
        <option value="16:00">16:00</option>
        <option value="17:00">17:00</option>
        <option value="18:00">18:00</option>
        <option value="19:00">19:00</option>
        </select>
<br><br>
    <strong style="margin-left:20px;">Treatment Date:</strong>
    <?php echo "<input type='date' class='datepicker' name='treatmentDate' value=".$row['AppointmentDate'].">"; 
		  ?>
	
    
<?php 
}
?>
	<br>
					<a href="treatmentrecord.php"><button type="button" class="button" style="margin-left:20px; margin-top:100px;">Back</button></a>
    <button type="submit" name='submit' class="button" style="margin-top:100px;" value="">Start Treatment</button>
					<?php echo "</div>"; ?>
					</form>
				</div>
						<?php
                            error_reporting(0);
							if (isset($_POST['submit'])){
								$con = mysql_connect("localhost", "root", "");
								echo "<script>alert('Submit successfully!');</script>";
							}
                            if (!$con){
                                die("" . mysql_error());
                            }
                            mysql_select_db("399lovelypets", $con);

                            $sql_1 = "INSERT INTO treatmentrecord (PetID, DoctorID, RoomID, TreatmentStartTime, TreatmentDate) VALUES ('$_POST[start]','$_POST[doctorID]','$_POST[roomID]','$_POST[treatmentStartTime]','$_POST[treatmentDate]')";
				
				            $sql_2 = "UPDATE pet SET PetCondition='In service' WHERE PetID='$us'";

				            mysql_query($sql_1, $con);
				            mysql_query($sql_2, $con);
				
							mysql_close($con);				
				            ?>
			</section>
	    </div>

	</body>
</html>
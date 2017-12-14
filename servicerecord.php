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
            <script>
                $( function() {
    $( ".datepicker" ).datepicker({
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true
    });
  } );
                </script>
		
		<style>
			table {
				border-collapse: collapse;
				width: 100%;
				background-color: white;
			}
			th, td {
				padding: 3px;
				text-align: left;
				border-bottom: 1px solid #ddd;
			}
		</style>
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
                            $sql = "SELECT * FROM treatmentcategory";
								
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
	                            echo "<form action='servicerecord.php' method='post'>";
	                            echo "<div class='city99'>";
	                            echo "<div class='city1'>";
	                            
                                echo "<h2 style='color: dimgray;'>Sickness Condition</h2><br><br>";
								echo "<big style='color:darkgrey;'>Pet Name: </big>" . $row['PetName'] . "<br><br>";
								echo "<big style='color:darkgrey;'>Pet ID: </big><input type=text name=start size=8% value='" . $row['PetID'] . "'><br><br>";

								echo "<big style='color:darkgrey;'>Pet Species: </big>" . $row['PetSpecies'] . "<br><br>";
								echo "<big style='color:darkgrey;'>Pet Description: <br></big><p style=' margin-top:5px;'>" . $row['PetDescription'] . "</p><br><br>";
	                            echo "<hr>";
	                            echo "<br>";
	
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
$sql="SELECT * FROM treatmentrecord WHERE PetID = '$us'";

$result = mysql_query($sql);

while($row = mysql_fetch_array($result))

                            {
                                echo "<h2 style='color: dimgray; '>Time and place</h2><br><br>";
								echo "<big style='color:darkgrey;'>Room: </big>" . $row['RoomID'] . "<br><br>";
								echo "<big style='color:darkgrey;'>Start Time: </big>" . $row['TreatmentStartTime'] . "<br><br>";
								echo "<big style='color:darkgrey;'>Start Date: </big>" . $row['TreatmentDate'] . "<br><br>";
	                            echo "<br>";
	                            echo "</div>";
	
}
	mysql_close($con);
	                          
?>
        <div class='city5'>
        <h2>Treatment End Time</h2><br><br>
		<strong>Treatment End Time:</strong>
			
<?php
error_reporting(0);

$con = mysql_connect('localhost', 'root');
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("399lovelypets", $con);
$sql="SELECT * FROM treatmentrecord WHERE PetID = '$us'";

$result = mysql_query($sql);

while($row = mysql_fetch_array($result))

                            {
	?>
        <select name='treatmentEndTime' class='round'> 
		<?php echo "<option value='".$row['TreatmentEndTime']."'>".$row['TreatmentEndTime']."</option>"; ?>
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
        <option value="20:00">20:00</option>
        </select>
		<br><br>

        <strong>Treatment End Date:</strong>			 
<?php
                                echo "<input type='date' class='datepicker' name='treatmentEndDate' value=".$row['TreatmentEndDate']."><br><br>"; ?>
	
	<hr><br>
	<h2>Process record</h2><br><br>
	<strong>Treatment Process Record:</strong><br><br>
			<?php echo "<textarea name='treatmentProcessDescription' class='round' rows='15' cols='55%'>".$row['TreatmentProcessDescription']."</textarea>";?>
<?php
}
	mysql_close($con);
	                          
?> 
	<button type="submit" name='submit_1' class="button" style="margin-left:150px;" value="">Save this part</button>
	</div>
	<?php echo "</div>";?>
	<div class="city99">
	<hr>
<br>
    <strong><h2>Service using in Treatment</h2></strong>

<br>



							<?php
                            error_reporting(0);
                            $con = mysql_connect("localhost", "root");
                            if(!$con){
                                die("Can not connect: " . mysql_error());
                            }
                            mysql_select_db("399lovelypets",$con);

							if(isset($_POST['update'])){
							    $UpdateQuery = "UPDATE service SET TreatmentName='$_POST[showtreatmentName]', TreatmentCategory='$_POST[showtreatmentCategory]', Amount='$_POST[amount]', PetID='$_POST[start]' WHERE ServiceID='$_POST[hidden]'";
							    mysql_query($UpdateQuery, $con);
							};
							
							if(isset($_POST['delete'])){
							    $DeleteQuery = "DELETE FROM service WHERE ServiceID='$_POST[hidden]'";
							    mysql_query($DeleteQuery, $con);
							};

                            if(isset($_POST['insert'])){
							    $AddQuery = "INSERT INTO service (TreatmentCategory, TreatmentName, Amount, PetID) VALUES ('$_POST[addtreatmentCategory]', '$_POST[addtreatmentName]', '$_POST[addAmount]', '$_POST[start]')";
							    mysql_query($AddQuery, $con);
							};

                            $sql = "SELECT * FROM service Where PetID='$us'";
                            $mydata = mysql_query($sql, $con);
							echo "<table>
								<tr>
									<th>Category</th> 
									<th>Name</th>
									<th>Amount</th>
									<th>PetID</th>
								</tr>";
                            while($record = mysql_fetch_array($mydata)){
								echo "<form method=post>";
								echo "<tr>";
                                echo "<td>";
                                echo " <select name='showtreatmentCategory'id='showtreatmentCategory'>";
	                            echo "<option value='".$record['TreatmentCategory']."'>".$record['TreatmentCategory']."</option>";
	                            echo fill_treatment_1($con);
	                            echo "</select>"; 
								echo "</td>";
								echo "<td>";
 
                                echo " <select name='showtreatmentName' id='showtreatmentName'>";
	                            echo "<option value='".$record['TreatmentName']."'>".$record['TreatmentName']."</option>";
	                            echo fill_treatment_2($con);
	                            echo "</select>"; 
								echo "</td>";
								echo "<td><input type=text name=amount size=4% value='" . $record['Amount'] . "'></td>";
								echo "<td><input type=text name=start size=4% value='" . $record['PetID'] . "'></td>";
								echo "<td><input type=hidden name=hidden size=4% value='" . $record['ServiceID'] . "'>";
								echo "<td><input type=submit name=update value=update></td>";
								echo "<td><input type=submit name=delete value=delete></td>";
                                echo "</tr>";
                                echo "</form>";
                            }
                            echo "<form method=post>";
                            echo "<tr>";
		                    echo "<td>";
	                        echo "<select name='addtreatmentCategory' id='addtreatmentCategory'>";
	                        echo "<option value=''></option>";
	                        echo fill_treatment_1($con);
	                        echo "</select>";
	                        echo "</td>";
	                        echo "<td>";
	                        echo "<select name='addtreatmentName' id='addtreatmentName'>";
	                        echo "<option value=''></option>";
	                        echo fill_treatment_2($con);
	                        echo "</select>";
	                        echo "</td>";
	                        echo "<td>";
	                        echo "<input type='text' size='4%' name='addAmount' id='addAmount' class='addAmount'>";
	                        echo "</td>";
                            echo "<td>";
	                        echo "<input type='text' size='4%' name='start' id='addPetID' class='addPetID' value='$us'>";
	                        echo "</td>";
	                        echo "<td>";
							echo "<input type='submit' size='4%'name='insert' value='add' id='insert' class='insert'>";
						    echo "</td>";
                            echo "</form>";

                            echo "</table>";
							
                            mysql_close($con);

                            ?>

<br><hr><br>
    <strong><h2>Treatment Result</h2></strong><br>
    <input type="radio" name="treatmentResult" value="Success" checked> Success
    <input type="radio" name="treatmentResult" value="Fail"> Fail<br>
    <br>
    <strong style="margin-left: 5px;">Remark column:</strong><br>
    <textarea name="treatmentResultDescription" class="round" rows="20" cols="90%">If the treatment was failed, please describe the reason and write the future plan...</textarea>
	<br><br>
    <button type="submit" name='submit_2' class="button" style="margin-left:280px;" value="">Submit this record</button><br><br>
	<?php echo "</form>"; ?>
					</div></div>
						<?php
                            error_reporting(0);
							if (isset($_POST['submit_1'])){
								$con = mysql_connect("localhost", "root", "");
								echo "<script>alert('Save successfully!');</script>";
							}
                            if (!$con){
                                die("" . mysql_error());
                            }
                            mysql_select_db("399lovelypets", $con);

                            $sql = "UPDATE treatmentrecord SET TreatmentEndTime='$_POST[treatmentEndTime]', TreatmentEndDate='$_POST[treatmentEndDate]', TreatmentProcessDescription='$_POST[treatmentProcessDescription]' WHERE PetID='$us'";

				            mysql_query($sql, $con);
				
							mysql_close($con);	
				          ?>
				          <?php

                            error_reporting(0);
							if (isset($_POST['submit_2'])){
								$con = mysql_connect("localhost", "root");
								echo "<script>alert('Submit successfully!');</script>";
							}
                            if (!$con){
                                die("" . mysql_error());
                            }
                            mysql_select_db("399lovelypets", $con);

                            $sql_1 = "UPDATE treatmentrecord SET TreatmentResult='$_POST[treatmentResult]', TreatmentResultDescription='$_POST[treatmentResultDescription]' WHERE PetID='$us'";
				
				            $sql_2 = "UPDATE pet SET PetCondition='Service finished' WHERE PetID='$us'";

				            mysql_query($sql_1, $con);
				            mysql_query($sql_2, $con);
				
							mysql_close($con);				
				            ?>
			</section>
	    </div>

	</body>
</html>
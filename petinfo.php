
						<?php
					    error_reporting(0);
								$con = mysql_connect("localhost", "root");
                            if (!$con){
                                die("" . mysql_error());
                            }
                            mysql_select_db("399lovelypets", $con);
						function fill_clinic($con)
						{
                            $sql = "SELECT * FROM clinic";
								
                            $mydata = mysql_query($sql, $con);

                    		while($record = mysql_fetch_array($mydata)){
								$output .= "<option value='".$record['ClinicID']."'>".$record['ClinicName']."</option>";
							}
	                        return $output;
						}
						function fill_pen($con)
						{
                            $sql = "SELECT * FROM pen";
								
                            $mydata = mysql_query($sql, $con);

                    		while($record = mysql_fetch_array($mydata)){
								$output .= "<option value='".$record['PenID']."'>".$record['PenID']."</option>";
							}
	                        return $output;
						}

?>

						<?php
                            error_reporting(0);
								$con = mysql_connect("localhost", "root", "");
                            if (!$con){
                                die("" . mysql_error());
                            }
                            mysql_select_db("399lovelypets", $con);

                            $sql="SELECT count(PetID) AS maxpetid From pet";

                            $result = mysql_query($sql);
                            while($row = mysql_fetch_array($result))
                            {
								$a=$row['maxpetid']+1;
							    $b="P$a";
							}
							
				            ?>

						<?php
                            error_reporting(0);
								$con = mysql_connect("localhost", "root", "");
                            if (!$con){
                                die("" . mysql_error());
                            }
                            mysql_select_db("399lovelypets", $con);

                            $sql="SELECT count(PetOwnerID) AS maxpetownerid From petowner";

                            $result = mysql_query($sql);
                            while($row = mysql_fetch_array($result))
                            {
								$c=$row['maxpetownerid']+1;
							    $d="Cu$c";
							}
								
				            ?>


<!DOCTYPE html>
<html>
    
    <head> 
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Pet Information Registration Form</title>

        <!-- Mobile viewport optimized: h5bp.com/viewport -->
        <meta name="viewport" content="width=device-width" />
        
        <!-- Style Sheet-->
        <link href='http://fonts.googleapis.com/css family=Dosis:200,300,400,500,600,700,800' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" type="text/css" href="css/petinfo_registrationform.css"> 
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script> 
		
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
							<li class="active"><a href="petview.php?page=1">Pet Info</a></li>
							<li><a href="petowner.php">Petowner Info</a></li>
							<li><a href="appointmentinfo.html">Appointment Info</a></li>
							<li><a href="treatmentinfo.php?page=1">Treatment Info</a></li>
							<li><a href="treatmentrecord.php">Treatment Record</a></li>
							<li><a href="staffinfo.php">Staff Info</a></li>
                </ul>
            </nav>
            
            </aside>
            
            <!--CONTENT-->
            <section id="content">
            
                <!--header-->
                <header>
                    <h1>Pet Information Registration Form</h1>
                </header>
            
                <!--main-->
                <div style="overflow: scroll;" class="main">
                        <form method="post" action="petinfo.php">
							<form method="post" action="petinfo.php">
                        <div class="city">
                                <h2>Pet's basic information</h2><br>
								<strong style="margin-left: 5px;">Pet ID </strong>
                                <input type="text" name="petID" <?php echo "value='$b'";?> size=38%; class="round"><br><br>
							    <strong style="margin-left: 5px;">Pet Clinic </strong><br>
								<select name="clinicID" id="clinicID" class="round" rows="5" cols="43%">
								<option value="None"></option>;
								<?php echo fill_clinic($con);?>
							    </select>
                                <br><br>

                                <strong style="margin-left: 5px;">Pet Name</strong><br>
                                <input type="text" name="petName" size=38%; class="round"><br><br>
                                <strong style="margin-left: 5px;">Pet Age</strong><br>
                                <input type="text" name="petAge" size="38%" class="round"><br><br>
                                <strong style="margin-left: 5px;">Pet Gender</strong><br>
                                <input type="radio" name="petGender" value="male" checked> Male
                                <input type="radio" name="petGender" value="female"> Female<br><br>
                                <strong style="margin-left: 5px;">Pet Species</strong><br>
                                <input type="text" name="petSpecies" size="38%" class="round"><br><br>
                                <strong style="margin-left: 5px;">Pet Description</strong><br>
                                <textarea name="petDescription" class="round" rows="3" cols="36%">Please simply describe the sickness and allergy condition of this pet...</textarea><br><br>
                                <strong style="margin-left: 5px;">Need to stay in the clinic</strong><br>
<input type=radio name=aa value=no onclick=bb.style.display='none'>No
<input type=radio name=aa value=yes onclick=bb.style.display='block'>Yes<br><br>
<div id=bb style=display:none><strong style="margin-left: 5px;">Pen ID </strong><br>
							
<select name="penID" id="penID" class="round" rows="5" cols="43%">
								<option value="No"></option>;
								<?php echo fill_pen($con);?>
							    </select>
                                <br><br>

	</div><br><br>
							
                        </div>
                    
                        <div class="city">
                                <h2>Pet Owner's Information</h2><br>
                                <strong style="color: darkgray; margin-left: 130px;"><big>-Just record for contact</big></strong><br><br>
							
							
							    <strong style="margin-left: 5px;">Pet Owner already exist</strong><br>
<input type=radio name=ss value=no onclick="tt.style.display='none';ff.style.display='block'">No
<input type=radio name=ss value=yes onclick="tt.style.display='block';ff.style.display='none'">Yes<br><br>
<div id=tt style=display:none><strong style="margin-left: 5px;">Pet Owner ID </strong><br>
							
<input type="text" name="petownerexistID" <?php echo "value='$d'";?> size=38%; class="round"><br><br>
                                <br><br>
	<div class="submit">
								<button type="submit" float = left class="button" name="submit_2" class="submit_final">Save and Insert</button>
                                <button type="reset" float=left class="button">Reset all data</button>    
                            </div>

							</div></form>
<div id=ff style=display:block>
	<strong style="margin-left: 5px;">Pet Owner ID</strong><br>
                                <input type="text" name="petownerID" size="38%" class="round" <?php echo "value='$d'";?>><br><br>
								<strong style="margin-left: 5px;">Pet Owner's Name</strong><br>
                                <select name="petownerGender" class="round" rows="5" cols="25%">
                                    <option value="Mr." ;>Mr.</option>
                                    <option value="Ms." ;>Ms.</option>
                                </select>
                                <input type="text" name="petownerName" size="26.5%" class="round"><br><br>
                                <strong style="margin-left: 5px;">Phone Number</strong><br>
                                <input type="text" name="petownerPhoneNumber" size="38%" class="round"><br><br>
                                <strong style="margin-left: 5px;">Email Address</strong><br>
                                <input type="email" name="petownerEmailAddress" size="38%" class="round"><br><br>
                                <strong style="margin-left: 5px;">Home Address</strong><br>
                                <textarea name="petownerHomeAddress" class="round" rows="5" cols="36%"></textarea><br>
                            
                            <br>
	                           <div class="submit">
								<button type="submit" float = left class="button" name="submit_1" class="submit_final">Save and Submit</button>
                                <button type="reset" float=left class="button">Reset all data</button>    
                            </div>

	</div><br><br>

                            
                        </div>
					</form>
                    </div>
							<?php
                            error_reporting(0);
							if (isset($_POST['submit_2'])){
								$con = mysql_connect("localhost", "root", "");
								echo "<script>alert('Submit New pet information successfully!');</script>";
							}
                            if (!$con){
                                die("" . mysql_error());
                            }
                            mysql_select_db("399lovelypets", $con);

                            $sql = "INSERT INTO pet (PetID, ClinicID, PetName, PetAge, PetSpecies, PetGender, PetOwnerID, PetDescription, PenID) VALUES ('$_POST[petID]','$_POST[clinicID]','$_POST[petName]','$_POST[petAge]','$_POST[petSpecies]','$_POST[petGender]','$_POST[petownerexistID]','$_POST[petDescription]','$_POST[penID]')";
				
				            mysql_query($sql, $con);
								
				            ?>
				
							<?php
                            error_reporting(0);
							if (isset($_POST['submit_1'])){
								$con = mysql_connect("localhost", "root", "");
								echo "<script>alert('Submit successfully!');</script>";
							}
                            if (!$con){
                                die("" . mysql_error());
                            }
                            mysql_select_db("399lovelypets", $con);

                            $sql_1 = "INSERT INTO pet (PetID, ClinicID, PetName, PetAge, PetSpecies, PetGender, PetOwnerID, PetDescription, PenID) VALUES ('$_POST[petID]','$_POST[clinicID]','$_POST[petName]','$_POST[petAge]','$_POST[petSpecies]','$_POST[petGender]','$_POST[petownerID]','$_POST[petDescription]','$_POST[penID]')";
				
				            $sql_2 = "INSERT INTO petowner (PetOwnerID, PetOwnerName, PetOwnerGender, PetOwnerPhoneNumber, PetOwnerEmailAddress, PetOwnerHomeAddress) VALUES ('$_POST[petownerID]','$_POST[petownerName]','$_POST[petownerGender]','$_POST[petownerPhoneNumber]','$_POST[petownerEmailAddress]','$_POST[petownerHomeAddress]')";
				
				            mysql_query($sql_1, $con);
				            mysql_query($sql_2, $con);
							
				mysql_close($con);	
				            ?>

            </section>
        </div>
        
    </body>
</html>
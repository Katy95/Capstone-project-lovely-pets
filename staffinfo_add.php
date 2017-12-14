<!doctype html>
		<head>
				<meta charset="utf-8" />
				
				<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				
				<title>Staff Information</title>
				
				<!-- Mobile viewport optimized: h5bp.com/viewport -->
				<meta name="viewport" content="width=device-width" />
				
				
				<!-- Style Sheet-->
				<link href="http://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet" type="text/css" />
				<link rel="stylesheet" type="text/css" href="css/staffinfo_add.css" />
                <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                <link rel="stylesheet" href="/resources/demos/style.css">
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script> 
                <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                <script>
                 $(document).ready(function() {
    $( ".datepicker" ).datepicker({
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true
    });
  } );
                </script>
            <?php

					    error_reporting(0);

								$con = mysql_connect("localhost", "root", '');

                            if (!$con){

                                die("" . mysql_error());

                            }

                        mysql_select_db("399lovelypets", $con);

						function fill_brand($con)

						{

                            $sql = "SELECT * FROM clinic";
                            $mydata = mysql_query($sql, $con);
                    		while($record = mysql_fetch_array($mydata)){

								$output .= "<option value='".$record['ClinicID']."'>".$record['ClinicID']."</option>";

							}

	                        return $output;

						}



?>
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
							<li><a href="treatmentrecord.php">Treatment Record</a></li>
							<li class="active"><a href="staffinfo.php">Staff Info</a></li>
						</ul>
					</nav>
				</aside>
				<!--CONTENT-->
				<section id="content">
					
						<!--header-->
						<header>					
								<h1>Staff Information</h1>
						</header>
						
						<!--main-->
						<div class="page">
<div class="staff">
	<?php
		 error_reporting(0);
        $con = mysql_connect("localhost", "root");
        if(!$con){
                    die("Can not connect: " . mysql_error());
                }
                mysql_select_db("399lovelypets",$con);
        
        if(isset($_POST['add'])){
            $CheckQuery = mysql_fetch_array(mysql_query("SELECT * FROM staff WHERE StaffID = '$_POST[addid]' LIMIT 1"));
            if($CheckQuery){
                echo '<script type="text/javascript">alert("Staff ID already exist!");history.go(-1);</script>';
                exit;
            }
            $AddQuery = "INSERT INTO staff (StaffID, StaffName, StaffPosition, StaffGender, DateOfBirth, StaffPhoneNumber, StaffEmail, StaffAddress, WorkingClinicID, HireDate, Photo) VALUES ('$_POST[addid]', '$_POST[addname]', '$_POST[addpo]', '$_POST[addgender]', '$_POST[adddob]', '$_POST[addmobile]', '$_POST[addemail]', '$_POST[addaddress]', '$_POST[addlo]', '$_POST[addhire]', '$_POST[addlink]')";
							    mysql_query($AddQuery, $con);
                SUBMISSION();
							};
    function SUBMISSION(){
        echo"<script type=\"text/javascript\">document.location.href='./staffinfo.php';</script>";
    $CON->CLOSE();
    }
   
            $sql = "SELECT * FROM staff";
            $myData = mysql_query($sql,$con);
            echo "<table border=1 class='addtable'>";
            echo "<form action=staffinfo_add.php method=post>";
            echo "<tr>";
            echo "<td>Staff ID<br><input type=text name=addid class='textbox'></td>";
            echo "<td>Name<br><input type=text name=addname class='textbox'></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Gender<br><select name=addgender class='textbox'><option value='Male'>Male</option>
                                    <option value='Female'>Female</option>
                                    <option value='Other'>Other</option>
                                </select>
                                </td>";
            echo "<td>D.O.B<br><input type=text class='datepicker' name=adddob></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Mobile<br><input type=text name=addmobile class='textbox'></td>";
            echo "<td>E-mail<br><input type=text name=addemail class='textbox'></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Address<br><input type=text name=addaddress class='textbox'></td>";
            echo "</tr>";
            echo "<tr>";?>
            <td>Work location<br><select name=addlo class='textbox' id='brand'>";?>
            <option value="">Clinic ID</option>
								<?php echo fill_brand($con);mysql_close($con);?>
							</select>
            </td>
            <?php
            echo "<td>Hired time<br><input type=text class='datepicker' name=addhire class='textbox'></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Position<br><select id=select1 name=addpo class='textbox'>
                                        <option value='Doctor'>Doctor</option>
                                        <option value='Manager'>Manager</option>
                                        <option value='Staff'>Staff</option>
                                  </select>
                                        </td>";
            echo "<td>Photo link<br><input type=text name=addlink class='textbox'></td>";
            echo "<tr>";
            echo "<td></td>";
            echo "<td>" . "<input type=submit style='width:80px; height:30px; margin-left:75px; margin-top:20px' name=add value=Add" . " </td>";
            echo "</tr>";
            echo "</form>";
            echo "</table>";
            mysql_close($con);
    ?>
</div>
</div>
</section>
</div>

</body>
</html>
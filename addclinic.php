<?php

                            error_reporting(0);

								$con = mysql_connect("localhost", "root");

                            if (!$con){

                                die("" . mysql_error());

                            }

                            mysql_select_db("399lovelypets", $con);



                            $sql="SELECT count(ClinicID) AS maxclinicid From clinic";



                            $result = mysql_query($sql);

                            while($row = mysql_fetch_array($result))

                            {

								$a=$row['maxclinicid']+1;

							    $b="Cl$a";

							}

							

				            ?>
<!doctype html>
		<head>
				<meta charset="utf-8" />
				
				<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				
				<title>Clinic Information Homepage</title>
				
				<!-- Mobile viewport optimized: h5bp.com/viewport -->
				<meta name="viewport" content="width=device-width" />
				
				
				<!-- Style Sheet-->
				<link href="http://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet" type="text/css" />
				<link rel="stylesheet" type="text/css" href="css/clinicinfo.css" />
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script> 
                <script src="js/selectclinic.js"></script>
            <script src="/jquery/jquery-1.11.1.min.js"></script>
            <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
            <script>
            $(document).ready(function(){
                $('.timepicker').timepicker({
                    timeFormat: 'HH:mm:ss',
                    interval: 30,
                    minTime: '06:00:00',
                    maxTime: '20:00:00',
                    dynamic: true,
                    dropdown: true,
                    scrollbar: true
                });
});
            </script>
		</head>
		<body>				
	<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
			<div class="container">
                
			
				<!--SIDEBAR-->
				<aside id="sidebar">
				
					<!--logo-->
					<a href="#" class="logo"><img src="pic/logo2.png" alt="logo" /></a>
					
					<!--main-menu-->
					<nav class="main-nav">
						<ul>
							<li><a href="homepage.html">Homepage</a></li>
							<li class="active"><a href="clinicinfohomepage.php">Clinic Info</a></li>
							<li><a href="petview.php?page=1">Pet Info</a></li>
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
								<h1>Clinic Management</h1>

						</header>
						<!--main-->
						<div class="main">
                        <div class="page">
                        <div class="clinicname" style="margin-left:20%">

                            <?php
                            error_reporting(0);
                            $con = mysql_connect('localhost', 'root'); 
		                      //these are the aforementioned vars
		                      $db = mysql_select_db('399lovelypets');
                             if(isset($_POST['add'])){
            $AddQuery = "INSERT INTO clinic (ClinicID, ClinicName, ClinicLocation, OpenTime, CloseTime, ClinicPhoneNumber, ClinicEmergencyContact, ClinicDescription, ClinicPhoto, AddressLink) VALUES ('$_POST[id]', '$_POST[name]', '$_POST[lo]', '$_POST[ot]', '$_POST[ct]', '$_POST[pn]', '$_POST[ec]','$_POST[des]', '$_POST[photo]', '$_POST[link]')";
            mysql_query($AddQuery, $con);
            SUBMISSION();
            
            };
                            function SUBMISSION(){
        echo"<script type=\"text/javascript\">document.location.href='./clinicinfohomepage.php';</script>";
    $CON->CLOSE();
    }
                            
                           $query = mysql_query("SELECT * FROM clinic");
                            ?>
                            
                             <form action=addclinic.php method=post>
                            <table class="nameid">
                            <tr>
                            <td class="basictitle">Name And ID</td>
                                </tr>
                            <tr>
                                <td><br>Clinic name<br><input style="width:30%" type="text" name="name" class="round"></td>
                                </tr>
                            <tr><td><br>Clinic ID<br><input style="width:30%" type="text" name="id" class="round" <?php echo "value='$b'";?>></td></tr>
                            </table>
                                <table class="picanddes1">
                             <tr>
                            <td class="basictitle">Photo And Description
                            </td>
                                </tr>
                                 <tr>
            <td><br>Clinic Photo Link</td>
        </tr>
        <tr>
            <td><input style="width:80%" type="text" name="photo" class="round"></td>
        </tr>
        <tr>
            <td><br>Clinic Description</td>
        </tr>
        <tr>
            <td><textarea style="height:90px; width:80%" type="text" name="des" value="des">Please input description</textarea></td>
                                    </tr>
                                    </table>
                                 
        <table style="width:94%; margin-left:4%">
        <tr height='55'>
            <td class='basictitle'><br>Basic Information&nbsp;<td>
        </tr>
        <tr class='timeaddress'>
            <td>
                <br>
                <tr class='timeaddress'>
                    <td>Phone Number<br><br><input style="width:50%" type="text" name="pn" class="round"></td>
                </tr>
                <tr class='timeaddress'>
                    <td><br>Emergency Contact Number<br><br><input style="width:50%" type="text" name="ec" class="round"></td>
                </tr>
                <tr class='timeaddress'>
                    <td><br>Opening time<br><br><input style="width:50%" type="text" name="ot" class="timepicker"></td>
                </tr>
                <tr class='timeaddress'><td><br>Closing time<br><br><input style="width:50%" type="text" name="ct" class="timepicker"></td>
                </tr>
                <tr>
                <td class='timeaddress'><br>Address<br><br><input type="text" style="width:50%" name="lo" class="round"></td>
                </tr>
                <tr>
                <td class='timeaddress'><br><a href="https://www.google.com.au/maps" target="_blank">Address Link</a><br><br><input type="text" style="width:50%" name="link" class="round"></td>
                </tr>
            </td>
        </tr>
</table>
                            <input type=submit style='width:80px; height:30px; float:right' name=add value=Add />
                                </form>
                            <?php
                            mysql_close($con);
                            ?>
						</div>		
                            </div> 
                    </div>
				</section>
							
            </div>
</body>
</html>
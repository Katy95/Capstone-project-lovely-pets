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
        <link rel="stylesheet" type="text/css" href="css/petInfo_viewpage.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script> 
        <script src="js/selectclinic.js"></script>
        <script src="/jquery/jquery-1.11.1.min.js"></script>
            <script>
                $(document).ready(function()
                {
                  if(document.cookie=="")
	                   {
		                  alert("Please login to your account");
		                  window.location='./login.html';
	                   }
	               else
	                   {
		                  var strCookie=document.cookie;
		                  //将多cookie切割为多个名/值对
		                  var arrCookie=strCookie.split("; ");
		                  var arrCookieUserName= arrCookie[0].split("=");
		                  var arrCookieUserAuthority= arrCookie[1].split("=");	
		                  var UserName=arrCookieUserName[1];
		                  var UserAuthority=arrCookieUserAuthority[1];
		                  //alert(UserName+UserAuthority);
		                  $("#name").text("Welcome  "+UserName);
			
	                   };
                    if(UserAuthority=="staff")
	                   {
		                  $(".button").hide();
	                   }
                    else
                        {
                            $(".button").show();
                        };

                });
            </script>
		
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
    </head>
    
    <body>
        <div class="container">
            
            <!--SIDEBAR-->
            <aside id="sidebar">
            
            <!--logo-->
            <p id="name" style="color:white;font-size:20px;margin-left:40px;margin-top:60px;"></p>
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
					<aside id="petview">
						
				            <nav class="left-nav">
						        <ul style="margin-left:50px; margin-top:30px;">
						    	    <li><a href="treatmentrecord.php"><h2>Waiting for treatment</h2></a></li>
							        <li class="active2"><a href="inservice"><h2>In service</h2></a></li>
						        </ul>
								<hr style="width:88%" margin-left=50px;> 
						</nav></aside>
					            <br>
         
				
				        <aside id="petview_waiting for treatment">
						
				            <nav class="nav">
				                <ul style="width:87%; margin-left:50px; margin-top:70px;"><h2>All the pets during treatment:</h2><br>
					                <li>
							
                                        <?php
										error_reporting(0);
										$con = mysql_connect('localhost', 'root');
										if (!$con)
										{
											die('Could not connect: ' . mysql_error());
										}
										mysql_select_db("399lovelypets", $con);
										
										$sql="SELECT * FROM treatmentrecord INNER JOIN pet ON treatmentrecord.PetID = pet.PetID INNER JOIN staff ON treatmentrecord.DoctorID = staff.StaffID WHERE PetCondition='In service'";
										
										$result = mysql_query($sql);  
										
										while($row = mysql_fetch_array($result))
										{
											echo "<br>";
											echo "<form method='post' action='servicerecord.php'>";
											echo "<strong style='color: darkgrey;'>Pet ID: </strong>" . $row['PetID'] . "";
											echo "<strong style='color: darkgrey; margin-left:40px;'>Pet Name: </strong><big style='margin-right:0px;'>" . $row['PetName'] . "</big>";
											echo "<strong style='color: darkgrey; margin-left:40px;'>Pet Species: </strong><big style='margin-right:0px;'>" . $row['PetSpecies'] . "</big><br><br>";
											echo "<strong style='color: darkgrey;'>Doctor ID: </strong><big style='margin-right:0px;'>" . $row['DoctorID'] . "</big>";
											echo "<strong style='color: darkgrey; margin-left:40px;'>Doctor Name: </strong><big style='margin-right:0px;'>" . $row['StaffName'] . "</big><br><br>";
											echo "<strong style='color: darkgrey;'>Treatment start time: </strong><big style='margin-right:0px;'>" . $row['TreatmentStartTime'] . "</big><br><br>";
											echo "<strong style='color: darkgrey;'>Service process Condition: </strong>" . $row['PetCondition'] . "";
											echo "<button type='submit' name='start' id='record' class='button' value='" . $row['PetID'] . "'  style='margin-left:200px;'>Record process and result</button><br><br>";
											echo "<strong style='color: darkgrey;'>Pet Description: </strong>" . $row['PetDescription'] . "<br><br>";
											echo "</form>";
											echo "<hr><hr>";		  
										}
										?>
									</li>
								</ul>
								
								<br><p style="text-align:center">@All the pets in the process of treatment are showing above.@</p>
										
							</nav>
					</aside>
				</div>
			</section>
	    </div>

	</body>
</html>
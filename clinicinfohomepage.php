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
                    if(UserAuthority!="owner")
	                   {
		                  $("#add").hide();
	                   }

                });
            </script>
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
                        <table class="clinic_table">
                            <?php
                            error_reporting(0);
                            echo '<table>';
                            $con = mysql_connect('localhost', 'root'); 
		                      //these are the aforementioned vars
		                      $db = mysql_select_db('399lovelypets');
                            
                           $query = mysql_query("SELECT * FROM clinic");
                            while($row = mysql_fetch_array($query))
                            {
                                echo "<form action='clinicdetails.php' method='POST'>";
                                echo "<tr>";
                                echo "<td><input type='submit' class='hide' name='clinicname' value='" . $row['ClinicName'] . "'></td>";                   
                                echo "</tr>";
                                echo "</form>";
                            } 
                            ?>
                           <td><input type='button' class='add' id='add' name='add' onclick="location.href='addclinic.php'" value='Add Clinic'></td>
                            </table>

						</div>		
                            </div> 
                    </div>
				</section>
							
            </div>
</body>
</html>
<!DOCTYPE html>
<html>
		<head>
			<meta charset="utf-8" />
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				
			<title>Treatment Information</title>
				
			<!-- Mobile viewport optimized: h5bp.com/viewport -->
			<meta name="viewport" content="width=device-width" />
				
				
			<!-- Style Sheet-->
			<link href='http://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800' rel='stylesheet' type='text/css' />
			<link rel="stylesheet" type="text/css" href="css/treatmentinfo.css" />
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
                    if(UserAuthority!="owner"&&UserAuthority!="manager")
	                   {
		                  $(".editbtn").hide();
	                   }


                });
            </script>
			<style>
				table {
					width:700px;
					margin-left: 30px;
					margin-right: 40px;
				}
				table, th, td {
					border: 1px solid Black;
					border-collapse: collapse;
				}
				th, td{
					padding: 5px;
					text-align: left;
				}

				table tr:nth-child(even) {
					background-color: #eee;
				}
				table tr:nth-child(odd) {
					background-color:#fff;
				}
				table th {
					background-color:coral;
					color: white;
					font-size: 18px;
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
							<li class="active"><a href="treatmentinfo.php?page=1">Treatment Info</a></li>
							<li><a href="treatmentrecord.php">Treatment Record</a></li>
							<li><a href="staffinfo.php">Staff Info</a></li>
						</ul>
					</nav>
				</aside>
				
				<!--CONTENT-->
				<section id="content">
					
						<!--header-->
						<header>
								<h1>Treatment Available Service</h1>
						</header>
					
						<!--main-->
						<div class="main"><br>
							<h2 style="margin-left: 20px; padding:10px;">All services available</h2>

									<a href="treatmentinfo_edit.php?page=1"><input class="editbtn" type="button" name="Edit record" value="Edit record" style="margin-left: 640px; font-size: 15px"></a>
							<br><br>
							
							<?php
                            error_reporting(0);
                            $con = mysql_connect("localhost", "root");
                            if(!$con){
                                die("Can not connect: " . mysql_error());
                            }
                            mysql_select_db("399lovelypets", $con);

							$page = $_GET['page'];
                            $pagesize = 15;
							$pagenumber = ($page - 1)*$pagesize;

							$num = mysql_num_rows(mysql_query("SELECT * FROM treatment"));
							$pagenumber_min = ($page - 1)*$pagesize+1;
							if(($num-($page - 1)*$pagesize)<$pagesize){
								$pagenumber_max = $num;
							}
							else{
								$pagenumber_max = $pagenumber+$pagesize;
							}
							$pageabsolute = ceil($num/$pagesize);
							
                            $sql = "SELECT * FROM treatment INNER JOIN treatmentcategory ON treatment.TreatmentCategoryID=treatmentcategory.TreatmentCategoryID limit $pagenumber, $pagesize";
                            $mydata = mysql_query($sql, $con);
							
							echo "<table>
								<tr>
									<th>TreatmentID</th>
									<th>TreatmentName</th> 
									<th>TreatmentCategory</th>
									<th>Price($)</th>
								</tr>";
                            while($record = mysql_fetch_array($mydata)){
                                echo "<tr>";
                                echo "<td>" . $record['TreatmentID'] . "</td>";
                                echo "<td>" . $record['TreatmentName'] . "</td>";
                                echo "<td>" . $record['TreatmentCategory'] . "</td>";
                                echo "<td>" . $record['Price'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            
                            mysql_close($con);
                            ?>
							
							<div class="move";>
								Showing <strong><?php echo $pagenumber_min?></strong> to <strong><?php echo $pagenumber_max?></strong> of <strong><?php echo $num?></strong> entries</div>
							
							<!--petselect-->
							<aside id="pageselect">
								
								<!--page-menu-->
								<nav class="page-nav">          
								<ul>
									<?php
									if($page == 1){
									echo'<li><a href="treatmentinfo.php?page='.($page).'">Previous</a><li>';
									}
								else{
									echo'<li><a href="treatmentinfo.php?page='.($page-1).'">Previous</a><li>';
								}
								    ?>
									<!--
									<li><a href="Previous">Previous</a></li> -->
									<?php for($i=0;$i<$pageabsolute;$i++){
	                                if($page == ($i+1)){
										echo '<li class="active1"><a href="treatmentinfo.php?page='.($i+1).'class="selected">'.($i+1).'</a></li>';
									}
	                                else{
									    echo '<li><a href="treatmentinfo.php?page='.($i+1).'" >'.($i+1).'</a></li>';
									}
									}?>
									<?php
									if($page == $pageabsolute){
									echo'<li><a href="treatmentinfo.php?page='.($page).'">Next</a><li>';
									}
								else{
									echo'<li><a href="treatmentinfo.php?page='.($page+1).'">Next</a><li>';
								}
								    ?>
								</ul>
								</nav>
							</aside>
					</div>
				</section>
			</div>
	</body>
</html>
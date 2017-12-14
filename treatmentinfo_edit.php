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
			
			<style>
				table {
			        width:700px;
					margin-left: 10px;
					margin-right: 100px;

				}
				table, th, td {
					border: 1px solid Black;
					border-collapse: collapse;
					
					
				}
				th, td {
					padding: 3px;
					text-align: left;
				}
				table tr:nth-child(even) {
					background-color: #eee;
				}
				table tr:nth-child(odd) {
					background-color:#fff;
				}
				table th {
					background-color:turquoise;
					color: white;
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
						<div style="overflow: scroll;" class="main"><br>
							<h2 style="margin-left: 20px; padding:10px;">All services available</h2>

									<a href="treatmentinfo.php?page=1"><input type="button" name="Publish Edit" value="Publish Edit" style="margin-left: 635px; font-size: 15px"></a>
							<br><br>
							
							<?php
                            error_reporting(0);
                            $con = mysql_connect("localhost", "root");
                            if(!$con){
                                die("Can not connect: " . mysql_error());
                            }
                            mysql_select_db("399lovelypets",$con);
							
							$page = $_GET['page'];
                            $pagesize = 12;
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
							
							if(isset($_POST['update'])){
							    $UpdateQuery = "UPDATE treatment SET TreatmentName='$_POST[treatmentName]', TreatmentCategoryID='$_POST[treatmentCategoryID]', Price='$_POST[price]' WHERE TreatmentID='$_POST[hidden]'";
							    mysql_query($UpdateQuery, $con);
							};
							
							if(isset($_POST['delete'])){
							    $DeleteQuery = "DELETE FROM treatment WHERE TreatmentID='$_POST[hidden]'";
							    mysql_query($DeleteQuery, $con);
							};
							
							if(isset($_POST['insert'])){
							    $AddQuery = "INSERT INTO treatment (TreatmentName, TreatmentCategoryID, Price) VALUES ('$_POST[addTreatmentName]', '$_POST[addTreatmentCategoryID]', '$_POST[addPrice]')";
							    mysql_query($AddQuery, $con);
							};

                            $sql = "SELECT * FROM treatment limit $pagenumber, $pagesize";
                            $mydata = mysql_query($sql, $con);
							echo "<table style='margin-left:30px;'>
								<tr>
									<th>TreatmentName</th> 
									<th>TreatmentCategoryID</th>
									<th>Price($)</th>
								</tr>";
                            while($record = mysql_fetch_array($mydata)){
								echo "<form action=treatmentinfo_edit?page=1.php method=post>";
                                echo "<tr>";
                                echo "<td>" . "<input type=text style='width:170px;' name=treatmentName size=20% value='" . $record['TreatmentName'] . "' </td>";
                                echo "<td>" . "<input type=text style='width:160px;' name=treatmentCategoryID size=18% value='" . $record['TreatmentCategoryID'] . "' </td>";
                                echo "<td>" . "<input type=text style='width:160px;' name=price size=8% value='" . $record['Price'] . "' </td>";
								echo "<td><input type=hidden name=hidden size=2% value='" . $record['TreatmentID'] . "'>";
								echo "<td>" . "<input type=submit name=update value=update" . " </td>";
								echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
                                echo "</tr>";
								echo "</form>";
                            }
                            echo "<form method=post>";
                            echo "<tr>";
							
	                        echo "<td>";
	                        echo "<input type='text' name='addTreatmentName' id='addTreatmentName' class='addTreatmentName'>";
	                        echo "</td>";
							
							echo "<td>";
							echo "<input type='text' name='addTreatmentCategoryID' id='addTreatmentCategoryID' class='addTreatmentCategoryID'>";
	                        echo "</td>";
							
                            echo "<td>";
	                        echo "<input type='text' name='addPrice' id='addPrice' class='addPrice'>";
	                        echo "</td>";
							
	                        echo "<td>";
							echo "<input type='submit' name='insert' value='add' id='insert' class='insert'>";
						    echo "</td>";
                            echo "</form>";

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
									echo'<li><a href="treatmentinfo_edit.php?page='.($page).'">Previous</a><li>';
									}
								else{
									echo'<li><a href="treatmentinfo_edit.php?page='.($page-1).'">Previous</a><li>';
								}
								    ?>
									<!--
									<li><a href="Previous">Previous</a></li> -->
									<?php for($i=0;$i<$pageabsolute;$i++){
	                                if($page == ($i+1)){
										echo '<li class="active1"><a href="treatmentinfo_edit.php?page='.($i+1).'class="selected">'.($i+1).'</a></li>';
									}
	                                else{
									    echo '<li><a href="treatmentinfo_edit.php?page='.($i+1).'" >'.($i+1).'</a></li>';
									}
									}?>
									<?php
									if($page == $pageabsolute){
									echo'<li><a href="treatmentinfo_edit.php?page='.($page).'">Next</a><li>';
									}
								else{
									echo'<li><a href="treatmentinfo_edit.php?page='.($page+1).'">Next</a><li>';
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
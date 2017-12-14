<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
 	}
  
mysql_select_db("399lovelypets", $con);
$keyword=$_POST["keyword"];  
 if($keyword=='')
 {
	 echo"<script>alert('Please enter some keyword First');window.location='../appointmentinfo.html';</script>"; 
 };
//echo $keyword;

?>
<!doctype html>
<head>
		<meta charset="utf-8" />
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title>Appointment search result</title>
		
		<!-- Mobile viewport optimized: h5bp.com/viewport -->
		<meta name="viewport" content="width=device-width" />
		
		
		<!-- Style Sheet-->
		<link href='http://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" type="text/css" href="../css/search.css" />	
		<script src='../fullcalendar/lib/jquery.min.js'></script>		
<script>$(document).ready(function() 
{		
$("#backbtn").click(function(){
				window.location="../appointmentinfo.html";
	});
})
</script>
</head>
<body>				
	
	<div class="container">
	
		<!--SIDEBAR-->
		<aside id="sidebar">
		
			<!--logo-->
			<a href="#" class="logo"><img src="../pic/logo2.png" alt="logo" /></a>
			
			<!--main-menu-->
			<nav class="main-nav">
				<ul style="lin">
							<li><a href="../homepage.html">Homepage</a></li>
							<li><a href="../clinicinfohomepage.php">Clinic Info</a></li>
							<li><a href="../petview.php?page=1">Pet Info</a></li>
							<li><a href="../petowner.php">Petowner Info</a></li>
							<li class="active"><a href="../appointmentinfo.html">Appointment Info</a></li>
							<li><a href="../treatmentinfo.php">Treatment Info</a></li>
							<li><a href="../treatmentrecord.php">Treatment Record</a></li>
							<li><a href="../staffinfo.php">Staff Info</a></li>
							<li><a href="../transactioninfo.php">Transaction Info</a></li>
				</ul>
			</nav>
		</aside>
		<!--CONTENT-->
		<section id="content">
			
				<!--header-->
				<header>
				
						
						<h1>Search result</h1>
						<button id="backbtn">back</button>
				</header>
				<!--main-->
				<div id="main">
				<?php
				echo "<h1>Here is the search result for '$keyword'</h1>";
				//首先判断是不是Customer Number的信息
				$customersql="select * from Appointment where CustomerID='$keyword'";
				//$abc="123";
				$customerquery = mysql_query($customersql,$con); 
				$rows=mysql_fetch_array($customerquery);
				if($rows)
				{
					echo "<table><th>AppointmentID</th><th>Starttime</th><th>Endtime</th><th>Date</th><th>CustomerID</th><th>ClinicID</th><th>DoctorID</th><th>Description</th><th>Pet ID</th><tr>";
					for($i=0;$i<count($rows)/2;$i++)
					{
						echo "<td>".$rows[$i]."</td>";
					}
					echo "</tr>";
					while($rows=mysql_fetch_array($customerquery))
					{
						echo "<tr>";
						for($i=0;$i<count($rows)/2;$i++)
						{
							echo "<td>".$rows[$i]."</td>";
						}
						echo "</tr>";
					}; 
					echo "</table>";
				}
				else
				{
					//echo "No result is found";
					$customerIDflag=1;
				};
				//再判断是不是Customer Name的信息
				$customerNamesql="select * from petowner where PetOwnerName like '%$keyword%'"; 
				$customerNamequery = mysql_query($customerNamesql,$con); 
				$rows=mysql_fetch_array($customerNamequery);
				if($rows)
				{
					$customerID=$rows[0];
					$customerName=$rows[1];
					$customerIDsql="select * from Appointment where CustomerID='$customerID'"; 
					$customerIDquery = mysql_query($customerIDsql,$con); 
					$NamewithID=mysql_fetch_array($customerIDquery);
					$Hastable=0;
					if($NamewithID)
					{
						if($customerName == $keyword)
						{
							echo "<p>the '$keyword' you are looking for could be a Petowner name <p>";
						}
						else
						{
							echo "<p>Do you mean a Petowner called '$customerName'?";
						}
						echo "<table><th>PetownerName</th><th>AppointmentID</th><th>Starttime</th><th>Endtime</th><th>Date</th><th>CustomerID</th><th>ClinicID</th><th>DoctorID</th><th>Description</th><th>PetID</th><tr>";
						echo "<td>".$rows[1]."</td>";
						for($i=0;$i<count($NamewithID)/2;$i++)
						{
							echo "<td>".$NamewithID[$i]."</td>";
						}
						echo "</tr>";
						while($NamewithID=mysql_fetch_array($customerIDquery))
						{
							echo "<tr><td>".$rows[1]."</td>";
							for($i=0;$i<count($NamewithID)/2;$i++)
							{
								echo "<td>".$NamewithID[$i]."</td>";
							}
							echo "</tr>";
						}; 
						$Hastable=1;
					}
					while($rows=mysql_fetch_array($customerNamequery))
					{
						$customerID=$rows[0];
						$customerName=$rows[1];
						$customerIDsql="select * from Appointment where CustomerID='$customerID'"; 
						$customerIDquery = mysql_query($customerIDsql,$con); 
						$NamewithID=mysql_fetch_array($customerIDquery);
						if($NamewithID && $Hastable==0)
						{
							
							if($customerName == $keyword)
							{
								echo "<p>the '$keyword' you are looking for could be a Petowner name <p>";
							}
							else
							{
								echo "<p>Do you mean a Petowner called '$customerName'?";
							}
							echo "<table><th>CustomerName</th><th>AppointmentID</th><th>Starttime</th><th>Endtime</th><th>Date</th><th>CustomerID</th><th>ClinicID</th><th>DoctorID</th><th>Description</th><th>PetID</th><tr>";
							echo "<td>".$rows[1]."</td>";
							for($i=0;$i<count($NamewithID)/2;$i++)
							{
								echo "<td>".$NamewithID[$i]."</td>";
							}
							echo "</tr>";
							while($NamewithID=mysql_fetch_array($customerIDquery))
							{
								echo "<tr><td>".$rows[1]."</td>";
								for($i=0;$i<count($NamewithID)/2;$i++)
								{
									echo "<td>".$NamewithID[$i]."</td>";
								}
								echo "</tr>";
							}; 
							$Hastable=1;
						}
						else if($NamewithID && $Hastable==1)
						{
							echo "<tr>";
							echo "<td>".$rows[1]."</td>";
							for($i=0;$i<count($NamewithID)/2;$i++)
							{
								echo "<td>".$NamewithID[$i]."</td>";
							}
							echo "</tr>";
							while($NamewithID=mysql_fetch_array($customerIDquery))
							{
								echo "<tr><td>".$rows[1]."</td>";
								for($i=0;$i<count($NamewithID)/2;$i++)
								{
									echo "<td>".$NamewithID[$i]."</td>";
								}
								echo "</tr>";
							}; 
						}
					}
					if($Hastable==1)
					{
						echo "</table>";
					}
					else
					{
						if($customerName == $keyword)
							{
								echo "<p>We do have Petowner called ".$keyword." but he has no appointmentinfo.</p>";
							}
					}
					
				}
				else
				{
					//echo "No result is found";
					$customerNameflag=1;
				};
				//在判断是不是Clinic ID的信息
				$ClinicIDsql="select * from Appointment where ClinicID='$keyword'"; 
				$ClinicIDquery = mysql_query($ClinicIDsql,$con); 
				$rows=mysql_fetch_array($ClinicIDquery);
				if($rows)
				{
					echo "<table><th>AppointmentID</th><th>Starttime</th><th>Endtime</th><th>Date</th><th>CustomerID</th><th>ClinicID</th><th>DoctorID</th><th>Description</th><th>PetID</th><tr>";
					for($i=0;$i<count($rows)/2;$i++)
					{
						echo "<td>".$rows[$i]."</td>";
					}
					echo "</tr>";
					while($rows=mysql_fetch_array($ClinicIDquery))
					{
						echo "<tr>";
						for($i=0;$i<count($rows)/2;$i++)
						{
							echo "<td>".$rows[$i]."</td>";
						}
						echo "</tr>";
					}; 
					echo "</table>";
				}
				else
				{
					//echo "No result is found";
					$clinicIDflag=1;
				};
				//在判断是不是Clinic Name的信息
				$ClinicNamesql="select * from clinic where ClinicName like '%$keyword%'"; 
				$ClinicNamequery = mysql_query($ClinicNamesql,$con); 
				$rows=mysql_fetch_array($ClinicNamequery);
				if($rows)
				{
					$ClinicID=$rows[0];
					$ClinicName=$rows[1];
					$ClinicIDsql="select * from Appointment where ClinicID='$ClinicID'"; 
					$ClinicIDquery = mysql_query($ClinicIDsql,$con); 
					$NamewithID=mysql_fetch_array($ClinicIDquery);
					$Hastable=0;
					if($NamewithID)
					{
						
						if($ClinicName == $keyword)
						{
							echo "<p>the '$keyword' you are looking for could be a Clinic name <p>";
						}
						else
						{
							echo "<p>Do you mean a clinic called '$ClinicName'?";
						}
						echo "<table><th>ClinicName</th><th>AppointmentID</th><th>Starttime</th><th>Endtime</th><th>Date</th><th>CustomerID</th><th>ClinicID</th><th>DoctorID</th><th>Description</th><th>PetID</th><tr>";
						echo "<td>".$rows[1]."</td>";
						for($i=0;$i<count($NamewithID)/2;$i++)
						{
							echo "<td>".$NamewithID[$i]."</td>";
						}
						echo "</tr>";
						while($NamewithID=mysql_fetch_array($ClinicIDquery))
						{
							echo "<tr><td>".$rows[1]."</td>";
							for($i=0;$i<count($NamewithID)/2;$i++)
							{
								echo "<td>".$NamewithID[$i]."</td>";
							}
							echo "</tr>";
						}; 
						$Hastable=1;
					}
					while($rows=mysql_fetch_array($ClinicNamequery))
					{
						$ClinicID=$rows[0];
						$ClinicName=$rows[1];
						$ClinicIDsql="select * from Appointment where ClinicID='$ClinicID'"; 
						$ClinicIDquery = mysql_query($ClinicIDsql,$con); 
						$NamewithID=mysql_fetch_array($ClinicIDquery);
						if($NamewithID && $Hastable==0)
						{
							
							if($ClinicName == $keyword)
							{
								echo "<p>the '$keyword' you are looking for could be a Clinic name <p>";
							}
							else
							{
								echo "<p>Do you mean a clinic called '$ClinicName'?";
							}
							echo "<table><th>ClinicName</th><th>AppointmentID</th><th>Starttime</th><th>Endtime</th><th>Date</th><th>CustomerID</th><th>ClinicID</th><th>DoctorID</th><th>Description</th><th>PetID</th><tr>";
							echo "<td>".$rows[1]."</td>";
							for($i=0;$i<count($NamewithID)/2;$i++)
							{
								echo "<td>".$NamewithID[$i]."</td>";
							}
							echo "</tr>";
							while($NamewithID=mysql_fetch_array($ClinicIDquery))
							{
								echo "<tr><td>".$rows[1]."</td>";
								for($i=0;$i<count($NamewithID)/2;$i++)
								{
									echo "<td>".$NamewithID[$i]."</td>";
								}
								echo "</tr>";
							}; 
							$Hastable=1;
						}
						else if($NamewithID && $Hastable==1)
						{
							echo "<tr>";
							echo "<td>".$rows[1]."</td>";
							for($i=0;$i<count($NamewithID)/2;$i++)
							{
								echo "<td>".$NamewithID[$i]."</td>";
							}
							echo "</tr>";
							while($NamewithID=mysql_fetch_array($ClinicIDquery))
							{
								echo "<tr><td>".$rows[1]."</td>";
								for($i=0;$i<count($NamewithID)/2;$i++)
								{
									echo "<td>".$NamewithID[$i]."</td>";
								}
								echo "</tr>";
							}; 
						}
					}
					if($Hastable==1)
					{
						echo "</table>";
					}
					else
					{
						if($ClinicName == $keyword)
						{
							echo "<p>We do have clinic called ".$keyword." but he has no related appointmentinfo.</p>";
						}
					}
					
				}
				else
				{
					//echo "No result is found";
					$clinicnameflag=1;
				};
				//再判断是不是DoctorID
				$DoctorIDsql="select * from Appointment where DoctorID='$keyword'"; 
				$DoctorIDquery = mysql_query($DoctorIDsql,$con); 
				$rows=mysql_fetch_array($DoctorIDquery);
				if($rows)
				{
					echo "<table><th>AppointmentID</th><th>Starttime</th><th>Endtime</th><th>Date</th><th>CustomerID</th><th>ClinicID</th><th>DoctorID</th><th>Description</th><th>PetID</th><tr>";
					for($i=0;$i<count($rows)/2;$i++)
					{
						echo "<td>".$rows[$i]."</td>";
					}
					echo "</tr>";
					while($rows=mysql_fetch_array($DoctorIDquery))
					{
						echo "<tr>";
						for($i=0;$i<count($rows)/2;$i++)
						{
							echo "<td>".$rows[$i]."</td>";
						}
						echo "</tr>";
					}; 
					echo "</table>";
				}
				else
				{
					//echo "No result is found";
					$DoctorIDflag=1;
				};
				//再判断是不是doctorName
				$doctorNamesql="select * from staff where StaffName like '%$keyword%'"; 
				$doctorNamequery = mysql_query($doctorNamesql,$con); 
				$rows=mysql_fetch_array($doctorNamequery);
				if($rows)
				{
					$doctorID=$rows[0];
					$doctorName=$rows[2];
					$doctorIDsql="select * from Appointment where DoctorID='$doctorID'"; 
					$doctorIDquery = mysql_query($doctorIDsql,$con); 
					$NamewithID=mysql_fetch_array($doctorIDquery);
					$Hastable=0;
					if($NamewithID)
					{
						if($doctorName == $keyword)
							{
								echo "<p>the '$keyword' you are looking for could be a doctor name <p>";
							}
						else
							{
								echo "<p>Do you mean a doctor called '$doctorName'?";
							}
						echo "<table><th>DoctorName</th><th>AppointmentID</th><th>Starttime</th><th>Endtime</th><th>Date</th><th>CustomerID</th><th>ClinicID</th><th>DoctorID</th><th>Description</th><th>PetID</th><tr>";
						echo "<td>".$rows[2]."</td>";
						for($i=0;$i<count($NamewithID)/2;$i++)
						{
							echo "<td>".$NamewithID[$i]."</td>";
						}
						echo "</tr>";
						while($NamewithID=mysql_fetch_array($doctorIDquery))
						{
							echo "<tr><td>".$rows[2]."</td>";
							for($i=0;$i<count($NamewithID)/2;$i++)
							{
								echo "<td>".$NamewithID[$i]."</td>";
							}
							echo "</tr>";
						}; 
						$Hastable=1;
					}
					while($rows=mysql_fetch_array($doctorNamequery))
					{
						$doctorID=$rows[0];
						$doctorName=$rows[2];
						$doctorIDsql="select * from Appointment where DoctorID='$doctorID'"; 
						$doctorIDquery = mysql_query($doctorIDsql,$con); 
						$NamewithID=mysql_fetch_array($doctorIDquery);
						if($NamewithID && $Hastable==0)
						{
							if($doctorName == $keyword)
							{
								echo "<p>the '$keyword' you are looking for could be a doctor name <p>";
							}
							else
							{
								echo "<p>Do you mean a doctor called '$doctorName'?";
							}
							echo "<table><th>DoctorName</th><th>AppointmentID</th><th>Starttime</th><th>Endtime</th><th>Date</th><th>CustomerID</th><th>ClinicID</th><th>DoctorID</th><th>Description</th><th>PetID</th><tr>";
							echo "<td>".$rows[2]."</td>";
							for($i=0;$i<count($NamewithID)/2;$i++)
							{
								echo "<td>".$NamewithID[$i]."</td>";
							}
							echo "</tr>";
							while($NamewithID=mysql_fetch_array($doctorIDquery))
							{
								echo "<tr><td>".$rows[2]."</td>";
								for($i=0;$i<count($NamewithID)/2;$i++)
								{
									echo "<td>".$NamewithID[$i]."</td>";
								}
								echo "</tr>";
							}; 
							$Hastable=1;
						}
						else if($NamewithID && $Hastable==1)
						{
							echo "<tr>";
							echo "<td>".$rows[2]."</td>";
							for($i=0;$i<count($NamewithID)/2;$i++)
							{
								echo "<td>".$NamewithID[$i]."</td>";
							}
							echo "</tr>";
							while($NamewithID=mysql_fetch_array($doctorIDquery))
							{
								echo "<tr><td>".$rows[2]."</td>";
								for($i=0;$i<count($NamewithID)/2;$i++)
								{
									echo "<td>".$NamewithID[$i]."</td>";
								}
								echo "</tr>";
							}; 
						}
					}
					if($Hastable==1)
					{
						echo "</table>";
					}
					else
					{
						if($doctorName == $keyword)
						{
							echo "<p>We do have Doctor called ".$keyword." but he has no related appointmentinfo.</p>";
						}
					}
					
				}
				else
				{
					//echo "No result is found";
					$doctornameflag=1;
				};
				//在判断是不是appointmentID
				$appointmentIDsql="select * from Appointment where AppointmentID='$keyword'"; 
				$appointmentIDquery = mysql_query($appointmentIDsql,$con); 
				$rows=mysql_fetch_array($appointmentIDquery);
				if($rows)
				{
					echo "<table><th>AppointmentID</th><th>Starttime</th><th>Endtime</th><th>Date</th><th>CustomerID</th><th>ClinicID</th><th>DoctorID</th><th>Description</th><th>PetID</th><tr>";
					for($i=0;$i<count($rows)/2;$i++)
					{
						echo "<td>".$rows[$i]."</td>";
					}
					echo "</tr>";
					while($rows=mysql_fetch_array($appointmentIDquery))
					{
						echo "<tr>";
						for($i=0;$i<count($rows)/2;$i++)
						{
							echo "<td>".$rows[$i]."</td>";
						}
						echo "</tr>";
					}; 
					echo "</table>";
				}
				else
				{
					//echo "No result is found";
					$appointmentIDflag=1;
				};
				//在判断是不是PetID
				$PetIDsql="select * from Appointment where PetID='$keyword'"; 
				$PetIDquery = mysql_query($PetIDsql,$con); 
				$rows=mysql_fetch_array($PetIDquery);
				if($rows)
				{
					echo "<table><th>AppointmentID</th><th>Starttime</th><th>Endtime</th><th>Date</th><th>CustomerID</th><th>ClinicID</th><th>DoctorID</th><th>Description</th><th>PetID</th><tr>";
					for($i=0;$i<count($rows)/2;$i++)
					{
						echo "<td>".$rows[$i]."</td>";
					}
					echo "</tr>";
					while($rows=mysql_fetch_array($PetIDquery))
					{
						echo "<tr>";
						for($i=0;$i<count($rows)/2;$i++)
						{
							echo "<td>".$rows[$i]."</td>";
						}
						echo "</tr>";
					}; 
					echo "</table>";
				}
				else
				{
					//echo "No result is found";
					$PetIDflag=1;
				};
				//再判断是不是Pet Name的信息
				$PetNamesql="select * from pet where PetName like '%$keyword%'"; 
				$PetNamequery = mysql_query($PetNamesql,$con); 
				$rows=mysql_fetch_array($PetNamequery);
				if($rows)
				{
					$PetID=$rows[0];
					$PetName=$rows[1];
					$PetIDsql="select * from Appointment where PetID='$PetID'"; 
					$PetIDquery = mysql_query($PetIDsql,$con); 
					$NamewithID=mysql_fetch_array($PetIDquery);
					$Hastable=0;
					if($NamewithID)
					{
						if($PetName == $keyword)
							{
								echo "<p>the '$keyword' you are looking for could be a Pet name <p>";
							}
						else
							{
								echo "<p>Do you mean a Pet called '$PetName'?";
							}
						echo "<table><th>PetName</th><th>AppointmentID</th><th>Starttime</th><th>Endtime</th><th>Date</th><th>CustomerID</th><th>ClinicID</th><th>DoctorID</th><th>Description</th><th>PetID</th><tr>";
						echo "<td>".$rows[1]."</td>";
						for($i=0;$i<count($NamewithID)/2;$i++)
						{
							echo "<td>".$NamewithID[$i]."</td>";
						}
						echo "</tr>";
						while($NamewithID=mysql_fetch_array($PetIDquery))
						{
							echo "<tr><td>".$rows[1]."</td>";
							for($i=0;$i<count($NamewithID)/2;$i++)
							{
								echo "<td>".$NamewithID[$i]."</td>";
							}
							echo "</tr>";
						}; 
						$Hastable=1;
					}
					while($rows=mysql_fetch_array($PetNamequery))
					{
						$PetID=$rows[0];
						$PetName=$rows[1];
						$PetIDsql="select * from Appointment where PetID='$PetID'"; 
						$PetIDquery = mysql_query($PetIDsql,$con); 
						$NamewithID=mysql_fetch_array($PetIDquery);
						if($NamewithID && $Hastable==0)
						{
							if($PetName == $keyword)
							{
								echo "<p>the '$keyword' you are looking for could be a Pet name <p>";
							}
							else
							{
								echo "<p>Do you mean a Pet called '$PetName'?";
							}
							echo "<table><th>PetName</th><th>AppointmentID</th><th>Starttime</th><th>Endtime</th><th>Date</th><th>CustomerID</th><th>ClinicID</th><th>DoctorID</th><th>Description</th><th>PetID</th><tr>";
							echo "<td>".$rows[1]."</td>";
							for($i=0;$i<count($NamewithID)/2;$i++)
							{
								echo "<td>".$NamewithID[$i]."</td>";
							}
							echo "</tr>";
							while($NamewithID=mysql_fetch_array($PetIDquery))
							{
								echo "<tr><td>".$rows[1]."</td>";
								for($i=0;$i<count($NamewithID)/2;$i++)
								{
									echo "<td>".$NamewithID[$i]."</td>";
								}
								echo "</tr>";
							}; 
							$Hastable=1;
						}
						else if($NamewithID && $Hastable==1)
						{
							echo "<tr>";
							echo "<td>".$rows[1]."</td>";
							for($i=0;$i<count($NamewithID)/2;$i++)
							{
								echo "<td>".$NamewithID[$i]."</td>";
							}
							echo "</tr>";
							while($NamewithID=mysql_fetch_array($PetIDquery))
							{
								echo "<tr><td>".$rows[1]."</td>";
								for($i=0;$i<count($NamewithID)/2;$i++)
								{
									echo "<td>".$NamewithID[$i]."</td>";
								}
								echo "</tr>";
							}; 
						}
					}
					if($Hastable==1)
					{
						echo "</table>";
					}
					else
					{
						if($PetName == $keyword)
						{
							echo "<p>We do have Pet called ".$keyword." but it has no related appointmentinfo.</p>";
						}
					}
					
				}
				else
				{
					//echo "No result is found";
					$PetNameflag=1;
				};
				
				//如果都不是的话我们应该返还些什么
				if($customerIDflag==1&&$customerNameflag==1&& $clinicIDflag==1&& $DoctorIDflag==1 && $doctornameflag==1 && $appointmentIDflag==1 && $clinicnameflag==1&& $PetIDflag==1 && $PetNameflag==1)
				{
					echo "<p style='color:red;font-size:30px;'>No result is found!</p>";
				}
				

				//echo 123;
				
				?>
				</div>
			
		</section>
	
	</div>
					

</body>
</html>
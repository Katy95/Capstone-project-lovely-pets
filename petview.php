
<!DOCTYPE html>
<html>
    
    <head> 
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Pet Information View Pgae</title>

        <!-- Mobile viewport optimized: h5bp.com/viewport -->
        <meta name="viewport" content="width=device-width" />
        
        <!-- Style Sheet-->
        <link href='http://fonts.googleapis.com/css family=Dosis:200,300,400,500,600,700,800' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" type="text/css" href="css/petInfo_viewpage.css"> 
		<link rel="stylesheet" type="text/css" href="css/try2.css"> 
		<link rel="stylesheet" type="text/css" href="css/transactioninfo.css" />	
		<script src="js/selected.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script> 
		
		<script>
            $(document).ready(function()
			{
                $(".delete1").click(function()
				{       
                    $(".city2").hide();
					$(".city88").hide();
					$(".transaction").hide();
                    $(".city11").show();   
                })
				
				$(".invoice").click(function()
				{       
                    $(".city2").hide();
                    $(".city11").hide();  
					$(".city88").hide();
					$(".transaction").show(); 
                })
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
                if(UserAuthority=="doctor")
	           {
		          $("#addbt").hide();
	           }
                else
                {
                    $("#addbt").show();
                };
				
		    }) 
        </script>
	
		
		<style>
            table {
				border-collapse: collapse;
				width: 98%;
				background-color: white;
			    margin-left:10px;}
			
			th, td {
				padding: 8px;
				text-align: left;
				border-bottom: 1px solid #ddd;}
			
			tr:hover {
				background-color: #f2f2f2;
				color: black;}
			
			a:link{
				color: black;
				background-color: transparent;
				text-decoration: none;
			}
			
			a:hover {
				color: blue;
				background-color: transparent;
				text-decoration: underline;
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
                    <h1 style="float:left; width:480px;">Pet Information View Page</h1>
                </header>
            
                <!--main-->
                <div style="overflow: scroll;" class="main">

                    <div class="city2">
	                    <!--petselect-->
					    <aside id="petview">
						    <!--left-menu-->
						    <nav class="left-nav">
						        <ul>
						    	    <li class="active2" style="margin-left:30%;"><a href="#all"><h3>Quick View</h3></a></li>
							        <li><a><h3>Detail Information</h3></a></li>
						        </ul>
                                <hr style="width:94%" margin-left=50px;> 
						    </nav>
						</aside>
                        <h2 style="margin-left: 30px;">View of all pets' information</h2><br>
						
						
					    <div class="calculate">
	
                            <div class="changebutton">
	                            <a href="petinfo.php"><button id="addbt" class="button" name="add1" value="add">Add a record</button></a>
                            </div>
	                     </div>

	                     <?php
                            error_reporting(0);
							$con = mysql_connect("localhost", "root");
                            if (!$con)
							{
                                die("" . mysql_error());
                            }
                            mysql_select_db("399lovelypets", $con);
						
							$page = $_GET['page'];
	                        $species = $_GET['species'];
	                        
                            $pagesize = 5;
							$pagenumber = ($page - 1)*$pagesize;

							$num = mysql_num_rows(mysql_query("SELECT * FROM pet"));
							$pagenumber_min = ($page - 1)*$pagesize+1;
							if(($num-($page - 1)*$pagesize)<$pagesize){
								$pagenumber_max = $num;
							}
							else{
								$pagenumber_max = $pagenumber+$pagesize;
							}
							$pageabsolute = ceil($num/$pagesize);
							
                            $sql = "SELECT * FROM pet INNER JOIN petowner ON pet.PetOwnerID = petowner.PetOwnerID INNER JOIN clinic ON pet.ClinicID = clinic.ClinicID limit $pagenumber, $pagesize";
								
                            $mydata = mysql_query($sql, $con);

							echo "<table>
	                          <tr>
                                  <th><strong>ID</strong></th>
								  <th><strong>Name</strong></th>
								  <th><strong>Gender</strong></th>
								  <th><strong>Age</strong></th> 
								  <th><strong>Species</strong></th>
								  <th><strong>Owner</strong></th>
								  <th><strong>Clinic</strong></th>
							  </tr>";

                    		while($record = mysql_fetch_array($mydata)){
								echo "<tr>";
                                echo "<td>" . $record['PetID'] . "</td>";
                                echo "<td>" . $record['PetName'] . "</td>";
								echo "<td>" . $record['PetGender'] . "</td>";
								echo "<td>" . $record['PetAge'] . "</td>";
                                echo "<td>" . $record['PetSpecies'] . "</td>";
								echo "<td>" . $record['PetOwnerName'] . "</td>";
								echo "<td>" . $record['ClinicName'] . "</td>";
								echo "<td><button type='button' name='settle' class='delete1' onclick='showUser(this.value)' value=" . $record['PetID'] . ">View Detailed</button></td>";
								echo "<td><button type='button' name='invoice' class='invoice' onclick='transactionUser(this.value)' value=" . $record['PetID'] . ">Invoice Page</button></td>";
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
									        if($page == 1)
										    {
									            echo'<li><a href="petview.php?page='.($page).'">Previous</a><li>';
									        }
								            else
										    {
									            echo'<li><a href="petview?page='.($page-1).'">Previous</a><li>';
								            }
								        ?>

									    <?php for($i=0;$i<$pageabsolute;$i++)
                                        {
	                                        if($page == ($i+1))
											{
										        echo '<li class="active1"><a href="petview.php?page='.($i+1).'" class="selected">'.($i+1).'</a></li>';
									        }
	                                        else
										    {
									            echo '<li><a href="petview?page='.($i+1).'" >'.($i+1).'</a></li>';
									        }
									    }
										?>
									    <?php
									        if($page == $pageabsolute)
											{
									            echo'<li><a href="petview.php?page='.($page).'">Next</a><li>';
									        }
								            else
											{
									            echo'<li><a href="petview.php?page='.($page+1).'">Next</a><li>';
							             	}
								        ?>
								    </ul>
								</nav>
							</aside>
		                </div>
					
					<div class="city11" style="display:none;">
	                    <!--petselect-->
					    <aside id="petview">
						
						    <!--left-menu-->
						    <nav class="left-nav">
						        <ul>
							        <li style="margin-left:30%;"><a href="petview.php?page=1"><h3>Quick View</h3></a></li>
							        <li class="active2"><a href="#cat"><h3>Detail Information</h3></a></li>
						        </ul>
                                <hr style="width:94%" margin-left=50px;> 
						    </nav>
						</aside>
							
                        <h2 style="margin-left: 30px;">Detailed Information</h2><br><br>
			
						<?php
				            echo "<div id='txtHint'><b>User info will be listed here.</b></div>"; 

                            
                        ?>
		            </div>
					
					
					
<div class="transaction" style="display:none;">
							<?php
				            echo "<div id='transactionHint'><b>Transaction info will be show here.</b></div>"; 

                            
                        ?>
</div>

					
				</div>
			</section>
	    </div>
		
		
	</body>
</html>
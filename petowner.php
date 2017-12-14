<!doctype html>
		<head>
				<meta charset="utf-8" />
				
				<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				
				<title>Petowner Information</title>
				
				<!-- Mobile viewport optimized: h5bp.com/viewport -->
				<meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#accordion" ).accordion({
      active: false,
      collapsible: true,
      heightStyle: "content",
        
    });
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
		$(".edit2").hide();
	}
    else
    {
        $(".edit2").show();
    }
  
  });
  </script>
				
				<!-- Style Sheet-->
				<link href="http://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet" type="text/css" />
				<link rel="stylesheet" type="text/css" href="css/petowner.css" />		
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
							<li class="active"><a href="petowner.php">Petowner Info</a></li>
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
								<h1>Petowner Information</h1>
						</header>
						<!--main-->
						<div class="main">
                        <?php
                            error_reporting(0);
                            $con = mysql_connect('localhost', 'root'); 
		                    //these are the aforementioned vars
		                    $db = mysql_select_db('399lovelypets');
		                    //if($con){
	                   		//echo 'Successfully connected to the database';
                    		//}
	                       	//else{
	                        //	die('Error.');
                            //}
		                 ?>  
                     <div id="accordion">           
                     <?php
                        $query = mysql_query("SELECT * FROM petowner");
                           while($row = mysql_fetch_array($query)){
                               $id = $row['PetOwnerID'];
                               $name = $row['PetOwnerName'];
                               $title = $row['PetOwnerGender'];
                               $num = $row['PetOwnerPhoneNumber'];
                               $email= $row['PetOwnerEmailAddress'];
                               $address = $row['PetOwnerHomeAddress'];
                ?>
                
                <h3><?php echo  $title . "&nbsp" . $name;?><br><span>Moble:</span><?php echo $num;?><br><span>Address:</span><?php echo $address;?>
    			<br><span>Email: </span><?php echo $email;?></h3>
                <div class="contain">
                <form action="petownerinfo_edit.php" method="POST">
                <input type='submit' style='float:right; background:url(pic/edit.png); width:20px; height:20px; border:none; text-indent:-9999px; cursor:pointer;' class='edit2' name='dosubmit' value='<?php echo $row['PetOwnerID'];?>' />
                </form>
                <p><strong><u><a href="petview.php?page=1">Pets Information</a></u></strong><br>
                <?php $query2 = mysql_query("SELECT * FROM pet WHERE PetOwnerID = '$id'");
                               while ($row = mysql_fetch_array($query2)){
                                   $pname = $row['PetName'];
                                   $pspecies = $row['PetSpecies'];
                                   $pgender = $row['PetGender'];
                                   $pclinic = $row['ClinicID'];
                                   $pdescription = $row['PetDescription'];
                                   $page = $row['PetAge'];
                                   $pen = $row['PenID'];
                                   $petc = $row['PetCondition'];
                                   ?>
                    
    				<span>Name:</span> <?php echo $pname;?><br>
    				<span>Species:</span> <?php echo $pspecies;?><br>
    				<span>Gender:</span> <?php echo $pgender;?><br>
    				<span>Age:</span> <?php echo $page;?><br>
                    <span>Description:</span> <?php echo $pdescription;?><br>
                    <span>PenID:</span> <?php echo $pen;?><br>
                    <span>Condition:</span> <?php echo $petc;?><br>
                    <br></p>                            
			
                    <?php
                               }
                               ?>
                    </div>
                
				
            <?php
                         }
            ?>
                            </div>
						</div>
					
				</section>
			
			</div>
							

</body>
</html>
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
				<link rel="stylesheet" type="text/css" href="css/staffinfo.css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                <script>
                    $(document).ready(function(){ 
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
		$("#name1").text("Welcome  "+UserName);
	};
    if(UserAuthority!="manager"&&UserAuthority!="owner")
	{
		$(".sidenav").hide();
        $(".edit1").hide();
	}
                        
    $(".doctor").hide();
    $(".manager").hide();
    $(".genstaff").hide();
    $(".docinfo").click(function(){
        $(".staff").hide();
        $(".manager").hide();
        $(".genstaff").hide();
        $(".doctor").show();
    });
    $(".maninfo").click(function(){
        $(".staff").hide();
        $(".doctor").hide();
        $(".genstaff").hide();
        $(".manager").show();
    });
    $(".stainfo").click(function(){
        $(".staff").hide();
        $(".doctor").hide();
        $(".manager").hide();
        $(".genstaff").show();
    });
    $(".allinfo").click(function(){
        $(".staff").show();
        $(".doctor").hide();
        $(".manager").hide();
        $(".genstaff").hide();
    });
                        
                    });
                </script>
		</head>
		<body>				
			
			<div class="container">
			
				<!--SIDEBAR-->
				<aside id="sidebar">
				
					<!--logo-->
                    <p id="name1" style="color:white;font-size:20px;margin-left:40px;margin-top:60px;"></p>
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
<div class="sidenav">
    <input type="button" class="docinfo" style='width:80px; height:30px' value="Doctor">
    <input type="button" class="maninfo" style='width:80px; height:30px' value="Manager">
    <input type="button" class="stainfo" style='width:80px; height:30px' value="Staff">
    <input type="button" class="allinfo" style='width:80px; height:30px' value="All">
    <a style="float:right;margin-bottom:20px;margin-right:80px;" href="staffinfo_add.php"><input type="button" style='width:80px; height:30px' value="Add Staff"></a>
    <hr style="height:5px;border:none;border-top:5px ridge coral;clear:both" />
</div>
<div class="staff">
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

        <?php
			$query = mysql_query("SELECT * FROM staff");
			
			while($row = mysql_fetch_array($query)){
			$id = $row['StaffID'];
			$name = $row['StaffName'];
            $po = $row['StaffPosition'];
            $gender = $row['StaffGender'];
            $date = $row['DateOfBirth'];
            $clinic = $row['WorkingClinicID'];
            $address = $row['StaffAddress'];
            $time = $row['StaffWorkingTime'];
            $num = $row['StaffPhoneNumber'];
            $email = $row['StaffEmail'];
            $hire = $row['HireDate'];
            $url = $row['Photo'];
    echo '<img class="staffimg" src="' . $url . '" width="200" height="200">';
    echo '<table class="staffinfo1" width="550px" height="170">';
	echo '<tr>';
    echo '<td class="dark">ID Number:</td>' . '<td>' . $id . '</td>';
    echo '<td class=dark>Name:</td>' . '<td>' . $name . '</td>';
    echo "<form action='staffinfo_edit.php' method='POST'>";
    echo "<td>
    <input class='edit1' type='submit' style='background:url(pic/edit.png); width:20px; height:20px; border:none; text-indent:-9999px; cursor:pointer;' name='dosubmit' value='".$id."' /></td>";
    echo "</form>";
    echo '</tr>';
    echo '<tr>';
    echo '<td class=dark>Gender:</td>' . '<td>' . $gender . '</td>';
    echo '<td class=dark>D.O.B:</td>' . '<td>' . $date . '</td>';           
    echo '</tr>';
    echo '<tr>';
    echo '<td noWrap class=dark>Mobile:</td>' . '<td>' . $num . '</td>';
    echo '<td class=dark>E-mail:</td>' . '<td>' . $email . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class=dark>Address:</td>' . '<td colspan="4">' . $address . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class=dark >Work location:</td>' . '<td>' . $clinic . '</td>';
    echo '<td class=dark>Hired time:</td>' . '<td>' . $hire . '</td>';
    echo '<td><input style="width:0px" type=hidden name=hidden value=' . $id . ' </td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class=dark>Position:</td>' . '<td>' . $po . '</td>';
    echo '</tr>';
    echo '</table>';
    echo '<hr>';
            }
    ?>
</div>
<div class="doctor">
        <?php
			$query = mysql_query("SELECT * FROM staff WHERE StaffPosition = 'Doctor'");
			
			while($row = mysql_fetch_array($query)){
			$id = $row['StaffID'];
			$name = $row['StaffName'];
            $po = $row['StaffPosition'];
            $gender = $row['StaffGender'];
            $date = $row['DateOfBirth'];
            $clinic = $row['WorkingClinicID'];
            $address = $row['StaffAddress'];
            $time = $row['StaffWorkingTime'];
            $num = $row['StaffPhoneNumber'];
            $email = $row['StaffEmail'];
            $hire = $row['HireDate'];
            $url = $row['Photo'];
    echo '<img class="staffimg" src="' . $url . '" width="200" height="200">';
    echo '<table class="staffinfo1" width="550px" height="170">';
	echo '<tr>';
    echo '<td class="dark">ID Number:</td>' . '<td>' . $id . '</td>';
    echo '<td class=dark>Name:</td>' . '<td>' . $name . '</td>';
    echo "<form action='staffinfo_edit.php' method='POST'>";
    echo "<td>
    <input class='edit1' type='submit' style='background:url(pic/edit.png); width:20px; height:20px; border:none; text-indent:-9999px; cursor:pointer;' name='dosubmit' value='".$id."' /></td>";
    echo "</form>";
    echo '</tr>';
    echo '<tr>';
    echo '<td class=dark>Gender:</td>' . '<td>' . $gender . '</td>';
    echo '<td class=dark>D.O.B:</td>' . '<td>' . $date . '</td>';           
    echo '</tr>';
    echo '<tr>';
    echo '<td noWrap class=dark>Mobile:</td>' . '<td>' . $num . '</td>';
    echo '<td class=dark>E-mail:</td>' . '<td>' . $email . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class=dark>Address:</td>' . '<td colspan="4">' . $address . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class=dark >Work location:</td>' . '<td>' . $clinic . '</td>';
    echo '<td class=dark>Hired time:</td>' . '<td>' . $hire . '</td>';
    echo '<td><input style="width:0px" type=hidden name=hidden value=' . $id . ' </td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class=dark>Position:</td>' . '<td>' . $po . '</td>';
    echo '</tr>';
    echo '</table>';
    echo '<hr>';
            }
    ?>
</div>
<div class="manager">
        <?php
			$query = mysql_query("SELECT * FROM staff WHERE StaffPosition = 'Manager'");
			
			while($row = mysql_fetch_array($query)){
			$id = $row['StaffID'];
			$name = $row['StaffName'];
            $po = $row['StaffPosition'];
            $gender = $row['StaffGender'];
            $date = $row['DateOfBirth'];
            $clinic = $row['WorkingClinicID'];
            $address = $row['StaffAddress'];
            $time = $row['StaffWorkingTime'];
            $num = $row['StaffPhoneNumber'];
            $email = $row['StaffEmail'];
            $hire = $row['HireDate'];
            $url = $row['Photo'];
    echo '<img class="staffimg" src="' . $url . '" width="200" height="200">';
    echo '<table class="staffinfo1" width="550px" height="170">';
	echo '<tr>';
    echo '<td class="dark">ID Number:</td>' . '<td>' . $id . '</td>';
    echo '<td class=dark>Name:</td>' . '<td>' . $name . '</td>';
    echo "<form action='staffinfo_edit.php' method='POST'>";
    echo "<td>
    <input class='edit1' type='submit' style='background:url(pic/edit.png); width:20px; height:20px; border:none; text-indent:-9999px; cursor:pointer;' name='dosubmit' value='".$id."' /></td>";
    echo "</form>";
    echo '</tr>';
    echo '<tr>';
    echo '<td class=dark>Gender:</td>' . '<td>' . $gender . '</td>';
    echo '<td class=dark>D.O.B:</td>' . '<td>' . $date . '</td>';           
    echo '</tr>';
    echo '<tr>';
    echo '<td noWrap class=dark>Mobile:</td>' . '<td>' . $num . '</td>';
    echo '<td class=dark>E-mail:</td>' . '<td>' . $email . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class=dark>Address:</td>' . '<td colspan="4">' . $address . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class=dark >Work location:</td>' . '<td>' . $clinic . '</td>';
    echo '<td class=dark>Hired time:</td>' . '<td>' . $hire . '</td>';
    echo '<td><input style="width:0px" type=hidden name=hidden value=' . $id . ' </td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class=dark>Position:</td>' . '<td>' . $po . '</td>';
    echo '</tr>';
    echo '</table>';
    echo '<hr>';
            }
    ?>
</div>
<div class="genstaff">
        <?php
			$query = mysql_query("SELECT * FROM staff WHERE StaffPosition = 'Staff'");
			
			while($row = mysql_fetch_array($query)){
			$id = $row['StaffID'];
			$name = $row['StaffName'];
            $po = $row['StaffPosition'];
            $gender = $row['StaffGender'];
            $date = $row['DateOfBirth'];
            $clinic = $row['WorkingClinicID'];
            $address = $row['StaffAddress'];
            $time = $row['StaffWorkingTime'];
            $num = $row['StaffPhoneNumber'];
            $email = $row['StaffEmail'];
            $hire = $row['HireDate'];
            $url = $row['Photo'];
    echo '<img class="staffimg" src="' . $url . '" width="200" height="200">';
    echo '<table class="staffinfo1" width="550px" height="170">';
	echo '<tr>';
    echo '<td class="dark">ID Number:</td>' . '<td>' . $id . '</td>';
    echo '<td class=dark>Name:</td>' . '<td>' . $name . '</td>';
    echo "<form action='staffinfo_edit.php' method='POST'>";
    echo "<td>
    <input class='edit1' type='submit' style='background:url(pic/edit.png); width:20px; height:20px; border:none; text-indent:-9999px; cursor:pointer;' name='dosubmit' value='".$id."' /></td>";
    echo "</form>";
    echo '</tr>';
    echo '<tr>';
    echo '<td class=dark>Gender:</td>' . '<td>' . $gender . '</td>';
    echo '<td class=dark>D.O.B:</td>' . '<td>' . $date . '</td>';           
    echo '</tr>';
    echo '<tr>';
    echo '<td noWrap class=dark>Mobile:</td>' . '<td>' . $num . '</td>';
    echo '<td class=dark>E-mail:</td>' . '<td>' . $email . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class=dark>Address:</td>' . '<td colspan="4">' . $address . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class=dark >Work location:</td>' . '<td>' . $clinic . '</td>';
    echo '<td class=dark>Hired time:</td>' . '<td>' . $hire . '</td>';
    echo '<td><input style="width:0px" type=hidden name=hidden value=' . $id . ' </td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class=dark>Position:</td>' . '<td>' . $po . '</td>';
    echo '</tr>';
    echo '</table>';
    echo '<hr>';
            }
    ?>
</div>
</div>
</section>
</div>

</body>
</html>
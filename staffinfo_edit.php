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
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script> 
                <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
                $( function() {
    $( ".datepicker" ).datepicker({
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true
    });
  } );
                </script>
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

<div class="staffinfo">
	<?php
        $staffid = $_POST['dosubmit'];
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

        if(isset($_POST['update'])){
            $UpdateQuery = "UPDATE staff SET StaffID = '$_POST[dosubmit]', StaffName = '$_POST[name]', StaffGender = '$_POST[gender]', DateOfBirth = '$_POST[date]', StaffPhoneNumber = '$_POST[num]', StaffEmail = '$_POST[email]', StaffAddress = '$_POST[address]', WorkingClinicID = '$_POST[clinic]', HireDate = '$_POST[hire]', StaffPosition = '$_POST[po]' WHERE staff.StaffID = '$_POST[hidden]'";
            mysql_query($UpdateQuery, $con);
            SUBMISSION();
            
        };
        if(isset($_POST['delete'])){
            $DeleteQuery = "DELETE FROM staff WHERE StaffID = '$_POST[hidden]'";
            mysql_query($DeleteQuery, $con);
            SUBMISSION();
            }
    function SUBMISSION(){
        echo"<script type=\"text/javascript\">document.location.href='./staffinfo.php';</script>";
    $CON->CLOSE();
    }
?>
    <div class="editpage">
        <h2>Staff Information Edit</h2>
    <?php
        $query = mysql_query("SELECT * FROM staff WHERE StaffID = '$_POST[dosubmit]'");
			
		while($row = mysql_fetch_array($query)){
			$id = $row['StaffID'];
			$name = $row['StaffName'];
            $po = $row['StaffPosition'];
            $gender = $row['StaffGender'];
            $date = $row['DateOfBirth'];
            $clinic = $row['WorkingClinicID'];
            $address = $row['StaffAddress'];
            $num = $row['StaffPhoneNumber'];
            $email = $row['StaffEmail'];
            $hire = $row['HireDate'];
/*            $url = $row['Photo'];*/
/*    echo '<img class="staffimg" src="' . $url . '" width="200" height="200">';*/
    echo '<hr>';
    echo '<table class="staffinfo1" style="margin-top:30px; margin-left:80px" width="550px" height="170">';
    echo '<form action="staffinfo_edit.php" method="post">';
	echo '<tr>';
    echo '<td>ID Number:</td><td><input style="width:80px" type=text name=dosubmit class=round value=' . $id . ' </td>';
    echo '<td>Name:</td><td><input style="width:80px" type=text name=name class=round value=' . $name . ' </td>';
    echo '<td><input type=submit name=update value=Update /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Gender:</td><td><input style="width:80px" type=text name=gender class=round value='. $gender . ' </td>';
    echo '<td>D.O.B:</td><td><input style="width:80px" type=text class="datepicker" name=date value=' . $date . ' </td>';
    echo '<td><input type=submit name=delete value=Delete /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td noWrap>Mobile:</td><td><input style="width:80px" type=text name=num class=round value=' . $num . ' </td>';
    echo '<td>E-mail:</td><td><input style="width:80px" type=text name=email class=round value=' . $email . ' </td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td> Address:</td><td colspan="4"><input style="width:315px" type=text class=round name=address value="' . $address . '" </td>';
    echo '</tr>';   
    echo '<tr>';
    echo '<td>Workplace:</td><td><input style="width:80px" class=round type=text name=clinic value=' . $clinic . ' </td>';
    echo '<td>Hired time:</td><td><input style="width:80px" type=text class=datepicker name=hire class=round value=' . $hire . ' </td>';
    echo '<td><input style="width:0px" type=hidden name=hidden value=' . $id . ' </td>';   
    echo '</tr>';
    echo '<tr>';
    echo '<td>Position:</td><td><select class=round name=po>
                                        <option value="Doctor">Doctor</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Staff">Staff</option>
                                  </select> </td>';
    echo '</tr>';
    echo '</form>';
    echo '</table>';
    echo '<hr>';
        }

    mysql_close($con);
    ?>
        </div>
</div>
</div>
</section>
</div>
							

</body>
</html>
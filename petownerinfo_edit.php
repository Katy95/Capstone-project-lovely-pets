<!doctype html>
		<head>
				<meta charset="utf-8" />
				
				<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				
				<title>Staff Information</title>
				
				<meta name="viewport" content="width=device-width" />
				
				<link href="http://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet" type="text/css" />
				<link rel="stylesheet" type="text/css" href="css/petownerinfo_edit.css" />		
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
								<h1>Staff Information</h1>
						</header>
						
						<!--main-->
						<div class="page">

<div class="staffinfo">
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

        if(isset($_POST['update'])){
            $UpdateQuery = "UPDATE petowner SET PetOwnerID = '$_POST[dosubmit]', PetOwnerName = '$_POST[name]',  PetOwnerPhoneNumber = '$_POST[num]', PetOwnerEmailAddress = '$_POST[email]', PetOwnerHomeAddress = '$_POST[address]' WHERE petowner.PetOwnerID = '$_POST[hidden]'";
            mysql_query($UpdateQuery, $con);
            SUBMISSION();
            
        };
        if(isset($_POST['delete'])){
            $DeleteQuery = "DELETE FROM petowner WHERE PetOwnerID = '$_POST[hidden]'";
            mysql_query($DeleteQuery, $con);
            SUBMISSION();
            }

    function SUBMISSION(){
        echo"<script type=\"text/javascript\">document.location.href='./petowner.php';</script>";
    $CON->CLOSE();
    }
?>
    <div class="editpage">
        <h2>PetOwner Information Edit</h2>
        <?php
        $query = mysql_query("SELECT * FROM petowner WHERE PetOwnerID = '$_POST[dosubmit]'");
			
		while($row = mysql_fetch_array($query)){
			$id = $row['PetOwnerID'];
			$name = $row['PetOwnerName'];
            $address = $row['PetOwnerHomeAddress'];
            $num = $row['PetOwnerPhoneNumber'];
            $email = $row['PetOwnerEmailAddress'];
    echo '<hr>';
    echo '<table class="staffinfo1">';
    echo '<form action="petownerinfo_edit.php" method="post">';
	echo '<tr>';
    echo '<td style="width:100px">ID Number:</td><td><input style="width:100px" class=round type=text name=dosubmit value=' . $id . ' </td>';
    echo '<td style="width:60px">Name:</td><td><input style="width:120px" class=round type=text name=name value="' . $name . '" </td>';
    echo '<td><input type=submit name=update value=Update /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td noWrap>Mobile:</td><td><input style="width:100px" type=text name=num class=round value=' . $num . ' </td>';
    echo '<td>E-mail:</td><td><input style="width:120px" type=text name=email class=round value=' . $email . ' </td>';
    echo '<td><input type=submit name=delete value=Delete /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td> Address:</td><td colspan="4"><input style="width:315px" type=text name=address class=round value="' . $address . '" </td>';
    echo '</tr>';   
    echo '<tr>';
    echo '<td><input style="width:0px" type=hidden name=hidden value=' . $id . ' </td>';   
    echo '</tr>';
    echo '<tr>';
    echo '</tr>';
    echo '</form>';
    echo '</table>';
    echo '<hr>';
        }
    mysql_close($con);
    ?>
</div>
</div>
</section>
</div>
</body>
</html>
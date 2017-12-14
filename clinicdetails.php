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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            
            <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
            <script>
            $(document).ready(function(){
                $(".cn").hide();
                $(".picanddes").hide();
                $(".basicinfo2").hide();
                $("#schedulingtime2").hide();
                $(".hide1").click(function(){
                    $(".pic_title_map").hide();
                    $(".clinic_intro").hide();
                    $(".picanddes").show();
                });
                $(".hide2").click(function(){
                    $(".basicinfo").hide();
                    $("iframe").hide();
                    $(".basicinfo2").show();
                });
                $(".hide3").click(function(){
                    $(".time_table").hide();            
                    $("#schedulingtime2").show();
                })
                $('.timepicker').timepicker({
                    timeFormat: 'HH:mm:ss',
                    interval: 30,
                    minTime: '06:00:00',
                    maxTime: '20:00:00',
                    dynamic: true,
                    dropdown: true,
                    scrollbar: true
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
              if(UserAuthority!="owner"&&UserAuthority!="manager")
	           {
		          $(".hide1").hide();
                  $(".hide2").hide();
                  $(".hide3").hide();
                  $(".deletebutton").hide();
	           }
});
            </script>
		</head>
		<body>
            
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
			
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
                            $clinicname = $_POST['clinicname'];
                            ?>
                            
                            <?php
                        function fill_brand($con)

						{
                            $query7 = mysql_query("SELECT * FROM clinic WHERE ClinicName='$_POST[clinicname]'");
		                      while($run2 = mysql_fetch_array($query7)){
                        $query8 = mysql_query("SELECT * FROM staff WHERE WorkingClinicID ='". $run2['ClinicID'] . "' AND StaffPosition = 'Doctor'");
                            while($row2 = mysql_fetch_array($query8)){

								echo "<option value='".$row2['StaffName']."'>".$row2['StaffName']."</option>";
                                 
							     }
                              }
                        }	
                            error_reporting(0);
                            echo '<table>';
                            $con = mysql_connect('localhost', 'root'); 
		                      //these are the aforementioned vars
		                      $db = mysql_select_db('399lovelypets');
                            if(isset($_POST['update'])){
            $UpdateQuery = "UPDATE docschedule SET MondayM = '$_POST[mm]', MondayA = '$_POST[ma]', TuesdayM = '$_POST[tm]', TuesdayA = '$_POST[ta]', WednesdayM = '$_POST[wm]', WednesdayA = '$_POST[wa]', ThursdayM = '$_POST[thm]', ThursdayA = '$_POST[tha]', FridayM = '$_POST[fm]', FridayA = '$_POST[fa]' WHERE docschedule.ClinicID = '$_POST[hidden]'";
            mysql_query($UpdateQuery, $con);
            };
                            if(isset($_POST['update2'])){
            $UpdateQuery2 = "UPDATE clinic SET ClinicPhoto = '$_POST[photo]', ClinicDescription = '$_POST[des]', ClinicName='$_POST[clinicname]' WHERE ClinicID = '$_POST[hidden]'";
            mysql_query($UpdateQuery2, $con);
            };
                            if(isset($_POST['update3'])){
            $UpdateQuery3 = "UPDATE clinic SET ClinicPhoneNumber = '$_POST[pn]', ClinicEmergencyContact = '$_POST[ec]', OpenTime = '$_POST[ot]', CloseTime = '$_POST[ct]', ClinicLocation = '$_POST[lo]', AddressLink = '$_POST[al]', ClinicName='$_POST[clinicname]' WHERE ClinicID = '$_POST[hidden]'";
            mysql_query($UpdateQuery3, $con);
            };
                         if(isset($_POST['delete'])){
            $DeleteQuery = "DELETE FROM clinic WHERE ClinicName = '$clinicname'";
            mysql_query($DeleteQuery, $con);
            SUBMISSION();
            }
    function SUBMISSION(){
        echo"<script type=\"text/javascript\">document.location.href='./clinicinfohomepage.php';</script>";
    $CON->CLOSE();
    }
                        
                           $query = mysql_query("SELECT * FROM clinic WHERE ClinicName = '$_POST[clinicname]'");
                            while($row = mysql_fetch_array($query))
                            {
                                 echo "<div class='pic_title_map'>
						<img class='clinic_pic' src='" . $row['ClinicPhoto'] . "' width='160' height='160' />";
                                echo "<table class='clinic_intro' width='270'>";
                                echo "<tr>";
                                echo "<td style='font-size:25px; padding-bottom:40px'>" . $row['ClinicName'] . "</td>";
                                echo "<form method='POST'>";
                                echo "<td>" . "<input class=deletebutton type=submit name=delete value=delete" . " </td>";
                                echo "<input type='hidden' name='clinicname' value='" . $row['ClinicName'] . "' />";
                                echo "</form>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td height='70' style='color:black'>" . $row['ClinicDescription'] . "</td>";
                                echo "<td><input type='button' name='hide1' class='hide1' style='background:url(pic/edit.png); border:none; width:22px; height:22px; background-repeat: no-repeat;'/></td>";
                                echo "</tr>";
                                echo "</table>";
                                ?>
    <form method="post">
      <table class="picanddes">
                                <tr>
                                    <td class="basictitle">Photo And Description
                                       <input type="submit" name="update2" value="Update" /> 
                                    </td>
                                </tr>
        <tr>
            <td><br>Clinic Photo Link</td>
        </tr>
        <tr>
            <td><input style="width:80%" type="text" name="photo" value="<?php echo $row['ClinicPhoto'];?>" /></td>
        </tr>
        <tr>
            <td><br>Clinic Description</td>
        </tr>
        <tr>
            <td><textarea style="height:90px; width:80%" type="text" name="des" value="des"><?php echo $row['ClinicDescription'];?></textarea></td>
            <td><input type="hidden" name="hidden" value="<?php echo $row['ClinicID'];?>" />
                <input class="cn" type="text" name="clinicname" value="<?php echo $row['ClinicName']?>" />
            </td>
        </tr>
    </table>
                            <?php
                                echo "<table class='basicinfo'>";
                                echo "<tr height='55'><td class='basictitle'><br>Basic Information <input type='button' name='hide2' class='hide2' style='background:url(pic/edit.png); border:none; width:22px; height:22px; background-repeat: no-repeat;'/><td></tr>";
                                echo "<tr class='timeaddress'><td><br>Phone Number:&nbsp;" . $row['ClinicPhoneNumber'] . "</td></tr>";
                                echo "<tr class='timeaddress'><td><br>Emergency Contact Number:&nbsp;" . $row['ClinicEmergencyContact'] . "</td></tr>";
                                echo "<tr class='timeaddress'><td><br>Opening time:&nbsp;" . $row['OpenTime'] . "</td></tr>";
                                echo "<tr class='timeaddress'><td>  <br>Closing time:&nbsp;&nbsp;" .$row['CloseTime'] . "</td></tr>";
                                echo "<tr>";
                                echo "<td class='timeaddress'><br>Address:&nbsp;" . $row['ClinicLocation'] . "</td></tr>";
						echo '</table>';
                        echo '<iframe src="' . $row['AddressLink'] . '" width=60% height="200" frameborder="0" style="border:0" allowfullscreen></iframe>';
                                ?>
        <table class='basicinfo2'>
        <tr height='55'>
            <td class='basictitle'><br>Basic Information&nbsp;<input type="submit" name="update3" value="Update" /><td>
        </tr>
        <tr class='timeaddress'>
            <td>
                <br>
                <tr class='timeaddress'>
                    <td><br>Phone Number:&nbsp; <input type="text" name="pn" value="<?php echo $row['ClinicPhoneNumber']?>" /></td>
                </tr>
                <tr class='timeaddress'>
                    <td><br>Emergency Contact Number:&nbsp; <input type="text" name="ec" value="<?php echo $row['ClinicEmergencyContact'];?>" /></td>
                </tr>
                <tr class='timeaddress'>
                    <td><br>Opening time:&nbsp; <input type="text" name="ot" class="timepicker" value="<?php echo $row['OpenTime'];?>" /></td>
                </tr>
                <tr class='timeaddress'><td><br>Closing time:&nbsp;&nbsp;<input type="text" name="ct" class="timepicker" value="<?php echo $row['CloseTime'];?>" /></td>
                </tr>
                <tr>
                <td class='timeaddress'><br>Address:&nbsp; <input type="text" name="lo" value="<?php echo $row['ClinicLocation'];?>" /></td>
                </td>
                </tr>
                <tr>
                <td class='timeaddress'><br><a href="https://www.google.com.au/maps" target="_blank">Address link:</a>&nbsp;<input style="width:300px" type="text" name="al" value="<?php echo $row['AddressLink'];?>" /></td>
                </tr>
</table>

                            <table class="schedulingtime">
                                <tr>
                                    <td class="basictitle">Scheduling time
                                       <input type='button' name='hide3' class='hide3' style="background:url(pic/edit.png); border:none; width:22px; height:22px; background-repeat: no-repeat;"/>
                                    </td>
                                </tr>
                            </table>
                            <table border="0" align="left" cellpadding="0" cellspacing="0" class="time_table">
	                           <tr>
    	<td></td>
        <td>Monday</td>
        <td>Tuesday</td>
        <td>Wednesday</td>
        <td>Thursday</td>
        <td>Friday</td>
        </tr>
        <tr>
        <td>Morning Shift <?php echo $row['OpenTime'];?><br>-12:00:00</td>
                <?php
                            }
?>
        <?php 
             $query3= mysql_query("SELECT * FROM clinic WHERE ClinicName='$_POST[clinicname]'");
		    while($run = mysql_fetch_array($query3)){
                $query4 = mysql_query("SELECT * FROM docschedule WHERE ClinicID ='". $run['ClinicID'] . "'");
                while($row = mysql_fetch_array($query4)){
                    echo "<td>" . $row['MondayM'] . "</td>";
                    echo "<td>" . $row['TuesdayM'] . "</td>";
                    echo "<td>" . $row['WednesdayM'] . "</td>";
                    echo "<td>" . $row['ThursdayM'] . "</td>";
                    echo "<td>" . $row['FridayM'] . "</td>";
                }
            }
        ?>
     </tr>
     <tr>
         <?php $query9 = mysql_query("SELECT * FROM clinic WHERE ClinicName = '$_POST[clinicname]'");
                            while($row3 = mysql_fetch_array($query9))
                            {
                                ?>
        <td>Afternoon Shift 12:00:00<br>-<?php echo $row3['CloseTime'];?></td>
         <?php
                            }
         ?>
                <?php 
             $query5= mysql_query("SELECT * FROM clinic WHERE ClinicName='$_POST[clinicname]'");
		    while($run = mysql_fetch_array($query5)){
                $query6 = mysql_query("SELECT * FROM docschedule WHERE ClinicID ='". $run['ClinicID'] . "'");
                while($row = mysql_fetch_array($query6)){
                    echo "<td>" . $row['MondayA'] . "</td>";
                    echo "<td>" . $row['TuesdayA'] . "</td>";
                    echo "<td>" . $row['WednesdayA'] . "</td>";
                    echo "<td>" . $row['ThursdayA'] . "</td>";
                    echo "<td>" . $row['FridayA'] . "</td>";
                }
            }
        ?>
     </tr>
</table>
<table border='0' align='left' cellpadding='0' cellspacing='0' class='time_table' id="schedulingtime2">
<tr>
<td>
<input type='submit' name='update' value='Update' />
    <input type=hidden name=hidden2 value="<?php echo $id ;?>" /></td>      
<td>Monday</td>
<td>Tuesday</td>
<td>Wednesday</td>
<td>Thursday</td>
<td>Friday</td>
</tr>
    <tr>
         <?php $query10 = mysql_query("SELECT * FROM clinic WHERE ClinicName = '$_POST[clinicname]'");
                            while($row4 = mysql_fetch_array($query10))
                            {
                                ?>
        <td>Morning Shift <?php echo $row4['OpenTime'];?><br>-12:00:00</td>
         <?php
                            }
         ?>
    <td>
    <select name="mm" value="mm" class='textbox'>
            <option value="">Name</option>
								<?php echo fill_brand($con);?>
    </select>
    </td>
    <td>
    <select name="tm" value="tm" class='textbox'>
            <option value="">Name</option>
								<?php echo fill_brand($con);?>
    </select>
            </td>
    <td>
    <select name="wm" value="wm" class='textbox'>
            <option value="">Name</option>
								<?php echo fill_brand($con);?>
    </select>
    </td>
    <td>
    <select name="thm" value="thm" class='textbox'>
            <option value="">Name</option>
								<?php echo fill_brand($con);?>
    </select>
    </td>
    <td>
    <select name="fm" value="fm" class='textbox'>
            <option value="">Name</option>
								<?php echo fill_brand($con);?>
    </select>
    </td>
    </tr>
    <tr>
         <?php $query11 = mysql_query("SELECT * FROM clinic WHERE ClinicName = '$_POST[clinicname]'");
                            while($row5 = mysql_fetch_array($query11))
                            {
                                ?>
        <td>Afternoon Shift 12:00:00<br>-<?php echo $row5['CloseTime'];?></td>
         <?php
                            }
         ?>
    <td>
    <select name="ma" value="ma" class='textbox'>
            <option value="">Name</option>
								<?php echo fill_brand($con);?>
    </select>
    </td>
    <td>
    <select name="ta" value="ta" class='textbox'>
            <option value="">Name</option>
								<?php echo fill_brand($con);?>
    </select>
            </td>
    <td>
    <select name="wa" value="wa" class='textbox'>
            <option value="">Name</option>
								<?php echo fill_brand($con);?>
    </select>
            </td>
    <td>
    <select name="tha" value="tha" class='textbox'>
            <option value="">Name</option>
            <?php echo fill_brand($con);?>
    </select>
    </td>
    <td>
    <select name="fa" value="fa" class='textbox'>
            <option value="">Name</option>
								<?php echo fill_brand($con);?>
    </select>
            </td>
    </tr>
</table>
<table class="schedulingtime3">
                                <tr>
                                    <td class="basictitle">
                                       <a class="staffinformation" href="Staffinfo.php">Staff information</a>
                                    </td>
                                </tr>
                            </table>

            
           <table border="0" align="left" cellpadding="0" cellspacing="0" class="staff_info">
            <tr>
                	<td>ID</td>
                    <td>Name</td>
                    <td>Phone</td>
                    <td>E-mail</td>
            </tr>
            
            <?php
               
            $query1 = mysql_query("SELECT * FROM clinic WHERE ClinicName='$_POST[clinicname]'");
		    while($run = mysql_fetch_array($query1)){
                $query2 = mysql_query("SELECT * FROM staff WHERE WorkingClinicID ='". $run['ClinicID'] . "'");
                while($row = mysql_fetch_array($query2)){
                $id = $row['StaffID'];
			    $name = $row['StaffName'];
                $num = $row['StaffPhoneNumber'];
                $email = $row['StaffEmail'];
            echo '<tr><td>' . $id . '</td>';
            echo '<td>' . $name . '</td>';
            echo '<td>' . $num . '</td>';
            echo '<td>' . $email . '</td>';
                }
            }
                mysql_close($con);
                ?>
                        </table>	
                            </form>
                            </table>
                            </div>
                            </div>
                    </div>
				</section>
                            
                        
							
            </div>
</body>
</html>
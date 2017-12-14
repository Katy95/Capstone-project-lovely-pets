<?php

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
 	}
  
mysql_select_db("399lovelypets", $con);
//对appointment的ID进行处理，筛选出最大值并且找出下一个应该有的ID
$appointmentsql="select AppointmentID from Appointment"; 
$appointmentquery = mysql_query($appointmentsql,$con); 
$count=0;
$appoint=array();
while($rows=mysql_fetch_array($appointmentquery)){
	$strlen=strlen($rows[0]);
	$appoint[$count] = substr($rows[0],1,$strlen-1);
	//测试是否能正常储存数值
	//echo $appoint[$count]; 
	$count+=1;
};
$newappointnumber=max($appoint)+1;
$newappointid='A'.$newappointnumber;
	//测试是否能正常输出新的ID
   //echo $newappointid;
?>
<head>
<style type="text/css">
 #show h1 {color: sienna;}
 #show p {line-height:20px;}
 #show span{color: blue; font-weight: bold;line-height:30px;}
 #show button{color: white; background-color: #3BD9FF; border-radius: 6px;  border: 0}
  #savebtn{margin-left:30px; margin-top:20px; font-size:25px; float:left;background-color:#3BD9FF;color: white;border-radius: 6px;}
  #closebtn{margin-left:130px; margin-top:20px; font-size:25px; float:left;background-color:#3BD9FF;color: white;border-radius: 6px;}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$( "#appointdate" ).datepicker();
	$("#savebtn").click(function(){
				//alert("123");
				  $( "#appointdate" ).datepicker("option", "dateFormat", "yy-mm-dd");//格式化日期
				  $.post("./php/addappoint.php",
				  {
					appointmentid:"<?php echo $newappointid?>",
					date: $("#appointdate").val(),
					starthour: $("#starthour").val(),
					startminute:$("#startminute").val(),
					endhour:$("#endhour").val(),
					endminute:$("#endminute").val(),
					doctorid:$("#doctoridselect").val(),
					clinicid:$("#clinicidselect").val(),
					customerid:$("#customeridselect").val(),
					petid:$("#petidselect").val(),
					description:$("#descrption").val(),
				  },
				  function(data,status){
					alert("You have successfully added appointment: " + data + "\nStatus: " + status);
					$('#calendar').fullCalendar( 'refetchEvents' );
					$.fancybox.close();
					
				  });
				 
	});
    $("#doctoridselect").change(function()
    {
	  
		//alert("123");
	    $.post("./php/changeclinic.php",
		  {
			doctorid:$("#doctoridselect").val(),
		  },
		  function(data,status){
			  //alert(data);
				$("#clinicidselect").val(data);
		  });
	  
    });
	
	
	
	
})
</script>
</head>
<body>
<div id="show">
<h1>Appointment Information</h1>
	<p><span>Appoint Number:</span> <?php echo $newappointid?></p>
	<p><span>Appoint Date: </span><input type="text" id="appointdate" placeholder="Please enter the Appoint number here"/></p>
	<p><span>Start Time:</span>
	<select id="starthour">
		<option value="00" selected>00</option>
		<option value="01">01</option>
		<option value="02">02</option>
		<option value="03">03</option>
		<option value="04">04</option>
		<option value="05">05</option>
		<option value="06">06</option>
		<option value="07">07</option>
		<option value="08">08</option>
		<option value="09">09</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
	</select>:
	<select id="startminute">
		<option value="00" selected>00</option>
		<option value="10">10</option>
		<option value="20">20</option>
		<option value="30">30</option>
		<option value="40">40</option>
		<option value="50">50</option>
	</select></p>
	<p><span>End Time:</span>
	<select id="endhour">
		<option value="00" selected>00</option>
		<option value="01">01</option>
		<option value="02">02</option>
		<option value="03">03</option>
		<option value="04">04</option>
		<option value="05">05</option>
		<option value="06">06</option>
		<option value="07">07</option>
		<option value="08">08</option>
		<option value="09">09</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
	</select>:
	<select id="endminute">
			<option value="00" selected>00</option>
			<option value="10">10</option>
			<option value="20">20</option>
			<option value="30">30</option>
			<option value="40">40</option>
			<option value="50">50</option>
	</select></p>
	<p><span>Customer ID: </span>
	<select id="customeridselect">
	<?php 
		$customersql="select * from petowner"; 
		$customerquery = mysql_query($customersql,$con); 
		while($rows=mysql_fetch_array($customerquery)){
			echo '<option value="'.$rows['PetOwnerID'].'">'.$rows['PetOwnerID'].' '.$rows['PetOwnerName'].'</option>';
		};
	?>
			
	</select></p>
	<p><span>Doctor ID: </span>
	<select id="doctoridselect">
	<?php 
		$doctorsql="select * from Staff where StaffPosition = 'Doctor'"; 
		$doctorquery = mysql_query($doctorsql,$con); 
		while($rows=mysql_fetch_array($doctorquery)){
			echo '<option value="'.$rows['StaffID'].'">'.$rows['StaffID'].' '.$rows['StaffName'].'</option>';
		};
	?>
	</select></p>
	<p><span>Clinic ID:</span>
	<select id="clinicidselect">
	<?php 
		$clinicsql="select * from clinic"; 
		$clinicquery = mysql_query($clinicsql,$con); 
		while($rows=mysql_fetch_array($clinicquery)){
			echo '<option value="'.$rows['ClinicID'].'">'.$rows['ClinicID'].' '.$rows['ClinicName'].'</option>';
		};
	?>
	</select></p>
	<p><span>Pet ID:</span>
	<select id="petidselect">
	<?php 
		$petsql="select * from pet"; 
		$petquery = mysql_query($petsql,$con); 
		while($rows=mysql_fetch_array($petquery)){
			echo '<option value="'.$rows['PetID'].'">'.$rows['PetID'].' '.$rows['PetName'].'</option>';
		};
	?>
	</select></p>
	
	<p><span>Notes: </span> <input id='descrption'></input>
<div>
<button id='savebtn'>save</button>
<button id='closebtn'onClick="$.fancybox.close()">close</button>
</div>
 




</body>
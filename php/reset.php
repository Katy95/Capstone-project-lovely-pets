<?php
//连接数据库
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
 	}
  
mysql_select_db("399lovelypets", $con);


//从页面获取数据
$username=$_POST['username'];
$password=$_POST['password'];


$sql="Update userpassword set password ='$password' WHERE UserID = '$username'";
$query = mysql_query($sql,$con); 

?>

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
 	}
  
mysql_select_db("399lovelypets", $con);
$username=$_POST["username"];  
$password=$_POST["password"];
if($username==""||$password=="")//判断是否为空
      {
        echo"<script>alert('please enter your username and password');window.location='../login.html';</script>";
        exit;
      }

$str="SELECT * FROM userpassword WHERE userID = '$username'";
$result=mysql_query($str,$con);//找到与输入用户名相同的人的密码;
$pass=mysql_fetch_row($result);
$pa=$pass[1];

if($pa==$password)
	{  
        setcookie('username',$username,time()+7200,'/test3/'); //cookie
		setcookie('authority', $pass[2], time()+7200,'/test3/');//关于权限的cookie
        echo "<script>alert('successfully');window.location= '../homepage.html';</script>"; 
    }
else
	{
		echo"<script>alert('Your username and password do not match');window.location='../login.html';</script>";

	}

?>
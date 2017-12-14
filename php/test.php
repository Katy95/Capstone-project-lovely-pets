<!Doctype>
<html>
<<head>
	<title>Connecting to a Database</title>
</head>
<body>
	<?php
		$con = new mysqli('localhost', 'root', '6523', '399lovelypets'); 
		//these are the aforementioned vars
		if ($con -> connect_error) { die ("Failed"); } else { echo "Successful"; }﻿
		
		$query = mysql_query("SELECT * FROM 'staff'");
		while($row = mysql_fetch_array($query)){
			$id = $row['Staff ID'];
			$name = $row['Staff Name'];
			echo $id . ': ' . $name . '<br>';
?>
</body>
</html>
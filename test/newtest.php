	<?php
		error_reporting(0);
		$con = mysql_connect('localhost', 'root', '6523'); 
		//these are the aforementioned vars
		$db = mysql_select_db('399lovelypets');
		if($con){
			echo 'Successfully connected to the database';
		}
		else{
			die('Error.');
		}
		?>
        <br>
        <br>
        <?php
			$query = mysql_query("SELECT * FROM staff");
			
			while($row = mysql_fetch_array($query)){
			$id = $row['Staff ID'];
			$name = $row['Staff Name'];
			$po = $row['Staff Position'];
			echo $id . ': ' . $name . ' &nbsp;Position: ' . $po . '<br />';
			}
		?>
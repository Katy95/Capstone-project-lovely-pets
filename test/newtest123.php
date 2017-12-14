	
	
	
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
        <table>
        
        <?php
			$query = mysql_query("SELECT * FROM staff");
			
			while($row = mysql_fetch_array($query)){
			$id = $row['Staff ID'];
			$name = $row['Staff Name'];
			$po = $row['Staff Position'];
			echo '<tr>';
			echo '<td>ID</td>' . '<td>' . $id . '</td>';
			echo '<td>Name</td>' . '<td>' . $name . '</td>>';
			echo '<td>' . 'Position' . $po . '</td>';
			echo '</tr>';
			}
		?>
		</table>
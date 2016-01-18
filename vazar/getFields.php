<?php
	$q = $_GET['q'];
	require 'internal/myConnection.php';	
	$sql="SELECT * FROM fields WHERE sub_category_id='$q'";
	$result=mysql_query($sql);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	if(mysql_num_rows($result)){
		echo "<table table-responsive border='0'>";
		while($row=mysql_fetch_array($result)){
			$name=$row['field_name'];
			$id=$row['field_id'];
			echo "			
					<tr>
						<td>$name</td>
						<td><input class='form-control' type='text' name='$id' id='$id'></td>
					</tr>				
			";
		}
		echo "</table>";
	}else{
		echo "No fields available.";
	}

?>
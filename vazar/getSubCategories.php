<?php
	$q = $_GET['q'];
	require 'internal/myConnection.php';	
	$sql="SELECT sub_category_id,sub_category_name FROM sub_categories WHERE category_id='$q'";
	$result=mysql_query($sql);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	if(mysql_num_rows($result)){
		echo "<select id='subCategoryName' name='subCategoryName' class='form-control' onchange='showFields(this.value)'>";
		echo "<option value='0'>N/A</option>";
		while($row=mysql_fetch_array($result)){
			$name=$row['sub_category_name'];
			$id=$row['sub_category_id'];
			echo "<option value='$id'>$name</option>";
		}
		echo "</select>";
	}else{
		echo "No sub_categories available.";
		echo "
			<select id='subCategoryName' name='subCategoryName' style='display:none'>
				<option value='0'>N/A</option>
			</select>";
	}

?>
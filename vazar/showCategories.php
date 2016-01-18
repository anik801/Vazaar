<?php
	ob_start();//new
	require 'internal/myConnection.php';

	$sql="SELECT * FROM categories";
	$result=mysql_query($sql);
	if (!$result) {
	    die('Invalid query: ' . mysql_error());
	}else{

		while($row=mysql_fetch_array($result)){
			$categoryName=$row['category_name'];
			$categoryId=$row['category_id'];
			echo "<div class='eachCategory'>
					<ul class='categoryTitle'>$categoryName</ul>";
			$sql2="SELECT * FROM sub_categories WHERE category_id='$categoryId' ";
			$result2=mysql_query($sql2);			
			if (!$result2) {
			    die('Invalid query: ' . mysql_error());
			}else{
				while($row2=mysql_fetch_array($result2)){
					$subCategoryName=$row2['sub_category_name'];
					$subCategoryId=$row2['sub_category_id'];
					echo "<li id='subCategoryListedItems' title='$subCategoryName' onclick='customSearch(this.title);'>$subCategoryName</li>";
				}
			}
			echo "<br>";
			echo "</div>";
		}
	}

?>


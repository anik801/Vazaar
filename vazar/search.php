<?php
	ob_start();//new
	session_start();
	$q = $_GET['q'];
	require 'internal/myConnection.php';		

	$sql="SELECT * FROM `products` JOIN `sub_categories` ON `products`.`sub_category_id`= `sub_categories`.`sub_category_id` JOIN `categories` 	ON `categories`.`category_id`= `products`.`category_id` JOIN user_accounts ON `products`.`user_id`=`user_accounts`.`user_id` WHERE (`products`.`product_name` LIKE '%$q%') OR (`products`.`product_description` LIKE '%$q%') OR (`sub_categories`.`sub_category_name` LIKE '%$q%') OR (`categories`.`category_name` LIKE '%$q%')";

	$result=mysql_query($sql);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}else{
		if(mysql_num_rows($result)){
			while($row=mysql_fetch_array($result)){
				$id=$row['product_id'];
				$name=$row['product_name'];
				$price=$row['product_price'];
				$quantity=$row['product_quantity'];
				$description=$row['product_description'];

				$link1=$row['product_link1'];
				$link2=$row['product_link2'];
				$link3=$row['product_link3'];

				$userName=$row['user_name'];
				$userId=$row['user_id'];
				$contact=$row['user_mobile'];
				$location=$row['user_location'];



				echo "
				<div class='col-xs-6 col-md-3' id='item1'>
				    <a href='#productForm' role='button' data-toggle='modal' class='thumbnail' ";?> onmouseover="nhpup.popup('<?php echo "$name<br>Price: $price<br>Quantity:$quantity<br>Description:$description"; ?>');" <?php echo "onclick='productClicked($id);' >
				      <img src='$link1' style='min-height:250px; height:250px;'>
				    </a>
				    
				</div>
				";
			}
		}else{
			echo "
				<div id='noSearchDiv' align='center'>
				   <span id='noSearchText'>Sorry no product could be found in the given criteria.</span>				    
				</div>
				";
		}
	}
?>


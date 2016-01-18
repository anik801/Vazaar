<?php
	ob_start();//new
	session_start();
	$q = $_GET['q'];
	require 'internal/myConnection.php';	

	$sql="SELECT * FROM products JOIN user_accounts ON products.user_id=user_accounts.user_id JOIN categories ON products.category_id=categories.category_id JOIN sub_categories ON products.sub_category_id=sub_categories.sub_category_id WHERE product_id='$q'";
	$result=mysql_query($sql);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}else{
		$row=mysql_fetch_array($result);
		$id=$row['product_id'];
		$name=$row['product_name'];
		$price=$row['product_price'];
		$quantity=$row['product_quantity'];
		$sold=$row['sold_quantity'];
		$quantity=$quantity-$sold;
		$description=$row['product_description'];

		$link1=$row['product_link1'];
		$link2=$row['product_link2'];
		$link3=$row['product_link3'];

		$userName=$row['user_name'];
		$userId=$row['user_id'];
		$contact=$row['user_mobile'];
		$location=$row['user_location'];

		$category=$row['category_name'];
		$subCategory=$row['sub_category_name'];
		$subCategoryId=$row['sub_category_id'];

		$sql2="SELECT * FROM fields JOIN product_fields ON fields.field_id=product_fields.field_id WHERE sub_category_id='$subCategoryId' AND product_id='$id'";
		$result2=mysql_query($sql2);
		if (!$result2) {
			die('Invalid query: ' . mysql_error());
		}
		$i=0;
		if(mysql_num_rows($result2)){
			while($row2=mysql_fetch_array($result2)){
				$fieldName[$i]=$row2['field_name'];
				$fieldId[$i]=$row2['field_id'];
				$fieldValue[$i]=$row2['field_value'];
				$i++;
			}			
		}
		$j=$i;

		echo "
		<div class='productBody' align='center'>
        <div id='productImages'>
        	<img class='productImage' src='$link1'>
        	<img class='productImage' src='$link2'>
        	<img class='productImage' src='$link3'>
        </div>
         <table table-responsive border='0'>
         	<tr>
         		<td><strong>Product Name:</strong></td>
         		<td>$name</td>
         		<td>&nbsp;&nbsp;</td>
         		<td><strong>Sub-Category:</strong></td>
         		<td>$subCategory</td>
         	</tr>
         	<tr>
         		<td><strong>Item Description:</strong></td>
         		<td>$description</td>
         		<td>&nbsp;&nbsp;</td>
         		<td><strong>Seller:</strong></td>
         		<td>$userName</td>
         	</tr>
         	<tr>
         		<td><strong>Price:</strong></td>
         		<td>$price</td>
         		<td>&nbsp;&nbsp;</td>
         		<td><strong>Contact:</strong></td>
         		<td>$contact</td>
         	</tr>
         	<tr>
         		<td><strong>Availabe Quantity:</strong></td>
         		<td>$quantity</td>
         		<td>&nbsp;&nbsp;</td>
         		<td><strong>Location:</strong></td>
         		<td>$location</td>
         	</tr>
         	
         	";
         	for($i=0; $i<$j; $i++){
         		$x=$fieldName[$i];
         		$y=$fieldValue[$i];
         		echo "
         	<tr>
         		<td><strong>$x:</strong></td>
         		<td>$y</td>
         	</tr>	
         		";
         	}
         	echo"
         </table>
        </div>
        
        <div id='productFooter' align='center'>";     
	       if(isset($_SESSION['bns_id'])){		
				echo '
					<input type="button" class="btn btn-default" value="Return" onclick="returnButtonPressed();">
					<input type="button" class="btn btn-warning" value="Add to Wishlist" onclick="addToWishlistButtonPressed('.$id.');">
				    <input type="button" class="btn btn-primary" value="Add to Cart" onclick="addToCartButtonPressed('.$id.');">
				    <input type="submit" id="addToCartButton" name ="addToCartButton" style="display:none"> 
			    ';
			}else{
				echo"
					<div id=''>
						<input type='button' class='btn btn-default' value='Return' onclick='returnButtonPressed();'>
						<a class='btn btn-sm btn-primary' href='#loginForm' role='button' data-toggle='modal'>Log In</a>			
						<a class='btn btn-sm btn-warning' href='#registraionForm' role='button' data-toggle='modal'>Register</a>			
					</div>
				";
			}
	      	echo"
	     </div>
		";
		
	}
?>	
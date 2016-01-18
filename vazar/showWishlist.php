<?php
	ob_start();//new
	session_start();
	include 'internal/myConnection.php';
	$user_id=$_SESSION['bns_id'];
	$sql="SELECT * FROM products JOIN wishlist ON products.product_id=wishlist.product_id WHERE wishlist.user_id='$user_id' ";
	$result=mysql_query($sql);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}else{
		while($row=mysql_fetch_array($result)){
			$id=$row['product_id'];
			$name=$row['product_name'];
			$price=$row['product_price'];
			$quantity=$row['product_quantity'];
			$description=$row['product_description'];

			$link1=$row['product_link1'];
			$link2=$row['product_link2'];
			$link3=$row['product_link3'];
			$userId=$row['user_id'];




			echo "
			<div class='col-xs-6 col-md-3' id='item1'>
			    <a href='#productForm' role='button' data-toggle='modal' class='thumbnail' ";?> onmouseover="nhpup.popup('<?php echo "$name<br>Price: $price<br>Quantity:$quantity<br>Description:$description"; ?>');" <?php echo " >
			      <img src='$link1' style='min-height:250px; height:250px;' onclick='productClicked($id);'><button  onclick='deleteFromWishlistClicked($id);'>Delete</button>
			    </a>
			</div>
			";
		}
	}
?>
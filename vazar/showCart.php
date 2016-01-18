<?php
	session_start();
	include 'internal/myConnection.php';
	$i=$_SESSION['cart'];
	if($i>0){
		echo "
			<table class='table table-responsive table-hover'>
				<thead>
					<tr>
						<td><strong>Product name</stong></td>
						<td><strong>Quantity</stong></td>
						<td><strong>Price</stong></td>
						<td><strong>Total</stong></td>
						<td><strong>Action</stong></td>
					</tr>
				</thead>			


				";
		$sum=0;
		for($j=1; $j<=$i; $j++){
			$productId=$_SESSION['item'][$j];
			$quantity=$_SESSION['quantity'][$j];
			if($quantity==0)
				continue;
			$sql="SELECT * FROM products WHERE product_id='$productId' ";
			$result=mysql_query($sql);
			if (!$result) {
			    die('Invalid query: ' . mysql_error());
			}
			$row=mysql_fetch_array($result);
			$name=$row['product_name'];
			$price=$row['product_price'];
			$total=$quantity*$price;
			$sum=$sum+$total;
			echo "<tr>
					<td>$name</td>
					<td>$quantity</td>
					<td>$price</td>
					<td>$total</td>
					<td><input type='button' class='btn btn-danger' name='productDelete' value='Remove' onclick='deleteFromCartClicked($j);'></td>
				</tr>";

		}

		echo "</table>
		<div id='totalDiv'>Grand Total: $sum</div>
		";
	}else{
		echo"<div id='cartFooter'>Your cart is empty.</div>";
	}

	echo '
			<input type="button" class="btn btn-default" value="Return" onclick="cartReturnButtonPressed();">
			<input type="button" class="btn btn-warning" value="Discard Cart" onclick="deleteCartClicked();">
		    <input type="button" class="btn btn-primary" value="Check Out" onclick="checkOut();">
		    
	    ';

?>
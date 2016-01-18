<?php
	ob_start();//new
	session_start();

	include 'internal/myConnection.php';
	$i=$_SESSION['cart'];


	for($j=1; $j<=$i; $j++){
		//echo $_SESSION['item'][$j]. "    ". $_SESSION['quantity'][$i]."<br>";
		$productId=$_SESSION['item'][$j];
		$quantity=$_SESSION['quantity'][$j];
		$sql="SELECT * FROM products WHERE product_id='$productId' ";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}
		$row=mysql_fetch_array($result);
		$name=$row['product_name'];
		$price=$row['product_price'];
		$seller=$row['user_id'];
		$preSold=$row['sold_quantity'];
		$total=$quantity*$price;
		$buyer=$_SESSION['bns_id'];



	}	
	$sql="INSERT INTO orders (buyer_id,seller_id,total,order_date_time) VALUES ('$buyer','$seller','$total',now())";
	$result=mysql_query($sql);
	if (!$result) {
	    die('Invalid query: ' . mysql_error());
	}
	$sql="SELECT order_id FROM orders ORDER BY order_date_time DESC LIMIT 1";		
	$result=mysql_query($sql);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	if(mysql_num_rows($result)){	
		$row=mysql_fetch_array($result);
		$orderId=$row['order_id'];
	}

	for($j=1; $j<=$i; $j++){
		$productId=$_SESSION['item'][$j];
		$quantity=$_SESSION['quantity'][$j];
		
		$sql="INSERT INTO order_details (order_id,product_id,quantity) VALUES ('$orderId','$productId','$quantity')";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}

		$quantity=$quantity+$preSold;
		$sql="UPDATE products SET sold_quantity='$quantity' WHERE product_id='$productId' ";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}
	}

	$_SESSION['cart']=0;
	
?>
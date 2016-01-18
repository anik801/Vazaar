<?php
	ob_start();//new
	session_start();

	$productId = $_GET['q'];
	$quantity = $_GET['x'];
	$userId = $_SESSION['bns_id'];

	$i=$_SESSION['cart'];
	$i++;
	$_SESSION['cart']=$i;
	$_SESSION['item'][$i]=$productId;
	$_SESSION['quantity'][$i]=$quantity;

?>
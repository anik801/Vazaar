<?php
	ob_start();//new
	session_start();
	$q = $_GET['q'];
	$u = $_SESSION['bns_id'];
	require 'internal/myConnection.php';
	$sql="INSERT INTO wishlist (user_id,product_id) VALUES ('$u','$q')";
	$result=mysql_query($sql);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}

?>
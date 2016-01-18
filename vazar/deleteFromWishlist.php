<?php
	ob_start();//new
	session_start();
	include 'internal/myConnection.php';
	$user_id=$_SESSION['bns_id'];
	$q = $_GET['q'];
	$sql="DELETE FROM wishlist WHERE user_id='$user_id' AND product_id='$q'";
	$result=mysql_query($sql);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}else{
		
	}
?>
<?php
	ob_start();//new
	session_start();

	$q = $_GET['q'];
	$_SESSION['quantity'][$q]=0;

?>
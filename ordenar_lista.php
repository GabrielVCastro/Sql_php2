<?php  
	session_start();
	$_SESSION['ordem'] = $_GET['ordenar'];
	header("Location: index.php");
	
?>
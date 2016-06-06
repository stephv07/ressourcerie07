<?php 
	session_start();
	$_SESSION['giving_change'] = $_POST['payment_amount'] - $_SESSION['total'];
	$_SESSION['payment_amount'] = $_POST['payment_amount'];
	include('../../redirects/to_shop.php');
?>
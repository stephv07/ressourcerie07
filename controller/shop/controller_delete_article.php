<?php 
	session_start();
	unset($_SESSION['articles'][$_POST['id_article']]);
	$_SESSION['articles'] = array_values($_SESSION['articles']);
	include('../../redirects/to_shop.php');
?>
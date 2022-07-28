<?php
	if(!isset($_SESSION['name'])){
		header("Location: login.php");
	}
?>
<?php
	include_once 'dbMySql.php';
	$con = new DB_con();

	$Year = $_POST['Year'];
	$empcount = $_POST['empcount'];
	$con->insert($Year, $empcount);
?>
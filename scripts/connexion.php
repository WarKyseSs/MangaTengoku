<?php

	define('HOST','localhost');
	define('DB_NAME','mangatengoku');
	define('USER','mangathequeFL');
	define('PASS','FLmangagokuTM');
	
	try{
		$db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e){
		echo $e;
	}
?>
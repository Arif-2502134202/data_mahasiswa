<?php
	error_reporting(E_ALL);
	
	$dbHost = 'localhost';
	$dbUser = 'root';
	$dbPass = '';
	$dbName = 'db_week5b';

	$dbConn = mysqli_connect($dbHost,$dbUser,$dbPass);
	
	mysqli_query($dbConn,"CREATE DATABASE IF NOT EXISTS db_week5b") or die(mysqli_error($dbConn));
	mysqli_select_db($dbConn,$dbName) or die(mysqli_error($dbConn));
   	
	$sql = "CREATE TABLE IF NOT EXISTS mhs (id int(3) NOT NULL AUTO_INCREMENT PRIMARY KEY, nim char(10) NOT NULL,
		nama varchar(30) DEFAULT NULL,
		jurusan char(2) DEFAULT NULL) ";
		
	mysqli_query($dbConn,$sql) or die(mysqli_error($dbConn));
	
	$qry = mysqli_query($dbConn,"select * from mhs") or die(mysqli_error($dbConn));
	$count = mysqli_num_rows($qry);
	
	if ($count == 0){
		mysqli_query($dbConn,"insert into mhs (nim,nama,jurusan) 
			values('2023001','Arif Sulastiono','SI')") or die(mysqli_error($dbConn));
	}
			    
?>
<?php
	require_once 'config.php';

	$dbConn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
	
	if (isset($_POST["submit"])){
	  	
		if ($_GET['sub']=='add'){
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$jurusan = $_POST['jurusan'];
								
			$query="insert into mhs (nim,nama,jurusan) values ('".$nim."','".$nama."','".$jurusan."')";
				
			$result = mysqli_query($dbConn,$query) or die(mysqli_error($dbConn));
		} 
		else if ($_GET['sub']=='update'){
			$id = $_POST['id'];
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$jurusan = $_POST['jurusan'];
		
			$query="update mhs set nim='".$nim."',nama='".$nama."',jurusan='".$jurusan."' where id='".$id."'";
		
			$result = mysqli_query($dbConn,$query) or die(mysqli_error($dbConn));
		
		}
		
		header ('Location: index.php');
		exit;
		
	}

	?>
	
	
	  
	 
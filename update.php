<?php 
include 'config.php'; 	

$nim = $_GET['id'];
$query = mysqli_query($dbConn,"select * from mhs where nim = '".$nim."'") or die(mysqli_error($dbConn));
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $judul; ?></title>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
   
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
</head>

<body>

<div>		
      <h3>Update Data Mahasiswa</h3>
	
      <form method="POST" action="simpan.php?sub=update">	
		<input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>">
        <div class="mb-3">
          <label for="nim" class="form-label">NIM</label>
          <input type="text" name="nim" class="form-control" id="nim" value="<?php echo $data['nim']; ?>" style="max-width:400px;" tabindex="1" >
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="nama" name="nama" class="form-control" id="nama" value="<?php echo $data['nama']; ?>" style="max-width:400px;" tabindex="2">
        </div>
		<div class="mb-3">
          <label for="jurusan" class="form-label">Jurusan</label>
          <input type="jurusan" name="jurusan" class="form-control" id="jurusan" value="<?php echo $data['jurusan']; ?>" style="max-width:400px;" tabindex="3">
        </div>
				
        <div class="mb-3">
          <button type="submit" name="submit" class="btn btn-primary" tabindex="4">Simpan</button>
		  <button type="button" class="btn btn-secondary" onClick="batal()">Cancel</button>
        </div>
      </form>
    
  </div> 

<script>
function batal()
{
	document.location='index.php';
}
</script>
  
</body>

</html>

<?php 
require_once 'createdb.php';
include 'config.php'; 	

	if (isset($_GET['action'])){
		if ($_GET['action']=="hapus") {
		$id = $_GET['id'];
		$query="delete from mhs where id='".$id."'";			
		$result = mysqli_query ($dbConn,$query) or die(mysqli_error($dbConn));
			
		header ('Location: ' . $_SERVER['PHP_SELF'] . '');
		exit;
		}
	}
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
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>  
</head>

<body>


<div>		
      <h3>Daftar Data Mahasiswa</h3>
	  <div class="mb-3">
		<a href="tambah.php" class="btn btn-primary btn-sm" title="tambah">Tambah</a>
	  </div>
      <div>
	  
		<table class="table table-bordered border-primary">
			<col width="3%"><col width="25%"><col width="40%"><col width="12%"><col width="20%">
            <thead>
                <tr>
					<th>No</th>
					<th>NIM</th>					 
                    <th>Nama</th>                     
					<th>Jurusan</th>
					<th></th>
                </tr>
            </thead>			  
            <tbody>
			<?php
				$sql="select * from mhs order by nim";
																	
				$data = mysqli_query($dbConn,$sql) or die(mysqli_error($dbConn));
				$no=0;
				while ($baris = mysqli_fetch_array($data))	
				{					  
					$no++;
					$id=$baris['id'];
					$nim=$baris['nim'];
					$nama=$baris['nama'];
					$jurusan=$baris['jurusan'];					  						  						 
	  	  	?>
                <tr id="<?php echo $id; ?>" >
                    <td><?php echo $no; ?></td>
                    <td><?php echo $nim; ?></td>
					<td><?php echo $nama; ?></td>
                    <td><?php echo $jurusan; ?></td>					  					  
                    <td>
					  <a href="<?php echo "update.php?id=$nim"; ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit">
						Edit<span class="glyphicon glyphicon-pencil"></span></a>
					  <button class="btn btn-danger btn-sm hapusitem">Hapus</button>
					</td>                     
                </tr>
            <?php } ?>
            </tbody>
        </table>
     </div> 
  </div> 

<script>
function batal()
{
	document.location='index.php';
}
</script>

<script>
	$(".hapusitem").click(function(){
        var id = $(this).parents("tr").attr("id");
	
        if(confirm('Apakah Data akan dihapus ?'))
        {
			$.ajax({
               url: 'index.php?action=hapus',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Terjadi Kesalahan');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Data telah dihapus");  
               }
            });
        }
	});
</script>
  
</body>

</html>

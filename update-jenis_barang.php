<a href="jenis_barang.php">Show Data</a>
<br><br>

<?php
include 'config.php';
$a=mysqli_query($conn,"SELECT * FROM jenis_barang WHERE id='$_GET[id]'");
$b=mysqli_fetch_array($a,MYSQLI_ASSOC)
?>
<form method="post">
	ID : <input type="text" name="id" placeholder="Masukkan ID" value="<?= $b['id'] ?>"><br><br>
	Jenis : <input type="text" name="nama_jenis" placeholder="Masukkan Jenis Barang" value="<?= $b['nama_jenis'] ?>"><br><br>
	Keterangan : <input type="text" name="keterangan" placeholder="Masukkan Keterangan" value="<?= $b['keterangan'] ?>"><br><br>
<input type="submit" name="update" value="Update">
	<input type="reset" name="cancel" value="Cancel">
</form>
<?php
if(isset($_POST['update']))
{
  include 'config.php';
  $id=$_POST['id'];
  $nama_jenis=$_POST['nama_jenis'];
  $keterangan=$_POST['keterangan'];

  $sql="UPDATE jenis_barang SET id='$id',nama_jenis='$nama_jenis',keterangan='$keterangan' WHERE id='$_GET[id]'";
  if($conn->query($sql) === false)
  { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
    trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
  }  
  else 
  { // Jika berhasil alihkan ke halaman tampil.php
    echo "<script>alert('Update Success!')</script>";
  	echo "<meta http-equiv=refresh content=\"0; url=jenis_barang.php\">";
  }
}

?>   
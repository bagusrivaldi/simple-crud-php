<a href="index.php">Show Data</a>
<br><br>

<?php
include 'config.php';
$a=mysqli_query($conn,"SELECT * FROM pelanggan WHERE id='$_GET[id]'");
$b=mysqli_fetch_array($a,MYSQLI_ASSOC)
?>
<form method="post">
ID : <input type="text" name="id" placeholder="Masukkan ID" value="<?= $b['id'] ?>"><br><br>
	Nama : <input type="text" name="nama" placeholder="Masukkan Nama" value="<?= $b['nama'] ?>"><br><br>
	Alamat : <input type="text" name="alamat" placeholder="Masukkan Alamat" value="<?= $b['alamat'] ?>"><br><br>
	Kota : <input type="text" name="kota" placeholder="Masukkan Kota" value="<?= $b['kota'] ?>"><br><br>
	Provinsi : <input type="text" name="provinsi" placeholder="Masukkan Provinsi" value="<?= $b['provinsi'] ?>"><br><br>
	Nomor : <input type="text" name="nomor" placeholder="Masukkan Nomor" value="<?= $b['nomor'] ?>"><br><br>
<input type="submit" name="update" value="Update">
	<input type="reset" name="cancel" value="Cancel">
</form>
<?php
if(isset($_POST['update']))
{
  include 'config.php';
  $id=$_POST['id'];
  $nama=$_POST['nama'];
  $alamat=$_POST['alamat'];
  $kota=$_POST['kota'];
  $provinsi=$_POST['provinsi'];
  $nomor=$_POST['nomor'];

  $sql="UPDATE pelanggan SET id='$id',nama='$nama',alamat='$alamat',kota='$kota',provinsi='$provinsi',nomor='$nomor' WHERE id='$_GET[id]'";
  if($conn->query($sql) === false)
  { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
    trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
  }  
  else 
  { // Jika berhasil alihkan ke halaman tampil.php
    echo "<script>alert('Update Success!')</script>";
  	echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
  }
}

?>   
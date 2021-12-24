<a href="barang.php">Show Data</a>
<br><br>

<?php
include 'config.php';
$jenis=mysqli_query($conn,"SELECT * FROM jenis_barang");
$a=mysqli_query($conn,"SELECT * FROM barang WHERE id='$_GET[id]'");
$b=mysqli_fetch_array($a,MYSQLI_ASSOC);
// $nama_jenis=mysqli_fetch_array($jenis);
// var_dump($nama_jenis);die;
?>
<form method="post">
<input type="hidden" name="id" placeholder="Masukkan ID" value="<?= $b['id'] ?>"><br><br>
	<label for="">Nama Barang : </label>
  <input type="text" name="nama_barang" placeholder="Masukkan Nama" value="<?= $b['nama_barang'] ?>"><br><br>
<label for="">Jenis : </label>
<!-- looping -->

<select name="id_jenis">
<?php

while($nama_jenis=mysqli_fetch_array($jenis)){ ?>
	<option value="<?= $nama_jenis['id'] ?>"> <?= $nama_jenis['nama_jenis']?> </option>

<?php } ?>
</select>
  <!-- end loop -->
  <br><br>
	Harga : <input type="text" name="harga" placeholder="Masukkan Kota" value="<?= $b['harga'] ?>"><br><br>
<input type="submit" name="update" value="Update">
	<input type="reset" name="cancel" value="Cancel">
</form>
<?php
if(isset($_POST['update']))
{
  include 'config.php';
  $id=$_POST['id'];
  $nama_barang=$_POST['nama_barang'];
  $id_jenis=$_POST['id_jenis'];
  $harga=$_POST['harga'];

  $sql="UPDATE barang SET id='$id',nama_barang='$nama_barang',id_jenis='$id_jenis',harga='$harga' WHERE id='$_GET[id]'";
  if($conn->query($sql) === false)
  { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
    trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
  }  
  else 
  { // Jika berhasil alihkan ke halaman tampil.php
    echo "<script>alert('Update Success!')</script>";
  	echo "<meta http-equiv=refresh content=\"0; url=barang.php\">";
  }
}

?>   
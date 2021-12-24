<a href="index.php">Show Data</a>
<br><br>

<?php
include 'config.php';
$pelanggan=mysqli_query($conn,"SELECT * FROM pelanggan");
$barang=mysqli_query($conn,"SELECT * FROM barang");
$a=mysqli_query($conn,"SELECT * FROM orders WHERE id='$_GET[id]'");
$b=mysqli_fetch_array($a,MYSQLI_ASSOC)
?>
<form method="post">
<input type="hidden" name="id" placeholder="Masukkan ID" value="<?= $b['id'] ?>">
<label for="">Pelanggan </label>
<!-- looping -->
<select name="id_pelanggan">
<?php

while($nama_pelanggan=mysqli_fetch_array($pelanggan)){ ?>
	<option value="<?= $nama_pelanggan['id'] ?>"> <?= $nama_pelanggan['nama']?> </option>
<?php } ?>
</select>
  <!-- end loop -->
  <br><br>

  <label for="">Barang </label>
<!-- looping -->
<select name="id_barang">
<?php

while($nama_barang=mysqli_fetch_array($barang)){ ?>
	<option value="<?= $nama_barang['id'] ?>"> <?= $nama_barang['nama_barang']?> </option>
<?php } ?>
</select>
  <!-- end loop -->
  <br><br>
	Jumlah  <input type="text" name="jumlah" value="<?= $b['jumlah'] ?>"><br><br>
<input type="submit" name="update" value="Update">
<input type="reset" name="cancel" value="Cancel">
</form>
<?php
if(isset($_POST['update']))
{
  include 'config.php';
  $id=$_POST['id'];
  $id_pelanggan=$_POST['id_pelanggan'];
  $id_barang=$_POST['id_barang'];
  $jumlah=$_POST['jumlah'];

  
  $a=mysqli_query($conn,"SELECT * FROM barang WHERE id=$id_barang");
  $b=mysqli_fetch_array($a,MYSQLI_ASSOC);
  $total = $jumlah * $b['harga'];

  $sql="UPDATE orders SET id='$id',id_pelanggan='$id_pelanggan',id_barang='$id_barang',jumlah='$jumlah', total='$total' WHERE id='$_GET[id]'";
  if($conn->query($sql) === false)
  { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
    trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
  }  
  else 
  { // Jika berhasil alihkan ke halaman tampil.php
    echo "<script>alert('Update Success!')</script>";
  	echo "<meta http-equiv=refresh content=\"0; url=order.php\">";
  }
}

?>   
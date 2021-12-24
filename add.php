<a href="index.php">Show Data</a>
<br><br>
<form method="post">
  ID : <input type="text" name="id" placeholder="Masukkan ID"><br><br>
  Nama : <input type="text" name="nama" placeholder="Masukkan Nama"><br><br>
  Alamat : <input type="text" name="alamat" placeholder="Masukkan Alamat"><br><br>
  Kota : <input type="text" name="kota" placeholder="Masukkan Kota"><br><br>
  Provinsi : <input type="text" name="provinsi" placeholder="Masukkan Provinsi"><br><br>
  Nomor : <input type="text" name="nomor" placeholder="Masukkan Nomor"><br><br>
  <input type="submit" name="add" value="Add">
  <input type="reset" name="reset" value="Cancel">
</form>
<?php
if (isset($_POST['add'])) {
  include 'config.php';
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $kota = $_POST['kota'];
  $provinsi = $_POST['provinsi'];
  $nomor = $_POST['nomor'];

  $sql = "INSERT INTO pelanggan (id,nama,alamat,kota,provinsi,nomor) VALUES ('$id','$nama','$alamat','$kota','$provinsi','$nomor')";
  if ($conn->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
    trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
  } else {
    echo "<script>alert('Add Success!')</script>";
    echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
  }
}

?>
<a href="jenis_barang.php">Show Data</a>
<br><br>
<form method="post">
  ID : <input type="text" name="id" placeholder="Masukkan ID"><br><br>
  Jenis : <input type="text" name="nama_jenis" placeholder="Masukkan Jenis Barang"><br><br>
  Keterangan : <input type="text" name="keterangan" placeholder="Masukkan Keterangan"><br><br>
  <input type="submit" name="add" value="Add">
  <input type="reset" name="reset" value="Cancel">
</form>
<?php
if (isset($_POST['add'])) {
  include 'config.php';
  $id = $_POST['id'];
  $nama_jenis = $_POST['nama_jenis'];
  $keterangan = $_POST['keterangan'];

  $sql = "INSERT INTO jenis_barang (id,nama_jenis,keterangan) VALUES ('$id','$nama_jenis','$keterangan')";
  if ($conn->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
    trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
  } else { // Jika berhasil alihkan ke halaman tampil.php
    echo "<script>alert('Add Success!')</script>";
    echo "<meta http-equiv=refresh content=\"0; url=jenis_barang.php\">";
  }
}

?>
<?php
include_once("config.php");
$jenis_barang = mysqli_query($conn, "SELECT*FROM jenis_barang");
?>

<a href="barang.php">Show Data</a>
<br><br>
<form method="post">
  <tr>
    <td>ID</td>
    <td><input type="text" name="id" placeholder="Masukkan ID"></td><br><br>
  </tr>
  <tr>
    <td>Nama</td>
    <td><input type="text" name="nama_barang" placeholder="Masukkan Nama"></td><br><br>
  </tr>
  <tr>
    <td> Jenis</td>
    <td><select name="id_jenis" placeholder="Masukkan ID Jenis">
        <?php
        while ($data_jenis = mysqli_fetch_array($jenis_barang)) {
          echo "<option value='" . $data_jenis['id'] . "'>" . $data_jenis['nama_jenis'] . "</option>";
        }
        ?>
      </select></td><br><br>
  </tr>
  <tr>
    <td>Harga</td>
    <td><input type="text" name="harga" placeholder="Masukkan Harga"></td><br><br>
  </tr>
  <input type="submit" name="add" value="Add">
  <input type="reset" name="reset" value="Cancel">
</form>

<?php
if (isset($_POST['add'])) {
  include 'config.php';
  $id = $_POST['id'];
  $nama_barang = $_POST['nama_barang'];
  $id_jenis = $_POST['id_jenis'];
  $harga = $_POST['harga'];

  include_once("config.php");

  $sql = "INSERT INTO barang (id,nama_barang,id_jenis,harga) VALUES ('$id','$nama_barang','$id_jenis','$harga')";
  if ($conn->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
    trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
  } else { // Jika berhasil alihkan ke halaman tampil.php
    echo "<script>alert('Add Success!')</script>";
    echo "<meta http-equiv=refresh content=\"0; url=barang.php\">";
  }
}

?>
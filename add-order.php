<?php
include_once("config.php");
$data_pelanggan = mysqli_query($conn, "SELECT*FROM pelanggan");
$data_barang = mysqli_query($conn, "SELECT*FROM barang");
?>

<a href="order.php">Show Data</a>
<br><br>
<form method="post">
  <tr>
    <td>Nama Pelanggan</td>
    <td><select name="id_pelanggan" placeholder="Masukkan Nama">
        <?php
        while ($pelanggan = mysqli_fetch_array($data_pelanggan)) { ?>

          <option value="<?= $pelanggan['id'] ?>"><?= $pelanggan['nama'] ?></option>

          <!-- "<option value='" . $pelanggan['id'] . "'>" . $pelanggan['nama'] . "</option>"; -->
        <?php
        }
        ?>
      </select></td><br><br>
  </tr>
  <tr>
    <td>Barang</td>
    <td><select name="id_barang" placeholder="Masukkan Barang">
        <?php
        while ($barang = mysqli_fetch_array($data_barang)) { ?>

          <option value="<?= $barang['id'] ?>"><?= $barang['nama_barang'] ?></option>
          <!-- "<option value='" . $barang['id'] . "'>" . $barang['nama_barang'] . "</option>"; -->

        <?php
        }
        ?>
      </select></td><br><br>
  </tr>
  <tr>
    <td>Jumlah</td>
    <td><input type="text" name="jumlah" placeholder="Masukkan Jumlah"></td><br><br>
  </tr>
  
  <input type="submit" name="add" value="Add">
  <input type="reset" name="reset" value="Cancel">
</form>

<?php
if (isset($_POST['add'])) {
  include 'config.php';
  $id = $_POST['id_pelanggan'];
  $nama_barang = $_POST['id_barang'];
  // $nama_jenis = $_POST['nama_jenis'];
  $jumlah = $_POST['jumlah'];  
  $tgl = time();

  $a=mysqli_query($conn,"SELECT * FROM barang WHERE id=$nama_barang");
  $b=mysqli_fetch_array($a,MYSQLI_ASSOC);
  $total = $jumlah * $b['harga'];
  $total = (int)$total;

  $sql = "INSERT INTO orders (id_pelanggan,id_barang,jumlah,total,tanggal) VALUES ('$id','$nama_barang','$jumlah','$total', '$tgl')";
  if ($conn->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
    trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
  } else { // Jika berhasil alihkan ke halaman tampil.php
    echo "<script>alert('Add Success!')</script>";
    echo "<meta http-equiv=refresh content=\"0; url=order.php\">";
  }
}

?>
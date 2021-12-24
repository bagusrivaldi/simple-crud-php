<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<center>
<button type="button" class="btn btn-outline-primary"><a href="index.php">Pelanggan</a> </button>
<button type="button" class="btn btn-outline-primary"><a href="jenis_barang.php">Jenis Barang</a> </button>
<button type="button" class="btn btn-outline-primary"><a href="barang.php">Barang</a> </button>
<button type="button" class="btn btn-outline-primary"><a href="order.php">Order</a></button>
</center>

<button type="button" class="btn btn-outline-secondary"><a href="add-barang.php">Add</a></button>
<br><br>
<table border="" width="100%">
   <tbody>
      <tr>
         <th>ID</th>
         <th>Nama Barang</th>
         <th>Jenis</th>
         <th>Harga</th>
         <th>Action</th>
      </tr>
      <?php
      include 'config.php';
      $a = mysqli_query($conn, "SELECT *, barang.id as id_brg FROM barang JOIN jenis_barang ON jenis_barang.id=barang.id_jenis ");
      while ($b = mysqli_fetch_array($a)) {
      ?>
         <tr>
            <td><?= $b['id_brg']; ?></td>
            <td><?= $b['nama_barang']; ?></td>
            <td><?= $b['nama_jenis']; ?></td>
            <td><?= $b['harga']; ?></td>

            <td>
               <a href="update-barang.php?id=<?= $b['id_brg']; ?>"><b><i>Edit</i></b></a> |
               <a href="barang.php?id=<?= $b['id_brg']; ?>" onclick="return confirm('Are you sure?')"><b><i>Delete</i></b></a>
            </td>
         </tr>
      <?php } ?>
   </tbody>
</table>


<?php
//include 'koneksi.php';
if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $sql = "DELETE FROM barang WHERE id='$id'";
   if ($conn->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
      trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
   } else {
      echo "<script>alert('Delete Success!')</script>";
      echo "<meta http-equiv=refresh content=\"0; url=barang.php\">";
   }
}

?>
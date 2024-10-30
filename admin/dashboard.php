<?php
session_start();
// menghubungkan ke function
require 'function.php';

if (!$_SESSION['role'] == 1) {
  echo "<script>alert('Login Terlebih Dahulu'); window.location.href = '../login/login.php';</script>";
}

$produk = query("SELECT * FROM products");

// cek tombol submit sdh di tekan / blm
if (isset($_POST['submit'])) {

  // cek dta berhasil di tambahkan atau tidak
  if (tambahProducts($_POST) > 0) {
    echo " 
			<script> 
				alert('Data Berhasil Ditambahkan!');
				document.location.href = 'dashboard.php';
			</script>";
  } else {
    echo " 
			<script> 
				alert('Data Gagal Ditambahkan!');
				document.location.href = 'dashboard.php';
			</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

  <!-- my fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">

  <!-- icons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- my css -->
  <link rel="stylesheet" href="./assets/style.css">

</head>

<body>
  <div class="container">
    <div class="form-container">
      <form action="" method="POST" enctype="multipart/form-data">
        <h2>Tambah Produk</h2>
        <div class="form-group">
          <label for="nama">Nama Produk</label>
          <input type="text" id="nama" name="nama" required>
        </div>
        <div class="form-group">
          <label for="des">Deskripsi</label>
          <textarea id="des" name="des" rows="4" required></textarea>
        </div>

        <!-- <div class="form-group">
          <label for="img">Gambar Produk</label>
          <input type="file" id="img" name="img" accept="image/*">
          <div class="img-preview" id="imgPreview">
            <img src="" alt="Image Preview" class="image-preview__image">
            <span class="image-preview__default-text">Image Preview</span>
          </div>
        </div> -->

        <div class="form-group">
          <label for="img">Gambar Produk</label>
          <input type="file" id="img" name="img">
          <img id="imgPreview" src="" alt="Belum adaGambar">
        </div>

        <div class="form-group">
          <label for="harga">Harga</label>
          <input type="number" id="harga" name="harga" required>
        </div>
        <button type="submit" name="submit">Simpan</button>
      </form>
    </div>

    <div class="table-container">
      <button><a href="../login/logout.php" style="color: aliceblue;">Logout</a></button>
      <h2>Tabel Products</h2>
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Product</th>
            <th>Deskripsi</th>
            <th>Image products</th>
            <th>Harga (Rp)</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($produk)) : ?>
            <tr>
              <td colspan="6" style="text-align: center;">Tidak ada data produk</td>
            </tr>
          <?php else : ?>
            <?php $no = 1; ?>
            <?php foreach ($produk as $row) : ?>
              <tr>
                <td><?= $no; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['des']; ?></td>
                <td>
                  <img src="uploads/<?= $row['img']; ?>" alt="" width="100" height="100" style="border-radius: 10px;">
                </td>
                <td><?= number_format($row['harga'], 0, ',', '.'); ?></td>
                <td>
                  <div class="btn-aksi">
                    <a href="edit.php?id_product=<?= $row['id_product']; ?>" class="edit">Edit</a>
                    <a class="hapus" href="delete.php?id_product=<?= $row['id_product']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">Hapus</a>
                  </div>
                </td>
              </tr>
              <?php $no++; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>


  <script src="./assets/script.js"></script>
</body>

</html>
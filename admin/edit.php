<?php
require "function.php";

// ambil data di url
$id = $_GET["id_product"];

// query data mahasiswa berdasarkan id
$produk = query("SELECT * FROM products WHERE id_product = $id")[0];


// cek tombol submit sdh di tekan / blm
if (isset($_POST['submit'])) {

  // cek dta berhasil di ubah atau tidak
  if (editProduct($_POST) > 0) {
    echo " 
			<script> 
				alert('Data Berhasil Diubah!');
				document.location.href = 'dashboard.php';
			</script>";
  } else {
    echo " 
			<script> 
				alert('Data Gagal Diubah!');
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
        <h2>Edit Produk</h2>
        <input type="hidden" name="id_product" value="<?= htmlspecialchars($produk['id_product']); ?>">
        <input type="hidden" name="imglama" value="<?= htmlspecialchars($produk['img']); ?>">
        <div class="form-group">
          <label for="nama">Nama Produk</label>
          <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($produk['nama']); ?>" required>
        </div>
        <div class="form-group">
          <label for="des">Deskripsi</label>
          <textarea id="des" name="des" rows="4" required><?= htmlspecialchars($produk['des']); ?></textarea>
        </div>

        <!-- <div class="form-group">
          <label for="img">Gambar Produk</label>
          <input type="file" id="img" name="img">
          <div class="container-img" style="display: flex; justify-content: space-evenly;"> -->
        <!-- foto lama -->
        <!-- <div class="img-preview">
              <img src="uploads/<?= $produk['img']; ?>" alt="Image Preview" class="image-preview__image" style="display: block;">
            </div> -->

        <!-- foto baru -->
        <!-- <div class="img-preview" id="imgPreview">
              <img src="uploads/<?= $produk['img']; ?>" alt="Image Preview" class="image-preview__image">
              <span class="image-preview__default-text">New Image</span>
            </div>
          </div>
        </div> -->

        <div class="form-group">
          <label for="img">Gambar Produk</label>
          <input type="file" id="img" name="img">
          <img id="imgPreview" src="uploads/<?= $produk['img']; ?>">
        </div>

        <div class="form-group">
          <label for="harga">Harga</label>
          <input type="number" id="harga" name="harga" value="<?= htmlspecialchars($produk['harga']); ?>" required>
        </div>
        <button type="submit" name="submit">Perbarui</button>
        <a href="dashboard.php" class="button">Kembali</a>
      </form>
    </div>
  </div>


  <script src="./assets/script.js"></script>
</body>

</html>
<?php
include '../login/koneksi.php';

if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    $sql = "SELECT * FROM cart WHERE id_produk = '$id_produk'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Data tidak ditemukan";
        exit();
    }
} else {
    echo "ID tidak tersedia";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $upload_path = $row['gambar'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
        $file_name = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $file_type = $_FILES['gambar']['type'];
        $allowed_extensions = array("image/jpeg", "image/jpg", "image/png");

        if (in_array($file_type, $allowed_extensions)) {
            $upload_path = "uploads/" . basename($file_name);
            if (move_uploaded_file($file_tmp, $upload_path)) {
                if (file_exists($row['gambar']) && $row['gambar'] != 'gambar/default.jpg') {
                    unlink($row['gambar']);
                }
            } else {
                echo "Gambar Gagal  yang diunggah.";
                exit();
            }
        } else {
            echo "File harus berupa (JPEG, JPG, PNG).";
            exit();
        }
    }

    $sql = "UPDATE cart SET gambar = '$upload_path', judul = '$judul', isi = '$isi'  WHERE id_produk = '$id_produk'";
    if (mysqli_query($conn, $sql)) {
        header("Location: travel.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="tambah-destinasi">

        <h2>Edit Data</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="judul">Judul:</label>
                <input type="text" id="judul" name="judul" value="<?php echo htmlspecialchars($row['judul']); ?>" required>
            </div>
            <div>
                <label for="isi">Isi:</label>
                <textarea id="isi" name="isi" required><?php echo htmlspecialchars($row['isi']); ?></textarea>
            </div>
            <div>
                <label for="gambar">Gambar:</label>
                <input type="file" id="gambar" name="gambar" required>
                <img src="<?php echo $row['gambar']; ?>" alt="Image Preview" class="image-preview__image">
            </div>
            <div>
                <button type="submit">Edit Data</button>
            </div>
        </form>

    </div>
</body>

</html>
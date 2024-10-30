<?php
include('../login/koneksi.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    // Check if file is uploaded
    if (isset($_FILES['gambar'])) {
        $file_name = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $file_type = $_FILES['gambar']['type'];

        // Check if file is an image
        $allowed_extensions = array("image/jpeg", "image/jpg", "image/png");
        if (in_array($file_type, $allowed_extensions)) {
            // Move uploaded file to desired location
            $upload_path = "uploads/" . $file_name;
            move_uploaded_file($file_tmp, $upload_path);

            // Insert data into database
            $sql = "INSERT INTO cart (gambar, judul, isi ) VALUES ('$upload_path', '$judul', '$isi' )";
            if (mysqli_query($conn, $sql)) {
                // Redirect back to table page
                header("Location: travel.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "File harus berupa gambar (JPEG, JPG, PNG).";
        }
    } else {
        echo "Upload gambar terlebih dahulu.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="tambah-destinasi">

        <h2>Tambah Data</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="judul">Judul:</label>
                <input type="text" id="judul" name="judul" required>
            </div>
            <div>
                <label for="isi">Isi:</label>
                <textarea id="isi" name="isi" required></textarea>
            </div>
            <div>
                <label for="gambar">Gambar:</label>
                <input type="file" id="gambar" name="gambar" required>
            </div>
            <div>
                <button type="submit">Tambah Barang</button>
            </div>
        </form>

    </div>
</body>

</html>
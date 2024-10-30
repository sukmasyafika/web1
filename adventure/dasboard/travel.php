<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
    exit();
}


include('../login/koneksi.php');


// Mengambil data member dari database
$sql = "SELECT * FROM cart";
$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="container">
        <h2>Tabel</h2>
        <a class="btn-tambah" href="insert.php">Tambah Data</a> <br>
        <a class="btn-tambah" href="../login/logout.php">Exit</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><img src="<?php echo htmlspecialchars($row['gambar']); ?>" alt="Gambar"></td>
                            <td><?php echo $row['judul']; ?></td>
                            <td><?php echo $row['isi']; ?></td>
                            <td>
                                <a href="edit.php?id_produk=<?php echo $row['id_produk']; ?>" class="edit">Edit</a>
                                <br> <br>
                                <a href="delete.php?id_produk=<?php echo $row['id_produk']; ?>" class="hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                            </td>
                        </tr>
                <?php
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
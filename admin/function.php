<?php
include '../login/koneksi.php';

function query($query)
{
  global $connect;
  $result = mysqli_query($connect, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


function tambahProducts($data)
{
  global $connect;

  $nama = htmlspecialchars($data["nama"]);
  $dess = htmlspecialchars($data["des"]);
  $harga = htmlspecialchars($data["harga"]);

  // fungsi upload gambar 
  $img = uploadImg();
  // artinya jika gagal maka fungsinya diberhentikan
  if (!$img) {
    echo "<script>
          alert('Gagal mengunggah gambar!');
        </script>";
    return false;
  }

  // Query insert data
  $query = "INSERT INTO products (nama, des, img, harga)
              VALUES ('$nama', '$dess', '$img', '$harga')";

  mysqli_query($connect, $query);

  return mysqli_affected_rows($connect);
}

function uploadImg()
{
  $imgName = $_FILES['img']['name'];
  $imgSize = $_FILES['img']['size'];
  $imgError = $_FILES['img']['error'];
  $imgTmpName = $_FILES['img']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload
  if ($imgError === 4) {
    echo "<script>
            alert('Pilih Gambar Terlebih Dahulu');
          </script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $ekstensiImgValid = ['jpg', 'jpeg', 'png'];
  $ekstensiImg = explode('.', $imgName);
  $ekstensiImg = strtolower(end($ekstensiImg));

  if (!in_array($ekstensiImg, $ekstensiImgValid)) {
    echo "<script>
            alert('Yang Anda upload bukan gambar!');
          </script>";
    return false;
  }

  // cek jika ukuran gambarnya terlalu besar
  if ($imgSize > 1000000) {
    echo "<script>
            alert('Ukuran gambar maksimal 1MB!');
          </script>";
    return false;
  }

  // lolos pengecekan, gambar siap diupload
  $imgNameNew = uniqid() . '.' . $ekstensiImg;
  move_uploaded_file($imgTmpName, 'uploads/' . $imgNameNew);

  return $imgNameNew;
}


function deleteProduct($id)
{
  global $connect;

  mysqli_query($connect, "DELETE FROM products WHERE id_product = $id");

  return mysqli_affected_rows($connect);
}

function editProduct($data)
{
  global $connect;

  if (!isset($data["id_product"])) {
    throw new Exception("ID Product tidak ditemukan");
  }

  $id = $data["id_product"];
  $nama = htmlspecialchars($data["nama"]);
  $dess = htmlspecialchars($data["des"]);
  $harga = htmlspecialchars($data["harga"]);
  $imglama = htmlspecialchars($data["imglama"]);

  // cek apakah user pilih gambar baru / tidak
  if ($_FILES['img']['error'] === 4) {
    $img = $imglama;
  } else {
    $img = uploadImg();
  }

  // query update data
  $query = "UPDATE products SET
                nama = '$nama',
                des = '$dess',
                harga = '$harga',
                img = '$img'
              WHERE id_product = $id";

  mysqli_query($connect, $query);

  return mysqli_affected_rows($connect);
}

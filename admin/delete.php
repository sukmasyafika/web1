
<?php

require 'function.php';

// ambil / menangkap lalu di masukan ke dlm id
$id = $_GET["id_product"];

if (deleteProduct($id) > 0) {
	echo " 
			<script> 
				alert('Data Berhasil Dihapus!');
				document.location.href = 'dashboard.php';
			</script>";
} else {
	echo " 
			<script> 
				alert('Data Gagal Dihapus!');
				document.location.href = 'dashboard.php';
			</script>";
}

?>

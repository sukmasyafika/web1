// document.getElementById('img').addEventListener('change', function () {
//   const file = this.files[0]; // Mengambil file yang diunggah
//   const imgPreview = document.getElementById('imgPreview'); // Mengambil elemen pratinjau gambar
//   const imgElement = imgPreview.querySelector('.image-preview__image'); // Mengambil elemen gambar di dalam pratinjau
//   const defaultText = imgPreview.querySelector('.image-preview__default-text'); // Mengambil elemen teks default

//   if (file) { // Jika ada file yang diunggah
//     if (file.size <= 1048576) { // Jika ukuran file kurang dari atau sama dengan 1MB
//       const reader = new FileReader(); // Membuat instance FileReader untuk membaca file

//       imgElement.style.display = "block"; // Menampilkan elemen gambar
//       defaultText.style.display = "none"; // Menyembunyikan teks default

//       reader.addEventListener('load', function () {
//         imgElement.setAttribute('src', this.result); // Menetapkan sumber gambar ke hasil pembacaan file
//       });

//       reader.readAsDataURL(file); // Membaca file sebagai URL data
//     } else { // Jika ukuran file lebih dari 1MB
//       alert('Ukuran foto yang dapat Di upload adalah 1MB'); // Menampilkan pesan peringatan
//       this.value = ''; // Mengosongkan input file
//       imgElement.style.display = null; // Menyembunyikan elemen gambar
//       defaultText.style.display = null; // Menampilkan teks default
//       imgElement.setAttribute('src', ''); // Menghapus sumber gambar
//     }
//   } else { // Jika tidak ada file yang diunggah
//     imgElement.style.display = null; // Menyembunyikan elemen gambar
//     defaultText.style.display = null; // Menampilkan teks default
//     imgElement.setAttribute('src', ''); // Menghapus sumber gambar
//   }
// });



// Menambahkan event listener pada elemen dengan ID 'img'
// saat pengguna memilih file baru
document.getElementById('img').addEventListener('change', function () {
  // Mengambil file pertama yang dipilih oleh pengguna
  const file = this.files[0];

  // Mengecek apakah ada file yang dipilih
  if (file) {
    // Membuat instance baru dari objek FileReader
    const reader = new FileReader();

    // Menetapkan fungsi yang akan dijalankan saat operasi pembacaan selesai
    reader.onload = function (e) {
      // Mengambil elemen dengan ID 'imgPreview' dan mengatur atribut 'src' dengan hasil pembacaan file
      document.getElementById('imgPreview').src = e.target.result;
    }

    // Memulai proses pembacaan file sebagai URL data (data URL)
    reader.readAsDataURL(file);
  } else {
    // Jika tidak ada file yang dipilih, menghapus 'Belum ada Gambar '
    document.getElementById('imgPreview').src = "";
  }
});




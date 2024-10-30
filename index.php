<?php
session_start();
include './login/koneksi.php';

// Ambil informasi pengguna dari sesi
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : '';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SS Shop | Sukma Syafika</title>

  <!-- my fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">

  <!-- icons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- my css -->
  <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>


  <!-- Awal navbar -->
  <header>
    <a href="https://www.instagram.com/sukmasyafika/" class="logo">SS.Shop</a>

    <input type="checkbox" id="cek">
    <label for="cek" class="icon">
      <i class='bx bx-menu' id="menu-icon"></i>
      <i class='bx bx-x' id="keluar-icon"></i>
    </label>

    <nav class="navbar">
      <a href="#home" class="active">Home</a>
      <a href="#about">About</a>
      <a href="#produk">Product</a>
      <a href="#customer">Our Customer</a>
      <a href="#contact">Contact</a>
    </nav>

    <div class="nav-icon">
      <a href=""><i class='bx bx-heart'></i></a>
      <a href=""><i class='bx bx-cart'></i></a>
      <a href="#" id="profile-icon" class="user-icon"><i class='bx bx-user'></i></a>

      <?php if ($role) : ?>
        <form action="./login/logout.php" method="POST">
          <button class="logout" type="submit" onclick="return confirm('Apakah Anda Yakin Untuk Logout ?')">Logout</button>
        </form>
      <?php endif ?>
      <?php if (!$role) : ?>
        <form action="login/login.php" method="POST">
          <button class="logout" type="submit">Masuk/Daftar</button>
        </form>
      <?php endif ?>
    </div>

    <!-- Modal Profil -->
    <div id="profile-modal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <h2>Profil Pengguna</h2>
          <span class="close">&times;</span>
        </div>
        <div class="modal-body">
          <p><strong>Nama:</strong> <?php echo htmlspecialchars($nama); ?></p>
          <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
          <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
          <p><strong>Role:</strong> <?php echo htmlspecialchars($role == 1 ? 'User' : 'Admin'); ?></p>
        </div>
      </div>
    </div>

    <!-- Akhir Modal Profil -->

  </header>
  <!-- Akhir navbar -->

  <!-- awal home -->
  <section class="main-home" id="home">
    <div class="main-text">
      <h5>Hot promotions</h5>
      <h1>Ultimate Quality <br> <span>Beauty of Skin</span></h1>
      <h3>Skincare & Makeup</h3>
      <p>Hemat lebih banyak dengan kupon dan diskon hingga 20%.</p>

      <input type="button" value="Shop Now" class="main-btn">
    </div>

    <div class="arrow">
      <a href="#about" class="down">
        <i class='bx bx-down-arrow-alt'></i>
      </a>
    </div>

  </section>
  <!-- Akhir home -->

  <!-- awal about -->
  <section class="about" id="about">
    <h2 class="sub-title">About <span>Us</span></h2>
    <div class="heading">
      <p>
        SS shop adalah produk skincare & makeup Dibuat menggunakan bahan-bahan yang bersih dan tidak beracun, produk kami dirancang untuk semua orang.
      </p>
    </div>

    <div class="container-about">
      <div class="img-about">
        <img src="./assets/img/bg/about-1.jpg" alt="">
      </div>
      <div class="about-content">
        <h2>Mengungkapkan Kecantikan Kulit</h2>
        <p>Perhatian terhadap detail dan komitmen terhadap kualitas adalah inti dari koleksi skincare dan makeup kami. Setiap produk diformulasikan dengan teliti untuk memberikan hasil yang luar biasa, menjaga Anda tetap bercahaya dan percaya diri di setiap kesempatan. Dari pelembab yang kaya nutrisi hingga serum yang memberikan kilau sehat, kami menghadirkan produk yang mampu memenuhi berbagai kebutuhan kulit Anda.</p>
      </div>
    </div>
  </section>
  <!-- akhir about -->

  <!-- awal produk -->
  <section class="new" id="produk">
    <h2 class="sub-title">Our Trending <span>Products</span></h2>
    <div class="new-grid">
      <?php
      global $connect;
      $query = "SELECT * FROM products";
      $result = $connect->query($query);

      if ($result->num_rows > 0) :
        while ($row = $result->fetch_assoc()) : ?>
          <div class="new">
            <div class="new-banner">
              <img src="admin/uploads/<?= $row['img']; ?>" alt="" width="200" height="200" class="product-img default">
              <p class="new-badge">hot</p>
              <div class="new-actions">
                <button class="btn-action">
                  <i class='bx bx-heart'></i>
                </button>
                <button class="btn-action">
                  <i class='bx bx-low-vision'></i>
                </button>
                <button class="btn-action">
                  <i class='bx bx-shuffle'></i>
                </button>
                <button class="btn-action">
                  <i class='bx bxs-shopping-bag'></i>
                </button>
              </div>
            </div>

            <div class="new-konten">
              <a href="" class="new-category"><?= $row['nama']; ?></a>
              <a href="">
                <h3 class="new-judul"><?= $row['des']; ?></h3>
              </a>
              <div class="new-rating">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
              </div>
              <div class="hrga-box">
                <p class="hrga"><?= 'Rp ' . number_format($row['harga'], 0, ',', '.') ?></p>
                <!-- <?php if ($row['diskon'] > 0) : ?>
                  <p class="disk"><?= 'Rp. ' . number_format($row['harga'], 0, ',', '.') ?></p>
                <?php endif ?> -->
              </div>
            </div>
          </div>
        <?php endwhile ?>
      <?php else : ?>
        <p style="text-align: center; font-size: 20px;">Data Kosong</p>
      <?php endif ?>
    </div>
  </section>
  <!-- akhir produk -->


  <!-- awal costumer  -->
  <section class="customer" id="customer">
    <h2 class="sub-title">Our <span>Customer</span></h2>

    <div class="container-customer">
      <div class="kanan">
        <h1>Baca apa yang disukai pelanggan tentang kami</h1>
        <p>
          Lorem, ipsum dolor sit amet consectetur
          adipisicing elit. Nobis, tenetur maxime veniam
          possimus sit laudantium
          ducimus esse deleniti iusto accusamus?
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur
          adipisicing elit. Eos excepturi error amet
          temporibus cumque reiciendis.
        </p>
        <button>Read More</button>
      </div>

      <div class="Kiri">
        <div class="card">
          <img src="./assets/img/profil/p1.jpg" alt="user" />
          <div class="card-content">
            <span><i class='bx bxs-quote-alt-left'></i></span>
            <div class="card-detail">
              <p>
                Fashion di sini adalah yang terbaik! Saya terus datang kembali untuk mendapatkan lebih banyak lagi
                sangat recomendasi. dan Suasana luar biasa dan staf yang ramah. Sangat dianjurkan.
              </p>
              <h4>- Basril Hatriwan</h4>
              <i class='bx bxs-star'></i>
              <i class='bx bxs-star'></i>
              <i class='bx bxs-star'></i>
              <i class='bx bxs-star'></i>
              <i class='bx bxs-star'></i>
            </div>
          </div>
        </div>

        <div class="card">
          <img src="./assets/img/profil/p2.jpg" alt="user" />
          <div class="card-content">
            <span><i class='bx bxs-quote-alt-left'></i></span>
            <div class="card-detail">
              <p>
                Fashion di sini adalah yang terbaik! Saya terus datang kembali untuk mendapatkan lebih banyak lagi
                sangat recomendasi. dan Suasana luar biasa dan staf yang ramah. Sangat dianjurkan.
              </p>
              <h4>- Annisa Putri</h4>
              <i class='bx bxs-star'></i>
              <i class='bx bxs-star'></i>
              <i class='bx bxs-star'></i>
              <i class='bx bxs-star'></i>
              <i class='bx bxs-star'></i>
            </div>
          </div>
        </div>

        <div class="card">
          <img src="./assets/img/profil/p3.jpg" alt="user" />
          <div class="card-content">
            <span><i class='bx bxs-quote-alt-left'></i></span>
            <div class="card-detail">
              <p>
                Fashion di sini adalah yang terbaik! Saya terus datang kembali untuk mendapatkan lebih banyak lagi
                sangat recomendasi. dan Suasana luar biasa dan staf yang ramah. Sangat dianjurkan.
              </p>
              <h4>- Sukma Syafika</h4>
              <i class='bx bxs-star'></i>
              <i class='bx bxs-star'></i>
              <i class='bx bxs-star'></i>
              <i class='bx bxs-star'></i>
              <i class='bx bxs-star'></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- akhir costumer  -->

  <!-- awal kontak -->
  <section class="contact" id="contact">
    <h2 class="sub-title">Contact <span>Information</span></h2>

    <div class="news-container">
      <h3 class="jdl">
        Daftar untuk menerima penawaran dan pembaruan eksklusif <br>
        Lalu terima kupon Rp20 untuk belanja pertama
      </h3>

      <form action="" class="news-form">
        <input type="email" placeholder="Masukan Email Kamu" class="news-input">

        <button type="submit" class="news-btn">Subscibe</button>

      </form>
    </div>

  </section>
  <!-- Akhir kontak -->

  <!-- awal footer -->
  <footer class="footer-continer">
    <div class="footer-grid">

      <div class="footer-content">
        <h3 class="sub-footer ">Contact</h3>

        <div class="contact-details">
          <i class='bx bx-map'></i>
          <p> Jl. Abepura, Jayapura, Papua</p>
        </div>

        <div class="contact-details">
          <i class='bx bx-phone'></i>
          <p> +6281234567890</p>
        </div>

        <div class="contact-details">
          <i class='bx bx-time'></i>
          <p> 10:00 - 18:00, Senin - Sabtu</p>
        </div>

        <div class="sosmed-footer">
          <h4 class="sub-footer">Follow Here</h4>

          <div class="sosial-footer">
            <a href=""><i class='bx bxl-youtube'></i></a>
            <a href=""><i class='bx bxl-instagram'></i></a>
            <a href=""><i class='bx bxl-facebook'></i></a>
            <a href=""><i class='bx bxl-twitter'></i></a>
          </div>
        </div>

      </div>

      <div class="footer-content">
        <h3 class="footer-title">My Account</h3>
        <div class="links">
          <li><a href="#">Sign In</a></li>
          <li><a href="#">View Cart</a></li>
          <li><a href="#">My Wishlist</a></li>
          <li><a href="#">Track My Order</a></li>
          <li><a href="#">Help</a></li>
          <li><a href="#">Order</a></li>
        </div>
      </div>

      <div class="footer-content">
        <h3 class="footer-title">Company</h3>
        <div class="links">
          <li><a href="#home">Home</a></li>
          <li><a href="#produk">Product</a></li>
          <li><a href="#new">New Arrivals</a></li>
          <li><a href="#customer">Our Customer</a></li>
          <li><a href="#contact">Contact</a></li>
        </div>
      </div>

      <div class="footer-content">
        <h3 class="footer-title">Secured Payment Gateways</h3>

        <img src="./assets/img/footer/payment.png" alt="" class="payment">

      </div>

    </div>
  </footer>

  <div class="footer-bwh">
    <p>Copyright @2024. Designed by<span> Sukma Syafika</span> All Right Reserved. </p>
  </div>
  <!-- akhir footer -->


  <script src="./assets/js/script.js"></script>
</body>

</html>
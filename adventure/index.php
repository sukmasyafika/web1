<?php
// session_start();

// if (!isset($_SESSION['username'])) {
//     header("Location: ./login/login.php");
//     exit(); // Terminate script execution after the redirect
// }

include('./login/koneksi.php');

// Query untuk mengambil data anggota dari database
$sql = "SELECT * FROM cart";
$result = mysqli_query($conn, $sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DESTINASI</title>
  <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
  <script src="app.js"></script>
  <!-- Navbar -->
  <nav class="navbar">
    <h1 class="logo">ADVENTURE</h1>
    <ul class="nav-links">
      <li><a href="#home">Home</a></li>
      <li><a href="#event">Event</a></li>
      <li><a href="#explore">Explore</a></li>
      <li><a href="#tours">Tours</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </nav>

  <header>
    <div class="header-content" id="home">
      <h2>Explore The Colorfull World</h2>
      <h1 id="typing-text">A WONDERFULL GIFT</h1>
    </div>
  </header>

  <!--== Event ==-->
  <section class="event" id="event">
    <div class="title">
      <h1>Upcoming Event</h1>
    </div>
    <div class="row">
      <div class="col">
        <img src="./img/img1.png" alt="">
        <h4>Everest Camp Track</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nostrum, quibusdam perferendis dolores voluptas sapiente veritatis beatae cum facere aspernatur quam neque aperiam vel deleniti sunt error debitis reprehenderit pariatur?</p>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <img src="./img/img2.png" alt="">
        <h4>Walking Hollydays</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab nesciunt asperiores et earum non quis modi repudiandae fuga vel, sint deleniti eius dolore, officiis a veritatis eum quo officia ad!</p>
      </div>
    </div>
  </section>


  <!-- explore -->
  <section class="explore" id="explore">
    <div class="explore-content">
      <h1>EXPLORE THE WORLD</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga tempora ratione est. Blanditiis, earum repellendus nulla totam nihil, cupiditate quo, sit ad a consectetur in error saepe enim illo quisquam.</P>
    </div>
  </section>

  <!-- turs -->
  <section class="tours" id="tours">
    <h1 class="judul">Tours</h1>
    <div class="card-container">
      <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <div class="card">
            <img src="./dasboard/<?php echo $row['gambar']; ?>">
            <div class="card-content">
              <h3><?php echo $row['judul']; ?></h3>
              <P><?php echo $row['isi']; ?></P>
            </div>
          </div>
      <?php
        }
      } else {
        echo "Tidak ada data Member.";
      }
      ?>
    </div>
  </section>

  <!-- Contact  -->
  <section class="contact" id="contact">
    <h2>Contact Us</h2>
    <form>
      <label for="name">Nama</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email</label>
      <input type="text" id="email" name="email" required>

      <label for="pesan">Pesan</label>
      <textarea id="pesan" name="pesan" required></textarea>

      <button type="submit">Kirim</button>
    </form>
  </section>

  <!-- footer  -->
  <section class="footer">
    <h3>Copyright &copy; <a href="https://www.instagram.com/gheyafanny.">Fanny Debora</a> 2024</h3>
  </section>
</body>

</html>
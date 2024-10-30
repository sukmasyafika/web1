<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

  <!-- icons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <div class="container">
    <div class="container-regis">
      <form action="add.php" method="post">
        <h1 class="heading-login">Register</h1>
        <div class="content">
          <i class='bx bxs-user'></i>
          <input type="nama" placeholder="Nama" name="nama" required>
        </div>
        <div class="content">
          <i class='bx bx-user-circle'></i>
          <input type="username" placeholder="Username" name="username" required>
        </div>
        <div class="content">
          <i class='bx bx-envelope'></i>
          <input type="email" placeholder="Email" name="email" required>
        </div>
        <div class="content">
          <i class='bx bxs-lock-alt'></i>
          <input type="password" placeholder="Password" name="password" required>
        </div>
        <button name="submit" type="submit" class="btn-login">Submit</button>
        <div class="account">
          <p><a href="login.php">Already have account? Login</a></p>
        </div>
      </form>
      <img src="../assets/img/login/regis.png" alt="">
    </div>
  </div>
</body>

</html>
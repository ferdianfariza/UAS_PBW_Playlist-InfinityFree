<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyertakan code dari file koneksi
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $stmt = $conn->prepare("SELECT username FROM user WHERE username=? AND password=?");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $hasil = $stmt->get_result();
  $row = $hasil->fetch_array(MYSQLI_ASSOC);

  var_dump($row); // Debugging: cek isi $row

  if (!empty($row) && $row['username'] == 'admin') {
    $_SESSION['username'] = $row['username'];
    header("location:admin.php");
  } elseif (!empty($row)) {
    $_SESSION['username'] = $row['username'];
    header("location:index.php");
  } else {
    header("location:login.php");
  }


  $stmt->close();
  $conn->close();
} else {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="./img/fe.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f8f9fa;
      }

      .form-signin {
        max-width: 330px;
        padding: 2rem;
        background: white;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
    </style>
  </head>

  <body>
    <main class="form-signin">
      <form method="POST" action="">
        <img class="mb-4" src="./img/fe.png" alt="F logo" width="72" height="72">
        <h1 class="h3 mb-3 fw-normal">Playlist Sign In</h1>

        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
          <label for="username">Username</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>

        <button class="btn btn-primary w-100" type="submit">Sign in</button>
        <?php if (!empty($error_message)): ?>
          <p class="text-danger text-center mt-3"> <?= $error_message ?> </p>
        <?php endif; ?>
        <p class="mt-5 mb-3 text-muted">© 2024 Ferdian</p>
      </form>
    </main>
  </body>

  </html>

<?php
}
?>
<?php
require_once '../db.php';
require_once '../config.php';

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lastname = trim($_POST['last_name']);
    $firstname = trim($_POST['first_name']);
    $username = trim($_POST['username']);
    $raw_password = $_POST['password'];

    if (empty($lastname) || empty($firstname) || empty($username) || empty($raw_password)) {
        $error = "Minden mező kitöltése kötelező!";
    } else {
        try {
            $password = password_hash($raw_password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (last_name, first_name, username, password) VALUES (?, ?, ?, ?)");
            $stmt->execute([$lastname, $firstname, $username, $password]);
            $message = "Sikeres regisztráció! <a href='login.php'>Jelentkezz be</a>.";
        } catch (PDOException $e) {
            $error = "A felhasználónév már foglalt!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Regisztráció</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<section class="section" id="register">
  <div class="container" style="max-width: 500px; margin: 0 auto;">
    <h2>Regisztráció</h2>

    <?php if ($error): ?>
      <p style="color: red; font-weight: bold;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($message): ?>
      <p style="color: green; font-weight: bold;"><?= $message ?></p>
    <?php endif; ?>

    <form method="post" class="contact-form" style="margin-top: 20px;">
      <div class="form-group">
        <label for="last_name">Vezetéknév</label>
        <input type="text" id="last_name" name="last_name" placeholder="Add meg a vezetékneved" required>
      </div>

      <div class="form-group">
        <label for="first_name">Keresztnév</label>
        <input type="text" id="first_name" name="first_name" placeholder="Add meg a keresztneved" required>
      </div>

      <div class="form-group">
        <label for="username">Felhasználónév</label>
        <input type="text" id="username" name="username" placeholder="Válassz felhasználónevet" required>
      </div>

      <div class="form-group">
        <label for="password">Jelszó</label>
        <input type="password" id="password" name="password" placeholder="Adj meg egy jelszót" required>
      </div>

      <button type="submit" class="btn">Regisztráció</button>
    </form>

    <p style="margin-top: 15px; text-align: center;">
      Már van fiókod?
      <a href="login.php" style="color: #ff6a3d; font-weight: 600;">Jelentkezz be itt.</a>
    </p>
  </div>
</section>

</body>
</html>

<?php
require_once '../db.php';
require_once '../config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Sikeres login
        $_SESSION['user'] = [
            'id' => $user['id'],
            'last_name' => $user['last_name'],
            'first_name' => $user['first_name'],
            'username' => $user['username']
        ];

        // Itt dönti el, hogy admin vagy sima user
        if ($user['username'] === 'admin') {
            header('Location: ../admin/messages.php');
        } else {
            header('Location: ../index.php');
        }
        exit;
    } else {
        $error = "Hibás felhasználónév vagy jelszó!";
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bejelentkezés</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<section class="section" id="login">
  <div class="container" style="max-width: 400px; margin: 0 auto;">
    <h2>Bejelentkezés</h2>

    <?php if ($error): ?>
      <p style="color: red; font-weight: bold;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" class="contact-form" style="margin-top: 20px;">
      <div class="form-group">
        <label for="username">Felhasználónév</label>
        <input type="text" id="username" name="username" placeholder="Add meg a felhasználóneved" required>
      </div>

      <div class="form-group">
        <label for="password">Jelszó</label>
        <input type="password" id="password" name="password" placeholder="Add meg a jelszavad" required>
      </div>

      <button type="submit" class="btn">Belépés</button>
    </form>

    <p style="margin-top: 15px; text-align: center;">
      Még nincs fiókod?
      <a href="register.php" style="color: #ff6a3d; font-weight: 600;">Regisztrálj itt.</a>
    </p>
  </div>
</section>

</body>
</html>

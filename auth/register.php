<?php
require_once '../db.php';
require_once '../config.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lastname = trim($_POST['last_name']);
    $firstname = trim($_POST['first_name']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($lastname) || empty($firstname) || empty($username) || empty($password)) {
        $error = "Minden mező kitöltése kötelező!";
    } elseif (!preg_match('/^(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
        $error = "A jelszónak legalább 8 karakter hosszúnak kell lennie, tartalmaznia kell nagybetűt és számot is!";
    } else {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            $error = "Ez a felhasználónév már foglalt!";
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("INSERT INTO users (last_name, first_name, username, password) VALUES (?, ?, ?, ?)");
            $stmt->execute([$lastname, $firstname, $username, $passwordHash]);

            $success = "Sikeres regisztráció! <a href='login.php'>Jelentkezz be itt</a>.";
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
  <script defer src="../assets/js/register.js"></script>
</head>
<body>

<section class="section" id="register">
  <div class="container" style="max-width: 400px; margin: 0 auto;">
    <h2>Regisztráció</h2>

    <?php if ($error): ?>
      <p style="color: red; font-weight: bold;"><?= htmlspecialchars($error) ?></p>
    <?php elseif ($success): ?>
      <p style="color: green; font-weight: bold;"><?= $success ?></p>
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
        <input type="text" id="username" name="username" placeholder="Válassz egy felhasználónevet" required>
      </div>

      <div class="form-group">
        <label for="password">Jelszó</label>
        <input type="password" id="password" name="password" placeholder="Adj meg egy jelszót" required oninput="checkPasswordStrength()">
        <small id="password-strength" style="font-weight: bold; display: block; margin-top: 5px;"></small>
      </div>

      <button type="submit" class="btn">Regisztráció</button>
    </form>

    <!-- Új navigációs gombok -->
    <div style="margin-top: 20px; display: flex; justify-content: space-between;">
      <a href="../index.php" class="btn small">Főoldal</a>
      <a href="login.php" class="btn small secondary">Bejelentkezés</a>
    </div>

  </div>
</section>

</body>
</html>

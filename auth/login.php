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
        // Bejelentkezés sikeres
        $_SESSION['user'] = [
            'id' => $user['id'],
            'last_name' => $user['last_name'],
            'first_name' => $user['first_name'],
            'username' => $user['username']
        ];
        header('Location: ../index.php');
        exit;
    } else {
        $error = "Hibás felhasználónév vagy jelszó!";
    }
}
?>

<h2>Bejelentkezés</h2>

<?php if ($error): ?>
    <p style="color:red;"><?= $error ?></p>
<?php endif; ?>

<form method="post">
    <label>Felhasználónév:</label>
    <input type="text" name="username" required>

    <label>Jelszó:</label>
    <input type="password" name="password" required>

    <button type="submit">Belépés</button>
</form>

<p>Még nincs fiókod? <a href="register.php">Regisztrálj itt</a>.</p>
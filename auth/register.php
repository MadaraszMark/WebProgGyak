<?php
require_once '../db.php';
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lastname = trim($_POST['last_name']);
    $firstname = trim($_POST['first_name']);
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Ellenőrzés – üres mezők
    if (empty($lastname) || empty($firstname) || empty($username) || empty($_POST['password'])) {
        echo "<p>Minden mező kitöltése kötelező!</p>";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO users (last_name, first_name, username, password) VALUES (?, ?, ?, ?)");
            $stmt->execute([$lastname, $firstname, $username, $password]);
            echo "<p>Sikeres regisztráció! <a href='login.php'>Jelentkezz be</a>.</p>";
        } catch (PDOException $e) {
            echo "<p>Hiba: felhasználónév már foglalt?</p>";
        }
    }
}
?>

<h2>Regisztráció</h2>
<form method="post">
    <label>Vezetéknév:</label>
    <input type="text" name="last_name" required>

    <label>Keresztnév:</label>
    <input type="text" name="first_name" required>

    <label>Felhasználónév:</label>
    <input type="text" name="username" required>

    <label>Jelszó:</label>
    <input type="password" name="password" required>

    <button type="submit">Regisztráció</button>
</form>
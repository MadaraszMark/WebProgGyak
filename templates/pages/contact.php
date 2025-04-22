<?php
require_once 'db.php';
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $user_id = isset($_SESSION['user']) ? $_SESSION['user']['id'] : null;

    // Egyszerű szerveroldali validáció
    if (empty($name) || empty($email) || empty($message)) {
        echo "<p style='color:red;'>Minden mezőt ki kell tölteni!</p>";
    } else {
        $stmt = $pdo->prepare("INSERT INTO messages (name, email, message, user_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $message, $user_id]);
        header("Location: index.php?page=contact-success");
        exit;
    }
}
?>

<h2>Kapcsolat</h2>
<p>Vedd fel velünk a kapcsolatot az alábbi űrlapon keresztül!</p>

<form action="index.php?page=contact" method="post" id="contact-form">
    <label for="name">Név:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email cím:</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Üzenet:</label>
    <textarea id="message" name="message" rows="5" required></textarea>

    <button type="submit">Küldés</button>
</form>

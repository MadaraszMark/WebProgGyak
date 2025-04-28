<?php
require_once 'db.php';
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $user_id = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;

    if (!empty($name) && !empty($email) && !empty($message)) {
        $stmt = $pdo->prepare("INSERT INTO messages (name, email, message, user_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $message, $user_id]);
        header('Location: index.php?page=contact-success');
        exit;
    } else {
        echo "<p style='color:red; text-align:center;'> Minden mezőt ki kell tölteni!</p>";
    }
}
?>

<section class="section" id="contact">
  <div class="container" data-aos="fade-up" style="max-width: 600px; margin: 0 auto;">
    <h2>Kapcsolat</h2>
    <p>Írj nekünk, ha kérdésed van, vagy szeretnél ajánlatot kérni flottakezelésre vagy autóbérlésre!</p>

    <form action="index.php?page=contact" method="post" class="contact-form" data-aos="zoom-in" data-aos-delay="200" onsubmit="return validateContactForm()">
      <div class="form-group">
        <label for="name">Név</label>
        <input type="text" id="name" name="name" placeholder="Add meg a neved" required>
      </div>

      <div class="form-group">
        <label for="email">Email cím</label>
        <input type="email" id="email" name="email" placeholder="Add meg az email címed" required>
      </div>

      <div class="form-group">
        <label for="message">Üzenet</label>
        <textarea id="message" name="message" rows="6" placeholder="Írd ide az üzeneted..." required></textarea>
      </div>

      <button type="submit" class="btn">Üzenet küldése</button>
    </form>
  </div>
</section>





<?php
$admin_page = true;
require_once '../config.php';
require_once '../db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['username'] !== 'admin') {
    header('Location: ../index.php');
    exit;
}

$stmt = $pdo->query("SELECT * FROM messages ORDER BY created_at DESC");
$messages = $stmt->fetchAll();
?>

<?php include '../templates/header.php'; ?>

<section class="section">
  <div class="container" style="max-width: 1000px; margin: 0 auto;" data-aos="fade-up">
    <h2>Beérkezett üzenetek</h2>

    <?php if (count($messages) > 0): ?>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>Név</th>
              <th>Email</th>
              <th>Üzenet</th>
              <th>Küldve</th>
              <th>Művelet</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($messages as $msg): ?>
              <tr>
                <td><?= htmlspecialchars($msg['name']) ?></td>
                <td><?= htmlspecialchars($msg['email']) ?></td>
                <td><?= nl2br(htmlspecialchars($msg['message'])) ?></td>
                <td><?= date('Y-m-d H:i', strtotime($msg['created_at'])) ?></td>
                <td>
                  <form method="post" action="delete_message.php" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $msg['id'] ?>">
                    <button type="submit" class="btn small secondary" onclick="return confirm('Biztosan törlöd ezt az üzenetet?');">Törlés</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <p style="text-align:center;">Még nincs egy üzenet sem.</p>
    <?php endif; ?>
  </div>
</section>

<?php include '../templates/footer.php'; ?>


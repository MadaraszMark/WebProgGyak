<?php
require_once 'db.php';

if (!isset($_SESSION['user'])) {
    header('Location: index.php?page=login');
    exit;
}

$stmt = $pdo->query("
    SELECT messages.*, 
           users.first_name, 
           users.last_name 
    FROM messages
    LEFT JOIN users ON messages.user_id = users.id
    ORDER BY created_at DESC
");
$messages = $stmt->fetchAll();
?>

<section class="section" id="messages">
  <div class="container" style="max-width: 1000px; margin: 0 auto;" data-aos="fade-up">
    <h2>Beérkezett üzenetek</h2>

    <?php if (count($messages) > 0): ?>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>Küldő</th>
              <th>Email</th>
              <th>Üzenet</th>
              <th>Küldés ideje</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($messages as $msg): ?>
              <tr>
                <td>
                  <?php
                    if (!empty($msg['first_name']) && !empty($msg['last_name'])) {
                        echo htmlspecialchars($msg['last_name'] . ' ' . $msg['first_name']);
                    } else {
                        echo 'Vendég';
                    }
                  ?>
                </td>
                <td><?= htmlspecialchars($msg['email']) ?></td>
                <td><?= nl2br(htmlspecialchars($msg['message'])) ?></td>
                <td><?= date('Y-m-d H:i', strtotime($msg['created_at'])) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <p>Még nincs üzenet az adatbázisban.</p>
    <?php endif; ?>
  </div>
</section>


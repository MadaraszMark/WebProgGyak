<section class="section" id="messages">
  <div class="container" data-aos="fade-up">
    <h2>Beérkezett üzenetek</h2>

    <?php
    if (!isset($_SESSION['user'])) {
      echo "<p>Kérlek, jelentkezz be az üzenetek megtekintéséhez.</p>";
    } else {
      require_once 'db.php';

      $stmt = $pdo->query("
        SELECT m.*, u.first_name, u.last_name
        FROM messages m
        LEFT JOIN users u ON m.user_id = u.id
        ORDER BY m.created_at DESC
      ");
      $messages = $stmt->fetchAll();

      if (count($messages) === 0) {
        echo "<p>Még nem érkezett üzenet.</p>";
      } else {
        echo '<div class="table-container" data-aos="zoom-in" data-aos-delay="200">';
        echo '<table>';
        echo '<thead><tr><th>Dátum</th><th>Név</th><th>Email</th><th>Üzenet</th></tr></thead><tbody>';
        foreach ($messages as $msg) {
          $nev = $msg['user_id'] ? "{$msg['last_name']} {$msg['first_name']}" : "Vendég";
          echo "<tr>
                  <td>{$msg['created_at']}</td>
                  <td>{$nev}</td>
                  <td>" . htmlspecialchars($msg['email']) . "</td>
                  <td>" . nl2br(htmlspecialchars($msg['message'])) . "</td>
                </tr>";
        }
        echo '</tbody></table></div>';
      }
    }
    ?>
  </div>
</section>

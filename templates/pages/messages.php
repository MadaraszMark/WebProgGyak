<?php
require_once 'db.php';
require_once 'config.php';

if (!isset($_SESSION['user'])):
?>
    <p>Az üzenetek megtekintéséhez kérlek <a href="auth/login.php">jelentkezz be</a>.</p>
<?php
else:
    $stmt = $pdo->query("
        SELECT m.*, u.first_name, u.last_name
        FROM messages m
        LEFT JOIN users u ON m.user_id = u.id
        ORDER BY m.created_at DESC
    ");
    $messages = $stmt->fetchAll();
?>

<h2>Beérkezett üzenetek</h2>

<?php if (count($messages) === 0): ?>
    <p>Még nem érkezett üzenet.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Dátum</th>
                <th>Küldő</th>
                <th>Email</th>
                <th>Üzenet</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $msg): ?>
                <tr>
                    <td><?= $msg['created_at'] ?></td>
                    <td>
                        <?php if ($msg['user_id']): ?>
                            <?= $msg['last_name'] . ' ' . $msg['first_name'] ?>
                        <?php else: ?>
                            Vendég
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($msg['email']) ?></td>
                    <td><?= nl2br(htmlspecialchars($msg['message'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<?php endif; ?>

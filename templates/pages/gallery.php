<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM gallery ORDER BY uploaded_at DESC");
$images = $stmt->fetchAll();
?>

<h2>Galéria</h2>
<p>Flottánk pillanatai, felhasználóinktól:</p>

<div class="gallery-grid">
    <?php foreach ($images as $img): ?>
        <img src="uploads/<?= htmlspecialchars($img['filename']) ?>" alt="Galéria kép">
    <?php endforeach; ?>
</div>

<?php if (isset($_SESSION['user'])): ?>
    <section>
        <h3>Kép feltöltése</h3>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image" accept="image/*" required>
            <button type="submit">Feltöltés</button>
        </form>
    </section>
<?php endif; ?>

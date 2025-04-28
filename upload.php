<?php
require_once 'db.php';
require_once 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php?page=gallery");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image'];

    if ($file['error'] === UPLOAD_ERR_OK && $file['size'] < 5 * 1024 * 1024) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
        if (in_array($file['type'], $allowedTypes)) {
            $filename = uniqid() . '_' . basename($file['name']);
            $targetPath = "uploads/" . $filename;

            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                $stmt = $pdo->prepare("INSERT INTO gallery (filename, uploaded_by) VALUES (?, ?)");
                $stmt->execute([$filename, $_SESSION['user']['id']]);
                header("Location: index.php?page=gallery");
                exit;
            } else {
                echo "<p>Hiba történt a fájl mentése közben.</p>";
            }

        } else {
            echo "<p>Csak JPG, PNG vagy WEBP formátum engedélyezett.</p>";
        }
    } else {
        echo "<p>A kép túl nagy vagy nem tölthető fel.</p>";
    }
} else {
    header("Location: index.php?page=gallery");
    exit;
}
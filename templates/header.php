<?php
// templates/header.php
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title><?= $SITE_TITLE ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
    <h1><?= $SITE_TITLE ?></h1>

    <nav>
        <ul>
            <?php foreach ($pages as $key => $title): ?>
                <?php
                    // Üzenetek menü csak bejelentkezve
                    if ($key === 'messages' && !isset($_SESSION['user'])) continue;
                ?>
                <li><a href="index.php?page=<?= $key ?>"><?= $title ?></a></li>
            <?php endforeach; ?>

            <!-- Dinamikus Belépés / Kilépés -->
            <?php if (!isset($_SESSION['user'])): ?>
                <li><a href="auth/login.php">Belépés</a></li>
            <?php else: ?>
                <li><a href="auth/logout.php">Kilépés</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <?php if (isset($_SESSION['user'])): ?>
        <p style="margin-top: 10px;">
            Bejelentkezett: <?= $_SESSION['user']['last_name'] . ' ' . $_SESSION['user']['first_name'] ?>
            (<?= $_SESSION['user']['username'] ?>)
        </p>
    <?php endif; ?>
</header>

<main>

<!-- templates/header.php -->
<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Autókereskedés & Flottakezelő</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

  <!-- Saját CSS -->
<?php if (isset($admin_page) && $admin_page): ?>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
<?php else: ?>
  <link rel="stylesheet" href="assets/css/style.css">
<?php endif; ?>

  <!-- AOS animáció -->
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- Saját JS -->
  <script defer src="assets/js/script.js"></script>
</head>
<body>
  <header class="main-header">
    <div class="container">
      <h1 class="site-title">Autókereskedés & Flottakezelő</h1>
      <nav class="nav-menu">
  <ul>
    <?php if (isset($admin_page) && $admin_page): ?>
      <li><a href="messages.php">Üzenetek</a></li>
      <li><a href="../auth/logout.php" class="btn small secondary">Kilépés</a></li>
    <?php else: ?>
      <li><a href="index.php?page=home">Főoldal</a></li>
      <li><a href="index.php?page=cars">Autóink</a></li>
      <li><a href="index.php?page=gallery">Galéria</a></li>
      <li><a href="index.php?page=contact">Kapcsolat</a></li>
      <?php if (!isset($_SESSION['user'])): ?>
        <li><a href="auth/login.php" class="btn small">Belépés</a></li>
      <?php else: ?>
        <li><a href="auth/logout.php" class="btn small secondary">Kilépés</a></li>
      <?php endif; ?>
    <?php endif; ?>
  </ul>
</nav>
    </div>
  </header>



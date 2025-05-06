<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $SITE_TITLE ?></title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

  <?php if (isset($admin_page) && $admin_page): ?>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
  <?php else: ?>
    <link rel="stylesheet" href="assets/css/style.css">
  <?php endif; ?>

  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script defer src="assets/js/script.js"></script>
</head>
<body>
  <header class="main-header">
    <div class="container">
      <h1 class="site-title"><?= $SITE_TITLE ?></h1>

      <?php if (isset($_SESSION['user'])): ?>
        <div class="logged-in-user" style="margin-bottom: 7px; font-size: 1rem; font-weight: 600;">
          Bejelentkezett: 
          <?= htmlspecialchars($_SESSION['user']['last_name']) . ' ' . 
              htmlspecialchars($_SESSION['user']['first_name']) . ' (' . 
              htmlspecialchars($_SESSION['user']['username']) . ')' ?>
        </div>
      <?php endif; ?>

      <nav class="nav-menu">
        <ul>
          <?php if (isset($admin_page) && $admin_page): ?>
            <li><a href="../index.php?page=logout" class="btn small secondary">Kilépés</a></li>
          <?php else: ?>
            <?php
            foreach ($pages as $slug => $label):
              // Admin ne lásson frontend menüpontokat
              if (isset($_SESSION['user']) && $_SESSION['user']['username'] === 'admin' && $slug !== 'logout') continue;

              // Üzenetek csak bejelentkezett, nem-admin felhasználónak
              if ($slug === 'messages' && (!isset($_SESSION['user']) || $_SESSION['user']['username'] === 'admin')) continue;

              // Belépés/Regisztráció csak kijelentkezve
              if (($slug === 'login' || $slug === 'register') && isset($_SESSION['user'])) continue;

              // Kilépés csak bejelentkezve
              if ($slug === 'logout' && !isset($_SESSION['user'])) continue;

              $class = '';
              if ($slug === 'login') $class = 'btn small';
              if ($slug === 'logout') $class = 'btn small secondary';
              ?>
              <li><a href="index.php?page=<?= $slug ?>" class="<?= $class ?>"><?= $label ?></a></li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </nav>
    </div>
  </header>





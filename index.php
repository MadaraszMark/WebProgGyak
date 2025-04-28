<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';

$page = isset($_GET['page']) ? $_GET['page'] : $DEFAULT_PAGE;

if (!array_key_exists($page, $pages)) {
    $page = $ERROR_PAGE;
}

$pageFile = $PAGE_DIR . $page . '.php';

if (!file_exists($pageFile)) {
    echo "<p style='color: red; font-weight: bold;'>❌ HIBA: A fájl nem található: $pageFile</p>";
} else {
    include 'templates/header.php';
    include $pageFile;
    include 'templates/footer.php';
}
?>

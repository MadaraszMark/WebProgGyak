<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';

// Lekért oldal a query paraméterből (?page=valami)
$page = isset($_GET['page']) ? $_GET['page'] : $DEFAULT_PAGE;

// Ellenőrzés: szerepel-e az engedélyezett oldalak között
if (!array_key_exists($page, $pages)) {
    $page = $ERROR_PAGE;
}

// Fájl elérési út
$pageFile = $PAGE_DIR . $page . '.php';

// DEBUG: Kiírás
if (!file_exists($pageFile)) {
    echo "<p style='color: red; font-weight: bold;'>❌ HIBA: A fájl nem található: $pageFile</p>";
} else {
    include 'templates/header.php';
    include $pageFile;
    include 'templates/footer.php';
}
?>

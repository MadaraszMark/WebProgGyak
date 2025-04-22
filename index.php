<?php
require_once 'config.php';

// Lekért oldal a query paraméterből (?page=valami)
$page = isset($_GET['page']) ? $_GET['page'] : $DEFAULT_PAGE;

// Létezik-e a megadott oldal a tömbben
if (!array_key_exists($page, $pages)) {
    $page = $ERROR_PAGE;
}

// Fájl elérési út
$pageFile = $PAGE_DIR . $page . '.php';

// Oldal betöltése
include 'templates/header.php';
include $pageFile;
include 'templates/footer.php';

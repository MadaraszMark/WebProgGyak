<?php
// config.php

// Menü: kulcs = fájlnév, érték = megjelenített szöveg
$pages = [
    'home' => 'Főoldal',
    'cars' => 'Autóink',
    'gallery' => 'Galéria',
    'contact' => 'Kapcsolat',
    'contact-success' => 'Üzenet elküldve',
    'messages' => 'Üzenetek',
    'login' => 'Belépés',
    'register' => 'Regisztráció',
    'logout' => 'Kilépés',
    '404' => 'Hiba'
];


// Egyéb oldalak
$PAGE_DIR = 'templates/pages/';
$DEFAULT_PAGE = 'home';
$ERROR_PAGE = '404';

$SITE_TITLE = "Autókereskedés & Flottakezelő";
$FOOTER_TEXT = "© " . date("Y") . " Autókereskedés. Minden jog fenntartva.";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


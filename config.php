<?php
// config.php

// Menü
$pages = [
    'home' => 'Főoldal',
    'cars' => 'Autóink',
    'gallery' => 'Galéria',
    'contact' => 'Kapcsolat',
    'messages' => 'Üzenetek',
    'register' => 'Regisztráció',
    'login' => 'Belépés',
    'logout' => 'Kilépés'
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


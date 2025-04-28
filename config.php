<?php
// config.php

// Menü konfiguráció
$pages = [
    'home' => 'home',
    'cars' => 'cars',
    'gallery' => 'gallery',
    'contact' => 'contact',
    'contact-success' => 'contact-success',
    'messages' => 'messages',
    '404' => '404',
];

// Oldal elérési útja
$PAGE_DIR = 'templates/pages/';

$DEFAULT_PAGE = 'home';

$ERROR_PAGE = '404';

$SITE_TITLE = "Autókereskedés & Flottakezelő";
$FOOTER_TEXT = "© " . date("Y") . " Autókereskedés. Minden jog fenntartva.";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

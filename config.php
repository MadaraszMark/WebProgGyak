<?php
// config.php

// Menü konfiguráció (menüpont => fájlnév)
$pages = [
    'home' => 'Főoldal',
    'cars' => 'Autóink',
    'gallery' => 'Galéria',
    'contact' => 'Kapcsolat',
    'messages' => 'Üzenetek',
];

// Oldal elérési útja (mappa, ahol a sablonoldalak vannak)
$PAGE_DIR = 'templates/pages/';

// Alapértelmezett oldal
$DEFAULT_PAGE = 'home';

// 404 oldal
$ERROR_PAGE = '404';

// Weboldal címe, lábléc szöveg, stb.
$SITE_TITLE = "Autókereskedés & Flottakezelő";
$FOOTER_TEXT = "© " . date("Y") . " Autókereskedés. Minden jog fenntartva.";

// Session indítás minden oldalhoz
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

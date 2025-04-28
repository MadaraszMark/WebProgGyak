<?php
// config.php

// Menü konfiguráció (menüpont => fájlnév)
$pages = [
    'home' => 'home',
    'cars' => 'cars',
    'gallery' => 'gallery',
    'contact' => 'contact',
    'contact-success' => 'contact-success', // EZ KELL!
    'messages' => 'messages',
    '404' => '404',
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

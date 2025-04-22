<?php
// db.php

$host = 'localhost';
$dbname = 'car_fleet_manager';
$user = 'root';           // vagy a te felhasználód
$pass = '';               // ha van jelszó, írd ide
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        // hibakezelés
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,   // asszociatív tömb
    PDO::ATTR_EMULATE_PREPARES => false,                // natív prepared statements
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Adatbázis kapcsolódási hiba: " . $e->getMessage());
}
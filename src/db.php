<?php

include_once "src/config.php";

try {
    $pdo = new PDO("mysql:host=" .DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Esto le dice a PDO:
//“Si hay un error, tírame una excepción clara para que pueda saber qué pasó”.

} catch (PDOException $e){
    die(json_encode(['Error' => $e->getMessage()]));
}
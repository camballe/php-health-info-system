<?php

DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'Password1!');

$dsn = 'mysql:host=localhost;dbname=health-info-system';
try {
    $db = new PDO($dsn, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    $err_msg = $e->getMessage();
    include('db_error.php');
    exit();
}

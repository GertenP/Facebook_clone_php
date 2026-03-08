<?php
global $test_conn;

$host = '127.0.0.1';
$db   = 'Journals';
$user = 'root'; 
$pass = ''; 

try {
    $test_conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
    die("Ühendus ebaõnnestus: " . $e->getMessage());
}


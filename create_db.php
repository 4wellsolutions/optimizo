<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1', 'root', '');
    $pdo->exec('CREATE DATABASE IF NOT EXISTS optimizo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
    echo "Database 'optimizo' created successfully!\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

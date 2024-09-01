<?php
function getConnection()
{
    $config = require 'db.php';
    $db = $config['db'];

    try {
        $dsn = "pgsql:host={$db['host']};port={$db['port']};dbname={$db['dbname']}";
        return new PDO($dsn, $db['user'], $db['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    } catch (PDOException $e) {
        error_log("Database connection failed: " . $e->getMessage());
        die("Erro ao conectar com o banco de dados: " . $e->getMessage());
    }
}

$pdo = getConnection();
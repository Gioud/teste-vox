<?php
$host = 'localhost';
$port = '3306';
$dbname = 'desafio_vox';
$user = 'root';
echo 'teste';
try {

    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'teste';
} catch (PDOException $e) {
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}
?>

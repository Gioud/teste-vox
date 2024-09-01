<?php
require_once '../config/config.php';

if ($_POST) {
    try {
        $nome = $_POST['name'];
        $email = $_POST['email'];
        $senha = $_POST['password'];
        $dateTime = new DateTime();
        $passwordHashed = password_hash($senha, PASSWORD_BCRYPT);
        $format = $dateTime->format('Y-m-d H:i:s');

        $sql = "INSERT INTO users 
            (nome, email, senha, data_criacao) 
            VALUES (:nome, :email, :senha, :data_criacao)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $passwordHashed);
        $stmt->bindParam(':data_criacao', $format);

        if($stmt->execute()) {
            header('Location: ../view/register-success.php');
            exit;
        }

    } catch (Throwable $exception) {
        header('Location: ../view/register-error.php' );
        error_log($exception->getMessage());
    }
}
<?php
$host = 'localhost';
$port = '5432';
$dbname = 'teste-vox';
$user = 'giulio';
$password = 'giulio';
    if ($_POST) {
        $nome = $_POST['name'];
        $email = $_POST['email'];
        $senha = $_POST['password'];
        $dateTime = new DateTime();
        $format = $dateTime->format('Y-m-d H:i:s');

        try {

            $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO users (nome, email, senha, data_criacao) VALUES (:nome, :email, :senha, :data_criacao)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':data_criacao', $format);

            $stmt->execute();

            echo 'Usuário cadastrado com sucesso!';
        } catch (PDOException $e) {
            die("Erro ao conectar com o banco de dados: " . $e->getMessage());
        }
    }
?>
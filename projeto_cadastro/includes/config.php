<?php
session_start();

$host = 'localhost';
$port = '5432';
$db   = 'funcionarios';
$user = 'postgres'; // Usuário padrão do Postgres
$pass = '123456'; //

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

function verificarLogin() {
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
        exit;
    }
}
?>
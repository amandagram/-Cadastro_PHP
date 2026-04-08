<?php
require 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = md5($_POST['senha']); // Certifique-se de que a senha no banco esteja em MD5 para este teste

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ?");
    $stmt->execute([$usuario, $senha]);
    
    if ($stmt->fetch()) {
        $_SESSION['usuario'] = $usuario;
        header("Location: listagem.php");
    } else {
        $erro = "Acesso negado!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Cadastro de Funcionários</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <h2 class="login-header">👤 Cadastro de Funcionários</h2>
        <form method="POST">
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
        <?php if(isset($erro)) echo "<p style='color:red; margin-top:10px;'>$erro</p>"; ?>
        <p style="margin-top:20px;"><a href="#" style="color:#666; font-size:13px; text-decoration:none;">Esqueci minha senha</a></p>
    </div>
</body>
</html>
<?php
require 'includes/config.php';
verificarLogin();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $situacao = ($_POST['situacao'] == 'Ativo') ? 'true' : 'false';
    $sql = "INSERT INTO funcionarios (nome, cargo, email, telefone, situacao) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['nome'], $_POST['cargo'], $_POST['email'], $_POST['telefone'], $situacao]);
    header("Location: listagem.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Funcionário</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div><strong>Cadastro de Funcionários</strong></div>
        <div>
            <a href="listagem.php">Início</a>
            <a href="listagem.php">Listagem</a>
            <a href="index.php" style="color:#ffcccc;">Sair</a>
        </div>
    </nav>
    <div class="container">
        <h3 style="margin-bottom:20px; color:#3b5998;">➕ Cadastro de Funcionários</h3>
        <form method="POST">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <input type="text" name="nome" placeholder="Nome completo" required>
                <select name="cargo">
                    <option value="">Selecione um Cargo</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Gerente">Gerente</option>
                    <option value="Assistente">Assistente</option>
                </select>
                <input type="email" name="email" placeholder="E-mail" required>
                <input type="text" name="telefone" placeholder="Telefone">
                <div>
                    <p style="font-size:14px; margin-bottom:5px;">Situação:</p>
                    <label><input type="radio" name="situacao" value="Ativo" checked> Ativo</label>
                    <label style="margin-left:15px;"><input type="radio" name="situacao" value="Inativo"> Inativo</label>
                </div>
            </div>
            <div style="margin-top:30px; display:flex; gap:10px;">
                <button type="submit" style="width:120px;">Salvar</button>
                <button type="reset" style="width:120px; background:#ccc;">Limpar</button>
            </div>
        </form>
    </div>
</body>
</html>
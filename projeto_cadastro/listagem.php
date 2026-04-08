<?php
require 'includes/config.php';
verificarLogin();

// Paginação
$limite = 5; 
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($pagina - 1) * $limite;

// Busca
$busca = $_GET['busca'] ?? '';

// Total para contar páginas
$stmt_total = $pdo->prepare("SELECT COUNT(*) FROM funcionarios WHERE nome ILIKE ?");
$stmt_total->execute(["%$busca%"]);
$total_registros = $stmt_total->fetchColumn();
$total_paginas = ceil($total_registros / $limite);

// Dados da página
$stmt = $pdo->prepare("SELECT * FROM funcionarios WHERE nome ILIKE ? ORDER BY id DESC LIMIT ? OFFSET ?");
$stmt->execute(["%$busca%", $limite, $inicio]);
$funcionarios = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Funcionários</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div><strong>Cadastro de Funcionários</strong></div>
        <div>Olá, Admin | <a href="index.php">Sair</a></div>
    </nav>

    <div class="container">
        <div style="display:flex; justify-content: space-between; align-items:center; margin-bottom:20px;">
            <form method="GET" style="display:flex; gap:10px; width:70%;">
                <input type="text" name="busca" placeholder="Buscar funcionário..." value="<?= $busca ?>" style="margin:0;">
                <button type="submit" style="width:120px; padding:0;">Pesquisar</button>
            </form>
            <a href="cadastro.php" class="btn-primary" style="text-decoration:none; text-align:center; width:180px;">+ Novo Funcionário</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th><th>Nome</th><th>Cargo</th><th>E-mail</th><th>Situação</th><th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($funcionarios as $f): ?>
                <tr>
                    <td><?= $f['id'] ?></td>
                    <td><?= $f['nome'] ?></td>
                    <td><?= $f['cargo'] ?></td>
                    <td><?= $f['email'] ?></td>
                    <td>
                        <span class="<?= $f['situacao'] ? 'status-ativo' : 'status-inativo' ?>">
                            <?= $f['situacao'] ? 'Ativo' : 'Inativo' ?>
                        </span>
                    </td>
                    <td> ✏️ ✉️ 🗑️ </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="paginacao">
            <?php for($i = 1; $i <= $total_paginas; $i++): ?>
                <a href="?pagina=<?= $i ?>&busca=<?= $busca ?>" class="<?= ($i == $pagina) ? 'ativa' : '' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>
        </div>
    </div>
</body>
</html>
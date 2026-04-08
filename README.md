🚀 Sistema de Cadastro de Funcionários (PHP + PostgreSQL)
Um mini sistema web para gerenciamento de funcionários desenvolvido com foco em performance e simplicidade, utilizando PHP 5 puro e banco de dados PostgreSQL. O projeto segue um layout moderno e funcional baseado em três telas principais.

🛠️ Funcionalidades
Autenticação: Sistema de login seguro para administração.

Cadastro: Formulário completo para novos funcionários (Nome, Cargo, E-mail, Telefone e Situação).

Listagem Dinâmica: Tabela de funcionários com visualização de status.

Busca em Tempo Real: Filtro de busca por nome integrado ao PostgreSQL.

Design Responsivo: Interface limpa construída sem frameworks externos (Vanilla CSS).

📁 Estrutura do Projeto
Bash
/projeto-cadastro
├── css/
│   └── style.css       # Estilização completa do sistema
├── includes/
│   └── config.php      # Configurações de conexão PDO e Sessão
├── index.php           # Tela de Login (Autenticação)
├── listagem.php        # Tela de consulta e busca
└── cadastro.php        # Tela de inserção de dados
🚀 Como Iniciar
1. Requisitos
Servidor Web (Apache/Nginx).

PHP 5.6 ou superior.

Banco de dados PostgreSQL.

Extensão pdo_pgsql habilitada no PHP.

2. Configuração do Banco de Dados
Execute os comandos SQL abaixo no seu terminal ou interface (pgAdmin/DBeaver):

SQL
-- Criar tabela de funcionários
CREATE TABLE funcionarios (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cargo VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    telefone VARCHAR(20),
    situacao BOOLEAN DEFAULT TRUE
);

-- Criar tabela de usuários do sistema
CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    usuario VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);

-- Inserir usuário padrão (Senha: 123456)
INSERT INTO usuarios (usuario, senha) 
VALUES ('admin', 'e10adc3949ba59abbe56e057f20f883e');
3. Configuração do Código
No arquivo includes/config.php, ajuste as credenciais do seu banco de dados:

PHP
$host = 'localhost';
$db   = 'seu_banco';
$user = 'seu_usuario';
$pass = 'sua_senha';
📸 Telas do Sistema
Login: Acesso restrito para administradores.

Cadastro: Interface intuitiva para inserção de dados.

Listagem: Gerenciamento centralizado com filtros de busca.

📝 Notas de Desenvolvimento
O projeto não utiliza frameworks (Bootstrap, React, etc), garantindo um código leve e de fácil manutenção manual.

A autenticação utiliza sessões nativas do PHP para controle de acesso.

As consultas ao banco utilizam Prepared Statements para evitar SQL Injection.

# HabitsShare — PHP (Projeto 01)

Aplicação web de gestão e partilha de hábitos desenvolvida em PHP puro, como projeto consolidador da formação *"Level One - The Fundamentals"* durante o estágio na Primariu (BRATIONAL - Sistemas de Informação Lda.).

---

## Sobre o Projeto

O **HabitsShare** é uma plataforma de gestão de hábitos com componente social. O utilizador pode criar hábitos, acompanhar o seu progresso e partilhá-los com outros utilizadores registados. O objetivo do projeto foi aplicar os fundamentos de PHP, MySQL e arquitetura CRUD num contexto real, sem recorrer a frameworks externas.

---

## Funcionalidades

- **Autenticação** — Registo, login e logout com controlo de sessões
- **Gestão de Hábitos (CRUD)** — Criar, listar, editar e eliminar hábitos
- **Partilha Social** — Partilha de hábitos diretamente por email com outros utilizadores registados
- **Vista de Detalhe** — Página expandida com toda a informação de cada hábito
- **Visualização diferenciada** — A interface distingue hábitos criados pelo utilizador de hábitos partilhados por terceiros
- **Confirmação de eliminação** — Diálogo de confirmação antes de apagar um registo

---

## Stack Tecnológica

| Componente | Tecnologia |
|---|---|
| Backend | PHP 8.x (puro, sem framework) |
| Base de Dados | MySQL |
| Acesso a Dados | PDO (com proteção contra SQL Injection) |
| Frontend | HTML + CSS |
| Autenticação | Sessões PHP nativas |

---

## Estrutura do Projeto

```
/
├── index.php           # Página inicial / listagem de hábitos
├── create.php          # Formulário de criação
├── edit.php            # Formulário de edição
├── delete.php          # Lógica de eliminação
├── detail.php          # Página de detalhe
├── share.php           # Lógica de partilha
├── login.php           # Autenticação
├── register.php        # Registo de utilizador
├── logout.php          # Encerramento de sessão
├── db.php              # Ligação à base de dados (PDO)
└── /assets             # CSS e recursos estáticos
```

---

## Instalação e Configuração

### Pré-requisitos
- PHP 8.x
- MySQL 5.7+
- Servidor web (Apache/Nginx) ou `php -S localhost:8000`

### Passos

```bash
# 1. Clonar o repositório
git clone https://github.com/diogooaabreu/ESTAGIOP01_HabitsPHP.git
cd ESTAGIOP01_HabitsPHP

# 2. Criar a base de dados
# Importar o ficheiro SQL incluído no repositório (db/schema.sql)
mysql -u root -p < db/schema.sql

# 3. Configurar a ligação à base de dados
# Editar db.php com as suas credenciais:
# $host, $dbname, $user, $password

# 4. Iniciar o servidor local
php -S localhost:8000
```

Aceder a: `http://localhost:8000`

---

## Contexto de Desenvolvimento

Este projeto foi desenvolvido como parte do estágio curricular da Licenciatura em Engenharia de Sistemas Informáticos (LESI) no IPCA, realizado na empresa Primariu. Corresponde à **Fase 1** da formação estruturada (*PHP For Beginners*) e serviu para consolidar os conceitos de:

- Routing manual com PHP
- Manipulação de formulários e validação server-side
- Sessões e autenticação sem framework
- Operações CRUD com PDO e MySQL
- Proteção básica contra SQL Injection e XSS

---

## Licença

Projeto académico — Estágio Curricular LESI, IPCA 2025/2026.

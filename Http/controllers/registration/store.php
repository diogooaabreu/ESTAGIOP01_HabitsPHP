<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

// Resolve a instância do banco de dados através do Container.
$db = App::resolve(Database::class);

// Captura os dados enviados pelo formulário via POST.
$email = $_POST['email'];
$password = $_POST['password'];

// --- VALIDAÇÃO ---
$errors = [];

// Valida se o e-mail tem um formato correto.
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

// Valida se a senha tem entre 7 e 255 caracteres.
if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

// Se houver erros de validação, retorna para o formulário exibindo as mensagens.
if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

// --- VERIFICAÇÃO E PERSISTÊNCIA ---

// Verifica se já existe um usuário cadastrado com esse e-mail.
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    // Se o usuário já existe, redireciona para a home (ou poderia exibir um erro).
    header('location: /');
    exit();
} else {
    // Se não existir, insere o novo usuário no banco.
    // A senha é criptografada usando BCRYPT para nunca salvar texto puro.
    $user = $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    // Após criar a conta, loga o usuário automaticamente na sessão.
    (new Authenticator)->login(['email' => $email]);

    // Redireciona para a página inicial com o usuário já logado.
    header('location: /');
    exit();
}
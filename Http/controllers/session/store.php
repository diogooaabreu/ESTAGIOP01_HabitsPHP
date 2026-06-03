<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

/**
 * Valida os dados de entrada usando uma classe de formulário específica (LoginForm).
 * Se a validação falhar, o método validate() internamente lança uma ValidationException.
 */
$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

/**
 * Tenta realizar a autenticação com o email e senha fornecidos.
 * O método attempt() verifica o banco de dados e a senha.
 */
$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);

/**
 * Se as credenciais estiverem incorretas (usuário não encontrado ou senha errada).
 */
if (!$signedIn) {
    // Adiciona um erro personalizado ao formulário e lança a exceção de validação.
    $form->error(
        'email', 'No matching account found for that email address and password.'
    )->throw();
}

/**
 * Se o login for bem-sucedido, redireciona o usuário para a página inicial.
 */
redirect('/');
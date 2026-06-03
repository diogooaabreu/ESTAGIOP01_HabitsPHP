<?php

use Core\Session;

/**
 * Renderiza a view do formulário de login.
 * Busca eventuais erros de validação armazenados na sessão para exibir ao usuário.
 */
view('session/create.view.php', [
    // Recupera erros que foram "flashados" na sessão em tentativas anteriores.
    'errors' => Session::get('errors')
]);
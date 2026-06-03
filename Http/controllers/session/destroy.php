<?php

use Core\Authenticator;

/**
 * Instancia o Authenticator e chama o metodo logout().
 * O logout limpa a sessão, destrói o arquivo de sessão e remove o cookie.
 */
(new Authenticator)->logout();

/**
 * Redireciona o usuário para a página inicial após o logout.
 */
header('location: /');
exit();
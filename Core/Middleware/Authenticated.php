<?php

namespace Core\Middleware;

class Authenticated
{
    /**
     * Verifica se o utilizador está autenticado.
     */
    public function handle()
    {
        // Se a chave 'user' não existir na sessão (ou for nula),
        // o operador ?? retorna false.
        if (! $_SESSION['user'] ?? false) {
            // Se não houver utilizador, redireciona para a página inicial.
            header('location: /');
            // Interrompe a execução do script imediatamente.
            exit();
        }
    }
}
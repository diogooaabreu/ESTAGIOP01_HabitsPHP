<?php

namespace Core\Middleware;

class Guest
{
    /**
     * Verifica se o utilizador é um convidado (não logado).
     */
    public function handle()
    {
        // Se a chave 'user' existir na sessão (utilizador já está logado).
        if ($_SESSION['user'] ?? false) {
            // Redireciona o utilizador logado para longe da página de guest.
            header('location: /');
            // Interrompe a execução.
            exit();
        }
    }
}
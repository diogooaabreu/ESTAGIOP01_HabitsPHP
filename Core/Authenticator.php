<?php

namespace Core;

/**
 * Classe responsável por gere o ciclo de vida da autenticação do utilizador.
 */
class Authenticator
{
    /**
     * Tenta autenticar um utilizador comparando email e senha com o banco de dados.
     * * @param string $email
     * @param string $password
     * @return bool Retorna true se as credenciais forem válidas, false caso contrário.
     */
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)
            ->query('select * from users where email = :email', [
                'email' => $email
            ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // CORREÇÃO: Passamos o array do utilizador completo para ter acesso ao ID
                $this->login($user);

                return true;
            }
        }

        return false;
    }

    /**
     * Define as variáveis de sessão necessárias para identificar o logado.
     * * @param array $user Dados básicos do utilizador (neste caso, o email).
     */
    public function login($user)
    {
        // CORREÇÃO: Agora guardamos o ID e o Email.
        // O ID é vital para as queries de hábitos.
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email']
        ];

        session_regenerate_id(true);
    }


    /**
     * Finaliza a sessão do utilizador atual.
     */
    public function logout()
    {
        // Chama o metodo estático de destruição da classe Session.
        // Isso normalmente limpa o array $_SESSION e remove o cookie de sessão.
        Session::destroy();
    }
}
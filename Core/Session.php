<?php

namespace Core;

class Session
{
    // Verifica se uma chave existe na sessão
    public static function has($key)
    {
        return (bool) static::get($key);
    }

    // Adiciona um valor à sessão
    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Busca um valor. Prioriza mensagens "flash" (que duram apenas um request).
     */
    public static function get($key, $default = null)
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    /**
     * Define uma mensagem que será apagada após a próxima requisição (ex: mensagens de sucesso).
     */
    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }

    // Remove as mensagens temporárias
    public static function unflash()
    {
        unset($_SESSION['_flash']);
    }

    // Limpa todos os dados da sessão
    public static function flush()
    {
        $_SESSION = [];
    }

    /**
     * Encerra a sessão completamente, incluindo a remoção do cookie no navegador.
     */
    public static function destroy()
    {
        static::flush();
        session_destroy();

        // Limpa o cookie de sessão no lado do cliente
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
<?php

namespace Core\Middleware;

class Middleware
{
    /**
     * Mapa de apelidos (keys) para as classes de Middleware correspondentes.
     */
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Authenticated::class
    ];

    /**
     * Resolve e executa o middleware baseado em uma chave.
     * * @param string|null $key O apelido definido no MAP (ex: 'auth').
     */
    public static function resolve($key)
    {
        // Se nenhuma chave for passada, não faz nada e segue a requisição.
        if (!$key) {
            return;
        }

        // Tenta encontrar a classe no mapa usando a chave fornecida.
        $middleware = static::MAP[$key] ?? false;

        // Se a chave não existir no array MAP, lança um erro para o desenvolvedor.
        if (!$middleware) {
            throw new \Exception("No matching middleware found for key '{$key}'.");
        }

        // Instancia a classe encontrada (ex: new Authenticated) e chama o metodo handle().
        (new $middleware)->handle();
    }
}
<?php

namespace Core;

use Exception;

class Container
{
    // Armazena as funções que criam os objetos (resolvers)
    protected $bindings = [];

    // Adiciona uma nova regra de criação ao container
    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    /**
     * Tenta instanciar um objeto baseado na chave fornecida.
     */
    public function resolve($key)
    {
        // Verifica se existe uma regra para a chave solicitada
        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception("No matching binding found for {$key}");
        }

        // Recupera a função anônima associada
        $resolver = $this->bindings[$key];

        // Executa a função e retorna o objeto pronto (ex: uma conexão PDO)
        return call_user_func($resolver);
    }
}
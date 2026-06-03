<?php

namespace Core;

class App
{
    // Armazena a instância do Container
    protected static $container;

    // Define qual container a aplicação deve usar
    public static function setContainer($container)
    {
        static::$container = $container;
    }

    // Retorna a instância do container configurada
    public static function container()
    {
        return static::$container;
    }

    // Atalho para registrar uma dependência no container
    public static function bind($key, $resolver)
    {
        static::container()->bind($key, $resolver);
    }

    // Atalho para resolver (instanciar) uma dependência do container
    public static function resolve($key)
    {
        return static::container()->resolve($key);
    }
}
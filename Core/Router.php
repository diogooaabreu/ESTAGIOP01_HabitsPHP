<?php

namespace Core;

use Core\Middleware\Authenticated;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{
    // Armazena todas as rotas registradas na aplicação
    protected $routes = [];

    /**
     * Adiciona uma rota ao mapa interno.
     */
    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,                // Ex: '/login'
            'controller' => $controller,  // Ex: 'login/create.php'
            'method' => $method,          // Ex: 'GET', 'POST'
            'middleware' => null          // Proteção da rota
        ];

        return $this; // Permite encadeamento: $router->get()->only()
    }

    // Atalhos para os verbos HTTP
    public function get($uri, $controller) { return $this->add('GET', $uri, $controller); }
    public function post($uri, $controller) { return $this->add('POST', $uri, $controller); }
    public function delete($uri, $controller) { return $this->add('DELETE', $uri, $controller); }
    public function patch($uri, $controller) { return $this->add('PATCH', $uri, $controller); }
    public function put($uri, $controller) { return $this->add('PUT', $uri, $controller); }

    /**
     * Define um middleware para a última rota adicionada.
     */
    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    /**
     * Compara a URL atual com as rotas registradas e executa o controlador.
     */
    // No seu Router.php
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                Middleware::resolve($route['middleware']);

                $path = base_path('Http/controllers/' . $route['controller']);

                // ADICIONE ISSO PARA TESTAR:
                if (!file_exists($path)) {
                    die("Erro: O arquivo não foi encontrado no caminho: " . $path);
                }

                return require $path;
            }
        }
        $this->abort();
    }

    /**
     * Retorna a URL da página anterior (útil para redirecionar após erros).
     */
    public function previousUrl()
    {
        return $_SERVER['HTTP_REFERER'];
    }

    /**
     * Finaliza a aplicação com um código de erro e carrega a respectiva view.
     */
    protected function abort($code = 404)
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }

// Em Core/functions.php (não dentro da classe Router!)
    function base_path($path)
    {
        return __DIR__ . '/../' . $path;
    }
}
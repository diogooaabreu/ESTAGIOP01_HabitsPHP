<?php

use Core\Response;

/**
 * "Dump and Die": Exibe o conteúdo de uma variável de forma formatada e interrompe a execução.
 * Útil para debugar o código rapidamente.
 */
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

/**
 * Verifica se a URI atual da requisição corresponde a um valor específico.
 * Útil para destacar links ativos em menus de navegação.
 */
function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

/**
 * Interrompe a execução e exibe uma página de erro customizada (ex: 404 ou 403).
 */
function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

/**
 * Verifica uma condição de autorização. Se for falsa, aborta com o status fornecido.
 * Por padrão, retorna 403 (Proibido).
 */
function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }

    return true;
}

/**
 * Retorna o caminho absoluto a partir da raiz do projeto.
 * Facilita a inclusão de arquivos sem se preocupar com caminhos relativos.
 */
function base_path($path)
{
    return BASE_PATH . $path;
}

/**
 * Carrega uma visualização (view) e extrai variáveis para serem usadas dentro do HTML.
 */
function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}
/**
 * Redireciona o usuário para uma nova URL e encerra o script.
 */
function redirect($path)
{
    header("location: {$path}");
    exit();
}
/**
 * Recupera dados antigos de um formulário que foram salvos na sessão após um erro de validação.
 * Se não houver dado antigo, retorna o valor padrão.
 */
function old($key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}
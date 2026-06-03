<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    // Armazena as mensagens de erro de validação.
    protected $errors = [];

    /**
     * O construtor executa a validação automática ao instanciar a classe.
     * @param array $attributes Contém os dados do formulário (email e password).
     */
    public function __construct(public array $attributes)
    {
        // Valida se o formato do e-mail é válido usando o Validator.
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        // Valida se a senha atende aos requisitos mínimos de string.
        if (!Validator::string($attributes['password'])) {
            $this->errors['password'] = 'Please provide a valid password.';
        }
    }

    /**
     * Método estático facilitador que valida os dados e decide se lança uma exceção ou retorna a instância.
     */
    public static function validate($attributes)
    {
        $instance = new static($attributes);

        // Se falhar, lança a exceção; caso contrário, retorna a própria instância.
        return $instance->failed() ? $instance->throw() : $instance;
    }

    /**
     * Aciona a interrupção do fluxo através de uma ValidationException.
     */
    public function throw()
    {
        // Passa os erros e os dados antigos para que possam ser recuperados na view.
        ValidationException::throw($this->errors(), $this->attributes);
    }

    // Verifica se existem erros no array.
    public function failed()
    {
        return count($this->errors);
    }

    // Retorna a lista de erros.
    public function errors()
    {
        return $this->errors;
    }

    /**
     * Permite adicionar erros manualmente (ex: "Senha incorreta" após checar o banco).
     */
    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}
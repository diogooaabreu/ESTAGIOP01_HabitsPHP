<?php

namespace Core;

class ValidationException extends \Exception
{
    // Armazena os erros de validação e os dados antigos do formulário
    public readonly array $errors;
    public readonly array $old;

    /**
     * Metodo estático facilitador para lançar a exceção com os dados necessários.
     */
    public static function throw($errors, $old)
    {
        $instance = new static('The form failed to validate.');

        $instance->errors = $errors; // Lista de erros (ex: 'email' => 'E-mail inválido')
        $instance->old = $old;       // Dados digitados (para não apagar o formulário)

        throw $instance;
    }
}
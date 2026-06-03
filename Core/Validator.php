<?php

namespace Core;

class Validator
{
    /**
     * Valida se uma string tem o tamanho correto.
     */
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value); // Remove espaços em branco
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    /**
     * Valida se o formato do e-mail é legítimo.
     */
    public static function email(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Verifica se um número é maior que outro.
     */
    public static function greaterThan(int $value, int $greaterThan): bool
    {
        return $value > $greaterThan;
    }

    /**
     * Verifica se um email existe na base de dados.
     */
    public static function exists($table, $column, $value)
    {
        $db = App::resolve(Database::class);

        return $db->query("SELECT * FROM {$table} WHERE {$column} = :val", [
            'val' => $value
        ])->find();
    }
}
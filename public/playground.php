<?php

use Illuminate\Support\Collection;

// Carrega o autoloader para reconhecer a classe Collection.
require __DIR__.'/../vendor/autoload.php';

// Cria uma nova coleção com números de 1 a 10.
$numbers = new Collection([
    1, 2, 3, 4, 5, 6, 7, 8, 9, 10
]);

// Filtra a coleção para manter apenas números menores ou iguais a 5.
$lessThanOrEqualTo5 = $numbers->filter(fn($number) => $number <= 5);

// Exibe o resultado formatado para inspeção.
var_dump($lessThanOrEqualTo5);
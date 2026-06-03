<?php

// Chama a função global view (definida em functions.php).
// O primeiro argumento é o arquivo de template em "views/index.view.php".
// O segundo argumento é um array que será "extraído" para variáveis dentro do HTML.
view("index.view.php", [
    'heading' => 'Home', // No HTML, você acessará isso como $heading
]);
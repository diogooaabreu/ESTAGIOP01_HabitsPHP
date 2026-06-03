<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);
$errors = [];

// Capturamos os campos do formulário
$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';

if (! Validator::string($title, 1, 255)) {
    $errors['title'] = 'O título é obrigatório (máx 255 caracteres).';
}

if (! empty($errors)) {
    return view("habits/create.view.php", [
        'heading' => 'Criar Hábito',
        'errors' => $errors
    ]);
}

$currentUserId = $_SESSION['user']['id'];

// INSERT corrigido para as colunas da sua tabela: title e description
$db->query('INSERT INTO habits(title, description, user_id) VALUES(:title, :description, :user_id)', [
    'title' => $title,
    'description' => $description,
    'user_id' => $currentUserId
]);

redirect('/habits');
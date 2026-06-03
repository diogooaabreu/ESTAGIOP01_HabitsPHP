<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$currentUserId = $_SESSION['user']['id'];

// Localiza o hábito para verificar autorização
$habit = $db->query('select * from habits where id = :id', [
    'id' => $_POST['id']
])->find();

if (! $habit) {
    abort();
}

// Apenas o criador pode editar
authorize($habit['user_id'] === $currentUserId);

// Captura os novos dados (usando coalescência para evitar null)
$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';

$errors = [];

// Validação corrigida: mudamos de 'body' para 'title'
if (! Validator::string($title, 1, 255)) {
    $errors['title'] = 'O título é obrigatório e deve ter até 255 caracteres.';
}

if (count($errors)) {
    return view('habits/edit.view.php', [
        'heading' => 'Editar Hábito',
        'errors' => $errors,
        'habit' => $habit
    ]);
}

// Executa a atualização com as colunas corretas
$db->query('update habits set title = :title, description = :description where id = :id', [
    'id' => $_POST['id'],
    'title' => $title,
    'description' => $description
]);

redirect('/habits');
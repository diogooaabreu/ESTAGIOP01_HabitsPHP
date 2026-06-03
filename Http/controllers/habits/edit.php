<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$currentUserId = $_SESSION['user']['id'];

// 1. Pegar o ID da URL ($_GET)
$id = $_GET['id'] ?? null;

if (! $id) {
    abort();
}

// 2. Buscar o hábito
$habit = $db->query('select * from habits where id = :id', [
    'id' => $id
])->find();

if (! $habit) {
    abort();
}

// 3. Autorizar (Apenas o dono edita)
authorize($habit['user_id'] === $currentUserId);

// 4. Carregar a VIEW de edição (você precisará criar este arquivo)
view("habits/edit.view.php", [
    'heading' => 'Editar Hábito',
    'errors' => [],
    'habit' => $habit
]);
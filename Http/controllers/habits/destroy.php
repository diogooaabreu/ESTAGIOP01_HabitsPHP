<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Obtém o ID do utilizador da sessão para segurança
$currentUserId = $_SESSION['user']['id'];

// Localiza o hábito
$habit = $db->query('select * from habits where id = :id', [
    'id' => $_POST['id']
])->find();

if (! $habit) {
    abort();
}

// Verifica se o utilizador tem permissão (apenas o dono pode apagar)
authorize($habit['user_id'] === $currentUserId);

// Executa a exclusão
$db->query('delete from habits where id = :id', [
    'id' => $_POST['id']
]);

header('location: /habits');
exit();
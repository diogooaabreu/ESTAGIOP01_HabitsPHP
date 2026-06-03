<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$currentUserId = $_SESSION['user']['id'];

// 1. Busca o hábito e o email do criador (fazendo um JOIN com a tabela users)
$habit = $db->query('
    SELECT habits.*, users.email as owner_email 
    FROM habits 
    JOIN users ON users.id = habits.user_id 
    WHERE habits.id = :id', [
    'id' => $_GET['id']
])->find();

if (! $habit) {
    abort();
}

// 2. Busca todos os utilizadores com quem este hábito foi partilhado
$sharedWith = $db->query('
    SELECT users.email 
    FROM habit_shares 
    JOIN users ON users.id = habit_shares.shared_with_user_id 
    WHERE habit_shares.habit_id = :id', [
    'id' => $_GET['id']
])->get();

// Lógica de autorização
$isOwner = $habit['user_id'] === $currentUserId;
$isSharedWithMe = false;

foreach ($sharedWith as $share) {
    if ($share['email'] === $_SESSION['user']['email']) {
        $isSharedWithMe = true;
        break;
    }
}

authorize($isOwner || $isSharedWithMe);

view("habits/show.view.php", [
    'heading' => 'Hábito',
    'habit' => $habit,
    'sharedWith' => $sharedWith
]);
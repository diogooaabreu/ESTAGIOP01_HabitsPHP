<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Busca o ID dinâmico da sessão que corrigimos no Authenticator
$currentUserId = $_SESSION['user']['id'];

$habits = $db->query("
    SELECT DISTINCT habits.* FROM habits 
    LEFT JOIN habit_shares ON habits.id = habit_shares.habit_id
    WHERE habits.user_id = :user_id 
    OR habit_shares.shared_with_user_id = :user_id
", [
    'user_id' => $currentUserId
])->get();

view("habits/index.view.php", [
    'heading' => 'Os Meus Hábitos',
    'habits' => $habits
]);
<?php


use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$currentUserId = $_SESSION['user']['id'];

// 1. Verificar se o hábito pertence ao utilizador atual
$habit = $db->query('select * from habits where id = :id', [
    'id' => $_POST['id']
])->find();

authorize($habit['user_id'] === $currentUserId);

// 2. Procurar o utilizador com quem queremos partilhar
$userToShare = $db->query('select id from users where email = :email', [
    'email' => $_POST['email']
])->find();

if ($userToShare) {
    $db->query('INSERT INTO habit_shares(habit_id, shared_with_user_id) VALUES(:h_id, :u_id)', [
        'h_id' => $habit['id'],
        'u_id' => $userToShare['id']
    ]);
}

redirect('/habits');
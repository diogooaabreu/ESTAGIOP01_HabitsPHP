<?php

// Páginas Estáticas
// Páginas Estáticas
$router->get('/', 'index.php'); // Mude de 'index_dependencias.php' para o nome real
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

// Gestão de Hábitos (CRUD)
$router->get('/habits', 'habits/index.php')->only('auth'); // Verifique se dentro de habits/ o arquivo é index.php

// Gestão de Hábitos (CRUD)
$router->get('/habits', 'habits/index_dependencias.php')->only('auth');
$router->get('/habits/create', 'habits/create.php')->only('auth');
$router->post('/habits', 'habits/store.php')->only('auth');

$router->get('/habit', 'habits/show.php')->only('auth');
$router->get('/habit/edit', 'habits/edit.php')->only('auth');
$router->patch('/habit', 'habits/update.php')->only('auth');
$router->delete('/habit', 'habits/destroy.php')->only('auth');

// Partilha
$router->post('/habit/share', 'habits/share.php')->only('auth');

// Autenticação
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest'); // Verifique se é 'session' ou 'sessions' (plural)
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');
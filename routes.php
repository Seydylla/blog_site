<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');

$router->get('/article', 'controllers/articles/show.php');
$router->delete('/article', 'controllers/articles/destroy.php');

$router->get('/article/edit', 'controllers/articles/edit.php')->only('auth');
$router->patch('/article', 'controllers/articles/update.php')->only('auth');

$router->get('/articles/create', 'controllers/articles/create.php')->only('auth');
$router->post('/articles/create', 'controllers/articles/store.php')->only('auth');

$router->get('/articles', 'controllers/articles/index.php');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php')->only('guest');
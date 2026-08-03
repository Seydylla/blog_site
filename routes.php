<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');

$router->get('/article', 'controllers/articles/show.php');
$router->delete('/article', 'controllers/articles/destroy.php');

$router->get('/article/edit', 'controllers/articles/edit.php');
$router->patch('/article', 'controllers/articles/update.php');

$router->get('/articles/create', 'controllers/articles/create.php');
$router->post('/articles/create', 'controllers/articles/store.php');

$router->get('/articles', 'controllers/articles/index.php');

$router->get('/register', 'controllers/registration/create.php');
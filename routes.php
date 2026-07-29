<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');

$router->get('/article', 'controllers/articles/article.php');
$router->get('/articles/create', 'controllers/articles/create.php');
$router->get('/articles', 'controllers/articles/index.php');
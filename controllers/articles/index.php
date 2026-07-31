<?php

use Core\Database;
use Core\App;

$db = App::container()->resolve(Database::class);

$articles = [];

$articles = $db->query('select * from articles')->fetchAll();
$authorsData = $db->query('select * from writer')->fetchAll();
$authors = [];
foreach ($authorsData as $author) {
    $authors[$author['id']] = $author;
}

view('articles/index.view.php', [
    'articles' => $articles,
    'authorsData' => $authorsData
]);
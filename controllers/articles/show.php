<?php

use Core\App;
use Core\Database;

$db = App::container()->resolve(Database::class);


$currentUser = 1;

$article = $db->query('select * from articles where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($currentUser === $article['writer_id']);

view('articles/show.view.php', [
    'article' => $article
]);
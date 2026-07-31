<?php

use Core\App;
use Core\Database;

$db = App::container()->resolve(Database::class);

$currentUserId = 1;

$article = $db->query('select * from articles where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($article['writer_id'] === $currentUserId);

view('articles/edit.view.php', [
    'heading' => 'Edit Notes',
    'errors' => [],
    'article' => $article
]);
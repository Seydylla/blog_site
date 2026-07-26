<?php

$config = require base_path('config.php');
$db = new Database($config['database']);


$id = $_GET['id'] ?? null;
$currentUser = 1;


$article = $db->query('select * from articles where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($currentUser === $article['writer_id']);
view('articles/article.view.php');
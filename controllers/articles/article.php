<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);


$currentUser = 1;


if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $article = $db->query('select * from articles where id = :id', [
        'id' => $_GET['id']
    ])->findOrFail();

    authorize($currentUser === $article['writer_id']);

    $db->query('delete from articles where id = :id', [
        'id' => $_GET['id']
    ]);

    header('location: /articles');
    exit();
} else {
    $article = $db->query('select * from articles where id = :id', [
        'id' => $_GET['id']
    ])->findOrFail();

    authorize($currentUser === $article['writer_id']);

    view('articles/article.view.php', [
        'article' => $article
    ]);
}
<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);


$currentUser = 1;

$article = $db->query('select * from articles where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($currentUser === $article['writer_id']);

// Remove the image file from target folder if it exists
if (!empty($article['img'])) {
    $imagePath = base_path('public/images/' . $article['img']);

    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}

$db->query('delete from articles where id = :id', [
    'id' => $_POST['id']
]);

header('location: /articles');
exit();
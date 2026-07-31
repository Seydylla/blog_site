<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::container()->resolve(Database::class);

$currentUserId = 1;

$validator = new Validator();

$article = $db->query('select * from articles where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($article['writer_id'] === $currentUserId);

$errors = [];

if (! $validator->string($_POST['title'], 1, 20)) {
    $errors['title'] = 'The title will 20 be required';
}

if (! $validator->string($_POST['header'], 1, 100)) {
    $errors['header'] = 'The header won\'t be more than 100';
}

if (! $validator->string($_POST['article_description'], 1, 1000)) {
    $errors['article'] = 'The article won\'t be more than 1000';
}

// Default to the existing image from database
$fileName = $article['img']; 

// Check if a NEW image was uploaded
$hasNewImage = isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK;

if ($hasNewImage) {
    $fileTmpPath = $_FILES['img']['tmp_name'];
    $uploadedFileName = basename($_FILES['img']['name']);
    $fileExtension = strtolower(pathinfo($uploadedFileName, PATHINFO_EXTENSION));

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

    if (!in_array($fileExtension, $allowedExtensions)) {
        $errors['img'] = 'Only JPG, JPEG, PNG, WEBP, and GIF files are allowed.';
    } else {
        $checkImage = getimagesize($fileTmpPath);
        if ($checkImage === false) {
            $errors['img'] = 'Uploaded file is not a valid image.';
        }
    }
}

if (count($errors)) {
    return view('articles/edit.view.php', [
        'errors' => $errors,
        'article' => $article
    ]);
}

// Process the image upload only if a new file was provided
if ($hasNewImage) {
    $targetDir = "images/";
    
    // Optional: give the file a unique name to prevent overwriting existing files
    $fileName = time() . '_' . basename($_FILES['img']['name']); 
    $targetPath = $targetDir . $fileName;

    move_uploaded_file($_FILES['img']['tmp_name'], $targetPath);
}
    
// Grab input data
$title = $_POST['title'];
$catagory = $_POST['catagory'];
$header = $_POST['header'];
$read_time = $_POST['read_time'];
$writer_id = $_POST['writer_id'];
$article_description = $_POST['article_description'];
$date = date('Y-m-d'); 

$db->query('
    UPDATE articles 
    SET title = :title,
        catagory = :catagory,
        header = :header,
        img = :img,
        article_description = :article_description,
        read_time = :read_time,
        writer_id = :writer_id,
        date = :date
    WHERE id = :id
', [
    'id'                  => $_POST['id'],
    'title'               => $title,
    'catagory'            => $catagory,
    'header'              => $header,
    'img'                 => $fileName,
    'article_description' => $article_description,
    'read_time'           => $read_time,
    'writer_id'           => $writer_id,
    'date'                => $date
]);

header('Location: /articles');
exit();
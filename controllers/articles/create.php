<?php

require base_path('Vaildator.php');

$config = require base_path('config.php');
$db = new Database($config['database']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    $validator = new Validator();

    if(! $validator->string($_POST['title'], 1, 20)) {
        $errors['title'] = 'The title willl 20 be required';
    }

    if(! $validator->string($_POST['header'], 1, 100)) {
        $errors['header'] = 'The header wont be more than 100';
    }

    if(! $validator->string($_POST['article_description'], 1, 1000)) {
        $errors['article'] = 'The article wont be more than 1000';
    }

    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['img']['tmp_name'];
        $fileName = basename($_FILES['img']['name']);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

        if (!in_array($fileExtension, $allowedExtensions)) {
            $errors['img'] = 'Only JPG, JPEG, PNG, WEBP, and GIF files are allowed.';
        } else {
            $checkImage = getimagesize($fileTmpPath);
            if ($checkImage === false) {
                $errors['img'] = 'Uploaded file is not a valid image.';
            }
        }
    } else {
        $errors['img'] = 'Please upload an article image.';
    }

    if(empty($errors)) {

    $targetDir = "images/";

    $fileName = basename($_FILES['img']['name']); 
    $targetPath = $targetDir . $fileName;

    if (isset($_FILES['img']['tmp_name']) && $_FILES['img']['tmp_name'] != '') {
        move_uploaded_file($_FILES['img']['tmp_name'], $targetPath);
    }
    
    // Grab data
    $title = $_POST['title'];
    $catagory = $_POST['catagory'];
    $header = $_POST['header'];
    $read_time = $_POST['read_time'];
    $writer_id = $_POST['writer_id'];
    $article_description = $_POST['article_description'];
    $date = date('Y-m-d'); // Getting auto time

    $db->query('
        INSERT INTO articles (title, catagory, header, img, article_description, read_time, writer_id, date) 
        VALUES (:title, :catagory, :header, :img, :article_description, :read_time, :writer_id, :date)
    ', [
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
    }
}

view('articles/create.view.php');
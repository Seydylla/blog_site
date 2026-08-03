<?php

use Core\App;
use Core\Database;
use Core\Validator;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if(! Validator::string($name, 2, 255)) {
    $errors['name'] = 'A name of at least 2 characters is required';
}

if(! Validator::email($email)) {
    $errors['email'] = 'A valid email is required';
}

if(! Validator::string($password, 7, 255)) {
    $errors['password'] = 'A password of at least 7 charachters is required';
}

if(! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('select * from writer where email = :email', [
    'email' => $email
])->find();

if ($user) {
    header('location: /');
} else {
    // Create the account
    $db->query('insert into writer(name, email, password) values (:name, :email, :password)', [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    $_SESSION['user'] = [
        'email' => $email,
        'name' => $name
    ];

    header('location: /');
    exit();
}
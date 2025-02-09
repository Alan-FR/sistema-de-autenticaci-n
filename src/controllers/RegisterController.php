<?php

# controlador para registrar usuarios a la base de datos

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../error-log.php';
require __DIR__ . '/../models/Database.php';
require __DIR__ . '/../models/user.php';

use Dotenv\Dotenv;

session_start();

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$database = new Database();
$connection = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User($connection);
    
    if ($user->createUser($name,$email,$password)) {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        # echo "Usuario registrado";

        header ("Location: ../views/home.php");

    } else {
        echo "Ocurrio un error al crear tu cuenta";
    }
} else {
    echo "invalid post";
}
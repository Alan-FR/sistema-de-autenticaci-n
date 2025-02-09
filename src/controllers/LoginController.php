<?php

# archivo controlador para logear usuarios registrados

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

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userModel = new User($connection);
    $user = $userModel->findByEmail($email);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];

        header("Location: ../views/home.php");
        exit();

    } else {
        echo "Correo o contraseña incorrectos";
    }
}
<?php

# controlador de la base de datos

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../error-log.php';
require __DIR__ . '/../models/Database.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$database = new Database();
$createConnection = $database->getConnection();
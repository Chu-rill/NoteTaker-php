<?php
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Load the .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Now you can use environment variables
// $db_host = $_ENV['DB_HOST'];
// $db_user = $_ENV['DB_USER'];
// $db_pass = $_ENV['DB_PASS'];
// $db_name = $_ENV['DB_NAME'];
$config = [
    'db_host' => $_ENV['DB_HOST'] ?? '127.0.0.1',
    'db_user' => $_ENV['DB_USER'] ?? 'root',
    'db_pass' => $_ENV['DB_PASS'] ?? '',
    'db_name' => $_ENV['DB_NAME'] ?? 'NoteTaker',
    'app_env' => $_ENV['APP_ENV'] ?? 'production'
];
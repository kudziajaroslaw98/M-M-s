<?php

require_once __DIR__ . './exceptions/autoloadExceptions.php';
require_once __DIR__ . './src/Validation.php';
require_once __DIR__ . './src/DataForm.php';

$config = array(
    'dsn' => 'mysql:dbname=baza; host=127.0.0.1',
    'username' => 'root',
    'password' => ''
);

// try {
//     $pdo = new PDO($config['dsn'], $config['username'], $config['password']);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     throw new ConnectDatabaseException($e->getMessage(), null, $e);
// }

<?php

require_once __DIR__ . './src/DataForm.php';

$config = array(
    'dsn' => 'mysql:dbname=baza; host=127.0.0.1',
    'username' => 'root',
    'password' => ''
);

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);

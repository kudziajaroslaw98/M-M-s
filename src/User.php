<?php

require_once __DIR__ . './../autoload.php';

class User
{
    public function __construct()
    {
        try {
            global $config;
            $this->connect = new PDO($config['dsn'], $config['username'], $config['password']);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function drawAllUsers()
    {
        try {
            $stmt2 = $this->connect->prepare("SELECT userID, firstName, lastName FROM users");

            $exec2 = $stmt2->execute();

            while ($row = $stmt2->fetch()) {
                echo "<option value='" . $row['userID'] . "'>" . $row['firstName'] . " " . $row['lastName'] . "</option>";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

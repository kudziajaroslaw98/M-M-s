<?php

require_once __DIR__ . './../autoload.php';

public class Gear
{
    private $connect = null;

    public function __construct(){
        try{
            global $config;
            $this->connect = new PDO($config['dsn'], $config['username'], $config['password']);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function add($values){
        try{
            $stmt1 = $this->connect->prepare('INSERT INTO gear (`gearID`, `purchaseInvoiceID`, `userID`, `name`, `serialNumber`, `notes`, `netValue`, `warrantyDate`) VALUES (NULL, :InvoiceNumber, :HardwareUser, :HardwareName, :SerialNumber, :Note, :NetValue, :WarrantyDate);');

            $exec1 = $stmt1->execute($values);
            return 1;
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function searchSerialNumber($serialNumber){
        try{
            $stmt2 = $this->connection->prepare('SELECT * FROM gear WHERE serialNumber = :SerialNumber');

            $exec2 = $stmt2->execute($serialNumber);
            return $stmt2->fetchAll();
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function searchGearNumber($gearNumber){
        try{
            $stmt2 = $this->connection->prepare('SELECT * FROM gear WHERE gearID = :gearNumber');

            $exec2 = $stmt2->execute($gearNumber);
            return $stmt2->fetchAll();
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
}


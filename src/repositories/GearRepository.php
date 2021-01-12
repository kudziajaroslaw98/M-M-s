<?php

class GearRepository
{
    private $connect = null;

    public function __construct()
    {
        try {
            global $config;
            $this->connect = new PDO($config['dsn'], $config['username'], $config['password']);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function changeRowToClass($row)
    {
        if (is_null($row['notes'])) {
            $row['notes'] = "";
        }
        if (is_null($row['warrantyDate'])) {
            $row['warrantyDate'] = 'Lifeless';
        }

        return $row;
    }

    private function changeClassToRow(Gear $gear)
    {
        if ($gear->getNotes() == "") {
            $gear->setNotes(null);
        }
        if ($gear->getWarrantyDate() == 'Lifeless') {
            $gear->setWarrantyDate(null);
        }

        return $gear;
    }

    public function select()
    {
        try {
            $sql = "SELECT * FROM gear";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute();

            $gears = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $gear = new Gear();

                // $row = $this->changeRowToClass($row);

                $gear->setId($row['gearID'])->setPurchaseInvoiceID($row['purchaseInvoiceID'])->setUserID($row['userID'])->setName($row['name'])->setSerialNumber($row['serialNumber'])->setNotes($row['notes'])->setNetValue($row['netValue'])->setWarrantyDate(Validation::validateDateAndConvert($row['warrantyDate']));
                array_push($gears, $gear);
            }

            return $gears;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert(Gear $gear)
    {
        try {
            $gear = $this->changeClassToRow($gear);

            $sql = "INSERT INTO gear VALUES(:gearID, :purchaseInvoiceID, :userID, :name, :serialNumber, :notes, :netValue, :warrantyDate)";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'gearID' => $gear->getId(),
                'purchaseInvoiceID' => $gear->getPurchaseInvoiceID(),
                'userID' => $gear->getUserID(),
                'name' => $gear->getName(),
                'serialNumber' => $gear->getSerialNumber(),
                'notes' => $gear->getNotes(),
                'netValue' => $gear->getNetValue(),
                'warrantyDate' => $gear->getWarrantyDate()
            ));

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateByGearNumber(Gear $gear)
    {
        try {
            $gear = $this->changeClassToRow($gear);

            $sql = "UPDATE gear SET purchaseInvoiceID=:purchaseInvoiceID, userID=:userID, name=:name, serialNumber=:serialNumber, notes=:notes, netValue=:netValue, warrantyDate=:warrantyDate WHERE gearID=:id";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => $gear->getId(),
                'purchaseInvoiceID' => $gear->getPurchaseInvoiceID(),
                'userID' => $gear->getUserID(),
                'name' => $gear->getName(),
                'serialNumber' => $gear->getSerialNumber(),
                'notes' => $gear->getNotes(),
                'netValue' => $gear->getNetValue(),
                'warrantyDate' => $gear->getWarrantyDate(),
            ));

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findByGearNumber(int $gearNumber)
    {
        try {
            $sql = "SELECT * FROM gear WHERE gearID LIKE :GearID";
            $stmt = $this->connect->prepare($sql);
            $result = $stmt->execute(array(
                'GearID' => Validation::sanitizeInt($gearNumber) . '%'
            ));

            $gears = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $gear = new Gear();

                // $row = $this->changeRowToClass($row);

                $gear->setId($row['gearID'])->setPurchaseInvoiceID($row['purchaseInvoiceID'])->setUserID($row['userID'])->setName($row['name'])->setSerialNumber($row['serialNumber'])->setNotes($row['notes'])->setNetValue($row['netValue'])->setWarrantyDate(Validation::validateDateAndConvert($row['warrantyDate']));
                array_push($gears, $gear);
            }

            return $gears;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findBySerialNumber(int $serialNumber)
    {
        try {
            $sql = "SELECT * FROM gear WHERE serialNumber LIKE :SerialNumber";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'SerialNumber' => Validation::sanitizeInt($serialNumber) . '%'
            ));

            $gears = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $gear = new Gear();

                // $row = $this->changeRowToClass($row);

                $gear->setId($row['gearID'])->setPurchaseInvoiceID($row['purchaseInvoiceID'])->setUserID($row['userID'])->setName($row['name'])->setSerialNumber($row['serialNumber'])->setNotes($row['notes'])->setNetValue($row['netValue'])->setWarrantyDate(Validation::validateDateAndConvert($row['warrantyDate']));
                array_push($gears, $gear);
            }

            return $gears;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

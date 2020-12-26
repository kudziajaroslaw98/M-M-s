<?php

class GearRepository
{
    private $connect = null;
    private string $stmtSelect;

    public function __construct()
    {
        $this->stmtSelect = "SELECT p.transactionDate, p.currency, u.firstName, u.lastName, g.gearID, g.name, g.serialNumber, g.warrantyDate, g.netValue, g.userID, g.notes, p.purchaseInvoiceID FROM gear g JOIN users u ON g.userID=u.userID JOIN purchaseinvoices p ON g.purchaseInvoiceID=p.purchaseInvoiceID";

        try {
            global $config;
            $this->connect = new PDO($config['dsn'], $config['username'], $config['password']);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
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
                $gear->setId($row['gearID'])->setPurchaseInvoiceID($row['purchaseInvoiceID'])->setUserID($row['userID'])->setName($row['name'])->setSerialNumber($row['serialNumber'])->setNotes($row['notes'])->setNetValue($row['netValue'])->setWarrantyDate('warrantyDate');
                array_push($gears, $gear);
            }

            return $gears;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert(Gear $gear)
    {
    }

    public function updateById(Gear $gear)
    {
    }

    public function findById(Gear $gear)
    {
    }
}

<?php

class SoftwareRepository
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

    public function select()
    {
        try {
            $sql = "SELECT * FROM software";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute();

            $softwares = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $software = new Software();

                $software->setSoftwareID($row['softwareID'])->setUserID($row['userID'])->setPurchaseInvoiceID($row['purchaseInvoiceID'])->setName($row['name'])->setLicenceKey($row['licenceKey'])->setNotes($row['notes'])->setExpirationDate($row['expirationDate'])->setTechSupportDate($row['techSupportDate']);
                array_push($softwares, $software);
            }

            return $softwares;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findById(int $id)
    {
        try {
            $sql = "SELECT * FROM software WHERE softwareID=:id";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => Validation::sanitizeInt($id)
            ));

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                return null;
            }

            $software = new Software();
            $software->setSoftwareID($row['softwareID'])->setUserID($row['userID'])->setPurchaseInvoiceID($row['purchaseInvoiceID'])->setName($row['name'])->setLicenceKey($row['licenceKey'])->setNotes($row['notes'])->setExpirationDate($row['expirationDate'])->setTechSupportDate($row['techSupportDate']);

            return $software;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert(Software $software)
    {
        try {
            $sql = "INSERT INTO software VALUES (:softwareID, :userID, :purchaseInvoiceID, :name, :licenceKey, :notes, :expirationDate, :techSupportDate)";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'softwareID' => $software->getSoftwareID(),
                'userID' => $software->getUserID(),
                'purchaseInvoiceID' => $software->getPurchaseInvoiceID(),
                'name' => $software->getName(),
                'licenceKey' => $software->getLicenceKey(),
                'notes' => $software->getNotes(),
                'expirationDate' => $software->getExpirationDate(),
                'techSupportDate' => $software->getTechSupportDate()
            ));

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update(software $software, int $id)
    {
        try {
            $sql = "UPDATE software SET softwareID=:softwareID, userID=:userID, purchaseInvoiceID=:purchaseInvoiceID, name=:name, licenceKey=:licenceKey, notes=:notes, expirationDate=:expirationDate, techSupportDate=:techSupportDate WHERE softwareID=:id";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'softwareID' => $software->getSoftwareID(),
                'userID' => $software->getUserID(),
                'purchaseInvoiceID' => $software->getPurchaseInvoiceID(),
                'name' => $software->getName(),
                'licenceKey' => $software->getLicenceKey(),
                'notes' => $software->getNotes(),
                'expirationDate' => $software->getExpirationDate(),
                'techSupportDate' => $software->getTechSupportDate(),
                'id' => Validation::sanitizeInt($id)
            ));

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

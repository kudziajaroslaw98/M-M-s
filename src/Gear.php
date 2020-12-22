<?php

require_once __DIR__ . './../autoload.php';

class Gear
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
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function addGear($values)
    {
        try {
            $stmt1 = $this->connect->prepare("INSERT INTO gear (`gearID`, `purchaseInvoiceID`, `userID`, `name`, `serialNumber`, `notes`, `netValue`, `warrantyDate`) VALUES (NULL, :InvoiceNumber, :HardwareUser, :HardwareName, :SerialNumber, :Note, :NetValue, :WarrantyDate)");

            $exec1 = $stmt1->execute(array(
                'InvoiceNumber' => $values['InvoiceNumber'],
                'HardwareUser' => $values['HardwareUser'],
                'HardwareName' => $values['Name'],
                'SerialNumber' => $values['SerialNumber'],
                'Note' => $values['Note'],
                'NetValue' => $values['NetValue'],
                'WarrantyDate' => $values['WarrantyDate']
            ));

            echo 'Hardware has been added.';
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function searchSerialNumber($serialNumber)
    {
        try {
            $stmt2 = $this->connect->prepare("$this->stmtSelect WHERE g.serialNumber LIKE :SerialNumber");

            $exec2 = $stmt2->execute(array(
                'SerialNumber' => "$serialNumber%"
            ));

            $i = 1;
            while ($row = $stmt2->fetch()) {
                $this->echoGear($row, $i);
                $i++;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function searchGearNumber($gearNumber)
    {
        try {
            $stmt2 = $this->connect->prepare("$this->stmtSelect WHERE g.gearID LIKE :GearID");

            $exec2 = $stmt2->execute(array(
                'GearID' => "$gearNumber%"
            ));

            $i = 1;
            while ($row = $stmt2->fetch()) {
                $this->echoGear($row, $i);
                $i++;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function showAllGear()
    {
        try {
            $stmt2 = $this->connect->prepare($this->stmtSelect);
            $exec2 = $stmt2->execute();

            $i = 1;
            while ($row = $stmt2->fetch()) {
                $this->echoGear($row, $i);
                $i++;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function echoGear($row, $i)
    {
        echo "
            <tr>
                <th scope='row'>$i</th>
                <td>" . $row['gearID'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['serialNumber'] . "</td>
                <td>" . $row['purchaseInvoiceID'] . "</td>
                <td>" . $row['transactionDate'] . "</td>
                <td>" . (is_null($row['warrantyDate']) ? "Lifeless" : $row['warrantyDate']) . "</td>
                <td>" . $row['netValue'] . " " . $row['currency'] . "</td>
                <td>" . $row['firstName'] . " " . $row['lastName'] . "</td>
                <td>" . (is_null($row['notes']) ? "" : $row['notes']) . "</td>
            </tr>
        ";
    }
}

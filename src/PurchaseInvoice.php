<?php

require_once __DIR__ . './../autoload.php';

class PurchaseInvoice
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

    public function drawAllInvoices()
    {
        try {
            $stmt2 = $this->connect->prepare("SELECT purchaseInvoiceID, contractorData, transactionDate, amountBrutto, currency FROM purchaseinvoices");

            $exec2 = $stmt2->execute(array(
                'invoice' => $this->kindOfInvoice
            ));

            while ($row = $stmt2->fetch()) {
                echo "<option value='" . $row['purchaseInvoiceID'] . "'>" . $row['contractorData'] . ", " . $row['amountBrutto'] . "" . $row['currency'] . ", " . $row['transactionDate'] . "</option>";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

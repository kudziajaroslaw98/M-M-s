<?php

class PurchaseInvoiceRepository
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
            $sql = "SELECT * FROM purchaseinvoices";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute();

            $purchaseInvoices = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $purchaseInvoice = new PurchaseInvoice();

                $purchaseInvoice->setPurchaseInvoiceID($row['purchaseInvoiceID'])->setUploadTime($row['uploadTime'])->setLastModificationTime($row['lastModificationTime'])->setContractorData($row['contractorData'])->setAmountNetto($row['amountNetto'])->setAmountBrutto($row['amountBrutto'])->setTransactionDate($row['transactionDate'])->setNotes($row['notes'])->setFilePath($row['filePath'])->setCurrency($row['currency'])->setVat($row['vat']);
                array_push($purchaseInvoices, $purchaseInvoice);
            }

            return $purchaseInvoices;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findById(int $id)
    {
        try {
            $sql = "SELECT * FROM purchaseInvoices WHERE purchaseInvoiceID=:id";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => Validation::sanitizeInt($id)
            ));

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                return null;
            }

            $purchaseInvoice = new PurchaseInvoice();

            $purchaseInvoice->setPurchaseInvoiceID($row['purchaseInvoiceID'])->setUploadTime($row['uploadTime'])->setLastModificationTime($row['lastModificationTime'])->setContractorData($row['contractorData'])->setAmountNetto($row['amountNetto'])->setAmountBrutto($row['amountBrutto'])->setTransactionDate($row['transactionDate'])->setNotes($row['notes'])->setFilePath($row['filePath'])->setCurrency($row['currency'])->setVat($row['vat']);

            return $purchaseInvoice;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert(PurchaseInvoice $purchaseInvoice)
    {
    }

    public function update(PurchaseInvoice $purchaseInvoice, int $id)
    {
    }
}

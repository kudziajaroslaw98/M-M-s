<?php

class SaleInvoiceRepository
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
            $sql = "SELECT * FROM saleinvoices";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute();

            $saleInvoices = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $saleInvoice = new SaleInvoice();

                $saleInvoice->setID($row['saleInvoiceID'])->setUploadTime($row['uploadTime'])->setLastModificationTime($row['lastModificationTime'])->setContractorData($row['contractorData'])->setAmountNetto($row['amountNetto'])->setAmountBrutto($row['amountBrutto'])->setTransactionDate($row['transactionDate'])->setNotes($row['notes'])->setFilePath($row['filePath'])->setCurrency($row['currency'])->setVat($row['vat']);
                array_push($saleInvoices, $saleInvoice);
            }

            return $saleInvoices;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findById(int $id)
    {
        try {
            $sql = "SELECT * FROM saleinvoices WHERE saleInvoiceID LIKE :id";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => Validation::sanitizeInt($id) . '%'
            ));

            $saleInvoices = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $saleInvoice = new SaleInvoice();

                $saleInvoice->setID($row['saleInvoiceID'])->setUploadTime($row['uploadTime'])->setLastModificationTime($row['lastModificationTime'])->setContractorData($row['contractorData'])->setAmountNetto($row['amountNetto'])->setAmountBrutto($row['amountBrutto'])->setTransactionDate($row['transactionDate'])->setNotes($row['notes'])->setFilePath($row['filePath'])->setCurrency($row['currency'])->setVat($row['vat']);
                array_push($saleInvoices, $saleInvoice);
            }

            return $saleInvoices;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert(SaleInvoice $saleInvoice)
    {
        try {
            $sql = "INSERT INTO saleinvoices VALUES (:saleInvoiceID, :uploadTime, :lastModificationTime, :contractorData, :amountNetto, :amountBrutto, :transactionDate, :notes, :filePath, :currency, :vat)";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'saleInvoiceID' => $saleInvoice->getID(),
                'uploadTime' => $saleInvoice->getUploadTime(),
                'lastModificationTime' => $saleInvoice->getLastModificationTime(),
                'contractorData' => $saleInvoice->getContractorData(),
                'amountNetto' => $saleInvoice->getAmountNetto(),
                'amountBrutto' => $saleInvoice->getAmountBrutto(),
                'transactionDate' => $saleInvoice->getTransactionDate(),
                'notes' => $saleInvoice->getNotes(),
                'filePath' => $saleInvoice->getFilePath(),
                'currency' => $saleInvoice->getCurrency(),
                'vat' => $saleInvoice->getVat()
            ));

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update(SaleInvoice $saleInvoice, int $id)
    {
        try {
            $sql = "UPDATE saleinvoices SET saleInvoiceID=:saleInvoiceID, uploadTime=:uploadTime, lastModificationTime=:lastModificationTime, contractorData=:contractorData, amountNetto=:amountNetto, amountBrutto=:amountBrutto, transactionDate=:transactionDate, notes=:notes, filePath=:filePath, currency=:currency, vat=:vat WHERE saleInvoiceID=:id";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => Validation::sanitizeInt($id),
                'saleInvoiceID' => $saleInvoice->getID(),
                'uploadTime' => $saleInvoice->getUploadTime(),
                'lastModificationTime' => $saleInvoice->getLastModificationTime(),
                'contractorData' => $saleInvoice->getContractorData(),
                'amountNetto' => $saleInvoice->getAmountNetto(),
                'amountBrutto' => $saleInvoice->getAmountBrutto(),
                'transactionDate' => $saleInvoice->getTransactionDate(),
                'notes' => $saleInvoice->getNotes(),
                'filePath' => $saleInvoice->getFilePath(),
                'currency' => $saleInvoice->getCurrency(),
                'vat' => $saleInvoice->getVat()
            ));

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

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
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
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

                $purchaseInvoice->setID($row['purchaseInvoiceID'])->setUploadTime($row['uploadTime'])->setLastModificationTime($row['lastModificationTime'])->setContractorData($row['contractorData'])->setAmountNetto($row['amountNetto'])->setAmountBrutto($row['amountBrutto'])->setTransactionDate($row['transactionDate'])->setNotes($row['notes'])->setFilePath($row['filePath'])->setCurrency($row['currency'])->setVat($row['vat']);
                array_push($purchaseInvoices, $purchaseInvoice);
            }
            self::pagination();
            return $purchaseInvoices;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public function findById(int $id)
    {
        try {
            $sql = "SELECT * FROM purchaseinvoices WHERE purchaseInvoiceID=:id";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => Validation::sanitizeInt($id)
            ));

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                return null;
            }

            $purchaseInvoice = new PurchaseInvoice();
            $purchaseInvoice->setID($row['purchaseInvoiceID'])->setUploadTime($row['uploadTime'])->setLastModificationTime($row['lastModificationTime'])->setContractorData($row['contractorData'])->setAmountNetto($row['amountNetto'])->setAmountBrutto($row['amountBrutto'])->setTransactionDate($row['transactionDate'])->setNotes($row['notes'])->setFilePath($row['filePath'])->setCurrency($row['currency'])->setVat($row['vat']);

            return $purchaseInvoice;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function searchById(int $id)
    {
        try {
            $sql = "SELECT * FROM purchaseinvoices WHERE purchaseInvoiceID LIKE :id";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => Validation::sanitizeInt($id) . '%'
            ));

            $purchaseInvoices = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $purchaseInvoice = new PurchaseInvoice();
                $purchaseInvoice->setID($row['purchaseInvoiceID'])->setUploadTime($row['uploadTime'])->setLastModificationTime($row['lastModificationTime'])->setContractorData($row['contractorData'])->setAmountNetto($row['amountNetto'])->setAmountBrutto($row['amountBrutto'])->setTransactionDate($row['transactionDate'])->setNotes($row['notes'])->setFilePath($row['filePath'])->setCurrency($row['currency'])->setVat($row['vat']);
                array_push($purchaseInvoices, $purchaseInvoice);
            }

            return $purchaseInvoices;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findByIdOrder($id, $like)
    {
        try {
            if(! ctype_digit(strval($id))){
                throw new InvalidInputExcetion('Given data are invalid!');
            }
            if($like['year'] != null && $like['month'] != null){
                $sql = "SELECT * FROM purchaseInvoices WHERE purchaseInvoiceID LIKE :id AND uploadTime LIKE :uploadTime";
                $stmt = $this->connect->prepare($sql);
                $result = $stmt->execute(array(
                    'id' => Validation::sanitizeInt($id) . '%',
                    'uploadTime' => "".Validation::sanitizeInt($like['year'])."-".Validation::sanitizeInt($year['month'])."-"."%"
                ));
            }
            elseif($like['year'] != null){
                $sql = "SELECT * FROM purchaseInvoices WHERE purchaseInvoiceID LIKE :id AND uploadTime LIKE :uploadTime";
                $stmt = $this->connect->prepare($sql);
                $result = $stmt->execute(array(
                    'id' => Validation::sanitizeInt($id) . '%',
                    'uploadTime' => "".Validation::sanitizeInt($like['year'])."-"."%"
                ));
            }
            elseif($like['month'] != null){
                $sql = "SELECT * FROM purchaseInvoices WHERE purchaseInvoiceID LIKE :id AND uploadTime LIKE :uploadTime";
                $stmt = $this->connect->prepare($sql);
                $now = new DateTime();
                $result = $stmt->execute(array(
                    'id' => Validation::sanitizeInt($id) . '%',
                    'uploadTime' => $now->format("Y")."-".Validation::sanitizeInt($like['month'])."-"."%"
                ));
            }
            else{
                $sql = "SELECT * FROM purchaseInvoices WHERE purchaseInvoiceID LIKE :id";
                $stmt = $this->connect->prepare($sql);
                $result = $stmt->execute(array(
                    'id' => Validation::sanitizeInt($id) . '%'
                ));
            }



            $purchaseInvoices = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $purchaseInvoice = new PurchaseInvoice();

                $purchaseInvoice->setID($row['purchaseInvoiceID'])->setUploadTime($row['uploadTime'])->setLastModificationTime($row['lastModificationTime'])->setContractorData($row['contractorData'])->setAmountNetto($row['amountNetto'])->setAmountBrutto($row['amountBrutto'])->setTransactionDate($row['transactionDate'])->setNotes($row['notes'])->setFilePath($row['filePath'])->setCurrency($row['currency'])->setVat($row['vat']);
                array_push($purchaseInvoices, $purchaseInvoice);
            }

            return $purchaseInvoices;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public function insert(PurchaseInvoice $purchaseInvoice)
    {
        try {
            $sql = "INSERT INTO purchaseinvoices VALUES (:purchaseInvoiceID, :uploadTime, :lastModificationTime, :contractorData, :amountNetto, :amountBrutto, :transactionDate, :notes, :filePath, :currency, :vat)";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'purchaseInvoiceID' => $purchaseInvoice->getID(),
                'uploadTime' => $purchaseInvoice->getUploadTime(),
                'lastModificationTime' => $purchaseInvoice->getLastModificationTime(),
                'contractorData' => $purchaseInvoice->getContractorData(),
                'amountNetto' => $purchaseInvoice->getAmountNetto(),
                'amountBrutto' => $purchaseInvoice->getAmountBrutto(),
                'transactionDate' => $purchaseInvoice->getTransactionDate(),
                'notes' => $purchaseInvoice->getNotes(),
                'filePath' => $purchaseInvoice->getFilePath(),
                'currency' => $purchaseInvoice->getCurrency(),
                'vat' => $purchaseInvoice->getVat()
            ));

            return $result;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public function update(PurchaseInvoice $purchaseInvoice)
    {
        try {
            $sql = "UPDATE purchaseinvoices SET uploadTime=:uploadTime, lastModificationTime=:lastModificationTime, contractorData=:contractorData, amountNetto=:amountNetto, amountBrutto=:amountBrutto, transactionDate=:transactionDate, notes=:notes, filePath=:filePath, currency=:currency, vat=:vat WHERE purchaseInvoiceID=:id";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => $purchaseInvoice->getID(),
                'uploadTime' => $purchaseInvoice->getUploadTime(),
                'lastModificationTime' => $purchaseInvoice->getLastModificationTime(),
                'contractorData' => $purchaseInvoice->getContractorData(),
                'amountNetto' => $purchaseInvoice->getAmountNetto(),
                'amountBrutto' => $purchaseInvoice->getAmountBrutto(),
                'transactionDate' => $purchaseInvoice->getTransactionDate(),
                'notes' => $purchaseInvoice->getNotes(),
                'filePath' => $purchaseInvoice->getFilePath(),
                'currency' => $purchaseInvoice->getCurrency(),
                'vat' => $purchaseInvoice->getVat()
            ));

            return $result;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }
    public function pagination(){
        $_SESSION['purchaseInvoicePage'] = (isset($_GET['purchasepage']) && is_numeric($_GET['purchasepage']) ) ? $_GET['purchasepage'] : 1;
        $_SESSION['purchasePaginationStart'] = ( $_SESSION['purchaseInvoicePage'] - 1) * $_SESSION['records-limit'];
        $sql = "SELECT count(purchaseInvoiceID) FROM purchaseinvoices";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $allRecords = $row[0];
        $_SESSION['purchaseInvoiceTotalPages'] = ceil($allRecords / $_SESSION['records-limit']);
        $_SESSION['purchasePrevPage'] = $_SESSION['purchaseInvoicePage'] - 1;
        $_SESSION['purchaseNextPage'] = $_SESSION['purchaseInvoicePage'] + 1;
    }
}

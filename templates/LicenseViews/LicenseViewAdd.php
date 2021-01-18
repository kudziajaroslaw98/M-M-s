<?php

class LicenseViewAdd
{
    public static function render(array $params = array())
    {
        ob_start();
?>
        <?= Layout::header($params); ?>

        <form class='col-12' method="POST">
            <div class='row col-12'>
                <div class='row col-12'>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" id="Name" name="Name" placeholder="Name">
                        </div>
                    </div>
                </div>

                <div class="row col-12">
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="SerialKey">Serial Key</label>
                            <input type="text" class="form-control" id="SerialKey" name="SerialKey" placeholder="Serial Key">
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="ExpirationDate">Expiration Date</label>
                            <input type="date" class="form-control" id="ExpirationDate" name="ExpirationDate" placeholder="Expiration Date">
                        </div>
                    </div>


                </div>
                <div class="row col-12">
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="TechSupportDate">Tech Support Date</label>
                            <input type="date" class="form-control" id="TechSupportDate" name="TechSupportDate" placeholder="Tech Support Date">
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="PurchaseInvoice">Purchase Invoice</label>
                            <!-- <input type="number" class="form-control" id="PurchaseInvoice" placeholder="Invoice Id"> -->
                            <select class="form-control" id="InvoiceNumber" name="InvoiceNumber">
                                <?= Templates::renderPurchaseInvoices() ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row col-12">
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="LicenseUser">License User</label>
                            <!-- <input type="text" class="form-control" id="LicenseUser" placeholder="License User"> -->
                            <select class="form-control" id="LicenseUser" name="LicenseUser">
                                <?= Templates::renderUsers() ?>
                            </select>
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="Note">Note</label>
                            <input type="text" class="form-control" id="Note" name="Note" placeholder="Note">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row col-12">
                <div class='col-4 offset-md-4'>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-user btn-block form-control-input" id="AddEqSubmit">
                    </div>
                </div>
            </div>
        </form>

        <div class="info">
            <?= self::addLicense() ?>
        </div>

        <?= Layout::footer() ?>
<?php
        $html = ob_get_clean();
        return $html;
    }

    private static function addLicense()
    {
        try {
            if (!empty($_POST)) {
                // security
                $dataForm = new DataForm($_POST, array('InvoiceNumber', 'Note', 'TechSupportDate', 'ExpirationDate', 'SerialKey'));
                $dataForm->sanitizeData();  // must be before checking, because this replace ignoring values to null if they are empty
                if (!$dataForm->checkIfExistsData()) {
                    throw new InvalidInputExcetion('Given data are invalid!');
                }

                // validation licence key
                if (!Validation::validateLicense($dataForm->data['SerialKey'])) {
                    throw new InvalidInputExcetion('Given serial key is invalid!');
                }

                // check if isset selected user
                $userRepository = new UserRepository();
                $user = $userRepository->findById($dataForm->data['HardwareUser']);
                if (!$user) {
                    throw new InvalidInputExcetion('Selected user does not exists!');
                }

                // check if isset selected invoice
                $invoiceRepository = new PurchaseInvoiceRepository();
                $invoice = $invoiceRepository->findById($dataForm->data['InvoiceNumber']);
                if (!$invoice) {
                    throw new InvalidInputExcetion('Selected invoice does not exists!');
                }

                // check date fields
                $dateName = array('TechSupportDate', 'ExpirationDate');
                foreach ($dateName as $key => $value) {
                    if (!empty($dataForm->data[$value]) && !Validation::validateDateAndConvert($dataForm->data[$value])) {
                        throw new InvalidInputExcetion('Date is invalid!');
                    }
                }

                // repository and entity
                $softwareRepository = new SoftwareRepository();
                $software = new Software();
                $software->setSoftwareID(null)->setUserID($dataForm->data['LicenseUser'])->setPurchaseInvoiceID($dataForm->data['InvoiceNumber'])->setName($dataForm->data['Name'])->setLicenceKey($dataForm->data['SerialKey'])->setNotes($dataForm->data['Note'])->setExpirationDate($dataForm->data['ExpirationDate'])->setTechSupportDate($dataForm->data['TechSupportDate']);

                // check inserting to db
                if (!$softwareRepository->insert($software)) {
                    throw new PDOException('Request processing error.');
                }

                // all OK
                echo 'License has been added.';
            }
        } catch (Exception $e) {
            echo NotificationHandler::handle("notification-warning", $e->getMessage());
        }
    }
}

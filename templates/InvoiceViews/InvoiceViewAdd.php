<?php

class InvoiceViewAdd
{
    public static function render(array $params = array())
    {
        ob_start();
?>
        <?= Layout::header($params); ?>

        <form class='col-12'>
            <div class='row col-12'>
                <div class='row col-12'>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="InvoiceNumber">Invoice Number</label>
                            <input type="number" class="form-control" id="InvoiceNumber" name="InvoiceNumber" placeholder="Invoice Number">
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="InvoiceKind">Kind of Invoice</label>
                            <!-- <input type="number" class="form-control" id="InvoiceNumber" placeholder="Invoice Number"> -->
                            <select class="form-control" id="InvoiceKind" name="InvoiceKind">
                                <option value="purchase">Purchase</option>
                                <option value="sale">Sale</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class='row col-12'>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="ContractorData">Contractor Data</label>
                            <input type="text" class="form-control" id="ContractorData" name="ContractorData" placeholder="Contractor Data">
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="NETTO">NETTO</label>
                            <input type="number" class="form-control" id="NETTO" name="NETTO" placeholder="NETTO">
                        </div>
                    </div>
                </div>
                <div class="row col-12">
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="VAT">VAT</label>
                            <input type="number" class="form-control" id="VAT" name="VAT" placeholder="VAT" min=0.0 max=1.0 step=0.01>
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="BRUTTO">BRUTTO</label>
                            <input type="number" class="form-control" id="BRUTTO" name="BRUTTO" placeholder="BRUTTO">
                        </div>
                    </div>


                </div>
                <div class="row col-12">
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="CurrencyNETTO">Currency NETTO</label>
                            <input type="number" class="form-control" id="CurrencyNETTO" name="CurrencyNETTO" placeholder="Currency NETTO">
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="CurrancyName">Currancy Name</label>
                            <input type="text" class="form-control" id="CurrancyName" name="CurrancyName" placeholder="Currancy Name">
                        </div>
                    </div>
                </div>

                <div class="row col-12">
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="TransactionDate">Transaction date</label>
                            <input type="date" class="form-control" id="TransactionDate" name="TransactionDate">
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="Notes">Notes</label>
                            <input type="text" class="form-control" id="Notes" name="Notes" placeholder="Notes">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row col-12">
                <div class="form-group">
                    <label for="UploadEq">Pick file to Upload</label>
                    <input type="file" class="form-control-file" id="UploadInvoice" name="UploadInvoice">
                </div>
            </div>
            <div class="row col-12">
                <div class='col-4 offset-md-4'>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-user btn-block form-control-input" id="AddEqSubmit" name="AddEqSubmit">
                    </div>
                </div>
            </div>
        </form>

        <?= Layout::footer() ?>
<?php
        $html = ob_get_clean();
        return $html;
    }

    private static function addInvoice()
    {
        try {
            if (!empty($_POST)) {
                $dataForm = new DataForm($_POST, array('Note'), true, array('UploadInvoice'));
                $dataForm->sanitizeData();  // must be before checking, because this replace ignoring values to null if they are empty
                if (!$dataForm->checkIfExistsData()) {
                    throw new InvalidInputExcetion('Given data are invalid!');
                }
                if ($dataForm->data['VAT'] < 0.0 || $dataForm->data['VAT'] > 1.0) {
                    throw new InvalidInputExcetion('VAT is invalid!');
                }

                $invoiceRepository = null;
                $invoice = null;

                if ($dataForm->data['InvoiceKind'] == 'sale') {
                    $invoiceRepository = new SaleInvoiceRepository();
                    $invoice = new SaleInvoice();
                } else {
                    $invoiceRepository = new PurchaseInvoiceRepository();
                    $invoice = new PurchaseInvoice();
                }
                $invoice->setID($dataForm->data['InvoiceNumber'])->setUploadTime(date('Y-m-d'))->setLastModificationTime(date('Y-m-d'))->setContractorData($dataForm->data['ContractorData'])->setAmountNetto($dataForm->data['NETTO'])->setAmountBrutto($dataForm->data['BRUTTO'])->setTransactionDate($dataForm->data['TransactionDate'])->setNotes($dataForm->data['Notes'])->setFilePath($dataForm->data[''])->setCurrency($dataForm->data['CurrancyName'])->setVat($dataForm->data['VAT']);

                if (!$invoiceRepository->insert($invoice)) {
                    throw new PDOException('Request processing error.');
                }

                echo ucfirst($dataForm['InvoiceKind']) . 'invoice has been added.';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

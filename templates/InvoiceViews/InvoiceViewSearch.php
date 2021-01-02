<?php

class InvoiceViewSearch
{
    public static function render(array $params = array())
    {
        ob_start();
?>
        <?= Layout::header($params); ?>
        <div class='card-header'>
            <div class="row">
                <div class='col-6'>
                    <form method="post">
                        <div class='row'>
                            <label for="search_PurchaseInvoice">Purchase Invoice Number: </label>
                            <input type="search" placeholder="Invoice Number" id="search_PurchaseInvoice" name="search_PurchaseInvoice" class='form-control search_user' value="12312">
                        </div>
                        <div class='row justify-content-center'>
                            <div class="form-group  col-8">
                                <input type="submit" class="btn btn-primary btn-user btn-block form-control-input mt-2" id="PurchaseInvoiceNumber" name="PurchaseInvoiceNumber">
                            </div>
                        </div>
                    </form>
                </div>
                <div class='col-6'>
                    <form method="post">
                        <div class='row'>
                            <label for="search_SaleInvoice">Sale Invoice Number: </label>
                            <input type="search" placeholder="Invoice Number" id="search_SaleInvoice" name="search_SaleInvoice" class='form-control search_user' value="125215212">
                        </div>
                        <div class='row justify-content-center'>
                            <div class="form-group  col-8">
                                <input type="submit" class="btn btn-primary btn-user btn-block form-control-input mt-2" id="SaleInvoiceNumber" name="SaleInvoiceNumber">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?= self::renderInvoices('searchInvoice', 'Sale Invoices', 'search_SaleInvoice') ?>
        <?= self::renderInvoices('searchInvoice', 'Purchase Invoices', 'search_PurchaseInvoice') ?>

        <?= Layout::footer() ?>
    <?php
        $html = ob_get_clean();
        return $html;
    }

    private static function searchInvoice(string $option)
    {
        try {
            if (!empty($_POST)) {
                if (!in_array($option, array_keys($_POST))) {
                    throw new InvalidArgumentException();
                }

                // security data
                $dataForm = new DataForm($_POST);
                $dataForm->sanitizeData();
                if (!$dataForm->checkIfExistsData()) {
                    throw new InvalidInputExcetion('Given data are invalid!');
                }

                // repository
                $repository = null;

                // right repository
                if (isset($dataForm->data['SaleInvoiceNumber'])) {
                    $repository = new SaleInvoiceRepository();
                } else {
                    $repository = new PurchaseInvoiceRepository();
                }

                // find invoices
                $invoiceNumber = $dataForm->data[array_keys($dataForm->data)[0]];  // in dataForm searching number is first value
                $invoices = $repository->findById($invoiceNumber);

                // render results
                $i = 1;
                foreach ($invoices as $invoice) {
                    InvoiceController::renderRow($invoice, $i);
                    $i++;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private static function renderInvoices($invoicesRenderFunction, string $title, string $option)
    {
        ob_start();
    ?>
        <div class="table-responsive">
            <h3><?= $title ?></h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Invoice Number</th>
                        <th scope="col">Upload Time</th>
                        <th scope="col">Last Modify Time</th>
                        <th scope="col">Contractor Data</th>
                        <th scope="col">Transaction Date</th>
                        <th scope="col">NETTO</th>
                        <th scope="col">VAT</th>
                        <th scope="col">BRUTTO</th>
                        <th scope="col">Currency</th>
                        <th scope="col">Notes</th>
                        <th scope="col">File</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <th scope="row">1</th>
                        <td>421512</td>
                        <td>29.12.2020</td>
                        <td>29.12.2020</td>
                        <td>Jaroslaw Kudzia, 24%, 99102</td>
                        <td>29.12.2020</td>
                        <td>681</td>
                        <td>24%</td>
                        <td>5215</td>
                        <td>PLN</td>
                        <td>Notka</td>
                        <td>Plik</td>
                    </tr> -->
                    <?= self::$invoicesRenderFunction($option) ?>
                </tbody>
            </table>
        </div>
<?php
        $html = ob_get_clean();
        return $html;
    }
}

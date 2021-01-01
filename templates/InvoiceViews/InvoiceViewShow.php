<?php

class InvoiceViewShow
{
    public static function render(array $params = array())
    {
        ob_start();
?>
        <?= Layout::header($params); ?>

        <?= self::renderInvoices('renderInvoiceSalesRows', 'Sale Invoices') ?>
        <?= self::renderInvoices('renderInvoicePurchasesRows', 'Purchase Invoices') ?>

        <?= Layout::footer() ?>
    <?php
        $html = ob_get_clean();
        return $html;
    }

    private static function renderInvoices($invoicesRenderFunction, string $title)
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
                    <tr>
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
                    </tr>
                    <?= self::$invoicesRenderFunction() ?>
                </tbody>
            </table>
        </div>
<?php
        $html = ob_get_clean();
        return $html;
    }

    private static function renderInvoiceRows($repository)
    {
        $invoiceRepository = $repository;
        $invoices = $invoiceRepository->select();

        $i = 1;
        foreach ($invoices as &$invoice) {
            InvoiceController::renderRow($invoice, $i);
            $i++;
        }
    }

    private static function renderInvoiceSalesRows()
    {
        self::renderInvoiceRows(new SaleInvoiceRepository());
    }

    private static function renderInvoicePurchasesRows()
    {
        self::renderInvoiceRows(new PurchaseInvoiceRepository());
    }
}

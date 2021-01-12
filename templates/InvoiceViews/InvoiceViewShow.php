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
        <?= self::invoiceModalJS()?>
        <?= self::renderInvoiceModal()?>

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
            self::renderRow($invoice, $i);
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

    public static function renderRow(Invoice &$invoice, int $lp)
    {
        echo "
    <tr>
        <th scope='row'>$lp</th>
        <td>" . $invoice->getID() . "</td>
        <td>" . $invoice->getUploadTime() . "</td>
        <td>" . $invoice->getLastModificationTime() . "</td>
        <td>" . $invoice->getContractorData() . "</td>
        <td>" . $invoice->getTransactionDate() . "</td>
        <td>" . $invoice->getAmountNetto() . "</td>
        <td>" . $invoice->getVat() * 100 . "%</td>
        <td>" . $invoice->getAmountBrutto() . "</td>
        <td>" . $invoice->getCurrency() . "</td>
        <td>" . $invoice->getNotes() . "</td>
        <td><button type=\"button\" onclick=\"getModalData('".
        $invoice->getID()."','".
        $invoice->getUploadTime()."','".
        $invoice->getLastModificationTime()."','".
        $invoice->getContractorData()."','".
        $invoice->getTransactionDate()."','".
        $invoice->getAmountNetto()."','".
        $invoice->getCurrency()."','".
        $invoice->getNotes()."','".
        $invoice->getFilePath()."')\" 
        class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#invoiceModal\">Show PDF</button></td>
    </tr>
    ";
    }
    public static function invoiceModalJS()
    {
        ob_start();?> 
        <script>
            function getModalData(id,upTime,lModTime,contData,trData,amNet,curr,notes,path) {
                document.getElementById("pdfField").remove();
                let newPdfField= document.createElement("object");
                newPdfField.setAttribute("type","application/pdf");

                newPdfField.setAttribute("id","pdfField");
                newPdfField.setAttribute("data",path);
                newPdfField.setAttribute("style","height: 85vh; width: 100%");
                document.getElementById("pdfContainer").appendChild(newPdfField);
                console.log(id);
            }
        </script>
      <?php return ob_get_clean();
    }
    public static function renderInvoiceModal()
    {
        ob_start();?> "<div class="modal" id="invoiceModal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div id="pdfContainer">
                    <object id="pdfField" type="application/pdf" data="\"  style="height: 85vh;">No Support</object>
                </div>
            </div>
          </div>
        </div>
      </div>;
      <?php return ob_get_clean();
    }
}
?>
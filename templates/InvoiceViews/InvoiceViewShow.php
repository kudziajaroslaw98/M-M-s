<?php

class InvoiceViewShow
{
    public static function render(array $params = array())
    {
        ob_start();
?>
        <?= Layout::header($params); ?>

        <?= self::renderInvoices('renderInvoiceSalesRows', 'Sale Invoices', 'salesInvoicePagination') ?>
        <?= self::renderInvoices('renderInvoicePurchasesRows', 'Purchase Invoices', 'purchasesInvoicePagination') ?>
        <?= self::invoiceModalJS()?>
        <?= self::renderInvoiceModal()?>

        <?= Layout::footer() ?>
    <?php
        $html = ob_get_clean();
        return $html;
    }

    private static function renderInvoices($invoicesRenderFunction, string $title , $pagination)
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
        <?= self::$pagination() ?>
<?php
        $html = ob_get_clean();
        return $html;
    }

    private static function renderInvoiceRows($repository, string $type){
        $invoiceRepository = $repository;
        $invoices = $invoiceRepository->select();

        $i = 0;
        foreach ($invoices as &$invoice) {
            if($type == 'sale' && $i >= $_SESSION['salePaginationStart'] && $i < $_SESSION['salePaginationStart']+$_SESSION['records-limit']){
                self::renderRow($invoice, $i+1);
            }
            if($type == 'purchase' && $i >= $_SESSION['purchasePaginationStart'] && $i < $_SESSION['purchasePaginationStart']+$_SESSION['records-limit']){
                self::renderRow($invoice, $i+1);
            }
            $i++;
        }
    }

    private static function renderInvoiceSalesRows()
    {
        self::renderInvoiceRows(new SaleInvoiceRepository(), 'sale');
    }

    private static function renderInvoicePurchasesRows()
    {
        self::renderInvoiceRows(new PurchaseInvoiceRepository(), 'purchase');
    }

    private static function salesInvoicePagination(){
        ob_start();
        ?>
        <nav aria-label="Page navigation example mt-5">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if($_SESSION['saleInvoicePage'] <= 1){ echo 'disabled'; } ?>">
                <a class="page-link"
                    href="<?php if($_SESSION['saleInvoicePage'] <= 1){ echo '#'; } else { echo "?action=invoice-show&purchasepage=".$_SESSION['purchaseInvoicePage']."&salepage=" .  $_SESSION['salePrevPage']; } ?>">Previous</a>
            </li>

            <?php for($i = 1; $i <= $_SESSION['saleInvoiceTotalPages']; $i++ ): ?>
            <li class="page-item <?php if($_SESSION['saleInvoicePage'] == $i) {echo 'active'; } ?>">
                <a class="page-link" href="home.php?action=invoice-show&purchasepage=<?=$_SESSION['purchaseInvoicePage']?>&salepage=<?= $i; ?>"> <?= $i; ?> </a>
            </li>
            <?php endfor; ?>

            <li class="page-item <?php if($_SESSION['saleInvoicePage']>= $_SESSION['saleInvoiceTotalPages']) { echo 'disabled'; } ?>">
                <a class="page-link"
                    href="<?php if($_SESSION['saleInvoicePage'] >= $_SESSION['saleInvoiceTotalPages']){ echo '#'; } else {echo "?action=invoice-show&purchasepage=<".$_SESSION['purchaseInvoicePage'].">&salepage=".  $_SESSION['saleNextPage']; } ?>">Next</a>
            </li>
        </ul>
    </nav>
    <?php
        $html = ob_get_clean();
        return $html;
    }

    private static function purchasesInvoicePagination(){
        ob_start();
        ?>
        <nav aria-label="Page navigation example mt-5">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if($_SESSION['purchaseInvoicePage'] <= 1){ echo 'disabled'; } ?>">
                <a class="page-link"
                    href="<?php if($_SESSION['purchaseInvoicePage'] <= 1){ echo '#'; } else { echo "?action=invoice-show&salepage=".$_SESSION['saleInvoicePage']."&purchasepage=" .  $_SESSION['purchasePrevPage']; } ?>">Previous</a>
            </li>

            <?php for($i = 1; $i <= $_SESSION['purchaseInvoiceTotalPages']; $i++ ): ?>
            <li class="page-item <?php if($_SESSION['purchaseInvoicePage'] == $i) {echo 'active'; } ?>">
                <a class="page-link" href="home.php?action=invoice-show&salepage=<?=$_SESSION['saleInvoicePage']?>&purchasepage=<?= $i; ?>"> <?= $i; ?> </a>
            </li>
            <?php endfor; ?>

            <li class="page-item <?php if($_SESSION['purchaseInvoicePage']>= $_SESSION['purchaseInvoiceTotalPages']) { echo 'disabled'; } ?>">
                <a class="page-link"
                    href="<?php if($_SESSION['purchaseInvoicePage'] >= $_SESSION['purchaseInvoiceTotalPages']){ echo '#'; } else {echo "?action=invoice-show&salepage=".$_SESSION['saleInvoicePage']."&purchasepage=".  $_SESSION['purchaseNextPage']; } ?>">Next</a>
            </li>
        </ul>
    </nav>
    <?php
        $html = ob_get_clean();
        return $html;
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

<?php

class InvoiceViewShowList
{
    public static function render(array $params = array())
    {
        ob_start();
?>
        <?= Layout::header($params); ?>

        <div class="InvoicesFound card">

            <h5 class="card-header">Found Invoices</h5>
            <div class="card-body">
                <div class='card'>
                    <div class='card-header'>
                        <label for="InvoideId" class="col-sm-2 col-form-label">#</label><span id="InvoideId">1</span></li>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><label for="InvoiceNumber" class="col-sm-2 col-form-label">Invoice Number</label><span id="InvoiceNumber">421512</span></li>
                            <li class="list-group-item"><label for="ContractorData" class="col-sm-2 col-form-label">Contractor Data</label><span id="ContractorData">Jaroslaw Kudzia, 24%, 99102</span></li>
                            <li class="list-group-item"><label for="NETTO" class="col-sm-2 col-form-label">NETTO</label><span id="NETTO">681 zł</span></li>
                            <li class="list-group-item"><label for="VAT" class="col-sm-2 col-form-label">VAT</label><span id="VAT">24%</span></li>
                            <li class="list-group-item"><label for="BRUTTO" class="col-sm-2 col-form-label">BRUTTO</label><span id="BRUTTO">5215 zł</span></li>
                            <li class="list-group-item"><label for="CurrencyNETTO" class="col-sm-2 col-form-label">Currency NETTO</label><span id="CurrencyNETTO">24718 zł</span></li>
                            <li class="list-group-item"><label for="CurrancyName" class="col-sm-2 col-form-label">Currancy Name</label><span id="CurrancyName">Złotych</span></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>

        <?= Layout::footer() ?>
<?php
        $html = ob_get_clean();
        return $html;
    }
}

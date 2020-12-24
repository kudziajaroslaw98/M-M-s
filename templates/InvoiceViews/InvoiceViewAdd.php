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
                <div class='col-6'>
                    <div class="form-group">
                        <label for="InvoiceNumber">Invoice Number</label>
                        <input type="number" class="form-control" id="InvoiceNumber" placeholder="Invoice Number">
                    </div>
                </div>

                <div class='row col-12'>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="ContractorData">Contractor Data</label>
                            <input type="text" class="form-control" id="ContractorData" placeholder="Contractor Data">
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="NETTO">NETTO</label>
                            <input type="number" class="form-control" id="NETTO" placeholder="NETTO">
                        </div>
                    </div>
                </div>
                <div class="row col-12">
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="VAT">VAT</label>
                            <input type="number" class="form-control" id="VAT" placeholder="VAT">
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="BRUTTO">BRUTTO</label>
                            <input type="number" class="form-control" id="BRUTTO" placeholder="BRUTTO">
                        </div>
                    </div>


                </div>
                <div class="row col-12">
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="CurrencyNETTO">Currency NETTO</label>
                            <input type="number" class="form-control" id="CurrencyNETTO" placeholder="Currency NETTO">
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="CurrancyName">Currancy Name</label>
                            <input type="text" class="form-control" id="CurrancyName" placeholder="Currancy Name">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row col-12">
                <div class="form-group">
                    <label for="UploadEq">Pick file to Upload</label>
                    <input type="file" class="form-control-file" id="UploadInvoice">
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

        <?= Layout::footer() ?>
<?php
        $html = ob_get_clean();
        return $html;
    }
}

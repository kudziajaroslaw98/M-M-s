<?php

class LicenseViewAdd
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
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" id="Name" placeholder="Name">
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="InvoiceId">Invoice Id</label>
                            <input type="number" class="form-control" id="InvoiceId" placeholder="Invoice Id">
                        </div>
                    </div>
                </div>

                <div class="row col-12">
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="SerialKey">Serial Key</label>
                            <input type="text" class="form-control" id="SerialKey" placeholder="Serial Key">
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="ExpirationDate">Expiration Date</label>
                            <input type="date" class="form-control" id="ExpirationDate" placeholder="Expiration Date">
                        </div>
                    </div>


                </div>
                <div class="row col-12">
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="WarrantyDate">Warranty Date</label>
                            <input type="date" class="form-control" id="WarrantyDate" placeholder="Warranty Date">
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="PurchaseDate">Purchase Date</label>
                            <input type="date" class="form-control" id="PurchaseDate" placeholder="Purchase Date">
                        </div>
                    </div>
                </div>
                <div class="row col-12">
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="LicenseUser">License User</label>
                            <input type="text" class="form-control" id="LicenseUser" placeholder="License User">
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="Note">Note</label>
                            <input type="text" class="form-control" id="Note" placeholder="Note">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row col-12">
                <div class="form-group">
                    <label for="UploadLicense">Pick file to Upload</label>
                    <input type="file" class="form-control-file" id="UploadLicense">
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
        </div>

        <?= Layout::footer() ?>
<?php
        $html = ob_get_clean();
        return $html;
    }
}

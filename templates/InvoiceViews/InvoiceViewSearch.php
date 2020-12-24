<?php

class InvoiceViewSearch
{
    public static function render(array $params = array())
    {
        ob_start();
?>
        <?= Layout::header($params); ?>
        <div class='card-header'>
            <div class='col-12'>
                <label for="search_user">Invoice Number: </label>
                <input type="search" placeholder="Invoice Number" id="search_invoice_id" class='form-control search_user' value="421512">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Invoice Number</th>
                        <th scope="col">Contractor Data</th>
                        <th scope="col">NETTO</th>
                        <th scope="col">VAT</th>
                        <th scope="col">BRUTTO</th>
                        <th scope="col">Currency NETTO</th>
                        <th scope="col">Currancy Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>421512</td>
                        <td>Jaroslaw Kudzia, 24%, 99102</td>
                        <td>681 zł</td>
                        <td>24%</td>
                        <td>5215 zł</td>
                        <td>24718 zł</td>
                        <td>Złotych</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?= Layout::footer() ?>
<?php
        $html = ob_get_clean();
        return $html;
    }
}

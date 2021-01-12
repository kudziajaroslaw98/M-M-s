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
                            <input type="search" placeholder="Invoice Number" id="search_PurchaseInvoice" name="search_PurchaseInvoice" class='form-control search_user' value="1">
                        </div>
                        <div class='row'>
                            <div class='row col-2 offset-md-1 d-flex justify-content-between '>
                                <label for="dob-year">lata </label>
                                <?php echo self::renderYears(); ?>
                            </div>
                            <div class='row col-2 offset-md-1 d-flex justify-content-between'>
                                <label for="dob-month">miesiące </label>
                                <?php echo self::renderMonths(); ?>
                            </div>
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
                            <input type="search" placeholder="Invoice Number" id="search_SaleInvoice" name="search_SaleInvoice" class='form-control search_user' value="1">
                        </div>
                        <div class='row'>
                            <div class='row col-2 offset-md-1 d-flex justify-content-between '>
                                <label for="dob-year">lata </label>
                                <?php echo self::renderYears(); ?>
                            </div>
                            <div class='row col-2 offset-md-1 d-flex justify-content-between'>
                                <label for="dob-month">miesiące </label>
                                <?php echo self::renderMonths(); ?>
                            </div>
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

        <?= self::renderInvoices('searchInvoice', 'Purchase Invoices', 'search_PurchaseInvoice') ?>
        <?= self::renderInvoices('searchInvoice', 'Sale Invoices', 'search_SaleInvoice') ?>


        <?= Layout::footer() ?>
    <?php
        $html = ob_get_clean();
        return $html;
    }

    private static function searchInvoice(string $option)
    {
        try {

            if (!empty($_POST)) {
                if (in_array($option, array_keys($_POST))) {
                    $year = null;
                    $month = null;
                    if(!empty($_POST['dob-year'])){
                        $year = $_POST['dob-year'];
                    }
                    if(!empty($_POST['dob-month'])){
                        $month = $_POST['dob-month'];
                    }
                    // security data
                     $dataForm = new DataForm($_POST);
                    // $dataForm->sanitizeData();
                    // if (!$dataForm->checkIfExistsData()) {
                    //     throw new InvalidInputExcetion('Given data are invalid!');
                    // }
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
                    if($year != null || $month != null){
                        $array = array(
                            'year'=> $year,
                            'month'=>$month
                        );
                        $invoices = $repository->findByIdOrder($invoiceNumber, $array);
                    }
                    else{
                        $invoices = $repository->findById($invoiceNumber);
                    }

                    // render results
                    $i = 1;
                    foreach ($invoices as $invoice) {
                        InvoiceController::renderRow($invoice,   $i);
                        $i++;
                    }
                }
            }
        } catch (Exception $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
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
                    <?= self::$invoicesRenderFunction($option) ?>
                </tbody>
            </table>
        </div>
<?php
        $html = ob_get_clean();
        return $html;
    }
    public static function renderYears(){
        ob_start();
        ?>
            <select name="dob-year" class="datefield year">
                <option value="">Year</option>
                <!-- <option value="2026">2026</option>
                <option value="2025">2025</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option> -->
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
                <option value="2005">2005</option>
                <option value="2004">2004</option>
                <option value="2003">2003</option>
                <option value="2002">2002</option>
                <option value="2001">2001</option>
                <option value="2000">2000</option>
                <option value="1999">1999</option>
                <option value="1998">1998</option>
                <option value="1997">1997</option>
                <option value="1996">1996</option>
                <option value="1995">1995</option>
                <option value="1994">1994</option>
                <option value="1993">1993</option>
                <option value="1992">1992</option>
                <option value="1991">1991</option>
                <option value="1990">1990</option>
                <option value="1989">1989</option>
                <option value="1988">1988</option>
                <option value="1987">1987</option>
                <option value="1986">1986</option>
                <option value="1985">1985</option>
                <option value="1984">1984</option>
                <option value="1983">1983</option>
                <option value="1982">1982</option>
                <option value="1981">1981</option>
                <option value="1980">1980</option>
                <option value="1979">1979</option>
                <option value="1978">1978</option>
                <option value="1977">1977</option>
                <option value="1976">1976</option>
                <option value="1975">1975</option>
                <option value="1974">1974</option>
                <option value="1973">1973</option>
                <option value="1972">1972</option>
                <option value="1971">1971</option>
                <option value="1970">1970</option>
                <option value="1969">1969</option>
                <option value="1968">1968</option>
                <option value="1967">1967</option>
                <option value="1966">1966</option>
                <option value="1965">1965</option>
                <option value="1964">1964</option>
                <option value="1963">1963</option>
                <option value="1962">1962</option>
                <option value="1961">1961</option>
                <option value="1960">1960</option>
                <option value="1959">1959</option>
                <option value="1958">1958</option>
                <option value="1957">1957</option>
                <option value="1956">1956</option>
                <option value="1955">1955</option>
                <option value="1954">1954</option>
                <option value="1953">1953</option>
                <option value="1952">1952</option>
                <option value="1951">1951</option>
                <option value="1950">1950</option>
                <option value="1949">1949</option>
                <option value="1948">1948</option>
                <option value="1947">1947</option>
                <option value="1946">1946</option>
                <option value="1945">1945</option>
                <option value="1944">1944</option>
                <option value="1943">1943</option>
                <option value="1942">1942</option>
                <option value="1941">1941</option>
                <option value="1940">1940</option>
                <option value="1939">1939</option>
                <option value="1938">1938</option>
                <option value="1937">1937</option>
                <option value="1936">1936</option>
                <option value="1935">1935</option>
                <option value="1934">1934</option>
                <option value="1933">1933</option>
                <option value="1932">1932</option>
                <option value="1931">1931</option>
                <option value="1930">1930</option>
                <option value="1929">1929</option>
                <option value="1928">1928</option>
                <option value="1927">1927</option>
                <option value="1926">1926</option>
                <option value="1925">1925</option>
                <option value="1924">1924</option>
                <option value="1923">1923</option>
                <option value="1922">1922</option>
                <option value="1921">1921</option>
                <option value="1920">1920</option>
                <option value="1919">1919</option>
                <option value="1918">1918</option>
                <option value="1917">1917</option>
                <option value="1916">1916</option>
                <option value="1915">1915</option>
                <option value="1914">1914</option>
                <option value="1913">1913</option>
                <option value="1912">1912</option>
                <option value="1911">1911</option>
                <option value="1910">1910</option>
                <option value="1909">1909</option>
                <option value="1908">1908</option>
                <option value="1907">1907</option>
                <option value="1906">1906</option>
                <option value="1905">1905</option>
                <option value="1904">1904</option>
                <option value="1903">1903</option>
                <option value="1902">1902</option>
                <option value="1901">1901</option>
                <option value="1900">1900</option>
            </select>
            <?php
            $html = ob_get_clean();
            return $html;
    }
    public static function renderMonths(){
        ob_start();
        ?>
            <select name="dob-month" class="datefield month">
                <option value="">Month</option>
                <option value="01">Jan</option>
                <option value="02">Feb</option>
                <option value="03">Mar</option>
                <option value="04">Apr</option>
                <option value="05">May</option>
                <option value="06">Jun</option>
                <option value="07">Jul</option>
                <option value="08">Aug</option>
                <option value="09">Sep</option>
                <option value="10">Oct</option>
                <option value="11">Nov</option>
                <option value="12">Dec</option>
            </select>
        <?php
            $html = ob_get_clean();
            return $html;
    }
}

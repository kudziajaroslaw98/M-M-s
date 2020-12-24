<?php

class HardwareViewSearch
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
                            <label for="search_user">Hardware Number: </label>
                            <input type="search" placeholder="Hardware Number" id="search_Hardware_number" name="search_Hardware_number" class='form-control search_user' value="12312">
                        </div>
                        <div class='row justify-content-center'>
                            <div class="form-group  col-8">
                                <input type="submit" class="btn btn-primary btn-user btn-block form-control-input mt-2" id="HardwareNumber" name="HardwareNumber">
                            </div>
                        </div>
                    </form>
                </div>
                <div class='col-6'>
                    <form method="post">
                        <div class='row'>
                            <label for="search_user">Hardware Serial Number: </label>
                            <input type="search" placeholder="Equipment Serial Number" id="search_Hardware_serial" name="search_Hardware_serial" class='form-control search_user' value="125215212">
                        </div>
                        <div class='row justify-content-center'>
                            <div class="form-group  col-8">
                                <input type="submit" class="btn btn-primary btn-user btn-block form-control-input mt-2" id="HardwareSerialNumber" name="HardwareSerialNumber">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row col-12">
                <div class='col-4 offset-md-4'>

                </div>
            </div>
        </div>

        <div class="actual_user_info card">

            <h5 class="card-header">Found Hardware</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Hardware Number</th>
                                <th scope="col">Name</th>
                                <th scope="col">Serial Number</th>
                                <th scope="col">Invoice Number</th>
                                <th scope="col">Purchase Date</th>
                                <th scope="col">Warranty Date</th>
                                <th scope="col">Net Value</th>
                                <th scope="col">Hardware User</th>
                                <th scope="col">Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>12312</td>
                                <td>Laptop MSI</td>
                                <td>125215212</td>
                                <td>23</td>
                                <td>19.12.2020</td>
                                <td>19.12.2025</td>
                                <td>24718 zł</td>
                                <td>Jaroslaw Kudzia</td>
                                <td>Sprawny</td>
                            </tr>
                            <?php
                            //   if (!empty($_POST)) {
                            //     $dataForm->data = $_POST;
                            //     $dataForm->checkIfExistsData();
                            //     $dataForm->sanitizeData();

                            //     $dataKeys = array_keys($dataForm->data);
                            //     if (in_array("HardwareNumber", $dataKeys)) {
                            //       $gear->searchGearNumber($dataForm->data['search_Hardware_number']);
                            //     } else {
                            //       $gear->searchSerialNumber($dataForm->data['search_Hardware_serial']);
                            //     }
                            //   }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <?= Layout::footer() ?>
<?php
        $html = ob_get_clean();
        return $html;
    }
}

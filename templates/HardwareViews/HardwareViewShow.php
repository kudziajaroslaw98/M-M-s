<?php

class HardwareViewShow
{
    public static function render(array $params = array())
    {
        ob_start();
?>
        <?= Layout::header($params); ?>
        <div class="InvoicesFound card">

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
                            <?php // $gear->showAllGear() 
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

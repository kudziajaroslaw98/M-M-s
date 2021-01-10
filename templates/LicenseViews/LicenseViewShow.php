<?php

class LicenseViewShow
{
    public static function render(array $params = array())
    {
        ob_start();
?>
        <?= Layout::header($params); ?>

        <div class="InvoicesFound card">

            <h5 class="card-header">Found Licenses</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">License Number</th>
                                <th scope="col">Name</th>
                                <th scope="col">Expiration Date</th>
                                <th scope="col">Serial Key</th>
                                <th scope="col">Purchase Invoice Id</th>
                                <th scope="col">Tech Support Date</th>
                                <th scope="col">License User</th>
                                <th scope="col">Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!-- <th scope="row">1</th>
                                <td>12312</td>
                                <td>Windows 10</td>
                                <td>1.10.2025</td>
                                <td>64712-15212-24124-12421</td>
                                <td>49129</td>
                                <td>19.12.2025</td>
                                <td>Jaroslaw Kudzia</td>
                                <td>Aktywny</td> -->
                            </tr>
                            <?= self::renderLicensesRows() ?>
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

    private static function renderLicensesRows()
    {
        // repositories
        $licenseRepository = new SoftwareRepository();
        $userRepository = new UserRepository();

        // result entities
        $licenses = $licenseRepository->select();

        // render results
        $i = 1;
        foreach ($licenses as $key => &$license) {
            self::renderRow($license, $i, $userRepository);
            $i++;
        }
    }

    public static function renderRow(Software &$software, int $lp, UserRepository &$userRepository)
    {
        $user = $userRepository->findById($software->getUserID());

        echo "
    <tr>
        <th scope='row'>$lp</th>
        <td>" . $software->getSoftwareID() . "</td>
        <td>" . $software->getName() . "</td>
        <td>" . $software->getExpirationDate() . "</td>
        <td>" . $software->getLicenceKey() . "</td>
        <td>" . $software->getPurchaseInvoiceID() . "</td>
        <td>" . $software->getTechSupportDate() . "</td>
        <td>" . $user->getFirstName() . " " . $user->getLastName() . "</td>
        <td>" . $software->getNotes() . "</td>
    </tr>
    ";
    }
}

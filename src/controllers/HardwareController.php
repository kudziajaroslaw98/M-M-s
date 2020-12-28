<?php

class HardwareController
{
    public static function renderViewAdd()
    {
        echo HardwareViewAdd::render(array(
            'title' => 'Add Hardware',
            'subtitle' => 'Add Hardware'
        ));
        return;
    }

    public static function renderViewShow()
    {
        echo HardwareViewShow::render(array(
            'title' => 'Show Hardware',
            'subtitle' => 'Found Hardware'
        ));
    }

    public static function renderViewSearch()
    {
        echo HardwareViewSearch::render(array(
            'title' => 'Search Hardware',
            'subtitle' => 'Search Hardware'
        ));
    }

    public static function renderSearched()
    {
        if (!empty($_POST)) {
            $dataForm = new DataForm();
            $dataForm->data = $_POST;
            $dataForm->checkIfExistsData();
            $dataForm->sanitizeData();

            $dataKeys = array_keys($dataForm->data);
            $gearRepository = new GearRepository();
            $userRepository = new UserRepository();
            $purchaseInvoiceRepository = new PurchaseInvoiceRepository();

            $gears = array();
            if (in_array("HardwareNumber", $dataKeys)) {
                $gears = $gearRepository->findByGearNumber($dataForm->data['search_Hardware_number']);
            } else {
                $gears = $gearRepository->findBySerialNumber($dataForm->data['search_Hardware_serial']);
            }

            $i = 1;
            foreach ($gears as $key => $gear) {
                $user = $userRepository->findById($gear->getUserID());
                $purchaseInvoice = $purchaseInvoiceRepository->findById($gear->getPurchaseInvoiceID());

                echo "
                <tr>
                    <th scope='row'>$i</th>
                    <td>" . $gear->getID() . "</td>
                    <td>" . $gear->getName() . "</td>
                    <td>" . $gear->getSerialNumber() . "</td>
                    <td>" . $gear->getPurchaseInvoiceID() . "</td>
                    <td>19.12.2020</td>
                    <td>" . $gear->getWarrantyDate() . "</td>
                    <td>" . $gear->getNetValue() . " "  . $purchaseInvoice->getCurrency() . "</td>
                    <td>" . $user->getFirstName() . " " . $user->getLastName() . "</td>
                    <td>" . $gear->getNotes() . "</td>
                </tr>
                ";
                $i++;
            }
        }
    }

    public static function addHardware()
    {
    }
}

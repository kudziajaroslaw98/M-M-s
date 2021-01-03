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

    public static function renderRow(Gear &$gear, int $lp, UserRepository &$userRepository, PurchaseInvoiceRepository &$purchaseInvoiceRepository)
    {

        $user = $userRepository->findById($gear->getUserID());
        $purchaseInvoice = $purchaseInvoiceRepository->findById($gear->getPurchaseInvoiceID());

        echo "
    <tr>
        <th scope='row'>$lp</th>
        <td>" . $gear->getID() . "</td>
        <td>" . $gear->getName() . "</td>
        <td>" . $gear->getSerialNumber() . "</td>
        <td>" . $gear->getPurchaseInvoiceID() . "</td>
        <td>" . $gear->getWarrantyDate() . "</td>
        <td>" . $gear->getNetValue() . " "  . $purchaseInvoice[0]->getCurrency() . "</td>
        <td>" . $user->getFirstName() . " " . $user->getLastName() . "</td>
        <td>" . $gear->getNotes() . "</td>
    </tr>
    ";
    }
}

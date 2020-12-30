<?php

class LicenseController
{
    public static function renderViewAdd()
    {
        echo LicenseViewAdd::render(array(
            'title' => 'Add License',
            'subtitle' => 'Add License'
        ));
    }

    public static function renderViewShow()
    {
        echo LicenseViewShow::render(array(
            'title' => 'Show License',
            'subtitle' => 'Your licenses'
        ));
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

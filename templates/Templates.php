<?php

class Templates
{
    public static function renderUsers()
    {
        $userRepository = new UserRepository();
        $users = $userRepository->select();

        foreach ($users as $value => $user) {
            echo "
                <option value='" . $user->getUserID() . "'>" . $user->getFirstName() . " " . $user->getLastName() . "</option>
            ";
        }
    }

    public static function renderPurchaseInvoices()
    {
        $purchaseInvoiceRepository = new PurchaseInvoiceRepository();
        $purchaseInvoices = $purchaseInvoiceRepository->select();

        foreach ($purchaseInvoices as $key => $purchaseInvoice) {
            echo "
                <option value='" . $purchaseInvoice->getID() . "'>" . $purchaseInvoice->getID() . ") " . $purchaseInvoice->getContractorData() . " " . $purchaseInvoice->getTransactionDate() . ", " . $purchaseInvoice->getAmountBrutto() . " " . $purchaseInvoice->getCurrency() . "</option>
            ";
        }
    }
}

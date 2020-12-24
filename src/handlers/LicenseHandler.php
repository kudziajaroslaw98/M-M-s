<?php

class LicenseHandler
{
    public static function handle($action)
    {
        switch ($action) {
            case 'license-add':
                InvoiceController::showAdd();
                break;
            case 'license-show':
                InvoiceController::showView();
                break;
            default:
                header('Location: home.php?action=invoice-add');
                break;
        }
    }
}

<?php

class LicenseHandler
{
    public static function handle($action)
    {
        switch ($action) {
            case 'license-add':
                LicenseController::renderViewAdd();
                break;
            case 'license-show':
                LicenseController::renderViewShow();
                break;
            default:
                header('Location: home.php?action=invoice-add');
                break;
        }
    }
}

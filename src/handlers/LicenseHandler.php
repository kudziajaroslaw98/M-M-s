<?php

class LicenseHandler
{
    public static function handle($action)
    {
        switch ($action) {
            case 'license-add':
                LicenseController::renderViewShow();
                break;
            case 'license-show':
                LicenseController::renderViewAdd();
                break;
            default:
                header('Location: home.php?action=invoice-add');
                break;
        }
    }
}

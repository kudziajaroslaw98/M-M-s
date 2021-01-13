<?php

class LicenseHandler
{
    public static function handle($action)
    {
        if (!LoginController::isLogged()) {
            $action = null;
        }

        switch ($action) {
            case 'license-add':
                if (AuthHelper::canAccessLicenseAdd()) {
                    LicenseController::renderViewAdd();
                    break;
                }
            case 'license-show':
                if (AuthHelper::canAccessLicenseShow()) {
                    LicenseController::renderViewShow();
                    break;
                }
            default:
                header("Location: index.php");
                break;
        }
    }
}

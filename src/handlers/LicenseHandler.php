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
                LicenseController::renderViewAdd();
                break;
            case 'license-show':
                LicenseController::renderViewShow();
                break;
            default:
                header("Location: index.php");
                break;
        }
    }
}

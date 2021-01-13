<?php

class HardwareHandler
{
    public static function handle(string $action)
    {
        if (!LoginController::isLogged()) {
            $action = null;
        }

        switch ($action) {
            case 'hardware-add':
                if (AuthHelper::canAccessHardwareAdd()) {
                    HardwareController::renderViewAdd();
                    break;
                }
            case 'hardware-show':
                if (AuthHelper::canAccessHardwareShow()) {
                    HardwareController::renderViewShow();
                    break;
                }
            case 'hardware-search':
                if (AuthHelper::canAccessHardwareSearch()) {
                    HardwareController::renderViewSearch();
                    break;
                }
            default:
                header("Location: index.php");
                break;
        }
    }
}

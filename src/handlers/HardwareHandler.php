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
                HardwareController::renderViewAdd();
                break;
            case 'hardware-show':
                HardwareController::renderViewShow();
                break;
            case 'hardware-search':
                HardwareController::renderViewSearch();
                break;
            default:
                header("Location: index.php");
                break;
        }
    }
}

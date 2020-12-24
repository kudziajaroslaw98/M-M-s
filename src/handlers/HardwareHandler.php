<?php

class HardwareHandler
{
    public static function handle(string $action)
    {
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
                header('Location: home.php?action=hardware-add');
                break;
        }
    }
}

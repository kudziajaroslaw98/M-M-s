<?php

class NotificationHandler
{
    public static function handle(string $action, string $msg)
    {
        if (!LoginController::isLogged()) {
            $action = null;
        }

        switch ($action) {
            case 'notification-info':
                NotificationController::renderViewInfo($msg);
                break;
            case 'notification-success':
                NotificationController::renderViewSuccess($msg);
                break;
            case 'notification-danger':
                NotificationController::renderViewDanger($msg);
                break;
            case 'notification-warning':
                NotificationController::renderViewWarning($msg);
                break;
            default:
                header("Location: index.php");
                break;
        }
    }
}

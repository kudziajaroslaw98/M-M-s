<?php

class UserHandler
{
    public static function handle($action)
    {
        if (!LoginController::isLogged()) {
            $action = null;
        }

        switch ($action) {
            case 'user-add':
                UserController::renderViewAdd();
                break;
            case 'user-show':
                UserController::renderViewShow();
                break;
            default:
                header("Location: index.php");
                break;
        }
    }
}

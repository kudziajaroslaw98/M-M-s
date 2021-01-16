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
                if (AuthHelper::canAccessUsersAdd()) {
                    UserController::renderViewAdd();
                    break;
                }
            case 'user-show':
                if (AuthHelper::canAccessUsersShow()) {
                    UserController::renderViewShow();
                    break;
                }
            default:
                header("Location: index.php");
                break;
        }
    }
}

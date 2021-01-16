<?php

class RoleHandler
{
    public static function handle($action)
    {
        if (!LoginController::isLogged()) {
            $action = null;
        }

        switch ($action) {
            case 'role-show':
                if (AuthHelper::canAccessRolesShow()) {
                    RoleController::renderViewShow();
                    break;
                }
            default:
                header("Location: index.php");
                break;
        }
    }
}

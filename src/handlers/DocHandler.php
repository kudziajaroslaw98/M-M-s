<?php

class DocHandler
{
    public static function handle($action)
    {
        if (!LoginController::isLogged()) {
            $action = null;
        }

        switch ($action) {
            case 'doc-add':
                if (AuthHelper::canAccessDocAdd()) {
                    DocController::renderViewAdd();
                    break;
                }
            case 'doc-show':
                if (AuthHelper::canAccessDocshow()) {
                    DocController::renderViewShow();
                    break;
                }
            default:
                header("Location: index.php");
                break;
        }
    }
}

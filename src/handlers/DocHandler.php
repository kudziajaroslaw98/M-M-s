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
                DocController::renderViewAdd();
                break;
            case 'doc-show':
                DocController::renderViewShow();
                break;
            default:
                header("Location: index.php");
                break;
        }
    }
}

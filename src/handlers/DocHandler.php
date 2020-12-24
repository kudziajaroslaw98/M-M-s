<?php

class DocHandler
{
    public static function handle($action)
    {
        switch ($action) {
            case 'doc-add':
                DocController::renderViewAdd();
                break;
            case 'doc-show':
                DocController::renderViewShow();
                break;
            default:
                header('Location: home.php?action=hardware-add');
                break;
        }
    }
}

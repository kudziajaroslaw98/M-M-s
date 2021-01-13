<?php

class InvoiceHandler
{
    public static function handle(string $action)
    {
        if (!LoginController::isLogged()) {
            $action = null;
        }

        switch ($action) {
            case 'invoice-add':
                InvoiceController::renderViewAdd();
                break;
            case 'invoice-show':
                InvoiceController::renderViewShow();
                break;
            case 'invoice-search':
                InvoiceController::renderViewSearch();
                break;
            default:
                header("Location: index.php");
                break;
        }
    }
}

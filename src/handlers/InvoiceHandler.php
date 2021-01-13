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
                if (AuthHelper::canAccessInvoiceAdd()) {
                    InvoiceController::renderViewAdd();
                    break;
                }
            case 'invoice-show':
                if (AuthHelper::canAccessInvoiveShow()) {
                    InvoiceController::renderViewShow();
                    break;
                }
            case 'invoice-search':
                if (AuthHelper::canAccessInvoiceSearch()) {
                    InvoiceController::renderViewSearch();
                    break;
                }
            default:
                header("Location: index.php");
                break;
        }
    }
}

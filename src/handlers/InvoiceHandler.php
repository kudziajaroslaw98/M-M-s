<?php

class InvoiceHandler
{
    public static function handle(string $action)
    {
        switch ($action) {
            case 'invoice-add':
                InvoiceController::renderViewAdd();
                break;
            case 'invoice-show':
                InvoiceController::renderViewShow();
                break;
            case 'invoice-show-list':
                InvoiceController::renderViewShowList();
                break;
            case 'invoice-search':
                InvoiceController::renderViewSearch();
                break;
            default:
                header('Location: home.php?action=invoice-add');
                break;
        }
    }
}

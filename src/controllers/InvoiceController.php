<?php

class InvoiceController
{
    public static function renderViewShow()
    {
        echo InvoiceViewShow::render(array(
            'title' => 'Show Invoices',
            'subtitle' => 'Your Invoices'
        ));
    }

    public static function renderViewAdd()
    {
        echo InvoiceViewAdd::render(array(
            'title' => 'Add Invoice',
            'subtitle' => 'Add Invoice'
        ));
    }

    public static function renderViewSearch()
    {
        echo InvoiceViewSearch::render(array(
            'title' => 'Search Invoice',
            'subtitle' => 'Search Invoice'
        ));
    }
}

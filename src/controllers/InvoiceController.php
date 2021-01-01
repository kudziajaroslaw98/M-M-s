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

    public static function renderViewShowList()
    {
        echo InvoiceViewShowList::render(array(
            'title' => 'Show Invoices List',
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

    public static function renderRow(Invoice &$invoice, int $lp)
    {
        echo "
    <tr>
        <th scope='row'>$lp</th>
        <td>" . $invoice->getID() . "</td>
        <td>" . $invoice->getUploadTime() . "</td>
        <td>" . $invoice->getLastModificationTime() . "</td>
        <td>" . $invoice->getContractorData() . "</td>
        <td>" . $invoice->getTransactionDate() . "</td>
        <td>" . $invoice->getAmountNetto() . "</td>
        <td>" . $invoice->getVat() * 100 . "%</td>
        <td>" . $invoice->getAmountBrutto() . "</td>
        <td>" . $invoice->getCurrency() . "</td>
        <td>" . $invoice->getNotes() . "</td>
        <td><a href='" . $invoice->getFilePath() . "' download>Download</a></td>
    </tr>
    ";
    }
}

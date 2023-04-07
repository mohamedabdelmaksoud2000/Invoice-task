<?php

namespace App\Repositories ;

use App\Interfaces\InvoiceRepositoryInterface;
use App\Models\Invoice;

class InvoiceRepository implements InvoiceRepositoryInterface
{

    public function getAllInvoice()
    {
        return Invoice::all();
    }

    public function getInvoiceById($invoiceId)
    {
        return Invoice::find($invioceid);
    }

    public function deleteInvoice($invoiceId)
    {
        return Invoice::destroy($invoiceId);
    }

    public function createInvoice(array $invoiceDetails)
    {
        return Invoice::create($invoiceDetails);
    }

    public function updateInvoice($invoiceId,array $invoiceDetails)
    {
        return Invoice::find($invoice)->update($invoiceDetails);
    }
}
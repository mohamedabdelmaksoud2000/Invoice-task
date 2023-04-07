<?php

namespace App\Interfaces;

interface InvoiceRepositoryInterface
{
    public function getAllInvoice();
    public function getInvoiceById($invoiceId);
    public function deleteInvoice($invoiceId);
    public function createInvoice(array $invoiceDetails);
    public function updateInvoice($invoiceId,array $invoiceDetails);
}
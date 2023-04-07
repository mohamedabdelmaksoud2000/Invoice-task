<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Interfaces\InvoiceRepositoryInterface;
use App\Traits\InvoiceTrait;
use App\Traits\Cart;

class InvoiceController extends Controller
{

    use InvoiceTrait,Cart;

    private InvoiceRepositoryInterface $invoiceRepository;

    public function __construct(InvoiceRepositoryInterface $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository ;
    }

    public function index()
    {
        try
        {
            $invoices = $this->invoiceRepository->getAllInvoice();
            return view('dashboard.invoice.index',compact('invoices'));

        }catch(\Exception $e)
        {
            toastr()->error('error server');
            return redirect()->route('dashboard');
        }
    }


    public function store()
    {
        try
        {
            $products = $this->getCarts();
            $invoice = $this->getInvoiceCarts($products);
            $this->invoiceRepository->createInvoice($invoice);
            $this->destroyCarts();
            toastr()->success('Successful created Invoice');
            return redirect()->route('home');
        }catch(\Exception $e)
        {   
            toastr()->error('error server');
            return redirect()->route('home');
        }
    }

}

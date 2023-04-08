<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use App\Http\Requests\StoreShippingRequest;
use App\Http\Requests\UpdateShippingRequest;
use App\Interfaces\ShippingRepositoryInterface;

class ShippingController extends Controller
{

    private ShippingRepositoryInterface $shippingRepository;

    public function __construct(ShippingRepositoryInterface $shippingRepository) 
    {
        $this->shippingRepository = $shippingRepository;
    }


    public function index()
    {
        $shippings = $this->shippingRepository->getAllShipping();
        
        return view('dashboard.shipping.index',compact('shippings'));
    }


    public function create()
    {
        return view('dashboard.shipping.create');
    }


    public function store(StoreShippingRequest $request)
    {
        $data = $request->only([
            'country',
            'rate'
        ]);
        $shippings = $this->shippingRepository->createShipping($data);
        return redirect()->route('shipping.index');
    }


    public function edit($id)
    {
        $shipping = $this->shippingRepository->getShippingById($id);
        toastr()->success('create Shipping Successfully');
        return view('dashboard.shipping.update',compact('shipping'));
    }

    public function update(UpdateShippingRequest $request, $shippingId)
    {
        $this->shippingRepository->updateShipping($shippingId,$request->all());
        toastr()->success('Update Shipping Successfully');
        return redirect()->route('shipping.index');
    }


    public function destroy($id)
    {
        $checkdelete = $this->shippingRepository->deleteShipping($id);
        
        if($checkdelete)
        {
            toastr()->success('delete shipping Successfully');
        }else
        {
            toastr()->error("you can't delete shipping becouase it contain products");
        }
        return redirect()->route('shipping.index');
    }
}

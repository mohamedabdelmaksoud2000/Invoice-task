<?php

namespace App\Http\Controllers;

use App\models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Interfaces\OfferRepositoryInterface;

class OfferController extends Controller
{

    private OfferRepositoryInterface $offerRepository ;

    public function __construct(OfferRepositoryInterface $offerRepository)
    {
        $this->offerRepository = $offerRepository;
    }

    public function index()
    {
        $offers = $this->offerRepository->getAllOffer();
        return view('dashboard.offer.index',compact('offers'));
    }

    public function create()
    {
        $products = Product::all();
        return view('dashboard.offer.create',compact('products'));
    }

    public function store(StoreOfferRequest $request)
    {
        $data = $request->only([
            'offer_type',
            'describe',
            'discount_type',
            'discount',
            'offer',
            'product_id',
        ]);
        $this->offerRepository->createOffer($data);
        toastr()->success('create Offer Successfully');
        return redirect()->route('offer.index');
    }


    public function destroy($id)
    {

        $this->offerRepository->deleteOffer($id);
        toastr()->success('deleted Offer Successfully');
        return redirect()->route('offer.index');
    }
}

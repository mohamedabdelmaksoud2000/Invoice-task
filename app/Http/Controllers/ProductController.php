<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Interfaces\ProductRepositoryInterface;


class ProductController extends Controller
{

    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) 
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getAllProduct();
        return view('dashboard',compact('products'));
    }

    public function create()
    {

        $shippings = Shipping::all();
        return view('dashboard.product.create',compact('shippings'));
    }

    public function store(StoreProductRequest $request)
    {

        $data = $request->only([
            'type',
            'shipping_id',
            'price',
            'weight',
        ]);
        $this->productRepository->createProduct($data);
        toastr()->success('create Product Successfully');
        return redirect()->route('dashboard');
    }

    public function edit($id)
    {


        $product = $this->productRepository->getProductById($id);
        $shippings = Shipping::all();
        return view('dashboard.product.update',compact(['product','shippings']));
        
    }

    public function update(UpdateProductRequest $request , $id)
    {

        $newData = $request->only([
            'type',
            'country',
            'price',
            'weight',
            'rate',
            'shipping',
            'vat'
        ]);

        $this->productRepository->updateProduct($id,$newData);
        toastr()->success('update Product Successfully');
        return redirect()->route('dashboard');

    }

    public function destroy($id)
    {

        $this->productRepository->deleteProduct($id);
        toastr()->success('delete Product Successfully');
        return redirect()->route('dashboard');
    }
}

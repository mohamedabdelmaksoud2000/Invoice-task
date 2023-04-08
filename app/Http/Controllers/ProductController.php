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

        $this->productRepository->createProduct($request->all());
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

        $this->productRepository->updateProduct($id,$request->all());
        toastr()->success('update Product Successfully');
        return redirect()->route('dashboard');

    }

    public function destroy($id)
    {

        $chack=$this->productRepository->deleteProduct($id);
        if($chack)
        {
            toastr()->success('delete Product Successfully');
        }else
        {
            toastr()->error('product contains offers');
        }
        return redirect()->route('dashboard');
    }
}

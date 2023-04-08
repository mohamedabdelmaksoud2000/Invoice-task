<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update product <span class="text-success">{{ $product->type }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="row" method="POST" action="{{ route('product.update',$product->id)}}" >
                        @method('PUT')
                        @csrf
                        <input type="text" name="id" value="{{ $product->id }}" class="d-none">
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <label for="type">Item type</label>
                                <input type="text" class="form-control" id="type" name="type" placeholder="Item type" value="{{ $product->type }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type">Shipping From</label>
                                <select name="shipping_id" class="form-select col-12" aria-label="Default select example">
                                    <option selected>shipping from</option>
                                    @foreach( $shippings as $shipping )
                                        <option value="{{ $shipping->id }}" @if($product->shipping_id == $shipping->id)selected @endif >{{ $shipping->country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <label for="price">Item price</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Item price" value="{{ $product->price }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Weight">Weight</label>
                                <input type="text" class="form-control" id="Weight" name="weight" placeholder="Weight" value="{{ $product->weight }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color:#007bff;margin:auto;margin-top:10px">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-between">  
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Products
                        </h2>
                        <a href="{{ route('product.create') }}" class="btn btn-primary">Create Product</a>
                        <a href="{{ route('shipping.index') }}" class="btn btn-primary">show shipping</a>
                        <a href="{{ route('offer.index') }}" class="btn btn-primary">show offers</a>
                        <a href="{{ route('invoice.index') }}" class="btn btn-primary">show invoice</a>
                    </div>
                    <br>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item Type</th>
                                <th scope="col">Country</th>
                                <th scope="col">Item price</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Shipping</th>
                                <th scope="col">VAT</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $products as $product )
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $product->type }}</td>
                                    <td>{{ $product->shippingRate->country }}</td>
                                    <td>${{ $product->price }}</td>
                                    <td>kg {{ $product->weight }}</td>
                                    <td>${{ $product->shippingRate->rate }}</td>
                                    <td>${{ $product->shipping }}</td>
                                    <td>${{ $product->tax}}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('product.edit',$product->id) }}" class="btn btn-primary" style="background-color: #007bff">Update</a>
                                        <form method="post" action="{{ route('product.delete',$product->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" style="background-color: #dc3545">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

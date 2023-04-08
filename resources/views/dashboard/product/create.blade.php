<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            create product
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
                    <form class="row" method="POST" action="{{ route('product.store')}}" >
                        @csrf
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <label for="type">Item type</label>
                                <input type="text" class="form-control" id="type" name="type" placeholder="Item type">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type">Shipping From</label>
                                <select name="shipping_id" class="form-select col-12" aria-label="Default select example">
                                    <option selected value="">shipping from</option>
                                    @foreach ( $shippings as $shipping )
                                        <option value="{{ $shipping->id }}" >{{ $shipping->country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <label for="price">Item price</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Item price">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Weight">Weight</label>
                                <input type="text" class="form-control" id="Weight" name="weight" placeholder="Weight">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary m-10" style="background-color:#007bff;margin:auto;margin-top: 10px;">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

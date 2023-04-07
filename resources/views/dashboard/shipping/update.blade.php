<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update Shipping {{ $shipping->country }}
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
                    <form method="POST" action="{{ route('shipping.update',$shipping->id)}}" >
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="type">Country</label>
                                <input type="text" class="form-control" id="type" name="country" placeholder="Country" value="{{ $shipping->country }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="price">Rate</label>
                                <input type="text" class="form-control" id="price" name="rate" placeholder="Rate" value="{{ $shipping->rate }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color:#007bff;margin:auto">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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
                            shippings
                        </h2>
                        <a href="{{ route('shipping.create') }}" class="btn btn-primary">Create shipping</a>
                    </div>
                    <br>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Country</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Products</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $shippings as $shipping )
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $shipping->country }}</td>
                                    <td>${{ $shipping->rate }}</td>
                                    <td>{{ $shipping->products->count() }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('shipping.edit',$shipping->id) }}" class="btn btn-primary" style="background-color: #007bff">Update</a>
                                        <form method="post" action="{{ route('shipping.delete',$shipping->id) }}">
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

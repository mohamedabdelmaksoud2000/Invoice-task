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
                            Invoices
                        </h2>
                    </div>
                    <br>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">subtotal</th>
                                <th scope="col">shipping</th>
                                <th scope="col">vat</th>
                                <th scope="col">discounts</th>
                                <th scope="col">total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $invoices as $invoice )
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $invoice->subtotal }}</td>
                                    <td>{{ $invoice->shipping }}</td>
                                    <td>{{ $invoice->vat }}</td>
                                    <td>{{ $invoice->discount }}</td>
                                    <td>{{ $invoice->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

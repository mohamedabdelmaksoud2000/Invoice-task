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
                            offers
                        </h2>
                        <a href="{{ route('offer.create') }}" class="btn btn-primary">Create offer</a>
                    </div>
                    <br>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">describe</th>
                                <th scope="col">type discount</th>
                                <th scope="col">discount</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $offers as $offer )
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $offer->describe }}</td>
                                    <td>{{ $offer->offer_type }}</td>
                                    <td>{{ $offer->discount }}</td>
                                    <td class="d-flex">
                                        <form method="post" action="{{ route('offer.delete',$offer->id) }}">
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

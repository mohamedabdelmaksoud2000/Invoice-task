<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            create offer
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#offerProduct" style="background-color:var(--bs-btn-bg)">
                        create offer to product
                    </button>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#offerShipping" style="background-color:var(--bs-btn-bg)">
                        create offer to shipping
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="offerProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('offer.store') }}">
                                    @csrf
                                    <input type="text" name="offer_type" class="d-none" value="product">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">offer</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">describe</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="describe" class="form-control" id="inputEmail3" >
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputPassword3" name="describe" class="col-sm-3 col-form-label">type Discount</label>
                                            <div class="form-group col-sm-9">
                                                <select name="discount_type" class="form-select col-12" aria-label="Default select example">
                                                    <option value="percentage">percentage</option>
                                                    <option value="fixed" >fixed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="input4" class="col-sm-3 col-form-label">discount</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="discount" class="form-control" id="input4">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label name="describe" class="col-sm-3 col-form-label">product discount</label>
                                            <div class="form-group col-sm-9">
                                                <select name="product_id" class="form-select col-12" aria-label="Default select example">
                                                    <option selected value="">product discount</option>
                                                    @foreach ( $products as $product )
                                                        <option value="{{ $product->id }}">{{ $product->type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label name="describe" class="col-sm-3 col-form-label">when buy product</label>
                                            <div class="form-group col-sm-9">
                                                <select name="offer" class="form-select col-12" aria-label="Default select example">
                                                    <option selected value="">when buy product</option>
                                                    @foreach ( $products as $product )
                                                        <option value="{{ $product->id }}">{{ $product->type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:var(--bs-btn-bg)">Close</button>
                                        <button type="submit" class="btn btn-primary" style="background-color:var(--bs-btn-bg)">create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="offerShipping" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('offer.store') }}">
                                    @csrf
                                    <input type="text" name="offer_type" class="d-none" value="shipping">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">offer</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">describe</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="describe" class="form-control" id="inputEmail3">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputPassword3" name="describe" class="col-sm-3 col-form-label">type Discount</label>
                                            <div class="form-group col-sm-9">
                                                <select name="discount_type" class="form-select col-12" aria-label="Default select example">
                                                    <option value="percentage">percentage</option>
                                                    <option value="fixed" >fixed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="input4" class="col-sm-3 col-form-label">discount</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="discount" class="form-control" id="input4" >
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label name="describe" class="col-sm-3 col-form-label">minimum number buy products</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="offer" class="form-control" id="input5" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:var(--bs-btn-bg)">Close</button>
                                        <button type="submit" class="btn btn-primary" style="background-color:var(--bs-btn-bg)">create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

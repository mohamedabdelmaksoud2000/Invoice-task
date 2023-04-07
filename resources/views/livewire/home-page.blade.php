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
                @if($this->checkCart($product))
                    <button wire:click="remove({{$product->id}})" class="btn btn-danger" style="background-color: #dc3545">remove from Cart</button>
                @else
                    <button wire:click="add({{$product->id}})" class="btn btn-primary" style="background-color: #007bff">add to Cart</button>
                @endif
            </td>
        </tr>
    @endforeach
</tbody>

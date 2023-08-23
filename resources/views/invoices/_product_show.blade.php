<tr>
    <th>{{ $product->pivot->quantity }}</th>
    <th>{{ $product->name }}</th>
    <th>{{ $product->price }}</th>
    <th>{{ $product->total() }}</th>
</tr>

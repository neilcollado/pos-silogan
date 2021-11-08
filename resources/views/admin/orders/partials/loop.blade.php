@foreach ($products as $product)
  <option value="{{ $product->id }}">{{ $product->ProdName }}</option>
@endforeach


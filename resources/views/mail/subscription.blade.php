<p>Уважаемый клиент, продукт {{$product->name}} снова в наличии.</p>
<a href="{{route('product', [$product->category->id, $product->id])}}"></a>
<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Sku\StoreRequest;
use App\Http\Requests\Sku\UpdateRequest;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Support\Facades\Storage;

class SkuController extends Controller
{
    public function index(Product $product)
  {
    $skus = $product->skus()->paginate(10);
    return view('admin.skus.index', compact('product', 'skus'));
  }


    public function create(Product $product)
  {
    return view('admin.skus.create', compact('product'));
  }


    public function destroy(Product $product, Sku $sku)
  {
    $skus->delete();
    return redirect()->route('admin.skus.index', compact('product'));
  }


    public function edit(Product $product, Sku $sku)
  {
    return view('admin.skus.edit', compact('product', 'sku'));
  }


    public function show(Product $product, Sku $sku)
  {
    return view('admin.skus.show', compact('product', 'sku'));
  }


    public function store(StoreRequest $request, Product $product)
  {
    
    $data = $request->validated();
    $data['product_id'] = $request->product->id;
    $sku = Sku::firstOrCreate($data);
    $sku->propertyOptions()->sync($request->property_id);
    return redirect()->route('admin.skus.index', 'product');
  }


    public function update(UpdateRequest $request, Product $product, Sku $sku)
  {
    $data = $request->validated();
    

    $data['product_id'] = $request->product->id;
    $sku->update($data);
    $sku->propertyOptions()->sync($request->property_id);
    return redirect()->route('admin.skus.index', 'product');
  }
}

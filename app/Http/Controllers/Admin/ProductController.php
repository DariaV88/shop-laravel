<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Colour;
use App\Models\ColourProduct;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller {

    public function create() {

    $tags = Tag::all();
    $colours = Colour::all();
    $categories = Category::all();

    return view('admin.products.create', compact('tags', 'colours', 'categories'));
  }


  public function destroy(Product $product)
  {
    $product->delete();
    return redirect()->route('admin.products.index');
  }


  public function edit(Product $product)
  {
    $categories = Category::all();
    $tags = Tag::all();
    return view('admin.products.edit', compact('product', 'categories', 'tags'));
  }


  public function index()
  {
    $products = Product::paginate(10);
    return view('admin.products.index', compact('products'));
  }


  public function show(Product $product)
  {
    return view('admin.products.show', compact('product'));
  }


  public function store(StoreRequest $request, Product $product)
  {
    $data = $request->validated();

    $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
    $data['is_published'] = true;

    $tagsIds = $data['tags'];
    $coloursIds = $data['colours'];
    unset($data['tags'], $data['colours']);

    Product::firstOrCreate(
      ['title' => $data['title']], $data);

    foreach($tagsIds as $tagsId) {
      ProductTag::firstOrCreate([
        'product_id' => $product->id,
        'tag_id' => $tagsId,
      ]);
    }

    foreach($coloursIds as $coloursId) {
      ColourProduct::firstOrCreate([
        'product_id' => $product->id,
        'colour_id' => $coloursId,
      ]);
    }

    return redirect()->route('admin.products.index');
  }


    public function update(UpdateRequest $request, Product $product)
  {
    $data = $request->validated();
    if ($request->has('preview_image')) {
      $data['preview_image'] = Storage::disk('public')->put('/images', $request['preview_image']);
      dd($data['preview_image']);
    }
    dd($data);
    $product->update($data);
    return view('admin.products.show', compact('product'));
  }
}

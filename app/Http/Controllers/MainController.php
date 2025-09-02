<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subscription;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('main.index', compact('categories'));
    }

    public function categories() {
       return 1;
    }

    public function category(Category $category, Request $request) {

        $categories = Category::all();
        $category = Category::where('id', $category['id'])->first();

        $productsQuery = Product::where('category_id', $category['id']);

        if($request->filled('price_from')) {
            $productsQuery = $productsQuery->where('price', '>=', $request->price_from);
        }

        if($request->filled('price_to')) {
            $productsQuery = $productsQuery->where('price', '<=', $request->price_to);
        }

        if($request->has('new')) {
            $productsQuery = $productsQuery->where('new', 1);
        }

        if($request->has('hit')) {
            $productsQuery = $productsQuery->where('hit', 1);
        }

        $productCount = $productsQuery->count();
        $products = $productsQuery->paginate(6)->withPath("?" . ($request->getQueryString()));

        return view('category', compact('category', 'categories', 'products', 'productCount'));
    }

    public function product(Category $category, Product $product) {
        $categories = Category::all();
        return view('product', compact('category', 'product', 'categories'));
    }


    public function subscription(Request $request, Product $product) {

        Subscription::create([
            'email' => $request->email,
            'product_id' => $product->id,
        ]);
        
        return redirect()->back()->with('success', 'Спасибо. Мы свяжемся с вами, когда товар снова будет в наличии.');
    }
    
}

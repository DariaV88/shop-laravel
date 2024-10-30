<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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

    public function category(Category $category) {
        $categories = Category::all();
        $category = Category::where('id', $category['id'])->first();
        return view('category', compact('category', 'categories'));
    }

    public function product(Category $category, Product $product) {
        $categories = Category::all();
        return view('product', compact('category', 'product', 'categories'));
    }
    
}

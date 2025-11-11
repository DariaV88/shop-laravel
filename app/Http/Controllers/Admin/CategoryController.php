<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller {

  public function create()
  {
    return view('admin.categories.create');
  }


    public function destroy(Category $category)
  {
    $category->delete();
    return redirect()->route('admin.categories.index');
  }


    public function edit(Category $category)
  {
    return view('admin.categories.edit', compact('category'));
  }


  public function index()
  {
    $categories = Category::paginate(10);
   
    return view('admin.categories.index', compact('categories'));
  }


    public function show(Category $category)
  {
    return view('admin.categories.show', compact('category'));
  }


    public function store(StoreRequest $request)
  {
    $data = $request->validated();
    Category::firstOrCreate($data);
    return redirect()->route('admin.categories.index');
  }


    public function update(UpdateRequest $request, Category $category)
  {
    $data = $request->validated();
    $category->update($data);
    return view('admin.categories.show', compact('category'));
  }

}



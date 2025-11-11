<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Property\StoreRequest;
use App\Http\Requests\Property\UpdateRequest;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index()
  {
    $properties = Property::paginate(10);
    return view('admin.properties.index', compact('properties'));
  }


    public function create()
  {
    return view('admin.properties.create');
  }


    public function destroy(Property $property)
  {
    $property->delete();
    return redirect()->route('admin.properties.index');
  }


    public function edit(Property $property)
  {
    return view('admin.properties.edit', compact('property'));
  }


    public function show(Property $property)
  {
    return view('admin.properties.show', compact('property'));
  }


    public function store(StoreRequest $request)
  {
    $data = $request->validated();
    Property::firstOrCreate($data);
    return redirect()->route('admin.properties.index');
  }


    public function update(UpdateRequest $request, Property $property)
  {
    $data = $request->validated();
    $category->update($data);
    return view('admin.properties.show', compact('property'));
  }

  
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyOption\StoreRequest;
use App\Http\Requests\PropertyOption\UpdateRequest;
use App\Models\Property;
use App\Models\PropertyOption;
use Illuminate\Support\Facades\Storage;

class PropertyOptionController extends Controller
{
    public function index(Property $property)
  {
    
    $propertyOptions  = $property->propertyOptions()->paginate(10);
    return view('admin.property_options.index', compact('property', 'propertyOptions'));
  }


    public function create(Property $property)
  {
    return view('admin.property_options.create', compact('property'));
  }


    public function destroy(PropertyOption $propertyOption)
  {
    $propertyOption->delete();
    return redirect()->route('admin.property_options.index');
  }


    public function edit(Property $property, PropertyOption $propertyOption)
  {
    return view('admin.property_options.edit', compact('property, propertyOption'));
  }


    public function show(Property $property, PropertyOption $propertyOption)
  {
    return view('admin.property_options.show', compact('property, propertyOption'));
  }


    public function store(StoreRequest $request, Property $property)
  {
    $data = $request->validated();
    $data['property_id'] = $request->property->id;
    PropertyOption::firstOrCreate($data);
    return redirect()->route('admin.property-options.index', 'property');
  }


    public function update(UpdateRequest $request, Property $property, PropertyOption $propertyOption)
  {
    $data = $request->validated();
    $propertyOption->update($data);
    return view('admin.property_options.show', compact('property, propertyOption'));
  }
}

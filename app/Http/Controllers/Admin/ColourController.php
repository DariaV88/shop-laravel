<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Colour\StoreRequest;
use App\Http\Requests\Colour\UpdateRequest;
use App\Models\Colour;
use Illuminate\Http\Request;

class ColourController extends Controller {

    public function create()
  {
    return view('admin.colours.create');
  }


  public function destroy(Colour $colour)
  {
    $colour->delete();
    return redirect()->route('admin.colours.index');
  }

  public function edit(Colour $colour)
  {
    return view('admin.colours.edit', compact('colour'));
  }


  public function index()
  {
    $colours = Colour::all();
    return view('admin.colours.index', compact('colours'));
  }


  public function show(Colour $colour)
  {
    return view('admin.colours.show', compact('colour'));
  }


  public function store(StoreRequest $request)
  {
    $data = $request->validated();
    Colour::firstOrCreate($data);
    return redirect()->route('admin.colours.index');
  }

    public function update(UpdateRequest $request, Colour $colour)
  {
    $data = $request->validated();
    $colour->update($data);
    return view('admin.colours.show', compact('colour'));
  }
  
}
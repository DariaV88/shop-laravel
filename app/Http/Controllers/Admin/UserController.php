<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
  
  public function create()
  {
    return view('admin.users.create');
  }


  public function destroy(User $user)
  {
    $user->delete();
    return redirect()->route('admin.users.index');
  }


  public function edit(User $user)
  {
    return view('admin.users.edit', compact('user'));
  }


  public function index()
  {
    $users = User::all();
    return view('admin.users.index', compact('users'));
  }


  public function show(User $user)
  {
    return view('admin.users.show', compact('user'));
  }


  public function store(StoreRequest $request)
  {
    $data = $request->validated();
    User::firstOrCreate(['email' => $data['email']]);
    return redirect()->route('admin.users.index');
  }


  public function update(UpdateRequest $request, User $user)
  {
    $data = $request->validated();
    $user->update($data);
    return view('admin.users.show', compact('user'));
  }

}

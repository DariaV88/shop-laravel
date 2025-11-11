@extends('admin.layouts.main')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Изменение свойства</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.properties.index')}}">Свойства</a></li>
              <li class="breadcrumb-item active">Изменение свойства</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       <div class="row">
       <div class="col-12">
          <form method="POST" action="{{route('admin.properties.update', $property->id)}}" class="w-25"><div class="form-group">
            @csrf
            @method('PATCH')
                    <input type="text" class="form-control" name="name" placeholder="Название категории" value="{{$property->name}}">
                    @error('name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <input type="submit" class="btn btn-primary" value="Обновить"></form>
          </div>
       </div>
        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@extends('admin.layouts.main')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Изменение параметра свойства {{$property->name}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.property-options.index')}}">Параметры свойства</a></li>
              <li class="breadcrumb-item active">Изменение параметра свойства {{$property->name}}</li>
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
          <form method="POST" action="{{route('admin.property-options.update', [$property, $propertyOption])}}" class="w-25"><div class="form-group">
            @csrf
            @method('PATCH')
                    <input type="text" class="form-control" name="name" placeholder="Наименование" value="{{$propertyOption->name}}">
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
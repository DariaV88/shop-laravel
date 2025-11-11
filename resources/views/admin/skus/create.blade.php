@extends('admin.layouts.main')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавление sku</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.skus.index', $product)}}">Skus</a></li>
              <li class="breadcrumb-item active">Добавление sku</li>
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

          <form method="POST" action="{{route('admin.skus.store', $product)}}" class="w-25">
            @csrf

            @foreach($product->properties as $property)
                      <div class="form-group">
                  <select name="property_id[{{$property->id}}]" class="tags" multiple="multiple" data-placeholder="Выберите sku" style="width: 100%;">
                 @foreach($property->propertyOptions as $propertyOption)
                  <option value="{{$propertyOption->id}}">{{$propertyOption->name}}</option>
                    @endforeach
                  </select>
                </div>
                @endforeach

          <div class="form-group">
             <label>Количество</label>
            <input type="text" name="count"  value="{{old('count')}}" class="form-control" placeholder="Количество">
            @error('count')
                    <div class="text-danger">{{$message}}</div>
          @enderror
          </div>
 
          <input type="submit" class="btn btn-primary" value="Добавить">

          </div>
       </div>
        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
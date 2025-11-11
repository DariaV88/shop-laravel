@extends('admin.layouts.main')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Изменить товар</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">Товары</a></li>
              <li class="breadcrumb-item active">Изменение товара</li>
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
       <form action="{{route('admin.products.update', $product->id)}}" method="post">
          @csrf
          @method('patch')

          <div class="form-group">
            <input type="text" name="title"  value="{{$product->title}}" class="form-control" placeholder="Наименование">
            @error('title')
                    <div class="text-danger">{{$message}}</div>
            @enderror
          </div>

          <div class="form-group">
            <input type="text" name="description"  value="{{$product->description}}" class="form-control" placeholder="Описание" cols="30" rows="10">
            @error('description')
                    <div class="text-danger">{{$message}}</div>
            @enderror
          </div>

          <div class="form-group">
            <textarea name="articule"  value="{{$product->articule}}" class="form-control" placeholder="Артикул"></textarea>
            @error('articule')
                    <div class="text-danger">{{$message}}</div>
            @enderror
          </div>

          <div class="form-group">
          <label>Цена</label>
            <input type="text" name="price" value="{{$product->price}}" class="form-control" placeholder="Цена">
            @error('price')
                    <div class="text-danger">{{$message}}</div>
          @enderror
          </div>

                    <div class="form-group">
                  <select name="property_id" class="form-control select2" style="width: 100%;">
                    <option selected="selected" disabled>Выберите свойство</option>
                    @foreach($properties as $property)
                    <option value="{{$property->id}}" {{$property->id == old('property_id') ? 'selected' : ''}}>{{$property->name}}</option>
                    @endforeach
                  </select>
                  @error('property_id')
                    <div class="text-danger">{{$message}}</div>
                   @enderror
          </div>

          <div class="product-img">
                      <a href="product-details.html">
                          <img style="max-width:200px" src="{{Storage::url($product->preview_image)}}" alt="">
                      </a>
          </div>
          
          <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                      </div>
                      <div class="input-group-append">
                      </div>
                    </div>
          </div>

          <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Редактировать">
          </div>
        </form>
       </div>
        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@extends('admin.layouts.main')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавить товар</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">Товары</a></li>
              <li class="breadcrumb-item active">Добавление товара</li>
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
        <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <input type="text" name="title"  value="{{old('title')}}" class="form-control" placeholder="Наименование">
            @error('title')
                    <div class="text-danger">{{$message}}</div>
            @enderror
          </div>

          <div class="form-group">
          <input type="article" name="article"  value="{{old('article')}}" class="form-control" placeholder="Артикул">
            @error('article')
                    <div class="text-danger">{{$message}}</div>
            @enderror
          </div>

          <div class="form-group">
          <textarea name="description"  value="{{old('description')}}" class="form-control" placeholder="Описание" cols="30" rows="10"></textarea>
            @error('description')
                    <div class="text-danger">{{$message}}</div>
            @enderror
          </div>

          <div class="form-group">
            <input type="text" name="price"  value="{{old('price')}}" class="form-control" placeholder="Цена">
            @error('price')
                    <div class="text-danger">{{$message}}</div>
          @enderror
          </div>

          <div class="form-group">
            <input type="text" name="count"  value="{{old('count')}}" class="form-control" placeholder="Количество на складе">
            @error('count')
                    <div class="text-danger">{{$message}}</div>
          @enderror
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
                  <select name="category_id" class="form-control select2" style="width: 100%;">
                    <option selected="selected" disabled>Выберите категорию</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == old('category_id') ? 'selected' : ''}}>{{$category->title}}</option>
                    @endforeach
                  </select>
                  @error('category_id')
                    <div class="text-danger">{{$message}}</div>
                   @enderror
          </div>

          <div class="form-group">
                  <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Выберите тег" style="width: 100%;">
                  @foreach($tags as $tag)
                  <option {{is_array(old('tags')) && in_array($tag->id, old('tags')) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                  </select>
                </div>

          <div class="form-group">
                  <select name="colours[]" class="colours" multiple="multiple" data-placeholder="Выберите цвет" style="width: 100%;">
                  @foreach($colours as $colour)
                  <option {{is_array(old('colours')) && in_array($colour->id, old('colours')) ? 'selected' : ''}} value="{{$colour->id}}">{{$colour->title}}</option>
                    @endforeach
                  </select>
                </div>

          <input type="submit" class="btn btn-primary" value="Добавить">
          </div>
        </form>
       </div>
        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
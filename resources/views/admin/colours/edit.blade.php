@extends('admin.layouts.main')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Изменение цвета</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.colours.index')}}">Цвета</a></li>
            <li class="breadcrumb-item active">Изменение цвета</li>
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
       <form action="{{route('admin.colours.update', $colour->id)}}" method="post">
          @csrf
          @method('patch')
          <div class="form-group">
            <input type="text" name="title" value="{{$colour->title}}" class="form-control" placeholder="Наименование">
            @error('title')
            <div class="text-danger">{{$message}}</div>
            @enderror
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
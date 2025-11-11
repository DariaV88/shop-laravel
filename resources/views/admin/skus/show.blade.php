@extends('admin.layouts.main')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sku</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
            <li class="breadcrumb-item active">Sku {{$product->name}}</li>
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
            <div class="card">
              <div class="card-header d-flex p-3">
                <div class="mr-3"><a href="{{route('admin.skus.edit', [$product, $sku])}}" class="btn btn-primary">Редактировать</a></div>
                <div class="mr-3"><a href="{{route('admin.skus.index', [$product, $sku])}}" class="btn btn-primary">Значения sku</a></div>

                <form action="{{route('admin.skus.destroy', [$product, $sku])}}" method="post">
                  @csrf
                  @method('delete')
                  <input type="submit" value="Удалить" class="btn btn-danger">
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    <th>ID</th>
                      <th>{{$sku->id}}</th>
                    </tr>
                    <tr>
                      <th>Наименование</th>
                      <th>{{$sku->name}}</th>
                    </tr>
                  </thead>
                  <tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
       </div>
        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
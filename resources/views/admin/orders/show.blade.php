
@extends('admin.layouts.main')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Заказы</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.orders.index')}}">Главная</a></li>
            <li class="breadcrumb-item active">Заказы</li>
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
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <h5>Имя: {{$order->user->name}}</h5>
              <h5>Номер телефона: {{$order->phone}}</h5> 
              <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Изображение</th>
                                            <th>Название</th>
                                            <th>Цена</th>
                                            <th>Кол-во</th>
                                            <th>Общая стоимость</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->products as $product)
                                        <tr>
                                            <td class="product-thumbnail">
                                            <img style="max-width:150px" src="{{Storage::url($product->preview_image)}}" alt="">
                                            </td>
                                            <td class="product-name">{{$product->title}}</td>
                                            <td class="product-price-cart"><span class="amount">${{$product->price}}</span></td>
                                            <td class="product-quantity"><span class="pl-50">{{$product->pivot->count}}</span></td>
                                            <td>{{$product->getTotalPrice()}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
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


    

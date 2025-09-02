@extends('layouts.main')

@section('content')
        </div>
         <!-- shopping-cart-area start -->
        <div class="cart-main-area pt-95 pb-100">
            <div class="container">
                <h3 class="page-title">Корзина</h3>
                <div class="row">
                    <div>
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Изображение</th>
                                            <th>Название</th>
                                            <th>Цена</th>
                                            <th>Кол-во</th>
                                            <th>Стоимость</th>
                                            <th>Изменить кол-во</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->products as $product)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="{{Storage::url($product->preview_image)}}" style="max-width: 150px;" alt=""></a>
                                            </td>
                                            <td class="product-name"><a href="{{route('product', [$product->category->id, $product->id])}}">{{$product->title}}</a></td>
                                            <td class="product-price-cart"><span class="amount">{{$product->price}}</span></td>
                                            <td class="product-quantity"><span class="pl-50">{{$product->pivot->count}}</span>
                                            </td>
                                            <td class="product-subtotal">{{$product->getTotalPrice()}}</td>
                                            <td class="product-remove">
                                            <div class="btn-group form-inline">
                            <form action="{{ route('basket.remove', $product) }}" method="POST">
                                <button type="submit" href="">-<span
                                        class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                @csrf
                            </form>
                            <form action="{{ route('basket.add', $product) }}" method="POST">
                                <button type="submit"
                                        href=""> + <span
                                        class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                @csrf
                            </form>
                        </div>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                    <h5>Общая стоимость: ${{$order->getBasketTotalPrice()}}</h5>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div>
                    <div class="breadcrumb-content text-center">
                    <h2>Checkout</h2>
                   <p>Укажите имя, номер телефона и email, чтобы менеджер связался с вами.</p>
            </div>


            <form action="{{route('basket.confirm')}}" method="POST">
            <div class="form-group">
                <label for="name">Имя:</label>
                <div class="col-lg-4">
                    <input type="text" name="name" id="name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="name">Номер телефона: </label>
                <div class="col-lg-4">
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
            </div>
                <div class="form-group">
                <label for="name">Email: </label>
                <div class="col-lg-4">
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>
            @csrf
            <input type="submit" class="btn btn-success" value="Подтвердить заказ">
            </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection

    

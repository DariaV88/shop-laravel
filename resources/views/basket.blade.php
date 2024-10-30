@extends('layouts.main')

@section('content')
        </div>
         <!-- shopping-cart-area start -->
        <div class="cart-main-area pt-95 pb-100">
            <div class="container">
                <h3 class="page-title">Корзина</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Изображение</th>
                                            <th>Название</th>
                                            <th>Цена</th>
                                            <th>Кол-во</th>
                                            <th>Стоимость</th>
                                            <th>Удалить</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->products as $product)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="assets/img/cart/cart-3.jpg" alt=""></a>
                                            </td>
                                            <td class="product-name"><a href="{{route('product', [$product->category->id, $product->id])}}">{{$product->title}}</a></td>
                                            <td class="product-price-cart"><span class="amount">${{$product->price}}</span></td>
                                            <td class="product-quantity"><span class="pl-50">{{$product->pivot->count}}</span>
                                            </td>
                                            <td class="product-subtotal">${{$product->getTotalPrice()}}</td>
                                            <td class="product-remove">
                                            <form action="{{route('basket.remove', $product)}}" method="POST">
                                            @csrf
                                                    <button type="submit" class="btn btn-danger">
                                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"><i class="ti-trash"></i></span>
                                                    </button>
                                                </form> 
                                                <!-- <a href="#"><i class="ti-trash"></i></a></td> -->
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                    <h5>Общая стоимость: ${{$order->getBasketTotalPrice()}}</h5>
                                        <div class="cart-clear">
                                            <a href="{{route('basket.checkout')}}">Оплата</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection

    

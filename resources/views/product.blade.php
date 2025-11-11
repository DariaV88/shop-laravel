@extends('layouts.main')

@section('content')
 <div class="shop-area pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="product-details-img">
                            <img id="zoompro" src="{{Storage::url($product->preview_image)}}" data-zoom-image="assets/img/product-details/bl1.jpg" alt="zoom"/>
                            <div id="gallery" class="mt-12 product-dec-slider owl-carousel">
                                <a data-image="assets/img/product-details/l1.jpg" data-zoom-image="assets/img/product-details/bl1.jpg">
                                    <img src="assets/img/product-details/s1.jpg" alt="">
                                </a>
                                <a data-image="assets/img/product-details/l2.jpg" data-zoom-image="assets/img/product-details/bl2.jpg">
                                    <img src="assets/img/product-details/s2.jpg" alt="">
                                </a>
                                <a data-image="assets/img/product-details/l3.jpg" data-zoom-image="assets/img/product-details/bl3.jpg">
                                    <img src="assets/img/product-details/s3.jpg" alt="">
                                </a>
                                <a data-image="assets/img/product-details/l4.jpg" data-zoom-image="assets/img/product-details/bl4.jpg">
                                    <img src="assets/img/product-details/s4.jpg" alt="">
                                </a>
                                <a data-image="assets/img/product-details/l3.jpg" data-zoom-image="assets/img/product-details/bl3.jpg">
                                    <img src="assets/img/product-details/s3.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product-details-content">
                            <h2>{{$product->title}}</h2>
                            <div class="product-price">
                                <span class="new">{{$product->price}}</span>
                            </div>
                            <p>{{$product->description}}</p>  
                            <div class="in-stock">
                                <span><i class="ion-android-checkbox-outline"></i> 
                                @if($product->isAvailable()) 
                                <form action="{{route('basket.add', $product)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary" title="Add To Cart">
                                    В корзину
                                </form>
                                @else 
                                <span>Не доступен. Сообщить мне, когда появится в наличии:</span>
                                <form action="{{route('subscription', $product)}}" method="POST">
                                @csrf
                                <input type="email" name="email" value="Введите email" id="">
                                <button type="submit" style="margin-top: 10px;">Отправить</button>
                                </form>
                                @endif
                            </span>
                            </div>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        

         @endsection
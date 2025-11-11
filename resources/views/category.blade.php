@extends('layouts.main')

@section('content')
        </div>
        <div class="shop-area pt-100 pb-100 gray-bg">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <h4>{{$category->title}} - {{$productCount}} шт</h4>
                        <div class="grid-list-product-wrapper mt-25">
                            <div class="product-view product-grid">
                                <div class="row">  
                                    @foreach($products as $product)
                                    <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
                                        <div class="product-wrapper mb-10">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img src="{{Storage::url($product->preview_image)}}" alt="">
                                                </a>
                                                <div class="product-action p-0">
                                                    <!-- <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                                        <i class="ti-plus"></i>
                                                    </a> -->
                                                    @if($product->isAvailable())
                                                    <form action="{{route('basket.add', $product)}}" method="POST">
                                                        @csrf
                                                    <button type="submit" class="btn btn-primary" title="Add To Cart">
                                                        В корзину
                                                    </form>
                                                    @else 
                                                    <span>Не доступен</span>
                                                    <br>
                                                    <span>Сообщить мне, когда появится в наличии:</span>
                                                    <form action="{{route('subscription', $product)}}" method="POST">
                                                        @csrf
                                                        <input type="email" name="email" id="">
                                                        <button type="submit">Отправить</button>
                                                    </form>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="{{route('product', [$category->id, $product->id])}}">{{$product->title}}</a></h4>
                                                @if($product->isNew())<h4 style="color:coral">НОВИНКА</h4>@endif
                                                @if($product->isHit())<h4 style="color:goldenrod">ХИТ</h4>@endif
                                                <div class="product-price">
                                                    <span class="new">{{$product->price}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- <div class="pagination-style text-center mt-10">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="icon-arrow-left"></i></a>
                                        </li>
                                        <li>
                                            <a href="#">1</a>
                                        </li>
                                        <li>
                                            <a href="#">2</a>
                                        </li>
                                        <li>
                                            <a class="active" href="#"><i class="icon-arrow-right"></i></a>
                                        </li>
                                    </ul>
                                </div> -->
                                {!! $products->links('pagination::bootstrap-4') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                    <div class="shop-sidebar">
                            <div class="shop-widget">
                                <div class="shop-search mt-25 mb-50">
                                    <form class="shop-search-form">
                                        <input type="text" placeholder="Поиск">
                                        <button type="submit">
                                            <i class="icon-magnifier"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <form action="{{route('category', [$category])}}" method="get">

                            <div class="shop-widget">
                                <h4 class="shop-sidebar-title">Фильтрация по цене</h4>
                                <div class="mt-15">
                                <label for="price_from">Цена от
                                    <input type="text" name="price_from" id="price_from" size="5" value="{{ request()->price_from}}">
                                </label>
                                <label for="price_to">До
                                    <input type="text" name="price_to" id="price_to" size="5"  value="{{ request()->price_to }}">
                                </label>
                                </div>
                            </div>

                            <div class="shop-widget mt-50">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="new" value="new" id="flexCheckDefault"
                                    @if(request()->has('new')) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Новинки
                                </label>
                            </div>

                            <div class="shop-widget mt-50">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="hit" value="hit" id="flexCheckDefault"
                                    @if(request()->has('hit')) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Хиты
                                </label>
                            </div>

                            <div class="mt-50">
                            <button type="submit" class="btn btn-primary">Отфильтровать</button> 
                            <a href="{{route('category', [$category])}}" class="btn btn-warning">Сброс</a>
                            </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 @endsection
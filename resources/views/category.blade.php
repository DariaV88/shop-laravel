@extends('layouts.main')

@section('content')
        </div>
        <div class="shop-area pt-100 pb-100 gray-bg">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="shop-topbar-wrapper">
                            <div class="product-sorting-wrapper">
                                <div class="product-show shorting-style">
                                    <label>Showing <span>1-20</span> of <span>{{$category->products->count()}}</span> Results</label>
                                    <select>
                                        <option value="">12</option>
                                        <option value="">24</option>
                                        <option value="">36</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid-list-options">
                                <ul class="view-mode">
                                    <li class="active"><a href="#product-grid" data-view="product-grid"><i class="ti-layout-grid4-alt"></i></a></li>
                                    <li><a href="#product-list" data-view="product-list"><i class="ti-align-justify"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    
                        <h4>{{$category->title}} - {{$category->products->count()}} шт</h4>
                        <div class="grid-list-product-wrapper">
                            <div class="product-view product-grid">
                                <div class="row">  
                                    @foreach($category->products as $product)
                                    <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
                                        <div class="product-wrapper mb-10">
                                            <div class="product-img">
                                                <a href="product-details.html">
                                                    <img src="{{Storage::url($product->preview_image)}}" alt="">
                                                </a>
                                                <div class="product-action p-0">
                                                    <!-- <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                                        <i class="ti-plus"></i>
                                                    </a> -->
                                                    <form action="{{route('basket.add', $product)}}" method="POST">
                                                        @csrf
                                                    <button type="submit" class="btn btn-primary" title="Add To Cart">
                                                        В корзину
                                                    </form>
                                                </div>
                                                <div class="product-action-wishlist">
                                                    <a title="Wishlist" href="#">
                                                        <i class="ti-heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="{{route('product', [$category->id, $product->id])}}">{{$product->title}}</a></h4>
                                                <div class="product-price">
                                                    <span class="new">{{$product->price}}$</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="pagination-style text-center mt-10">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="shop-sidebar">
                            <div class="shop-widget">
                                <h4 class="shop-sidebar-title">Search Products</h4>
                                <div class="shop-search mt-25 mb-50">
                                    <form class="shop-search-form">
                                        <input type="text" placeholder="Find a product">
                                        <button type="submit">
                                            <i class="icon-magnifier"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 @endsection
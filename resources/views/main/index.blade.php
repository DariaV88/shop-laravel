@extends('layouts.main')

@section('content')
<div class="slider-area">
            <div class="slider-active owl-dot-style owl-carousel">
                <div class="single-slider pt-100 pb-100 yellow-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 col-sm-7">
                                <div
                                    class="slider-content slider-animated-1 pt-114"
                                >
                                    <h1 class="animated">
                                        Название <br /> магазина
                                    </h1>
                                    <h3 class="animated">
                                        Новая коллекция верхней одежды
                                    </h3>
                                    <div class="slider-btn mt-25">
                                        <a
                                            class="animated"
                                            href="{{route('category', [8])}}"
                                            >За покупками</a
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 col-sm-5">
                                <div
                                    class="slider-single-img slider-animated-1"
                                >
                                    <img
                                        class="animated"
                                        style="max-width: 400px;"
                                        src="{{Storage::url('images/gwslOZCYnXGT1yWi3zu5yoyTj61uzHm2fKtLczrU.jpg')}}"
                                        alt=""
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="single-slider pt-100 pb-100 yellow-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-7 col-12">
                                <div
                                    class="slider-content slider-animated-1 pt-114"
                                >
                                    <h3 class="animated">
                                        Лучшие платья сезона
                                    </h3>
                                    <h1 class="animated">
                                        Название <br /> магазина
                                    </h1>
                                    <div class="slider-btn">
                                    <a
                                            class="animated"
                                            href="{{route('category', [5])}}"
                                            >За покупками</a
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-5 col-12">
                                <div
                                    class="slider-single-img slider-animated-1"
                                >
                                <img
                                        class="animated"
                                        style="max-width: 400px;"
                                        src="{{Storage::url('images/7VJpvgAlYFeoUAUYqPeegq5f67gKtP8IUsGDZMoG.jpg')}}"
                                        alt=""
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="service-area bg-img pt-100 pb-65">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div
                            class="service-content text-center mb-30 service-color-1"
                        >
                            <img
                                src="assets/img/icon-img/shipping.png"
                                alt=""
                            />
                            <h4>FREE SHIPPING</h4>
                            <p>Free shipping on all order</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div
                            class="service-content text-center mb-30 service-color-2"
                        >
                            <img src="assets/img/icon-img/support.png" alt="" />
                            <h4>ONLINE SUPPORT</h4>
                            <p>Online support 24 hours a day</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div
                            class="service-content text-center mb-30 service-color-3"
                        >
                            <img src="assets/img/icon-img/money.png" alt="" />
                            <h4>MONEY RETURN</h4>
                            <p>Back guarantee under 5 days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
@endsection
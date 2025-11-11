<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>LICCHI</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Favicon -->
        <link
            rel="shortcut icon"
            type="image/x-icon"
            href="assets/img/favicon.png"
        />
        
        <!-- all css here -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" />
        <link rel="stylesheet" href="{{ asset('assets/css/simple-line-icons.css')}}" />
        <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css')}}" />
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('assets/css/slick.css')}}" />
        <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" />
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css')}}" />
        <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>
    <body>
        <header class="header-area">
            <div class="header-top theme-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="welcome-area">
                                <p>LICCHI</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom transparent-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-5">
                            <div class="logo pt-39">
                                <a href="index.html"
                                    ><img
                                        alt=""
                                        src="'assets/img/logo/logo.png"
                                /></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 d-none d-lg-block">
                            <div class="main-menu text-center">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="{{route('index')}}">Главная</a>
                                        </li>
                                        <li>
                                            <a href="#">Каталог</a>
                                            <ul class="submenu">
                                            @foreach ($cats as $category)
                                                <li>
                                                    <a href="{{route('category', $category->id)}}"
                                                        >{{$category->title}}</a
                                                    >
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-8 col-sm-8 col-7">
                            <div class="search-login-cart-wrapper">
                                <div class="header-login same-style">
                                    @guest
                                    <a href="{{route('register')}}"
                                        ><i class="icon-user icons"></i
                                    ></a>
                                    @endguest
                                </div>

                                @auth
                                <div class="same-style">
                                    <a title="Личный кабинет" href="{{route('user.orders.index')}}">ЛК<i class="fa-solid fa-truck-fast"></i></a>
                                </div>
                                <div class="header-login same-style">
                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                    <a title="Выход" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit()"
                                        ><i class="icon-user icons"></i
                                    ></a>
                                    </form>
                                </div>
                                    @endauth
                                <div class="icon-cart same-style">
                                <a href="{{route('basket')}}"
                                        ><i class="icon-handbag icons"></i
                                    ></a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="mobile-menu-area electro-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none"
                        >
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active">
                                    <ul class="menu-overflow">
                                        <li>
                                            <a href="#">HOME</a>
                                            <ul>
                                                <li>
                                                    <a href="index.html"
                                                        >home version 1</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="index-2.html"
                                                        >home version 2</a
                                                    >
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">pages</a>
                                            <ul>
                                                <li>
                                                    <a href="about-us.html"
                                                        >about us</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="shop-page.html"
                                                        >shop page</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="shop-list.html"
                                                        >shop list</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        href="product-details.html"
                                                        >product details</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="cart.html"
                                                        >cart page</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="checkout.html"
                                                        >checkout</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="wishlist.html"
                                                        >wishlist</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="contact.html"
                                                        >contact us</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="my-account.html"
                                                        >my account</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        href="login-register.html"
                                                        >login / register</a
                                                    >
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Food</a>
                                            <ul>
                                                <li>
                                                    <a href="#">Dogs Food</a>
                                                    <ul>
                                                        <li>
                                                            <a
                                                                href="shop-page.html"
                                                                >Grapes and
                                                                Raisins</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="shop-page.html"
                                                                >Carrots</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="shop-page.html"
                                                                >Peanut
                                                                Butter</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="shop-page.html"
                                                                >Salmon fishs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="shop-page.html"
                                                                >Eggs</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Cats Food</a>
                                                    <ul>
                                                        <li>
                                                            <a
                                                                href="shop-page.html"
                                                                >Meat</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="shop-page.html"
                                                                >Fish</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="shop-page.html"
                                                                >Eggs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="shop-page.html"
                                                                >Veggies</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="shop-page.html"
                                                                >Cheese</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Fishs Food</a>
                                                    <ul>
                                                        <li>
                                                            <a
                                                                href="shop-page.html"
                                                                >Rice</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="shop-page.html"
                                                                >Veggies</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="shop-page.html"
                                                                >Cheese</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="shop-page.html"
                                                                >wheat bran</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="shop-page.html"
                                                                >Cultivation</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">blog</a>
                                            <ul>
                                                <li>
                                                    <a href="blog.html"
                                                        >blog page</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        href="blog-leftsidebar.html"
                                                        >blog left sidebar</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="blog-details.html"
                                                        >blog details</a
                                                    >
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="contact.html">
                                                Contact us
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    @if(session()->has('success'))
       <p class="alert alert-success">{{session()->get('success')}}</p>
       @endif
                           @if(session()->has('warning'))
       <p class="alert alert-warning">{{session()->get('warning')}}</p>
       @endif
                </div>
            </div>
        </header>
        <div class="content-wrapper">
   @yield('content')
  </div>

<div class="related-product-area pt-95 pb-80 mt-50 white-bg">
            <div class="container">
                <div class="section-title text-center mb-55">
                    <h2>Популярные товары</h2>
                </div>
                <div class="related-product-active owl-carousel">
                    @foreach($bestProducts as $bestProduct)

                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="product-details.html">
                                <img src="assets/img/product/product-8.jpg" alt="">
                            </a>
                            <div class="product-action">
                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                    <i class="ti-plus"></i>
                                </a>
                                <a title="Add To Cart" href="#">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="product-action-wishlist">
                                <a title="Wishlist" href="#">
                                    <i class="ti-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <a href="{{route('product', [$bestProduct->category->id, $bestProduct->id])}}">{{$bestProduct->title}}</a>
                            
                            <div class="product-price">
                                <span class="new">$ {{$bestProduct->price}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <footer class="footer-area">
            <div class="footer-top pt-40 pb-30 gray-bg-2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="footer-widget mb-30">
                            <h4 class="footer-title text-center">Где мы находимся</h4>
                                <div class="footer-info-wrapper">

                                    <div class="service-content text-center mb-30">
  <div style="position:relative;overflow:hidden; max-width: 400px; margin: 0 auto;">
    <a href="https://yandex.ru/maps/org/galereya_krasnodar/1492821787/?utm_medium=mapframe&amp;utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Галерея Краснодар</a>
    <a href="https://yandex.ru/maps/35/krasnodar/category/shopping_mall/184108083/?utm_medium=mapframe&amp;utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Торговый центр в Краснодаре</a>
    <a href="https://yandex.ru/maps/35/krasnodar/category/entertainment_center/184106372/?utm_medium=mapframe&amp;utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:28px;">Развлекательный центр в Краснодаре</a>
    <iframe src="https://yandex.ru/map-widget/v1/org/galereya_krasnodar/1492821787/?ll=38.974552%2C45.039753&amp;z=14" width="400" height="200" frameborder="1" allowfullscreen="true" style="position:relative;">
    </iframe>
  </div>
</div>

                                
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget mb-30 pl-50">
                            <h4 class="footer-title">Полезная информация</h4>
                                <div class="footer-content">
                                    <ul>
                                        <li><a href="#">Акции</a></li>
                                        <li><a href="#">Доставка</a></li>
                                        <li><a href="#">Оплата</a></li>
                                        <li><a href="#">Возврат</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6">
                            <div class="footer-widget mb-30 pl-70">
                            <h4 class="footer-title">Компания</h4>
                                <div class="footer-content">
                                    <ul>
                                        <li>
                                            <a href="#">О нас</a>
                                        </li>
                                        <li>
                                            <a href="#">Вакансии</a>
                                        </li>
                                        <li><a href="#">Закупки</a></li>
                                        <li>
                                            <a href="#">Стать партнёром</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom gray-bg-3 pt-17 pb-15">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright text-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- all js here -->
        <script src="{{ asset('assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
        <script src="{{ asset('assets/js/popper.js')}}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.counterup.min.js')}}"></script>
        <script src="{{ asset('assets/js/waypoints.min.js')}}"></script>
        <script src="{{ asset('assets/js/elevetezoom.js')}}"></script>
        <script src="{{ asset('assets/js/ajax-mail.js')}}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('assets/js/plugins.js')}}"></script>
        <script src="{{ asset('assets/js/main.js')}}"></script>
    </body>
</html>

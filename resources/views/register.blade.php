@extends('layouts.main')

@section('content')
<div>
<div class="container">
                <div class="breadcrumb-content text-center">
                    <h2>Login / Register</h2>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li class="active">Login / Register</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="login-register-area pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> login </h4>
                                </a>
                                <a data-toggle="tab" href="#lg2">
                                    <h4> register </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="{{route('login')}}" method="post"> 
                                            @csrf
                                                <input type="text" name="name" id="name" placeholder="Username">
                                                <input type="password" name="password" id="password" placeholder="Password">
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox">
                                                        <label>Запомнить меня</label>
                                                        <a href="#">Забыли пароль?</a>
                                                    </div>
                                                    <button type="submit"><span>Войти</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="lg2" class="tab-pane">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="{{route('user.register')}}" method="post">
                                                @csrf
                                                <input type="text" name="name" id="name" placeholder="Name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                                                @error('name')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror

                                                <input name="email" id="email" placeholder="Email" type="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                                                @error('email')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror

                                                <input type="password" name="password" id="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                                                @error('password')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror

                                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password">
                                                <div class="button-box">
                                                    <button type="submit"><span>Зарегестрироваться</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection


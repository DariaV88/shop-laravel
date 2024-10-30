@extends('layouts.main')

@section('content')
        </div>
        <div class="cart-main-area pt-95 pb-100">
            <div class="container">

            <div class="breadcrumb-content text-center">
                    <h2>Checkout</h2>
                   <p>Укажите имя и номер телефона, чтобы менеджер связался с вами.</p>
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
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>
            </div>
            @csrf
            <input type="submit" class="btn btn-success" value="Подтвердить заказ">
            </form>
            </div>
        </div>
        @endsection


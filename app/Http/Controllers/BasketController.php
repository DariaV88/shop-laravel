<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderCreated;
use Illuminate\Support\Facades\Mail;

class BasketController extends Controller
{

    public function basket() {
        $orderId = session('orderId');
        if (!is_null($orderId)){
            $order = Order::findOrFail($orderId);
        }
        if (!isset($order)) {
            return view('basket-empty');
        }
        
        return view('basket', compact('order'));
    }

    public function add(Product $product) {

        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::findOrFail($orderId);
        }
         
        if($order->products->contains($product->id)) {
            $pivotRow = $order->products()->where('product_id', $product->id)->first()->pivot;
            $pivotRow->count++;
            if($pivotRow->count > $product->count) {
                session()->flash('warning', 'Товара в большем количестве нет.');
                return redirect()->back()->with('error', 'Недостаточно товара на складе.');
            }
            $pivotRow->update();
        } else {
                if($product->count == 0) {
                return false;
            }
            $order->products()->attach($product->id);
        }

        if(Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }

        session()->flash('success', 'Товар добавлен в корзину');

        return redirect()->route('basket');
    }

    public function remove(Product $product) {
        $orderId = session('orderId');
        
        if (is_null($orderId)) {
          return redirect()->route('basket');
        }
        $order = Order::findOrFail($orderId);

        if($order->products->contains($product->id)) {
            $pivotRow = $order->products()->where('product_id', $product->id)->first()->pivot;
            if($pivotRow->count < 2) {
                $order->products()->detach($product->id);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        return redirect()->route('basket');
    }

    public function confirm(Request $request) {

        $orderId = session('orderId');
        if (is_null($orderId)) {
          return redirect()->route('index');
        }

        $order = Order::findOrFail($orderId);

        foreach ($order->products as $orderProduct) {
            $orderProduct->count -= $order->products()->where('product_id', $orderProduct->id)->first()->pivot->count;
        }
        $order->products->map->save();

        $success = $order->saveOrder($request->name, $request->phone);
        //ДОБАВИТЬ ПОЧТУ?

        $email = Auth::check() ? Auth::user()->email : $request->email;
        $name = Auth::check() ? Auth::user()->name : $request->name;

        Mail::to($email)->send(new OrderCreated($name));

        if($success) {
            session()->flash('success', 'Ваш заказ принят в обработку');
        } else {
            session()->flash('warning', 'Что-то пошло не так');
        }

        return redirect()->route('index');
    }

}

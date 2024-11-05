<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function add($productId) {

        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        if($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }

        if(Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }

        session()->flash('success', 'Товар добавлен в корзину');

        return redirect()->route('basket');
    }

    public function remove($productId) {
        $orderId = session('orderId');
        
        if (is_null($orderId)) {
          return redirect()->route('basket');
        }
        $order = Order::find($orderId);

        if($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if($pivotRow->count < 2) {
                $order->products()->detach($productId);
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

        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone);

        if($success) {
            session()->flash('success', 'Ваш заказ принят в обработку');
        } else {
            session()->flash('warning', 'Что-то пошло не так');
        }

        return redirect()->route('index');
    }
}

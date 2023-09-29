<?php


namespace App\Services\Cart;


class Service
{

    public function show() {
        $orders = (auth()->user()->cart->orders()->get());
        $amount = 0;
        $order = null;
        foreach ($orders as $item) {
            if ($item->status->id == 1) {
                $order = $item;
                foreach ($item->items as $product) {
                    $amount += $product->count * $product->item->price;
                }
                break;
            }
        }


        if ($order) {
            if (count($order->items) !== 0) {
                return view('cart.index', compact('order', 'amount'));
            }
        }
        return view('cart.empty');
    }

}

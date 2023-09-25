<?php

namespace App\Http\Controllers\Cart;

use App\Models\Ingredient;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke()
    {

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

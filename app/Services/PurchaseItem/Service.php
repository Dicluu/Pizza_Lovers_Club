<?php

namespace App\Services\PurchaseItem;

use App\Models\PurchaseItem;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Auth;

class Service
{

    public function store($data) {
        $order = null;
        if (Auth::check()) {
            $orders = (auth()->user()->cart->orders()->get());
            foreach ($orders as $item) {
                if ($item->status->id == 1) {
                    $order = $item;
                    break;
                }
            }
            if (!$order) {
                $order = PurchaseOrder::create([
                    'cart_id' => auth()->user()->id
                ]);
            }
            $data['purchase_order_id'] = $order->id;
            PurchaseItem::Create($data);
            return redirect(route('index'));
        }
        return redirect(route('user.registration'));

    }

    public function update($data) {
        if ($data['action'] ==='+') {
            $item = PurchaseItem::find($data['item']);
            $item->update(['count' => ($item->count)+1]);
        }
        if ($data['action'] ==='-') {
            $item = PurchaseItem::find($data['item']);
            $item->update(['count' => ($item->count)-1]);
        }

        if ($item->count === 0) {
            $item->delete();
        }
    }

}

<?php

namespace App\Http\Controllers\PurchaseItem;

use App\Http\Requests\PurchaseItem\StoreRequest;
use App\Models\Ingredient;
use App\Models\PurchaseItem;
use App\Models\PurchaseOrder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class StoreController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
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
}

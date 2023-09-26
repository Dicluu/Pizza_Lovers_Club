<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Http\Requests\PurchaseOrderDetails\StoreRequest;
use App\Models\Item;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderDetails;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class StoreController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(StoreRequest $request) {
        $data = $request->validated();
        $orders = (auth()->user()->cart->orders()->get());
        $order = null;
        foreach ($orders as $item) {
            if ($item->status->id == 1) {
                $order = $item;
                break;
            }
        }

        $data += ['purchase_order_id' => $order->id];
        PurchaseOrderDetails::Create($data);
        $order->update([
           'status_id' => 2
        ]);
        return view('cart.payment_success');
    }
}
